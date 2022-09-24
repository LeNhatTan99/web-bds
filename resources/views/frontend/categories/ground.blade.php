@extends('frontend.app')
@section('content')
<div class="container py-5">
    <div class="row ">
        <h1 class="font-bold text-center text-uppercase ">Đất nền</h1>
    @if ($products->count())

    @foreach ($products as $form =>$items)
<h2 class="font-bold m-0 mt-5">Bất động sản {{$form}}</h2>
@foreach ($items as $product )
<div class="col-sm-6 col-xl-3 my-4" >
    <div class="product box-shadow">
        <div class="product__thumbnail">
            <img class="product__img" src="{{asset('storage/' . $product->thumbnail)}}"
                alt="">
            <span class="product__tag product__tag--left">{{$product->form}}</span>
            <span class="product__tag product__tag--right">Mới</span>
            <div class="product__overlay">
                <div class="product__description px-3">
                  {{$product->description}}
                </div>
            </div>
        </div>
        <div class="product__info px-3">
            <h5 class="product__name font-bold py-3">{{$product->name}}</h5>
            <p ><i class="fa fa-location-arrow  text-info px-1"></i> {{$product->address}}</p>
            <p ><i class="fa fa-bed text-info"></i> <span class="font-bold px-1">Phòng ngủ: </span> {{$product->bedroom}}</p>
            <p ><i class="fa fa-bath  text-info"></i> <span class="font-bold px-1">Phòng tắm:</span> {{$product->bathroom}}</p>
            <p ><i class="fa fa-clone  text-info"></i> <span class="font-bold px-1">Diện tích:</span> {{$product->area}}m2</p>
            <div class="product__bottom row p-3">
                <div class=" text-primary font-bold col-6">
                    @if($product->price>=1000000000)
                    <h5>{{$product->price/1000000000}} tỷ</h5>
                    @else
                    <h5>{{$product->price/1000000}} triệu</h5>
                    @endif
                </div>
                <div class=" font-bold  col-6">
                    <a href="{{route('detailProduct',$product->slug)}}">Xem chi tiết</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach
    @endforeach
@else
<h2>Hiện tại chưa có sản phẩm nào</h2>
 @endif
    </div>
</div>
@endsection
