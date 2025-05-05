<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\City;
use App\Models\Province;
use App\Models\Ward;
use App\Models\feeShip;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();
class deliveryController extends Controller
{
    public function authLogin() {
        $admin_id = session::get('admin_id');
        if($admin_id){
            return Redirect::to('dashboard');
        }else{
            return Redirect::to('admin')->send();
        }
    }
    public function add_fee_delivery(){
        $city =  City::orderby('matp','desc')->get();

        return View('admin.delivery.add_delivery')->with(compact('city'));
    }
    public function select_delivery(Request $request){
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
        }
        echo $output;
    }
    public function save_fee_delivery(Request $request){
        $data = $request->all();
        $fee_ship = new feeShip();
        $fee_ship->fee_matp = $data['city'];
        $fee_ship->fee_maqh = $data['province'];
        $fee_ship->fee_xaid = $data['ward'];
        $fee_ship->fee_ship = $data['fee_ship'];
        $fee_ship->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Thêm phí vận chuyển thành công!',
            'redirect_url' => url('/all-fee-delivery') // URL cần chuyển hướng
        ], 200);
    }
    public function all_fee_delivery(){
        $fee_ship = feeShip::orderby('fee_id','desc')->get();
        return View('admin.delivery.all_delivery')->with(compact('fee_ship'));
    }
    public function delete_delivery($fee_id){
        $this->authLogin();
        $feeShip = feeShip::find($fee_id);
        if ($feeShip) {
            $feeShip->delete();
            toastr()->success('Xóa phí di chuyển thành công');
        } else {
            toastr()->error('Phí di chuyển không tồn tại');
        }

        return Redirect::to('all-fee-delivery');
    }
}
