@extends('admin_layout')
@section('admin_content')

<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Liệt kê thương hiệu sản phẩm
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
            <th>Tên thương hiệu</th>
            <th>Slug</th>
            <th>Mô tả</th>
            <th>Trạng thái</th>
            <th style="width:90px;">Thao tác</th>
          </tr>
        </thead>
        <tbody>
            @foreach($all_brand_product as $key => $brand)
          <tr>
            <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
            <td>{{ $brand->brand_name }}</td>
            <td>{{ $brand->brand_slug }}</td>
            <td>{{ $brand->brand_desc }}</td>
            <td>
                @if($brand->brand_status == 0)
                    <a href="{{ URL::to('/unactive-brand-product/'.$brand->brand_id) }}">Ẩn</a>
                @else
                    <a href="{{ URL::to('/active-brand-product/'.$brand->brand_id) }}">Hiển thị</a>
                @endif

            </td>
            <td>
              <a style="font-size: 20px;" href="{{URL::to('/edit-brand-product/'.$brand->brand_id)}}" ui-toggle-class=""><i class="fa fa-pencil-square-o text-success text-active"></i></a>
              <a onclick="return confirm('Bạn có chắc chắn muốn xóa ?')" style="font-size: 20px;" href="{{URL::to('/delete-brand-product/'.$brand->brand_id)}}" ui-toggle-class=""><i class="fa fa-times text-danger text"></i></a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>

  </div>
</div>
@endsection
