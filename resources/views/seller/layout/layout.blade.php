<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta property="og:title" content="">
    <meta property="og:type" content="">
    <meta property="og:url" content="">
    <meta property="og:image" content="">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('seller-assets') }}/imgs/theme/favicon.svg">
    <link rel="stylesheet" href="{{ asset('seller-assets') }}/css/vendors/normalize.css">
    <link rel="stylesheet" href="{{ asset('seller-assets') }}/css/vendors/bootstrap.css">
    <link rel="stylesheet" href="{{ asset('seller-assets') }}/css/vendors/material-icon-round.css">
    <link rel="stylesheet" href="{{ asset('seller-assets') }}/css/vendors/perfect-scrollbar.css">
    <link rel="stylesheet" href="{{ asset('seller-assets') }}/vendors/select2/select2.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('seller-assets') }}/css/style.min.css">
    <title>@yield('page-title') - {{ env('APP_NAME') }}</title>

    @yield('page-css')

    @yield('custom-css')

</head>

<body style="overflow-y: scroll">
    <div class="screen-overlay"></div>

    {{ view('seller.layout.leftbar') }}

    <main class="main-wrap">

        {{ view('seller.layout.topbar') }}

        <section class="content-main">
            @if (isset($verifyEmail) && !$verifyEmail)
                <div class="alert alert-warning d-flex align-items-baseline show fade" role="alert">
                    <span class="alert-icon alert-icon-lg text-warning me-2">
                        <i class="material-icons md-48 md-warning"></i>
                    </span>
                    <div class="d-flex flex-column ps-1 flex-grow-1">
                        <h5 class="alert-heading mb-2">Email Verification Needed!</h5>
                        <p class="mb-0">Please verify the email which is sent on your given email address or you will
                            not be able to access some pages.</p>
                    </div>
                    <div class="d-flex ">
                        <form action="{{ route('seller.verification.send') }}" method="post">
                            <button class="btn btn-warning-light" type="submit">Resend Email</button>
                            @csrf
                        </form>
                    </div>
                </div>
            @endif

            {{ view('seller.layout.alerts') }}

            @yield('breadcrumbs')

            @yield('content')
        </section>

        {{ view('seller.layout.footer') }}
    </main>
    <script src="{{ asset('seller-assets') }}/js/vendors/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('seller-assets') }}/js/vendors/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('seller-assets') }}/vendors/select2/select2.min.js"></script>
    <script src="{{ asset('seller-assets') }}/js/vendors/perfect-scrollbar.js"></script>
    <script src="{{ asset('seller-assets') }}/js/vendors/jquery.fullscreen.min.js"></script>
    <script src="{{ asset('seller-assets') }}/js/vendors/chart.js"></script>
    <script src="{{ asset('seller-assets') }}/js/main.js?v=1.0.0"></script>
    <script src="{{ asset('seller-assets') }}/js/custom-chart.js" type="text/javascript"></script>
    <script src="{{ asset('seller-assets') }}/vendors/sweet-alerts/sweetalert2@11.min.js" type="text/javascript"></script>
    <script>
        $(document).ready(function() {
            $(".select2-size-lg").each(function() {
                var e = $(this);
                e.wrap('<div class="position-relative"></div>');
                e.select2({
                    dropdownAutoWidth: !0,
                    width: "100%",
                    containerCssClass: "select-lg",
                    templateResult: c,
                    templateSelection: c,
                    escapeMarkup: function(e) {
                        return e
                    }
                });
            });

            $(".select2-size-lg-multiple").each(function() {
                var e = $(this);
                e.wrap('<div class="position-relative"></div>');
                e.select2({
                    dropdownAutoWidth: !0,
                    width: "100%",
                    containerCssClass: "select-lg",
                    escapeMarkup: function(e) {
                        return e
                    }
                });
            });

            $('.class-datatable-for-event').on('draw.dt', function() {
                setTimeout(function() {
                    changeAllTableRowColor();
                }, 0);
            });
        });

        function showBlockUI(element = null) {
            const blockUIOptions = {
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
            if ($(element).is(':checked')) {
                $(element).closest('tr').addClass('table-danger');
            } else {
                $(element).closest('tr').removeClass('table-danger');
            }

            let count = $('.dt-checkboxes:checked').length;
            if (count > 0) {
                $('#delete_selected_count').show().html("(" + count + ")");
            } else {
                $('#delete_selected_count').hide().html(0);
            }
        }

        function c(e) {
            return e.id ? "<i class='" + $(e.element).data("icon") + " me-2'></i>" + e.text : e.text
        }

        function changeAllTableRowColor() {
            $('.dt-checkboxes').trigger('change');
        }
    </script>

    @yield('page-js')

    @yield('custom-js')
</body>

</html>
