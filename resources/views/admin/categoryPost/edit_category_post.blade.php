@extends('admin_layout')
@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Cập nhật danh mục sản phẩm
                        </header>
                        <div class="panel-body">
                            <div class="position-center">
                                <form role="form" action="{{URL::to('/update-category-post/'.$categoryPost->cate_post_id)}}" method="post">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên danh mục</label>
                                    <input type="text" value="{{ $categoryPost->cate_post_name }}" onkeyup="ChangeToSlug();" id="slug" name="cate_post_name" class="form-control" placeholder="Enter email">
                                </div>
                                <div class="form-group">
                                        <label for="exampleInputPassword1">Slug</label>
                                        <input type="text" name="cate_post_slug" class="form-control" id="convert_slug" placeholder="slug">
                                    </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Mô tả danh mục</label>
                                    <textarea style="resize: none" rows="5" name="cate_post_desc" class="form-control" id="exampleInputPassword1">{{ $categoryPost->cate_post_desc }}</textarea>
                                </div>

                                <button type="submit" name="update_category_post" class="btn btn-info">Cập nhật</button>
                            </form>
                            </div>
                        </div>
                    </section>
</div>
@endsection
