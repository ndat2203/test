@extends('admin_layout')
@section('admin_content')

<!-- Modal Bootstrap -->
<div id="orderModal{{ $order->order_id }}" class="modal fade" role="dialog" style="display:block;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" onclick="window.history.back();">&times;</button>
                <h4 class="modal-title">Chi tiết đơn hàng {{ $order->order_id }}</h4>
            </div>
            <div class="modal-body">
                <p><strong>Khách hàng: {{ $order->customer_name }}</strong></p>
                <p><strong>Địa chỉ: {{ $order->shipping_address }}</strong></p>
                <p><strong>Số điện thoại: {{ $order->shipping_phone }}</strong></p>
                <p><strong>Ngày đặt hàng: {{ \Carbon\Carbon::parse($order->order_created_at)->format('d-m-Y') }}</strong></p>

                <!-- Bảng hiển thị chi tiết sản phẩm -->
                <h4>Danh sách sản phẩm</h4>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Tên sản phẩm</th>
                            <th>Số lượng</th>
                            <th>Giá</th>
                            <th>Tổng tiền</th>
                        </tr>
                    </thead>
                    <tbody>
                      z
                        <tr>
                            <td>{{ $detail->product_name }}</td>
                            <td>{{ $detail->product_sales_quantity }}</td>
                            <td>{{ number_format($detail->product_price, 0, ',', '.') }} VND</td>
                            <td>{{ number_format($detail->product_sales_quantity * $detail->product_price, 0, ',', '.') }} VND</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" onclick="window.history.back();">Đóng</button>
            </div>
        </div>
    </div>
</div>

@endsection
