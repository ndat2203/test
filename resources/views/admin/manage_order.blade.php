@extends('admin_layout')
@section('admin_content')

    <div class="table-agile-info">
      <div class="panel panel-default">
        <div class="panel-heading">
          Liệt kê đơn hàng
        </div>

        <div class="table-responsive">
          <table class="table table-striped b-t b-light" id="example">
            <thead>
              <tr>
                <th style="width:20px;">
                  <label class="i-checks m-b-none">
                    <input type="checkbox"><i></i>
                  </label>
                </th>
                <th>Mã đơn hàng</th>
                <th>Tên người đặt</th>
                <th>Ngày đặt</th>
                <th>Trạng thái thanh toán</th>
                <th>Tình trạng</th>
                <th>Giá trị đơn hàng</th>
                <th style="width:90px;">Thao tác</th>
              </tr>
            </thead>
            <tbody>
            @foreach($all_order as $order_id => $order_items)
                <tr>
                    <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
                    <td>{{ $order_items->first()->order_code }}</td>
                    <td>{{ $order_items->first()->customer_name }}</td>
                    <td>{{ $order_items->first()->order_date }}</td>
                    <td> {{ $order_items->first()->payment_method }}</td>
                    @php
                    $statuses = ['Chờ xử lý', 'Đang giao', 'Đã giao', 'Đã huỷ', 'Hoàn trả'];
                    $currentStatus = $order_items->first()->order_status;
                    $orderId = $order_items->first()->order_id;
                    @endphp
                    <td>
                        <select class="form-control order-status-select" data-order-id="{{ $orderId }}">
                            @foreach ($statuses as $status)
                                <option value="{{ $status }}" {{ $currentStatus == $status ? 'selected' : '' }}>
                                    {{ $status }}
                                </option>
                            @endforeach
                        </select>
                    </td>
                    @php
                        $subtotal = 0;
                        foreach ($order_items as $item) {
                            $subtotal += $item->product_price * $item->product_sales_quantity;
                        }

                        $vat = $subtotal * 0.1; // VAT 10%
                        $shipping_method = $order_items->first()->shipping_method ?? '';
                        if ($shipping_method == 'store') {
                            $shipping_fee = 0; // Nếu là nhận tại cửa hàng, phí vận chuyển là 0
                        } else {
                            $shipping_fee = $order_items->first()->fee_ship ?? 0; // Lấy phí ship nếu không phải nhận tại cửa hàng
                        }
                        $discount_amount = $order_items->first()->product_counpon_percent ?? 0;

                        $total_payment = $subtotal + $vat + $shipping_fee - $discount_amount;
                    @endphp
                    <td>{{ number_format($total_payment, 0, ',', '.') }} VNĐ</td>

                    <td>
                        <a style="font-size: 20px; cursor: pointer;" data-toggle="modal" data-target="#orderModal{{$order_id}}">
                            <i class="fa fa-eye text-success"></i>
                        </a>

                        <!-- Modal Bootstrap -->
                        <div id="orderModal{{$order_id}}" class="modal fade" role="dialog">
                            <div class="modal-dialog modal-lg">
                              <div class="modal-content" style="border-radius: 16px; box-shadow: 0 4px 20px rgba(0,0,0,0.15); font-family: 'Segoe UI', sans-serif;">

                                <!-- Header -->
                                <div class="modal-header" style="background-color: #f5f7fa; border-bottom: 1px solid #e1e8ed; border-top-left-radius: 16px; border-top-right-radius: 16px;">
                                  <button type="button" class="close" data-dismiss="modal" style="font-size: 24px;">&times;</button>
                                  <h4 class="modal-title" style="font-weight: 600; color: #2c3e50;">Chi tiết đơn hàng {{$order_items->first()->order_code}}</h4>
                                </div>

                                <!-- Body -->
                                <div class="modal-body" style="padding: 24px;">
                                  <div class="row" style="margin-bottom: 16px;">
                                    <div class="col-md-6" style="margin-bottom: 12px;">
                                      <p style="margin: 4px 0;"><strong style="color: #2c3e50;">Khách hàng:</strong> {{ $order_items->first()->customer_name }}</p>
                                      <p style="margin: 4px 0;"><strong style="color: #2c3e50;">Địa chỉ:</strong> {{ $order_items->first()->shipping_address }}</p>
                                    </div>
                                    <div class="col-md-6">
                                      <p style="margin: 4px 0;"><strong style="color: #2c3e50;">Email:</strong> {{ $order_items->first()->shipping_email }}</p>
                                      <p style="margin: 4px 0;"><strong style="color: #2c3e50;">Số điện thoại:</strong> {{ $order_items->first()->shipping_phone }}</p>
                                    </div>
                                  </div>

                                  <p style="margin: 10px 0 20px;"><strong style="color: #2c3e50;">Ngày đặt hàng:</strong> {{ \Carbon\Carbon::parse($order_items->first()->order_created_at)->format('d-m-Y') }}</p>

                                  <h4 style="margin-bottom: 16px; color: #34495e;">Danh sách sản phẩm</h4>

                                  <!-- Table -->
                                  <table class="table table-bordered" style="background-color: #fff; border: 1px solid #dee2e6;">
                                    <thead style="background-color: #f0f2f5;">
                                      <tr>
                                        <th style="padding: 12px;">Hình ảnh</th>
                                        <th style="padding: 12px;">Tên sản phẩm</th>
                                        <th style="padding: 12px;">Số lượng</th>
                                        <th style="padding: 12px;">Giá</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      @foreach($order_items as $product)
                                      <tr>
                                        <td style="padding: 12px;">
                                          <img src="{{ asset('public/upload/product/' . $product->product_image) }}" width="60" height="60" style="object-fit: cover; border-radius: 8px; border: 1px solid #ccc;">
                                        </td>
                                        <td style="padding: 12px; vertical-align: middle;">{{ $product->product_name }}</td>
                                        <td style="padding: 12px; vertical-align: middle;">{{ $product->product_sales_quantity }}</td>
                                        <td style="padding: 12px; vertical-align: middle;">{{ number_format($product->product_price, 0, ',', '.') }} VND</td>
                                      </tr>
                                      @endforeach
                                    </tbody>
                                  </table>
                                    @php
                    $subtotal = 0;
                    foreach ($order_items as $item) {
                        $subtotal += $item->product_price * $item->product_sales_quantity;
                    }

                    $vat = $subtotal * 0.1; // VAT 10%
                    $shipping_method = $order_items->first()->shipping_method ?? '';
                        if ($shipping_method == 'store') {
                            $shipping_fee = 0; // Nếu là nhận tại cửa hàng, phí vận chuyển là 0
                        } else {
                            $shipping_fee = $order_items->first()->fee_ship ?? 0; // Lấy phí ship nếu không phải nhận tại cửa hàng
                        }
                    $discount_amount = $order_items->first()->product_counpon_percent ?? 0;

                    $total_payment = $subtotal + $vat + $shipping_fee - $discount_amount;
                                    @endphp
                                    <div style="margin-top: 20px; text-align: right;">
                                        <p><strong>Tạm tính:</strong> {{ number_format($subtotal, 0, ',', '.') }} VNĐ</p>
                                        <p><strong>Thuế VAT (10%):</strong> {{ number_format($vat, 0, ',', '.') }}  VNĐ</p>
                                        <p><strong>Phí vận chuyển:</strong>
                                            @if($order_items->first()->shipping_method == 'store')
                                                0 VNĐ
                                            @else
                                                {{ number_format($order_items->first()->fee_ship ?? 0, 0, ',', '.') }} VNĐ
                                            @endif
                                        </p>
                                        <p><strong>Giảm giá: </strong> {{ number_format($order_items->first()->product_counpon_percent ?? 0, 0, ',', '.') }}  VNĐ</p>
                                        <hr style="border-top: 1px dashed #ccc;">
                                        <p style="font-size: 18px; font-weight: bold; color: #e74c3c;">Tổng thanh toán: {{ number_format($total_payment, 0, ',', '.') }}  VNĐ</p>
                                    </div>
                                </div>

                                <!-- Footer -->
                                <div class="modal-footer" style="border-top: 1px solid #e1e8ed; padding: 16px 24px; border-bottom-left-radius: 16px; border-bottom-right-radius: 16px;">
                                  <a target="_blank" href="{{url('/print-order/' . $order_id)}}" style="margin-right: auto;">
                                    <button style="background-color: #3498db; color: white; border: none; padding: 8px 16px; border-radius: 6px; cursor: pointer;">In đơn hàng</button>
                                  </a>
                                  <button type="button" class="btn btn-default" data-dismiss="modal" style="padding: 8px 16px; border-radius: 6px;">Đóng</button>
                                </div>

                              </div>
                            </div>
                          </div>


                        <a onclick="return confirm('Bạn có chắc chắn muốn xóa ?')" style="font-size: 20px;" href="{{URL::to('/delete-order/' . $order_id)}}">
                            <i class="fa fa-times text-danger"></i>
                        </a>
                    </td>
                </tr>
            @endforeach

            </tbody>
          </table>
        </div>
      </div>
    </div>
@endsection

{{-- <script>
$(document).ready(function(){
    $(".view-order").click(function(){
        var order_id = $(this).data("order_id");

        $.ajax({
            url: "/admin/get-order-details",
            method: "GET",
            data: { order_id: order_id },
            success: function(response){
                $("#orderModal .modal-body").html(response);
                $("#orderModal").modal("show");
            }
        });
    });
});
</script> --}}
