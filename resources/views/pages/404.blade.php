<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Title -->
    <title>Neptune</title>

    <!-- Vendor CSS -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap4/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/themify-icons/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/font-awesome/css/font-awesome.min.css') }}">

    <!-- Neptune CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/core.css') }}">

</head>
<body class="bg-warning">

<div class="error-message text-xs-center">
    <h1 class="mb-3">404<span><i class="ti-help-alt"></i></span></h1>
    <h5 class="text-uppercase">Page not found!</h5>
    <div class="error-message-text mb-3">Sorry, but the page you were trying to view does not exist.</div>
    <a href="{{ $url }}" class="btn btn-outline-white w-min-md">Go back</a>
</div>

<!-- Vendor JS -->
<script type="text/javascript" src="{{ asset('assets/vendor/jquery/jquery-1.12.3.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/vendor/tether/js/tether.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/vendor/bootstrap4/js/bootstrap.min.js') }}"></script>
</body>
</html>