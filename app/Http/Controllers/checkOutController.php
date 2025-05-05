<?php

namespace App\Http\Controllers;

use DB;
use PDF;
use Session;
use Carbon\Carbon;
use App\Models\City;
use App\Models\Ward;
use App\Models\Order;
use App\Models\Social;
use App\Models\Counpon;
use App\Models\feeShip;
use App\Models\Product;
use App\Models\Customer;
use App\Models\Province;
use App\Models\Shipping;
use App\Models\orderDetail;
use App\Models\Statistical;
use Illuminate\Support\Str;
use App\Models\categoryPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Validator;
use Darryldecode\Cart\Facades\CartFacade as Cart;
session_start();

class checkOutController extends Controller
{
    public function login_checkout(Request $request){
        $category_post = categoryPost::orderby('cate_post_id','desc')->where('cate_post_status','1')->get();
        $meta_desc = "Đăng nhập tài khoản";
        $meta_keywords = "Đăng nhập tài khoản";
        $meta_title = "Đăng nhập tài khoản";
        $url_canonical = $request->url();
        return view('pages.checkout.login_checkout')->with('meta_desc',$meta_desc)
                                                    ->with('meta_keywords',$meta_keywords)
                                                    ->with('meta_title',$meta_title)
                                                    ->with('url_canonical',$url_canonical)
                                                    ->with('category_post', $category_post);
    }
    public function info_customer(Request $request){
        $category_post = categoryPost::orderby('cate_post_id','desc')->where('cate_post_status','1')->get();

        // Nếu không có cột created_at
        $info_shipping = Shipping::with('customer')
                                  ->where('customer_id', Session::get('customer_id'))
                                  ->orderBy('shipping_id', 'asc') // Cũ nhất trước
                                  ->first();

        $city =  City::orderby('matp','desc')->get();
        $meta_desc = "Thông tin tài khoản";
        $meta_keywords = "Thông tin tài khoản";
        $meta_title = "Thông tin tài khoản";
        $url_canonical = $request->url();
        return view('pages.checkout.info_customer')->with('meta_desc',$meta_desc)
                                                        ->with('meta_keywords',$meta_keywords)
                                                        ->with('meta_title',$meta_title)
                                                        ->with('url_canonical',$url_canonical)
                                                        ->with('category_post', $category_post)
                                                        ->with('info_shipping', $info_shipping)
                                                        ->with('city', $city);
    }
    public function address_customer(Request $request){
        $category_post = categoryPost::orderby('cate_post_id','desc')->where('cate_post_status','1')->get();
        $meta_desc = "Thông tin tài khoản";
        $meta_keywords = "Thông tin tài khoản";
        $meta_title = "Thông tin tài khoản";
        $url_canonical = $request->url();
        $city =  City::orderby('matp','desc')->get();
        $info_shipping = Shipping::with('customer')
                                  ->where('customer_id', Session::get('customer_id'))
                                  ->get();
        return view('pages.customer.address_customer')->with('meta_desc',$meta_desc)
                                                        ->with('meta_keywords',$meta_keywords)
                                                        ->with('meta_title',$meta_title)
                                                        ->with('url_canonical',$url_canonical)
                                                        ->with('category_post', $category_post)
                                                        ->with('info_shipping', $info_shipping)
                                                        ->with('city', $city);
    }

    public function setDefaultShipping(Request $request)
    {
        $customer_id = Session::get('customer_id');

        if (!$customer_id) {
            return response()->json(['status' => 'error', 'message' => 'Bạn cần đăng nhập.']);
        }

        $shipping_id = $request->shipping_id;

        // Reset hết
        Shipping::where('customer_id', $customer_id)->update(['shipping_default' => 0]);

        // Set địa chỉ này thành mặc định
        Shipping::where('shipping_id', $shipping_id)
                ->where('customer_id', $customer_id)
                ->update(['shipping_default' => 1]);

        // Lưu vào session
        Session::put('shipping_id', $shipping_id);

        return response()->json(['status' => 'success', 'message' => 'Đã chọn địa chỉ mặc định thành công!']);
    }
    public function forget_password(Request $request){
        $category_post = categoryPost::orderby('cate_post_id','desc')->where('cate_post_status','1')->get();
        // seo meta
        $meta_desc = "Quên mật khẩu";
        $meta_keywords = "Quên mật khẩu";
        $meta_title = "Quên mật khẩu | FurryFriend";
        $url_canonical = $request->url();
        return view('pages.checkout.forget_password')->with(compact('meta_desc','meta_keywords','meta_title','url_canonical','category_post'));
    }
    public function recover_password(Request $request){
        $data = $request->all();
        $now = Carbon::now('Asia/Ho_Chi_Minh')->format('d-m-Y');
        $title_mail = 'Lấy lại mật khẩu' .' '.$now;
        $customer = Customer::where('customer_email','=', $data['email_account'])->get();
        foreach($customer as $key => $val){
            $customer_id = $val->customer_id;
        }
        if($customer){
            $count_customer = $customer->count();
            if($count_customer == 0){
                return redirect()->back()->with('error','Email chưa được đăng ký để khôi phục mật khẩu!');
            }else{
                $token_random = Str::random();
                $customer = Customer::find($customer_id);
                $customer->customer_token = $token_random;
                $customer->save();

                $to_email = $data['email_account'];
                $link_reset = url('/update-new-password?email='.$to_email.'&token='.$token_random);
                $data = array("name"=>$title_mail,"body"=>$link_reset,'email'=>$data['email_account']);

                Mail::send('pages.checkout.forget_pass_notify',['data'=>$data],function($message) use($title_mail,$data){
                    $message->to($data['email'])->subject($title_mail);
                    $message->from($data['email'],$title_mail);
                });
                return redirect()->back()->with('message','Gửi mail thành công, vui lòng vào mail để reset mật khẩu!');
            }
        }
    }
    public function update_new_password(Request $request){
        $category_post = categoryPost::orderby('cate_post_id','desc')->where('cate_post_status','1')->get();
        // seo meta
        $meta_desc = "Quên mật khẩu";
        $meta_keywords = "Quên mật khẩu";
        $meta_title = "Quên mật khẩu | FurryFriend";
        $url_canonical = $request->url();
        return view('pages.checkout.new_password')->with(compact('meta_desc','meta_keywords','meta_title','url_canonical','category_post'));
    }
    public function update_new_pass(Request $request){
        $data = $request->all();
        $token_random = Str::random();
        $customer = Customer::where('customer_email','=',$data['email'])
                              ->where('customer_token','=',$data['token'])
                              ->get();
        $count = $customer->count();
        if($count > 0){
            foreach($customer as $key => $value){
                $customer_id = $value->customer_id;
            }
            $reset_pass = Customer::find( $customer_id );
            $reset_pass->customer_password = md5($data['password_account']);
            $reset_pass->customer_token = $token_random;
            $reset_pass->save();
            return redirect('login-checkout')->with('success','Thay đổi mật khẩu thành công!');
        }else{
            return redirect('forget-password')->with('error','Vui lòng nhập lại email vì email đã quá hạn!');
        }
    }

