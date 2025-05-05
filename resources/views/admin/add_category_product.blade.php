@extends('admin_layout')
@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Thêm danh mục sản phẩm
                        </header>
                        <div class="panel-body">
                            <div class="position-center">
                                <form role="form" action="{{URL::to('/save-category-product')}}" method="post">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Tên danh mục</label>
                                        <input type="text" name="category_product_name" class="form-control" onkeyup="ChangeToSlug();" id="slug" placeholder="Enter email">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Slug</label>
                                        <input type="text" name="category_product_slug" class="form-control" id="convert_slug" placeholder="slug">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Mô tả danh mục</label>
                                        <textarea style="resize: none" rows="5" name="category_product_desc" class="form-control" id="ckeditor1" placeholder="Mô tả danh mục">

                                        </textarea>
                                    </div>
                                    <div class="form-group">
                                    <label for="exampleInputPassword1">Thuộc danh mục</label>
                                        <select name="category_parent" class="form-control input-sm m-bot15">
                                            <option value="0">Chọn danh mục cha</option>
                                            @foreach($category_product as $key => $value)
                                                @if($value->category_parent == 0)
                                                    <option value="{{$value->category_id}}">{{$value->category_name}}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                    <label for="exampleInputPassword1">Hiển thị</label>
                                        <select name="category_product_status" class="form-control input-sm m-bot15">
                                            <option value="0">Ẩn</option>
                                            <option value="1">Hiển thị</option>

                                        </select>
                                    </div>

                                    <button type="submit" name="add_category_product" class="btn btn-info">Thêm</button>
                            </form>
                            </div>

                        </div>
                    </section>
</div>
@endsection
