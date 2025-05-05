<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Hóa Đơn Bán Hàng</title>
    <style>
        body { font-family: Arial, sans-serif; }
        table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        th, td { border: 1px solid black; padding: 8px; text-align: center; }
        th { background-color: #f2f2f2; }
        .title { text-align: center; font-size: 20px; font-weight: bold; }
        .header-info { width: 100%; margin-bottom: 10px; }
        .signatures { margin-top: 20px; text-align: center; width: 100%; }
        .signatures div { display: inline-block; width: 45%; }
    </style>
</head>
<body>
    <div class="title">HÓA ĐƠN BÁN HÀNG</div>
    <table class="header-info">
        <tr>
            <td><strong>Tên khách hàng:</strong> {{ $order[0]->customer_name }}</td>
        </tr>
        <tr>
            <td><strong>Địa chỉ:</strong> {{ $order[0]->shipping_address }}</td>
        </tr>
        <tr>
            <td><strong>Số điện thoại:</strong> {{ $order[0]->shipping_phone }}</td>
        </tr>
    </table>

    <table>
        <tr>
            <th>TT</th>
            <th>Tên hàng</th>
            <th>Số lượng</th>
            <th>Đơn giá</th>
            <th>Thành tiền</th>
        </tr>
        @php $total = 0; @endphp
        @foreach($order as $key => $item)
            @php
                $subtotal = $item->product_price * $item->product_sales_quantity;
                $total += $subtotal;
            @endphp
            <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $item->product_name }}</td>
                <td>{{ $item->product_sales_quantity }}</td>
                <td>{{ number_format($item->product_price, 0, ',', '.') }} VNĐ</td>
                <td>{{ number_format($subtotal, 0, ',', '.') }} VNĐ</td>
            </tr>
        @endforeach
        <tr>
            <td colspan="4"><strong>Tổng cộng</strong></td>
            <td><strong>{{ number_format($total, 0, ',', '.') }} VNĐ</strong></td>
        </tr>
    </table>

    <div class="signatures">
        <div>Khách hàng</div>
        <div>Người bán hàng</div>
    </div>
</body>
</html>
