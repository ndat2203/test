<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

use App\Models\Slider;
use App\Models\categoryPost;
use App\Models\categoryProduct;
use App\Models\Product;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();

class categoryProductController extends Controller
{
    public function authLogin() {
        $admin_id = session::get('admin_id');
        if($admin_id){
            return Redirect::to('dashboard');
        }else{
            return Redirect::to('admin')->send();
        }
    }
    public function add_category_product(){
        $this->authLogin();
        $category_product = DB::table('tbl_category_product')->orderBy('category_id', 'desc')->get();
        return view('admin.add_category_product')->with('category_product',$category_product);
    }
    public function save_category_product(Request $request){
        $this->authLogin();
        $data = array();
        $data['category_name'] = $request->category_product_name;
        $data['category_slug'] = $request->category_product_slug;
        $data['category_desc'] = $request->category_product_desc;
        $data['category_status'] = $request->category_product_status;
        $data['category_parent'] = $request->category_parent;
        $data['category_order'] = 0;
        DB::table('tbl_category_product')->insert($data);

         // Dùng session flash để hiển thị thông báo một lần
        // session()->flash('message', 'Thêm danh mục sản phẩm thành công');
        toastr()->success('Thêm danh mục sản phẩm thành công');

        return Redirect::to('all-category-product');

    }

    public function all_category_product(){
        $this->authLogin();
        $all_category_product = DB::table('tbl_category_product')->orderBy('category_parent', 'desc')->orderBy('category_order','asc')->get();
        $category_product = DB::table('tbl_category_product')->where('category_parent','0')->orderBy('category_id', 'desc')->get();
        $list_category_product = view('admin.all_category_product')->with('all_category_product', $all_category_product )
                                                                   ->with('category_product', $category_product);

        return view('admin_layout')->with('admin.all_category_product', $list_category_product);
    }

    public function unactive_category_product($category_product_id){
        $this->authLogin();
        DB::table('tbl_category_product')->where('category_id',$category_product_id)->update(['category_status'=> 1]);

        toastr()->success('Hiển thị danh mục sản phẩm thành công');
        return Redirect::to('all-category-product');
    }
    public function active_category_product($category_product_id){
        $this->authLogin();
        DB::table('tbl_category_product')->where('category_id',$category_product_id)->update(['category_status'=> 0]);
        toastr()->success('Ẩn danh mục sản phẩm thành công');
        return Redirect::to('all-category-product');
    }

    public function edit_category_product($category_product_id){
        $this->authLogin();
        $edit_category_product = DB::table('tbl_category_product')->where('category_id',$category_product_id)->get();
        $category_product = DB::table('tbl_category_product')->orderBy('category_id', 'desc')->get();
        $manager_category_product = view('admin.edit_category_product')->with('edit_category_product', $edit_category_product)
                                                                       ->with('category_product', $category_product);

        return view('admin_layout')->with('admin.edit_category_product', $manager_category_product);
    }

    public function update_category_product(Request $request, $category_product_id){
        $this->authLogin();
        $data = array();
        $data['category_name'] = $request->category_product_name;
        $data['category_slug'] = $request->category_product_slug;
        $data['category_desc'] = $request->category_product_desc;
        $data['category_parent'] = $request->category_parent;
        DB::table('tbl_category_product')->where('category_id', $category_product_id)->update($data);
        toastr()->success('Cập nhật danh mục sản phẩm thành công');

        return Redirect::to('all-category-product');
    }
    public function delete_category_product($category_product_id){
        $this->authLogin();
        DB::table('tbl_category_product')->where('category_id', $category_product_id)->delete();
        toastr()->success('Xóa danh mục sản phẩm thành công');

        return Redirect::to('all-category-product');
    }
    public function arrange_category(Request $request){
        $this->authLogin();
        $data = $request->all();
        $cate_id = $data["page_id_array"];
        foreach($cate_id as $key => $val){
            $category = categoryProduct::find($val);
            if ($category) { // Kiểm tra xem có tồn tại không
                $category->category_order = $key + 1; // Cộng thêm 1 vào thứ tự
                $category->save();
            }

        }
        echo 'update';
    }
    //end function admin

