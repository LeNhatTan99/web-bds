@extends('layouts.app')
@section('content')
<form action="{{route('permissions.update',['permission'=>$permission->id])}}" method="POST">
    @csrf
    @method('put')
    <div class="form-group">
      <label >Tên quyền:</label>
      <input type="text" class="form-control" name="permission_name" value="{{old('permission',$permission->permission_name)}}">
      @if($errors->has('permission_name'))
      <span class="text-danger">{{$errors->first('permission_name')}}</span>
      @endif
    </div>
    <div class="form-group">
      <label >Mô tả:</label>
      <input type="text" class="form-control" name="description" value="{{old('permission',$permission->description)}}">
    @if($errors->has('description'))
    <span class="text-danger">{{$errors->first('description')}}</span>
    @endif
    </div>
    <button type="submit" class="btn btn-success my-4" >Submit</button>
  </form>
@endsection
