@extends('layouts.app')
@section('content')

 <div class="m-4">
    <h3 class="text-center my-3">Quản lý sản phẩm</h3>
    @if ($products->count())
      <table class="table">
          <thead>
            <tr>
              <th scope="col">ID</th>
              <th scope="col">Tên</th>
              <th scope="col">Địa chỉ</th>
              <th scope="col">Kiểu dự án</th>
              <th scope="col">Số phòng ngủ</th>
              <th scope="col">Số phòng tắm</th>
              <th scope="col">Diện tích (m2)</th>
              <th scope="col">Giá</th>
              <th scope="col">Hình thức</th>
              <th scope="col">Thao tác</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($products as $product )
            <tr>
              <td>{{$product->id}}</td>
              <td>{{$product->name}}</td>
              <td>{{$product->address}}</td>
              <td>
                @foreach ($product->categories as $category )
                {{$category->category_name}} <br>
                @endforeach
             </td>
              <td>{{$product->bedroom}}</td>
              <td>{{$product->bathroom}}</td>
              <td>{{$product->area}}</td>
              <td>{{number_format($product->price)}}</td>
              <td>{{$product->form}}</td>
              <td >
                  <a class="btn btn-info" href="{{route('products.show',['product'=>$product->id])}}">Xem</a>
                  <a class="btn btn-success" href="{{route('products.edit',['product'=>$product->id])}}">Sửa</a>
                  <form action="{{route('products.destroy',['product'=>$product->id])}}" method="POST" style="display:inline-block">
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
        <h5>Chưa có sản phẩm nào được tạo!</h5>
        @endif

        <a class="btn btn-success" href="{{route('products.create')}}">Tạo thêm sản phẩm  </a>

 </div>
@endsection