    // đăng nhập bằng google
    public function login_customer_google(){
        return Socialite::driver('google')->redirect();
    }

    public function callback_customer_google(){
        $users = Socialite::driver('google')->stateless()->user();
        $authUser = $this->findOrCreateCustomer($users, 'google');

        if($authUser){
            $customer = $authUser->customer;
            Session::put('customer_id', $customer->customer_id);
            Session::put('customer_name', $customer->customer_name);
        }

        return redirect('/trang-chu')->with('success', 'Đăng nhập tài khoản Google thành công!');
    }

    public function findOrCreateCustomer($users, $provider){
        $authUser = Social::where('provider_user_id', $users->id)->first();

        if($authUser){
            return $authUser;
        } else {
            $customer = Customer::where('customer_email', $users->email)->first();
            if(!$customer){
                $customer = Customer::create([
                    'customer_name' => $users->name,
                    'customer_email'=> $users->email,
                    'customer_password'=> '',
                    'customer_phone' => ''
                ]);
            }

            $customerSocial = new Social([
                'provider_user_id' => $users->id,
                'provider_user_email'=> $users->email,
                'provider' => strtoupper($provider)
            ]);

            $customerSocial->customer()->associate($customer);
            $customerSocial->save();

            return $customerSocial;
        }
    }

    // dang nhap bang facebook
    public function login_customer_facebook(){
        return Socialite::driver('facebook')->redirect();
    }
    public function callback_customer_facebook(){
        $provider = Socialite::driver('facebook')->stateless()->user();
        $account = Social::where('provider','facebook')->where('provider_user_id',$provider->getId())->first();
        if($account != NULL){
            $account_name = Customer::where('customer_id',$account->user)->first();
            Session::put('customer_id', $account_name->customer_id);
            Session::put('customer_name', $account_name->customer_name);
            return redirect('/trang-chu')->with('success', 'Đăng nhập tài khoản Facebook thành công!');
        }elseif($account == NULL){
            $customer_login = new Social([
                'provider_user_id' => $provider->getId(),
                'provider_user_email' => $provider->getEmail(),
                'provider' => 'facebook'
            ]);
            $customer = Customer::where('customer_email',$provider->getEmail())->first();
            if(!$customer){
                $customer = Customer::create([
                    'customer_name' => $provider->getName(),
                    'customer_email' => $provider->getEmail(),
                    'customer_password' => '',
                    'customer_phone' => ''
                ]);
            }
            $customer_login->customer()->associate($customer);
            $customer_login->save();

            $account_new = Customer::where('customer_id',$customer_login->user)->first();
            Session::put('customer_id', $account_new->customer_id);
            Session::put('customer_name', $account_new->customer_name);

            return redirect('/trang-chu')->with('success', 'Đăng nhập tài khoản Facebook thành công!');
        }
    }


