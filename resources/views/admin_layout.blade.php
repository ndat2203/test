<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<head>
<title>Trang quản lý Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="..." />
    <meta name="csrf-token" content="{{csrf_token()}}">

    <!-- jQuery (chỉ giữ 1 bản) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <!-- Bootstrap 3 (giữ lại nếu bạn dùng layout cũ) -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <!-- Custom CSS -->
    <link href="{{asset('public/backend/css/style.css')}}" rel='stylesheet' type='text/css' />
    <link href="{{asset('public/backend/css/style-responsive.css')}}" rel="stylesheet"/>

    <!-- Fonts + Font Awesome -->
    <link href="//fonts.googleapis.com/css?family=Roboto:..." rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{asset('public/backend/css/font.css')}}" type="text/css"/>
    <link href="{{asset('public/backend/css/font-awesome.css')}}" rel="stylesheet">

    <!-- Morris.js & Raphael -->
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
    <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>

    <!-- jQuery UI (cho datepicker) -->
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.14.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/ui/1.14.1/jquery-ui.js"></script>

    <!-- DataTables -->
    <link rel="stylesheet" href="//cdn.datatables.net/2.2.2/css/dataTables.dataTables.min.css">
    <script src="//cdn.datatables.net/2.2.2/js/dataTables.min.js"></script>

    <!-- CKEditor -->
    <script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>

    <!-- Toastr -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <!-- Các JS backend -->
    <script src="{{asset('public/backend/js/jquery.dcjqaccordion.2.7.js')}}"></script>
    <script src="{{asset('public/backend/js/scripts.js')}}"></script>
    <script src="{{asset('public/backend/js/jquery.slimscroll.js')}}"></script>
    <script src="{{asset('public/backend/js/jquery.nicescroll.js')}}"></script>
    <script src="{{asset('public/backend/js/morris.js')}}"></script>

    <!-- Icon font -->
    <script src="https://kit.fontawesome.com/ff4b23649f.js" crossorigin="anonymous"></script>

    <!-- Hide address bar on mobile -->
    <script type="application/x-javascript">
        addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
        function hideURLbar(){ window.scrollTo(0,1); }
    </script>

    <!-- SweetAlert2 JS -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<style>
.dt-paging{
    padding: 4px 8px;  /* Giảm padding để nút nhỏ hơn */
    margin: 2px;
    border-radius: 3px;  /* Giảm bo góc */
    cursor: pointer;
    background: white;
    color: black;
    font-size: 0.9em;  /* Giảm cỡ chữ */
}
.dt-length,.dt-search,.dt-info{
    font-size: 0.9em;
}
#dt-length-0{
    cursor: pointer !important;
}
.dt-info{
    color:#777 !important;
    font-weight: normal;
    padding-left:15px;
}
.dt-length{

    color:#777 !important;
    font-weight: normal;
    padding-left: 15px;
}
.dt-search{
    color:#777 !important;
    font-weight: normal;
    padding-right: 15px;
}


</style>
</head>
<body>
<section id="container">
<!--header start-->
<header class="header fixed-top clearfix">
<!--logo start-->
<div class="brand">
    <a href="index.html" class="logo">
        ADMIN
    </a>
    <div class="sidebar-toggle-box">
        <div class="fa fa-bars"></div>
    </div>
</div>

<div class="top-nav clearfix">
    <!--search & user info start-->
    <ul class="nav pull-right top-menu">
        <li>
            <input type="text" class="form-control search" placeholder=" Search">
        </li>
        <!-- user login dropdown start-->
        <li class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                <img alt="" src="{{('public/backend/images/2.png')}}">
                <span class="username">

                    @if(Session::has('admin_name'))
                        {{ Session::get('admin_name') }}
                    @endif

                </span>
                <b class="caret"></b>
            </a>
            <ul class="dropdown-menu extended logout">
                <li><a href="#"><i class=" fa fa-suitcase"></i>Profile</a></li>
                <li><a href="#"><i class="fa fa-cog"></i> Settings</a></li>
                <li><a href="{{URL::to('/logout')}}"><i class="fa fa-key"></i> Log Out</a></li>
            </ul>
        </li>
        <!-- user login dropdown end -->

    </ul>
    <!--search & user info end-->
