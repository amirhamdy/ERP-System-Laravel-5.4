<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title> @yield('title') </title>

    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('font-awesome/css/font-awesome.css') }}" rel="stylesheet">
    <!-- Morris -->
    <link href="{{ asset('css/plugins/morris/morris-0.4.3.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    @yield('css')
</head>

{{--
<body>
--}}
<body class="pace-done mini-navbar">
<div id="wrapper">
    @include('layouts.left_navbar')
    <div id="page-wrapper" class="gray-bg">
        <div class="row border-bottom">
            @include('layouts.tob_navbar')
        </div>
        <div class="wrapper wrapper-content">
            @yield('content')
        </div>
        @include('layouts.footer')
    </div>
    <div id="right-sidebar">
        <div class="sidebar-container">
            @include('layouts.right_navbar')
        </div>
    </div>
</div>
@include('layouts.scripts')
@yield('scripts')
@yield('more_scripts')
</body>
</html>
