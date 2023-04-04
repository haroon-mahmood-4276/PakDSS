<!DOCTYPE html>
<html class="light-style layout-navbar-fixed layout-menu-fixed" lang="en" dir="ltr" data-theme="theme-default"
    data-assets-path="{{ asset('admin-assets') }}/" data-template="vertical-menu-template">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>@yield('title') - {{ env('APP_NAME') }}</title>

    <link rel="icon" type="image/x-icon" href="{{ asset('admin-assets') }}/img/favicon/favicon.ico" />

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('admin-assets') }}/vendor/css/rtl/core.min.css"
        class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ asset('admin-assets') }}/vendor/css/rtl/theme-default.css"
        class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{ asset('admin-assets') }}/css/demo.css" />

    <link rel="stylesheet" href="{{ asset('admin-assets') }}/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
    <link rel="stylesheet" href="{{ asset('admin-assets') }}/vendor/libs/node-waves/node-waves.css" />
    <link rel="stylesheet" href="{{ asset('admin-assets') }}/vendor/libs/typeahead-js/typeahead.css" />

    <link rel="stylesheet" href="{{ asset('admin-assets') }}/vendor/css/pages/page-misc.css">
    <script src="{{ asset('admin-assets') }}/vendor/js/helpers.js"></script>
    <script src="{{ asset('admin-assets') }}/js/config.js"></script>
</head>

<body>

    @yield('content')

    <script src="{{ asset('admin-assets') }}/vendor/libs/jquery/jquery.js"></script>
    <script src="{{ asset('admin-assets') }}/vendor/libs/popper/popper.js"></script>
    <script src="{{ asset('admin-assets') }}/vendor/js/bootstrap.js"></script>
    <script src="{{ asset('admin-assets') }}/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="{{ asset('admin-assets') }}/vendor/libs/node-waves/node-waves.js"></script>

    <script src="{{ asset('admin-assets') }}/vendor/libs/node-waves/node-waves.js"></script>
    <script src="{{ asset('admin-assets') }}/vendor/libs/hammer/hammer.js"></script>
    <script src="{{ asset('admin-assets') }}/vendor/libs/typeahead-js/typeahead.js"></script>

    <script src="{{ asset('admin-assets') }}/vendor/js/menu.js"></script>
    <script src="{{ asset('admin-assets') }}/js/main.js"></script>
</body>

</html>
