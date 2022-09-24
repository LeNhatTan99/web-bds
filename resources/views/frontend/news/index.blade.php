@extends('frontend.app')
@section('content')
    <div class="container py-5">
        <h2 class="text-center font-bold my-3">Tin tức</h2>
        <div class="row ">
                @foreach ($posts as $post)
                    <div class="col-sm-6 col-xl-3 py-3 ">
                        <div class="product box-shadow">
                            <div class="product__thumbnail">
                                <img class="product__img" src="{{ asset('storage/' . $post->thumbnail) }}"
                                    alt="">
                            </div>
                            <div class=" p-3">
                                <h5 class=" font-bold py-3">{{ $post->title }}</h5>
                                <p class="post__description"> {{ $post->content }}</p>
                                    <div class=" font-bold  col-6">
                                        <a href="{{ route('detailNews', $post->slug) }}">Xem chi tiết</a>
                                    </div>
                            </div>
                        </div>
                    </div>
                @endforeach
        </div>
    </div>

@endsection
