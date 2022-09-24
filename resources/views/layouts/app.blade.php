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

    <script src=
    'https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js'>
        </script>

        <script src=
    'https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js'>
        </script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('asset/css/style.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">

        @if (session('error'))
        <div class="alert alert-danger" role="alert" >
            {{session('error')}}
        </div>
        @elseif (session('success'))
        <div class="alert alert-success" role="alert" >
            {{session('success')}}
        </div>
        @endif
        @include('layouts.navbar')
        @auth
        @include('layouts.sidebar')
        @endauth
        <main>
            <div class="content">

                @yield('content')
            </div>
        </main>

    </div>


</body>

</html>
