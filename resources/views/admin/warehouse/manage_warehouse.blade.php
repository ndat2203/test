@extends('admin_layout')
@section('admin_content')

<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Quản lý tồn kho

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
            <th>Hình ảnh</th>
            <th>Tên sản phẩm</th>
            <th>Ngày nhập</th>
            <th>Tổng nhập</th>
            <th>Đã bán</th>
            <th>Tồn kho</th>
            <th style="width:90px;">Thao tác</th>
          </tr>
        </thead>
        <tbody>
            @foreach($all_product as $key => $product)
          <tr>
            <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
            <td><img src="public/upload/product/{{ $product->product_image }}" height="100" weight="100"></td>
            <td>{{ $product->product_name }}</td>
            <td>{{ $product->import_date ? date('d-m-Y', strtotime($product->import_date)) : '' }}</td>
            <td>{{ $product->import_qty }}</td>
            <td>{{ $product->product_sold }}</td>
            <td>{{ $product->product_qty }}</td>
            <td>
              <a style="font-size: 20px;" href="{{URL::to('/edit-product/'.$product->product_id)}}" ui-toggle-class=""><i class="fa fa-pencil-square-o text-success text-active"></i></a>
              <a onclick="return confirm('Bạn có chắc chắn muốn xóa ?')" style="font-size: 20px;" href="{{URL::to('/delete-product/'.$product->product_id)}}" ui-toggle-class=""><i class="fa fa-times text-danger text"></i></a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection
