@extends('admin_layout')
@section('admin_content')

<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Liệt kê sản phẩm
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
            <th>Tên sản phẩm</th>
            <th>Slug</th>
            <th>Giá</th>
            <th>Số lượng</th>
            <th>Danh mục</th>
            <th>Thương hiệu</th>
            <th>Thư viện ảnh</th>
            <th>Hình ảnh</th>
            <th>Trạng thái</th>
            <th style="width:90px;">Thao tác</th>
          </tr>
        </thead>
        <tbody>
            @foreach($all_product as $key => $product)
          <tr>
            <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
            <td>{{ $product->product_name }}</td>
            <td>{{ $product->product_slug }}</td>
            <td>{{ $product->product_price }}</td>
            <td>{{ $product->product_qty }}</td>
            <td>{{ $product->category_name }}</td>
            <td>{{ $product->brand_name }}</td>
            <td><a href="{{url('/add-gallery/'.$product->product_id )}}">Thêm ảnh</a></td>
            <td><img src="public/upload/product/{{ $product->product_image }}" height="100" weight="100"></td>

            <td>
                @if($product->product_status == 0)
                    <a href="{{ URL::to('/unactive-product/'.$product->product_id) }}">Ẩn</a>
                @else
                    <a href="{{ URL::to('/active-product/'.$product->product_id) }}">Hiển thị</a>
                @endif

            </td>
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
