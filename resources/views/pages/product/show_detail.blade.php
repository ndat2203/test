<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Seo meta -->
    <meta name="description" content="{!!$meta_desc!!}">

    <meta name="keywords" content="{{$meta_keywords}}">
    <meta name="robots" content="INDEX,FOLLOW">
    <link rel="canonical" href="{{$url_canonical}}">
    <meta name="author" content="">
    <link rel="icon" type="image/x-icon" href="">
     <!-- End Seo meta -->
    <title>Product Details | E-Shopper</title>
    <link href="{{asset('public/fontend/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('public/fontend/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('public/fontend/css/prettyPhoto.css')}}" rel="stylesheet">
    <link href="{{asset('public/fontend/css/price-range.css')}}" rel="stylesheet">
    <link href="{{asset('public/fontend/css/animate.css')}}" rel="stylesheet">
    <link href="{{asset('public/fontend/css/main.css')}}" rel="stylesheet">
    <link href="{{asset('public/fontend/css/lightgallery.min.css')}}" rel="stylesheet">
    <link href="{{asset('public/fontend/css/lightslider.css')}}" rel="stylesheet">
    <link href="{{asset('public/fontend/css/prettify.css')}}" rel="stylesheet">
    <link href="{{asset('public/fontend/css/chatbot.css')}}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
    <link rel="shortcut icon" href="{{('public/fontend/images/ico/favicon.ico')}}">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
    <script src="https://kit.fontawesome.com/ff4b23649f.js" crossorigin="anonymous"></script>
    <style>
        li.active {
            border: 2px solid #fe980f;
        }

        .search_box input{
            color: black !important;
            border: 1px solid #ccc;
            padding: 8px;
            border-radius: 5px;
        }
        .search_box {
            position: relative;
            width: 100%;
            max-width: 300px;
        }

        #keywords {
            width: 100%;
            padding: 10px 40px 10px 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .search_box button {
            position: absolute;
            top: 50%;
            right: 1px;
            transform: translateY(-50%);
            background: none;
            border: none;
            cursor: pointer;
        }
        #search_ajax {
            position: absolute;
            width: 100%;
            background: white;
            border: 1px solid #ccc;
            border-radius: 5px;
            max-height: 200px;
            overflow-y: auto;
            z-index: 9999;
        }
        .search_box button i {
            font-size: 16px;
            color: #777;
        }
        button[name="searchItems"]:hover {
            background-color: #777;

        }

        button[name="searchItems"]:hover i {
            color: white;
        }
        .wishlist-item {
        position: relative;
        padding: 10px;
        border: 1px solid #ddd;
        border-radius: 8px;
        background: #fff;
        box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.1);
        margin-bottom: 10px;
    }

    .remove-wishlist {
        position: absolute;
        top: 5px;
        right: 5px;
        background: #ccc;
        color: white;
        border: none;
        width: 24px;
        height: 24px;
        font-size: 16px;
        line-height: 24px;
        text-align: center;
        border-radius: 50%;
        cursor: pointer;
        font-weight: bold;
        pointer-events: auto;
    }

    .remove-wishlist:hover {
        background: #FE980f;
    }
    </style>

</head><!--/head-->

