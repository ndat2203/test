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
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
    <script src="https://kit.fontawesome.com/ff4b23649f.js" crossorigin="anonymous"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
h2 {
    font-size: 28px; /* Tăng cỡ chữ */
    font-weight: bold; /* Làm đậm tiêu đề */
    color: #333; /* Màu chữ tối cho dễ nhìn */
    text-align: center; /* Căn giữa tiêu đề */
    margin-bottom: 10px; /* Tạo khoảng cách phía dưới */
}

p {
    font-size: 16px; /* Cỡ chữ vừa phải */
    line-height: 1.6; /* Tăng khoảng cách dòng giúp dễ đọc */
    color: #555; /* Màu chữ dịu hơn */
    text-align: justify; /* Căn đều 2 bên đoạn văn */
    padding: 10px 20px; /* Thêm padding cho đẹp hơn */
    max-width: 600px; /* Giới hạn chiều rộng để không quá dài */
    margin: 0 auto; /* Căn giữa nội dung */
    background-color: #f8f8f8; /* Thêm nền nhẹ để nổi bật hơn */
    border-radius: 8px; /* Bo góc mềm mại */
    box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.1); /* Hiệu ứng đổ bóng nhẹ */
}
#form {
        margin-bottom: 185px;
        margin-top: 100px;
    }

