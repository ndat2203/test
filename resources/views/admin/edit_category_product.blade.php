@extends('admin_layout')
@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Cập nhật danh mục sản phẩm
                        </header>
                        <div class="panel-body">
                            @foreach($edit_category_product as $key => $edit_category)
                            <div class="position-center">
                                <form role="form" action="{{URL::to('/update-category-product/'.$edit_category->category_id)}}" method="post">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên danh mục</label>
                                    <input type="text" value="{{ $edit_category->category_name }}" name="category_product_name" class="form-control" onkeyup="ChangeToSlug();" id="slug" placeholder="Enter email">
                                </div>

                                <div class="form-group">
                                        <label for="exampleInputPassword1">Slug</label>
                                        <input type="text" name="category_product_slug" class="form-control" id="convert_slug" placeholder="slug">
                                    </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">Thuộc danh mục</label>
                                        <select name="category_parent" class="form-control input-sm m-bot15">
                                            <option value="0">Chọn danh mục cha</option>
                                            @foreach($category_product as $key => $parent)
                                                @if($parent->category_parent == 0)
                                                    <option value="{{$parent->category_id}}">
                                                        {{$parent->category_name}}
                                                    </option>

                                                    @foreach($category_product as $key1 => $child)
                                                        @if($child->category_parent == $parent->category_id)
                                                            <option
                                                                value="{{$child->category_id}}"
                                                                {{ $child->category_id == $edit_category->category_id ? 'selected' : '' }}>
                                                                ----- {{$child->category_name}} -----
                                                            </option>
                                                        @endif
                                                    @endforeach
                                                @endif
                                            @endforeach

                                        </select>
                                    </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Mô tả danh mục</label>
                                    <textarea style="resize: none" rows="5" name="category_product_desc" class="form-control" id="exampleInputPassword1">{{ $edit_category->category_desc }}</textarea>
                                </div>

                                <button type="submit" name="update_category_product" class="btn btn-info">Cập nhật</button>
                            </form>
                            </div>
                            @endforeach
                        </div>
                    </section>
</div>
@endsection
