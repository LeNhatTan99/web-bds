@extends('layouts.app')
@section('content')
<h4>Tạo vai trò</h4>
<form action="{{route('roles.store')}}" method="POST">
    @csrf
    <div class="form-group">
      <label >Tên vai trò:</label>
      <input type="text" class="form-control" name="role_name">
      @if($errors->has('role_name'))
      <span class="text-danger">{{$errors->first('role_name')}}</span>
      @endif
    </div>
    <div class="form-group">
      <label >Mô tả:</label>
      <input type="text" class="form-control" name="description">
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

              <input id="flexCheckCheckedPermission{{$permission->id}}" class="form-check-input" type="checkbox" value="{{ $permission->id }}" name="permissionIds[]">
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
    <button type="submit" class="btn btn-success my-4" >Tạo vai trò</button>
  </form>
@endsection