</div>
</header>
<!--header end-->
<!--sidebar start-->
<aside>
    <div id="sidebar" class="nav-collapse">
        <!-- sidebar menu start-->
        <div class="leftside-navigation">
            <ul class="sidebar-menu" id="nav-accordion">
                <li>
                    <a class="active" href="{{URL::to('/dashboard')}}">
                        <i class="fa fa-dashboard"></i>
                        <span>Tổng quan </span>
                    </a>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa-solid fa-sliders"></i>
                        <span>Banner</span>
                    </a>
                    <ul class="sub">
						<li><a href="{{URL::to('/add-slider')}}">Thêm banner</a></li>
						<li><a href="{{URL::to('/all-slider')}}">Liệt kê banner</a></li>
                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;">
                    <i class="fa-solid fa-list"></i>
                        <span>Danh mục sản phẩm</span>
                    </a>
                    <ul class="sub">
						<li><a href="{{URL::to('/add-category-product')}}">Thêm danh mục sản phẩm</a></li>
						<li><a href="{{URL::to('/all-category-product')}}">Liệt kê danh mục</a></li>
                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa-regular fa-copyright"></i>
                        <span>Thương hiệu sản phẩm</span>
                    </a>
                    <ul class="sub">
						<li><a href="{{URL::to('/add-brand-product')}}">Thêm thương hiệu sản phẩm</a></li>
						<li><a href="{{URL::to('/all-brand-product')}}">Liệt kê thương hiệu</a></li>
                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa-brands fa-product-hunt"></i>
                        <span>Sản phẩm</span>
                    </a>
                    <ul class="sub">
						<li><a href="{{URL::to('/add-product')}}">Thêm sản phẩm</a></li>
                        <li><a href="{{URL::to('/add-taste')}}">Thêm vị</a></li>
						<li><a href="{{URL::to('/all-product')}}">Liệt kê sản phẩm</a></li>
                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fas fa-sort"></i>
                        <span>Đơn hàng</span>
                    </a>
                    <ul class="sub">
						<li><a href="{{URL::to('/manage-order')}}">Quản lý đơn hàng</a></li>

                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;">
                       <i class="fa-solid fa-warehouse"></i>
                        <span>Kho</span>
                    </a>
                    <ul class="sub">
						<li><a href="{{URL::to('/manage-warehouse')}}">Quản lý tồn kho</a></li>
                        <li><a href="{{ URL::to('/import-product') }}">Nhập hàng</a></li>
                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;">
                    <i class="fas fa-percent"></i>
                        <span>Mã giảm giá</span>
                    </a>
                    <ul class="sub">
						<li><a href="{{URL::to('/add-counpon')}}">Thêm mã giảm giá</a></li>
                        <li><a href="{{URL::to('/all-counpon')}}">Liệt kê mã giảm giá</a></li>
                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;">
                    <i class="fas fa-shipping-fast"></i>
                        <span>Phí vận chuyển</span>
                    </a>
                    <ul class="sub">
						<li><a href="{{URL::to('/add-fee-delivery')}}">Thêm phí vận chuyển</a></li>
                        <li><a href="{{URL::to('/all-fee-delivery')}}">Liệt kê phí vận chuyển</a></li>
                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;">
                    <i class="fa-solid fa-list"></i>
                        <span>Danh mục bài viết</span>
                    </a>
                    <ul class="sub">
						<li><a href="{{URL::to('/add-category-post')}}">Thêm danh mục bài viết</a></li>
                        <li><a href="{{URL::to('/all-category-post')}}">Liệt kê danh mục bài viết</a></li>
                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa-solid fa-blog"></i>
                        <span>Bài viết</span>
                    </a>
                    <ul class="sub">
						<li><a href="{{URL::to('/add-post')}}">Thêm bài viết</a></li>
                        <li><a href="{{URL::to('/all-post')}}">Liệt kê bài viết</a></li>
                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa-solid fa-comments"></i>
                        <span>Bình luận</span>
                    </a>
                    <ul class="sub">
						<li><a href="{{URL::to('/list-comment')}}">Quản lý bình luận</a></li>

                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa-solid fa-person-military-pointing"></i>
                        <span>Người dùng</span>
                    </a>
                    <ul class="sub">
						<li><a href="{{URL::to('/list-customer')}}">Quản lý người dùng</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <!-- sidebar menu end-->
    </div>
