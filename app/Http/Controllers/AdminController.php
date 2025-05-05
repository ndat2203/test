<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;
use App\Models\Statistical;
use App\Models\Visitor;
use App\Models\Product;
use App\Models\Post;
use App\Models\Customer;
use App\Models\Order;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();

class AdminController extends Controller
{
    public function index(){
        return View('admin_login');
    }
    public function authLogin() {
        $admin_id = session::get('admin_id');
        if($admin_id){
            return Redirect::to('dashboard');
        }else{
            return Redirect::to('admin')->send();
        }
    }
    public function showDashboard(){
        $this->authLogin();
        $product = Product::all()->count();
        $post = Post::all()->count();
        $order = Order::all()->count();
        $customer = Customer::all()->count();

        $post_view = Post::orderBy('post_view','desc')->take(10)->get();
        $product_view = Product::orderBy('product_view','desc')->take(10)->get();
        return View('admin.dashboard')->with(compact('product','post','order','customer','post_view','product_view'));
    }
    public function dashboard(Request $request){
        $admin_email = $request->admin_email;
        $admin_password =md5($request->admin_password);

        $result= DB::table('tbl_admin')
                ->where('admin_email',$admin_email)
                ->where('admin_password',$admin_password)
                ->first();
        if($result){
            Session::put('admin_name',$result->admin_name);
            Session::put('admin_id',$result->admin_id);
            return Redirect::to('/dashboard');
        }
        return redirect()->back()->with('error', 'Email hoặc mật khẩu không đúng!');

    }

    public function logout(){
        $this->authLogin();
        Session::forget(['admin_name', 'admin_id']);
        return Redirect::to('/login-checkout');
    }
    public function filter_date(Request $request){
        $data = $request->all();
        $from_date = $data['from_date'];
        $to_date = $data['to_date'];

        $statistical = Statistical::whereBetween('order_date',[$from_date,$to_date])->orderBy('order_date','asc')->get();
        $chart_data = [];
        foreach($statistical as $key => $val){
            $chart_data[] = array(
                'period' => $val->order_date,
                'order' => (int) $val->total_order,
                'sales' => (float) $val->sales,
                'profit' => (float) $val->profit,
                'quantity' => (int) $val->quantity
            );
        }
        return response()->json($chart_data);

    }
    public function dashboard_filter(Request $request){
        $data = $request->all();

        $dauthangnay = Carbon::now('Asia/Ho_Chi_Minh')->startOfMonth()->toDateString();
        $dauthangtruoc = Carbon::now('Asia/Ho_Chi_Minh')->subMonth()->startOfMonth()->toDateString();
        $cuoithangtruoc = Carbon::now('Asia/Ho_Chi_Minh')->subMonth()->endOfMonth()->toDateString();

        $sub7days = Carbon::now('Asia/Ho_Chi_Minh')->subdays(7)->toDateString();
        $sub365days = Carbon::now('Asia/Ho_Chi_Minh')->subdays(365)->toDateString();
        $now = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();
        if($data['dashboard_value'] == '7ngay'){
            $get = Statistical::whereBetween('order_date',[$sub7days,$now])->orderBy('order_date','asc')->get();

        }elseif($data['dashboard_value'] == 'thangtruoc'){
            $get = Statistical::whereBetween('order_date',[$dauthangtruoc,$cuoithangtruoc])->orderBy('order_date','asc')->get();
        }elseif($data['dashboard_value'] == 'thangnay'){
            $get = Statistical::whereBetween('order_date',[$dauthangnay,$now])->orderBy('order_date','asc')->get();
        }elseif($data['dashboard_value'] == '365ngay'){
            $get = Statistical::whereBetween('order_date',[$sub365days,$now])->orderBy('order_date','asc')->get();
        }
        $chart_data = [];
        foreach($get as $key => $val){
            $chart_data[] = array(
                'period' => $val->order_date,
                'order' => (int) $val->total_order,
                'sales' => (float) $val->sales,
                'profit' => (float) $val->profit,
                'quantity' => (int) $val->quantity
            );
        }
        return response()->json($chart_data);
    }
    public function days_order(Request $request){
        $sub7days = Carbon::now('Asia/Ho_Chi_Minh')->subdays(7)->toDateString();
        $now = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();
        $get = Statistical::whereBetween('order_date',[$sub7days,$now])->orderBy('order_date','asc')->get();
        $chart_data = [];
        foreach($get as $key => $val){
            $chart_data[] = array(
                'period' => $val->order_date,
                'order' => (int) $val->total_order,
                'sales' => (float) $val->sales,
                'profit' => (float) $val->profit,
                'quantity' => (int) $val->quantity
            );
        }
        return response()->json($chart_data);
    }
    public function visitor_data()
    {
        $today = Carbon::today();
        $sevenDaysAgo = Carbon::today()->subDays(7);
        $data = Visitor::select('date_visitor as period', DB::raw('COUNT(*) as total'))
            ->whereBetween('date_visitor', [$sevenDaysAgo, $today])
            ->groupBy('date_visitor')
            ->orderBy('date_visitor', 'asc')
            ->get();

        return response()->json($data);
    }

    public function list_customer(Request $request){
        $customers = Customer::orderby('customer_id','desc')->get();
        return view('admin.customer.list_customer')->with(compact('customers'));
    }
    public function updateRole(Request $request, $customer_id)
    {
        $customer = Customer::find($customer_id);

        if (!$customer) {
            return redirect()->back()->with('error', 'Khách hàng không tồn tại');
        }

        $newRole = $request->input('role');
        if (!in_array($newRole, ['admin', 'user'])) {
            return redirect()->back()->with('error', 'Phân quyền không hợp lệ');
        }

        $customer->customer_role = $newRole;
        $customer->save();

        return redirect()->route('list_customer')->with('success', 'Cập nhật phân quyền thành công');
    }
}
