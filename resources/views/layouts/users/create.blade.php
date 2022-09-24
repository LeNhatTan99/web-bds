@extends('layouts.app')
@section('content')
<h4>Tạo tài khoản</h4>
<form action="{{route('users.store')}}" method="POST">
    @csrf
    <div class="form-group">
      <label >Tên người dùng:</label>
      <input type="text" class="form-control" name="name" value="{{old('name')}}">
      @if($errors->has('name'))
      <span class="text-danger">{{$errors->first('name')}}</span>
      @endif
    </div>
    <div class="form-group">
      <label >Email:</label>
      <input type="email" class="form-control" name="email" value="{{old('email')}}">
      @if($errors->has('email'))
      <span class="text-danger">{{$errors->first('email')}}</span>
      @endif
    </div>
    <div class="form-group">
        <label >Mật khẩu:</label>
        <input type="password" class="form-control" name="password" value="{{old('password')}}">
        @if($errors->has('password'))
        <span class="text-danger">{{$errors->first('password')}}</span>
        @endif
      </div>
   <div class="my-3">
    <p >Chọn quyền cho vai trò</p>
   </div>
    @if ($roles->count())
    <div class="row">
      <div class="col-md-12">
        <div class="form-group">
          @foreach ($roles as $role)
            <div class="form-check">
              <input id="flexCheckCheckedRole{{$role->id}}" class="form-check-input" type="radio" value="{{$role->id}}" name="roleId" required>
              <label class="form-check-label" for="flexCheckCheckedrole{{$role->id}}">
                {{ $role->role_name }}
              </label>
            </div>
          @endforeach
        </div>
      </div>
    </div>
    @endif
    <button type="submit" class="btn btn-success my-4" >Tạo tài khoản</button>
  </form>
@endsection
