<?php

namespace App\Http\Controllers;

use DB;
use File;
use Session;
use Carbon\Carbon;
use App\Models\Taste;
use App\Models\Rating;
use App\Models\Slider;
use App\Models\Comment;
use App\Models\Gallery;
use App\Models\Product;
use App\Models\brandProduct;
use App\Models\categoryPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
session_start();
class productController extends Controller
{
    public function authLogin() {
        $admin_id = session::get('admin_id');
        if($admin_id){
            return Redirect::to('dashboard');
        }else{
            return Redirect::to('admin')->send();
        }
    }
    public function add_product(){
        $this->authLogin();
        $category_product = DB::table('tbl_category_product')->orderby('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand_product')->orderby('brand_id','desc')->get();
        $taste_list = Taste::all(); // Lấy toàn bộ chất liệu

        return view('admin.add_product')->with('category_product', $category_product)
                                              ->with('brand_product', $brand_product)
                                              ->with('taste_list', $taste_list);
    }
    public function save_product(Request $request){
        $this->authLogin();
        $data = array();
        $data['product_name'] = $request->product_name;
        $data['product_slug'] = $request->product_slug;
        $data['product_price'] = $request->product_price;
        $data['product_discount_price'] = $request->product_discount_price;
        $data['product_qty'] = $request->product_qty;
        $data['product_desc'] = $request->product_desc;
        $data['product_content'] = $request->product_content;
        $data['category_id'] = $request->product_category;
        $data['brand_id'] = $request->product_brand;
        $data['product_status'] = $request->product_status;
        $data['product_date'] = Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d');

        $path = 'public/upload/product/';
        $path_gal = 'public/upload/gallery/';

        $get_image = $request->file('product_image');
        if($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            // phan tach chuoi sau dau cham cua anh
            $name_image = current(explode('.', $get_name_image));
            $new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move($path, $new_image);
            File::copy($path.$new_image, $path_gal.$new_image);
            $data['product_image'] = $new_image;

        }

        $pro_id = DB::table('tbl_product')->insertGetId($data);
        // Gán nhiều chất liệu vào sản phẩm
        if ($request->has('taste_id') && !empty($request->taste_id)) {
            foreach ($request->taste_id as $taste_id) {
                DB::table('tbl_product_taste')->insert([
                    'product_id' => $pro_id,
                    'taste_id' => $taste_id,
                ]);
            }
        }
        // $data['product_image'] = '';

        $gallery = new Gallery();
        $gallery->gallery_image = $new_image;
        $gallery->gallery_name = $new_image;
        $gallery->product_id = $pro_id;
        $gallery->save();


        toastr()->success('Thêm sản phẩm thành công');

        return Redirect::to('all-product');

    }

    public function all_product(){
        $this->authLogin();
        $all_product = DB::table('tbl_product')
        ->join('tbl_category_product', 'tbl_category_product.category_id','=','tbl_product.category_id')
        ->join('tbl_brand_product', 'tbl_brand_product.brand_id','=','tbl_product.brand_id')->orderby('tbl_product.product_id','desc')->get();
        $list_product = view('admin.all_product')->with('all_product', $all_product );

        return view('admin_layout')->with('admin.all_product', $list_product);
    }

    public function unactive_product($product_id){
        $this->authLogin();
        DB::table('tbl_product')->where('product_id',$product_id)->update(['product_status'=> 1]);

        toastr()->success('Hiển thị sản phẩm thành công');
        return Redirect::to('all-product');
    }
    public function active_product($product_id){
        $this->authLogin();
        DB::table('tbl_product')->where('product_id',$product_id)->update(['product_status'=> 0]);
        toastr()->success('Ẩn sản phẩm thành công');
        return Redirect::to('all-product');
    }

    public function edit_product($product_id){
        $this->authLogin();
        $category_product = DB::table('tbl_category_product')->orderby('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand_product')->orderby('brand_id','desc')->get();
        $taste_list = Taste::all(); // Lấy toàn bộ chất liệu

        $edit_product = DB::table('tbl_product')->where('product_id',$product_id)->get();
        $manager_product = view('admin.edit_product')
                            ->with('edit_product', $edit_product)
                            ->with('category_product', $category_product)
                            ->with('brand_product', $brand_product)
                            ->with('taste_list', $taste_list);

        return view('admin_layout')->with('admin.edit_product', $manager_product);
    }

