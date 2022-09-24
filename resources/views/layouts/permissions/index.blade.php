@extends('layouts.app')
@section('content')

  <h3 class="text-center my-3">Quản lý quyền</h3>
  @if ($permissions->count())


    <table class="table">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Tên</th>
            <th scope="col">Mô tả</th>
            <th scope="col">Thao tác</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($permissions as $permission )
          <tr>
            <td>{{$permission->id}}</td>
            <td>{{$permission->permission_name}}</td>
            <td>{{$permission->description}}</td>
            <td >
                <a class="btn btn-info" href="{{route('permissions.show',['permission'=>$permission->id])}}">Xem</a>
                <a class="btn btn-success" href="{{route('permissions.edit',['permission'=>$permission->id])}}">Sửa</a>
                <form action="{{route('permissions.destroy',['permission'=>$permission->id])}}" method="POST" style="display:inline-block">
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
      <h5>Chưa có quyền nào được tạo!</h5>
      @endif
      {{ $permissions->links() }}
      <a class="btn btn-success" href="{{route('permissions.create')}}">Tạo thêm quyền</a>

@endsection

