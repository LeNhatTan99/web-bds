@extends('layouts.app')
@section('content')
<div class="row bg-light p-4 box-shadow center">
    <div class="col-md-8">
            <div class="post m-4 bg-white">
                <div class="text-center pt-4">
                  <h3 class="title">{{$post->title}}</h3>
                  <h5>Tạo bởi {{$post->user->name}} ngày {{date('jS M Y', strtotime($post->created_at))}}</h5>
                </div>

                <div class="content">
                  <img src="{{ asset('storage/' . $post->thumbnail)}}" alt="Hình ảnh" style="width:100%" class="py-4">
                  <p class="m-3">{{$post->content}}</p>
                     <div class="row">
                    <div class="col-6 ">
                        <p class="mx-2"><button class="p-2" onclick="likeFunction(this)"><b><i class="fa fa-thumbs-up"></i> Like <span>1</span></b></button></p>
                    </div>
                    <div class="col-6 ">
                        <p class="d-flex flex-row-reverse mx-2"><button class="bg-black text-white p-2" onclick="myFunction('demo1')" id="myBtn"><b>Comments &nbsp;</b> <span class=" bg-white text-black px-1">1</span></button></p>
                    </div>
                  </div>
                  <div class="" id="demo1" >
                    <hr>
                    <div class="px-3">
                            <img src="https://scontent.fdad1-3.fna.fbcdn.net/v/t39.30808-6/273422360_3083078518632959_3714106569775382786_n.jpg?_nc_cat=111&ccb=1-7&_nc_sid=174925&_nc_ohc=lbLspAvoRP4AX-n5s4x&_nc_ht=scontent.fdad1-3.fna&oh=00_AT8ZJcP1HXPDY4gRMzVttJGpyujMRlH480Ht62NPz0BcLg&oe=630DBF83"  class="avatar">
                            <form action="{{route('comment')}}" method="post" style="display: inline" class="px-2">
                                @csrf
                                     <input type=hidden name="post_id" value="{{ $post->id }}" />
                                    <input name="content" class="p-1 w-75" type="text" placeholder="Viết bình luận..." required>
                                    <button type="submit" class="border-0 text-info py-1 px-2"><i class=" fa fa-paper-plane"></i></button>
                            </form>
                    </div>
                    <div class="px-3">
                      @foreach ($comments as $comment )
                      @if ($post->id == $comment->post_id)
                      <div class="my-2">
                          <img src="https://scontent.fdad1-3.fna.fbcdn.net/v/t39.30808-6/273422360_3083078518632959_3714106569775382786_n.jpg?_nc_cat=111&ccb=1-7&_nc_sid=174925&_nc_ohc=lbLspAvoRP4AX-n5s4x&_nc_ht=scontent.fdad1-3.fna&oh=00_AT8ZJcP1HXPDY4gRMzVttJGpyujMRlH480Ht62NPz0BcLg&oe=630DBF83"  class="avatar">
                          <p class="mx-2 pb-3 p-2 rounded bg-gray maxw-75 " style="display: inline-block">
                              <strong>{{$comment->user->name}}</strong> <span class="mx-3"> {{$comment->created_at}}</span><br>
                              {{$comment->content}}</p>
                      </div>
                      @endif
                      @endforeach
                </div>
                    <hr>
                  </div>
                </div>
              </div>
    </div>
@endsection