</aside>
<!--sidebar end-->
<!--main content start-->
<section id="main-content">
	<section class="wrapper">
		@yield('admin_content')

    </section>
 <!-- footer -->
		  <!-- <div class="footer">
			<div class="wthree-copyright">
			  <p>© 2017 Visitors. All rights reserved | Design by <a href="http://w3layouts.com">W3layouts</a></p>
			</div>
		  </div> -->
  <!-- / footer -->
</section>
<!--main content end-->
</section>
<!-- Script xử lý -->
<script>
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

</script>
<script>
    $(document).on('change', '.order-status-select', function () {
        var orderId = $(this).data('order-id');
        var status = $(this).val();
        var token = '{{ csrf_token() }}';

        $.ajax({
            url: '{{ route("order.updateStatus") }}',
            type: 'POST',
            data: {
                _token: token,
                order_id: orderId,
                order_status: status
            },
            success: function (response) {
                if (response.success) {
                    swal({
                        title: "Thành công!",
                        text: response.message,
                        icon: "success",
                        timer: 1500, // Tự động đóng sau 3 giây
                        buttons: false, // Tắt nút "OK"
                    });
                } else {
                    swal({
                        title: "Thất bại!",
                        text: "Cập nhật thất bại",
                        icon: "error",
                        timer: 1500, // Tự động đóng sau 3 giây
                        buttons: false, // Tắt nút "OK"
                    });
                }
            },
            error: function () {
                alert('Có lỗi xảy ra!');
            }
        });
    });
</script>
<script>
$(document).ready(function() {
    $.ajax({
        url: "{{url('/visitor-data')}}",
        method: 'GET',
        success: function(data) {
            var chartData = [];
            // Chuyển dữ liệu về dạng phù hợp cho Morris
            data.forEach(function(item) {
                chartData.push({
                    period: item.period,
                    total: item.total
                });
            });
            new Morris.Bar({
                element: 'visitorChart',
                data: data,
                xkey: 'period',
                ykeys: ['total'],
                labels: ['Lượt truy cập'],
                barColors: ['#26B99A'],
                hideHover: 'auto',
                resize: true,
                barSize : 50
            });
        }
    });
});
</script>

<script>
  $( function() {
    $( "#datepicker" ).datepicker({
            prevText:"Tháng trước",
            nextText: "Tháng sau",
            dateFormat:"yy-mm-dd",
            dayNamesMin: ["Thứ 2","Thứ 3","Thứ 4","Thứ 5","Thứ 6","Thứ 7","Chủ Nhật"],
            duration:"slow"
    });
    $( "#datepicker2" ).datepicker({
            prevText:"Tháng trước",
            nextText: "Tháng sau",
            dateFormat:"yy-mm-dd",
            dayNamesMin: ["Thứ 2","Thứ 3","Thứ 4","Thứ 5","Thứ 6","Thứ 7","Chủ Nhật"],
            duration:"slow"
    });
    $( "#datepicker3" ).datepicker({
            prevText:"Tháng trước",
            nextText: "Tháng sau",
            dateFormat:"dd-mm-yy",
            dayNamesMin: ["Thứ 2","Thứ 3","Thứ 4","Thứ 5","Thứ 6","Thứ 7","Chủ Nhật"],
            duration:"slow"
    });
    $( "#datepicker4" ).datepicker({
            prevText:"Tháng trước",
            nextText: "Tháng sau",
            dateFormat:"dd-mm-yy",
            dayNamesMin: ["Thứ 2","Thứ 3","Thứ 4","Thứ 5","Thứ 6","Thứ 7","Chủ Nhật"],
            duration:"slow"
    });

  });
