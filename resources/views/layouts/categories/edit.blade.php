@extends('layouts.app')
@section('content')
<h4>Chỉnh sửa danh mục</h4>
<form action="{{route('categories.update',['category'=>$category])}}" method="POST">
    @csrf
    @method('put')
    <div class="form-group">
      <label >Tên danh mục:</label>
      <input type="text" class="form-control" name="category_name" value="{{old('category_name',$category->category_name)}}">
      @if($errors->has('category_name'))
      <span class="text-danger">{{$errors->first('category_name')}}</span>
      @endif
    </div>
    <div class="form-group">
      <label >Mô tả:</label>
      <input type="text" class="form-control" name="description" value="{{old('description',$category->description)}}">
      @if($errors->has('description'))
      <span class="text-danger">{{$errors->first('description')}}</span>
      @endif
    </div>

    <button type="submit" class="btn btn-success my-4" >Cập nhật danh mục</button>
  </form>
@endsection
