<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Srmklive\PayPal\Services\PayPal as PayPalClient;
class PaypalController extends Controller
{
   public function createTransaction(){
    return view('pages.paypal.paypal');
   }
   public function processTransaction(Request $request){
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $provider->getAccessToken();

        $usdAmount = $request->input('amount'); // Giá trị truyền từ AJAX

        $response = $provider->createOrder([
            "intent" => "CAPTURE",
            "application_context" => [
                "return_url" => route("successTransaction"),
                "cancel_url" => route("cancelTransaction"),
            ],
            "purchase_units" => [
                [
                    "amount" => [
                        "currency_code" => "USD",
                        "value" => $usdAmount,
                    ]
                ]
            ]
        ]);

        if(isset($response['id']) && $response['id'] != NULL){
            foreach($response['links'] as $link){
                if($link['rel'] === 'approve'){
                    // Nếu là AJAX (từ JS) thì trả JSON
                    if ($request->ajax()) {
                        return response()->json(['redirect_url' => $link['href']]);
                    }
                    // Nếu không phải AJAX thì redirect như thường
                    return redirect()->away($link['href']);
                }
            }
        }

        // Nếu lỗi
        if ($request->ajax()) {
            return response()->json(['error' => $response['message'] ?? 'Lỗi thanh toán!'], 400);
        }
        dd($response);
        return redirect()->route('createTransaction')->with('error', $response['message'] ?? 'Lỗi thanh toán!');
    }

    public function successTransaction(Request $request){
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $provider->getAccessToken();
        $response = $provider->capturePaymentOrder($request['token']);

        if(isset($response['status']) && $response['status'] == 'COMPLETED'){
            // ✅ Gọi lưu đơn hàng tại đây
            $fakeRequest = new Request();
            $fakeRequest->replace([
                'payment_option' => 'Thanh toán bằng Paypal'
            ]);
            app()->call('App\Http\Controllers\checkOutController@order_place', ['request' => $fakeRequest]);

            return redirect()->route('history');
        } else {
            return redirect()->route('payment')->with('error', $response['message'] ?? 'Lỗi thanh toán!');
        }
    }

    public function cancelTransaction(Request $request){
        return redirect()->route('payment')->with('error', $response['message'] ?? 'Bạn đã hủy giao dịch');
    }




}