</script>
<script>
    $(document).ready(function(){
        chart30days();
        var chart = new Morris.Bar({
            element: 'myfirstchart',

            lineColors: ['#819C79','#fc8710','#ff6541','#a4add3','#766b56'],

            hideHover: 'auto',
            parseTime: false,
            xkey: 'period',
            ykeys: ['order', 'sales', 'profit', 'quantity'],
            labels: ['Đơn hàng', 'Doanh số', 'Lợi nhuận', 'Số lượng'],
            data: [

            ]
        });
        function chart30days(){
            var _token = $('input[name="_token"]').val();
            $.ajax({
                url: "{{url('/days-order')}}",
                method:"post",
                dataType: "JSON",
                data:{ _token: _token},
                success: function(data){
                    chart.setData(data);
                }
            });
        }

        $('.dashboard-filter').change(function() {
            var dashboard_value = $(this).val();
            var _token = $('input[name="_token"]').val();

            $.ajax({
                url: "{{url('/dashboard-filter')}}",
                method:"post",
                dataType: "JSON",
                data:{dashboard_value: dashboard_value, _token: _token},
                success: function(data){
                    chart.setData(data);
                }
            });
        });


        $('#btn-dashboard-filter').click(function(){
            var _token = $('input[name="_token"]').val();
            var from_date = $('#datepicker').val();
            var to_date = $('#datepicker2').val();

            $.ajax({
                url: "{{url('/filter-by-date')}}",
                method:"post",
                dataType: "JSON",
                data:{from_date:from_date, to_date:to_date, _token: _token},
                success: function(data){
                    chart.setData(data);
                }
            });
        });

    });
</script>

<script>
    $(document).ready(function(){
        $('#category_order').sortable({
            placeholder: 'ui-state-highlight',
            update: function(event, ui) {
                var page_id_array = new Array();
                var _token = $('input[name="_token"]').val();

                $('#category_order tr').each(function() {
                    page_id_array.push($(this).attr("id"));
                });

                $.ajax({
                    url: "{{ url('/arrange-category') }}",
                    method: "POST",
                    data: { page_id_array: page_id_array, _token: _token },
                    success: function(data) {
                        alert("Cập nhật thứ tự thành công!");
                    }
                });
            }
        });
    });
</script>
<script>
    $('.comment_duyet_btn').click(function(){
        var comment_status = $(this).data('comment_status');
        var comment_id = $(this).data('comment_id');
        var comment_product_id = $(this).attr('id');
        $.ajax({
                url: "{{url('/allow-comment')}}",
                method: "POST",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    comment_status: comment_status,
                    comment_id: comment_id,
                    comment_product_id: comment_product_id
                },
                success: function(response) {
                    if (response.success) {
                        if (comment_status == 0) {
                            toastr.success("Bình luận đã được duyệt!", "Thành công", {
                                timeOut: 1000,
                                closeButton: true,
                                progressBar: true,
                                positionClass: "toast-top-right"
                            });
                        } else {
                            toastr.warning("Bỏ duyêt bình luận!", "Thông báo", {
                                timeOut: 1000,
                                closeButton: true,
                                progressBar: true,
                                positionClass: "toast-top-right"
                            });
                        }
                        setTimeout(function() {
                            location.reload();
                        }, 1000);
                    } else {
                        toastr.error("Có lỗi xảy ra, vui lòng thử lại!", "Lỗi", {
                            timeOut: 1000,
                            closeButton: true,
                            progressBar: true,
                            positionClass: "toast-top-right"
                        });
                    }
                },
                error: function() {
                    toastr.error("Lỗi kết nối, vui lòng thử lại!", "Lỗi", {
                        timeOut: 1000,
                        closeButton: true,
                        progressBar: true,
                        positionClass: "toast-top-right"
                    });
                }
            });
    });
    $('.btn-reply-comment').click(function(){
        var comment_id = $(this).data('comment_id');
        var comment = $('.reply_comment_'+comment_id).val();
        var comment_product_id = $(this).data('product_id');
        $.ajax({
                url: "{{url('/reply-comment')}}",
                method: "POST",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    comment: comment,
                    comment_id: comment_id,
                    comment_product_id: comment_product_id
                },
                success: function(response) {
                    $('.reply_comment_'+comment_id).val('');
                },
                error: function() {

                }
            });
    });
