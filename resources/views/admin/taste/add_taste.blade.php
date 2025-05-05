@extends('admin_layout')
@section('admin_content')
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Thêm Chất Liệu
            </header>
            <div class="panel-body">
                <div class="position-center">
                    <form role="form" action="{{ URL::to('/save-taste') }}" method="post">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="taste_name">Tên vị</label>
                            <input type="text" name="taste_name" class="form-control" id="material_name" placeholder="Nhập tên chất liệu">
                        </div>

                        <div class="form-group">
                            <label for="taste_status">Hiển thị</label>
                            <select name="taste_status" class="form-control input-sm m-bot15">
                                <option value="0">Ẩn</option>
                                <option value="1">Hiển thị</option>
                            </select>
                        </div>

                        <button type="submit" name="add_taste" class="btn btn-info">Thêm Chất Liệu</button>
                    </form>
                </div>
            </div>
        </section>
    </div>
</div>
@endsection
