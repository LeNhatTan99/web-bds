@extends('layouts.app')
@section('content')
<div class="container">
  <h3 class="text-center my-3">Quản lý tài khoản</h3>
    <table class="table">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Tên</th>
            <th scope="col">Vai trò</th>
            <th scope="col">Email</th>
            <th scope="col">Mật khẩu</th>
            <th scope="col">Thao tác</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($users as $user )
          <tr>
            <td>{{$user->id}}</td>
            <td>{{$user->name}}</td>
            <td>
                @foreach ($user->roles as $role )
                {{$role->role_name}}
                @endforeach
            </td>
            <td>{{$user->email}}</td>
            <td>{{$user->password}}</td>
            <td >
                <a class="btn btn-info" href="{{route('users.show',['user'=>$user->id])}}">Xem</a>
                <a class="btn btn-success" href="{{route('users.edit',['user'=>$user->id])}}">Sửa</a>
                <form action="{{route('users.destroy',['user'=>$user->id])}}" method="POST" style="display:inline-block">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-danger">Xoá</button>
                </form>
            </td>
        </tr>
          @endforeach
        </tbody>
      </table>
      <a class="btn btn-success" href="{{route('users.create')}}">Tạo tài khoản mới</a>
</div>
@endsection

