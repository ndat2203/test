<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class momoController extends Controller
{
    public function execPostRequest($url, $data)
    {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'Content-Type: application/json',
                'Content-Length: ' . strlen($data))
        );
        curl_setopt($ch, CURLOPT_TIMEOUT, 5);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
        //execute post
        $result = curl_exec($ch);
        //close connection
        curl_close($ch);
        return $result;
    }
    public function momo_payment(Request $request) {
        $endpoint = "https://test-payment.momo.vn/gw_payment/transactionProcessor";

        $partnerCode = 'MOMOBKUN20180529';
        $accessKey = 'klm05TvNBzhg7h7j';
        $secretKey = 'at67qH6mk8w5Y1nAyMoYKMWACiEi2bsa';
        $orderInfo = "Thanh toán qua MoMo";
        $amount = $_POST['amount']; // Amount được truyền qua POST
        $orderId = time() . ""; // Tạo orderId bằng thời gian
        $returnUrl = route('momo_return'); // Đảm bảo đường dẫn hợp lệ
        $notifyUrl = "http://yourdomain.com/atm/ipn_momo.php"; // Đảm bảo đây là URL hợp lệ, không phải localhost
        $bankCode = "SML"; // Mã ngân hàng

        $requestId = time() . ""; // ID của yêu cầu
        $requestType = "payWithMoMoATM";
        $extraData = ""; // Không cần dữ liệu thêm thì để rỗng

        // Xây dựng rawHash cho MoMo
        $rawHash = "partnerCode=".$partnerCode
                 . "&accessKey=".$accessKey
                 . "&requestId=".$requestId
                 . "&bankCode=".$bankCode
                 . "&amount=".$amount
                 . "&orderId=".$orderId
                 . "&orderInfo=".$orderInfo
                 . "&returnUrl=".$returnUrl
                 . "&notifyUrl=".$notifyUrl
                 . "&extraData=".$extraData
                 . "&requestType=".$requestType;

        // Tính toán chữ ký (signature)
        $signature = hash_hmac("sha256", $rawHash, $secretKey);

        // Gửi dữ liệu tới MoMo
        $data =  array(
            'partnerCode' => $partnerCode,
            'accessKey' => $accessKey,
            'requestId' => $requestId,
            'amount' => $amount,
            'orderId' => $orderId,
            'orderInfo' => $orderInfo,
            'returnUrl' => $returnUrl,
            'bankCode' => $bankCode,
            'notifyUrl' => $notifyUrl,
            'extraData' => $extraData,
            'requestType' => $requestType,
            'signature' => $signature
        );

        // Gửi request đến MoMo và nhận kết quả
        $result = $this->execPostRequest($endpoint, json_encode($data));
        $jsonResult = json_decode($result, true);  // Decode JSON response từ MoMo

        error_log(print_r($jsonResult, true));  // Log kết quả để xem có gì sai sót

        // Trả về đường link thanh toán cho frontend
        return response()->json(['payUrl' => $jsonResult['payUrl']]);
    }


    public function momo_return(Request $request)
{
    // Lấy thông tin từ URL trả về từ MoMo
    $partnerCode = $request->input('partnerCode');
    $accessKey = $request->input('accessKey');
    $orderId = $request->input('orderId');
    $amount = $request->input('amount');
    $orderInfo = $request->input('orderInfo');
    $transId = $request->input('transId');
    $message = $request->input('message');
    $localMessage = $request->input('localMessage');
    $responseCode = $request->input('errorCode'); // Sử dụng errorCode từ MoMo
    $payType = $request->input('payType');
    $signature = $request->input('signature');
    $orderType = $request->input('orderType'); // Thêm tham số orderType từ MoMo
    $extraData = $request->input('extraData'); // Thêm extraData

    // Xây dựng rawHash theo đúng thứ tự tham số
    $rawHash = "partnerCode=" . $partnerCode
             . "&accessKey=" . $accessKey
             . "&orderId=" . $orderId
             . "&amount=" . $amount
             . "&orderInfo=" . $orderInfo
             . "&transId=" . $transId
             . "&message=" . $message
             . "&localMessage=" . $localMessage
             . "&responseCode=" . $responseCode
             . "&payType=" . $payType
             . "&orderType=" . $orderType
             . "&extraData=" . $extraData;

    // Sử dụng đúng secretKey mà bạn đã đăng ký với MoMo
    $secretKey = 'at67qH6mk8w5Y1nAyMoYKMWACiEi2bsa'; // Đảm bảo bạn đang dùng đúng secretKey
    $expectedSignature = hash_hmac("sha256", $rawHash, $secretKey);

    // Kiểm tra trạng thái giao dịch
    if ($responseCode == "0") { // Nếu mã lỗi là 0, giao dịch thành công
        try {
            // Tạo giả lập request để gọi lại hàm order_place
            $fakeRequest = new Request();
            $fakeRequest->replace([
                'payment_option' => 'MoMo',
                'orderId' => $orderId,
                'amount' => $amount,
                'orderInfo' => $orderInfo
            ]);

            // Gọi hàm order_place để lưu đơn hàng
            app()->call('App\Http\Controllers\checkOutController@order_place', ['request' => $fakeRequest]);

            // Chuyển hướng đến trang lịch sử với thông báo thành công
            return redirect('/history');
        } catch (\Exception $e) {
            return redirect('/history')->with('error', 'Có lỗi khi lưu đơn hàng: ' . $e->getMessage());
        }
    } else {
        // Giao dịch thất bại, thông báo lỗi
        return redirect('/history')->with('error', 'Thanh toán thất bại. Mã lỗi: ' . $message);
    }
}




}
