@extends('admin_layout')
@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Cập nhật sản phẩm
                        </header>
                        <div class="panel-body">
                            <div class="position-center">
                            @foreach($edit_product as $key => $edit_product)
                                <form role="form" action="{{URL::to('/update-product/'.$edit_product->product_id)}}" method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên sản phẩm</label>
                                    <input type="text" name="product_name" class="form-control" onkeyup="ChangeToSlug();" id="slug" value="{{$edit_product->product_name}}">
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
                                    <label for="exampleInputEmail1">Giá sản phẩm</label>
                                    <input type="text" name="product_price" class="form-control" id="exampleInputEmail1" value="{{$edit_product->product_price}}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Giá sản phẩm khuyến mãi( nếu có )</label>
                                    <input type="text" name="product_discount_price" class="form-control" id="exampleInputEmail1" value="{{$edit_product->product_discount_price}}" placeholder="Nhập giá khuyến mãi sản phẩm">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Số lượng sản phẩm</label>
                                    <input type="text" name="product_qty" class="form-control" id="exampleInputEmail1" value="{{$edit_product->product_qty}}" placeholder="Nhập số lượng sản phẩm">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Mô tả sản phẩm</label>
                                    <textarea style="resize: none" rows="5" name="product_desc" class="form-control" id="ckeditor3" value="">
                                        {{$edit_product->product_desc}}
                                    </textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Nội dung sản phẩm</label>
                                    <textarea style="resize: none" rows="5" name="product_content" class="form-control" id="ckeditor2" value="">
                                        {{$edit_product->product_content}}
                                    </textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Hình ảnh sản phẩm</label>
                                    <input type="file" name="product_image" class="form-control" id="exampleInputEmail1" placeholder="Nhập hình ảnh sản phẩm">
                                    <img height="100" weight="100" src="{{URL::to('public/upload/product/'.$edit_product->product_image)}}">
                                </div>
                                <div class="form-group">
                                <label for="exampleInputPassword1">Danh mục sản phẩm</label>
                                    <select name="product_category" class="form-control input-sm m-bot15">
                                        @foreach($category_product as $key => $value)
                                            @if($value->category_id == $edit_product->category_id)
                                                <option selected value="{{($value->category_id)}}">{{($value->category_name)}}</option>
                                            @else
                                                <option value="{{($value->category_id)}}">{{($value->category_name)}}</option>
                                            @endif
                                        @endforeach

                                     </select>
                                </div>
                                <div class="form-group">
                                <label for="exampleInputPassword1">Thương hiệu sản phẩm</label>
                                    <select name="product_brand" class="form-control input-sm m-bot15">
                                        @foreach($brand_product as $key => $value)
                                            @if($value->brand_id == $edit_product->brand_id)
                                                <option selected value="{{($value->brand_id)}}">{{($value->brand_name)}}</option>
                                            @else
                                                <option value="{{($value->brand_id)}}">{{($value->brand_name)}}</option>
                                            @endif
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
                                <button type="submit" name="update_brand_product" class="btn btn-info">Cập nhật</button>
                            </form>
                            </div>
                            @endforeach
                        </div>
                    </section>
</div>
@endsection
<!-- Script xử lý -->
{{-- <script>
    document.addEventListener('DOMContentLoaded', function() {
    const tasteSelect = document.getElementById('taste_select');
    const selectedTasteDiv = document.getElementById('selected-taste');

    // Lắng nghe sự kiện thay đổi chọn
    tasteSelect.addEventListener('change', function() {
        const selectedValues = Array.from(tasteSelect.selectedOptions).map(option => option.value);
        updateSelectedTastes(selectedValues);
    });

    // Cập nhật hiển thị các chất liệu đã chọn
    function updateSelectedTastes(selectedValues) {
        selectedTasteDiv.innerHTML = ''; // Xóa các chất liệu cũ

        selectedValues.forEach(value => {
            const tasteText = tasteSelect.querySelector(`option[value="${value}"]`).text;

            // Tạo span cho mỗi chất liệu đã chọn
            const tasteSpan = document.createElement('span');
            tasteSpan.classList.add('taste-item');
            tasteSpan.style.cssText = `
                display: inline-block;
                background-color: #e0f7fa;
                padding: 5px 10px;
                margin: 5px;
                border-radius: 5px;
                color: #00796b;
                font-weight: bold;
                position: relative;
            `;
            tasteSpan.innerHTML = `
                ${tasteText}
                <button type="button" style="
                    background: none;
                    border: none;
                    color: red;
                    font-weight: bold;
                    margin-left: 8px;
                    cursor: pointer;
                    font-size: 16px;
                " onclick="removeTaste('${value}')">×</button>
            `;

            selectedTasteDiv.appendChild(tasteSpan);
        });
    }

    // Hàm xóa chất liệu
    window.removeTaste = function(value) {
        const option = tasteSelect.querySelector(`option[value="${value}"]`);
        if (option) {
            option.selected = false; // Bỏ chọn chất liệu đã xóa
        }

        const selectedValues = Array.from(tasteSelect.selectedOptions).map(option => option.value);
        updateSelectedTastes(selectedValues);
    };
});

</script> --}}
