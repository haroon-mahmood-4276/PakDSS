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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('seller-assets') }}/css/vendors/material-icon-round.css">
    <link rel="stylesheet" href="{{ asset('seller-assets') }}/css/vendors/perfect-scrollbar.css">
    <link rel="stylesheet" href="{{ asset('seller-assets') }}/css/vendors/select2.min.css">
    <link rel="stylesheet" href="{{ asset('seller-assets') }}/css/style.css">
    <title>Ecom - Marketplace Dashboard Template</title>
</head>

<body>
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
                    <div class="d-flex flex-column ps-1">
                        <h5 class="alert-heading mb-2">Email Verification Needed!</h5>
                        <p class="mb-0">Please verify the email or you will not be able to access some pages.</p>
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
    <script src="{{ asset('seller-assets') }}/js/vendors/select2.min.js"></script>
    <script src="{{ asset('seller-assets') }}/js/vendors/perfect-scrollbar.js"></script>
    <script src="{{ asset('seller-assets') }}/js/vendors/jquery.fullscreen.min.js"></script>
    <script src="{{ asset('seller-assets') }}/js/vendors/chart.js"></script>
    <script src="{{ asset('seller-assets') }}/js/main.js?v=1.0.0"></script>
    <script src="{{ asset('seller-assets') }}/js/custom-chart.js" type="text/javascript"></script>
</body>

</html>
