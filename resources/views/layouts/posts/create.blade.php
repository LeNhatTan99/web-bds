@extends('layouts.app')
@section('content')
<div class="m-4">
    <h4>Tạo bài viết</h4>
<form rm action="{{route('posts.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
      <label >Tiêu đề:</label>
      <input type="text" class="form-control" name="title" value="{{old('title')}}">
      @if($errors->has('title'))
      <span class="text-danger">{{$errors->first('title')}}</span>
      @endif
    </div>
    <div class="form-group">
      <label >Nội dung:</label>
      <input type="text" class="form-control" name="content" value="{{old('content')}}">
      @if($errors->has('content'))
      <span class="text-danger">{{$errors->first('content')}}</span>
      @endif
    </div>
    <div class="form-group">
        <label >Hình ảnh:</label>
        <input type="file" class="form-control" name="thumbnail">
        @if($errors->has('thumbnail'))
        <span class="text-danger">{{$errors->first('thumbnail')}}</span>
        @endif
      </div>
   <div class="my-3">
    <p >Chọn danh mục bài viết</p>
   </div>
    @if ($categories->count())
    <div class="row">
      <div class="col-md-12">
        <div class="form-group">
          @foreach ($categories as $category)
            <div class="form-check">
              <input id="flexCheckCheckedCategory{{$category->id}}" class="form-check-input" type="checkbox" value="{{ $category->id }}" name="categoryIds[]">
              <label class="form-check-label" for="flexCheckCheckedCategory{{$category->id}}">
                {{ $category->category_name }}
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
    <button type="submit" class="btn btn-success my-4" >Tạo bài viết</button>
  </form>
</div>
@endsection
