@extends('frontend.app')
@section('content')
<div class="row bg-light p-5 box-shadow ">
    <div class="col-md-8">
            <div class="bg-white box-shadow detail-product">
                <img src="{{ asset('storage/' . $product->thumbnail)}}" alt="Hình ảnh" class="detail-product__img">
                <div class="detail-product__info p-4">
                    <div class="row">
                        <div class="col-8">
                            <p ><i class="fa fa-bed text-info"></i> <span class="font-bold px-1">Phòng ngủ: </span> {{$product->bedroom}}</p>
                            <p ><i class="fa fa-bath  text-info"></i> <span class="font-bold px-1">Phòng tắm:</span> {{$product->bathroom}}</p>
                            <p ><i class="fa fa-clone  text-info"></i> <span class="font-bold px-1">Diện tích:</span> {{$product->area}}m2</p>
                        </div>
                        <div class="col-4">
                            <h4 class="font-bold text-info">Giá: {{number_format($product->price,0,'.','.')}}</h4>
                        </div>
                        <hr>
                    </div>
                    <h3 class="font-bold"> {{$product->name}}</h3>
                    <p ><strong>Địa chỉ:</strong> {{$product->address}}</p>
                    <p ><strong>Kiểu dự án:</strong>
                         @foreach ($product->categories as $category )
                        {{$category->category_name}} <br>
                        @endforeach
                    </p>
                    <p><strong>Hình thức:</strong> {{$product->form}}</p>
                    <p><strong>Giới thiệu:</strong> {{$product->description}}</p>
                </div>
            </div>
    </div>
    <div class="col-md-4">
        <div class="">
            <h4 class="font-bold py-3">Liên hệ ngay</h4>
            <h4 class="text-primary"><i class="fa fa-phone"></i> 0123 456 789</h4>
            <hr>
        </div>
            <div class="px-3">
              <form action="{{route('contact')}}" method="GET">
                @csrf
               <p class="font-bold">Hoặc điền thông tin vào form sau.</p>
               <input type="hidden" name="product_id" value="{{$product->id}}">
               <input class="form-control my-2" type="text" name="name" placeholder="Họ và tên*" required>
               <input class="form-control my-2" type="text" name="address" placeholder="Địa chỉ*" required>
               <input class="form-control my-2" type="number" name="phone_number" placeholder="Số điện thoại*" required>
               <input class="form-control my-2" type="email" name="email" placeholder="Email*" required>
               <textarea class="form-control my-2" name="content" placeholder="Nội dung*" rows="5"></textarea>
               <button class="btn btn-info font-bold text-white form-control my-2" type="submit">Gửi thông tin</button>

              </form>
            </div>

    </div>
@endsection
