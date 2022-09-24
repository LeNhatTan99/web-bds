<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/fontawesome.min.css" />
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('asset/css/style.css') }}" rel="stylesheet">
</head>
<body>
    <div class="app" id="app">

        @if (session('error'))
        <div class="alert alert-danger" role="alert" >
            {{session('error')}}
        </div>
        @elseif (session('success'))
        <div class="alert alert-success" role="alert" >
            {{session('success')}}
        </div>
        @endif

        @if($errors->has('email'))
        <div class="alert alert-danger">
                {{$errors->first('email')}}
        </div>
        @endif
        @include('frontend.header')
        <main class="main">
            @yield('content')
        </main>
        @include('frontend.footer')
    </div>
</body>
</html>
