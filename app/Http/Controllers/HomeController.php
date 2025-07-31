<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Slider;
use App\Models\Product;
use App\Models\categoryPost;
use App\Models\brandProduct;
use App\Models\Visitor;
use Carbon\Carbon;
use Session;

use Illuminate\Support\Facades\Redirect;
session_start();

class HomeController extends Controller
{
    public function introduce(Request $request){
        // seo meta
        $meta_desc = "FurryFriend - Cửa hàng trực tuyến chuyên cung cấp đồ dùng, phụ kiện chất lượng cao cho thú cưng, giúp bạn chăm sóc và làm bạn đồng hành của mình hạnh phúc hơn mỗi ngày.";
        $meta_keywords = "Cửa hàng trực tuyến chuyên cung cấp đồ dùng, phụ kiện chất lượng cao cho thú cưng";
        $meta_title = "Trang chủ | FurryFriend";
        $url_canonical = $request->url();
        //end seo meta
        $category_post = categoryPost::orderby('cate_post_id','desc')->where('cate_post_status','1')->get();
        $slider = Slider::orderby('slider_id','desc')->where('slider_status','1')->take(4)->get();
        $category_product = DB::table('tbl_category_product')->where('category_status','1')->orderby('category_parent','desc')->orderBy('category_order','asc')->get();

        // $brand_product = DB::table('tbl_brand_product')->where('brand_status','1')->orderby('brand_id','desc')->get();
        $brand_product = brandProduct::withCount('products')->where('brand_status', 1)
                                                           ->orderby('brand_id','desc')
                                                           ->get();
        return view('pages.introduce.introduce')->with('meta_desc',$meta_desc)
                                                    ->with('meta_keywords',$meta_keywords)
                                                    ->with('meta_title',$meta_title)
                                                    ->with('url_canonical',$url_canonical)
                                                    ->with('category_post',$category_post)
                                                    ->with('slider',$slider)
                                                    ->with('category_product', $category_product)
                                                    ->with('brand_product', $brand_product);
    }
    public function contact(Request $request){
        // seo meta
        $meta_desc = "FurryFriend - Cửa hàng trực tuyến chuyên cung cấp đồ dùng, phụ kiện chất lượng cao cho thú cưng, giúp bạn chăm sóc và làm bạn đồng hành của mình hạnh phúc hơn mỗi ngày.";
        $meta_keywords = "Cửa hàng trực tuyến chuyên cung cấp đồ dùng, phụ kiện chất lượng cao cho thú cưng";
        $meta_title = "Trang chủ | FurryFriend";
        $url_canonical = $request->url();
        //end seo meta
        $category_post = categoryPost::orderby('cate_post_id','desc')->where('cate_post_status','1')->get();
        $slider = Slider::orderby('slider_id','desc')->where('slider_status','1')->take(4)->get();
        $category_product = DB::table('tbl_category_product')->where('category_status','1')->orderby('category_parent','desc')->orderBy('category_order','asc')->get();

        // $brand_product = DB::table('tbl_brand_product')->where('brand_status','1')->orderby('brand_id','desc')->get();
        $brand_product = brandProduct::withCount('products')->where('brand_status', 1)
                                                           ->orderby('brand_id','desc')
                                                           ->get();
        return view('pages.introduce.contact')->with('meta_desc',$meta_desc)
                                                    ->with('meta_keywords',$meta_keywords)
                                                    ->with('meta_title',$meta_title)
                                                    ->with('url_canonical',$url_canonical)
                                                    ->with('category_post',$category_post)
                                                    ->with('slider',$slider)
                                                    ->with('category_product', $category_product)
                                                    ->with('brand_product', $brand_product);
    }
    public function index(Request $request ){
        $ip = request()->ip(); // lấy IP khách
        $today = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();

        // Kiểm tra IP đã tồn tại trong ngày chưa
        $exists = Visitor::where('ip_visitor', $ip)
                        ->where('date_visitor', $today)
                        ->first();

        if (!$exists) {
            Visitor::create([
                'ip_visitor' => $ip,
                'date_visitor' => $today
            ]);
        }

        // seo meta
        $meta_desc = "FurryFriend - Cửa hàng trực tuyến chuyên cung cấp đồ dùng, phụ kiện chất lượng cao cho thú cưng, giúp bạn chăm sóc và làm bạn đồng hành của mình hạnh phúc hơn mỗi ngày.";
        $meta_keywords = "Cửa hàng trực tuyến chuyên cung cấp đồ dùng, phụ kiện chất lượng cao cho thú cưng";
        $meta_title = "Trang chủ | FurryFriend";
        $url_canonical = $request->url();
        //end seo meta
        $slider = Slider::orderby('slider_id','desc')->where('slider_status','1')->take(4)->get();
        $category_post = categoryPost::orderby('cate_post_id','desc')->where('cate_post_status','1')->get();
        $category_product = DB::table('tbl_category_product')->where('category_status','1')->orderby('category_parent','desc')->orderBy('category_order','asc')->get();

        // $brand_product = DB::table('tbl_brand_product')->where('brand_status','1')->orderby('brand_id','desc')->get();
        $brand_product = brandProduct::withCount('products')->where('brand_status', 1)
                                                           ->orderby('brand_id','desc')
                                                           ->get();
        $min_price = Product::min('product_price');
        $max_price = Product::max('product_price');
        if(isset($_GET['sort_by'])){
            $sort_by = $_GET['sort_by'];
            if($sort_by == 'giam_dan'){
                $all_product = DB::table('tbl_product')
                        ->where('product_status','1')
                        ->orderby('product_price', 'desc')
                        ->paginate(6)
                        ->appends(request()->query());

            }else if($sort_by == 'tang_dan'){
                $all_product = DB::table('tbl_product')
                        ->where('product_status','1')
                        ->orderby('product_price', 'asc')
                        ->paginate(6)
                        ->appends(request()->query());

            }else if($sort_by == 'kytu_az'){
                $all_product = DB::table('tbl_product')
                        ->where('product_status','1')
                        ->orderby('product_name', 'asc')
                        ->paginate(6)
                        ->appends(request()->query());

            }else if($sort_by == 'kytu_za'){
                $all_product = DB::table('tbl_product')
                        ->where('product_status','1')
                        ->orderby('product_name', 'desc')
                        ->paginate(6)
                        ->appends(request()->query());

            }

        }elseif (isset($_GET['start_price']) && isset($_GET['end_price'])){
            $min_price = $_GET['start_price'];
            $max_price = $_GET['end_price'];
            $all_product = DB::table('tbl_product')
                        ->whereBetween('tbl_product.product_price', [$min_price, $max_price])
                        ->orderBy('tbl_product.product_id', 'asc')
                        ->where('product_status','1')
                        ->paginate(6)
                        ->appends(request()->query());

        }else{
            $all_product = DB::table('tbl_product')->where('product_status','1')
                                               ->orderby('product_id','desc')
                                               ->paginate(6);
        }

        $related_product = DB::table('tbl_product')
                    ->join('tbl_category_product', 'tbl_category_product.category_id','=','tbl_product.category_id')
                    ->join('tbl_brand_product', 'tbl_brand_product.brand_id','=','tbl_product.brand_id')
                    ->orderby(DB::raw('RAND()'))
                    ->limit(4)
                    ->get();
        $related_product_1 = DB::table('tbl_product')
                    ->join('tbl_category_product', 'tbl_category_product.category_id','=','tbl_product.category_id')
                    ->join('tbl_brand_product', 'tbl_brand_product.brand_id','=','tbl_product.brand_id')
                    ->orderby(DB::raw('RAND()'))
                    ->limit(4)
                    ->get();
        $product_view = Product::orderBy('product_view','desc')->take(6)->get();
        $product_latest = Product::orderBy('product_id','desc')->take(6)->get();
        $product_sold = Product::orderBy('product_sold','desc')->take(6)->get();
        $product_discount = Product::whereNotNull('product_discount_price')->orderBy('product_id', 'desc')->take(6)->get();
        return view('pages.home')->with('category_product', $category_product)
                                 ->with('brand_product', $brand_product)
                                 ->with('all_product', $all_product)
                                 ->with('meta_desc',$meta_desc)
                                 ->with('meta_keywords',$meta_keywords)
                                 ->with('meta_title',$meta_title)
                                 ->with('url_canonical',$url_canonical)
                                 ->with('slider', $slider)
                                 ->with('category_post', $category_post)
                                 ->with('related_product', $related_product)
                                 ->with('related_product_1', $related_product_1)
                                 ->with('product_view', $product_view)
                                 ->with('product_latest', $product_latest)
                                 ->with('product_sold', $product_sold)
                                 ->with('product_discount', $product_discount);

    }
    public function tim_kiem(Request $request){
        $category_product = DB::table('tbl_category_product')->where('category_status','1')->orderby('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand_product')->where('brand_status','1')->orderby('brand_id','desc')->get();
        $category_post = categoryPost::orderby('cate_post_id','desc')->where('cate_post_status','1')->get();
        $slider = Slider::orderby('slider_id','desc')->where('slider_status','1')->take(4)->get();
        $key = $request->keyword;
        $meta_desc = "Tìm kiếm sản phẩm";
        $meta_keywords = "Tìm kiếm sản phẩm";
        $meta_title = "Tìm kiếm sản phẩm" . " ". $key;
        $url_canonical = $request->url();
        $search_product = DB::table('tbl_product')->where('product_name','like','%' .$key. '%')->get();

        return view('pages.product.search_product')->with('category_product', $category_product)
                                                    ->with('brand_product', $brand_product)
                                                    ->with('search_product', $search_product)
                                                    ->with('meta_desc',$meta_desc)
                                                    ->with('meta_keywords',$meta_keywords)
                                                    ->with('meta_title',$meta_title)
                                                    ->with('url_canonical',$url_canonical)
                                                    ->with('category_post', $category_post)
                                                    ->with('slider', $slider);
    }
    public function autocomplete_ajax(Request $request){
        $data = $request->all();
        if($data['query']){
            $product = Product::where('product_status',1)->where('product_name','like','%' .$data['query']. '%')->get();
            $output = '<ul class="dropdown-menu" style="display:block; position:relative;width:100%;">';
            foreach($product as $key => $val){
                $output .='
                    <li ><a href="#">'.$val->product_name.'</a></li>
                ';
            }
            $output .='</ul>';
            echo $output;
        }
    }



}