    public function update_product(Request $request, $product_id){
        $this->authLogin();
        $data = array();
        $data['product_name'] = $request->product_name;
        $data['product_slug'] = $request->product_slug;
        $data['product_price'] = $request->product_price;
        $data['product_discount_price'] = $request->product_discount_price;
        $data['product_desc'] = $request->product_desc;
        $data['product_qty'] = $request->product_qty;
        $data['product_content'] = $request->product_content;
        $data['category_id'] = $request->product_category;
        $data['brand_id'] = $request->product_brand;
        $data['product_status'] = $request->product_status;
        $get_image = $request->file('product_image');
        if($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            // phan tach chuoi sau dau cham cua anh
            $name_image = current(explode('.', $get_name_image));
            $new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('public/upload/product', $new_image);
            $data['product_image'] = $new_image;

        }
        DB::table('tbl_product')->where('product_id', $product_id)->update($data);
        // Gán nhiều chất liệu vào sản phẩm

        DB::table('tbl_product_taste')->where('product_id', $product_id)->delete();
        if ($request->has('taste_id') && !empty($request->taste_id)) {
            foreach ($request->taste_id as $taste_id) {
                DB::table('tbl_product_taste')->insert([
                    'product_id' => $product_id,
                    'taste_id' => $taste_id,
                ]);
            }
        }

        toastr()->success('Cập nhật sản phẩm thành công');

        return Redirect::to('all-product');
    }
    public function delete_product($product_id){
        $this->authLogin();
        DB::table('tbl_product')->where('product_id', $product_id)->delete();
        toastr()->success('Xóa sản phẩm thành công');

        return Redirect::to('all-product');
    }

    // thêm vị sản phẩm
    public function add_taste()
    {
        return view('admin.taste.add_taste');
    }

    public function save_taste(Request $request)
    {
        $data = $request->all();

        $taste = new Taste();
        $taste->taste_name = $data['taste_name'];
        $taste->taste_status = $data['taste_status'];
        $taste->save();

        return redirect('/all-product')->with('message', 'Thêm vị thành công');
    }

    public function list_comment(){
        $comment = Comment::with('product')->where( 'comment_parent','=',0)->orderBy('comment_id','desc')->get();
        $comment_rep = Comment::with('product')->where( 'comment_parent','>',0)->get();
        return view('admin.comment.all_comment')->with(compact('comment','comment_rep'));
    }
    public function allow_comment(Request $request){
        $data = $request->all();
        $comment = Comment::find($data['comment_id']);
        if($comment){
            $comment->comment_status = $data['comment_status'];
            $comment->save();
            return response()->json(['success' => true]);
        }else {
            return response()->json(['success' => false]);
        }
    }
    public function reply_comment(Request $request){
        $data = $request->all();
        $comment = new Comment();
        $comment->comment = $data['comment'];
        $comment->comment_product_id = $data['comment_product_id'];
        $comment->comment_parent = $data['comment_id'];
        $comment->comment_status = 0;
        $comment->comment_username = 'FurryFriend';
        $comment->comment_rating = 0;
        $comment->save();

    }
    public function uploads_ckeditor(Request $request){
        if ($request->hasFile('upload')) {
            $file = $request->file('upload');
            $originName = $file->getClientOriginalName();
            $filename = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $file->getClientOriginalExtension();
            $filename = $filename . '_' . time() . '.' . $extension;

            // Đảm bảo thư mục tồn tại trước khi lưu
            $file->move(public_path('upload/ckeditor'), $filename);

            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $url = asset("upload/ckeditor/$filename"); // Sửa lỗi asset()
            $msg = 'Tải ảnh thành công';

            // Trả về phản hồi cho CKEditor
            $response = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg');</script>";

            @header('Content-Type: text/html; charset=utf-8');
            echo $response;
            exit(); // Dừng script để tránh lỗi
        }
    }
    public function file_browser(Request $request){
        $paths= glob(public_path('upload/ckeditor/*'));
        $fileNames = array();
        foreach($paths as $path){
            array_push($fileNames, basename($path));
        }
        $data = array(
            'fileNames' =>$fileNames
        );
        return view('admin.images.file_browser')->with($data);
    }

