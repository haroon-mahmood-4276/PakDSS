<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="description" content="Login Page - {{ env('APP_NAME') }}" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    @yield('seo-breadcrumb')

    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta charset="utf-8">

    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta property="og:title" content="">

    <meta property="og:type" content="">
    <meta property="og:url" content="">

    <meta property="og:image" content="">

    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('user-assets') }}/imgs/theme/favicon.svg">

    <link rel="stylesheet" href="{{ asset('user-assets') }}/css/vendors/normalize.css">
    <link rel="stylesheet" href="{{ asset('user-assets') }}/css/vendors/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('user-assets') }}/css/vendors/uicons-regular-rounded.css">
    <link rel="stylesheet" href="{{ asset('user-assets') }}/css/plugins/swiper-bundle.min.css">
    <link rel="stylesheet" href="{{ asset('user-assets') }}/css/plugins/select2.min.css">
    <link rel="stylesheet" href="{{ asset('user-assets') }}/css/plugins/slick.css">
    <link rel="stylesheet" href="{{ asset('user-assets') }}/css/plugins/animate.min.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500&display=swap">

    <link rel="stylesheet" href="{{ asset('user-assets') }}/css/style.min.css">

    @yield('custom-css')

    <title>@yield('page-title') - {{ env('APP_NAME') }}</title>

</head>

<body>

    {{-- Preloader --}}
    {{ view('user.layout.preloader') }}

    {{-- Topbar --}}
    {{ view('user.layout.topbar') }}

    {{-- Header --}}
    {{ view('user.layout.header') }}

    {{-- Leftbar --}}
    {{ view('user.layout.leftbar') }}

    @yield('content')

    {{-- Footer --}}
    {{ view('user.layout.footer') }}

    <script src="{{ asset('user-assets') }}/js/vendors/modernizr-3.6.0.min.js"></script>
    <script src="{{ asset('user-assets') }}/js/vendors/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('user-assets') }}/js/vendors/jquery-migrate-3.3.0.min.js"></script>
    <script src="{{ asset('user-assets') }}/js/vendors/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('user-assets') }}/js/vendors/waypoints.js"></script>
    <script src="{{ asset('user-assets') }}/js/vendors/wow.js"></script>
    <script src="{{ asset('user-assets') }}/js/vendors/magnific-popup.js"></script>
    <script src="{{ asset('user-assets') }}/js/vendors/perfect-scrollbar.min.js"></script>
    <script src="{{ asset('user-assets') }}/js/vendors/select2.min.js"></script>
    <script src="{{ asset('user-assets') }}/js/vendors/isotope.js"></script>
    <script src="{{ asset('user-assets') }}/js/vendors/scrollup.js"></script>
    <script src="{{ asset('user-assets') }}/js/vendors/swiper-bundle.min.js"></script>
    <script src="{{ asset('user-assets') }}/js/vendors/noUISlider.js"></script>
    <script src="{{ asset('user-assets') }}/js/vendors/slider.js"></script>
    <!-- Count down-->
    <script src="{{ asset('user-assets') }}/js/vendors/counterup.js"></script>
    <script src="{{ asset('user-assets') }}/js/vendors/jquery.countdown.min.js"></script>
    <!-- Count down-->
    <script src="{{ asset('user-assets') }}/js/vendors/jquery.elevatezoom.js"></script>
    <script src="{{ asset('user-assets') }}/js/vendors/slick.js"></script>
    <script src="{{ asset('user-assets') }}/js/main.js?v=3.0.0"></script>
    <script src="{{ asset('user-assets') }}/js/shop.js?v=1.2.1"></script>

    @yield('page-js')

    <script>
        moment.tz.setDefault("{{ Config::get('app.timezone') }}");
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        // const Toast = Swal.mixin({
        //     toast: true,
        //     position: 'top-end',
        //     showConfirmButton: false,
        //     timer: 3000,
        //     timerProgressBar: true,
        //     didOpen: (toast) => {
        //         toast.addEventListener('mouseenter', Swal.stopTimer)
        //         toast.addEventListener('mouseleave', Swal.resumeTimer)
        //     }
        // });

        function showBlockUI(element = null) {
            blockUIOptions = {
                message: `
            <div class="d-flex justify-content-center flex-column align-items-center">
                <div class="la-fire la-3x text-primary">
                    <div></div>
                    <div></div>
                    <div></div>
                </div>
                <p class="mt-2 text-primary">Please wait...</p>
            </div>`,
                css: {
                    backgroundColor: 'transparent',
                    border: '0'
                },
                overlayCSS: {
                    opacity: 0.8
                }
            };
            if (element) {
                $(element).block(blockUIOptions);
            } else {
                $.blockUI(blockUIOptions);
            }
        }

        function hideBlockUI(element = null) {
            if (element) {
                $(element).unblock();
            } else {
                $.unblockUI();
            }
        }

        function changeTableRowColor(element) {
            if ($(element).is(':checked'))
                $(element).closest('tr').addClass('table-danger');
            else {
                $(element).closest('tr').removeClass('table-danger');
            }
        }

        function changeAllTableRowColor() {
            $('.dt-checkboxes').trigger('change');
        }
    </script>

    @yield('custom-js')
</body>

</html>
