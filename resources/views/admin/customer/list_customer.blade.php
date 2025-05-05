@extends('admin_layout')
@section('admin_content')

<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Liệt kê người dùng
    </div>

    <div class="table-responsive">
      <table class="table table-striped b-t b-light" id="example">
        <thead>
          <tr>
            <th style="width:20px;">
              <label class="i-checks m-b-none">
                <input type="checkbox"><i></i>
              </label>
            </th>
            <th>Tên người dùng</th>
            <th>Email</th>
            <th>Số điện thoại</th>
            <th>Phân quyền</th>
            <th style="width:90px;">Thao tác</th>
          </tr>
        </thead>
        <tbody>
        @foreach($customers as $key => $value)
            <tr>
                <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
                <td>{{ $value->customer_name }}</td>
                <td>{{ $value->customer_email }}</td>
                <td>{{ $value->customer_phone }}</td>
                <td>
                    <form action="{{ route('update_role', $value->customer_id) }}" method="POST">
                        @csrf
                        <select class="form-control" name="role" onchange="this.form.submit()">
                            <option value="user" {{ $value->customer_role == 'user' ? 'selected' : '' }}>User</option>
                            <option value="admin" {{ $value->customer_role == 'admin' ? 'selected' : '' }}>Admin</option>
                        </select>
                    </form>
                </td>
                <td>
                <a onclick="return confirm('Bạn có chắc chắn muốn xóa ?')" style="font-size: 20px;" href="{{URL::to('/delete-post/'.$value->customer_id )}}" ui-toggle-class=""><i class="fa fa-times text-danger text"></i></a>
                </td>
            </tr>
        @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection
