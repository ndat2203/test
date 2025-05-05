<?php

namespace App\Http\Controllers;

use Session;
use Carbon\Carbon;
use App\Models\Counpon;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
session_start();
class counponController extends Controller
{
    public function authLogin() {
        $admin_id = session::get('admin_id');
        if($admin_id){
            return Redirect::to('dashboard');
        }else{
            return Redirect::to('admin')->send();
        }
    }
    public function add_counpon(){
        $this->authLogin();
        return View('admin.counpon.add_counpon');
    }
    public function save_counpon(Request $request){
        $this->authLogin();
        $data = $request->all();
        $counpon = new Counpon;
        $counpon->counpon_name = $data['counpon_name'];
        $counpon->counpon_code = $data['counpon_code'];
        $counpon->counpon_date_start = $data['counpon_date_start'];
        $counpon->counpon_date_end = $data['counpon_date_end'];
        $counpon->counpon_qty = $data['counpon_qty'];
        $counpon->counpon_percent = $data['counpon_percent'];
        $counpon->counpon_function = $data['counpon_function'];

        $counpon->save();
        toastr()->success('Thêm mã giảm giá thành công');
        return Redirect('all-counpon');
    }
    public function all_counpon(){
        $this->authLogin();
        $today = Carbon::now('Asia/Ho_Chi_Minh')->format('d-m-Y');

        $counpon = Counpon::orderby('counpon_id','desc')->get();
        return View('admin.counpon.all_counpon')->with(compact('counpon','today'));
    }
    public function delete_counpon($counpon_id){
        $this->authLogin();
        $counpon = Counpon::find($counpon_id);
        $counpon->delete();
        toastr()->success('Xóa mã giảm giá thành công');
        return Redirect::to('all-counpon');
    }
    public function send_counpon($counpon_id){
        $customer = Customer::orderBy('customer_name','desc')->get();
        $now = Carbon::now('Asia/Ho_Chi_Minh')->format('d-m-Y H:i:s');
        $title_mail = 'Mã khuyến mãi ngày' .' '.$now;
        $counpon = Counpon::find($counpon_id);
        $data = [];
        foreach($customer as $key){
            $data['email'][] =  $key->customer_email;
        }
        $data['counpon'] = $counpon;
        Mail::send('admin.counpon.send_counpon',$data,function($message) use($title_mail,$data){
            $message->to($data['email'])->subject($title_mail);
            $message->from($data['email'],$title_mail);
        });
        return Redirect()->back()->with('message','Gửi mã giảm giá thành công');

    }
    public function view_counpon(){
        $counpon = Counpon::orderBy('counpon_id','desc')->first(); // lấy mã mớ
        return view('admin.counpon.send_counpon')->with(compact('counpon'));
    }
}
