<?php

namespace App\Http\Controllers;

use Session;
use App\Models\Shipping;
use Darryldecode\Cart\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\Customer;

class vnPayController extends Controller
{
    public function vnpay_payment(){
        error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
        date_default_timezone_set('Asia/Ho_Chi_Minh');

        $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
        $vnp_Returnurl = "http://localhost/DoAn/vnpay_return";
        $vnp_TmnCode = "IS3BFJKA";//Mã website tại VNPAY
        $vnp_HashSecret = "EOL7XDHX1OKHA1WBLMT71BFAJGB2YBTM"; //Chuỗi bí mật

        $vnp_TxnRef = $_POST['order_id']; //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
        $vnp_OrderInfo = 'Thanh toán đơn hàng online';
        $vnp_OrderType = 'billpayment';
        $vnp_Amount = $_POST['amount'] * 100;
        $vnp_Locale = $_POST['language'];
        $vnp_BankCode = $_POST['bank_code'];
        $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];
        //Add Params of 2.0.1 Version
        $vnp_ExpireDate = $_POST['txtexpire'];
        //Billing
        $vnp_Bill_Mobile = $_POST['txt_billing_mobile'];
        $vnp_Bill_Email = $_POST['txt_billing_email'];

        $inputData = array(
            "vnp_Version" => "2.1.0",
            "vnp_TmnCode" => $vnp_TmnCode,
            "vnp_Amount" => $vnp_Amount,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => $vnp_OrderInfo,
            "vnp_OrderType" => $vnp_OrderType,
            "vnp_ReturnUrl" => $vnp_Returnurl,
            "vnp_TxnRef" => $vnp_TxnRef,
            "vnp_ExpireDate"=>$vnp_ExpireDate,

        );

        if (isset($vnp_BankCode) && $vnp_BankCode != "") {
            $inputData['vnp_BankCode'] = $vnp_BankCode;
        }
        if (isset($vnp_Bill_State) && $vnp_Bill_State != "") {
            $inputData['vnp_Bill_State'] = $vnp_Bill_State;
        }

        //var_dump($inputData);
        ksort($inputData);
        $query = "";
        $i = 0;
        $hashdata = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
            } else {
                $hashdata .= urlencode($key) . "=" . urlencode($value);
                $i = 1;
            }
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }

        $vnp_Url = $vnp_Url . "?" . $query;
        if (isset($vnp_HashSecret)) {
            $vnpSecureHash =   hash_hmac('sha512', $hashdata, $vnp_HashSecret);//
            $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
        }
        $returnData = array('code' => '00'
            , 'message' => 'success'
            , 'data' => $vnp_Url);
            if (isset($_POST['redirect'])) {
                header('Location: ' . $vnp_Url);
                die();
            } else {
                echo json_encode($returnData);
            }
            // vui lòng tham khảo thêm tại code demo

    }
    public function vnpay_return(Request $request)
    {
        $vnp_HashSecret = "EOL7XDHX1OKHA1WBLMT71BFAJGB2YBTM"; // Chuỗi bí mật

        // Lấy dữ liệu từ VNPAY trả về
        $inputData = $request->all();
        $vnp_SecureHash = $inputData['vnp_SecureHash'];
        unset($inputData['vnp_SecureHash']);
        unset($inputData['vnp_SecureHashType']);

        // Xử lý dữ liệu trả về từ VNPAY
        ksort($inputData);
        $hashData = '';
        $i = 0;
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashData .= '&' . urlencode($key) . "=" . urlencode($value);
            } else {
                $hashData .= urlencode($key) . "=" . urlencode($value);
                $i = 1;
            }
        }

        // Kiểm tra tính hợp lệ của dữ liệu trả về từ VNPAY
        $secureHash = hash_hmac('sha512', $hashData, $vnp_HashSecret);

        // Kiểm tra mã giao dịch và checksum
        if ($secureHash === $vnp_SecureHash) {
            if ($request->vnp_ResponseCode == '00') {

                // Giao dịch thành công
                $fakeRequest = new Request();
                $fakeRequest->replace([
                    'payment_option' => 'VNPAY'
                ]);
                app()->call('App\Http\Controllers\checkOutController@order_place', ['request' => $fakeRequest]);
                return redirect('/history');
            } else {
                // Giao dịch thất bại
                return redirect('/history')->with('error', 'Thanh toán thất bại. Mã lỗi: ' . $request->vnp_ResponseCode);
            }
        } else {
            // Sai checksum
            return redirect('/history')->with('error', 'Dữ liệu không hợp lệ (sai checksum).');
        }
    }


}