</script>

<script>
    let table = new DataTable('#example', {
    language: {
        search: "Tìm kiếm:",
        lengthMenu: "Hiển thị _MENU_ dòng mỗi trang",
        info: "Đang hiển thị _START_ đến _END_ trong tổng số _TOTAL_ mục",
        infoEmpty: "Không có mục nào để hiển thị",
        infoFiltered: "(lọc từ tổng số _MAX_ mục)",
        loadingRecords: "Đang tải dữ liệu...",
        zeroRecords: "Không tìm thấy kết quả nào",
        emptyTable: "Không có dữ liệu trong bảng",
        pagingType: "full_numbers",
        paginate: {
            first: "«",    // Trang đầu
            last: "»",     // Trang cuối
            next: "›",     // Trang tiếp theo
            previous: "‹"
        },
        aria: {
            sortAscending: ": Sắp xếp tăng dần",
            sortDescending: ": Sắp xếp giảm dần"
        }
    }
});

</script>
<script>
    $(document).ready(function(){
        load_gallery();
        function load_gallery(){
            var pro_id = $('.pro_id').val();
            var _token = $('input[name = "_token"]').val();
            $.ajax({
                url:"{{url('/select-gallery')}}",
                method: "post",
                data: {pro_id: pro_id, _token: _token},
                success: function(data){
                    $('#gallery_load').html(data);
                }
            });
        }
        $('#file').change(function(){
            var error = '';
            var file = $('#file')[0].files;

            if(file.length > 4){
                error += '<p>Bạn chỉ được chọn tối đa 4 ảnh</p>';
            }else if(file.length == ''){
                error += '<p>Bạn không được bỏ trống ảnh</p>';
            }else if(file.size > 2000000){
                error += '<p>File ảnh không được lớn hơn 2MB</p>';
            }
            if(error == ''){

            }else{
                $('#file').val('');
                $('#error_gallery').html('<span class="text-danger">'+error+'</span>');
                return false;
            }
        });
        // co the doi ten hinh anh luon
        $(document).on('blur','.edit_name_gal',function(){
            var gal_id = $(this).data('gal_id');
            var gal_text = $(this).text();
            var _token = $('input[name = "_token"]').val();
            $.ajax({
                url:"{{url('/update-gallery-name')}}",
                method: "post",
                data: {gal_id: gal_id,gal_text:gal_text, _token: _token},
                success: function(data){
                    load_gallery();
                    $('#error_gallery').html('<span class="text-danger"> Cập nhật tên hình ảnh thành công </span>');
                    setTimeout(function(){
                        $('#error_gallery').fadeOut('slow');
                    }, 3000);
                }
            });
        });
        $(document).on('click','.delete-gallery',function(){
            var gal_id = $(this).data('gal_id');
            var _token = $('input[name="_token"]').val();
           if(confirm('Bạn muốn xóa hình ảnh này không?')){
            $.ajax({
                url: "{{ route('delete-gallery') }}",
                method: "post",
                data: {gal_id: gal_id, _token: _token},
                success: function(data){
                    load_gallery();
                    $('#error_gallery').html('<span class="text-danger"> Xóa hình ảnh thành công </span>');
                    setTimeout(function(){
                        $('#error_gallery').fadeOut('slow');
                    }, 3000);
                }
            });
           }
        });
        $(document).on('change','.file_name',function(){
            var gal_id = $(this).data('gal_id');
            var image = document.getElementById("file-"+gal_id).files[0];
            var form_data = new FormData();
            form_data.append("file",document.getElementById("file-"+gal_id).files[0]);
            form_data.append("gal_id",gal_id);

            $.ajax({
                url:"{{url('/update-image-gal')}}",
                method: "post",
                headers:{
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data:form_data,
                contentType:false,
                cache:false,
                processData:false,
                success: function(data){
                    load_gallery();
                    $('#error_gallery').html('<span class="text-danger"> Cập nhật hình ảnh thành công </span>');
                    setTimeout(function(){
                        $('#error_gallery').fadeOut('slow');
                    }, 3000);
                }
            });
        });
    });

</script>
<script type="text/javascript">

    function ChangeToSlug()
        {
            var slug;

            //Lấy text từ thẻ input title
            slug = document.getElementById("slug").value;
            slug = slug.toLowerCase();
            //Đổi ký tự có dấu thành không dấu
                slug = slug.replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, 'a');
                slug = slug.replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, 'e');
                slug = slug.replace(/i|í|ì|ỉ|ĩ|ị/gi, 'i');
                slug = slug.replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, 'o');
                slug = slug.replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, 'u');
                slug = slug.replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, 'y');
                slug = slug.replace(/đ/gi, 'd');
                //Xóa các ký tự đặt biệt
                slug = slug.replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi, '');
                //Đổi khoảng trắng thành ký tự gạch ngang
                slug = slug.replace(/ /gi, "-");
                //Đổi nhiều ký tự gạch ngang liên tiếp thành 1 ký tự gạch ngang
                //Phòng trường hợp người nhập vào quá nhiều ký tự trắng
                slug = slug.replace(/\-\-\-\-\-/gi, '-');
                slug = slug.replace(/\-\-\-\-/gi, '-');
                slug = slug.replace(/\-\-\-/gi, '-');
                slug = slug.replace(/\-\-/gi, '-');
                //Xóa các ký tự gạch ngang ở đầu và cuối
                slug = '@' + slug + '@';
                slug = slug.replace(/\@\-|\-\@|\@/gi, '');
                //In slug ra textbox có id “slug”
            document.getElementById('convert_slug').value = slug;
        }




