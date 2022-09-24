@extends('layouts.app')
@section('content')

  <h3 class="text-center my-3">Quản lý vai trò</h3>
  @if ($roles->count())


    <table class="table">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Tên vai trò</th>
            <th scope="col">Mô tả</th>
            <th scope="col">Cấp quyền</th>
            <th scope="col">Thao tác</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($roles as $role )
          <tr>
            <td>{{$role->id}}</td>
            <td>{{$role->role_name}}</td>
            <td>{{$role->description}}</td>
            <td>
                @foreach ($role->permissions as $permission )
                -{{$permission->permission_name}} <br>
                @endforeach
            </td>
            <td >
                <a class="btn btn-info" href="{{route('roles.show',['role'=>$role->id])}}">Xem</a>
                <a class="btn btn-success" href="{{route('roles.edit',['role'=>$role->id])}}">Sửa</a>
                <form action="{{route('roles.destroy',['role'=>$role->id])}}" method="POST" style="display:inline-block">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-danger">Xoá</button>
                </form>
            </td>
        </tr>
          @endforeach
        </tbody>
      </table>
      @else
      <h5>Chưa có vai trò nào được tạo!</h5>
      @endif
      {{ $roles->links() }}
      <a class="btn btn-success" href="{{route('roles.create')}}">Tạo thêm vai trò  </a>

@endsection

