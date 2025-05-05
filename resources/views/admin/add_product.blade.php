@extends('admin_layout')
@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Thêm sản phẩm
                        </header>
                        <div class="panel-body">
                            <div class="position-center">
                                <form role="form" action="{{URL::to('/save-product')}}" method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên sản phẩm</label>
                                    <input type="text" name="product_name" onkeyup="ChangeToSlug();" id="slug" class="form-control" placeholder="Nhập tên sản phẩm">
                                </div>
                                <div class="form-group">
                                        <label for="exampleInputPassword1">Slug</label>
                                        <input type="text" name="product_slug" class="form-control" id="convert_slug" placeholder="slug">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Vị sản phẩm</label>
                                    <!-- Nơi hiển thị chất liệu đã chọn -->
                                    <div id="selected-taste" style="margin-top: 10px;">
                                        <!-- Các chất liệu được chọn sẽ hiển thị tại đây -->
                                    </div>
                                    <select id="taste_select" name="taste_id[]" class="form-control input-sm m-bot15" multiple>
                                        @foreach($taste_list as $taste)
                                            <option value="{{ $taste->taste_id }}">{{ $taste->taste_name }}</option>
                                        @endforeach
                                    </select>
                                    <small>Giữ Ctrl để chọn nhiều vị</small>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Số lượng sản phẩm</label>
                                    <input type="text" name="product_qty" class="form-control" id="exampleInputEmail1" placeholder="Nhập số lượng sản phẩm">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Giá sản phẩm</label>
                                    <input type="text" name="product_price" class="form-control" id="exampleInputEmail1" placeholder="Nhập giá sản phẩm">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Giá sản phẩm khuyến mãi( nếu có )</label>
                                    <input type="text" name="product_discount_price" class="form-control" id="exampleInputEmail1" placeholder="Nhập giá khuyến mãi sản phẩm">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Mô tả sản phẩm</label>
                                    <textarea style="resize: none" rows="8" name="product_desc" class="form-control" id="ckeditor1" placeholder="Mô tả sản phẩm">

                                    </textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Nội dung sản phẩm</label>
                                    <textarea style="resize: none" rows="8" name="product_content" class="form-control" id="ckeditor" placeholder="Nội dung sản phẩm">

                                    </textarea>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Hình ảnh sản phẩm</label>
                                    <input type="file" name="product_image" class="form-control" id="exampleInputEmail1" placeholder="Nhập hình ảnh sản phẩm">
                                </div>
                                <div class="form-group">
                                <label for="exampleInputPassword1">Danh mục sản phẩm</label>
                                    <select name="product_category" class="form-control input-sm m-bot15">
                                        @foreach($category_product as $key => $value)
                                            <option value="{{($value->category_id)}}">{{($value->category_name)}}</option>
                                        @endforeach

                                     </select>
                                </div>
                                <div class="form-group">
                                <label for="exampleInputPassword1">Thương hiệu sản phẩm</label>
                                    <select name="product_brand" class="form-control input-sm m-bot15">
                                        @foreach($brand_product as $key => $value)
                                            <option value="{{($value->brand_id)}}">{{($value->brand_name)}}</option>
                                        @endforeach

                                     </select>
                                </div>
                                <div class="form-group">
                                <label for="exampleInputPassword1">Hiển thị</label>
                                    <select name="product_status" class="form-control input-sm m-bot15">
                                        <option value="0">Ẩn</option>
                                        <option value="1">Hiển thị</option>

                                     </select>
                                </div>

                                <button type="submit" name="add_product" class="btn btn-info">Thêm</button>
                            </form>
                            </div>

                        </div>
                    </section>
</div>
@endsection