</script>
<script>
    $(document).ready(function(){
        $('.add_delivery').click(function() {
    var city = $('.city').val();
    var province = $('.province').val();
    var ward = $('.ward').val();
    var fee_ship = $('.fee_ship').val();
    var _token = $('input[name="_token"]').val();

    $.ajax({
        url: '{{url("/save-fee-delivery")}}', // Gửi đến route Laravel
        method: 'POST',
        data: {
            city: city,
            province: province,
            ward: ward,
            fee_ship: fee_ship,
            _token: _token
        },
        success: function(response) {
            if (response.status === 'success') {
                toastr.success(response.message);
                setTimeout(() => {
                    window.location.href = response.redirect_url; // Chuyển hướng sau 1s
                }, 1000);
            } else {
                toastr.error(response.message);
            }
        },
        error: function(xhr) {
            toastr.error('Có lỗi xảy ra! Vui lòng thử lại.');
            console.error(xhr.responseText);
        }
    });
});

        $('.choose').on('change',function(){
            var action = $(this).attr('id');
            var matp = $(this).val();
            var _token = $('input[name = "_token"]').val();
            var result = '';
            if(action == 'city'){
                result = 'province';
            }else{
                result = 'ward';
            }
            $.ajax({
                url:'{{url('/select-delivery')}}',
                method: 'post',
                data:{action:action, matp:matp, _token:_token},
                success: function(data){
                    $('#'+result).html(data);
                }
            });
        });
    });