<body>
    <header id="header"><!--header-->
		<div class="header_top"><!--header_top-->
			<div class="container">
				<div class="row">
					<div class="col-sm-6">
						<div class="contactinfo">
							<ul class="nav nav-pills">
								<li><a href="#"><i class="fa fa-phone"></i> 0867584717</a></li>
								<li><a href="#"><i class="fa fa-envelope"></i> furryfriend@gmail.com</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="social-icons pull-right">
							<ul class="nav navbar-nav">
								<li><a href="#"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter"></i></a></li>
								<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
								<li><a href="#"><i class="fa fa-dribbble"></i></a></li>
								<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header_top-->

		<div class="header-middle"><!--header-middle-->
			<div class="container">
				<div class="row" >
                <div class="col-sm-4" style="display: flex; align-items: center;">
                    <div class="logo" style="display: flex; align-items: center; padding-left: 15px;">
                        <a href="index.html" style="display: flex; align-items: center; text-decoration: none;">
                            <img src="{{URL::to('/public/fontend/images/furryFriend.png')}}" alt="Logo FurryFriend" style="width: 60px; height: 60px; object-fit: contain; display: block; margin-right: 10px;" />
                            <span style="font-size: 24px; font-weight: bold; color: #FF8C00; font-family: 'Poppins', sans-serif;">FurryFriend.com</span>
                        </a>
                    </div>
                </div>


					<div class="col-sm-8">
						<div class="shop-menu pull-right">
							<ul class="">

								<li><a href="#" style="display: block; padding: 10px; text-decoration: none;"><i class="fa-solid fa-heart"></i> Danh sách yêu thích</a></li>
								<li><a href="{{URL::to('/show-cart')}}" style="display: block; padding: 10px; text-decoration: none;"><i class="fa fa-shopping-cart"></i>
                                    Giỏ hàng
                                    <span class="cart-count" style="
                                        position: absolute;
                                        top: 12px;
                                        background: #ccc;
                                        color: black;
                                        font-size: 12px;
                                        padding: 2px 6px;
                                        border-radius: 50%;
                                        font-weight: normal;
                                        min-width: 20px;
                                        text-align: center;
                                    ">
                                        {{ Cart::getTotalQuantity() }}
                                    </span>
                                </a></li>
                                @php
                                    $customer_id = Session::get('customer_id');
                                    $shipping_id = Session::get('shipping_id');
                                // dd(Session::all());
                                @endphp
                                @if($customer_id != null )
                                <li style="position: relative;">
                                    <a href="#" style="display: block; padding: 10px; text-decoration: none;">
                                      <i class="fa fa-user"></i> Tài khoản <i class="fa fa-angle-down"></i>
                                    </a>
                                    <ul style="
                                      display: none;
                                      position: absolute;
                                      top: 100%;
                                      left: 0;
                                      background: #fff;
                                      border: 1px solid #ddd;
                                      list-style: none;
                                      padding: 10px 0;
                                      min-width: 180px;
                                      z-index: 99;
                                      transition: background-color 0.3s ease, transform 0.2s ease;
                                      box-shadow: 0 2px 5px rgba(0,0,0,0.15);
                                    ">
                                      <li style="padding: 5px 20px;">
                                        <a href="{{ url('/thong-tin-tai-khoan') }}" style="color: #333; text-decoration: none; display: block;"
                                        onmouseover="this.style.background='#f5f5f5'; this.style.color='#fe980f';"
                                        onmouseout="this.style.background='transparent'; this.style.color='#333';">
                                          Thông tin tài khoản
                                        </a>
                                      </li>
                                      <li style="padding: 5px 20px;">
                                        <a href="{{ url('/history') }}" style="color: #333; text-decoration: none; display: block;"
                                        onmouseover="this.style.background='#f5f5f5'; this.style.color='#fe980f';"
                                        onmouseout="this.style.background='transparent'; this.style.color='#333';">
                                          Lịch sử đơn hàng
                                        </a>
                                      </li>
                                      <li style="padding: 5px 20px;">
                                        <a href="{{ url('/logout-checkout') }}" style="color: #333; text-decoration: none; display: block;"
                                        onmouseover="this.style.background='#f5f5f5'; this.style.color='#fe980f';"
                                        onmouseout="this.style.background='transparent'; this.style.color='#333';">
                                          Đăng xuất
                                        </a>
                                      </li>
                                    </ul>
                                </li>
                                @else
                                    <li><a href="{{ url('/login-checkout') }}" style="display: block; padding: 10px; text-decoration: none;"><i class="fa fa-lock"></i> Đăng nhập</a></li>
                                @endif

							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-middle-->

		<div class="header-bottom"><!--header-bottom-->
			<div class="container">
				<div class="row">
					<div class="col-sm-8">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						<div class="mainmenu pull-left">
							<ul class="nav navbar-nav collapse navbar-collapse">
								<li><a href="{{URL::to('/trang-chu')}}" class="active">Trang chủ</a></li>
                                <li><a href="{{URL::to('/trang-chu')}}" >Giới thiệu</a></li>
								<!-- <li class="dropdown"><a href="#">Sản phẩm<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                        <li><a href="shop.html">Products</a></li>
										<li><a href="product-details.html">Product Details</a></li>
										<li><a href="checkout.html">Checkout</a></li>
										<li><a href="cart.html">Cart</a></li>
										<li><a href="login.html">Login</a></li>
                                    </ul>
                                </li> -->
								<li class="dropdown"><a href="#">Tin tức<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu" style="
                                        background-color: #ffffff;
                                        padding: 6px 0;
                                        margin: 0;
                                        list-style: none;
                                        min-width: 200px;
                                        box-shadow: 0 4px 12px rgba(0,0,0,0.1);
                                        border-radius: 6px;
                                        z-index: 1000;
                                    ">
                                        @foreach($category_post as $key => $cate_post)
                                            <li style="border-bottom: 1px solid #eaeaea;">
                                                <a href="{{ URL::to('/danh-muc-bai-viet/'.$cate_post->cate_post_slug) }}" style="
                                                    display: block;
                                                    padding: 8px 8px;
                                                    color: #222;
                                                    font-weight: 300;
                                                    font-size: 14px;
                                                    text-decoration: none;
                                                    transition: all 0.3s ease;
                                                    font-family: Arial, sans-serif;
                                                "
                                                onmouseover="this.style.backgroundColor='#f0f0f0'; this.style.color='#f7941d';"
                                                onmouseout="this.style.backgroundColor='transparent'; this.style.color='#222';"
                                                >
                                                    {{ $cate_post->cate_post_name }}
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>

                                </li>
								<!-- <li><a href="404.html">404</a></li> -->
								<li><a href="contact-us.html">Liên hệ</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-4">
                        <form action="{{URL::to('/tim-kiem')}}" autocomplete="off" method="post">
                            {{csrf_field()}}
                            <div class="search_box pull-right">
                                <input type="text" style="width:100%" name="keyword" id="keywords" placeholder="Tìm kiếm"/>
                                <div id="search_ajax"></div>
                                <button type="submit" name="searchItems" style="height:35px; margin-left:-5px;border-radius: 5px;" class="btn btn-info btn-sm">
                                    <i class="fa fa-thin fa-magnifying-glass"></i>
                                </button>
                            </div>
                        </form>
					</div>
				</div>
			</div>
		</div><!--/header-bottom-->
	</header><!--/header-->

	<section>
		<div class="container">
			<div class="row">
				<div class="padding-left">
                    @foreach ($product_detail as $key => $value)
                        <div class="product-details"><!--product-details-->
                            <nav aria-label="breadcrumb">
                            <ol class="breadcrumb" style="background:none;">
                                <li class="breadcrumb-item"><a href="{{url('/')}}">Trang chủ</a></li>
                                <li class="breadcrumb-item"><a href="{{url('/danh-muc-san-pham/'.$value->category_slug)}}">{{$cate_name}}</a></li>
                                <li class="breadcrumb-item active" style="border:none;" aria-current="page">{{$value->product_name}}</li>
                            </ol>
                            </nav>
                                        <div class="col-sm-5">
                                            <ul id="imageGallery">
                                                @foreach($gallery as $key => $gal)
                                                    <li data-thumb="{{asset('public/upload/gallery/'.$gal->gallery_image)}}" data-src="{{asset('public/upload/gallery/'.$gal->gallery_image)}}">
                                                        <img width="100%" alt="{{$gal->gallery_name}}" src="{{asset('public/upload/gallery/'.$gal->gallery_image)}}" />
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                        <div class="col-sm-7">
                                            <div class="product-information"
                                                style="padding: 24px; background-color: #fff; border-radius: 10px; box-shadow: 0 4px 12px rgba(0,0,0,0.06); font-family: 'Segoe UI', sans-serif; color: #333;">

                                                <!-- Tên sản phẩm -->
                                                <h2 style="font-size: 26px; font-weight: 600; margin-bottom: 8px;">{{$value->product_name}}</h2>

                                                <!-- Web ID -->
                                                {{-- <p style="color: #888; font-size: 14px; margin-bottom: 14px;">Mã sản phẩm: 1089772</p> --}}

                                                <!-- Đánh giá sao -->
                                                <div style="margin-bottom: 16px;">
                                                    @php
                                                        $full_stars = floor($average_rating);
                                                        $half_star = ($average_rating - $full_stars) >= 0.5;
                                                    @endphp
                                                    @for ($i = 1; $i <= 5; $i++)
                                                        @if ($i <= $full_stars)
                                                            <i class="fa fa-star" style="color: #ffcc00; font-size: 18px;"></i>
                                                        @elseif ($half_star)
                                                            <i class="fa fa-star-half-alt" style="color: #ffcc00; font-size: 18px;"></i>
                                                            @php $half_star = false; @endphp
                                                        @else
                                                            <i class="fa fa-star" style="color: #ccc; font-size: 18px;"></i>
                                                        @endif
                                                    @endfor
                                                </div>

                                                <!-- Giá & form đặt hàng -->
                                                <form action="{{URL::to('/save-cart')}}" method="post" style="margin-bottom: 20px;">
                                                    {{ csrf_field() }}

                                                    <!-- Giá -->
                                                    <div style="font-size: 24px; font-weight: bold; margin-bottom: 12px;">
                                                        @if (!empty($value->product_discount_price))
                                                            <span style="text-decoration: line-through; color: #999; font-size: 20px; margin-left: 10px;">
                                                                {{ number_format($value->product_price, 0, ',', '.') }} VNĐ
                                                            </span>
                                                            <span style="color: #fe980f;">{{ number_format($value->product_discount_price, 0, ',', '.') }} VNĐ</span>

                                                        @else
                                                            <span style="color: #fe980f;">{{ number_format($value->product_price, 0, ',', '.') }} VNĐ</span>
                                                        @endif
                                                    </div>

                                                    <!-- Nếu có vị -->
                                                    @if ($product_taste->taste->isNotEmpty())
                                                        <div style="margin-bottom: 12px;">
                                                            <label style="margin-bottom: 6px; display: block; font-weight: bold;">Loại:</label>

                                                            <div id="taste-options" style="display: flex; flex-wrap: wrap; gap: 10px;">
                                                                @foreach ($product_taste->taste as $taste)
                                                                    <button type="button" class="taste-option"
                                                                        data-taste-id="{{ $taste->taste_id }}"
                                                                        style="padding: 8px 12px; border: 1px solid #ccc; border-radius: 4px; background: #fff; cursor: pointer; transition: 0.3s;"
                                                                        @if($value->product_qty == 0) style="background: #d3d3d3; color: #999; cursor: not-allowed;" disabled @endif>
                                                                        {{ $taste->taste_name }}
                                                                    </button>
                                                                @endforeach
                                                            </div>

                                                            <!-- Trường ẩn để lưu vị đã chọn -->
                                                            <input type="hidden" name="taste_id" id="selected-taste-id" required>
                                                        </div>
                                                    @endif

                                                    <!-- Số lượng + nút -->
                                                    <div style="display: flex; flex-direction: column; gap: 12px; align-items: flex-start;">
                                                        <div style="display: flex; align-items: center; gap: 12px;">
                                                            <label style="margin: 0; font-weight: 500;">Số lượng:</label>
                                                            <input name="product_qty" type="number" min="1" max="{{$value->product_qty}}" value="1"
                                                                style="width: 60px; padding: 6px 8px; border: 1px solid #ccc; border-radius: 4px;"
                                                                @if($value->product_qty == 0) style="background-color: #d3d3d3; color: #999;" disabled @endif>
                                                            <input name="product_id" type="hidden" value="{{$value->product_id}}">
                                                        </div>

                                                        <button type="submit"
                                                            style="background-color: #fe980f; color: #fff; border: none; padding: 8px 16px;
                                                                border-radius: 4px; font-weight: 500; cursor: pointer; transition: all 0.3s ease;
                                                                transform-origin: center;"
                                                            @if($value->product_qty == 0) style="background-color: #d3d3d3; cursor: not-allowed;" disabled @endif
                                                            onmouseover="this.style.transform='scale(1.05)'"
                                                            onmouseout="this.style.transform='scale(1)'"
                                                            onmousedown="this.style.transform='scale(0.95)'"
                                                            onmouseup="this.style.transform='scale(1.05)'">
                                                            <i class="fa fa-shopping-cart"></i> Thêm giỏ hàng
                                                        </button>
                                                    </div>

                                                </form>


                                                <!-- Thông tin sản phẩm -->
                                                <p style="margin: 6px 0;">
                                                    <b>Tình trạng:</b>
                                                    @if ($value->product_qty == 0)
                                                        <span style="color: red;">Hết hàng</span>
                                                    @else
                                                        <span style="color: green;">Còn hàng</span>
                                                    @endif
                                                </p>
                                                <p style="margin: 6px 0;"><b>Thương hiệu:</b> {{$value->brand_name}}</p>

                                                <!-- Nút chia sẻ -->
                                                <div style="margin-top: 14px;">
                                                    <a href="#">
                                                        <img src="{{URL::to('public/fontend/images/share.png')}}" alt="Share"
                                                            style="width: 200px;">
                                                    </a>
                                                </div>
                                            </div>
                                        </div>


                                        </div>
                                        <!--/product-details-->

                        <!--category-tab-->
                        <div class="category-tab shop-details-tab">
                                                <div class="col-sm-12">
                                                    <ul class="nav nav-tabs">
                                                        <li class="active"><a href="#details" data-toggle="tab">Chi tiết sản phẩm</a></li>
                                                        <!-- <li><a href="#companyprofile" data-toggle="tab">Size</a></li> -->

                                                        <li><a href="#reviews" data-toggle="tab">Đánh giá ( {{$commentCount}} )</a></li>
                                                    </ul>
                                                </div>
                                                <div class="tab-content">
                                                <div class="tab-pane fade active in" id="details" style="text-align: center;">
                                                <div id="product-content" style="max-height: 200px; overflow: hidden; transition: max-height 0.5s ease; text-align: left; display: inline-block; width: 100%;">
                                                        {!! $value->product_content !!}
                                                    </div>

                                                    <button id="read-more-btn" onclick="toggleContent()"
                                                        style="margin-top: 16px; background-color: #f5891f; color: white; border: none; padding: 10px 24px; border-radius: 25px; font-weight: bold; transition: background 0.3s; cursor: pointer;">
                                                        Đọc Thêm
                                                    </button>
                                                </div>


                                                    <div class="tab-pane fade " id="reviews" >
                                                        <div class="col-sm-12">
                                                            <ul>
                                                                <li><a href=""><i class="fa fa-user"></i>EUGEN</a></li>
                                                                <li><a href=""><i class="fa fa-clock-o"></i> <span id="current-time"></span></a></li>
                                                                <li><a href=""><i class="fa fa-calendar-o"></i> <span id="current-date"></span></a></li>
                                                            </ul>
                                                            <form action="">
                                                                @csrf
                                                                <input type="hidden" name="comment_product_id" class="comment_product_id" value="{{$value->product_id}}">
                                                                <div id="comment_show"></div>

                                                            </form>

                                                            <p style="margin:15px;"><b>Viết đánh giá của bạn</b></p>
                                                            <form action="#">
                                                                @csrf
                                                            <span>
                                                                <input type="text" class="comment_username" placeholder="Nhập tên của bạn (công khai)"
                                                                    style="margin-left: 0;width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px; background: #f7f7f0; font-size: 14px; color: #555;" />
                                                            </span>

                                                            <textarea name="comment" class="comment_content" placeholder="Nội dung bình luận"
                                                                style="width: 100%; height: 120px; padding: 10px; border: 1px solid #ddd; border-radius: 5px; background: #f7f7f0; font-size: 14px; color: #555;"></textarea>
                                                            <div id="notify_comment"></div>
                                                            <b style="font-size: 14px; color: #333;">Rating:</b>
                                                            <ul class="list-inline rating-stars" data-product_id="{{ $value->product_id }}">
                                                                @for($count = 1; $count <= 5; $count++)
                                                                    <li class="rating star"
                                                                        id="{{ $value->product_id }}-{{ $count }}"
                                                                        data-index="{{ $count }}"
                                                                        data-product_id="{{ $value->product_id }}"
                                                                        style="cursor:pointer; color:#ccc; font-size: 20px;">
                                                                        &#9733;
                                                                    </li>
                                                                @endfor
                                                            </ul>

                                                            <button type="button" class="btn btn-default pull-right sent-comment"
                                                                style="background: #ff9800; color: white; border: none; padding: 8px 16px; border-radius: 5px; font-size: 14px; cursor: pointer;">
                                                                Gửi đánh giá
                                                            </button>

                                                            </form>
                                                        </div>
                                                    </div>

                                                </div>
                        </div><!--/category-tab-->
                    @endforeach

                <div class="recommended_items"><!--recommended_items-->
                                        <h2 class="title text-center">Sản phẩm liên quan</h2>
                                        <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">

                                            <div class="carousel-inner">
                                                <div class="item active">
                                                    @foreach($related_product as $key => $value)
                                                    <div class="col-sm-3">
                                                        <div class="product-image-wrapper" style="
                                                            background: #fff;
                                                            border-radius: 12px;
                                                            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
                                                            padding: 20px;
                                                            margin-bottom: 20px;
                                                            transition: all 0.3s ease;
                                                            cursor: pointer;
                                                        "
                                                        onmouseover="this.style.transform='scale(1.02)'; this.style.boxShadow='0 8px 20px rgba(0,0,0,0.15)'"
                                                        onmouseout="this.style.transform='scale(1)'; this.style.boxShadow='0 4px 12px rgba(0,0,0,0.05)'"
                                                        >

                                                            <div class="single-products">
                                                                <div class="productinfo text-center" style="
                                                                    display: flex;
                                                                    flex-direction: column;
                                                                    align-items: center;
                                                                    justify-content: space-between;
                                                                    height: 368px;
                                                                ">
                                                                <div style="position: relative;">
                                                                    <img src="{{URL::to('public/upload/product/'.$value->product_image)}}" alt="" style="
                                                                        width: 150px;
                                                                        height: auto;
                                                                        object-fit: contain;
                                                                        margin-bottom: 10px;
                                                                    " />
                                                                    @if (!empty($value->product_discount_price))
                                                                        <span style="position: absolute; top: 10px; left: 10px; background-color: red; color: white; padding: 3px 8px; font-size: 12px; border-radius: 4px;">
                                                                            Giảm giá
                                                                        </span>
                                                                    @endif
                                                                </div>
                                                                    @if (!empty($value->product_discount_price))
                                                                        <h2 style="min-height: 40px; font-size: 20px; color: #FE980F;">
                                                                            <span style="text-decoration: line-through; color: #999; font-size: 16px; margin-right: 10px;">
                                                                                {{ number_format($value->product_price, 0, ',', '.') }} VNĐ
                                                                            </span>
                                                                            <span style="color: #fe980f; font-size: 18px;">
                                                                                {{ number_format($value->product_discount_price, 0, ',', '.') }} VNĐ
                                                                            </span>
                                                                        </h2>
                                                                    @else
                                                                        <h2 style="color: #fe980f; font-size: 18px;">
                                                                            {{ number_format($value->product_price, 0, ',', '.') }} VNĐ
                                                                        </h2>
                                                                    @endif
                                                                    <p style="min-height: 50px; text-align: center; color: #555;">
                                                                        {{ $value->product_name }}
                                                                    </p>
                                                                    <input type="hidden" class="cart_product_id_{{ $value->product_id }}" value="{{ $value->product_id }}">
                                                                    <input type="hidden" id="wishlist_productName{{$value->product_id}}" class="cart_product_name_{{ $value->product_id }}" value="{{ $value->product_name }}">
                                                                    <input type="hidden" class="cart_product_image_{{ $value->product_id }}" value="{{ $value->product_image }}">
                                                                    <input type="hidden" id="wishlish_productPrice{{$value->product_id}}" class="cart_product_price_{{ $value->product_id }}" value="{{ number_format($value->product_price, 0, ',', '.') }} VNĐ">
                                                                    <input type="hidden"  class="cart_product_qty_{{ $value->product_id }}" value="1">
                                                                    <button type="button" class="btn btn-default add-to-cart" data-id_product="{{ $value->product_id }}"
                                                                        style="
                                                                        margin-top: auto;
                                                                        background-color: #f5f5ed;
                                                                        border: none;
                                                                        color: #444;
                                                                        transition: background 0.3s;
                                                                        border-radius: 24px;
                                                                        padding: 10px 16px;"

                                                                    onmouseenter="this.style.background='#e78c13'"
                                                                    onmouseleave="this.style.background='#f5f5ed'">
                                                                        <i class="fa fa-shopping-cart"></i> Thêm giỏ hàng
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    @endforeach
                                                </div>
                                                <div class="item">
                                                    @foreach($related_product1 as $key => $value)
                                                    <div class="col-sm-3">
                                                        <div class="product-image-wrapper" style="
                                                            background: #fff;
                                                            border-radius: 12px;
                                                            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
                                                            padding: 20px;
                                                            margin-bottom: 20px;
                                                            transition: all 0.3s ease;
                                                            cursor: pointer;
                                                        "
                                                        onmouseover="this.style.transform='scale(1.02)'; this.style.boxShadow='0 8px 20px rgba(0,0,0,0.15)'"
                                                        onmouseout="this.style.transform='scale(1)'; this.style.boxShadow='0 4px 12px rgba(0,0,0,0.05)'"
                                                        >

                                                            <div class="single-products">
                                                                <div class="productinfo text-center" style="
                                                                    display: flex;
                                                                    flex-direction: column;
                                                                    align-items: center;
                                                                    justify-content: space-between;
                                                                    height: 368px;">
                                                                        <div style="position: relative;">
                                                                            <img src="{{URL::to('public/upload/product/'.$value->product_image)}}" alt="" style="
                                                                                width: 150px;
                                                                                height: auto;
                                                                                object-fit: contain;
                                                                                margin-bottom: 10px;
                                                                            " />
                                                                            @if (!empty($value->product_discount_price))
                                                                                <span style="position: absolute; top: 10px; left: 10px; background-color: red; color: white; padding: 3px 8px; font-size: 12px; border-radius: 4px;">
                                                                                    Giảm giá
                                                                                </span>
                                                                            @endif
                                                                        </div>
                                                                        @if (!empty($value->product_discount_price))
                                                                            <h2 style="min-height: 40px; font-size: 20px; color: #FE980F;">
                                                                                <span style="text-decoration: line-through; color: #999; font-size: 16px; margin-right: 10px;">
                                                                                    {{ number_format($value->product_price, 0, ',', '.') }} VNĐ
                                                                                </span>
                                                                                <span style="color: #fe980f; font-size: 18px;">
                                                                                    {{ number_format($value->product_discount_price, 0, ',', '.') }} VNĐ
                                                                                </span>
                                                                            </h2>
                                                                        @else
                                                                            <h2 style="color: #fe980f; font-size: 18px;">
                                                                                {{ number_format($value->product_price, 0, ',', '.') }} VNĐ
                                                                            </h2>
                                                                        @endif
                                                                        <p style="min-height: 50px; text-align: center; color: #555;">
                                                                            {{ $value->product_name }}
                                                                        </p>
                                                                        <input type="hidden" class="cart_product_id_{{ $value->product_id }}" value="{{ $value->product_id }}">
                                                                        <input type="hidden" id="wishlist_productName{{$value->product_id}}" class="cart_product_name_{{ $value->product_id }}" value="{{ $value->product_name }}">
                                                                        <input type="hidden" class="cart_product_image_{{ $value->product_id }}" value="{{ $value->product_image }}">
                                                                        <input type="hidden" id="wishlish_productPrice{{$value->product_id}}" class="cart_product_price_{{ $value->product_id }}" value="{{ number_format($value->product_price, 0, ',', '.') }} VNĐ">
                                                                        <input type="hidden"  class="cart_product_qty_{{ $value->product_id }}" value="1">
                                                                        <button type="button" class="btn btn-default add-to-cart" data-id_product="{{ $value->product_id }}"
                                                                            style="
                                                                            margin-top: auto;
                                                                            background-color: #f5f5ed;
                                                                            border: none;
                                                                            color: #444;
                                                                            transition: background 0.3s;
                                                                            border-radius: 24px;
                                                                            padding: 10px 16px;"

                                                                        onmouseenter="this.style.background='#e78c13'"
                                                                        onmouseleave="this.style.background='#f5f5ed'">
                                                                            <i class="fa fa-shopping-cart"></i> Thêm giỏ hàng
                                                                        </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
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

				</div>
			</div>
		</div>
	</section>

	<footer id="footer" ><!--Footer-->
		<div class="footer-top">
			<div class="container" >
				<div class="row">
					<div class="col-sm-8">
                    <div class="companyinfo" style="margin-top: 40px;">
                        <span style="font-size: 24px; font-weight: bold; color: #FF8C00; font-family: 'Poppins', sans-serif;">
                            FurryFriend.com
                        </span>
                        <span style="
                            display: block;
                            margin-top: 10px;
                            font-size: 14px;
                            line-height: 1.6;
                            color: #555;
                            font-family: 'Poppins', sans-serif;
                            max-width: 500px;
                        ">
                            FurryFriend là người bạn đồng hành đáng tin cậy của thú cưng và chủ nuôi.
                            Chúng tôi cung cấp các sản phẩm chất lượng, an toàn và tiện ích dành cho chó mèo, từ thức ăn đến phụ kiện chăm sóc.
                            Với FurryFriend, việc chăm sóc thú cưng trở nên dễ dàng và trọn vẹn hơn bao giờ hết!
                        </span>
                    </div>

					</div>
					<div class="col-sm-1">
					</div>
					<div class="col-sm-3">
                        <div class="address">
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d553.4992184813427!2d105.75927469230241!3d21.053320005725624!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x313454dd70d387ab%3A0x24ce05baa53824b0!2zNTIgSOG6u20gMTkzLzIyMC81MCwgUGjDuiBEaeG7hW4sIELhuq9jIFThu6sgTGnDqm0sIEjDoCBO4buZaSwgVmnhu4d0IE5hbQ!5e0!3m2!1svi!2s!4v1744112679735!5m2!1svi!2s"
                                class="map-iframe"
                                allowfullscreen=""
                                loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade">
                            </iframe>
                            <!-- <p>9 Ngõ 101 Nguyễn Đạo An, Phú Diễn, Bắc Từ Liêm, Hà Nội</p> -->
                        </div>
                    </div>

				</div>
			</div>
		</div>

		<div class="footer-widget">
			<div class="container" style="padding-bottom:30px;">
            <div class="row" style="display: flex; flex-wrap: wrap; margin-top: 30px; gap: 20px;">
                <!-- Cột 1 -->
                <div class="col-sm-2" style="flex: 1; min-width: 180px;">
                    <div class="single-widget">
                    <h2 style="font-size: 18px; font-weight: bold; color: #333; margin-bottom: 16px;">FurryFriend Shop</h2>
                    <ul class="nav nav-pills nav-stacked" style="list-style: none; padding: 0; line-height: 1.8;">
                        <li><a href="#" style="color: #555;">Giới thiệu</a></li>
                        <li><a href="#" style="color: #555;">Thành viên FurryFriend</a></li>
                        <li><a href="#" style="color: #555;">Điều khoản sử dụng</a></li>
                        <li><a href="#" style="color: #555;">Tuyển dụng</a></li>
                    </ul>
                    </div>
                </div>

                <!-- Cột 2 -->
                <div class="col-sm-3" style="flex: 1; min-width: 200px;">
                    <div class="single-widget">
                    <h2 style="font-size: 18px; font-weight: bold; color: #333; margin-bottom: 16px;">Hỗ Trợ Khách Hàng</h2>
                    <ul class="nav nav-pills nav-stacked" style="list-style: none; padding: 0; line-height: 1.8;">
                        <li><a href="#" style="color: #555;">Chính Sách Đổi Trả Hàng</a></li>
                        <li><a href="#" style="color: #555;">Phương Thức Vận Chuyển</a></li>
                        <li><a href="#" style="color: #555;">Chính Sách Bảo Mật</a></li>
                        <li><a href="#" style="color: #555;">Phương Thức Thanh Toán</a></li>
                        <li><a href="#" style="color: #555;">Chính Sách Hoàn Tiền</a></li>
                    </ul>
                    </div>
                </div>

                <!-- Cột 3 -->
                <div class="col-sm-3" style="flex: 1; min-width: 200px;">
                    <div class="single-widget">
                    <h2 style="font-size: 18px; font-weight: bold; color: #333; margin-bottom: 16px;">Liên hệ</h2>
                    <ul class="nav nav-pills nav-stacked" style="list-style: none; padding: 0; line-height: 1.8;">
                        <li><a href="#" style="color: #555;"><i class="fa fa-phone"></i> Hotline: 0867677891</a></li>
                        <li><a href="#" style="color: #555;"><i class="fa fa-envelope"></i> Email: contact@paddy.vn</a></li>
                    </ul>
                    </div>
                </div>

                <!-- Cột 4: Form đăng ký -->
                <div class="col-sm-4" style="flex: 1; min-width: 300px;">
                <div class="single-widget" style="
                    background: #fff;
                    border-radius: 16px;
                    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.07);
                    padding: 30px 20px;
                    text-align: center;
                ">
                    <h2 style="
                    font-size: 20px;
                    font-weight: 700;
                    text-transform: uppercase;
                    color: #333;
                    margin-bottom: 25px;
                    line-height: 1.4;
                    ">
                    Thành viên<br>FurryFriend
                    </h2>

                    <form action="#" class="searchform" style="display: flex; justify-content: center;">
                    <div style="
                        position: relative;
                        width: 100%;
                        max-width: 340px;
                    ">
                        <input type="email" placeholder="Email của bạn..." style="
                        width: 100%;
                        padding: 12px 50px 12px 16px;
                        border: 1px solid #ddd;
                        border-radius: 999px;
                        outline: none;
                        font-size: 14px;
                        background: #fdfdfd;
                        " />

                        <button type="submit" style="
                        position: absolute;
                        top: 56%;
                        right: 1px;
                        transform: translateY(-50%);
                        background: #f89c1f;
                        border: none;
                        padding: 12px 11px;
                        border-radius: 50%;
                        display: flex;
                        align-items: center;
                        justify-content: center;
                        transition: background 0.3s;
                        cursor: pointer;
                        "
                        onmouseover="this.style.background='#e78c13'"
                        onmouseout="this.style.background='#f89c1f'">
                        <i class="fa fa-arrow-circle-o-right" style="color: #fff; font-size: 18px;"></i>
                        </button>
                    </div>
                    </form>

                    <p style="
                    font-size: 13.5px;
                    color: #555;
                    margin-top: 18px;
                    line-height: 1.6;
                    ">
                    Đăng ký thành viên ngay hôm nay để nhận email về sản phẩm mới<br />
                    và chương trình khuyến mãi của <strong style="color: #333;">FurryFriend</strong>
                    </p>
                </div>
                </div>


			</div>
		</div>

	</footer><!--/Footer-->
    <!--Start of Fchat.vn-->
    <script type="text/javascript" src="https://cdn.fchat.vn/assets/embed/webchat.js?id=683abd6c910a1412100f1789" async="async"></script>
    <!--End of Fchat.vn-->

    <script src="https://cdn.jsdelivr.net/npm/emoji-mart@latest/dist/browser.js"></script>
    <script src="{{asset('public/fontend/js/chatbot.js')}}"></script>
    <script src="{{asset('public/fontend/js/jquery.js')}}"></script>
	<script src="{{asset('public/fontend/js/bootstrap.min.js')}}"></script>
	<script src="{{asset('public/fontend/js/jquery.scrollUp.min.js')}}"></script>
	<script src="{{asset('public/fontend/js/price-range.js')}}"></script>
    <script src="{{asset('public/fontend/js/jquery.prettyPhoto.js')}}"></script>
    <script src="{{asset('public/fontend/js/main.js')}}"></script>

    <!-- <script src="{{asset('public/fontend/js/sweetalert.js')}}"></script> -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <script src="{{asset('public/fontend/js/lightslider.js')}}"></script>
    <script src="{{asset('public/fontend/js/lightgallery-all.min.js')}}"></script>
    <script src="{{asset('public/fontend/js/prettify.js')}}"></script>
    <!--Start of Fchat.vn-->
    <script type="text/javascript" src="https://cdn.fchat.vn/assets/embed/webchat.js?id=6804c4b40967f4a48e03bc27" async="async"></script>