    public function manage_warehouse(){
        $this->authLogin();
        $all_product = DB::table('tbl_product')
        ->join('tbl_category_product', 'tbl_category_product.category_id','=','tbl_product.category_id')
        ->join('tbl_brand_product', 'tbl_brand_product.brand_id','=','tbl_product.brand_id')
        ->join('product_imports', 'product_imports.product_id','=','tbl_product.product_id')

        ->orderby('tbl_product.product_id','desc')
        ->get();
        $list_product = view('admin.warehouse.manage_warehouse')->with('all_product', $all_product );

        return view('admin_layout')->with('admin.all_product', $list_product);
    }

    // nhap hang
    public function import_product()
    {
        $products = DB::table('tbl_product')->get();
        return view('admin.warehouse.import_general')->with('products', $products);
    }
    public function submit_import(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:tbl_product,product_id',
            'import_qty' => 'required|integer|min:1',
        ]);

        // Cộng số lượng vào bảng sản phẩm
        DB::table('tbl_product')->where('product_id', $request->product_id)
            ->increment('product_qty', $request->import_qty);

        // Lưu vào bảng nhập kho
        DB::table('product_imports')->insert([
            'product_id' => $request->product_id,
            'import_qty' => $request->import_qty,
            'import_date' => Carbon::now('Asia/Ho_Chi_Minh'),
        ]);
        toastr()->success('Nhập hàng thành công!');
        return redirect('/import-product');
    }

