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

								<li><a href="#" style="display: block; padding: 10px; text-decoration: none;"><i class="fa-solid fa-heart"></i> Danh sách yêu thích</a></li>
								<li><a href="{{URL::to('/show-cart')}}" style="display: block; padding: 10px; text-decoration: none;"><i class="fa fa-shopping-cart"></i>
                                    Giỏ hàng
                                    <span class="cart-count" style="
                                        position: absolute;
                                        top: 2px;
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
                                    @foreach($category_post_get as $key => $cate_post)
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
                    <div class="features_items"><!--features_items-->
                            <h2 style="margin:0; position: inherit; font-size:22px; " class="title text-center">{{$meta_title}}</h2>

                                <div class="product-image-wrapper" style="border:none;">
                                    @foreach($posts as $key => $val)
                                        <div class="single-products" style="margin:10px 0;padding:2px; ">
                                            {!! $val->post_content !!}
                                        </div>
                                        <div class="clearfix"></div>
                                    @endforeach
                                </div>
                    </div><!--features_items-->
                    <h2 style="margin:0; position: inherit; font-size:22px; " class="title text-center">Bài viết liên quan</h2>
                    <style type="text/css">
                        ul.post li{
                            list-style-type: disc;
                            font-size: 16px;
                            padding: 6px;
                        }
                        ul.post li a:hover{
                            color: #FE980F;
                        }
                    </style>

                    <ul class="post">
                        @foreach($related as $key => $val)
                        <li><a href="{{url('/bai-viet/'.$val->post_slug)}}">{{$val->post_title}}</a></li>
                        @endforeach
                    </ul>

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
                        <li><a href="#" style="color: #555;"><i class="fa fa-phone"></i> Hotline: 0867584717</a></li>
                        <li><a href="#" style="color: #555;"><i class="fa fa-envelope"></i> Email: furryfriend@gmail.com</a></li>
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
                swal({
                    title: "Đã thêm sản phẩm vào giỏ hàng",
                    text: "Bạn có thể mua hàng tiếp hoặc tới giỏ hàng để tiến hành thanh toán",
                    icon: "success",
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
<!--Start of Fchat.vn--><script type="text/javascript" src="https://cdn.fchat.vn/assets/embed/webchat.js?id=67d4087d321e9537c10d6d3f" async="async"></script><!--End of Fchat.vn-->
</body>
</html>