<!--End of Fchat.vn-->
<script type="text/javascript">
    $(document).ready(function(){
        $('.add-to-cart').click(function(){
            var id = $(this).data('id_product'); // Lấy ID sản phẩm
            var _token = $('input[name="_token"]').val();

            $.ajax({
                url: "{{ url('/save-cart') }}",
                method: "POST",
                data: {
                    _token: _token,
                    product_id: id,
                    product_qty: 1
                },
                success: function(response){
                    if (response.totalQuantity !== undefined) {
                        $('.cart-count').text(response.totalQuantity);
                    }
                    swal({
                        title: "Đã thêm sản phẩm vào giỏ hàng",
                        text: "Bạn có thể mua hàng tiếp hoặc tới giỏ hàng để tiến hành thanh toán",
                        icon: "success",
                        timer: 1000,
                        buttons: {
                            cancel: "Xem tiếp",
                            confirm: {
                                text: "Đi đến giỏ hàng",
                                value: true,
                                visible: true,
                                className: "btn-success"
                            }
                        }
                    }).then((goToCart) => {
                        if (goToCart) {
                            window.location.href = "{{ url('/show-cart') }}";
                        }
                    });
                },
                error: function(response){
                    swal("Lỗi!", response.responseJSON.error, "error");
                }
            });
        });
    });
