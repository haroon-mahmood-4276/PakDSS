<!DOCTYPE html>

<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default"
    data-assets-path="{{ asset('admin-assets') }}/" data-template="horizontal-menu-template">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Dashboard - Analytics | Vuexy - Bootstrap Admin Template</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('admin-assets') }}/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet" />

    <!-- Icons -->
    <link rel="stylesheet" href="{{ asset('admin-assets') }}/vendor/fonts/fontawesome.css" />
    <link rel="stylesheet" href="{{ asset('admin-assets') }}/vendor/fonts/tabler-icons.css" />
    <link rel="stylesheet" href="{{ asset('admin-assets') }}/vendor/fonts/flag-icons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ asset('admin-assets') }}/vendor/css/rtl/core.css"
        class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ asset('admin-assets') }}/vendor/css/rtl/theme-default.css"
        class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{ asset('admin-assets') }}/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{ asset('admin-assets') }}/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
    <link rel="stylesheet" href="{{ asset('admin-assets') }}/vendor/libs/node-waves/node-waves.css" />
    <link rel="stylesheet" href="{{ asset('admin-assets') }}/vendor/libs/typeahead-js/typeahead.css" />
    <link rel="stylesheet" href="{{ asset('admin-assets') }}/vendor/libs/apex-charts/apex-charts.css" />
    <link rel="stylesheet" href="{{ asset('admin-assets') }}/vendor/libs/swiper/swiper.css" />
    @yield('vendor-css')

    <!-- Page CSS -->
    <link rel="stylesheet" href="{{ asset('admin-assets') }}/vendor/css/pages/cards-advance.css" />
    @yield('page-css')

    <!-- Helpers -->
    <script src="{{ asset('admin-assets') }}/vendor/js/helpers.js"></script>

    <script src="{{ asset('admin-assets') }}/vendor/js/template-customizer.js"></script>
    <script src="{{ asset('admin-assets') }}/js/config.js"></script>
</head>

<body>
    <div class="layout-wrapper layout-navbar-full layout-horizontal layout-without-menu">
        <div class="layout-container">

            @include('user.layout.header')

            <div class="layout-page">

                <div class="content-wrapper">

                    @include('user.layout.topbar')

                    @yield('content')

                    @include('user.layout.footer')

                    <div class="content-backdrop fade"></div>
                </div>
            </div>

        </div>
    </div>

    <div class="layout-overlay layout-menu-toggle"></div>

    <div class="drag-target"></div>

    <script src="{{ asset('admin-assets') }}/vendor/libs/jquery/jquery.js"></script>
    <script src="{{ asset('admin-assets') }}/vendor/libs/popper/popper.js"></script>
    <script src="{{ asset('admin-assets') }}/vendor/js/bootstrap.js"></script>
    <script src="{{ asset('admin-assets') }}/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="{{ asset('admin-assets') }}/vendor/libs/node-waves/node-waves.js"></script>

    <script src="{{ asset('admin-assets') }}/vendor/libs/hammer/hammer.js"></script>
    <script src="{{ asset('admin-assets') }}/vendor/libs/i18n/i18n.js"></script>
    <script src="{{ asset('admin-assets') }}/vendor/libs/typeahead-js/typeahead.js"></script>

    <script src="{{ asset('admin-assets') }}/vendor/js/menu.js"></script>

    <!-- Vendors JS -->
    <script src="{{ asset('admin-assets') }}/vendor/libs/swiper/swiper.js"></script>
    @yield('vendor-js')

    <!-- Main JS -->
    <script src="{{ asset('admin-assets') }}/js/main.js"></script>

    <script>
        $(document).ready(() => {
            $('#template-customizer').remove();
        });
    </script>
    <!-- Page JS -->
    @yield('page-js')

</body>

</html>
