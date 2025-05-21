@extends('admin_layout')
@section('admin_content')

<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Liệt kê mã giảm giá
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
            <th>Tên mã giảm giá</th>
            <th>Mã giảm giá</th>
            <th>Ngày bắt đầu</th>
            <th>Ngày kết thúc</th>
            <th>Số lượng mã</th>
            <th>Phần trăm giảm giá</th>
            <th>Hết hạn</th>
            <th>Gửi mã</th>
            <th style="width:90px;">Thao tác</th>
          </tr>
        </thead>
        <tbody>
            @foreach($counpon as $key => $counpon)
          <tr>
            <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
            <td>{{ $counpon->counpon_name }}</td>
            <td>{{ $counpon->counpon_code }}</td>
            <td>{{ $counpon->counpon_date_start }}</td>
            <td>{{ $counpon->counpon_date_end }}</td>
            <td>{{ $counpon->counpon_qty }}</td>
            <td>
                @if($counpon->counpon_function == 1)
                    Giảm {{ $counpon->counpon_percent }}%
                @else
                    Giảm {{ number_format($counpon->counpon_percent, 0, ',', '.') }} VNĐ
                @endif
            </td>
            <td>
                @if(strtotime($counpon->counpon_date_end) >= strtotime($today))
                    <span style="color:green;">Còn hạn</span>
                @else
                    <span style="color: red;">Hết hạn</span>
                @endif
            </td>

            <td>
                @if($counpon->counpon_date_end >= $today)
                <p><a href="{{url('/send-counpon/'.$counpon->counpon_id)}}" class="btn btn-default">Gửi mã</a></p>
                @endif
            </td>
            <td>
                <a onclick="return confirm('Bạn có chắc chắn muốn xóa ?')" style="font-size: 20px;" href="{{URL::to('/delete-counpon/'.$counpon->counpon_id)}}" ui-toggle-class=""><i class="fa fa-times text-danger text"></i></a>
              </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>

  </div>
</div>
@endsection
