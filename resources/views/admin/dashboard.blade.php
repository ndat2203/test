@extends('admin_layout')
@section('admin_content')

<!-- //market-->
<div class="market-updates">
			<div class="col-md-3 market-update-gd">
				<div class="market-update-block clr-block-1">
					<div class="col-md-4 market-update-right">
						<i class="fa fa-users" ></i>
					</div>
					<div class="col-md-8 market-update-left">
					<h4>Khách hàng</h4>
						<h3>{{$customer}}</h3>
						<p>Tài khoản khách hàng</p>
					</div>
				  <div class="clearfix"> </div>
				</div>
			</div>
            <div class="col-md-3 market-update-gd">
				<div class="market-update-block clr-block-2">
					<div class="col-md-4 market-update-right">
                        <i class="fa-brands fa-product-hunt" style="font-size: 3em;color: #fff;text-align: left;"></i>
					</div>
					 <div class="col-md-8 market-update-left">
					 <h4>Sản phẩm</h4>
					<h3>{{$product}}</h3>
					<p>Sản phẩm cửa hàng</p>
				  </div>
				  <div class="clearfix"> </div>
				</div>
			</div>
			<div class="col-md-3 market-update-gd">
				<div class="market-update-block clr-block-3">
					<div class="col-md-4 market-update-right">
                    <i class="fa-solid fa-blog" style="font-size: 3em;color: #fff;text-align: left;"></i>
					</div>
					<div class="col-md-8 market-update-left">
						<h4>Bài viết</h4>
						<h3>{{$post}}</h3>
						<p>Bài viết cửa hàng</p>
					</div>
				  <div class="clearfix"> </div>
				</div>
			</div>
			<div class="col-md-3 market-update-gd">
				<div class="market-update-block clr-block-4">
					<div class="col-md-4 market-update-right">
						<i class="fa fa-shopping-cart" aria-hidden="true"></i>
					</div>
					<div class="col-md-8 market-update-left">
						<h4>Đơn hàng</h4>
						<h3>{{$order}}</h3>
						<p>Đơn hàng khách hàng</p>
					</div>
				  <div class="clearfix"> </div>
				</div>
			</div>
		   <div class="clearfix"> </div>
</div>
		<!-- //market-->
		<div class="row">
			<div class="panel-body">
				<div class="col-md-12 w3ls-graph">

						<div class="agileinfo-grap">
							<div class="agileits-box">
								<header class="agileits-box-header clearfix">
									<h3>Thống kê đơn hàng doanh số</h3>
										<div class="toolbar">
										</div>
								</header>
								<div class="agileits-box-body clearfix">
                                    <div class="row">
                                        <form action="" autocomplete="off">
                                            @csrf
                                            <div class="col-md-2">
                                                <p>Từ ngày:
                                                    <input type="text" id="datepicker" class="form-control">
                                                    <input type="button" style="margin-top: 5px;" id="btn-dashboard-filter" class="btn btn-sm btn-primary" value="Lọc kết quả">
                                                </p>
                                            </div>
                                            <div class="col-md-2">
                                                <p>Đến ngày: <input type="text" id="datepicker2" class="form-control"></p>
                                            </div>
                                            <div class="col-md-2">
                                                <p>
                                                    Lọc theo:
                                                    <select class="dashboard-filter form-control" id="dashboard-filter">
                                                        <option>--Chọn--</option>
                                                        <option value="7ngay">7 ngày qua</option>
                                                        <option value="thangnay">Tháng này</option>
                                                        <option value="thangtruoc">Tháng trước</option>
                                                        <option value="365ngay">365 ngày qua</option>
                                                    </select>
                                                </p>
                                            </div>


                                        </form>
                                        <div class="col-md-12">
                                            <div id="myfirstchart" style="height: 250px;width: 100%;"></div>
                                        </div>
                                    </div>

								</div>
							</div>
						</div>


				</div>
			</div>
		</div>
        <div class="row">
			<div class="panel-body">
				<div class="col-md-12 w3ls-graph">
						<div class="agileinfo-grap">
							<div class="agileits-box">
								<header class="agileits-box-header clearfix">
									<h3>Thống kê lượt truy cập</h3>
										<div class="toolbar">
										</div>
								</header>
								<div class="agileits-box-body clearfix">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div id="visitorChart" style="height: 250px;width: 100%;"></div>
                                        </div>
                                    </div>

								</div>
							</div>
						</div>


				</div>
			</div>
		</div>
        <div class="row">
			<div class="panel-body">
				<div class="col-md-6 w3ls-graph">
						<div class="agileinfo-grap" style="height:auto;">
							<div class="agileits-box">
								<header class="agileits-box-header clearfix">
									<h3>Bài viết xem nhiều</h3>
										<div class="toolbar">
										</div>
								</header>
								<div class="agileits-box-body clearfix">
                                    <div class="row">
                                        <ul style="list-style:none;">
                                            @foreach($post_view as $key => $val)
                                            <li>
                                                <a target="_blank" href="{{ URL::to('/bai-viet/'.$val->post_slug) }}">{{$val->post_title}} | <span style="color:black;">{{$val->post_view}}</span></a>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </div>

								</div>
							</div>
						</div>


				</div>
                <div class="col-md-6 w3ls-graph">
						<div class="agileinfo-grap" style="height:auto;">
							<div class="agileits-box">
								<header class="agileits-box-header clearfix">
									<h3>Sản phẩm xem nhiều</h3>
										<div class="toolbar">
										</div>
								</header>
								<div class="agileits-box-body clearfix">
                                    <div class="row">
                                        <ul style="list-style:none;">
                                            @foreach($product_view as $key => $val)
                                            <li>
                                                <a target="_blank" href="{{ URL::to('chi-tiet-san-pham/'.$val->product_slug) }}">{{$val->product_name}} | <span style="color:black;">{{$val->product_view}}</span></a>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </div>

								</div>
							</div>
						</div>


				</div>
			</div>
		</div>





@endsection
