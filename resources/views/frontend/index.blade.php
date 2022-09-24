@extends('frontend.app')
@section('content')
    <div class="background-img ">
        <div class="pt-10">
            <div class=" text-center midle">
                <form class=" " method="get" action="{{ route('search') }}">
                    <div class="form-search mt-5">

                        <div class="row d-flex justify-content-center">
                            <div class="col-md-10">
                                <div class=" py-4 ">
                                    <h5 class="font-bold">Tìm kiếm sản phẩm</h5>
                                    <div class="row g-3 mt-2">
                                        <div class="col-md-3">
                                            <div class="dropdown">
                                                <button class="btn btn-info dropdown-toggle" type="button"
                                                    id="dropdownMenuButton" data-toggle="dropdown" aria-expanded="false">
                                                    Loại nhà đất
                                                </button>
                                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                    <li>
                                                        @foreach ($categories as $category)
                                                            <a class="dropdown-item"
                                                                href="{{ route('get.list.product', $category->slug) }}">
                                                                {{ $category->category_name }}</a>
                                                        @endforeach
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" name="searchWord" class="form-control search__input"
                                                placeholder="Nhập từ khoá cần tìm">
                                        </div>
                                        <div class="col-md-3">
                                            <button class="btn btn-info "><i class="fa fa-search"></i> Tìm kiếm</button>
                                        </div>
                                    </div>

                                    <div class="mt-3">
                                        <a data-bs-toggle="collapse" href="#collapseExample" role="button"
                                            aria-expanded="false" aria-controls="collapseExample" >
                                            Lọc thêm <i class="fa fa-angle-down"></i>
                                        </a>
                                        <div class="collapse" id="collapseExample">
                                            <div class="my-2">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <input name="address" type="text" class="form-control"
                                                            placeholder="Khu vực">
                                                    </div>

                                                    <div class="col-md-4">
                                                        <input name='price' type="text" placeholder="Mức giá"
                                                            class="form-control">
                                                    </div>
                                                    <div class="col-md-4">
                                                        <input name="area" type="text" class="form-control"
                                                            placeholder="Diện tích">
                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="container py-5">

        <div class="row ">
            @foreach ($products as $form => $items)
                <h2 class="text-center my-4 font-bold">Bất động sản {{ $form }}</h2>
                @foreach ($items->take(8) as $product)
                    <div class="col-sm-6 col-xl-3 py-3 ">
                        <div class="product box-shadow">
                            <div class="product__thumbnail">
                                <img class="product__img" src="{{ asset('storage/' . $product->thumbnail) }}"
                                    alt="">
                                <span class="product__tag product__tag--left">{{ $product->form }}</span>
                                <span class="product__tag product__tag--right">Mới</span>
                                <div class="product__overlay">
                                    <div class="product__description px-3">
                                        {{ $product->description }}
                                    </div>
                                </div>
                            </div>
                            <div class="product__info px-3">
                                <h5 class="product__name font-bold py-3">{{ $product->name }}</h5>
                                <p><i class="fa fa-location-arrow  text-info px-1"></i> {{ $product->address }}</p>
                                <p><i class="fa fa-bed text-info"></i> <span class="font-bold px-1">Phòng ngủ: </span>
                                    {{ $product->bedroom }}</p>
                                <p><i class="fa fa-bath  text-info"></i> <span class="font-bold px-1">Phòng tắm:</span>
                                    {{ $product->bathroom }}</p>
                                <p><i class="fa fa-clone  text-info"></i> <span class="font-bold px-1">Diện tích:</span>
                                    {{ $product->area }}m2</p>
                                <div class="product__bottom row p-3">
                                    <div class=" text-primary font-bold col-6">
                                            @if($product->price>=1000000000)
                                            <h5>{{$product->price/1000000000}} tỷ</h5>
                                            @else
                                            <h5>{{$product->price/1000000}} triệu</h5>
                                            @endif
                                    </div>
                                    <div class=" font-bold  col-6">
                                        <a href="{{ route('detailProduct', $product->slug) }}">Xem chi tiết</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                <p class="py-4 "><a href="{{ route('allProduct') }}" class=" btn btn-warning font-bold px-4">Xem tất cả <i
                            class="fa fa-arrow-right"></i></a></p>
            @endforeach
        </div>
    </div>
    <div class=" news" id="tintuc">
        <div class="container">

            <h2 class="text-center p-4">Tin tức tiêu biểu</h2>
            <div class="row">
                <div class="col-lg-8">
                    @foreach ($posts->take(4) as $post)
                        <div class="post box-shadow row my-4">
                            <div class="col-4 p-2 pr-0 ">
                                <img class="post__img " src="{{ asset('storage/' . $post->thumbnail) }}" alt="">
                            </div>
                            <div class="post__info col-6 p-4">
                                <p><i class="fa fa-clock"></i> {{ date('j/m/Y', strtotime($post->created_at)) }}</p>
                                <a href="{{ route('detailNews', $post->slug) }}" class="font-bold">
                                    {{ $post->title }}
                                </a>
                                <p class="post__description"> {{ $post->content }}</p>
                            </div>
                        </div>
                    @endforeach

                </div>
                <div class="col-lg-4">
                    <div class=" box-shadow my-4 mx-2">
                        <div class="bg-gray">
                            <h4 class="font-bold text-center py-3">Đăng ký nhận tin</h4>
                        </div>
                        <div class="p-3">
                            <form action="{{ route('subscribe') }}" method="get" class="resign_form">
                                <p>Nhập email để nhận thông báo mỗi khi có tin tức mới.</p>
                                <input class="form-control" type="email" name="email"
                                    placeholder="Nhập email của bạn" required> <br>
                                <button class="btn btn-info font-bold text-white form-control" type="submit">Đăng ký
                                    ngay</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
