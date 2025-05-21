@extends('admin_layout')
@section('admin_content')

<div class="panel panel-default">
    <div class="panel-heading">Nhập hàng sản phẩm</div>
    <div class="panel-body">
        @if(session('message'))
            <div class="alert alert-success">{{ session('message') }}</div>
        @endif

        <form action="{{ URL::to('/submit-import') }}" method="POST">
            @csrf

            <div class="form-group">
                <label>Chọn sản phẩm</label>
                <select name="product_id" class="form-control" required>
                    <option value="">-- Chọn sản phẩm --</option>
                    @foreach($products as $product)
                        <option value="{{ $product->product_id }}">{{ $product->product_name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label>Số lượng nhập</label>
                <input type="number" name="import_qty" class="form-control" min="1" required>
                @error('import_qty')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Nhập hàng</button>
        </form>
    </div>
</div>

@endsection
