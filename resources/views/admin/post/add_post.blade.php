@extends('admin_layout')
@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Thêm bài viết
                        </header>
                        <div class="panel-body">
                            <div class="position-center">
                                <form role="form" action="{{URL::to('/save-post')}}" method="post" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Tên bài viết</label>
                                        <input type="text" name="post_title" onkeyup="ChangeToSlug();" id="slug" class="form-control"  placeholder="Enter email">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Slug</label>
                                        <input type="text" name="post_slug" class="form-control" id="convert_slug" placeholder="slug">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Mô tả bài viết</label>
                                        <textarea style="resize: none" rows="5" name="post_desc" class="form-control" id="ckeditor1" placeholder="Mô tả">

                                        </textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Nội dung bài viết</label>
                                        <textarea style="resize: none" rows="5" name="post_content" class="form-control" id="ckeditor2" placeholder="Nội dung bài viết">

                                        </textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Hình ảnh bài viết</label>
                                        <input type="file" name="post_image" class="form-control" id="exampleInputEmail1" placeholder="Nhập hình ảnh">
                                    </div>
                                    <div class="form-group">
                                    <label for="exampleInputPassword1">Thuộc danh mục bài viết</label>
                                        <select name="cate_post_id" class="form-control input-sm m-bot15">
                                            <option value="0">Chọn danh mục cha</option>
                                            @foreach($cate_post as $key => $value)
                                                <option value="{{$value->cate_post_id}}">{{$value->cate_post_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                    <label for="exampleInputPassword1">Hiển thị</label>
                                        <select name="post_status" class="form-control input-sm m-bot15">
                                            <option value="0">Ẩn</option>
                                            <option value="1">Hiển thị</option>

                                        </select>
                                    </div>

                                    <button type="submit" name="add_post" class="btn btn-info">Thêm</button>
                            </form>
                            </div>

                        </div>
                    </section>
</div>
@endsection