</script>
<!-- JavaScript để hover xổ menu tai khoan -->
    <script>
       document.querySelectorAll('li[style]').forEach(function(item) {
         item.addEventListener('mouseenter', function() {
           let submenu = this.querySelector('ul');
           if (submenu) submenu.style.display = 'block';
         });
         item.addEventListener('mouseleave', function() {
           let submenu = this.querySelector('ul');
           if (submenu) submenu.style.display = 'none';
         });
       });
     </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const tasteButtons = document.querySelectorAll('.taste-option');
            const selectedTasteInput = document.getElementById('selected-taste-id');

            tasteButtons.forEach(button => {
                button.addEventListener('click', function() {
                    // Reset lại style các nút
                    tasteButtons.forEach(btn => {
                        btn.style.borderColor = '#ccc';
                        btn.style.backgroundColor = '#fff';
                    });

                    // Tô đậm nút đã chọn
                    this.style.borderColor = '#fe980f';
                    this.style.backgroundColor = '#fff7e6';

                    // Gán id vào input ẩn
                    selectedTasteInput.value = this.dataset.tasteId;
                });
            });
        });
    </script>

    <script>
        function toggleContent() {
            var content = document.getElementById('product-content');
            var btn = document.getElementById('read-more-btn');

            if (content.style.maxHeight === '200px') {
                content.style.maxHeight = '5000px';
                btn.textContent = 'Thu Gọn';
            } else {
                content.style.maxHeight = '200px';
                btn.textContent = 'Đọc Thêm';
            }
        }
    </script>


    <script type="text/javascript">
        $('#keywords').keyup(function(){
            var query = $(this).val();
            if(query != ''){
                var _token = $('input[name="_token"]').val();
                $.ajax({
                    url: "{{ url('/autocomplete-ajax') }}",
                    method: "post",
                    data: {query: query, _token: _token},
                    success: function(data){
                        $('#search_ajax').fadeIn();
                        $('#search_ajax').html(data);
                    }
                });
            }else{
                $('#search_ajax').fadeOut();
            }
        });
        $(document).on('click','li',function(){
            $('#keywords').val($(this).text());
            $('#search_ajax').fadeOut();
        });
        $(document).click(function(e) {
            if (!$(e.target).closest('#keywords, #search_ajax').length) {
                $('#search_ajax').fadeOut();
            }
        });
    </script>

    <script>
    function updateTime() {
        var now = new Date();

        // Lấy giờ & phút với định dạng AM/PM
        var hours = now.getHours();
        var minutes = now.getMinutes();
        var ampm = hours >= 12 ? 'PM' : 'AM';
        hours = hours % 12 || 12; // Chuyển 0h thành 12h
        minutes = minutes < 10 ? '0' + minutes : minutes;

        var timeString = hours + ':' + minutes + ' ' + ampm;
        document.getElementById("current-time").innerHTML = timeString;

        // Lấy ngày, tháng, năm
        var days = ['Chủ Nhật', 'Thứ Hai', 'Thứ Ba', 'Thứ Tư', 'Thứ Năm', 'Thứ Sáu', 'Thứ Bảy'];
        var months = ['Tháng 1', 'Tháng 2', 'Tháng 3', 'Tháng 4', 'Tháng 5', 'Tháng 6', 'Tháng 7', 'Tháng 8', 'Tháng 9', 'Tháng 10', 'Tháng 11', 'Tháng 12'];

        var dayName = days[now.getDay()];
        var day = now.getDate();
        var monthName = months[now.getMonth()];
        var year = now.getFullYear();

        var dateString = `${dayName}, ${day} ${monthName}, ${year}`;
        document.getElementById("current-date").innerHTML = dateString;
    }

    updateTime(); // Cập nhật lần đầu khi trang tải
    setInterval(updateTime, 60000); // Cập nhật mỗi phút
