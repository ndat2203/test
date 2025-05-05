@extends('admin_layout')
@section('admin_content')

<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Liệt kê chi phí ship từng nơi
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
            <th>Tên thành phố</th>
            <th>Tên quận huyện</th>
            <th>Tên xã phường</th>
            <th>Phí ship</th>
            <th style="width:90px;">Thao tác</th>
          </tr>
        </thead>
        <tbody>
            @foreach($fee_ship as $key => $fee_ship)
          <tr>
            <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
            <td>{{ $fee_ship->city->name }}</td>
            <td>{{ $fee_ship->province->name }}</td>
            <td>{{ $fee_ship->ward->name }}</td>
            <td>{{ number_format($fee_ship->fee_ship, 0, ',', '.') }} VNĐ</td>

            <td>
              <a onclick="return confirm('Bạn có chắc chắn muốn xóa ?')" style="font-size: 20px;" href="{{URL::to('/delete-delivery/'.$fee_ship->fee_id)}}" ui-toggle-class=""><i class="fa fa-times text-danger text"></i></a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>

  </div>
</div>
@endsection
