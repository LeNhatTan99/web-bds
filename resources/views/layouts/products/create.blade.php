@extends('layouts.app')
@section('content')
<div class="m-4">
    <h4>Tạo sản phẩm</h4>
<form  action="{{route('products.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
      <label >Tên sản phẩm:</label>
      <input type="text" class="form-control" name="name" value="{{old('name')}}">
      @if($errors->has('name'))
      <span class="text-danger">{{$errors->first('name')}}</span>
      @endif
    </div>
    <div class="form-group">
      <label >Địa chỉ:</label>
      <input type="text" class="form-control" name="address" value="{{old('address')}}">
      @if($errors->has('address'))
      <span class="text-danger">{{$errors->first('address')}}</span>
      @endif
    </div>
    <div class="form-group">
        <label >Hình ảnh:</label>
        <input type="file" class="form-control" name="thumbnail">
        @if($errors->has('thumbnail'))
        <span class="text-danger">{{$errors->first('thumbnail')}}</span>
        @endif
      </div>
      <div class="form-group">
        <label >Mô tả:</label>
        <textarea class="form-control"  name="description"  cols="30" rows="5">{{old('description')}}</textarea>
        @if($errors->has('address'))
        <span class="text-danger">{{$errors->first('address')}}</span>
        @endif
      </div>
      <div class="form-group">
        <label >Số phòng ngủ:</label>
        <input type="number" class="form-control" name="bedroom" value="{{old('bedroom')}}">
        @if($errors->has('bedroom'))
        <span class="text-danger">{{$errors->first('bedroom')}}</span>
        @endif
      </div>
      <div class="form-group">
        <label >Số phòng tắm:</label>
        <input type="number" class="form-control" name="bathroom" value="{{old('bathroom')}}">
        @if($errors->has('bathroom'))
        <span class="text-danger">{{$errors->first('bathroom')}}</span>
        @endif
      </div>
      <div class="form-group">
        <label >Diện tích (m2):</label>
        <input type="number" class="form-control" name="area" value="{{old('area')}}">
        @if($errors->has('area'))
        <span class="text-danger">{{$errors->first('area')}}</span>
        @endif
      </div>
      <div class="form-group">
        <label >Giá:</label>
        <input type="number" class="form-control" name="price" value="{{old('price')}}">
        @if($errors->has('price'))
        <span class="text-danger">{{$errors->first('price')}}</span>
        @endif
      </div>
      <div class="form-group">
        <label >Hình thức:</label>
        <select name="form" class="form-control"  >
            <option {{old('form')=="unemployed"? 'selected':''}}  value="Bán">Bán</option>
            <option {{old('form')=="employed"? 'selected':''}} value="Cho thuê">Cho thuê</option>
          </select>
        @if($errors->has('area'))
        <span class="text-danger">{{$errors->first('area')}}</span>
        @endif
      </div>
   <div class="my-3">
    <p >Chọn kiểu dự án</p>
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
    <button type="submit" class="btn btn-success my-4" >Tạo mới</button>
  </form>
</div>
@endsection
