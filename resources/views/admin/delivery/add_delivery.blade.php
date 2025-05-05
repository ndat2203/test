@extends('admin_layout')
@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Thêm phí vận chuyển
                        </header>
                        <div class="panel-body">
                            <div class="position-center">
                                    <form >
                                        @csrf
                                        <div class="form-group">
                                        <label for="exampleInputPassword1">Chọn thành phố</label>
                                            <select name="city" id="city" class="form-control input-sm m-bot15 choose city">
                                            <option value="">----Chọn tỉnh/thành phố----</option>
                                                @foreach($city as $key => $val)
                                                    <option value="{{$val->matp}}">{{$val->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                        <label for="exampleInputPassword1">Chọn quận huyện</label>
                                            <select name="province" id="province" class="form-control input-sm m-bot15 choose province">
                                                <option value="">----Chọn quận/huyện----</option>

                                            </select>
                                        </div>
                                        <div class="form-group">
                                        <label for="exampleInputPassword1">Chọn xã phường</label>
                                            <select name="ward" id="ward" class="form-control input-sm m-bot15 ward">
                                                <option value="">----Chọn xã/phường----</option>

                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Phí vận chuyển</label>
                                            <input type="text" name="fee_ship" class="form-control fee_ship" id="exampleInputEmail1">
                                        </div>
                                        <button type="button" name="add_delivery" class="btn btn-info add_delivery">Thêm</button>
                                </form>
                            </div>

                        </div>
                    </section>
</div>
@endsection
