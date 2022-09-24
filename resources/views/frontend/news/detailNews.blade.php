@extends('frontend.app')
@section('content')
    <div class="row bg-light p-4 box-shadow ">
        <div class="col-md-8">
            <div class="post m-4 bg-white">
                <div class="post__title pt-4">
                    <h3 class=" text-center">{{ $post->title }}</h3>
                    <h5>Đăng bởi {{ $post->user->name }} ngày {{ date('jS M Y', strtotime($post->created_at)) }}</h5>
                </div>

                <div class="post__content">
                    <img src="{{ asset('storage/' . $post->thumbnail) }}" alt="Hình ảnh" style="width:100%" class="py-4">
                    <p class="m-3">{{ $post->content }}</p>
                    <div class="" id="demo1">
                        <hr>
                        <div class="px-3">
                            <i class="fa fa-user font-size-24"></i>
                            <form action="{{ route('comment') }}" method="post" style="display: inline" class="px-2">
                                @csrf
                                <input type=hidden name="post_id" value="{{ $post->id }}" />
                                <input name="content" class="p-1 w-75" type="text" placeholder="Viết bình luận..."
                                    required>
                                <button type="submit" class="border-0 text-info py-1 px-2"><i
                                        class=" fa fa-paper-plane"></i></button>
                            </form>
                        </div>
                        <div class="px-3">
                            @foreach ($comments as $comment)
                                @if ($post->id == $comment->post_id)
                                    <div class="my-2">
                                        <i class="fa fa-user font-size-24"></i>
                                        <p class="mx-2 pb-3 p-2 rounded bg-gray maxw-75 " style="display: inline-block">
                                            <strong>{{ $comment->user->name }}</strong> <span class="mx-3">
                                                {{ $comment->created_at }}</span><br>
                                            {{ $comment->content }}
                                        </p>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                        <hr>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="m-4 bg-white">
                <div class="text-center pt-4">
                    <h3 class="post__title font-bold text-secondary">Tin tức nổi bật</h3>
                    <hr>
                </div>
                @foreach ($posts as $post )
                <div class="m-2 ">
                <a class="font-bold " href="{{route('detailNews',$post->slug)}}">{{$post->title}}</a>
                <hr>
                </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
