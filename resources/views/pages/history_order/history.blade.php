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
			<div class="breadcrumbs">
				<ol class="breadcrumb" style="margin-bottom:30px;">
				  <li><a  href="{{URL::to('/trang-chu')}}">Trang chủ</a></li>
				  <li class="active">Lịch sử đơn hàng</li>
				</ol>
			</div><!--/breadcrums-->

            <div class="order-history" style="padding: 20px;">
                <h3 style="margin-bottom: 20px; font-weight: bold;">Lịch sử đơn hàng</h3>

                @foreach($get_order as $order)
                <div class="order-card"
                style="border: 1px solid #ddd; padding: 20px; margin-bottom: 20px; border-radius: 8px; background-color: #f9f9f9;">
               <div style="display: flex; justify-content: space-between; margin-bottom: 10px;">
                   <div><strong>Mã đơn hàng:</strong> #{{ $order->order_code }}</div>
                   <div><strong>Ngày đặt:</strong> {{ date('d/m/Y', strtotime($order->order_date)) }}</div>
               </div>
               <div><strong>Trạng thái:</strong> <span
                       style="color: {{ $order->order_status == 'Đã giao' ? 'green' : 'orange' }}">{{ $order->order_status }}</span>
               </div>
               <div style="margin: 10px 0;"><strong>Phương thức thanh toán:</strong> {{ $order->payment->payment_method ?? 'Không xác định' }}</div>
               <div style="margin-bottom: 10px;"><strong>Tổng tiền:</strong> {{ number_format($order->order_total, 0, ',', '.') }} VNĐ</div>
               <div style="display: flex; justify-content: space-between;">
                    <a href="{{ url('/history-order-detail/' . $order->order_code) }}" style="text-decoration: none; color: #007bff; flex-grow: 1; text-align: center; padding: 8px 0; border-radius: 4px; background-color: #f1f1f1; transition: background-color 0.3s, transform 0.3s; display: block; box-shadow: 0 2px 5px rgba(0, 123, 255, 0.2);">
                        Xem chi tiết
                    </a>
                    @php
                        $status_normalized = strtolower(Str::ascii(trim($order->order_status)));
                        $is_cancelled = $status_normalized == 'da huy' || $status_normalized == 'hoan tra';
                    @endphp
                    @if($is_cancelled)
                        <a href="{{ url('/reorder/' . $order->order_code) }}"
                        class="btn btn-sm btn-outline-success rounded-pill"
                        style="font-size:14px;flex-grow: 1; margin-left: 10px; padding: 8px 0; text-align: center; border-radius: 4px; background-color: #f1f1f1; transition: background-color 0.3s, transform 0.3s; display: block; box-shadow: 0 2px 5px rgba(0, 123, 255, 0.2);">
                            Đặt lại đơn hàng
                        </a>
                    @else
                        <button type="button" class="btn btn-sm btn-outline-primary rounded-pill"
                            data-toggle="modal" data-target="#myModal-{{ $order->order_code }}"
                            style="font-size:14px;flex-grow: 1; margin-left: 10px; padding: 8px 0; text-align: center; border-radius: 4px; background-color: #f1f1f1; transition: background-color 0.3s, transform 0.3s; display: block; box-shadow: 0 2px 5px rgba(0, 123, 255, 0.2);">
                            Hủy đơn hàng
                        </button>
                    @endif
               </div>

               <!-- Modal -->
               <div id="myModal-{{ $order->order_code }}" class="modal fade" role="dialog">
                   <div class="modal-dialog">
                    <form action="">
                        @csrf
                       <!-- Modal content-->
                       <div class="modal-content">
                           <div class="modal-header">
                               <button type="button" class="close" data-dismiss="modal">&times;</button>
                               <h4 class="modal-title">Lí do hủy đơn hàng</h4>
                           </div>
                           <div class="modal-body">
                               <p><textarea class="lidohuydon" name="" rows="5" required placeholder="Lí do hủy đơn hàng! "  id=""></textarea></p>
                           </div>
                           <div class="modal-footer">
                               <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                               <button type="button" onclick="huyDonHang('{{ $order->order_code }}')" class="btn btn-default" data-dismiss="modal">Gửi</button>
                           </div>
                       </div>
                    </form>
                   </div>
               </div>
           </div>

                @endforeach
                <div class="d-flex justify-content-end" style="display: flex;justify-content: flex-end;">
                    {{ $get_order->links('pagination::bootstrap-4') }}
                </div>
                <!-- Thêm nhiều thẻ order-card nếu có nhiều đơn -->
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
</body>
</html>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> <!-- Thêm jQuery nếu chưa có -->
<script>
    $(document).ready(function () {
        setTimeout(function () {
            $("#success-message, #error-message").fadeOut();
        }, 3000);
    });

</script>
<script>
    function huyDonHang(order_code){
        var lydohuy = $('.lidohuydon').val(); // nhớ đảm bảo class này tồn tại
        var order_status = 'Đã huỷ';
        var _token = $('input[name="_token"]').val();

        $.ajax({
            url: "{{ url('/destroy-order-custormer') }}",
            method: "post",
            data: {
                order_code: order_code,
                _token: _token,
                lydohuy: lydohuy,
                order_status: order_status
            },
            success: function(data){
                alert('Hủy đơn thành công');
                location.reload(); // hoặc cập nhật giao diện nếu cần
            }
        });
    }
</script>

// JavaScript để hover xổ menu tai khoan
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




</script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


