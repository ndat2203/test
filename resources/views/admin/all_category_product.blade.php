@extends('admin_layout')
@section('admin_content')

<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Liệt kê danh mục sản phẩm
    </div>
<form>
    @csrf
    <div class="table-responsive">
      <table class="table table-striped b-t b-light" id="example">
        <thead>
          <tr>
            <th style="width:20px;">
              <label class="i-checks m-b-none">
                <input type="checkbox"><i></i>
              </label>
            </th>
            <th>Tên danh mục</th>
            <th>Slug</th>
            <th>Thuộc danh mục</th>
            <th>Mô tả</th>
            <th>Trạng thái</th>
            <th style="width:90px;">Thao tác</th>
          </tr>
        </thead>
        <style>
            #category_order .ui-state-highlight{
                padding: 24px;
                background-color: #ffffcc;
                border: 1px dotted #ccc;
                cursor: move;
                margin-top: 12px;
            }
        </style>
        <tbody id="category_order">
            @foreach($all_category_product as $key => $category)
          <tr id="{{ $category->category_id }}">
            <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
            <td>{{ $category->category_name }}</td>
            <td>{{ $category->category_slug }}</td>
            <td>
                @if($category->category_parent == 0 )
                    <span style="color:red;">Danh mục cha</span>
                @else
                    @foreach($category_product as $key => $cat_sub)
                     @if($cat_sub->category_id == $category->category_parent)
                        <span style="color:green;">{{$cat_sub->category_name}}</span>
                     @endif
                    @endforeach
                @endif
            </td>
            <td>{{ $category->category_desc }}</td>
            <td>
                @if($category->category_status == 0)
                    <a href="{{ URL::to('/unactive-category-product/'.$category->category_id) }}">Ẩn</a>
                @else
                    <a href="{{ URL::to('/active-category-product/'.$category->category_id) }}">Hiển thị</a>
                @endif

            </td>
            <td>
              <a style="font-size: 20px;" href="{{URL::to('/edit-category-product/'.$category->category_id)}}" ui-toggle-class=""><i class="fa fa-pencil-square-o text-success text-active"></i></a>
              <a onclick="return confirm('Bạn có chắc chắn muốn xóa ?')" style="font-size: 20px;" href="{{URL::to('/delete-category-product/'.$category->category_id)}}" ui-toggle-class=""><i class="fa fa-times text-danger text"></i></a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
</form>

  </div>
</div>
@endsection
