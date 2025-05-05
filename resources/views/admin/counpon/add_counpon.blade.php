@extends('admin_layout')
@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Thêm mã giảm giá
                        </header>
                        <div class="panel-body">
                            <div class="position-center">
                                <form role="form" action="{{URL::to('/save-counpon')}}" method="post">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Tên mã giảm giá</label>
                                        <input type="text" name="counpon_name" class="form-control" id="exampleInputEmail1">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Mã giảm giá</label>
                                        <input type="text" name="counpon_code" class="form-control" id="exampleInputEmail1" >
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Ngày bắt đầu</label>
                                        <input type="text" name="counpon_date_start" class="form-control" id="datepicker3">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Ngày kết thúc</label>
                                        <input type="text" name="counpon_date_end" class="form-control" id="datepicker4" >
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Số lượng mã</label>
                                        <input type="text" name="counpon_qty" class="form-control" id="exampleInputEmail1" >
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Số phần trăm giảm giá</label>
                                        <input type="text" name="counpon_percent" class="form-control" id="exampleInputEmail1" >
                                    </div>
                                    <div class="form-group">
                                    <label for="exampleInputPassword1">Tính năng mã</label>
                                        <select name="counpon_function" class="form-control input-sm m-bot15">
                                            <option value="0">Chọn</option>
                                            <option value="1">Giảm theo phần trăm</option>
                                            <option value="2">Giảm theo tiền</option>
                                        </select>
                                    </div>

                                    <button type="submit" name="add_counpon" class="btn btn-info">Thêm</button>
                            </form>
                            </div>

                        </div>
                    </section>
</div>
@endsection
