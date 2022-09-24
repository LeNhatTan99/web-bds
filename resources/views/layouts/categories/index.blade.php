@extends('layouts.app')
@section('content')

  <h3 class="text-center my-3">Quản lý danh mục</h3>
  @if ($categories->count())


    <table class="table">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Tên danh mục</th>
            <th scope="col">Mô tả</th>
            <th scope="col">Thao tác</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($categories as $category )
          <tr>
            <td>{{$category->id}}</td>
            <td>{{$category->category_name}}</td>
            <td>{{$category->description}}</td>
            <td >
                <a class="btn btn-info" href="{{route('categories.show',['category'=>$category->id])}}">Xem</a>
                <a class="btn btn-success" href="{{route('categories.edit',['category'=>$category->id])}}">Sửa</a>
                <form action="{{route('categories.destroy',['category'=>$category->id])}}" method="POST" style="display:inline-block">
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
      <h5>Chưa có danh mục nào được tạo!</h5>
      @endif
      {{ $categories->links() }}
      <a class="btn btn-success" href="{{route('categories.create')}}">Tạo thêm danh mục  </a>

@endsection

