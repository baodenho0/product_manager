
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel=icon href="{{ asset('favicon.png') }}" sizes="32x32" type="image/png">

    <!-- Title -->
    <title>@yield('title')</title>

    <!-- Vendor CSS -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap4/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/themify-icons/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/font-awesome/css/font-awesome.min.css') }}">

    <!-- Neptune CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/core.css') }}">

</head>
<body class="img-cover" style="background-image: url({{ asset('assets/img/photos-1/2.jpg') }});">

<div class="container-fluid">
    @yield('content')
</div>

<!-- Vendor JS -->
<script type="text/javascript" src="{{ asset('assets/vendor/jquery/jquery-1.12.3.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/vendor/tether/js/tether.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/vendor/bootstrap4/js/bootstrap.min.js') }}"></script>
</body>
</html>