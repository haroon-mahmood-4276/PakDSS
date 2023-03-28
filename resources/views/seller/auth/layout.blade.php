<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta name="description" content="Login Page - {{ env('APP_NAME') }}" />
    <meta name="viewport"
    content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta property="og:title" content="">
    <meta property="og:type" content="">
    <meta property="og:url" content="">
    <meta property="og:image" content="">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('seller-assets') }}/imgs/theme/favicon.svg">
    <link rel="stylesheet" href="{{ asset('seller-assets') }}/css/vendors/normalize.css">
    <link rel="stylesheet" href="{{ asset('seller-assets') }}/css/vendors/bootstrap.css">
    <link rel="stylesheet" href="{{ asset('seller-assets') }}/css/vendors/material-icon-round.css">
    <link rel="stylesheet" href="{{ asset('seller-assets') }}/css/vendors/perfect-scrollbar.css">
    <link rel="stylesheet" href="{{ asset('seller-assets') }}/css/vendors/select2.min.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet"
    href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500&display=swap">

    <link rel="stylesheet" href="{{ asset('seller-assets') }}/css/style.min.css">
    <title>Login Page - {{ env('APP_NAME') }}</title>
</head>

<body class="bg-img">

    @yield('content')

    <script src="{{ asset('seller-assets') }}/js/vendors/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('seller-assets') }}/js/vendors/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('seller-assets') }}/js/vendors/select2.min.js"></script>
    <script src="{{ asset('seller-assets') }}/js/vendors/perfect-scrollbar.js"></script>
    <script src="{{ asset('seller-assets') }}/js/vendors/jquery.fullscreen.min.js"></script>
    <script src="{{ asset('seller-assets') }}/js/vendors/chart.js"></script>
    <script src="{{ asset('seller-assets') }}/js/main.js?v=1.0.0"></script>
    <script src="{{ asset('seller-assets') }}/js/custom-chart.js" type="text/javascript"></script>
</body>

</html>
