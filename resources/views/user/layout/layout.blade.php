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
    {{-- <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet" /> --}}

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
    <link rel="stylesheet" href="{{ asset('admin-assets') }}/vendor/libs/animate-css/animate.css" />
    <link rel="stylesheet" href="{{ asset('admin-assets') }}/vendor/libs/sweetalert2/sweetalert2.css" />
    <link rel="stylesheet" href="{{ asset('admin-assets') }}/vendor/libs/select2/select2.css" />
    <link rel="stylesheet" href="{{ asset('admin-assets') }}/vendor/libs/toastr/toastr.css" />
    <link rel="stylesheet" href="{{ asset('admin-assets') }}/vendor/libs/flatpickr/flatpickr.css" />
    <link rel="stylesheet" href="{{ asset('admin-assets') }}/vendor/libs/load-awesome/fire.min.css">
    @yield('vendor-css')

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
    @livewireStyles
</head>

<body style="overflow-y: scroll; ">
    <div class="layout-wrapper layout-navbar-full layout-horizontal layout-without-menu">
        <div class="layout-container">

            @include('user.layout.header')

            <div class="layout-page">

                <div class="content-wrapper">

                    {{-- @include('user.layout.topbar') --}}
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
    <script src="{{ asset('admin-assets') }}/vendor/libs/block-ui/block-ui.js"></script>
    <script src="{{ asset('admin-assets') }}/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="{{ asset('admin-assets') }}/vendor/libs/node-waves/node-waves.js"></script>
    <script src="{{ asset('admin-assets') }}/vendor/libs/hammer/hammer.js"></script>
    <script src="{{ asset('admin-assets') }}/vendor/libs/i18n/i18n.js"></script>
    <script src="{{ asset('admin-assets') }}/vendor/libs/typeahead-js/typeahead.js"></script>
    <script src="{{ asset('admin-assets') }}/vendor/js/menu.js"></script>

    <script src="{{ asset('admin-assets') }}/js/main.js"></script>

    <!-- Vendors JS -->
    <script src="{{ asset('admin-assets') }}/vendor/libs/sweetalert2/sweetalert2.js"></script>
    <script src="{{ asset('admin-assets') }}/vendor/libs/select2/select2.js"></script>
    <script src="{{ asset('admin-assets') }}/vendor/libs/toastr/toastr.js"></script>
    <script src="{{ asset('admin-assets') }}/vendor/libs/moment/moment.min.js"></script>
    <script src="{{ asset('admin-assets') }}/vendor/libs/moment/moment-timezone.min.js"></script>
    <script src="{{ asset('admin-assets') }}/vendor/libs/flatpickr/flatpickr.js"></script>
    @yield('vendor-js')

    <script>
        $(document).ready(() => {
            $('#template-customizer').remove();
        });
        moment.tz.setDefault("{{ Config::get('app.timezone') }}");
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
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

        "undefined" != typeof $ && $(function() {
            window.Helpers.initSidebarToggle();
            var t, a, e, s = $(".search-toggler"),
                n = $(".search-input-wrapper"),
                o = $(".search-input"),
                l = $(".content-backdrop");
            s.length && s.on("click", function() {
                n.length && (n.toggleClass("d-none"), o.focus())
            }), $(document).on("keydown", function(e) {
                var t = e.ctrlKey,
                    e = 191 === e.which;
                t && e && n.length && (n.toggleClass("d-none"), o.focus())
            }), setTimeout(function() {
                var e = $(".twitter-typeahead");
                o.on("focus", function() {
                    n.hasClass("container-xxl") ? (n.find(e).addClass("container-xxl"), e
                        .removeClass("container-fluid")) : n.hasClass("container-fluid") && (n
                        .find(e).addClass("container-fluid"), e.removeClass("container-xxl"))
                })
            }, 10), o.length && (t = function(s) {
                return function(t, e) {
                    let a;
                    a = [], s.filter(function(e) {
                        if (e.name.toLowerCase().startsWith(t.toLowerCase())) a.push(e);
                        else {
                            if (e.name.toLowerCase().startsWith(t.toLowerCase()) || !e.name
                                .toLowerCase().includes(t.toLowerCase())) return [];
                            a.push(e), a.sort(function(e, t) {
                                return t.name < e.name ? 1 : -1
                            })
                        }
                    }), e(a)
                }
            }, s = "search-vertical.json", $("#layout-menu").hasClass("menu-horizontal") && (s =
                "search-horizontal.json"), a = $.ajax({
                url: assetsPath + "json/" + s,
                dataType: "json",
                async: !1
            }).responseJSON, o.each(function() {
                var e = $(this);
                o.typeahead({
                    hint: !1,
                    classNames: {
                        menu: "tt-menu navbar-search-suggestion",
                        cursor: "active",
                        suggestion: "suggestion d-flex justify-content-between px-3 py-2 w-100"
                    }
                }, {
                    name: "pages",
                    display: "name",
                    limit: 5,
                    source: t(a.pages),
                    templates: {
                        header: '<h6 class="suggestions-header text-primary mb-0 mx-3 mt-3 pb-2">Pages</h6>',
                        suggestion: function({
                            url: e,
                            icon: t,
                            name: a
                        }) {
                            return '<a href="' + e + '"><div><i class="ti ' + t +
                                ' me-2"></i><span class="align-middle">' + a +
                                "</span></div></a>"
                        },
                        notFound: '<div class="not-found px-3 py-2"><h6 class="suggestions-header text-primary mb-2">Pages</h6><p class="py-2 mb-0"><i class="ti ti-alert-circle ti-xs me-2"></i> No Results Found</p></div>'
                    }
                }, {
                    name: "files",
                    display: "name",
                    limit: 4,
                    source: t(a.files),
                    templates: {
                        header: '<h6 class="suggestions-header text-primary mb-0 mx-3 mt-3 pb-2">Files</h6>',
                        suggestion: function({
                            src: e,
                            name: t,
                            subtitle: a,
                            meta: s
                        }) {
                            return '<a href="javascript:;"><div class="d-flex w-50"><img class="me-3" src="' +
                                assetsPath + e + '" alt="' + t +
                                '" height="32"><div class="w-75"><h6 class="mb-0">' + t +
                                '</h6><small class="text-muted">' + a +
                                '</small></div></div><small class="text-muted">' + s +
                                "</small></a>"
                        },
                        notFound: '<div class="not-found px-3 py-2"><h6 class="suggestions-header text-primary mb-2">Files</h6><p class="py-2 mb-0"><i class="ti ti-alert-circle ti-xs me-2"></i> No Results Found</p></div>'
                    }
                }, {
                    name: "members",
                    display: "name",
                    limit: 4,
                    source: t(a.members),
                    templates: {
                        header: '<h6 class="suggestions-header text-primary mb-0 mx-3 mt-3 pb-2">Members</h6>',
                        suggestion: function({
                            name: e,
                            src: t,
                            subtitle: a
                        }) {
                            return '<a href="app-user-view-account.html"><div class="d-flex align-items-center"><img class="rounded-circle me-3" src="' +
                                assetsPath + t + '" alt="' + e +
                                '" height="32"><div class="user-info"><h6 class="mb-0">' +
                                e + '</h6><small class="text-muted">' + a +
                                "</small></div></div></a>"
                        },
                        notFound: '<div class="not-found px-3 py-2"><h6 class="suggestions-header text-primary mb-2">Members</h6><p class="py-2 mb-0"><i class="ti ti-alert-circle ti-xs me-2"></i> No Results Found</p></div>'
                    }
                }).bind("typeahead:render", function() {
                    l.addClass("show").removeClass("fade")
                }).bind("typeahead:select", function(e, t) {
                    t.url && (window.location = t.url)
                }).bind("typeahead:close", function() {
                    o.val(""), e.typeahead("val", ""), n.addClass("d-none"), l.addClass("fade")
                        .removeClass("show")
                }), o.on("keyup", function() {
                    "" == o.val() && l.addClass("fade").removeClass("show")
                })
            }), $(".navbar-search-suggestion").each(function() {
                e = new PerfectScrollbar($(this)[0], {
                    wheelPropagation: !1,
                    suppressScrollX: !0
                })
            }), o.on("keyup", function() {
                e.update()
            }))
        });
    </script>
    <!-- Page JS -->
    @yield('page-js')
    @livewireScripts
</body>

</html>
