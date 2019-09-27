<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://use.fontawesome.com/releases/v5.0.8/css/all.css" as="style" rel="preload" onload="this.rel='stylesheet'">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
{{--<link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet">--}}

<!-- Styles -->
    <link href="{{asset('css/admin-app.css')}}" rel="stylesheet">

    <style>
        html, body {
            background-color: whitesmoke;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
            overflow-y: auto !important;
        }

    </style>

</head>
<body>
<div class="flex-center position-ref full-height" id="app">
    @if (Route::has('login'))
        <div class="top-right links">
            @auth
                <a href="{{ url('/home') }}">Home</a>
            @else
                <a href="{{ route('login') }}">Login</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}">Register</a>
                @endif
            @endauth
        </div>
    @endif
    <div class="footer__copyright">Copyright © 2019 лого , All Right Reserved</div>
</div>
</body>
<script src="{{asset('js/admin-app.js')}}" async></script>
</html>