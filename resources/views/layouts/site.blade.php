<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <link rel="profile" href="https://gmpg.org/xfn/11"/>
    <link rel="shortcut icon" href="{{ asset('acdf/img/favicon.png') }}" type="image/png">

    <!-- Chrome, Firefox OS and Opera -->
    <meta name="theme-color" content="#003DA7">
    <!-- Windows Phone -->
    <meta name="msapplication-navbutton-color" content="#003DA7">
    <!-- iOS Safari -->
    <meta name="apple-mobile-web-app-status-bar-style" content="#003DA7">

    <link rel="stylesheet" type="text/css" href="{{ asset('acdf/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('acdf/css/font-awesome.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('acdf/css/animate.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('acdf/css/jquery.fancybox.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/owl.carousel.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/owl.theme.default.min.css') }}">
    @yield('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('acdf/css/new.style.css?version=1.0.1.173') }}">
    @yield('meta')
</head>

<body>

@include('layouts._header', ['header_menu' => menu('header-menu')])

<div class="site-content-wrap">
    @yield('content')
</div>

{{--@include('layouts._footer', ['footer_menu' => menu('footer-menu'), 'contacts' => getContacts()])--}}

<script src="{{ asset('/acdf/js/jquery.min.js') }}"></script>
<script src="{{ asset('/acdf/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('/acdf/js/jquery.fancybox.min.js') }}"></script>
<script src="{{ asset('js/owl.carousel.js') }}"></script>
@yield('js')
<script src="{{ asset('/acdf/js/main.js?v=1.0.0.13') }}"></script>

</body>
</html>
