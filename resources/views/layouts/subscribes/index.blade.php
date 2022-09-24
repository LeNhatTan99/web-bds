@extends('layouts.app')
@section('content')

  <h3 class="text-center my-3">Quản lý thành viên đăng ký nhận tin</h3>
  @if ($members->count())
    <table class="table">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Email</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($members as $member )
          <tr>
            <td>{{$member->id}}</td>
            <td>{{$member->email}}</td>
        </tr>
          @endforeach
        </tbody>
      </table>
      @else
      <h5>Chưa có thành viên nào đăng ký nhận tin!</h5>
      @endif
      {{ $members->links() }}
@endsection

