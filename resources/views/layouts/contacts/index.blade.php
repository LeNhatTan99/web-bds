@extends('layouts.app')
@section('content')

 <div class="m-4">
    <h3 class="text-center my-3">Quản lý Liên hệ của KH</h3>
    @if ($contacts->count())
      <table class="table">
          <thead>
            <tr>
              <th scope="col">ID</th>
              <th scope="col">ID product</th>
              <th scope="col">Tên Kh</th>
              <th scope="col">Địa chỉ</th>
              <th scope="col">Số điện thoại</th>
              <th scope="col">Email</th>
              <th scope="col">Nội dung</th>
              <th scope="col">Trạng thái</th>
              <th scope="col">Thao tác</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($contacts as $contact )
         <form action="{{route('contacts.edit',['contact'=>$contact->id])}}" method="get">
            @csrf
            <tr>
                <td>{{$contact->id}}</td>
                <td>{{$contact->product_id}}</td>
                <td>{{$contact->name}}</td>
                <td>{{$contact->address}}</td>
                <td>{{$contact->phone_number}}</td>
                <td>{{$contact->email}}</td>
                <td ><p class="description">{{$contact->content}}</p></td>
                <td >
                  <select name="status" id="cars">
                      <option value="Chưa liên hệ">{{$contact->status}}</option>
                      <option value="Đã liên hệ">Đã liên hệ</option>
                      <option value="Chưa liên hệ">Chưa liên hệ</option>
                    </select>
                  </td>
                <td >
                    <a class="btn btn-info" href="{{route('contacts.show',['contact'=>$contact->id])}}">Xem</a>
                    <button class="btn btn-success" type="submit">Cập nhật</button>
                </td>
            </tr>
         </form>
            @endforeach
          </tbody>
        </table>
        @else
        <h5>Chưa có liên hệ từ KH</h5>
        @endif
        {{ $contacts->links() }}


 </div>
@endsection