</script>

<script>
    function toggleReply(commentId) {
        var replySection = document.getElementById("reply_section_" + commentId);
        var toggleButton = document.getElementById("toggle_button_" + commentId);

        if (replySection.style.display === "none" || replySection.style.display === "") {
            replySection.style.display = "block";
            toggleButton.textContent = "Ẩn phản hồi";
        } else {
            replySection.style.display = "none";
            toggleButton.textContent = "Xem phản hồi";
        }
    }
</script>
<script>
    function toggleReplyBox(commentId) {
        var replyBox = document.getElementById("reply_box_" + commentId);

        if (replyBox.style.display === "none" || replyBox.style.display === "") {
            replyBox.style.display = "block";
        } else {
            replyBox.style.display = "none";
        }
    }

    function sendReply(commentId, productId) {
    var replyText = document.getElementById("reply_input_" + commentId).value;

    if (replyText.trim() === "") {
        alert("Vui lòng nhập phản hồi!");
        return;
    }

    fetch('/reply-comment', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: JSON.stringify({
            comment: replyText,
            parent_id: commentId,
            product_id: productId
        })
    })
    .then(response => response.json())
    .then(data => {
        alert(data.message);
        location.reload(); // Reload để hiển thị phản hồi
    })
    .catch(error => console.error('Lỗi:', error));
    }
