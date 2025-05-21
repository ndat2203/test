<?php

namespace App\Http\Controllers;

use DB;
use Session;
use App\Models\Slider;
use App\Models\Product;
use App\Models\categoryPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
session_start();

class brandProductController extends Controller
{
    public function authLogin() {
        $admin_id = session::get('admin_id');
        if($admin_id){
            return Redirect::to('dashboard');
        }else{
            return Redirect::to('admin')->send();
        }
    }
    public function add_brand_product(){
        $this->authLogin();
        return view('admin.add_brand_product');
    }
    public function save_brand_product(Request $request){
        $this->authLogin();
        $data = array();
        $data['brand_name'] = $request->brand_product_name;
        $data['brand_slug'] = $request->brand_product_slug;
        $data['brand_desc'] = $request->brand_product_desc;
        $data['brand_status'] = $request->brand_product_status;
        DB::table('tbl_brand_product')->insert($data);

         // Dùng session flash để hiển thị thông báo một lần
        // session()->flash('message', 'Thêm danh mục sản phẩm thành công');
        toastr()->success('Thêm thương hiệu sản phẩm thành công');

        return Redirect::to('all-brand-product');

    }

    public function all_brand_product(){
        $this->authLogin();
        $all_brand_product = DB::table('tbl_brand_product')->get();
        $list_brand_product = view('admin.all_brand_product')->with('all_brand_product', $all_brand_product );

        return view('admin_layout')->with('admin.all_brand_product', $list_brand_product);
    }

    public function unactive_brand_product($brand_product_id){
        $this->authLogin();
        DB::table('tbl_brand_product')->where('brand_id',$brand_product_id)->update(['brand_status'=> 1]);

        toastr()->success('Hiển thị thương hiệu sản phẩm thành công');
        return Redirect::to('all-brand-product');
    }
    public function active_brand_product($brand_product_id){
        $this->authLogin();
        DB::table('tbl_brand_product')->where('brand_id',$brand_product_id)->update(['brand_status'=> 0]);
        toastr()->success('Ẩn thương hiệu sản phẩm thành công');
        return Redirect::to('all-brand-product');
    }

    public function edit_brand_product($brand_product_id){
        $this->authLogin();
        $edit_brand_product = DB::table('tbl_brand_product')->where('brand_id',$brand_product_id)->get();
        $manager_brand_product = view('admin.edit_brand_product')->with('edit_brand_product', $edit_brand_product );

        return view('admin_layout')->with('admin.edit_brand_product', $manager_brand_product);
    }