    public function add_customer(Request $request){
        $data = array();
        $data['customer_name'] = $request->customer_name;
        $data['customer_phone'] = $request->customer_phone;
        $data['customer_email'] = $request->customer_email;
        $data['customer_password'] = md5($request->customer_password);

        $customer_id = DB::table('tbl_customer')->insertGetId($data);

        Session::put('customer_id',$customer_id);
        Session::put('customer_name',$request->customer_name);
        return Redirect('/login-checkout')->with('success','Đăng ký tài khoản thành công!');
    }
    public function checkout(Request $request){
        $category_post = categoryPost::orderby('cate_post_id','desc')->where('cate_post_status','1')->get();
        $meta_desc = "Điền thông tin của bạn";
        $meta_keywords = "Điền thông tin của bạn";
        $meta_title = "Điền thông tin của bạn";
        $url_canonical = $request->url();
        $city =  City::orderby('matp','desc')->get();
        return view('pages.checkout.show_checkout')->with('meta_desc',$meta_desc)
                                                   ->with('meta_keywords',$meta_keywords)
                                                   ->with('meta_title',$meta_title)
                                                   ->with('url_canonical',$url_canonical)
                                                   ->with('city',$city)
                                                   ->with('category_post',$category_post);
    }
    public function save_checkout_customer(Request $request)
    {
        // Lấy customer_id từ Session
        $customer_id = Session::get('customer_id');

        if (!$customer_id) {
            return redirect('/login-checkout')->with('error', 'Bạn cần đăng nhập trước khi tiếp tục.');
        }

        // Kiểm tra hợp lệ dữ liệu nhập vào
        $validator = Validator::make($request->all(), [
            'shipping_email'   => 'required|email',
            'shipping_name'    => 'required|string|max:255',
            'shipping_address' => 'required|string|max:255',
            'shipping_phone'   => 'required|digits_between:10,11',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Lưu dữ liệu vào bảng tbl_shipping, thêm customer_id vào
        $data = $request->only(['shipping_name', 'shipping_phone', 'shipping_email', 'shipping_note', 'shipping_address']);
        $data['customer_id'] = $customer_id;  // Gán customer_id vào dữ liệu
        $data['shipping_matp']     = $request->city;   // Lưu ID thành phố
        $data['shipping_maqh'] = $request->province; // Lưu ID quận/huyện
        $data['shipping_xaid']     = $request->ward; // Lưu ID xã/phường
        $shipping_id = DB::table('tbl_shipping')->insertGetId($data);
        if (!$shipping_id) {
            return redirect()->back()->with('error', 'Không thể lưu thông tin giao hàng. Vui lòng thử lại.');
        }

        // Lưu shipping_id vào session
        Session::put('shipping_id', $shipping_id);
        // Lưu thêm thông tin người nhận vào session
        Session::put('shipping_email', $data['shipping_email']);
        Session::put('shipping_name', $data['shipping_name']);
        Session::put('shipping_phone', $data['shipping_phone']);
        Session::put('shipping_note', $data['shipping_note']);
        return redirect('/payment');
    }
    public function change_pass(Request $request){
        $category_post = categoryPost::orderby('cate_post_id','desc')->where('cate_post_status','1')->get();
        $meta_desc = "Điền thông tin của bạn";
        $meta_keywords = "Điền thông tin của bạn";
        $meta_title = "Điền thông tin của bạn";
        $url_canonical = $request->url();
        return view('pages.customer.change_pass')->with('meta_desc',$meta_desc)
                                                        ->with('meta_keywords',$meta_keywords)
                                                        ->with('meta_title',$meta_title)
                                                        ->with('url_canonical',$url_canonical)
                                                        ->with('category_post',$category_post);
    }
    public function change_password_customer(Request $request){
        // Validate dữ liệu
        $request->validate([
            'current_password'     => 'required',
            'new_password'         => 'required|min:6|confirmed',
        ], [
            'new_password.confirmed' => 'Xác nhận mật khẩu không khớp!'
        ]);

        $customer = Customer::find(Session::get('customer_id'));

        if (!$customer) {
            return redirect()->back()->with('error', 'Không tìm thấy người dùng!');
        }

        // So sánh MD5 của mật khẩu hiện tại nhập vào với giá trị DB
        if (md5($request->current_password) !== $customer->customer_password) {
            return redirect()->back()->with('error', 'Mật khẩu hiện tại không đúng!');
        }

        // Cập nhật mật khẩu mới, nhớ chuyển sang md5 (dù không an toàn)
        $customer->customer_password = md5($request->new_password);
        $customer->save();

        return redirect()->back()->with('message', 'Cập nhật mật khẩu thành công!');
    }
    public function save_shipping_address(Request $request){
        $customer_id = Session::get('customer_id');

        $data = [
            'shipping_name' => $request->shipping_name ?? Session::get('shipping_name'),
            'shipping_phone' => $request->shipping_phone ?? Session::get('shipping_phone'),
            'shipping_email' => $request->shipping_email ?? Session::get('shipping_email'),
            'shipping_address' => $request->shipping_address, // Địa chỉ mới bắt buộc nhập
            'shipping_note' => $request->shipping_note ?? Session::get('shipping_note'),
            'customer_id' => $customer_id, // ID khách hàng
            'shipping_matp' => $request->city,  // ID thành phố
            'shipping_maqh' => $request->province,  // ID quận/huyện
            'shipping_xaid' => $request->ward,  // ID xã/phường
        ];
        Shipping::create($data);
        return redirect()->back()->with('message', 'Địa chỉ đã được lưu thành công!');

    }

    public function payment(Request $request){
        $category_post = categoryPost::orderby('cate_post_id','desc')->where('cate_post_status','1')->get();
        $get_customer = Shipping::with('customer')
                                ->where('customer_id', Session::get('customer_id'))
                                ->orderByDesc('shipping_default') // Ưu tiên địa chỉ mặc định
                                ->orderBy('shipping_id')          // Nếu không có mặc định, lấy địa chỉ đầu tiên
                                ->first();
        $meta_desc = "Thanh toán";
        $meta_keywords = "Thanh toán";
        $meta_title = "Thanh toán";
        $url_canonical = $request->url();
        return view('pages.checkout.payment')->with('get_customer', $get_customer)
                                                    ->with('meta_desc',$meta_desc)
                                                    ->with('meta_keywords',$meta_keywords)
                                                    ->with('meta_title',$meta_title)
                                                    ->with('url_canonical',$url_canonical)
                                                    ->with('category_post',$category_post);
    }
    public function logout_checkout(){
        Session::flush();
        return Redirect('/login-checkout');
    }
    public function login_customer(Request $request){
        $email = $request->email_account;
        $password = md5($request->password_account);

        // Kiểm tra tài khoản

        $customer = Customer::with('shipping')
                            ->where('customer_email', $email)
                            ->where('customer_password', $password)
                            ->first();
        if ($customer) {
            // Nếu là admin, chuyển về trang dashboard
            if ($customer->customer_role === 'admin') {
                Session::put('admin_id', $customer->customer_id);
                Session::put('admin_name', $customer->customer_name);
                return Redirect::to('/dashboard');
            }
            // Lưu thông tin đăng nhập vào Session
            Session::put('customer_id', $customer->customer_id);
            Session::put('customer_name', $customer->customer_name);
            // Lưu thêm thông tin người nhận vào session
            if ($customer->shipping && $customer->shipping->isNotEmpty()) {
                $shipping_ss = $customer->shipping->where('shipping_default', 1)->first() ?? $customer->shipping->first();

                Session::put('shipping_email', $shipping_ss->shipping_email);
                Session::put('shipping_name', $shipping_ss->shipping_name);
                Session::put('shipping_phone', $shipping_ss->shipping_phone);
                Session::put('shipping_note', $shipping_ss->shipping_note);
            }

            // Kiểm tra xem khách hàng này có địa chỉ giao hàng hay chưa
            $shipping = DB::table('tbl_shipping')->where('customer_id', $customer->customer_id)->first();

            if ($shipping) {
                // Nếu đã có địa chỉ, chuyển thẳng đến trang thanh toán
                Session::put('shipping_id', $shipping->shipping_id);
                if ($request->has('redirect_to_home')) {
                    return redirect('/trang-chu');
                }
                return redirect('/payment');
            } else {
                // Nếu chưa có địa chỉ, chuyển đến trang nhập địa chỉ giao hàng
                return redirect('/checkout');
            }


        }

        // Nếu tài khoản không hợp lệ
        return redirect()->back()->with('error', 'Email hoặc mật khẩu không đúng!');
    }
    public function order_place(Request $request){
        $shipping_method = $request->shipping_method;

        // them vao bang payment
        $data = array();
        $data['payment_method'] = $request->payment_option;
        $data['payment_status'] = 'Đang chờ xử lý!';
        $payment_id = DB::table('tbl_payment')->insertGetId($data);

        // lay ma giam gia
        $counpon_session = Session::get('counpon');
        $counpon_percent = 0;
        if (!empty($counpon_session)) {
            $counpon_percent = $counpon_session[0]['counpon_percent']; // lấy phần trăm giảm
        }
        // tinh tong tien thanh toan
        $content = Cart::getContent();
        $subtotal = 0;
        $shipping_id = Shipping::where('customer_id', Session::get('customer_id'))->value('shipping_id');
        foreach ($content as $value) {
            $subtotal += $value->price * $value->quantity;
        }
        $vat = $subtotal * 0.1;
        if ($shipping_method === 'store') {
            $fee_ship = 0;
        }else{
            $shipping_info = Shipping::find($shipping_id);
            $fee_ship = DB::table('tbl_fee_ship')
                ->where('fee_matp', $shipping_info->shipping_matp)
                ->where('fee_maqh', $shipping_info->shipping_maqh)
                ->where('fee_xaid', $shipping_info->shipping_xaid)
                ->value('fee_ship') ?? 0;
        }

        $order_total = $subtotal + $vat + $fee_ship - $counpon_percent;


        // them vao bang order
        $order_date = Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d');
        $checkout_code = substr(md5(microtime()),rand(0,26),5);
        $order_data = array();
        $order_data['customer_id'] = Session::get('customer_id');

        $order_data['shipping_id'] = $shipping_id;
        $order_data['payment_id'] = $payment_id;
        $order_data['order_code'] = $checkout_code;
        $order_data['order_total'] = $order_total;
        $order_data['order_status'] ='Chờ xử lý';
        $order_data['created_at'] = now();
        $order_data['order_date'] = $order_date;
        $order_data['shipping_method'] = $shipping_method;
        $order_data['is_reported'] = false;
        $order_id = DB::table('tbl_order')->insertGetId($order_data);

        // them vao bang order_detail


        foreach($content as $value){
            $order_detail_data['order_id'] = $order_id;
            $order_detail_data['product_id'] = $value->id;
            $order_detail_data['product_name'] = $value->name;
            $order_detail_data['product_price'] = $value->price;
            $order_detail_data['product_sales_quantity'] = $value->quantity;
            $order_detail_data['product_counpon_percent'] = (int)$counpon_percent;

            // Cập nhật số lượng sản phẩm trong kho
            $product = Product::find($value->id);
            if ($product && $product->product_qty >= $value->quantity) {
                // Trừ số lượng sản phẩm trong kho
                $product->product_qty -= $value->quantity;
                $product->save();
            } else {
                // Nếu số lượng sản phẩm không đủ, bạn có thể xử lý lỗi ở đây
                toastr()->error('Sản phẩm ' . $value->name . ' không đủ trong kho');
                return redirect()->back();
            }
            $order_detail_id = DB::table('tbl_order_detail')->insertGetId($order_detail_data);
        }

        $now = Carbon::now('Asia/Ho_Chi_Minh')->format('d-m-Y');
        $title_mail = "Đơn hàng từ FurryFriend";
        $customer = Customer::find(Session::get('customer_id'));
        $data['email'][] = $customer->customer_email;
        $all_order = DB::table('tbl_order')
        ->join('tbl_customer', 'tbl_customer.customer_id', '=', 'tbl_order.customer_id')
        ->join('tbl_shipping', 'tbl_shipping.shipping_id', '=', 'tbl_order.shipping_id')
        ->join('tbl_order_detail','tbl_order_detail.order_id','=','tbl_order.order_id')
        ->join('tbl_product', 'tbl_product.product_id', '=', 'tbl_order_detail.product_id')
        ->join('tbl_payment', 'tbl_payment.payment_id', '=', 'tbl_order.payment_id')

        // JOIN thêm phí ship
        ->leftJoin('tbl_fee_ship', function($join) {
            $join->on('tbl_fee_ship.fee_matp', '=', 'tbl_shipping.shipping_matp')
                 ->on('tbl_fee_ship.fee_maqh', '=', 'tbl_shipping.shipping_maqh')
                 ->on('tbl_fee_ship.fee_xaid', '=', 'tbl_shipping.shipping_xaid');
        })

        ->select(
            'tbl_order.*',
            'tbl_customer.customer_name',
            'tbl_shipping.shipping_address',
            'tbl_shipping.shipping_phone',
            'tbl_shipping.shipping_email',
            'tbl_shipping.shipping_matp',
            'tbl_shipping.shipping_maqh',
            'tbl_shipping.shipping_xaid',
            'tbl_fee_ship.fee_ship', // << Lấy phí ship tại đây
            'tbl_order.created_at as order_created_at',
            'tbl_order_detail.product_name',
            'tbl_order_detail.product_price',
            'tbl_order_detail.product_sales_quantity',
            'tbl_order_detail.product_counpon_percent',
            'tbl_product.product_image',
            'tbl_payment.*'
        )
        ->select( /* như cũ */ )
        ->where('tbl_order.order_code', $checkout_code)
        ->get();
        foreach($content as $val){
            $cart_array[] = array(
                'product_name' => $val->name,
                'product_price' => $val->price,
                'product_sales_quantity' => $val->quantity
            );
        }
        $order_info = $all_order->first();
        $data_mail = array(
            'order_code' => $checkout_code,
            'customer_name' => $order_info->customer_name,
            'payment_method' => $order_info->payment_method,
            'fee_ship' => $order_info->fee_ship,
            'counpon_percent' => $counpon_percent,
            'shipping_address' => $order_info->shipping_address,
            'shipping_phone' => $order_info->shipping_phone
        );


        Mail::send('pages.mail.mail_order',['data' => $data_mail,'cart' => $cart_array],function($message) use($title_mail,$data){
            $message->to($data['email'])->subject($title_mail);
            $message->from($data['email'],$title_mail);
        });


        toastr()->success('Thanh toán thành công');
        Cart::clear();
        Session::forget('counpon');
        return redirect('/history');
    }

    public function history(Request $request){
        if(!Session::get('customer_id')){
            return redirect('login-checkout')->with('error','Vui lòng đăng nhập để xem lịch sử đơn hàng!');
        }else{
            // seo meta
            $meta_desc = "FurryFriend - Cửa hàng trực tuyến chuyên cung cấp đồ dùng, phụ kiện chất lượng cao cho thú cưng, giúp bạn chăm sóc và làm bạn đồng hành của mình hạnh phúc hơn mỗi ngày.";
            $meta_keywords = "Cửa hàng trực tuyến chuyên cung cấp đồ dùng, phụ kiện chất lượng cao cho thú cưng";
            $meta_title = "Lịch sử đơn hàng | FurryFriend";
            $url_canonical = $request->url();
            $category_post = categoryPost::orderby('cate_post_id','desc')->where('cate_post_status','1')->get();

            $get_order = Order::with('payment')->where('customer_id',Session::get('customer_id'))->orderBy('order_id','desc')->paginate(5);;
            return view('pages.history_order.history')->with(compact('get_order','category_post','meta_desc','meta_keywords','meta_title','url_canonical'));
        }

    }
    public function destroy_order_custormer(request $request){
        $data = $request->all();
        $order = Order::where('order_code',$data['order_code'])->first();
        $order->order_destroy = $data['lydohuy'];
        $order->order_status = $data['order_status'];
        $order->save();
    }
    public function history_order_detail(Request $request, $order_code){
        $customer_id = Session::get('customer_id');
        $meta_desc = "FurryFriend - Cửa hàng trực tuyến chuyên cung cấp đồ dùng, phụ kiện chất lượng cao cho thú cưng, giúp bạn chăm sóc và làm bạn đồng hành của mình hạnh phúc hơn mỗi ngày.";
        $meta_keywords = "Cửa hàng trực tuyến chuyên cung cấp đồ dùng, phụ kiện chất lượng cao cho thú cưng";
        $meta_title = "Chi tiết đơn hàng | FurryFriend";
        $url_canonical = $request->url();

        $category_post = categoryPost::orderby('cate_post_id', 'desc')->where('cate_post_status', '1')->get();


        $all_order = DB::table('tbl_order')
            ->join('tbl_customer', 'tbl_customer.customer_id', '=', 'tbl_order.customer_id')
            ->join('tbl_shipping', 'tbl_shipping.shipping_id', '=', 'tbl_order.shipping_id')
            ->join('tbl_order_detail', 'tbl_order_detail.order_id', '=', 'tbl_order.order_id')
            ->join('tbl_product', 'tbl_product.product_id', '=', 'tbl_order_detail.product_id')
            ->join('tbl_payment', 'tbl_payment.payment_id', '=', 'tbl_order.payment_id')

            // JOIN thêm phí ship
            ->leftJoin('tbl_fee_ship', function ($join) {
                $join->on('tbl_fee_ship.fee_matp', '=', 'tbl_shipping.shipping_matp')
                    ->on('tbl_fee_ship.fee_maqh', '=', 'tbl_shipping.shipping_maqh')
                    ->on('tbl_fee_ship.fee_xaid', '=', 'tbl_shipping.shipping_xaid');
            })

            ->select(
                'tbl_order.*',
                'tbl_customer.customer_name',
                'tbl_shipping.shipping_address',
                'tbl_shipping.shipping_phone',
                'tbl_shipping.shipping_email',
                'tbl_shipping.shipping_matp',
                'tbl_shipping.shipping_maqh',
                'tbl_shipping.shipping_xaid',
                'tbl_fee_ship.fee_ship', // << Lấy phí ship tại đây
                'tbl_order.created_at as order_created_at',
                'tbl_order_detail.product_name',
                'tbl_order_detail.product_price',
                'tbl_order_detail.product_sales_quantity',
                'tbl_order_detail.product_counpon_percent',
                'tbl_product.product_image',
                'tbl_payment.*'
            )
            ->where('tbl_customer.customer_id', $customer_id)
            ->where('order_code', $order_code)
            ->orderBy('tbl_order.order_id', 'desc')
            ->get()
            ->groupBy('order_id');
        return view('pages.history_order.history_order_detail')->with(compact('all_order','category_post','meta_desc','meta_keywords','meta_title','url_canonical'));
    }

    // quan ly don hang
    public function authLogin() {
        $admin_id = session::get('admin_id');
        if($admin_id){
            return Redirect::to('dashboard');
        }else{
            return Redirect::to('admin')->send();
        }
    }

    public function manage_order(){
        $this->authLogin();
        $all_order = DB::table('tbl_order')
            ->join('tbl_customer', 'tbl_customer.customer_id', '=', 'tbl_order.customer_id')
            ->join('tbl_shipping', 'tbl_shipping.shipping_id', '=', 'tbl_order.shipping_id')
            ->join('tbl_order_detail', 'tbl_order_detail.order_id', '=', 'tbl_order.order_id')
            ->join('tbl_product', 'tbl_product.product_id', '=', 'tbl_order_detail.product_id')
            ->join('tbl_payment', 'tbl_payment.payment_id', '=', 'tbl_order.payment_id')

            // JOIN thêm phí ship
            ->leftJoin('tbl_fee_ship', function ($join) {
                $join->on('tbl_fee_ship.fee_matp', '=', 'tbl_shipping.shipping_matp')
                    ->on('tbl_fee_ship.fee_maqh', '=', 'tbl_shipping.shipping_maqh')
                    ->on('tbl_fee_ship.fee_xaid', '=', 'tbl_shipping.shipping_xaid');
            })

            ->select(
                'tbl_order.*',
                'tbl_customer.customer_name',
                'tbl_shipping.shipping_address',
                'tbl_shipping.shipping_phone',
                'tbl_shipping.shipping_email',
                'tbl_shipping.shipping_matp',
                'tbl_shipping.shipping_maqh',
                'tbl_shipping.shipping_xaid',
                'tbl_fee_ship.fee_ship', // << Lấy phí ship tại đây
                'tbl_order.created_at as order_created_at',
                'tbl_order_detail.product_name',
                'tbl_order_detail.product_price',
                'tbl_order_detail.product_sales_quantity',
                'tbl_order_detail.product_counpon_percent',
                'tbl_product.product_image',
                'tbl_payment.*'
            )
            ->orderBy('tbl_order.order_id', 'desc')
            ->get()
            ->groupBy('order_id');

        $manage_order = view('admin.manage_order')->with('all_order', $all_order);

        return view('admin_layout')->with('admin.manage_order', $manage_order);
    }


    public function updateStatus(Request $request)
    {
        $order = Order::find($request->order_id);

        if (!$order) {
            return response()->json(['success' => false, 'message' => 'Không tìm thấy đơn hàng']);
        }

        $old_status = $order->order_status;
        $new_status = $request->order_status;

        // Ngăn chuyển từ "Đã huỷ" hoặc "Hoàn trả" sang "Đang giao" hoặc "Đã giao"
        if (in_array($old_status, ['Đã huỷ', 'Hoàn trả']) && in_array($new_status, ['Đang giao', 'Đã giao', 'Chờ xử lý'])) {
            return response()->json(['success' => false, 'message' => 'Không thể cập nhật từ đơn đã huỷ/hoàn trả sang trạng thái giao hàng']);
        }

        $orderDetails = orderDetail::where('order_id', $order->order_id)->get();
        $totalSales = 0;
        $totalQty = 0;
        $totalOrder = 1;
        $profit = 0;

        // Nếu chuyển sang trạng thái cần thống kê và chưa được thống kê
        if (!$order->is_reported && in_array($new_status, ['Đang giao', 'Đã giao'])) {
            foreach ($orderDetails as $detail) {
                $product = Product::find($detail->product_id);
                if ($product) {
                    // Không trừ kho vì đã trừ khi tạo đơn
                    $product->product_sold = ($product->product_sold ?? 0) + $detail->product_sales_quantity;
                    $product->save();

                    $totalSales += $detail->product_price * $detail->product_sales_quantity;
                    $totalQty += $detail->product_sales_quantity;
                    $profit += ($detail->product_price * $detail->product_sales_quantity) * 0.2;
                }
            }

            $today = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();
            $stat = Statistical::firstOrNew(['order_date' => $today]);

            $stat->sales = ($stat->sales ?? 0) + $totalSales;
            $stat->quantity = ($stat->quantity ?? 0) + $totalQty;
            $stat->profit = ($stat->profit ?? 0) + $profit;
            $stat->total_order = ($stat->total_order ?? 0) + $totalOrder;
            $stat->save();

            $order->is_reported = true;
        }

        // Nếu chuyển về trạng thái huỷ/hoàn trả và đã thống kê rồi
        if ($order->is_reported && in_array($new_status, ['Chờ xử lý','Đã huỷ', 'Hoàn trả'])) {
            foreach ($orderDetails as $detail) {
                $product = Product::find($detail->product_id);
                if ($product) {
                    $product->product_qty += $detail->product_sales_quantity;
                    $product->product_sold = max(0, ($product->product_sold ?? 0) - $detail->product_sales_quantity);
                    $product->save();

                    $totalSales -= $detail->product_price * $detail->product_sales_quantity;
                    $totalQty -= $detail->product_sales_quantity;
                    $profit -= ($detail->product_price * $detail->product_sales_quantity) * 0.2;
                }
            }

            $today = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();
            $stat = Statistical::firstOrNew(['order_date' => $today]);

            $stat->sales = max(0, ($stat->sales ?? 0) + $totalSales);
            $stat->quantity = max(0, ($stat->quantity ?? 0) + $totalQty);
            $stat->profit = max(0, ($stat->profit ?? 0) + $profit);
            $stat->total_order = max(0, ($stat->total_order ?? 0) - $totalOrder);
            $stat->save();

            $order->is_reported = false;
        }

        $order->order_status = $new_status;
        $order->save();

        return response()->json(['success' => true, 'message' => 'Cập nhật trạng thái thành công']);
    }



    public function view_order($order_id){
        return view('admin.view_order');
    }
    public function delete_order($order_id){
        $this->authLogin();
        DB::table('tbl_order')->where('order_id', $order_id)->delete();
        toastr()->success('Xóa đơn hàng thành công');

        return Redirect::to('manage-order');
    }
    public function select_delivery_home(Request $request){
        $data = $request->all();
        if($data['action']){
            $output = '';
            if($data['action'] == "city"){
                $select_province = Province::where('matp',$data['matp'])->orderby('maqh','asc')->get();
                $output .= '<option>----Chọn quận/huyện----</option>';
                foreach($select_province as $key => $province){
                    $output .= '<option value="' . $province->maqh .'">' .$province->name . '</option>';
                }

            }else{
                $select_ward = Ward::where('maqh',$data['matp'])->orderby('xaid','asc')->get();
                $output .= '<option>----Chọn xã/phường----</option>';
                foreach($select_ward as $key => $ward){
                    $output .= '<option value="' . $ward->xaid .'">' .$ward->name . '</option>';
                }
            }
            echo $output;
        }
    }

    public function getShippingFeeAuto($customer_id)
    {
        // Lấy thông tin địa chỉ khách hàng từ bảng tbl_shipping
        $shipping = DB::table('tbl_shipping')->where('customer_id', $customer_id)->first();

        if (!$shipping) {
            return response()->json(['fee' => 0]); // Không tìm thấy địa chỉ khách
        }

        // Lấy phí vận chuyển phù hợp từ bảng tbl_fee_shipping
        $fee = DB::table('tbl_fee_ship')
            ->where('fee_matp', $shipping->shipping_matp)
            ->where('fee_maqh', $shipping->shipping_maqh)
            ->where('fee_xaid', $shipping->shipping_xaid)
            ->first();

        return response()->json(['fee' => $fee ? $fee->fee_ship : 0]);
    }

    // in pdf
    public function print_order($order_id){
        $pdf = \App::make('dompdf.wrapper');
        $pdf-> loadHTML($this->print_order_convert($order_id));
        $fileName = 'Hóa đơn bán hàng - ' . $order_id . '.pdf';
        return $pdf->stream($fileName);
    }
    public function print_order_convert($order_id){
        $order = DB::table('tbl_order')
                    ->join('tbl_customer', 'tbl_customer.customer_id', '=', 'tbl_order.customer_id')
                    ->join('tbl_shipping', 'tbl_shipping.shipping_id', '=', 'tbl_order.shipping_id')
                    ->join('tbl_order_detail', 'tbl_order_detail.order_id', '=', 'tbl_order.order_id')
                    ->join('tbl_product', 'tbl_product.product_id', '=', 'tbl_order_detail.product_id')
                    ->join('tbl_payment', 'tbl_payment.payment_id', '=', 'tbl_order.payment_id')
                    // JOIN thêm phí ship
                    ->leftJoin('tbl_fee_ship', function ($join) {
                        $join->on('tbl_fee_ship.fee_matp', '=', 'tbl_shipping.shipping_matp')
                            ->on('tbl_fee_ship.fee_maqh', '=', 'tbl_shipping.shipping_maqh')
                            ->on('tbl_fee_ship.fee_xaid', '=', 'tbl_shipping.shipping_xaid');
                    })
                    ->select(
                        'tbl_order.*',
                        'tbl_customer.customer_name',
                        'tbl_shipping.shipping_address',
                        'tbl_shipping.shipping_phone',
                        'tbl_shipping.shipping_email',
                        'tbl_shipping.shipping_matp',
                        'tbl_shipping.shipping_maqh',
                        'tbl_shipping.shipping_xaid',
                        'tbl_fee_ship.fee_ship', // << Lấy phí ship tại đây
                        'tbl_order.created_at as order_created_at',
                        'tbl_order_detail.product_name',
                        'tbl_order_detail.product_price',
                        'tbl_order_detail.product_sales_quantity',
                        'tbl_order_detail.product_counpon_percent',
                        'tbl_product.product_image',
                        'tbl_payment.*'
                    )
                    ->where('tbl_order.order_id', $order_id) // Lọc theo order_id
                    ->get();

       $output = '';
       $output .='<head>
                    <title>Hóa đơn bán hàng - Đơn hàng '.$order_id.'</title>
                </head>
       <style>body{
                        font-family: DejaVu Sans;
                    }
                    .title { text-align: center; font-size: 20px; font-weight: bold; }
                    .header-info {width: 100%;border-collapse: collapse;}
                    .header-info th, .header-info td  { border: 1px solid black; padding: 8px; text-align: center; }
                    .signatures { margin-top: 20px; text-align: center; width: 100%; }
                    .signatures div { display: inline-block; width: 45%; }
                    th { background-color: #f2f2f2; }
                 </style>
                <div class="title">HÓA ĐƠN BÁN HÀNG</div>
            <table >
                <tr>
                    <td><strong>Tên khách hàng:</strong> '.$order->first()->customer_name.'</td>
                </tr>
                <tr>
                    <td><strong>Địa chỉ:</strong> '.$order->first()->shipping_address.' </td>
                </tr>
                <tr>
                    <td><strong>Số điện thoại:</strong> '.$order->first()->shipping_phone.' </td>
                </tr>
                <tr>
                    <td><strong>Phương thức thanh toán:</strong> '.$order->first()->payment_method.' </td>
                </tr>
            </table>
            <table class="header-info">
                <tr>
                    <th>TT</th>
                    <th>Tên sản phẩm</th>
                    <th>Số lượng</th>
                    <th>Đơn giá</th>

                </tr>';

                 $total = 0;
                foreach($order as $key => $item){

                    $subtotal = $item->product_price * $item->product_sales_quantity;
                    $total += $subtotal;
            $output.='
                    <tr>
                        <td>' . $key + 1 . '</td>
                        <td> '.$item->product_name.' </td>
                        <td> '.$item->product_sales_quantity.' </td>
                        <td>' .number_format($item->product_price, 0, ',', '.'). ' VNĐ</td>

                    </tr>';
                }
                $vat = $total * 0.1; // VAT 10%
                $shipping_method = $order->first()->shipping_method ?? '';
                        if ($shipping_method == 'store') {
                            $shipping_fee = 0; // Nếu là nhận tại cửa hàng, phí vận chuyển là 0
                        } else {
                            $shipping_fee = $order->first()->fee_ship ?? 0; // Lấy phí ship nếu không phải nhận tại cửa hàng
                        }

                $discount_amount = $order->first()->product_counpon_percent ?? 0;

                $total_payment = $total + $vat + $shipping_fee - $discount_amount;
            $output.='

            </table>
            <div style="margin-top: 20px; text-align: right;">
                <p><strong>Tạm tính:</strong>'.number_format($total, 0, ',', '.').' VNĐ</p>
                <p><strong>Thuế VAT (10%):</strong>'.number_format($vat, 0, ',', '.').' VNĐ</p>
                <p><strong>Phí vận chuyển:</strong>'.number_format($shipping_fee, 0, ',', '.').' VNĐ</p>
                <p><strong>Giảm giá: </strong> '.number_format($order->first()->product_counpon_percent ?? 0, 0, ',', '.').' VNĐ</p>

                <p style="font-size: 18px; font-weight: bold; color: #e74c3c;">Tổng thanh toán: '.number_format($total_payment, 0, ',', '.').' VNĐ</p>
            </div>
            <div class="signatures">
                <div>Khách hàng</div>
                <div>Người bán hàng</div>
            </div>
            ';
        return $output;
    }
}