</script>

    <script>
         $(document).ready(function() {
            $('#imageGallery').lightSlider({
                gallery:true,
                item:1,
                loop:true,
                thumbItem:9,
                slideMargin:0,
                enableDrag: false,
                currentPagerPosition:'left',
                onSliderLoad: function(el) {
                    el.lightGallery({
                        selector: '#imageGallery .lslide'
                    });
                }
            });
        });
    </script>
    <script>
        $(document).ready(function(){

            load_comment();
            function load_comment(){
                var product_id = $('.comment_product_id').val();
                var _token = $('input[name="_token"]').val();
                $.ajax({
                    url: "{{ url('/load-comment') }}",
                    method: "post",
                    data: {product_id: product_id, _token: _token},
                    success: function(data){

                        $('#comment_show').html(data);
                    }
                });
            }

            var selectedRating = {}; // Lưu trạng thái rating đã chọn theo product_id

            // Xử lý hover để hiển thị tạm thời số sao
            $(".rating").mouseenter(function () {
                var index = $(this).data("index");
                var product_id = $(this).data("product_id");

                // Reset tất cả sao về xám
                $(".rating[data-product_id='" + product_id + "']").css("color", "#ccc");

                // Hiển thị vàng theo số sao đang hover
                for (var count = 1; count <= index; count++) {
                    $(".rating[data-product_id='" + product_id + "'][data-index='" + count + "']").css("color", "#ffcc00");
                }
            });

            // Xử lý khi rời chuột, nếu đã chọn rating thì giữ nguyên, chưa chọn thì reset
            $(".rating").mouseleave(function () {
                var product_id = $(this).data("product_id");
                var index = selectedRating[product_id] || 0; // Lấy rating đã chọn, nếu chưa chọn thì là 0

                $(".rating[data-product_id='" + product_id + "']").css("color", "#ccc");

                for (var count = 1; count <= index; count++) {
                    $(".rating[data-product_id='" + product_id + "'][data-index='" + count + "']").css("color", "#ffcc00");
                }
            });

            // Xử lý click để chọn số sao
            $(".rating").click(function () {
                var index = $(this).data("index");
                var product_id = $(this).data("product_id");

                selectedRating[product_id] = index; // Lưu rating đã chọn

                $(".rating[data-product_id='" + product_id + "']").css("color", "#ccc");

                for (var count = 1; count <= index; count++) {
                    $(".rating[data-product_id='" + product_id + "'][data-index='" + count + "']").css("color", "#ffcc00");
                }
            });

            $('.sent-comment').click(function(){
                var product_id = $('.comment_product_id').val();
                var comment_username = $('.comment_username').val();
                var comment_content = $('.comment_content').val();
                var rating = selectedRating[product_id] || 0;
                var _token = $('input[name="_token"]').val();
                if (rating === undefined) {
                    alert("Vui lòng chọn số sao!");
                    return;
                }
                $.ajax({
                    url: "{{ url('/sent-comment') }}",
                    method: "post",
                    data: {product_id: product_id,comment_username:comment_username,comment_content:comment_content,rating:rating, _token: _token},
                    success: function(data){
                        $('#notify_comment').html('<span class="text text-success">Bình luận đang chờ được duyệt</span>')
                        load_comment();
                        $('#notify_comment').fadeOut(5000);
                        $('.comment_username').val('');
                        $('.comment_content').val('');
                        $(".rating").removeClass("selected").css("color", "#ccc");
                    }
                });
            });
        });
    </script>

</body>
</html>
