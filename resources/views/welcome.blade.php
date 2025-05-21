<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Seo meta -->
    <meta name="description" content="{{ substr($meta_desc, 0, 120) }}">
    <meta name="keywords" content="{{$meta_keywords}}">
    <meta name="robots" content="INDEX,FOLLOW">
    <link rel="canonical" href="{{$url_canonical}}">
    <meta name="author" content="">
    <link rel="icon" type="image/x-icon" href="">
    <link rel="icon" href="{{asset('public/fontend/images/furryFriend.png')}}" type="image/gif" sizes="16x16">
     <!-- End Seo meta -->
    <title>{{$meta_title}}</title>
    <link href="{{asset('public/fontend/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('public/fontend/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('public/fontend/css/prettyPhoto.css')}}" rel="stylesheet">
    <link href="{{asset('public/fontend/css/price-range.css')}}" rel="stylesheet">
    <link href="{{asset('public/fontend/css/animate.css')}}" rel="stylesheet">
    <link href="{{asset('public/fontend/css/main.css')}}" rel="stylesheet">
	<link href="{{asset('public/fontend/css/responsive.css')}}" rel="stylesheet">
    <link href="{{asset('public/fontend/css/sweetalert.css')}}" rel="stylesheet">
    <link href="{{asset('public/fontend/css/lightgallery.min.css')}}" rel="stylesheet">
    <link href="{{asset('public/fontend/css/lightslider.css')}}" rel="stylesheet">
    <link href="{{asset('public/fontend/css/prettify.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.14.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
    <link rel="shortcut icon" href="{{('public/fontend/images/ico/favicon.ico')}}">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{('public/fontend/images/ico/apple-touch-icon-144-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{('public/fontend/images/ico/apple-touch-icon-114-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{('public/fontend/images/ico/apple-touch-icon-72-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" href="{{('public/fontend/images/ico/apple-touch-icon-57-precomposed.png')}}">

    <script src="https://kit.fontawesome.com/ff4b23649f.js" crossorigin="anonymous"></script>

    <style>

        .footer-widget {
            margin-bottom: 0;
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
    /* Xóa kiểu dáng mặc định của danh sách */
.nav-pills.nav-stacked {
    list-style: none;
    padding-left: 0;
    margin: 0;
}

/* Định dạng cho các mục li */
.nav-pills.nav-stacked li {
    margin-bottom: 8px; /* Khoảng cách giữa các mục */
}

/* Định dạng cho các liên kết a */
.nav-pills.nav-stacked li a {
    display: block;
    padding: 8px 15px; /* Giảm padding để trông gọn gàng hơn */
    background-color: #f1f1f1; /* Màu nền sáng nhẹ */
    color: #555; /* Màu chữ xám đậm */
    text-decoration: none; /* Xóa gạch chân */
    border-radius: 15px; /* Bo tròn góc nhẹ */
    font-size: 14px; /* Giảm kích thước chữ */
    font-weight: 400; /* Độ đậm chữ nhẹ */
    transition: background-color 0.3s ease, transform 0.2s ease; /* Hiệu ứng chuyển nền và phóng to */
}

/* Khi hover vào liên kết */
.nav-pills.nav-stacked li a:hover {
    background-color: #ff980f; /* Màu nền khi hover */
    color: #fff; /* Màu chữ trắng khi hover */
    transform: scale(1.02); /* Hiệu ứng phóng to nhẹ khi hover */
}

/* Hiệu ứng khi hover mục li */
.nav-pills.nav-stacked li:hover a {
    text-decoration: none; /* Đảm bảo không có gạch chân khi hover */
}
.productinfo {
        padding: 15px;
        border: 1px solid #eee;
        border-radius: 10px;
        background-color: #fff;
        box-shadow: 0 2px 8px rgba(0,0,0,0.05);
        transition: transform 0.3s ease;
        height: 100%;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }

    .productinfo:hover {
        transform: translateY(-5px);
    }
    .product-image{
    width: 100%;
    height: auto;
    display: flex;
    justify-content: center;
    align-items: center;
    overflow: hidden;
    background: #fff;
}
    .productinfo img {
        max-width: 100%;
        height: 100%;
        margin-bottom: 10px;
        object-fit: cover;
        border-radius: 6px;
    }

    .productinfo h2 {
        color: #FF7A00;
        font-size: 20px;
        margin-bottom: 5px;
    }

    .productinfo p {
        font-size: 15px;
        color: #333;
        min-height: 48px;
        margin-bottom: 10px;
        line-height: 1.4;
    }

    .button-group {
        display: flex;
        gap: 8px;
        margin-top: auto;
    }

    .button-group button {
        flex: 1;
        font-size: 14px;
        padding: 8px;
        border-radius: 6px;
        border: none;
        transition: 0.3s;
    }

    .add-to-cart {
        background-color: #f5f5ed;
        color: #444;
    }

    .add-to-cart:hover {
        background-color: #fe980f;
    }

    .xemnhanh {
        background-color: #f3f3f3;
        color: #444;
    }

    .xemnhanh:hover {
        background-color: #ddd;
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

	<section id="slider"><!--slider-->
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<div id="slider-carousel" class="carousel slide" data-ride="carousel">
						<ol class="carousel-indicators">
							<li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
							<li data-target="#slider-carousel" data-slide-to="1"></li>
							<li data-target="#slider-carousel" data-slide-to="2"></li>
                            <li data-target="#slider-carousel" data-slide-to="3"></li>
						</ol>
                            <div class="carousel-inner">
                                @php
                                $i = 0;
                                @endphp
                                @foreach($slider as $key => $value)
                                    @php
                                        $i++;
                                    @endphp
                                <div class="item {{$i==1 ? 'active' : ''}}">
                                    <!-- <div class="col-sm-6">
                                        <h1><span>E</span>-SHOPPER</h1>
                                        <h2>Free E-Commerce Template</h2>
                                        <p>{{$value->slider_desc}} </p>
                                        <button type="button" class="btn btn-default get">Get it now</button>
                                    </div> -->
                                    <div class="col-sm-11">
                                        <img src="{{ URL::to('public/upload/slider/'.$value->slider_image) }}" alt="{{ $value->slider_name }}" class="img img-responsive" style="height: 365px;" width="100%">
                                    </div>
                                </div>
                                @endforeach
                            </div>

						<a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
							<i class="fa fa-angle-left"></i>
						</a>
						<a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
							<i class="fa fa-angle-right"></i>
						</a>
					</div>

				</div>
			</div>
		</div>
	</section><!--/slider-->

	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<div class="left-sidebar">
						<h2>Danh mục sản phẩm</h2>
						<div class="panel-group category-products" id="accordian" style="margin-bottom: 20px;">
                            @foreach ($category_product as $key => $category)
                                <div class="panel panel-default" style="border: none; border-radius: 6px;">
                                    @if($category->category_parent == 0)
                                        <div class="panel-heading" style="background-color: #f1f1f1; padding: 10px 15px; border-radius: 15px;">
                                            <h4 class="panel-title" style="margin: 0;">
                                                <a data-toggle="collapse" data-parent="#accordian" href="#{{$category->category_id}}" style="color: #555; text-decoration: none; font-size: 14px; font-weight: 400;">
                                                    <span class="badge pull-right" style="background-color: #f1f1f1; color: #555; font-size: 12px;"><i class="fa fa-plus"></i></span>
                                                    {{$category->category_name}}
                                                </a>
                                            </h4>
                                        </div>
                                    @endif
                                </div>

                                <div id="{{$category->category_id}}" class="panel-collapse collapse" style="background-color: #f8f9fa; border-radius:15px;">
                                    <div class="panel-body" style="padding: 10px;">
                                        <ul style="list-style: none; padding-left: 0; margin: 0;">
                                            @foreach($category_product as $key => $value)
                                                @if($value->category_parent == $category->category_id)
                                                    <li style="padding: 6px 0;">
                                                        <a href="{{URL::to('/danh-muc-san-pham/'.$value->category_slug)}}" style="color: #555; text-decoration: none; font-size: 12px; font-weight: 400; transition: color 0.3s ease;"
                                                            onmouseover="this.style.color='#fe980f'; this.style.paddingLeft='5px';"
                                                            onmouseout="this.style.color='#555'; this.style.paddingLeft='0';">
                                                            {{$value->category_name}}
                                                        </a>
                                                    </li>
                                                @endif
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>

                            @endforeach
                        </div>


						<div class="brands_products"><!--brands_products-->
							<h2>Thương hiệu sản phẩm</h2>

							<div class="brands-name">
								<ul class="nav nav-pills nav-stacked">
                                @foreach ($brand_product as $key => $brand)
									<li><a href="{{URL::to('/thuong-hieu-san-pham/'.$brand->brand_slug)}}"> {{$brand->brand_name}}</a></li>
                                @endforeach
								</ul>
							</div>

						</div><!--/brands_products-->

						<div class="price-range"><!--price-range-->
							<h2>Sản phẩm yêu thích</h2>
							<div class="brands-name">
                                <div id="row_wishlist" class="row">

                                </div>
							</div>
						</div><!--/price-range-->

						<div class="shipping text-center"><!--shipping-->
							<img src="{{ asset('public/fontend/images/vanchuyentoancau.png') }}" height="350px" width="270px" alt="" />
						</div>

					</div>
				</div>

				<div class="col-sm-9 padding-right">
                    @yield('content')
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
    <script type="text/javascript" src="https://cdn.fchat.vn/assets/embed/webchat.js?id=6804c4b40967f4a48e03bc27" async="async"></script>
<!--End of Fchat.vn-->

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


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    {{-- <script src="https://code.jquery.com/jquery-3.7.1.js"></script> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
     <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
     <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
     <!-- // Cập nhật đường dẫn khi đổi tab -->
     <script>
        $(document).ready(function() {
            function updateViewAllLink(tabId) {
                let baseUrl = "{{ URL::to('danh-sach-san-pham') }}";
                let queryParam = "";

                // Cập nhật tham số URL cho từng tab
                switch(tabId) {
                    case "#tshirt":
                        queryParam = "?type=moi-nhat";
                        break;
                    case "#sunglass":
                        queryParam = "?type=xem-nhieu";
                        break;
                    case "#kids":
                        queryParam = "?type=mua-nhieu";
                        break;
                    case "#giamgia":
                        queryParam = "?type=giam-gia";
                        break;
                    default:
                        queryParam = "";
                        break;
                }

                // Cập nhật href cho các liên kết "Xem tất cả" của các tab tương ứng
                if (tabId === "#tshirt") {
                    $('#view-all-link-tshirt').attr('href', baseUrl + queryParam);
                } else if (tabId === "#sunglass") {
                    $('#view-all-link-sunglass').attr('href', baseUrl + queryParam);
                } else if (tabId === "#kids") {
                    $('#view-all-link-kids').attr('href', baseUrl + queryParam);
                } else if (tabId === "#giamgia") {
                    $('#view-all-link-giamgia').attr('href', baseUrl + queryParam);
                }
            }

            // Cập nhật khi tab được click
            $('.nav-tabs a').on('shown.bs.tab', function(e) {
                let target = $(e.target).attr("href"); // Lấy ID của tab đang chọn
                updateViewAllLink(target);  // Cập nhật link cho tab được chọn
            });

            // Khi trang vừa load, lấy tab đang hiển thị (active) và cập nhật link
            let activeTab = $('.tab-pane.active'); // Thay vì lấy tab từ nav-tabs, lấy từ tab-pane
            let initialTabId = activeTab.attr('id'); // Lấy id của tab active

            if (initialTabId) {
                updateViewAllLink("#" + initialTabId); // Cập nhật view-all link cho tab hiện tại
            }
        });
    </script>


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
        @php
            $start_price = request('start_price') ?? $min_price;
            $end_price = request('end_price') ?? $max_price;
        @endphp
        $( function() {
            $( "#slider-range" ).slider({
            range: true,
            min: {{$min_price}},
            max: 600000,
            values: [ {{ $start_price }}, {{ $end_price }} ],
            step:10000,
            slide: function(event, ui) {
                var formatCurrency = new Intl.NumberFormat('vi-VN').format;

                $("#amount").val(formatCurrency(ui.values[0]) + " VNĐ - " + formatCurrency(ui.values[1]) + " VNĐ");
                $("#start_price").val(ui.values[0]);
                $("#end_price").val(ui.values[1]);
            }

            });
            var formatCurrency = new Intl.NumberFormat('vi-VN').format;

            $("#amount").val(formatCurrency($("#slider-range").slider("values", 0)) + " VNĐ - " +
                 formatCurrency($("#slider-range").slider("values", 1)) + " VNĐ");

        } );
  </script>
    <script>
        $(document).ready(function(){
            $('#sort').on('change',function(){
                var url = $(this).val();

                if(url){
                    window.location = url;
                }
                return false;
            });
        });
    </script>
    <script>
    function view(){
        if(localStorage.getItem('data') != null){
            var data = JSON.parse(localStorage.getItem('data'));
            data.reverse();
            document.getElementById('row_wishlist').style.overflow = 'scroll';
            document.getElementById('row_wishlist').style.height = '450px';

            $("#row_wishlist").html(""); // Xóa nội dung cũ trước khi cập nhật danh sách mới

            for(let i = 0; i < data.length; i++){
                var id = data[i].id;
                var name = data[i].name;
                var price = data[i].price;
                var image = data[i].image;
                var url = data[i].url;

                $("#row_wishlist").append(`
                    <div class="row wishlist-item" data-id="${id}" style="margin:10px 0">
                        <button class="remove-wishlist" data-id="${id}">×</button>
                        <div class="col-md-4"><img src="${image}" width="100%"></div>
                        <div class="col-md-8 info-wishlist">
                            <p>${name}</p>
                            <p style="color:#FE980F">${price}</p>
                            <a href="${url}">Đặt hàng</a>

                        </div>
                    </div>
                `);
            }
        }
    }

    function add_wishlist(clicked_id){
        var id = clicked_id;
        var name = document.getElementById('wishlist_productName' + id).value;
        var price = document.getElementById('wishlish_productPrice' + id).value;
        var image = document.getElementById('wishlish_productImage' + id).src;
        var url = document.getElementById('wishlish_productUrl' + id).href;

        var newItem = {
            'url': url,
            'id': id,
            'name': name,
            'price': price,
            'image': image
        };

        if(localStorage.getItem('data') == null){
            localStorage.setItem('data', '[]');
        }

        var old_data = JSON.parse(localStorage.getItem('data'));

        // Kiểm tra sản phẩm đã tồn tại hay chưa
        var match = old_data.find(obj => obj.id == id);
        if(match){
            toastr.warning('Sản phẩm đã có trong danh sách yêu thích!', 'Thông báo', {
                                timeOut: 1000,
                                closeButton: true,
                                progressBar: true,
                                positionClass: "toast-top-right"
                            });
        } else {
            old_data.push(newItem);
            localStorage.setItem('data', JSON.stringify(old_data));
            view(); // Cập nhật lại danh sách yêu thích
        }
    }

    $(document).on('click', '.remove-wishlist', function(){
        var id = $(this).data('id');
        var old_data = JSON.parse(localStorage.getItem('data'));

        var new_data = old_data.filter(item => item.id != id); // Xóa sản phẩm có ID tương ứng
        localStorage.setItem('data', JSON.stringify(new_data));
        view(); // Cập nhật lại danh sách hiển thị
    });

    view(); // Load danh sách yêu thích khi trang tải
</script>

<script type="text/javascript">
    $(document).ready(function() {
        // Sự kiện click xem nhanh
        $('.xemnhanh').click(function() {
            var product_id = $(this).data('id_product');
            var _token = $('input[name="_token"]').val();

            $.ajax({
                url: "{{ url('/quickly-view') }}",
                method: "POST",
                dataType: "JSON",
                data: { product_id: product_id, _token: _token },
                success: function(data) {
                    $('#product_quickview_title').html(data.product_name);
                    $('#product_quickview_id').html(data.product_id);
                    $('#product_quickview_price').html(data.product_price);
                    $('#product_quickview_image').html(data.product_image);
                    $('#product_quickview_gallery').html(data.product_gallery);
                    $('#product_quickview_desc').html(data.product_desc);
                    $('#product_quickview_content').html(data.product_content);
                    $('#productTasteContainer').html(data.product_taste);
                    $('#product_quickview_status').html(data.product_status);
                    $('#product_quickview_brand').html(data.product_brand);
                    $('#product_buyQuick').html(data.product_buyQuick);
                    $('#product_buyQuick_button').html(data.product_button);
                    $('#quickview_link').attr('href', 'chi-tiet-san-pham/' + data.product_slug);

                    // Khởi tạo lại slider sau khi render gallery
                    $('#imageGallery').lightSlider({
                        gallery: true,
                        item: 1,
                        loop: true,
                        thumbItem: 9,
                        slideMargin: 0,
                        enableDrag: false,
                        currentPagerPosition: 'left',
                        onSliderLoad: function(el) {
                            el.lightGallery({
                                selector: '#imageGallery .lslide'
                            });
                        }
                    });
                }
            });
        });

        // Xử lý chọn vị (taste-option)
        $(document).on('click', '.taste-option:not([disabled])', function() {
            // Xóa tất cả các lựa chọn trước
            $('.taste-option').css({
                'border-color': '#ccc',
                'background-color': '#fff'
            });

            // Thêm kiểu cho nút đã chọn
            $(this).css({
                'border-color': '#fe980f',
                'background-color': '#fff7e6'
            });

            // Gán giá trị vào input ẩn
            var tasteId = $(this).data('taste-id');
            $('#selected-taste-id').val(tasteId);

            // Cập nhật giá trị taste_id vào hidden input của giỏ hàng
            $('.cart_product_taste_id_' + $(this).data('product-id')).val(tasteId);
        });
    });
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
<script type="text/javascript">
        $(document).ready(function(){
            $(document).on('click','.add-to-cart-quick', function(){

                var id = $(this).data('id_product'); // Lấy ID sản phẩm
                var quantity = $('#product_qty').val();
                var _token = $('input[name="_token"]').val();
                var taste_id = $('#selected-taste-id').val();
                $.ajax({
                    url: "{{ url('/save-cart') }}",
                    method: "POST",
                    data: {
                        _token: _token,
                        product_id: id,
                        taste_id: taste_id,
                        product_qty: quantity
                    },
                    success: function(response){
                        if (response.totalQuantity !== undefined) {
                            $('.cart-count').text(response.totalQuantity);
                        }
                        if (response.success) {
                            swal({
                                title: "Thêm sản phẩm vào giỏ hàng thành công!",
                                text: response.message,
                                icon: "success",
                                timer: 1500, // Tự động đóng sau 3 giây
                                buttons: true, // Tắt nút "OK"
                            });
                        }
                    },
                    error: function(response){
                        swal("Lỗi!", response.responseJSON.error, "error");
                    }
                });
            });
        });
</script>

</body>
</html>

