<!DOCTYPE html>

<html lang="en" dir="ltr">

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

    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('vendor-assets') }}/imgs/theme/favicon.svg">

    <link rel="stylesheet" href="{{ asset('vendor-assets') }}/css/vendors/normalize.css">
    <link rel="stylesheet" href="{{ asset('vendor-assets') }}/css/vendors/bootstrap.css">
    <link rel="stylesheet" href="{{ asset('vendor-assets') }}/css/vendors/material-icon-round.css">
    <link rel="stylesheet" href="{{ asset('vendor-assets') }}/css/vendors/perfect-scrollbar.css">
    <link rel="stylesheet" href="{{ asset('vendor-assets') }}/css/vendors/select2.min.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500&display=swap">

    <link rel="stylesheet" href="{{ asset('vendor-assets') }}/css/style.min.css">

    @yield('custom-css')

    <title>@yield('page-title') - {{ env('APP_NAME') }}</title>

</head>

<body style="overflow-y: scroll">

    <div class="screen-overlay"></div>

    <!-- Menu -->
    {{ view('vendor.layout.leftbar') }}
    <!-- End Menu -->

    <main class="main-wrap">

        <!-- TopBar -->
        {{ view('vendor.layout.topbar') }}
        <!-- End TopBar -->

        {{-- {{ view('vendor.layout.alerts') }} --}}
        <section class="content-main">
            @yield('breadcrumbs')
            @yield('content')
        </section>

        <!-- Footer -->
        {{ view('vendor.layout.footer') }}
        <!-- End Footer -->
    </main>

    <script src="{{ asset('vendor-assets') }}/js/vendors/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('vendor-assets') }}/js/vendors/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('vendor-assets') }}/js/vendors/moment/moment.min.js"></script>
    <script src="{{ asset('vendor-assets') }}/js/vendors/moment/moment-timezone.min.js"></script>
    <script src="{{ asset('vendor-assets') }}/js/vendors/select2.min.js"></script>
    <script src="{{ asset('vendor-assets') }}/js/vendors/perfect-scrollbar.js"></script>
    <script src="{{ asset('vendor-assets') }}/js/vendors/jquery.fullscreen.min.js"></script>
    <script src="{{ asset('vendor-assets') }}/js/vendors/chart.js"></script>
    <script src="{{ asset('vendor-assets') }}/js/main.js?v=1.0.0"></script>
    <script src="{{ asset('vendor-assets') }}/js/custom-chart.js" type="text/javascript"></script>


    <!-- Page JS -->
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
