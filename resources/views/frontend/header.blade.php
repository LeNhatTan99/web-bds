
<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm sticky-top">
    <div class="container">

        <div class="collapse navbar-collapse" >
            <!-- Left Side Of Navbar -->
           <div class="py-2">
           <a href="{{route('home')}}"><h2>LOGO</h2></a>
           </div>
            <!-- Right Side Of Navbar -->
               <ul class="navbar-nav ms-auto">
                   <!-- Authentication Links -->
                   <li class="nav-item px-3">
                    <a href="{{route('home')}}" class="nav-link font-bold ">Trang chủ</a>
                   </li>
                   <li class="nav-item dropdown px-3">
                        <a id="navbarDropdown" class="nav-link font-bold dropdown-toggle" href="#" >
                           Sản phẩm
                        </a>
                        <div class="dropdown-menu" >
                            @foreach ($categories as $category )
                            <div class="dropdown-item" >
                                <a href="{{route('get.list.product',$category->slug)}}"> {{$category->category_name}}</a>
                            </div>
                            @endforeach
                        </div>
                   </li>
                   <li class="nav-item px-3">
                    <a href="{{route('news')}}" class="nav-link font-bold ">Tin tức</a>
                   </li>
                   <li class="nav-item px-3">
                    <a href="#contact" class="nav-link font-bold ">Liên hệ</a>
                   </li>
                   @guest
                       @if (Route::has('login'))
                           <li class="nav-item px-3">
                               <a class="nav-link font-bold " href="{{ route('login') }}">{{ __('Đăng nhập') }}</a>
                           </li>
                       @endif

                       @if (Route::has('register'))
                           <li class="nav-item px-3">
                               <a class="nav-link font-bold " href="{{ route('register') }}">{{ __('Đăng ký') }}</a>
                           </li>
                       @endif
                   @else
                       <li class="nav-item dropdown">
                           <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                               {{ Auth::user()->name }}
                           </a>

                           <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                               <a class="dropdown-item" href="{{ route('logout') }}"
                                  onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                   {{ __('Đăng xuất') }}
                               </a>

                               <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                   @csrf
                               </form>
                           </div>
                       </li>
                   @endguest
               </ul>

        </div>
    </div>
</nav>
