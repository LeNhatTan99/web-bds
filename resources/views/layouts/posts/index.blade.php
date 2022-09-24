@extends('layouts.app')
@section('content')

 <div class="m-4">
    <h3 class="text-center my-3">Quản lý bài viết</h3>
    @if ($posts->count())
      <table class="table">
          <thead>
            <tr>
              <th scope="col">ID</th>
              <th scope="col">Tiêu đề</th>
              <th scope="col">Slug</th>
              <th scope="col">Nội dung</th>
              <th scope="col">Danh mục</th>
              <th scope="col">Hình ảnh</th>
              <th scope="col">Thao tác</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($posts as $post )
            <tr>
              <td>{{$post->id}}</td>
              <td>{{$post->title}}</td>
              <td>{{$post->slug}}</td>
              <td ><p class="description">{{$post->content}}</p></td>
              <td>
                  @foreach ($post->categories as $category )
                  -{{$category->category_name}} <br>
                  @endforeach
              </td>
              <td>{{$post->thumbnail}}</td>
              <td >
                  <a class="btn btn-info" href="{{route('posts.show',['post'=>$post->id])}}">Xem</a>
                  <a class="btn btn-success" href="{{route('posts.edit',['post'=>$post->id])}}">Sửa</a>
                  <form action="{{route('posts.destroy',['post'=>$post->id])}}" method="POST" style="display:inline-block">
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
        <h5>Chưa có bài viết nào được tạo!</h5>
        @endif
        {{ $posts->links() }}
        <a class="btn btn-success" href="{{route('posts.create')}}">Tạo thêm bài viết  </a>

 </div>
@endsection

