<?php

namespace App\Http\Controllers;

use DB;
use Cart;
use Session;
use Carbon\Carbon;
use App\Models\Taste;
use App\Models\Counpon;
use App\Models\categoryPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
session_start();
class cartController extends Controller
{
    public function save_cart(Request $request){
        $product_Id = $request->input('product_id'); // Lấy product_id từ form
        $quantity = $request->input('product_qty'); // Lấy số lượng từ form
        $taste_id = $request->input('taste_id');
        if (!$product_Id) {
            return redirect()->back()->with('error', 'Không tìm thấy sản phẩm!');
        }

        $product_info = DB::table('tbl_product')->where('product_id', $product_Id)->first();

        if (!$product_info) {
            return redirect()->back()->with('error', 'Sản phẩm không tồn tại!');
        }

         // Kiểm tra giỏ hàng có sản phẩm chưa
        $cart = Cart::getContent();
        $existingProduct = $cart->where('id', $product_Id)->first();

        if ($existingProduct) {
            Cart::update($product_Id, [
                'quantity' => ['relative' => true, 'value' => $quantity]
            ]);
        } else {

            $data = [
                'id' => $product_info->product_id,
                'name' => $product_info->product_name,
                'price' => $product_info->product_discount_price ?? $product_info->product_price,
                'quantity' => $quantity,
                'attributes' => ['image' => $product_info->product_image],
            ];
            if ($taste_id) {
                $taste_info = Taste::where('taste_id', $taste_id)->first();
                if ($taste_info) {
                    $data['attributes']['taste_name'] = $taste_info->taste_name;
                }
            }
            Cart::add($data);
        }
        if ($request->ajax()) {
            return response()->json(['success' => 'Sản phẩm đã được thêm vào giỏ hàng!','totalQuantity' => Cart::getTotalQuantity()]);
        }
        toastr()->success('Thêm sản phẩm vào giỏ hàng thành công');
        return redirect()->back();
    }

    public function show_cart(Request $request){
        $category_post = categoryPost::orderby('cate_post_id','desc')->where('cate_post_status','1')->get();
        $category_product = DB::table('tbl_category_product')->where('category_status','1')->orderby('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand_product')->where('brand_status','1')->orderby('brand_id','desc')->get();
        $meta_desc = "Giỏ hàng của bạn";
        $meta_keywords = "Giỏ hàng của bạn";
        $meta_title = "Giỏ hàng của bạn";
        $url_canonical = $request->url();

        return view('pages.cart.show_cart')->with('category_product', $category_product)
                                           ->with('brand_product', $brand_product)
                                           ->with('meta_desc',$meta_desc)
                                           ->with('meta_keywords',$meta_keywords)
                                           ->with('meta_title',$meta_title)
                                           ->with('url_canonical',$url_canonical)
                                           ->with('category_post',$category_post);
    }
    public function delete_from_cart($rowId) {
        Cart::remove($rowId);
        return Redirect::to('/show-cart');
    }
    public function update_cart(Request $request)
    {
        if (!$request->has('item_id') || !$request->has('quantity')) {
            return response()->json(['success' => false, 'message' => 'Thiếu dữ liệu!']);
        }

        // Lấy sản phẩm hiện tại trong giỏ hàng
        $cartItem = Cart::get($request->item_id);
        if (!$cartItem) {
            return response()->json(['success' => false, 'message' => 'Sản phẩm không tồn tại trong giỏ hàng!']);
        }

        // Cập nhật số lượng, đảm bảo không nhỏ hơn 1
        $newQuantity = max(1, $request->quantity);
        Cart::update($request->item_id, [
            'quantity' => [
                'relative' => false, // Cập nhật số lượng tuyệt đối (tránh cộng dồn)
                'value' => $newQuantity
            ]
        ]);


        // **Tính lại tổng giỏ hàng từ đầu (Không cộng dồn)**
        $cartTotal = 0;
        $cartItems = Cart::getContent(); // Lấy tất cả sản phẩm trong giỏ hàng

        foreach ($cartItems as $item) {
            $cartTotal += $item->price * $item->quantity;
        }

        //  Nếu chỉ có 1 sản phẩm thì tổng tiền phải bằng giá trị của sản phẩm đó
        if ($cartItems->count() == 1) {
            $cartTotal = $cartItem->price * $newQuantity;
        }

        // Tính VAT và Grand Total
        $vat = $cartTotal * 0.1;
        $grandTotal = $cartTotal + $vat;

        return response()->json([
            'success' => true,
            'subtotal' => number_format($cartItem->price * $newQuantity, 0, ',', '.') . ' VNĐ',
            'total' => number_format($cartTotal, 0, ',', '.') . ' VNĐ',
            'vat' => number_format($vat, 0, ',', '.') . ' VNĐ',
            'grand_total' => number_format($grandTotal, 0, ',', '.') . ' VNĐ'
        ]);
    }

    public function check_coupon(Request $request) {
        $data = $request->all();
        $today = Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d');
        $counpon = Counpon::where('counpon_code', $data['counpon'])
                            ->where('counpon_date_end','>=', $today)
                            ->first(); // Tìm mã giảm giá

        if (!$counpon) {
            return redirect()->back()->with('error_coupon', 'Mã giảm giá không hợp lệ hoặc đã hết hạn!');
        }

        // Kiểm tra số lượng mã giảm giá còn lại
        if ($counpon->counpon_qty <= 0) {
            return redirect()->back()->with('error_coupon', 'Mã giảm giá đã hết lượt sử dụng!');
        }

        // Lấy danh sách mã giảm giá trong session
        $counpon_session = Session::get('counpon', []);

        // Kiểm tra mã giảm giá đã tồn tại trong session chưa
        foreach ($counpon_session as $cou) {
            if ($cou['counpon'] == $counpon->counpon_code) {
                return redirect()->back()->with('error_coupon', 'Mã giảm giá đã được áp dụng!');
            }
        }

        // Thêm mã giảm giá vào session
        $counpon_session[] = [
            'counpon' => $counpon->counpon_code,
            'counpon_function' => $counpon->counpon_function,
            'counpon_percent' => $counpon->counpon_percent, // Dùng đúng biến
        ];
        Session::put('counpon', $counpon_session);

        // Giảm số lượng mã giảm giá trong database đi 1
        $counpon->decrement('counpon_qty');

        Session::save();
        return redirect()->back()->with('success_coupon', 'Áp dụng mã giảm giá thành công!');
    }





}
