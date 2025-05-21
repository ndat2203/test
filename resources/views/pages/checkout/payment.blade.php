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
     <!-- End Seo meta -->
    <title>{{$meta_title}}</title>

    <link href="{{asset('public/fontend/css/bootstrap.min.css')}}" rel="stylesheet">

    <link href="{{asset('public/fontend/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('public/fontend/css/prettyPhoto.css')}}" rel="stylesheet">
    <link href="{{asset('public/fontend/css/price-range.css')}}" rel="stylesheet">
    <link href="{{asset('public/fontend/css/animate.css')}}" rel="stylesheet">
    <link href="{{asset('public/fontend/css/main.css')}}" rel="stylesheet">
    <link href="{{asset('public/fontend/css/responsive.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('public/fontend/css/custom.css')}}">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.14.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">


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
            .panel {
                border-radius: 10px;
                border: 1px solid #ddd;
                padding: 15px;
                background: #fff;
                margin-bottom: 15px;
            }
            .btn-default {
                background: #000;
                color: #fff;
                border-radius: 5px;
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

	<section id="cart_items">
		<div class="container" style="margin-bottom: 50px;">
            <nav aria-label="breadcrumb">
				<ol class="breadcrumb" style="background:none;">
                  <li class="breadcrumb-item"><a href="{{url('/')}}">Trang chủ</a></li>
                  <li class="breadcrumb-item"><a href="{{url('/show-cart')}}">Giỏ hàng</a></li>
                  @if(isset($fromCheckout) && $fromCheckout)
                    <li class="breadcrumb-item"><a href="{{url('/checkout')}}">Địa chỉ giao hàng</a></li>
                  @endif
                  <li class="breadcrumb-item active" style="border:none;" aria-current="page">Thanh toán</li>
				</ol>
			</nav>

            <div class="row">
    <!-- Cột bên trái -->
    <div class="col-md-8">
        <!-- Địa chỉ giao hàng -->
        <div class="panel" style="position: relative; background: #fff; padding: 20px; border-radius: 10px; box-shadow: 0 4px 8px rgba(0,0,0,0.05); margin-bottom: 20px;">
            <h4 style="font-weight: bold; color: #333; margin-bottom: 15px;">Địa chỉ giao hàng</h4>
            <p style="margin: 0; font-weight: bold; color: #333;">{{ $get_customer->shipping_name }}</p>
            <p style="margin: 10px 0 0; color: #555;">
                <strong>Điện thoại:</strong> {{ $get_customer->shipping_phone }}
            </p>
            <p style="margin: 5px 0 0; color: #555;">
                <strong>Địa chỉ:</strong> {{ $get_customer->shipping_address }}
            </p>
            <p style="margin: 5px 0 0; color: #555;">
                <strong>Ghi chú:</strong> {{ $get_customer->shipping_note }}
            </p>
            <button class="btn"
                    style="
                        position: absolute;
                        top: 15px;
                        right: 15px;
                        background-color: #3498db;
                        color: #fff;
                        border: none;
                        padding: 8px 16px;
                        border-radius: 6px;
                        font-weight: bold;
                        font-size: 14px;
                        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
                        transition: background-color 0.3s, transform 0.2s;
                    "
                    data-toggle="modal" data-target="#selectShippingModal"
                    onmouseover="this.style.backgroundColor='#2980b9'"
                    onmouseout="this.style.backgroundColor='#3498db'">
                <i class="fa fa-map-marker" style="margin-right: 5px;"></i> Chọn địa chỉ khác
            </button>
        </div>
        <!-- Modal chọn địa chỉ khác -->
        <div class="modal fade" id="selectShippingModal" tabindex="-1" role="dialog" aria-labelledby="selectShippingLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="selectShippingLabel">Chọn địa chỉ giao hàng</h4>
                    </div>
                    <div class="modal-body" style="max-height: 400px; overflow-y: auto;">
                        @foreach($info_shipping as $key => $info)
                            <div class="shipping-item" data-id="{{ $info->shipping_id }}" style="background-color: #f9f9f9; padding: 15px; border-radius: 8px; box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); margin-bottom: 15px; transition: transform 0.3s ease;">
                                <div class="row">
                                    <div class="col-md-6" style="margin-bottom: 10px;">
                                        <p style="margin: 0; font-weight: bold; color: #333;">Họ tên:</p>
                                        <p style="margin: 0 0 10px; color: #555;">{{ $info->shipping_name }}</p>

                                        <p style="margin: 0; font-weight: bold; color: #333;">Số điện thoại:</p>
                                        <p style="margin: 0 0 10px; color: #555;">{{ $info->shipping_phone }}</p>
                                    </div>

                                    <div class="col-md-6" style="margin-bottom: 10px;">
                                        <p style="margin: 0; font-weight: bold; color: #333;">Địa chỉ giao hàng:</p>
                                        <p style="margin: 0; color: #555;">{{ $info->shipping_address }}</p>
                                    </div>
                                </div>

                                @if ($info->shipping_default)
                                    <span class="shipping-default-label" style="color: #27ae60; font-weight: bold; display: inline-block; margin-top: 15px; font-size: 14px;">
                                        [Địa chỉ mặc định]
                                    </span>
                                @else
                                    <button onclick="setDefaultShipping({{ $info->shipping_id }})"
                                        class="set-default-btn"
                                        style="margin-top: 15px; padding: 10px 20px; background: #3498db; border: none; border-radius: 6px; color: white; font-weight: bold; cursor: pointer; font-size: 14px; transition: background 0.3s ease;">
                                        Chọn làm mặc định
                                    </button>
                                @endif
                            </div>
                        @endforeach
                    </div>

                </div>
            </div>
        </div>
        <!-- Phương thức giao hàng -->
        <div class="panel" style="background: #fff; padding: 20px; border-radius: 10px; box-shadow: 0 4px 8px rgba(0,0,0,0.05); margin-bottom: 20px;">
            <h4 style="font-weight: bold; color: #333; margin-bottom: 15px;">Phương thức giao hàng</h4>

            <label style="display: flex; align-items: center; font-weight: normal; color: #555; margin-top: 5px; cursor: pointer;">
                <input type="radio" name="shipping_method" value="home" checked style="margin-right: 10px;">
                Giao tới địa chỉ của bạn
            </label>
            <label style="display: flex; align-items: center; font-weight: normal; color: #555; margin-top: 5px; cursor: pointer;">
                <input type="radio" name="shipping_method" value="store" style="margin-right: 10px;">
                Nhận tại cửa hàng
            </label>
        </div>

    </div>

    <!-- Cột bên phải -->
    <div class="col-md-4">
        <div class="panel" style="background: #fff; padding: 20px; border-radius: 12px; box-shadow: 0 4px 10px rgba(0,0,0,0.08); margin-bottom: 25px;">
            <?php
                $content = Cart::getContent();
            ?>
            <h4 style="font-weight: bold; font-size: 20px; color: #333; margin-bottom: 20px;">Tổng tiền giỏ hàng</h4>

            <div style="margin-bottom: 15px;">
                <p style="margin: 0 0 8px; color: #555;">Tổng tiền hàng:
                    <strong style="color: #333;font-weight:normal;">{{ number_format(Cart::getTotal(), 0, ',', '.') . ' VNĐ' }}</strong>
                </p>
                <p style="margin: 0 0 8px; color: #555;">Thuế VAT (10%):
                    <strong style="color: #333;font-weight:normal;">{{ number_format(Cart::getTotal() * 0.1, 0, ',', '.') . ' VNĐ' }}</strong>
                </p>
                <p style="margin: 0 0 8px; color: #555;">Phí vận chuyển:
                    <strong id="shipping_fee" style="color: #333;font-weight:normal;">Đang tính...</strong>
                </p>
            </div>

            <div style="border-top: 1px solid #eee; padding-top: 15px; margin-top: 15px;">
                <p style="font-size: 18px; font-weight: bold; color: #333; margin: 0;">
                    Tiền thanh toán: <span id="total_amount" style="color: #333;font-weight:normal;">Đang tính...</span>
                </p>
            </div>

            <form method="post" action="{{ route('check.coupon') }}" style="margin-top: 20px;">
                @csrf
                <div style="display: flex; gap: 10px;">
                    <input type="text" name="counpon" class="form-control"
                           style="border-radius: 5px; padding: 8px; flex: 1; border: 1px solid #ddd;"
                           placeholder="Nhập mã giảm giá">
                    <button type="submit" class="btn btn-warning check_coupon"
                            style="border-radius: 5px; padding: 5px 20px; font-weight: bold;">
                        ÁP DỤNG
                    </button>
                </div>
            </form>

            @if (session('success_coupon'))
                <p id="success-message" class="text-success" style="margin-top: 10px; font-size: 14px;">{{ session('success_coupon') }}</p>
            @endif

            @if (session('error_coupon'))
                <p id="error-message" class="text-danger" style="margin-top: 10px; font-size: 14px;">{{ session('error_coupon') }}</p>
            @endif
        </div>


        <!-- Phương thức thanh toán - DI CHUYỂN TỪ CỘT TRÁI SANG CỘT PHẢI -->
        <form action="{{ URL::to('/order-place') }}" method="post">
            {{ @csrf_field() }}

            <div class="panel" style="background: #fff; padding: 20px; border-radius: 12px; box-shadow: 0 4px 10px rgba(0,0,0,0.08); margin-top: 15px; margin-bottom: 25px;">
                <h4 style="font-weight: bold; font-size: 20px; color: #333; margin-bottom: 20px;">Phương thức thanh toán</h4>

                <div style="display: flex; flex-direction: column; gap: 6px;">
                    <label style="color: #555; font-weight: 500;">
                        <input name="payment_option" value="Thanh toán bằng MoMo" type="radio" style="margin-right: 8px;">
                        Thanh toán bằng MoMo
                    </label>

                    <label style="color: #555; font-weight: 500;">
                        <input name="payment_option" value="Thanh toán bằng Paypal" type="radio" style="margin-right: 8px;">
                        Thanh toán bằng Paypal
                    </label>

                    <label style="color: #555; font-weight: 500;">
                        <input name="payment_option" value="Thanh toán bằng VNPAY" type="radio" style="margin-right: 8px;">
                        Thanh toán bằng VNPAY
                    </label>

                    <label style="color: #555; font-weight: 500;">
                        <input name="payment_option" value="Thanh toán khi nhận hàng" type="radio" checked style="margin-right: 8px;">
                        Thanh toán khi nhận hàng
                    </label>
                </div>

                @if(Session::has('error'))
                    <div class="alert alert-danger" style="margin-top: 15px;">
                        {{ Session::get('error') }}
                    </div>
                    {{ Session::forget('error') }}
                @endif

                @if(Session::has('success'))
                    <div class="alert alert-success" style="margin-top: 15px;">
                        {{ Session::get('success') }}
                    </div>
                    {{ Session::forget('success') }}
                @endif
            </div>

            <button class="btn btn-warning btn-block finally finallypaypal" style="border-radius: 8px; font-weight: bold; font-size: 16px; padding: 12px; margin-top: 10px;">
                HOÀN THÀNH
            </button>
        </form>

    </div>
</div>






		</div>
	</section> <!--/#cart_items-->



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



    <script src="{{asset('public/fontend/js/jquery.js')}}"></script>
    <script src="{{asset('public/fontend/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('public/fontend/js/jquery.scrollUp.min.js')}}"></script>
    <script src="{{asset('public/fontend/js/price-range.js')}}"></script>
    <script src="{{asset('public/fontend/js/jquery.prettyPhoto.js')}}"></script>
    <script src="{{asset('public/fontend/js/main.js')}}"></script>

    <script src="https://www.paypalobjects.com/api/checkout.js"></script>



</body>
</html>
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
    function setDefaultShipping(shippingId) {

        $.ajax({
            url: "{{ route('set-default-shipping') }}",
            method: 'POST',
            data: {
                _token: "{{ csrf_token() }}",
                shipping_id: shippingId
            },
            success: function(response) {
                if(response.status === 'success') {
                    $('#selectShippingModal').modal('hide');
                    location.reload();

                } else {
                    alert('có lỗi xảy ra!');
                }
            },
            error: function() {
                toastr.error('Có lỗi xảy ra!');
            }
        });
    }
</script>
<script>
    $(document).ready(function () {
        setTimeout(function () {
            $("#success-message, #error-message").fadeOut();
        }, 3000);
    });

</script>
<script>
    $(document).ready(function() {
        var customer_id = '{{ Session::get('customer_id') }}'; // ID khách hàng từ session
        var originalShippingFee = 0; // Phí vận chuyển gốc
        var subtotal = parseInt("{{ Cart::getTotal() }}") || 0;
        var vat = Math.round(subtotal * 0.1); // Thuế VAT 10%
        var discount = 0;

        @if(Session::has('counpon') && is_array(Session::get('counpon')))
            @foreach (Session::get('counpon') as $cou)
                var discountFunction = "{{ $cou['counpon_function'] }}";
                var discountValue = parseFloat("{{ $cou['counpon_percent'] }}");

                if (discountFunction == 1) {
                    discount = Math.round((subtotal * discountValue) / 100);
                } else if (discountFunction == 2) {
                    discount = Math.round(discountValue);
                }
            @endforeach
        @endif

        function updateTotal(shippingFee) {
            var total = Math.round((subtotal - discount) + vat + shippingFee);
            $('#total_amount').html(new Intl.NumberFormat('vi-VN').format(total) + ' VND');
        }

        if (customer_id) {
            $.ajax({
                url: "{{ url('/get-shipping-fee-auto') }}/" + customer_id,
                method: 'GET',
                success: function(response) {
                    originalShippingFee = parseInt(response.fee) || 0;

                    $('#shipping_fee').html(new Intl.NumberFormat('vi-VN').format(originalShippingFee) + ' VND');
                    updateTotal(originalShippingFee);
                },
                error: function() {
                    console.log("Lỗi lấy phí vận chuyển!");
                }
            });
        }

        // Khi đổi lựa chọn phương thức giao hàng
        $('input[name="shipping_method"]').change(function() {
            if ($(this).val() == 'store') {
                // Nhận tại cửa hàng: miễn phí vận chuyển
                $('#shipping_fee').html('Miễn phí');
                updateTotal(0);
            } else {
                // Giao tới địa chỉ: tính lại phí gốc
                $('#shipping_fee').html(new Intl.NumberFormat('vi-VN').format(originalShippingFee) + ' VND');
                updateTotal(originalShippingFee);
            }
        });
    });
    </script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/moment.min.js"></script>
<script>
    $(document).ready(function(){
        $('.finally').click(function(event){
            event.preventDefault(); // Ngăn form gửi ngay lập tức

            var form = $(this).closest('form'); // Lấy form chứa nút này
            var paymentOption = $('input[name="payment_option"]:checked').val();
            var shippingMethod = $('input[name="shipping_method"]:checked').val();
            swal({
                title: "Bạn có chắc chắn?",
                text: "Bạn sẽ không thể thay đổi đơn hàng sau khi hoàn tất!",
                icon: "warning",
                buttons: ["Hủy", "Xác nhận"],
                dangerMode: true,
            }).then((willSubmit) => {
                if (willSubmit) {

                    // Nếu chọn PayPal thì xử lý AJAX
                    if(paymentOption === 'Thanh toán bằng Paypal') {
                        let rawTotal = $('#total_amount').text(); // VD: "1.200.000 VNĐ"
                        let numericTotal = parseInt(rawTotal.replace(/[^\d]/g, ''));
                        let usdAmount = (numericTotal / 24000).toFixed(2);

                        $.ajax({
                            url: "{{ route('processTransaction') }}",
                            method: "POST",
                            data: {
                                _token: '{{ csrf_token() }}',
                                amount: usdAmount
                            },
                            success: function(response) {
                                if (response.redirect_url) {
                                    window.location.href = response.redirect_url;
                                } else {
                                    swal("Lỗi", "Không nhận được liên kết thanh toán!", "error");
                                }
                            },
                            error: function(xhr) {
                                swal("Lỗi", "Không thể tạo giao dịch PayPal.", "error");
                            }
                        });

                    }else if (paymentOption === 'Thanh toán bằng VNPAY') {
                        let rawTotal = $('#total_amount').text(); // VD: "1.200.000 VNĐ"
                        let numericTotal = parseInt(rawTotal.replace(/[^\d]/g, ''));
                        $.ajax({
                            url: "{{ route('vnpay_payment') }}",
                            method: "POST",
                            data: {
                                _token: '{{ csrf_token() }}',
                                order_id: Math.floor(Math.random() * 1000000), // Hoặc truyền mã đơn thật
                                amount: numericTotal,
                                language: 'vn',
                                bank_code: '',
                                txt_billing_mobile: '0123456789',
                                txt_billing_email: 'test@example.com',
                                txtexpire: moment().add(15, 'minutes').format('YYYYMMDDHHmmss')
                            },
                            success: function(response) {
                                let res = JSON.parse(response);
                                if (res.data) {
                                    window.location.href = res.data;
                                } else {
                                    swal("Lỗi", "Không nhận được liên kết thanh toán VNPAY!", "error");
                                }
                            },
                            error: function() {
                                swal("Lỗi", "Không thể tạo giao dịch VNPAY.", "error");
                            }
                        });

                    } else if (paymentOption === 'Thanh toán bằng MoMo') {
                        let rawTotal = $('#total_amount').text(); // VD: "1.200.000 VNĐ"
                        let numericTotal = parseInt(rawTotal.replace(/[^\d]/g, ''));
                        $.post("{{ route('momo_payment') }}", {
                            _token: '{{ csrf_token() }}',
                            amount: numericTotal
                        }, function(res){
                            if (res.payUrl) {
                                window.location.href = res.payUrl;
                            } else {
                                swal("Lỗi", "Không nhận được liên kết thanh toán MoMo!", "error");
                            }
                        }).fail(function(){
                            swal("Lỗi", "Không thể tạo giao dịch MoMo.", "error");
                        });

                    }else {
                        // Nếu không phải Paypal → xử lý như cũ
                        $('<input>').attr({
                            type: 'hidden',
                            name: 'shipping_method',
                            value: shippingMethod
                        }).appendTo(form);
                        swal({
                            title: "Đã xác nhận!",
                            text: "Đơn hàng của bạn đã được gửi thành công.",
                            icon: "success",
                            buttons: false,
                            timer: 1500
                        });

                        setTimeout(function(){
                            form.submit();
                        }, 1500);
                    }
                }
            });
        });
    });

    </script>