// end admin
    public function detail_product(Request $request, $product_slug){
        $category_product = DB::table('tbl_category_product')->where('category_status','1')->orderby('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand_product')->where('brand_status','1')->orderby('brand_id','desc')->get();

        $detail_product = DB::table('tbl_product')
        ->join('tbl_category_product', 'tbl_category_product.category_id','=','tbl_product.category_id')
        ->join('tbl_brand_product', 'tbl_brand_product.brand_id','=','tbl_product.brand_id')
        ->where('tbl_product.product_slug',$product_slug)
        ->where('tbl_product.product_status', '1')
        ->get();



        foreach ($detail_product as $key => $value) {
            $category_id = $value->category_id;
            $product_id = $value->product_id;
            $cate_name = $value->category_name;
            $cate_slug = $value->category_id;

            $meta_desc = $value->product_desc;
            $meta_keywords = $value->product_name ;
            $meta_title = $value->product_name . " | " . "EShopper";
            $url_canonical = $request->url();
        }
        $category_post = categoryPost::orderby('cate_post_id','desc')->where('cate_post_status','1')->get();

        $gallery = Gallery::where('product_id', $product_id)->get();

        // vị của sản phẩm
        $product_taste = Product::with('taste')->findOrFail($product_id);

        //update product_view
        $pro_view = Product::where('product_id',$product_id)->first();
        $pro_view->product_view = $pro_view->product_view + 1;
        $pro_view->save();

        $related_product = DB::table('tbl_product')
        ->join('tbl_category_product', 'tbl_category_product.category_id','=','tbl_product.category_id')
        ->join('tbl_brand_product', 'tbl_brand_product.brand_id','=','tbl_product.brand_id')
        ->where('tbl_category_product.category_id',$category_id)
        ->whereNotIn('tbl_product.product_slug',[$product_slug])
        ->orderby(DB::raw('RAND()'))
        ->limit(4)
        ->get();
        $related_product1 = DB::table('tbl_product')
        ->join('tbl_category_product', 'tbl_category_product.category_id','=','tbl_product.category_id')
        ->join('tbl_brand_product', 'tbl_brand_product.brand_id','=','tbl_product.brand_id')
        ->where('tbl_category_product.category_id',$category_id)
        ->whereNotIn('tbl_product.product_slug',[$product_slug])
        ->orderby(DB::raw('RAND()'))
        ->limit(4)
        ->get();

        $commentCount = Comment::where('comment_product_id', $product_id)->count();

        $average_rating = Comment::where('comment_product_id', $product_id)
                                ->where('comment_parent', 0)
                                ->where('comment_status',0) // Chỉ lấy bình luận từ khách hàng
                                ->avg('comment_rating');
        $average_rating = round($average_rating); // lam tron so sao

        return view('pages.product.show_detail')->with('category_product', $category_product)
                                                ->with('brand_product', $brand_product)
                                                ->with('product_detail', $detail_product)
                                                ->with('related_product', $related_product)
                                                ->with('meta_desc',$meta_desc)
                                                ->with('meta_keywords',$meta_keywords)
                                                ->with('meta_title',$meta_title)
                                                ->with('url_canonical',$url_canonical)
                                                ->with('gallery',$gallery)
                                                ->with('cate_name',$cate_name)
                                                ->with('cate_slug',$cate_slug)
                                                ->with('average_rating',$average_rating)
                                                ->with('related_product1',$related_product1)
                                                ->with('category_post',$category_post)
                                                ->with('commentCount',$commentCount)
                                                ->with('product_taste',$product_taste);
    }
    public function list_product_by_type(Request $request)
    {
        $meta_desc = "Danh sách sản phẩm";
        $meta_keywords = "Danh sách sản phẩm";
        $meta_title = "Danh sách sản phẩm";
        $url_canonical = $request->url();

        $category_post = categoryPost::orderby('cate_post_id','desc')->where('cate_post_status','1')->get();
        $slider = Slider::orderby('slider_id','desc')->where('slider_status','1')->take(4)->get();
        $category_product = DB::table('tbl_category_product')
                                ->where('category_status','1')
                                ->orderby('category_parent','desc')
                                ->orderBy('category_order','asc')->get();
        $brand_product = brandProduct::withCount('products')
                                ->where('brand_status', 1)
                                ->orderby('brand_id','desc')
                                ->get();

        $type = $request->type;
        $sort_by = $request->sort_by;
        $min_price = $request->start_price;
        $max_price = $request->end_price;
        $query = DB::table('tbl_product')
                    ->join('tbl_category_product', 'tbl_product.category_id', '=', 'tbl_category_product.category_id')
                    ->where('tbl_product.product_status', 1);

        // Nếu là giảm giá thì lọc trước
        if ($type === 'giam-gia') {
            $query->where('tbl_product.product_discount_price', '>', 0);
        }
        // Lọc theo khoảng giá
        if ($min_price !== null && $max_price !== null) {
            $query->whereBetween('tbl_product.product_price', [$min_price, $max_price])
                  ->orderby('product_price', 'asc');
        }

        // Nếu không có sort_by thì áp dụng sắp xếp theo type
        if (!$sort_by) {
            switch ($type) {
                case 'moi-nhat':
                    $query->orderBy('tbl_product.product_id', 'DESC');
                    break;
                case 'xem-nhieu':
                    $query->orderBy('tbl_product.product_view', 'DESC');
                    break;
                case 'mua-nhieu':
                    $query->orderBy('tbl_product.product_sold', 'DESC');
                    break;
                case 'giam-gia':
                    $query->orderBy('tbl_product.product_discount_price', 'DESC');
                    break;
                default:
                    $query->orderBy('tbl_product.product_id', 'DESC');
            }
        }

        // Sắp xếp nếu có yêu cầu
        if ($sort_by == 'tang_dan') {
            $query->orderBy('product_price', 'ASC');
        } elseif ($sort_by == 'giam_dan') {
            $query->orderBy('product_price', 'DESC');
        } elseif ($sort_by == 'kytu_az') {
            $query->orderBy('product_name', 'ASC');
        } elseif ($sort_by == 'kytu_za') {
            $query->orderBy('product_name', 'DESC');
        }

        $products = $query->paginate(9)->appends(request()->query());

        return view('pages.product.list_product')->with(compact(
            'products', 'type', 'meta_desc', 'meta_keywords', 'meta_title',
            'url_canonical', 'category_post', 'slider', 'category_product', 'brand_product'
        ));
    }

    public function quickly_view(Request $request){
        $product_id = $request->product_id;
        $product = Product::find($product_id);
        $gallery = Gallery::where('product_id', $product_id)->get();  // Lấy danh sách hình ảnh từ bảng gallery
        $product_taste = Product::with('taste')->findOrFail($product_id);
        // Xử lý dữ liệu Gallery để gửi về AJAX
        $output['product_gallery'] = '<ul id="imageGallery">';
        foreach ($gallery as $gal) {
            $output['product_gallery'] .= '<li data-thumb="'.asset('public/upload/gallery/'.$gal->gallery_image).'"
                                  data-src="'.asset('public/upload/gallery/'.$gal->gallery_image).'">
                                  <img width="100%" alt="'.$gal->gallery_name.'"
                                  src="'.asset('public/upload/gallery/'.$gal->gallery_image).'" />
                              </li>';
        }
        $output['product_gallery'] .= '</ul>';
        $output['product_brand'] = $product->brand ? $product->brand->brand_name : 'Không có thương hiệu';

        // Tạo dữ liệu JSON gửi về AJAX
        // kiểm tra tình trạng
        $output['product_status'] = $product->product_qty == 0 ?
        '<span style="color: red;">Hết hàng</span>' :
        '<span style="color: green;">Còn hàng</span>';

        $output['product_name'] = $product->product_name;
        $output['product_slug'] = $product->product_slug;
        $output['product_id'] = $product->product_id;

        if (!empty($product->product_discount_price)) {
        $output['product_price'] = number_format($product->product_discount_price, 0, ',', '.') . ' VNĐ';
        } else {
            $output['product_price'] = number_format($product->product_price, 0, ',', '.') . ' VNĐ';
        }
        // vị của sản phẩm
        $output['product_taste'] = '';
        if ($product_taste && $product_taste->taste->isNotEmpty()) {
            $output['product_taste'] .= '
                <div style="margin-bottom: 12px;">
                    <label style="margin-bottom: 6px; display: block; font-weight: bold;">Loại:</label>
                    <div style="display: flex; flex-wrap: wrap; gap: 10px;">';

            foreach ($product_taste->taste as $taste) {
                $is_disabled = ($product->product_qty == 0);
                $disabled_attr = $is_disabled ? 'disabled' : '';
                $style = 'padding: 8px 12px; border: 1px solid #ccc; border-radius: 4px; background: ' . ($is_disabled ? '#d3d3d3' : '#fff') . '; color: ' . ($is_disabled ? '#999' : '#000') . '; cursor: ' . ($is_disabled ? 'not-allowed' : 'pointer') . '; transition: 0.3s;';

                $output['product_taste'] .= '
                    <button type="button" class="taste-option" data-taste-id="'.$taste->taste_id.'" '.$disabled_attr.' style="'.$style.'">
                        '.$taste->taste_name.'
                    </button>';
            }

            $output['product_taste'] .= '
                    </div>
                    <input type="hidden" name="taste_id" id="selected-taste-id" required>
                </div>';
        }

        $output['product_desc'] = $product->product_desc;
        $output['product_content'] = $product->product_content;
        $output['product_image'] = '<p><img width="100%" src="public/upload/product/'.$product->product_image.'"></p>';
        $output['product_button'] = '
            <button type="button" class="btn btn-default cart add-to-cart-quick" data-id_product="'.$product->product_id.'" style="margin-top:10px;border-radius:5px;margin-left: 0px;">
                <i class="fa fa-shopping-cart"></i> Thêm giỏ hàng
            </button>
        ';
        $output['product_buyQuick'] = '
            <input type="hidden" class="cart_product_id_'.$product->product_id.'" value="'.$product->product_id.'">
            <input type="hidden" class="cart_product_name_'.$product->product_id.'" value="'.$product->product_name.'">
            <input type="hidden" class="cart_product_image_'.$product->product_id.'" value="'.$product->product_image.'">
            <input type="hidden" class="cart_product_price_'.$product->product_id.'" value="'.$product->product_price.'">
            <input type="hidden" class="cart_product_qty_'.$product->product_id.'" value="1">
            <input type="hidden" class="cart_product_taste_id_'.$product->product_id.'" value="" id="selected-taste-id">
        ';
        return response()->json($output);
    }
    public function load_comment(Request $request){
        $product_id = $request->product_id;
        $comment = Comment::where('comment_product_id',$product_id)->where( 'comment_parent','=',0)->where('comment_status',0)->get();
        $comment_rep = Comment::with('product')->where( 'comment_parent','>',0)->get();
        $output ='';
        foreach ($comment as $key => $com) {
            $output .= '
                <div class="row style_comment" style="display: flex; align-items: center; padding: 12px; border-bottom: 1px solid #ddd; background-color: #f9f9f9; border-radius: 8px; margin-bottom: 10px; box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.1);">
                    <div class="col-md-2" style="text-align: center;">
                        <img src="'.url('public/fontend/images/anhcomment.jpg').'"
                            style="width: 50px; height: 50px; border-radius: 50%; object-fit: cover; border: 2px solid #ccc;transition: none !important; "
                            alt="User Avatar">
                    </div>
                    <div class="col-md-10" style="padding-left: 15px; flex: 1;">
                        <p style="font-weight: bold; color: #333; font-size: 16px; margin: 0;">'.$com->comment_username.'</p>
                            <div style="margin-top: 2px; font-size: 14px; line-height: 1;">';
                            for ($i = 1; $i <= 5; $i++){
                                $color = $i <= $com->comment_rating ? '#FFD700' : '#ccc';
                                $output .= '<span style="color: ' . $color . ';display: inline-block; margin-right: 2px;">★</span>';
                            }
                        $output .='</div>
                        <p style="margin-top: 5px; color: #555; font-size: 14px; line-height: 1.5;">'.$com->comment.'</p>
                        <!-- Thẻ a để mở ô nhập phản hồi -->
                        <a href="javascript:void(0);" onclick="toggleReplyBox('.$com->comment_id.')"
                           style="color: #007bff; font-size: 14px; cursor: pointer; text-decoration: none;margin-right:10px;">
                            Phản hồi
                        </a>

                        <!-- Ô nhập phản hồi (mặc định ẩn) -->
                        <div id="reply_box_'.$com->comment_id.'" style="display: none; margin-top: 10px;">
                            <input type="text" id="reply_input_'.$com->comment_id.'" placeholder="Nhập phản hồi của bạn..."
                               style="flex: 1; padding: 8px; border: none; border-bottom: 1px solid #ddd; border-radius: 0; width: 90%; outline: none;">
                            <button onclick="sendReply('.$com->comment_id.')"
                                    style="padding: 8px 12px; background-color: #007bff; color: white; border: none; border-radius: 5px; cursor: pointer; flex-shrink: 0;">
                                Gửi
                            </button>

                        </div>
                        ';
            // Kiểm tra có phản hồi hay không
            $hasReply = false;
            foreach ($comment_rep as $com_rep) {
                if ($com_rep->comment_parent == $com->comment_id) {
                    $hasReply = true;
                    break;
                }
            }

            // Nếu có phản hồi, thêm nút "Xem phản hồi"
            if ($hasReply) {
                $output .= '<a href="javascript:void(0);" id="toggle_button_' . $com->comment_id . '" onclick="toggleReply(' . $com->comment_id . ')"
                    style="color: #007bff; font-size: 14px; cursor: pointer; text-decoration: none;">
                    Xem phản hồi
                </a>

                ';
            }


            // Thêm khối chứa phản hồi
            $output .= '<div id="reply_section_'.$com->comment_id.'" style="display: none; margin-top: 10px;">';

            foreach ($comment_rep as $key => $com_rep) {
                if ($com_rep->comment_parent == $com->comment_id) {
                    $output .= '
                        <div class="row style_comment" style="display: flex; align-items: center; padding: 12px; border-left: 4px solid #007bff; background-color: #eef5ff; border-radius: 8px; margin-left: 50px; margin-bottom: 10px; box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.1);">
                            <div class="col-md-2" style="text-align: center;">
                                <img src="'.url('public/fontend/images/anhcomment.jpg').'"
                                    style="width: 45px; height: 45px; border-radius: 50%; object-fit: cover; border: 2px solid #007bff;"
                                    alt="User Avatar">
                            </div>
                            <div class="col-md-10" style="padding-left: 15px; flex: 1;">
                                <p style="font-weight: bold; color: #007bff; font-size: 16px; margin: 0;">Admin</p>
                                <p style="margin-top: 5px; color: #333; font-size: 14px; line-height: 1.5;">'.$com_rep->comment.'</p>
                            </div>
                        </div>';
                }
            }

            $output .= '</div></div></div>'; // Kết thúc các div
        }
        echo $output;
    }

    public function sent_comment(Request $request){
        $product_id = $request->product_id;
        $comment_username = $request->comment_username;
        $comment_content = $request->comment_content;
        $rating = $request->rating;
        $existingComment = Comment::where('comment_product_id', $product_id)
                ->where('comment_username', $comment_username) // Nếu không có đăng nhập thì kiểm tra bằng username
                ->first();


        $comment = new Comment();
        $comment->comment_username = $comment_username;
        $comment->comment = $comment_content;
        $comment->comment_product_id = $product_id;
        $comment->comment_rating  = $rating;
        $comment->comment_status = 1;
        $comment->comment_parent = 0;
        $comment->save();

    }
    public function delete_comment($comment_id){
        $this->authLogin();
        Comment::find($comment_id)->delete();
        toastr()->success('Xóa bình luận thành công');

        return Redirect::to('list-comment');
    }

}
