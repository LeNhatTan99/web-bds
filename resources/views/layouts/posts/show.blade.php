@extends('layouts.app')
@section('content')
   <div class="container">
    <table class="table">
        <h3>Xem chi tiết bài viết</h3>
        <tbody>

            <tr>
                <th scope="col">Tên bài viết</th>
                <td>{{ $post->title }}</td>
            </tr>
            <tr>
                <th scope="col">Tác giả</th>

                <td>
                    {{$post->user->name}}
                </td>
            </tr>
            <tr>
                <th scope="col">Danh mục</th>

                <td>
                    @foreach ($post->categories as $category)
                        {{ $category->category_name }} <br>
                    @endforeach
                </td>
            </tr>
            <tr>
                <th scope="col">Nội dung</th>
                <td>{{ $post->content }}</td>
            </tr>
            <tr>
                <th scope="col">Hình ảnh</th>
                <td><img class="show-img" src="{{asset('storage/'.$post->thumbnail) }}" alt="Hình ảnh"></td>
            </tr>

        </tbody>
    </table>
    <a href="{{ route('posts.index') }}" class="btn btn-success">Quay lại</a>
   </div>
@endsection
