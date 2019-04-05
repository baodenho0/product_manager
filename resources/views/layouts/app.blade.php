<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel=icon href="{{ asset('favicon.png')}}" sizes="32x32" type="image/png">
    <!-- Title -->
    <title>@yield('title')</title>

    <!-- Vendor CSS -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap4/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/themify-icons/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/animate.css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/jscrollpane/jquery.jscrollpane.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/waves/waves.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/switchery/dist/switchery.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/toastr/toastr.min.css') }}">
    @yield('customCSS')
    <!-- Neptune CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/core.css') }}">

</head>
<body class="fixed-sidebar fixed-header content-appear skin-default">
<div class="wrapper">

    <!-- Preloader -->
    <div class="preloader"></div>

    <!-- Sidebar -->
    @include('layouts.sidebar')
    <div class="site-overlay"></div>

    <!-- Sidebar second -->
    <div class="site-sidebar-second custom-scroll custom-scroll-dark">

    </div>

    <!-- Header -->
    @include('layouts.header')

    <div class="site-content">
        <!-- Content -->
        <div class="content-area py-1">
            <div class="container-fluid">
                <!--<h4>Blank</h4>
                <ol class="breadcrumb no-bg mb-1">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                </ol>-->
                @yield('content')
            </div>
        </div>
    </div>

</div>

<!-- Vendor JS -->
<script type="text/javascript" src="{{ asset('assets/vendor/jquery/jquery-1.12.3.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/vendor/tether/js/tether.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/vendor/bootstrap4/js/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/vendor/detectmobilebrowser/detectmobilebrowser.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/vendor/jscrollpane/jquery.mousewheel.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/vendor/jscrollpane/mwheelIntent.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/vendor/jscrollpane/jquery.jscrollpane.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/vendor/jquery-fullscreen-plugin/jquery.fullscreen-min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/vendor/waves/waves.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/vendor/switchery/dist/switchery.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/vendor/toastr/toastr.min.js') }}"></script>
@yield('customJS')
<!-- Neptune JS -->
@include('pages.blocks.messages')
<script type="text/javascript" src="{{ asset('assets/js/app.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/demo.js') }}"></script>
</body>
</html>