    public function update_brand_product(Request $request, $brand_product_id){
        $this->authLogin();
        $data = array();
        $data['brand_name'] = $request->brand_product_name;
        $data['brand_slug'] = $request->brand_product_slug;
        $data['brand_desc'] = $request->brand_product_desc;

        DB::table('tbl_brand_product')->where('brand_id', $brand_product_id)->update($data);
        toastr()->success('Cập nhật thương hiệu sản phẩm thành công');

        return Redirect::to('all-brand-product');
    }
    public function delete_brand_product($brand_product_id){
        $this->authLogin();
        DB::table('tbl_brand_product')->where('brand_id', $brand_product_id)->delete();
        toastr()->success('Xóa thương hiệu sản phẩm thành công');

        return Redirect::to('all-brand-product');
    }
    public function show_brand_home(Request $request, $brand_slug){
        $category_product = DB::table('tbl_category_product')->where('category_status','1')->orderby('category_parent','desc')->orderBy('category_order','asc')->get();
        $brand_product = DB::table('tbl_brand_product')->where('brand_status','1')->orderby('brand_id','desc')->get();
        $slider = Slider::orderby('slider_id','desc')->where('slider_status','1')->take(4)->get();
        $all_product = DB::table('tbl_product')->where('product_status','1')
                                               ->orderby('product_id','desc')->limit(3)
                                               ->get();


        // Lấy thông tin thuong hieu (chỉ một dòng)
        $brand_name = DB::table('tbl_brand_product')->where('tbl_brand_product.brand_slug',$brand_slug)->limit(1)->get();

        $category_post = categoryPost::orderby('cate_post_id','desc')->where('cate_post_status','1')->get();

        // Lấy danh sách sản phẩm thuộc thuong hieu theo lọc
        $min_price = Product::min('product_price');
        $max_price = Product::max('product_price');
        if(isset($_GET['sort_by'])){
            $sort_by = $_GET['sort_by'];
            if($sort_by == 'giam_dan'){
                $brand_by_id = DB::table('tbl_product')
                        ->join('tbl_brand_product', 'tbl_brand_product.brand_id', '=', 'tbl_product.brand_id')
                        ->where('tbl_brand_product.brand_slug',$brand_slug)
                        ->orderby('product_price', 'desc')
                        ->paginate(10)
                        ->appends(request()->query());

            }else if($sort_by == 'tang_dan'){
                $brand_by_id = DB::table('tbl_product')
                        ->join('tbl_brand_product', 'tbl_brand_product.brand_id', '=', 'tbl_product.brand_id')
                        ->where('tbl_brand_product.brand_slug',$brand_slug)
                        ->orderby('product_price', 'asc')
                        ->paginate(10)
                        ->appends(request()->query());

            }else if($sort_by == 'kytu_az'){
                $brand_by_id = DB::table('tbl_product')
                        ->join('tbl_brand_product', 'tbl_brand_product.brand_id', '=', 'tbl_product.brand_id')
                        ->where('tbl_brand_product.brand_slug',$brand_slug)
                        ->orderby('product_name', 'asc')
                        ->paginate(10)
                        ->appends(request()->query());

            }else if($sort_by == 'kytu_za'){
                $brand_by_id = DB::table('tbl_product')
                        ->join('tbl_brand_product', 'tbl_brand_product.brand_id', '=', 'tbl_product.brand_id')
                        ->where('tbl_brand_product.brand_slug',$brand_slug)
                        ->orderby('product_name', 'desc')
                        ->paginate(10)
                        ->appends(request()->query());
                                                        //    ->appends(request()->query());
            }

        }elseif (isset($_GET['start_price']) && isset($_GET['end_price'])){
            $min_price = $_GET['start_price'];
            $max_price = $_GET['end_price'];
            $brand_by_id = DB::table('tbl_product')
                        ->join('tbl_brand_product', 'tbl_brand_product.brand_id', '=', 'tbl_product.brand_id')
                        ->whereBetween('tbl_product.product_price', [$min_price, $max_price])
                        ->orderBy('tbl_product.product_id', 'asc')
                        ->paginate(10)
                        ->appends(request()->query());

        }else{
            $brand_by_id = DB::table('tbl_product')
                        ->join('tbl_brand_product', 'tbl_brand_product.brand_id', '=', 'tbl_product.brand_id')
                        ->where('tbl_brand_product.brand_slug',$brand_slug)
                        ->paginate(10);

        }


        foreach($brand_name as $key => $val){
            $meta_desc = $val->brand_desc;
            $meta_keywords = $val->brand_name ;
            $meta_title = $val->brand_name . " | " . "EShopper";
            $url_canonical = $request->url();
        }
        return view('pages.brand.show_brand')->with('category_product', $category_product)
                                                   ->with('brand_product', $brand_product)
                                                   ->with('all_product', $all_product)
                                                   ->with('brand_by_id', $brand_by_id)
                                                   ->with('brand_name', $brand_name)
                                                   ->with('meta_desc',$meta_desc)
                                                   ->with('meta_keywords',$meta_keywords)
                                                   ->with('meta_title',$meta_title)
                                                   ->with('url_canonical',$url_canonical)
                                                   ->with('slider', $slider)
                                                   ->with('category_post', $category_post);

    }
}