</script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        if (typeof CKEDITOR !== 'undefined') {
            CKEDITOR.replace('ckeditor1',{
                filebrowserImageUploadUrl: "{{ url('uploads-ckeditor') }}?_token={{ csrf_token() }}",
                filebrowserBrowseUrl: "{{ url('file-browser') }}?_token={{ csrf_token() }}",
                filebrowserUploadMethod: 'form'
            });
            CKEDITOR.replace('ckeditor');
            CKEDITOR.replace('ckeditor2');
            CKEDITOR.replace('ckeditor3');
            CKEDITOR.replace('ckeditor4');
        } else {
            console.error("CKEditor chưa được tải.");
        }
    });
</script>

<script src="{{asset('public/backend/js/jquery.scrollTo.js')}}"></script>


<!-- morris JavaScript -->
<script>
	$(document).ready(function() {
		//BOX BUTTON SHOW AND CLOSE
	   jQuery('.small-graph-box').hover(function() {
		  jQuery(this).find('.box-button').fadeIn('fast');
	   }, function() {
		  jQuery(this).find('.box-button').fadeOut('fast');
	   });
	   jQuery('.small-graph-box .box-close').click(function() {
		  jQuery(this).closest('.small-graph-box').fadeOut(200);
		  return false;
	   });

	    //CHARTS
	    function gd(year, day, month) {
			return new Date(year, month - 1, day).getTime();
		}

		graphArea2 = Morris.Area({
			element: 'hero-area',
			padding: 10,
        behaveLikeLine: true,
        gridEnabled: false,
        gridLineColor: '#dddddd',
        axes: true,
        resize: true,
        smooth:true,
        pointSize: 0,
        lineWidth: 0,
        fillOpacity:0.85,
			data: [
				{period: '2015 Q1', iphone: 2668, ipad: null, itouch: 2649},
				{period: '2015 Q2', iphone: 15780, ipad: 13799, itouch: 12051},
				{period: '2015 Q3', iphone: 12920, ipad: 10975, itouch: 9910},
				{period: '2015 Q4', iphone: 8770, ipad: 6600, itouch: 6695},
				{period: '2016 Q1', iphone: 10820, ipad: 10924, itouch: 12300},
				{period: '2016 Q2', iphone: 9680, ipad: 9010, itouch: 7891},
				{period: '2016 Q3', iphone: 4830, ipad: 3805, itouch: 1598},
				{period: '2016 Q4', iphone: 15083, ipad: 8977, itouch: 5185},
				{period: '2017 Q1', iphone: 10697, ipad: 4470, itouch: 2038},

			],
			lineColors:['#eb6f6f','#926383','#eb6f6f'],
			xkey: 'period',
            redraw: true,
            ykeys: ['iphone', 'ipad', 'itouch'],
            labels: ['All Visitors', 'Returning Visitors', 'Unique Visitors'],
			pointSize: 2,
			hideHover: 'auto',
			resize: true
		});


	});
	</script>
<!-- calendar -->
	<script type="text/javascript" src="{{asset('public/backend/js/monthly.js')}}"></script>
	<script type="text/javascript">
		$(window).load( function() {

			$('#mycalendar').monthly({
				mode: 'event',

			});

			$('#mycalendar2').monthly({
				mode: 'picker',
				target: '#mytarget',
				setWidth: '250px',
				startHidden: true,
				showTrigger: '#mytarget',
				stylePast: true,
				disablePast: true
			});

		switch(window.location.protocol) {
		case 'http:':
		case 'https:':
		// running on a server, should be good.
		break;
		case 'file:':
		alert('Just a heads-up, events will not work when run locally.');
		}

		});
	</script>
	<!-- //calendar -->
</body>
</html>
