@extends('welcome')
@section('content')

    <div class="features_items"><!--features_items-->
                        <h2 style="margin-top:5px;" class="title text-center">Sản phẩm mới nhất</h2>
                        <div class="row" style="margin-bottom: 24px; justify-content: center;">
                            <div class="col-md-4" style="display: flex; flex-direction: column;">
                            <label for="sort" style="font-weight: 600; font-size: 16px; color: #333; margin-bottom: 8px;margin-left: 15px;">Sắp xếp theo</label>
                                <form action="" style="width: 100%;">
                                    @csrf
                                    <select name="sort" id="sort" class="form-control"
                                        style="width: 100%; padding: 7px 14px; border-radius: 10px; border: 1px solid #ccc; font-size: 15px; background-color: #fff; color: #333; box-shadow: 0 2px 5px rgba(0,0,0,0.05); transition: 0.3s;margin-left: 15px;">
                                        <option value="{{ Request::url() }}?sort_by=none" {{ request('sort_by') == 'none' ? 'selected' : '' }}>--Lọc--</option>
                                        <option value="{{ Request::url() }}?sort_by=tang_dan" {{ request('sort_by') == 'tang_dan' ? 'selected' : '' }}>Giá tăng dần</option>
                                        <option value="{{ Request::url() }}?sort_by=giam_dan" {{ request('sort_by') == 'giam_dan' ? 'selected' : '' }}>Giá giảm dần</option>
                                        <option value="{{ Request::url() }}?sort_by=kytu_az" {{ request('sort_by') == 'kytu_az' ? 'selected' : '' }}>A đến Z</option>
                                        <option value="{{ Request::url() }}?sort_by=kytu_za" {{ request('sort_by') == 'kytu_za' ? 'selected' : '' }}>Z đến A</option>

                                    </select>
                                </form>
                            </div>
                            <div class="col-md-5" style="margin: 0 auto; padding:0 16px;">
                                <label for="amount"
                                    style="font-weight: 600; font-size: 16px; color: #333; margin-bottom: 12px; display: block;margin-left: 12px;">
                                    Lọc theo giá
                                </label>

                                <form action="" method="GET" style="display: flex; align-items: center; gap: 16px;">
                                    <div style="flex-grow: 1;">
                                        <div id="slider-range" style="margin-bottom: 8px;margin-left: 20px;"></div>

                                        <input type="text" id="amount" readonly
                                            style="border: none; background: transparent; color: #f5891f; font-weight: bold; text-align: center; width: 100%; font-size: 15px; margin-top: 4px;">

                                        <input type="hidden" name="start_price" id="start_price">
                                        <input type="hidden" name="end_price" id="end_price">
                                    </div>

                                    <button type="submit" name="filter_price"
                                        style="padding: 10px 20px; font-weight: 600; border-radius: 8px; background-color: #f5891f; border: none; color: white; cursor: pointer; transition: background 0.3s; margin-top: -6px;">
                                        Lọc
                                    </button>

                                </form>
                            </div>
                        </div>

                        @foreach($all_product as $key => $product)
                            <div class="col-sm-4">
                                <div class="product-image-wrapper">

                                    <div class="single-products">
                                        <div class="productinfo text-center" style="height: 391px;">
                                            <form>
                                            @csrf
                                                <a id="wishlish_productUrl{{$product->product_id}}" href="{{ URL::to('chi-tiet-san-pham/' . $product->product_slug) }}">
                                                    <div style="position: relative;">
                                                        <img id="wishlish_productImage{{$product->product_id}}" src="{{ URL::to('public/upload/product/' . $product->product_image) }}" alt="" style="height: 200px; object-fit: cover; width: 100%;" />

                                                        @if (!empty($product->product_discount_price))
                                                            <span style="position: absolute; top: 10px; left: 10px; background-color: red; color: white; padding: 3px 8px; font-size: 12px; border-radius: 4px;">
                                                                Giảm giá
                                                            </span>
                                                        @endif
                                                    </div>
                                                    @if (!empty($product->product_discount_price))
                                                        <h2 style="font-size: 18px; display: flex; flex-wrap: wrap; align-items: center;">
                                                            <span style="text-decoration: line-through; color: #999; font-size: 16px; margin-right: 10px;">
                                                                {{ number_format($product->product_price, 0, ',', '.') }} VNĐ
                                                            </span>
                                                            <span style="color: #fe980f; font-size: 18px;">
                                                                {{ number_format($product->product_discount_price, 0, ',', '.') }} VNĐ
                                                            </span>
                                                        </h2>
                                                    @else
                                                        <h2 style="color: #fe980f; font-size: 18px;">
                                                            {{ number_format($product->product_price, 0, ',', '.') }} VNĐ
                                                        </h2>
                                                    @endif

                                                    <p>{{ $product->product_name }}</p>
                                                </a>
                                                <input type="hidden" class="cart_product_id_{{ $product->product_id }}" value="{{ $product->product_id }}">
                                                <input type="hidden" id="wishlist_productName{{$product->product_id}}" class="cart_product_name_{{ $product->product_id }}" value="{{ $product->product_name }}">
                                                <input type="hidden" class="cart_product_image_{{ $product->product_id }}" value="{{ $product->product_image }}">
                                                <input type="hidden" id="wishlish_productPrice{{$product->product_id}}" class="cart_product_price_{{ $product->product_id }}" value="{{ number_format($product->product_price, 0, ',', '.') }} VNĐ">
                                                <input type="hidden"  class="cart_product_qty_{{ $product->product_id }}" value="1">
                                                <style type="text/css">
                                                    .button-group {
                                                        display: flex;
                                                        gap: 10px; /* Khoảng cách giữa hai nút */
                                                    }

                                                    .button-group button {
                                                        flex: 1; /* Giúp các nút có cùng kích thước */
                                                        white-space: nowrap; /* Đảm bảo nội dung không bị xuống dòng */
                                                    }
                                                    .xemnhanh{
                                                        background: #f5f5ed;
                                                        border: 0 none;
                                                        border-radius: 0;
                                                        color: #696763;
                                                        font-family: 'roboto', sans-serif;
                                                        font-size: 15px;
                                                        margin-bottom: 25px
                                                    }
                                                </style>
                                                <div class="button-group">
                                                    <button type="button" class="btn btn-default add-to-cart" data-id_product="{{ $product->product_id }}">
                                                        <i class="fa fa-shopping-cart"></i> Thêm giỏ hàng
                                                    </button>
                                                    <button type="button" class="btn btn-default xemnhanh" data-toggle="modal" data-target="#xemnhanh" data-id_product="{{ $product->product_id }}">
                                                        <i class="fa-solid fa-eye"></i> Xem
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>

                                    <div class="choose" style="border-top: 1px solid #eee; padding: 8px 0; background-color: #fff; border-radius: 0 0 8px 8px;">
                                        <ul class="nav nav-pills nav-justified" style="display: flex; justify-content: space-between; align-items: center; margin: 0; padding: 0 10px; list-style: none;">

                                            <!-- Yêu thích -->
                                            <li style="flex: 1; text-align: center;">
                                                <button
                                                    class="button_wishlist"
                                                    id="{{ $product->product_id }}"
                                                    onclick="add_wishlist(this.id);"
                                                    style="
                                                        border: none;
                                                        background: none;
                                                        color: #444;
                                                        font-size: 14px;
                                                        cursor: pointer;
                                                        display: flex;
                                                        align-items: center;
                                                        justify-content: center;
                                                        gap: 5px;
                                                        padding: 6px;
                                                        transition: color 0.3s;
                                                    "
                                                    onmouseover="this.style.color='#FE980F'"
                                                    onmouseout="this.style.color='#444'"
                                                >
                                                    <i class="far fa-heart" style="color: #FE980F;"></i>
                                                    <span>Yêu thích</span>
                                                </button>
                                            </li>

                                            <!-- So sánh -->
                                            <li style="flex: 1; text-align: center;">
                                                <a
                                                    href="#"
                                                    style="
                                                        text-decoration: none;
                                                        color: #444;
                                                        font-size: 14px;
                                                        display: flex;
                                                        align-items: center;
                                                        justify-content: center;
                                                        gap: 5px;
                                                        padding: 6px;
                                                        transition: color 0.3s;
                                                    "
                                                    onmouseover="this.style.color='#FE980F'"
                                                    onmouseout="this.style.color='#444'"
                                                >
                                                    <i class="fa fa-plus-square" style="color: #999;"></i>
                                                    <span>So sánh</span>
                                                </a>
                                            </li>

                                        </ul>
                                    </div>

                                </div>
                            </div>

                        @endforeach
                        <div class="col-sm-12" style="display:flex;justify-content:end;">
                            <nav aria-label="Page navigation">
                                <ul class="pagination justify-content-end">
                                    {{ $all_product->links('vendor.pagination.bootstrap-4') }}
                                </ul>
                            </nav>
                        </div>

    </div><!--features_items-->
    <!-- Modal -->
    <div class="modal fade" id="xemnhanh" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <!-- <h5 class="modal-title product_quickview_title" id="">
                <span id="product_quickview_title"></span>
            </h5> -->
          </div>
          <div class="modal-body">
            <style>
                @media screen and (min-width: 760px){
                    .modal-dialog{
                        width: 700px;
                    }
                    .modal-sm{
                        width: 350px;
                    }
                }
                @media screen and (min-width: 992px) {
                    .modal-lg{
                        width: 950px;
                    }
                }
                #product_quickview_price{
                    color: #FE980F;
                    float: left;
                    font-family: 'Roboto', sans-serif;
                    font-size: 20px;
                    font-weight: 700;
                    margin-right: 20px;
                    margin-top: 0px;
                }
                .product-price {
                    display: flex;
                    align-items: center;
                    gap: 5px;  /* Tạo khoảng cách nhỏ giữa giá và VNĐ */
                    font-size: 14px;
                    font-weight: bold;
                }

                .product-price span {
                    color: #ff9800;  /* Màu cam nổi bật */
                }
                .quantity-container {
                    display: flex;
                    align-items: center;
                    gap: 10px;  /* Khoảng cách giữa label và input */
                    font-size: 16px;
                    font-weight: bold;
                }

                .quantity-container input {
                    width: 60px;  /* Chiều rộng cố định */
                    height: 35px; /* Chiều cao hợp lý */
                    text-align: center;
                    font-size: 16px;
                    border: 2px solid #ff9800;  /* Viền cam nổi bật */
                    border-radius: 5px;  /* Bo góc */
                    outline: none;
                    transition: 0.3s;
                }

                .quantity-container input:focus {
                    border-color: #e65100;  /* Khi click vào, đổi màu viền đậm hơn */
                    box-shadow: 0px 0px 5px rgba(230, 81, 0, 0.5);
                }


            </style>
                <div class="row">
                    <div class="col-md-5">
                        <span id="product_quickview_gallery"></span>
                    </div>
                    <form>
                        @csrf
                        <div id="product_buyQuick"></div>
                        <div class="col-md-7 quickview-container">
                            <h2 class="quickview"><span id="product_quickview_title"></span></h2>
                            <p>Mã ID sản phẩm: <span id="product_quickview_id"></span></p>
                            <p class="product-price">Giá sản phẩm: <span id="product_quickview_price"></span></p>
                            <div id="productTasteContainer"></div>

                            <span style="display: flex; flex-direction: column; align-items: flex-start; gap: 10px;">
                                <div class="quantity-container" style="display: flex; align-items: center; gap: 10px;">
                                    <label for="product_qty" style="margin: 0; font-weight: 500;">Số lượng:</label>
                                    <input name="product_qty" id="product_qty" type="number" min="1" value="1"
                                        style="padding: 6px 8px; border: 1px solid #ccc; border-radius: 4px; width: 60px;"/>
                                </div>
                                <!-- Div for the 'Add to Cart' button -->
                                <div id="product_buyQuick_button"></div>

                            </span>
                            <p>Tình trạng: <span id="product_quickview_status"></span></p>
                            <p>Thương hiệu: <span id="product_quickview_brand"></span></p>
                            <!-- <p><span id="product_quickview_desc"></span></p>
                            <p><span id="product_quickview_content"></span></p> -->


                        </div>
                    </form>
                </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
            <a href="#" id="quickview_link">
                <button type="button" class="btn btn-default">Đi tới sản phẩm</button>
            </a>
          </div>
        </div>
      </div>
    </div>

    <div class="category-tab"><!--category-tab-->
                            <div class="col-sm-12">
                                <ul class="nav nav-tabs">
                                    <li class="active"><a href="#tshirt" data-toggle="tab">Mới về</a></li>
                                    <li><a href="#sunglass" data-toggle="tab">Xem nhiều nhất</a></li>
                                    <li><a href="#kids" data-toggle="tab">Mua nhiều</a></li>
                                    <li><a href="#giamgia" data-toggle="tab">Giảm giá</a></li>
                                </ul>
                            </div>
                            <style>
                                #view-all-link-tshirt,#view-all-link-sunglass,#view-all-link-kids,#view-all-link-giamgia {
                                    display: inline-block;
                                    background-color: transparent;
                                    font-size: 14px;
                                    font-weight: 400;
                                    padding: 8px 16px;
                                    text-decoration: none;
                                    transition: all 0.3s ease;
                                    margin-right: 15px;
                                }

                                #view-all-link-tshirt:hover,
                                #view-all-link-sunglass:hover,
                                #view-all-link-kids:hover,
                                #view-all-link-giamgia:hover {
                                    color: #fe980f; /* Màu chữ khi hover */
                                }

                                #view-all-link-tshirt:focus,
                                #view-all-link-sunglass:focus,
                                #view-all-link-kids:focus,
                                #view-all-link-giamgia:focus {
                                    outline: none; /* Loại bỏ outline khi nút được chọn */
                                }
                            </style>
                            <div class="tab-content">
                                <div class="tab-pane fade in active" id="tshirt" >
                                    <!-- Nút Xem tất cả -->
                                    <div style="text-align: right;">
                                        <a id="view-all-link-tshirt" href="{{ URL::to('danh-sach-san-pham') }}">
                                            Xem tất cả &gt;
                                        </a>
                                    </div>
                                    @foreach ($product_latest as $key => $product)
                                    <a href="{{URL::to('chi-tiet-san-pham/' . $product->product_slug)}}">
                                        <div class="col-sm-4">
                                            <div class="product-image-wrapper">
                                                <div class="single-products">
                                                    <div class="productinfo text-center" style="height: auto;">
                                                        <form>
                                                        @csrf
                                                            <a href="{{ URL::to('chi-tiet-san-pham/' . $product->product_slug) }}">
                                                                <div style="position: relative;">
                                                                    <img id="wishlish_productImage{{$product->product_id}}" src="{{ URL::to('public/upload/product/' . $product->product_image) }}" alt="" style="height: 200px; object-fit: cover; width: 100%;" />

                                                                    @if (!empty($product->product_discount_price))
                                                                        <span style="position: absolute; top: 10px; left: 10px; background-color: red; color: white; padding: 3px 8px; font-size: 12px; border-radius: 4px;">
                                                                            Giảm giá
                                                                        </span>
                                                                    @endif
                                                                </div>
                                                                @if (!empty($product->product_discount_price))
                                                                    <h2 style="font-size: 18px; display: flex; flex-wrap: wrap; align-items: center;">
                                                                        <span style="text-decoration: line-through; color: #999; font-size: 16px; margin-right: 10px;">
                                                                            {{ number_format($product->product_price, 0, ',', '.') }} VNĐ
                                                                        </span>
                                                                        <span style="color: #fe980f; font-size: 18px;">
                                                                            {{ number_format($product->product_discount_price, 0, ',', '.') }} VNĐ
                                                                        </span>
                                                                    </h2>
                                                                @else
                                                                    <h2 style="color: #fe980f; font-size: 18px;">
                                                                        {{ number_format($product->product_price, 0, ',', '.') }} VNĐ
                                                                    </h2>
                                                                @endif

                                                                <p>{{ $product->product_name }}</p>
                                                            </a>
                                                            <input type="hidden" class="cart_product_id_{{ $product->product_id }}" value="{{ $product->product_id }}">
                                                            <input type="hidden" id="wishlist_productName{{$product->product_id}}" class="cart_product_name_{{ $product->product_id }}" value="{{ $product->product_name }}">
                                                            <input type="hidden" class="cart_product_image_{{ $product->product_id }}" value="{{ $product->product_image }}">
                                                            <input type="hidden" id="wishlish_productPrice{{$product->product_id}}" class="cart_product_price_{{ $product->product_id }}" value="{{ number_format($product->product_price, 0, ',', '.') }} VNĐ">
                                                            <input type="hidden"  class="cart_product_qty_{{ $product->product_id }}" value="1">

                                                            <div class="button-group">
                                                                <button type="button" class="btn btn-default add-to-cart" data-id_product="{{ $product->product_id }}">
                                                                    <i class="fa fa-shopping-cart"></i> Thêm giỏ hàng
                                                                </button>
                                                                <button type="button" class="btn btn-default xemnhanh" data-toggle="modal" data-target="#xemnhanh" data-id_product="{{ $product->product_id }}">
                                                                    <i class="fa-solid fa-eye"></i> Xem
                                                                </button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                    @endforeach
                                </div>

                                <div class="tab-pane fade" id="sunglass" >
                                    <!-- Nút Xem tất cả -->
                                    <div style="text-align: right">
                                        <a id="view-all-link-sunglass" href="{{ URL::to('danh-sach-san-pham') }}" style="text-decoration: none;margin-right:15px;">
                                            Xem tất cả &gt;
                                        </a>
                                    </div>
                                    @foreach ($product_view as $key => $product)
                                        <a href="{{URL::to('chi-tiet-san-pham/' . $product->product_slug)}}">
                                            <div class="col-sm-4">
                                                <div class="product-image-wrapper">

                                                    <div class="single-products">
                                                        <div class="productinfo text-center" style="height: auto;">
                                                            <form>
                                                            @csrf
                                                                <a href="{{ URL::to('chi-tiet-san-pham/' . $product->product_slug) }}">
                                                                    <div style="position: relative;">
                                                                        <img id="wishlish_productImage{{$product->product_id}}" src="{{ URL::to('public/upload/product/' . $product->product_image) }}" alt="" style="height: 200px; object-fit: cover; width: 100%;" />

                                                                        @if (!empty($product->product_discount_price))
                                                                            <span style="position: absolute; top: 10px; left: 10px; background-color: red; color: white; padding: 3px 8px; font-size: 12px; border-radius: 4px;">
                                                                                Giảm giá
                                                                            </span>
                                                                        @endif
                                                                    </div>
                                                                    @if (!empty($product->product_discount_price))
                                                                        <h2 style="font-size: 18px; display: flex; flex-wrap: wrap; align-items: center;">
                                                                            <span style="text-decoration: line-through; color: #999; font-size: 16px; margin-right: 10px;">
                                                                                {{ number_format($product->product_price, 0, ',', '.') }} VNĐ
                                                                            </span>
                                                                            <span style="color: #fe980f; font-size: 18px;">
                                                                                {{ number_format($product->product_discount_price, 0, ',', '.') }} VNĐ
                                                                            </span>
                                                                        </h2>
                                                                    @else
                                                                        <h2 style="color: #fe980f; font-size: 18px;">
                                                                            {{ number_format($product->product_price, 0, ',', '.') }} VNĐ
                                                                        </h2>
                                                                    @endif
                                                                    <p>{{ $product->product_name }}</p>
                                                                </a>
                                                                <input type="hidden" class="cart_product_id_{{ $product->product_id }}" value="{{ $product->product_id }}">
                                                                <input type="hidden" id="wishlist_productName{{$product->product_id}}" class="cart_product_name_{{ $product->product_id }}" value="{{ $product->product_name }}">
                                                                <input type="hidden" class="cart_product_image_{{ $product->product_id }}" value="{{ $product->product_image }}">
                                                                <input type="hidden" id="wishlish_productPrice{{$product->product_id}}" class="cart_product_price_{{ $product->product_id }}" value="{{ number_format($product->product_price, 0, ',', '.') }} VNĐ">
                                                                <input type="hidden"  class="cart_product_qty_{{ $product->product_id }}" value="1">

                                                                <div class="button-group">
                                                                    <button type="button" class="btn btn-default add-to-cart" data-id_product="{{ $product->product_id }}">
                                                                        <i class="fa fa-shopping-cart"></i> Thêm giỏ hàng
                                                                    </button>
                                                                    <button type="button" class="btn btn-default xemnhanh" data-toggle="modal" data-target="#xemnhanh" data-id_product="{{ $product->product_id }}">
                                                                        <i class="fa-solid fa-eye"></i> Xem
                                                                    </button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>



                                                </div>
                                            </div>
                                        </a>
                                    @endforeach
                                </div>

                                <div class="tab-pane fade" id="kids" >
                                    <!-- Nút Xem tất cả -->
                                    <div style="text-align: right">
                                        <a id="view-all-link-kids" href="{{ URL::to('danh-sach-san-pham') }}" style="text-decoration: none;margin-right:15px;">
                                            Xem tất cả &gt;
                                        </a>
                                    </div>
                                    @foreach ($product_sold as $key => $product)
                                        <a href="{{URL::to('chi-tiet-san-pham/' . $product->product_slug)}}">
                                            <div class="col-sm-4">
                                                <div class="product-image-wrapper">

                                                    <div class="single-products">
                                                        <div class="productinfo text-center" style="height: auto;">
                                                            <form>
                                                            @csrf
                                                                <a href="{{ URL::to('chi-tiet-san-pham/' . $product->product_slug) }}">
                                                                    <div style="position: relative;">
                                                                        <img id="wishlish_productImage{{$product->product_id}}" src="{{ URL::to('public/upload/product/' . $product->product_image) }}" alt="" style="height: 200px; object-fit: cover; width: 100%;" />

                                                                        @if (!empty($product->product_discount_price))
                                                                            <span style="position: absolute; top: 10px; left: 10px; background-color: red; color: white; padding: 3px 8px; font-size: 12px; border-radius: 4px;">
                                                                                Giảm giá
                                                                            </span>
                                                                        @endif
                                                                    </div>
                                                                    @if (!empty($product->product_discount_price))
                                                                        <h2 style="font-size: 18px; display: flex; flex-wrap: wrap; align-items: center;">
                                                                            <span style="text-decoration: line-through; color: #999; font-size: 16px; margin-right: 10px;">
                                                                                {{ number_format($product->product_price, 0, ',', '.') }} VNĐ
                                                                            </span>
                                                                            <span style="color: #fe980f; font-size: 18px;">
                                                                                {{ number_format($product->product_discount_price, 0, ',', '.') }} VNĐ
                                                                            </span>
                                                                        </h2>
                                                                    @else
                                                                        <h2 style="color: #fe980f; font-size: 18px;">
                                                                            {{ number_format($product->product_price, 0, ',', '.') }} VNĐ
                                                                        </h2>
                                                                    @endif
                                                                    <p>{{ $product->product_name }}</p>
                                                                </a>
                                                                <input type="hidden" class="cart_product_id_{{ $product->product_id }}" value="{{ $product->product_id }}">
                                                                <input type="hidden" id="wishlist_productName{{$product->product_id}}" class="cart_product_name_{{ $product->product_id }}" value="{{ $product->product_name }}">
                                                                <input type="hidden" class="cart_product_image_{{ $product->product_id }}" value="{{ $product->product_image }}">
                                                                <input type="hidden" id="wishlish_productPrice{{$product->product_id}}" class="cart_product_price_{{ $product->product_id }}" value="{{ number_format($product->product_price, 0, ',', '.') }} VNĐ">
                                                                <input type="hidden"  class="cart_product_qty_{{ $product->product_id }}" value="1">

                                                                <div class="button-group">
                                                                    <button type="button" class="btn btn-default add-to-cart" data-id_product="{{ $product->product_id }}">
                                                                        <i class="fa fa-shopping-cart"></i> Thêm giỏ hàng
                                                                    </button>
                                                                    <button type="button" class="btn btn-default xemnhanh" data-toggle="modal" data-target="#xemnhanh" data-id_product="{{ $product->product_id }}">
                                                                        <i class="fa-solid fa-eye"></i> Xem
                                                                    </button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    @endforeach

                                </div>
                                <div class="tab-pane fade" id="giamgia" >
                                    <!-- Nút Xem tất cả -->
                                    <div style="text-align: right">
                                        <a id="view-all-link-giamgia" href="{{ URL::to('danh-sach-san-pham') }}" style="text-decoration: none;margin-right:15px;">
                                            Xem tất cả &gt;
                                        </a>
                                    </div>
                                    @foreach ($product_discount as $key => $product)
                                    <a href="{{URL::to('chi-tiet-san-pham/' . $product->product_slug)}}">
                                        <div class="col-sm-4">
                                            <div class="product-image-wrapper">
                                                <div class="single-products">
                                                    <div class="productinfo text-center" style="height: auto;">
                                                        <form>
                                                        @csrf
                                                            <a href="{{ URL::to('chi-tiet-san-pham/' . $product->product_slug) }}">
                                                                <div style="position: relative;">
                                                                    <img id="wishlish_productImage{{$product->product_id}}" src="{{ URL::to('public/upload/product/' . $product->product_image) }}" alt="" style="height: 200px; object-fit: cover; width: 100%;" />

                                                                    @if (!empty($product->product_discount_price))
                                                                        <span style="position: absolute; top: 10px; left: 10px; background-color: red; color: white; padding: 3px 8px; font-size: 12px; border-radius: 4px;">
                                                                            Giảm giá
                                                                        </span>
                                                                    @endif
                                                                </div>

                                                                @if (!empty($product->product_discount_price))
                                                                <h2 style="font-size: 18px; display: flex; flex-wrap: wrap; align-items: center;">
                                                                    <span style="text-decoration: line-through; color: #999; font-size: 16px; margin-right: 10px;">
                                                                        {{ number_format($product->product_price, 0, ',', '.') }} VNĐ
                                                                    </span>
                                                                    <span style="color: #fe980f; font-size: 18px;">
                                                                        {{ number_format($product->product_discount_price, 0, ',', '.') }} VNĐ
                                                                    </span>
                                                                </h2>
                                                                @else
                                                                    <h2 style="color: #fe980f; font-size: 18px;">
                                                                        {{ number_format($product->product_price, 0, ',', '.') }} VNĐ
                                                                    </h2>
                                                                @endif

                                                                <p>{{ $product->product_name }}</p>
                                                            </a>
                                                            <input type="hidden" class="cart_product_id_{{ $product->product_id }}" value="{{ $product->product_id }}">
                                                            <input type="hidden" id="wishlist_productName{{$product->product_id}}" class="cart_product_name_{{ $product->product_id }}" value="{{ $product->product_name }}">
                                                            <input type="hidden" class="cart_product_image_{{ $product->product_id }}" value="{{ $product->product_image }}">
                                                            <input type="hidden" id="wishlish_productPrice{{$product->product_id}}" class="cart_product_price_{{ $product->product_id }}" value="{{ number_format($product->product_price, 0, ',', '.') }} VNĐ">
                                                            <input type="hidden"  class="cart_product_qty_{{ $product->product_id }}" value="1">

                                                            <div class="button-group">
                                                                <button type="button" class="btn btn-default add-to-cart" data-id_product="{{ $product->product_id }}">
                                                                    <i class="fa fa-shopping-cart"></i> Thêm giỏ hàng
                                                                </button>
                                                                <button type="button" class="btn btn-default xemnhanh" data-toggle="modal" data-target="#xemnhanh" data-id_product="{{ $product->product_id }}">
                                                                    <i class="fa-solid fa-eye"></i> Xem
                                                                </button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                    @endforeach
                                </div>

                            </div>
                        </div><!--/category-tab-->

    <div class="recommended_items"><!--recommended_items-->
                            <h2 class="title text-center">Các sản phẩm đề xuất</h2>

                            <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
                                <div class="carousel-inner">
                                    <div class="item active">
                                        @foreach($related_product as $key => $product)
                                            <a href="{{URL::to('chi-tiet-san-pham/' . $product->product_slug)}}">
                                                <div class="col-sm-3">
                                                    <div class="product-image-wrapper">

                                                        <div class="single-products">
                                                            <div class="productinfo text-center" style="height: auto;">
                                                                <form>
                                                                @csrf
                                                                    <a href="{{ URL::to('chi-tiet-san-pham/' . $product->product_slug) }}">
                                                                        <div style="position: relative;">
                                                                            <img id="wishlish_productImage{{$product->product_id}}" src="{{ URL::to('public/upload/product/' . $product->product_image) }}" alt="" style="height: 200px; object-fit: cover; width: 100%;" />

                                                                            @if (!empty($product->product_discount_price))
                                                                                <span style="position: absolute; top: 10px; left: 10px; background-color: red; color: white; padding: 3px 8px; font-size: 12px; border-radius: 4px;">
                                                                                    Giảm giá
                                                                                </span>
                                                                            @endif
                                                                        </div>

                                                                        @if (!empty($product->product_discount_price))
                                                                        <h2 style="font-size: 18px; display: flex; flex-wrap: wrap; align-items: center; justify-content: center;">
                                                                            <span style="color: #fe980f; font-size: 18px;">
                                                                                {{ number_format($product->product_discount_price, 0, ',', '.') }} VNĐ
                                                                            </span>
                                                                            <span style="text-decoration: line-through; color: #999; font-size: 16px; margin-right: 10px;">
                                                                                {{ number_format($product->product_price, 0, ',', '.') }} VNĐ
                                                                            </span>

                                                                        </h2>
                                                                        @else
                                                                            <h2 style="color: #fe980f; font-size: 18px;">
                                                                                {{ number_format($product->product_price, 0, ',', '.') }} VNĐ
                                                                            </h2>
                                                                        @endif
                                                                        <p>{{ $product->product_name }}</p>
                                                                    </a>
                                                                    <input type="hidden" class="cart_product_id_{{ $product->product_id }}" value="{{ $product->product_id }}">
                                                                    <input type="hidden" id="wishlist_productName{{$product->product_id}}" class="cart_product_name_{{ $product->product_id }}" value="{{ $product->product_name }}">
                                                                    <input type="hidden" class="cart_product_image_{{ $product->product_id }}" value="{{ $product->product_image }}">
                                                                    <input type="hidden" id="wishlish_productPrice{{$product->product_id}}" class="cart_product_price_{{ $product->product_id }}" value="{{ number_format($product->product_price, 0, ',', '.') }} VNĐ">
                                                                    <input type="hidden"  class="cart_product_qty_{{ $product->product_id }}" value="1">

                                                                    <div class="button-group">
                                                                        <button type="button" class="btn btn-default add-to-cart" data-id_product="{{ $product->product_id }}">
                                                                            <i class="fa fa-shopping-cart"></i> Thêm giỏ hàng
                                                                        </button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                        @endforeach

                                    </div>
                                    <div class="item">
                                        @foreach($related_product_1 as $key => $product)
                                        <a href="{{URL::to('chi-tiet-san-pham/' . $product->product_slug)}}">
                                            <div class="col-sm-3">
                                                <div class="product-image-wrapper">

                                                    <div class="single-products">
                                                        <div class="productinfo text-center" style="height: 400px;">
                                                            <form>
                                                            @csrf
                                                                <a href="{{ URL::to('chi-tiet-san-pham/' . $product->product_slug) }}">
                                                                    <div style="position: relative;">
                                                                        <img id="wishlish_productImage{{$product->product_id}}" src="{{ URL::to('public/upload/product/' . $product->product_image) }}" alt="" style="height: 200px; object-fit: cover; width: 100%;" />

                                                                        @if (!empty($product->product_discount_price))
                                                                            <span style="position: absolute; top: 10px; left: 10px; background-color: red; color: white; padding: 3px 8px; font-size: 12px; border-radius: 4px;">
                                                                                Giảm giá
                                                                            </span>
                                                                        @endif
                                                                    </div>

                                                                    @if (!empty($product->product_discount_price))
                                                                    <h2 style="font-size: 18px; display: flex; flex-wrap: wrap; align-items: center; justify-content: center;">
                                                                        <span style="color: #fe980f; font-size: 18px;">
                                                                            {{ number_format($product->product_discount_price, 0, ',', '.') }} VNĐ
                                                                        </span>
                                                                        <span style="text-decoration: line-through; color: #999; font-size: 16px; margin-right: 10px;">
                                                                            {{ number_format($product->product_price, 0, ',', '.') }} VNĐ
                                                                        </span>

                                                                    </h2>
                                                                    @else
                                                                        <h2 style="color: #fe980f; font-size: 18px;">
                                                                            {{ number_format($product->product_price, 0, ',', '.') }} VNĐ
                                                                        </h2>
                                                                    @endif
                                                                    <p>{{ $product->product_name }}</p>
                                                                </a>
                                                                <input type="hidden" class="cart_product_id_{{ $product->product_id }}" value="{{ $product->product_id }}">
                                                                <input type="hidden" id="wishlist_productName{{$product->product_id}}" class="cart_product_name_{{ $product->product_id }}" value="{{ $product->product_name }}">
                                                                <input type="hidden" class="cart_product_image_{{ $product->product_id }}" value="{{ $product->product_image }}">
                                                                <input type="hidden" id="wishlish_productPrice{{$product->product_id}}" class="cart_product_price_{{ $product->product_id }}" value="{{ number_format($product->product_price, 0, ',', '.') }} VNĐ">
                                                                <input type="hidden"  class="cart_product_qty_{{ $product->product_id }}" value="1">

                                                                <div class="button-group">
                                                                    <button type="button" class="btn btn-default add-to-cart" data-id_product="{{ $product->product_id }}">
                                                                        <i class="fa fa-shopping-cart"></i> Thêm giỏ hàng
                                                                    </button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                        @endforeach

                                    </div>
                                </div>
                                 <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
                                    <i class="fa fa-angle-left"></i>
                                  </a>
                                  <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
                                    <i class="fa fa-angle-right"></i>
                                  </a>
                            </div>
    </div><!--/recommended_items-->
@endsection
