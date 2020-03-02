<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>The Institute</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('bootstrap/js/bootstrap.min.js') }}" defer></script>
    <script src="{{ asset('js/JavaScriptManager.js') }}" defer></script>
    <link rel="stylesheet" type="text/css" href="{{ asset('spinner/spinner.css') }}">


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    <link href="{{ asset('font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <script src="{{ asset('spinner/spinner.js') }}"></script>
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/highcharts.js') }}"></script>
    <script src="{{ asset('js/exporting.js') }}"></script>
</head>
<body onload="">
    <div id="spinner-front">
      <img src="{{ asset('spinner/ajax-loader.gif') }}"/><br>
      Now loading...
    </div>
    <div id="spinner-back"></div>
    <div id="app">

        @guest
        @else
            @if(\Auth::user()->role_id == 1)
                @include('layouts.navi')
            @else
                @include('layouts.portal')
            @endif
        @endguest
        <main class="py-4">
            <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                @include('layouts.messages')
                </div>
            </div>
            </div>
            @yield('content')
        </main>
    </div>
</body>
</html>