    // start function user
    public function show_category_home(Request $request,$category_slug){
        $category_product = DB::table('tbl_category_product')->where('category_status','1')->orderby('category_parent','desc')->orderBy('category_order','asc')->get();
        $brand_product = DB::table('tbl_brand_product')->where('brand_status','1')->orderby('brand_id','desc')->get();
        $slider = Slider::orderby('slider_id','desc')->where('slider_status','1')->take(4)->get();

        $category_post = categoryPost::orderby('cate_post_id','desc')->where('cate_post_status','1')->get();

        $all_product = DB::table('tbl_product')->where('product_status','1')
                                               ->orderby('product_id','desc')->limit(3)
                                               ->get();
        $category_by_slug = categoryProduct::where('category_slug', $category_slug)->get();
        foreach($category_by_slug as $key => $val){
            $category_id = $val->category_id;
        }
        $min_price = Product::min('product_price');
        $max_price = Product::max('product_price');

        if(isset($_GET['sort_by'])){
            $sort_by = $_GET['sort_by'];
            if($sort_by == 'giam_dan'){
                $category_by_id = DB::table('tbl_product')
                        ->join('tbl_category_product', 'tbl_category_product.category_id', '=', 'tbl_product.category_id')
                        ->where('tbl_product.category_id',$category_id)
                        ->orderby('product_price', 'desc')
                        ->paginate(10)
                        ->appends(request()->query());

            }else if($sort_by == 'tang_dan'){
                $category_by_id = DB::table('tbl_product')
                        ->join('tbl_category_product', 'tbl_category_product.category_id', '=', 'tbl_product.category_id')
                        ->where('tbl_product.category_id',$category_id)
                        ->orderby('product_price', 'asc')
                        ->paginate(10)
                        ->appends(request()->query());

            }else if($sort_by == 'kytu_az'){
                $category_by_id = DB::table('tbl_product')
                        ->join('tbl_category_product', 'tbl_category_product.category_id', '=', 'tbl_product.category_id')
                        ->where('tbl_product.category_id',$category_id)
                        ->orderby('product_name', 'asc')
                        ->paginate(10)
                        ->appends(request()->query());

            }else if($sort_by == 'kytu_za'){
                $category_by_id = DB::table('tbl_product')
                        ->join('tbl_category_product', 'tbl_category_product.category_id', '=', 'tbl_product.category_id')
                        ->where('tbl_product.category_id',$category_id)
                        ->orderby('product_name', 'desc')
                        ->paginate(10)
                        ->appends(request()->query());
                                                        //    ->appends(request()->query());
            }

        }elseif (isset($_GET['start_price']) && isset($_GET['end_price'])){
            $min_price = $_GET['start_price'];
            $max_price = $_GET['end_price'];
            $category_by_id = DB::table('tbl_product')
                        ->join('tbl_category_product', 'tbl_category_product.category_id', '=', 'tbl_product.category_id')
                        ->whereBetween('tbl_product.product_price', [$min_price, $max_price])
                        ->orderBy('tbl_product.product_id', 'asc')
                        ->paginate(10)
                        ->appends(request()->query());

        }else{
            $category_by_id = DB::table('tbl_product')
                        ->join('tbl_category_product', 'tbl_category_product.category_id', '=', 'tbl_product.category_id')
                        ->where('tbl_product.category_id',$category_id)
                        ->orderby('product_id', 'desc')
                        ->paginate(10);
            // $category_by_id = Product::with('category')->where('category_id', $category_id)
            //                                                ->orderby('product_id', 'desc')
            //                                                ->paginate(6);
        }
        // Lấy thông tin danh mục (chỉ một dòng)
        $category_name = DB::table('tbl_category_product')->where('tbl_category_product.category_slug',$category_slug)->limit(1)->get();
        // Lấy danh sách sản phẩm thuộc danh mục
        // $category_by_id = DB::table('tbl_product')
        //                 ->join('tbl_category_product', 'tbl_category_product.category_id', '=', 'tbl_product.category_id')
        //                 ->where('tbl_category_product.category_slug',$category_slug)
        //                 ->paginate(6);
        $meta_desc = "";
        $meta_keywords = "";
        $meta_title = "";
        $url_canonical = $request->url();
        foreach($category_name as $key => $val){
            $meta_desc = $val->category_desc;
            $meta_keywords = $val->category_name ;
            $meta_title = $val->category_name . " | " . "EShopper";
            $url_canonical = $request->url();
        }

        return view('pages.category.show_category')->with('category_product', $category_product)
                                                   ->with('brand_product', $brand_product)
                                                   ->with('all_product', $all_product)
                                                   ->with('category_by_id', $category_by_id)
                                                   ->with('category_name', $category_name)
                                                   ->with('meta_desc',$meta_desc)
                                                   ->with('meta_keywords',$meta_keywords)
                                                   ->with('meta_title',$meta_title)
                                                   ->with('url_canonical',$url_canonical)
                                                   ->with('slider', $slider)
                                                   ->with('category_post', $category_post)
                                                   ->with('min_price', $min_price)
                                                   ->with('max_price', $max_price);

    }


}
