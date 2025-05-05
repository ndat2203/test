@extends('admin_layout')
@section('admin_content')

<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Liệt kê bài viết
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
            <th>Tên bài viết</th>
            <th>Danh mục bài viết</th>
            <th>Slug</th>
            <th>Mô tả bài viết</th>
            <th>Hình ảnh</th>
            <th>Trạng thái</th>
            <th style="width:90px;">Thao tác</th>
          </tr>
        </thead>
        <tbody>
            @foreach($posts as $key => $post)
          <tr>
            <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
            <td>{{ $post->post_title }}</td>
            <td>{{ $post->category->cate_post_name }}</td>
            <td>{{ $post->post_slug }}</td>
            <td>{{ $post->post_desc }}</td>
            <td><img src="public/upload/post/{{ $post->post_image }}" height="100" weight="100"></td>

            <td>
                @if($post->post_status == 0)
                    <a href="{{ URL::to('/unactive-post/'.$post->post_id) }}">Ẩn</a>
                @else
                    <a href="{{ URL::to('/active-post/'.$post->post_id) }}">Hiển thị</a>
                @endif

            </td>
            <td>
              <a style="font-size: 20px;" href="{{URL::to('/edit-post/'.$post->post_id)}}" ui-toggle-class=""><i class="fa fa-pencil-square-o text-success text-active"></i></a>
              <a onclick="return confirm('Bạn có chắc chắn muốn xóa ?')" style="font-size: 20px;" href="{{URL::to('/delete-post/'.$post->post_id)}}" ui-toggle-class=""><i class="fa fa-times text-danger text"></i></a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection
