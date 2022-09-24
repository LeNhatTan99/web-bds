@extends('layouts.app')
@section('content')
<h4>Chỉnh sửa vai trò</h4>
<form action="{{route('roles.update',['role'=>$role->id])}}" method="POST">
    @csrf
    @method('put')
    <div class="form-group">
      <label >Tên quyền:</label>
      <input type="text" class="form-control" name="role_name" value="{{old('role',$role->role_name)}}">
      @if($errors->has('role_name'))
      <span class="text-danger">{{$errors->first('role_name')}}</span>
      @endif
    </div>
    <div class="form-group">
      <label >Mô tả:</label>
      <input type="text" class="form-control" name="description" value="{{old('role',$role->description)}}">
      @if($errors->has('description'))
      <span class="text-danger">{{$errors->first('description')}}</span>
      @endif
    </div>

    <div class="my-3">
        <p >Chọn quyền cho vai trò</p>
       </div>
        @if ($permissions->count())
        <div class="row">
          <div class="col-md-12">
            <div class="form-group">
              @foreach ($permissions as $permission)
                <div class="form-check">

                  <input id="flexCheckCheckedPermission{{$permission->id}}" class="form-check-input" type="checkbox" value="{{ $permission->id }}" name="permissionIds[]"
                  {{ in_array($permission->id, $role->permissions->pluck('id')->toArray()) ? "checked" : "" }}>
                  <label class="form-check-label" for="flexCheckCheckedPermission{{$permission->id}}">
                    {{ $permission->permission_name }}
                  </label>
                </div>
              @endforeach
              @if ($errors->has('description'))
              <span class="text-danger">{{ $errors->first('description') }}</span>
          @endif
            </div>
          </div>
        </div>
        @endif
    <button type="submit" class="btn btn-success my-4" >Cập nhật</button>
  </form>
@endsection
