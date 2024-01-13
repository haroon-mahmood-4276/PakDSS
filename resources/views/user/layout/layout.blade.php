<!DOCTYPE html>

<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default"
    data-assets-path="{{ asset('admin-assets') }}/" data-template="horizontal-menu-template">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>@yield('page-title') - {{ env('APP_NAME') }}</title>

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
    <link rel="stylesheet" href="{{ asset('admin-assets') }}/vendor/libs/animate-css/animate.css" />
    <link rel="stylesheet" href="{{ asset('admin-assets') }}/vendor/libs/load-awesome/fire.min.css">
    @yield('vendor-css')

    <!-- Page CSS -->
    <link rel="stylesheet" href="{{ asset('admin-assets') }}/vendor/css/pages/cards-advance.css" />

    <!-- Helpers -->
    <script src="{{ asset('admin-assets') }}/vendor/js/helpers.js"></script>

    <script src="{{ asset('admin-assets') }}/vendor/js/template-customizer.js"></script>
    <script src="{{ asset('admin-assets') }}/js/config.js"></script>
    <style>
        .landing-footer .footer-link {
            transition: all .2s ease-in-out
        }

        .landing-footer .footer-link:hover {
            opacity: .8
        }

        .landing-footer .footer-top {
            background-position: right center;
            background-repeat: no-repeat;
            background-size: cover;
            padding: 3.5rem 0;
            border-top-left-radius: 3.75rem;
            border-top-right-radius: 3.75rem
        }

        @media(max-width: 767.98px) {
            .landing-footer .footer-top {
                padding: 3rem 0
            }
        }

        @media(min-width: 992px) {
            .landing-footer .footer-logo-description {
                max-width: 322px
            }
        }

        .landing-footer .footer-form {
            max-width: 22.25rem
        }

        .landing-footer .footer-form input {
            background-color: #25293c;
            border-color: #434968;
            color: #d3d4dc
        }

        .landing-footer .footer-form input:hover:not([disabled]):not([focus]) {
            border-color: #434968
        }

        .landing-footer .footer-form input::placeholder {
            color: rgba(211, 212, 220, .5)
        }

        .landing-footer .footer-form label {
            color: rgba(211, 212, 220, .5)
        }

        .light-style .landing-footer .footer-link,
        .light-style .landing-footer .footer-text {
            color: #d3d4dc
        }

        .light-style .landing-footer .footer-title {
            color: #fff
        }

        .light-style .landing-footer .footer-top {
            background-image: url("{{ asset('admin-assets') }}/img/front-pages/backgrounds/footer-bg-light.png")
        }

        .light-style .landing-footer .footer-bottom {
            background-color: #282c3e
        }

        .dark-style .landing-footer .footer-link,
        .dark-style .landing-footer .footer-text {
            color: #b6bee3
        }

        .dark-style .landing-footer .footer-title {
            color: #cfd3ec
        }

        .dark-style .landing-footer .footer-top {
            background-image: url("{{ asset('admin-assets') }}/img/front-pages/backgrounds/footer-bg-dark.png")
        }

        .dark-style .landing-footer .footer-bottom {
            background-color: #171925
        }
    </style>
    @yield('page-css')
</head>

<body style="overflow-y: scroll; ">
    <div class="layout-wrapper layout-navbar-full layout-horizontal layout-without-menu">
        <div class="layout-container">

            @include('user.layout.header')

            <div class="layout-page">

                <div class="content-wrapper">

                    @include('user.layout.topbar')
{{--                     
                    <div style="margin-top: 55px">
                        @yield('breadcrumbs')
                    </div> --}}
                    
                    <div style="margin-top: 58px">
                       @yield('content')
                    </div>

                    
                    @include('user.layout.footer')
                    
                    <div class="content-backdrop fade"></div>
                </div>
            </div>
            
        </div>
    </div>
    
    <div id="modalPlace"></div>

    <div class="layout-overlay layout-menu-toggle"></div>

    <div class="drag-target"></div>

    <script src="{{ asset('admin-assets') }}/vendor/libs/jquery/jquery.js"></script>
    <script src="{{ asset('admin-assets') }}/vendor/libs/popper/popper.js"></script>
    <script src="{{ asset('admin-assets') }}/vendor/js/bootstrap.js"></script>
    <script src="{{ asset('admin-assets') }}/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="{{ asset('admin-assets') }}/vendor/libs/node-waves/node-waves.js"></script>
    <script src="{{ asset('admin-assets') }}/vendor/libs/block-ui/block-ui.js"></script>
    <script src="{{ asset('admin-assets') }}/vendor/libs/hammer/hammer.js"></script>
    <script src="{{ asset('admin-assets') }}/vendor/libs/i18n/i18n.js"></script>
    <script src="{{ asset('admin-assets') }}/vendor/libs/typeahead-js/typeahead.js"></script>
    @yield('vendor-js')
    
    <script src="{{ asset('admin-assets') }}/vendor/js/menu.js"></script>

    <!-- Vendors JS -->

    <!-- Main JS -->
    <script src="{{ asset('admin-assets') }}/js/main.js"></script>

    <script>
        $(document).ready(() => {
            $('#template-customizer').remove();
        });

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
    </script>
    <!-- Page JS -->
    @yield('page-js')

</body>

</html>
