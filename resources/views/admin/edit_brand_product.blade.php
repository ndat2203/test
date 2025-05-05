@extends('admin_layout')
@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Cập nhật thương hiệu sản phẩm
                        </header>
                        <div class="panel-body">
                            @foreach($edit_brand_product as $key => $edit_brand)
                            <div class="position-center">
                                <form role="form" action="{{URL::to('/update-brand-product/'.$edit_brand->brand_id)}}" method="post">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên thương hiệu</label>
                                    <input type="text" value="{{ $edit_brand->brand_name }}" name="brand_product_name" class="form-control" onkeyup="ChangeToSlug();" id="slug" placeholder="Enter email">
                                </div>
                                <div class="form-group">
                                        <label for="exampleInputPassword1">Slug</label>
                                        <input type="text" name="brand_product_slug" class="form-control" id="convert_slug" placeholder="slug">
                                    </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Mô tả thương hiệu</label>
                                    <textarea style="resize: none" rows="5" name="brand_product_desc" class="form-control" id="exampleInputPassword1">{{ $edit_brand->brand_desc }}</textarea>
                                </div>
                                <button type="submit" name="update_brand_product" class="btn btn-info">Cập nhật</button>
                            </form>
                            </div>
                            @endforeach
                        </div>
                    </section>
</div>
@endsection
