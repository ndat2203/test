@extends('admin_layout')
@section('admin_content')

<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Liệt kê danh mục bài viết
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
            <th>Tên danh mục bài viết</th>
            <th>Slug</th>
            <th>Mô tả</th>
            <th>Trạng thái</th>
            <th style="width:90px;">Thao tác</th>
          </tr>
        </thead>
        <tbody>
            @foreach($categoryPost as $key => $categoryPost)
          <tr>
            <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
            <td>{{ $categoryPost->cate_post_name }}</td>
            <td>{{ $categoryPost->cate_post_slug }}</td>
            <td>{{ $categoryPost->cate_post_desc }}</td>
            <td>
                @if($categoryPost->cate_post_status == 0)
                    <a href="{{ URL::to('/unactive-category-post/'.$categoryPost->cate_post_slug) }}">Ẩn</a>
                @else
                    <a href="{{ URL::to('/active-category-post/'.$categoryPost->cate_post_slug) }}">Hiển thị</a>
                @endif

            </td>
            <td>
              <a style="font-size: 20px;" href="{{URL::to('/edit-category-post/'.$categoryPost->cate_post_id)}}" ui-toggle-class=""><i class="fa fa-pencil-square-o text-success text-active"></i></a>
              <a onclick="return confirm('Bạn có chắc chắn muốn xóa ?')" style="font-size: 20px;" href="{{URL::to('/delete-category-post/'.$categoryPost->cate_post_id)}}" ui-toggle-class=""><i class="fa fa-times text-danger text"></i></a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>

  </div>
</div>
@endsection