.checkbox {
    margin-right: 5px;
}
span {
    display: block;
    margin-bottom: 5px;
}
.footer-widget {
            margin-bottom: 0;
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
								<li><a href="#"><i class="fa fa-phone"></i> +2 95 01 88 821</a></li>
								<li><a href="#"><i class="fa fa-envelope"></i> info@domain.com</a></li>
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
				<div class="row">
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
							<ul class="nav navbar-nav">

								<li><a href="#" style="display: block; padding: 10px; text-decoration: none;"><i class="fa-solid fa-heart" ></i> Danh sách yêu thích</a></li>
								<li><a href="{{URL::to('/show-cart')}}" style="display: block; padding: 10px; text-decoration: none;"><i class="fa fa-shopping-cart"></i> Giỏ hàng</a></li>
                                @php
                                    $customer_id = Session::get('customer_id');
                                    $shipping_id = Session::get('shipping_id');
                                @endphp



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

				</div>
			</div>
		</div><!--/header-bottom-->
	</header><!--/header-->

	<section id="form"><!--form-->
		<div class="container">
			<div class="row">
				<div class="col-sm-4 col-sm-offset-1">
					<div class="login-form"><!--login form-->
						<h2>Bạn đã có tài khoản

                        </h2>
                        <p>Nếu bạn đã có tài khoản, hãy đăng nhập để tích lũy điểm thành viên và nhận được những ưu đãi tốt hơn!</p>
						<form action="{{URL::to('/login-customer')}}" method="post">
                            {{csrf_field()}}
							<input type="text" name="email_account" placeholder="Tài khoản" style="
                                width: 100%;
                                padding: 12px;
                                margin-bottom: 12px;
                                border: 1px solid #ccc;
                                border-radius: 8px;
                                font-size: 14px;
                                outline: none;
                                background: #fdfdfd;
                            " />

                            <input type="password" id="password" name="password_account" placeholder="Mật khẩu" style="
                                width: 100%;
                                padding: 12px;
                                margin-bottom: 12px;
                                border: 1px solid #ccc;
                                border-radius: 8px;
                                font-size: 14px;
                                outline: none;
                                background: #fdfdfd;
                            " />
                            <input type="hidden" name="redirect_to_home" value="1">
                            <span style="display: block; margin-bottom: 10px; font-size: 14px;">
                                <input type="checkbox" id="showPassword" style="margin-right: 5px;"> Hiển thị mật khẩu
                            </span>

                            <span style="display: block; margin-bottom: 20px; font-size: 14px;">
                                <input type="checkbox" class="checkbox" style="margin-right: 5px;"> Ghi nhớ đăng nhập
                            </span>

                            <button type="submit" class="btn btn-default" style="
                                width: 100%;
                                padding: 12px;
                                background: #f89c1f;
                                border: none;
                                border-radius: 8px;
                                color: #fff;
                                font-size: 16px;
                                font-weight: bold;
                                cursor: pointer;
                                transition: background 0.3s ease, transform 0.2s ease;
                            "
                            onmouseover="this.style.background='#e78c13'; this.style.transform='scale(1.02)'"
                            onmouseout="this.style.background='#f89c1f'; this.style.transform='scale(1)'">
                                Đăng nhập
                            </button>

                            <span style="margin-top:5px;text-align: center;border-bottom: 1px solid #ccc;">
                                <a href="{{url('/forget-password')}}" style="
                                    text-decoration: none;
                                    font-size: 14px;
                                    color: #0066cc;
                                    transition: color 0.3s;
                                "
                                onmouseover="this.style.color='#f89c1f';"
                                onmouseout="this.style.color='#0066cc';">
                                    Quên mật khẩu?
                                </a>
                            </span>

						</form>
                        <div style="display: flex; flex-direction: column; gap: 10px; max-width: 300px; margin: 20px auto;">

                            <a href="{{ url('/login-customer-google') }}"
                               style="display: flex; align-items: center; justify-content: center; padding: 12px;
                                      border-radius: 8px; text-decoration: none; color: #fff; font-size: 16px;
                                      font-weight: bold; background: #db4437; transition: background 0.3s;"
                               onmouseover="this.style.background='#c1351d'; this.style.transform='scale(1.02)'"
                               onmouseout="this.style.background='#db4437'; this.style.transform='scale(1)'">
                              <i class="fa fa-google" style="margin-right: 10px; font-size: 18px;"></i> Đăng nhập với Google
                            </a>

                            <a href="{{ url('/login-customer-facebook') }}"
                               style="display: flex; align-items: center; justify-content: center; padding: 12px;
                                      border-radius: 8px; text-decoration: none; color: #fff; font-size: 16px;
                                      font-weight: bold; background: #3b5998; transition: background 0.3s;"
                               onmouseover="this.style.background='#2d4373'; this.style.transform='scale(1.02)'"
                               onmouseout="this.style.background='#3b5998'; this.style.transform='scale(1)'">
                              <i class="fa fa-facebook" style="margin-right: 10px; font-size: 18px;"></i> Đăng nhập với Facebook
                            </a>

                          </div>

					</div><!--/login form-->
				</div>
				<div class="col-sm-1">
					<h2 class="or">OR</h2>
				</div>
				<div class="col-sm-4">
					<div class="signup-form"><!--sign up form-->
						<h2>Khách hàng mới</h2>
                        <p style=" letter-spacing: normal; word-spacing: normal; display: block;">
                            Nếu bạn chưa có tài khoản trên FurryFriend, hãy sử dụng tùy chọn này để truy cập biểu mẫu đăng ký. Bằng cách cung cấp cho FurryFriend thông tin chi tiết của bạn, quá trình mua hàng trên FurryFriend sẽ là một trải nghiệm thú vị và nhanh chóng hơn!
                        </p>

                        <form action="{{URL::to('/add-customer')}}" method="post">
                            {{csrf_field()}}
							<input type="text" name="customer_name" style="
                                width: 100%;
                                padding: 12px;
                                margin-bottom: 12px;
                                border: 1px solid #ccc;
                                border-radius: 8px;
                                font-size: 14px;
                                outline: none;
                                background: #fdfdfd;
                            " placeholder="Họ và tên"/>
                            <input type="text" name="customer_phone" style="
                                width: 100%;
                                padding: 12px;
                                margin-bottom: 12px;
                                border: 1px solid #ccc;
                                border-radius: 8px;
                                font-size: 14px;
                                outline: none;
                                background: #fdfdfd;
                            " placeholder="Phone"/>
							<input type="email" name="customer_email" style="
                                width: 100%;
                                padding: 12px;
                                margin-bottom: 12px;
                                border: 1px solid #ccc;
                                border-radius: 8px;
                                font-size: 14px;
                                outline: none;
                                background: #fdfdfd;
                            " placeholder="Email"/>
							<input type="password"  name="customer_password" style="
                                width: 100%;
                                padding: 12px;
                                margin-bottom: 12px;
                                border: 1px solid #ccc;
                                border-radius: 8px;
                                font-size: 14px;
                                outline: none;
                                background: #fdfdfd;
                            " placeholder="Password"/>

							<button type="submit" class="btn btn-default" style="
                                width: 100%;
                                padding: 12px;
                                background: #f89c1f;
                                border: none;
                                border-radius: 8px;
                                color: #fff;
                                font-size: 16px;
                                font-weight: bold;
                                cursor: pointer;
                                transition: background 0.3s ease, transform 0.2s ease;
                            "
                            onmouseover="this.style.background='#e78c13'; this.style.transform='scale(1.02)'"
                            onmouseout="this.style.background='#f89c1f'; this.style.transform='scale(1)'">
                            Đăng ký</button>
                        </form>

					</div><!--/sign up form-->
				</div>
			</div>
		</div>
	</section><!--/form-->


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
    <!-- <script src="{{asset('public/fontend/js/sweetalert.js')}}"></script> -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="{{asset('public/fontend/js/lightslider.js')}}"></script>
    <script src="{{asset('public/fontend/js/lightgallery-all.min.js')}}"></script>
    <script src="{{asset('public/fontend/js/prettify.js')}}"></script>

</body>
</html>
<script>
    document.getElementById("showPassword").addEventListener("change", function() {
        var passwordField = document.getElementById("password");
        passwordField.type = this.checked ? "text" : "password";
    });
</script>
