@extends('admin_layout')
@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Thêm ảnh sản phẩm
                        </header>
                            <form role="form" action="{{url('/insert-gallery/'.$pro_id)}}" method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="row" style="margin-top:20px;">
                                    <div class="col-md-3"></div>
                                    <div class="col-md-6">
                                        <input type="file" accept="image/*" id="file" multiple name="file[]" class="form-control" >
                                        <span id="error_gallery"></span>
                                    </div>

                                    <div class="col-md-3">
                                        <button type="submit" name="upload"  class="btn btn-info">Thêm</button>
                                    </div>

                                </div>
                            </form>
                        <div class="panel-body">

                            <input type="hidden" value="{{$pro_id}}" name="pro_id" class="pro_id">
                            <form>
                                @csrf
                                <div id="gallery_load">

                                </div>
                            </form>


                        </div>
                    </section>
</div>
@endsection
