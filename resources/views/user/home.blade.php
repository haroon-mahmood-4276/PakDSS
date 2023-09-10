@extends('user.layout.layout', [''])

@section('seo-breadcrumb')
    {{ Breadcrumbs::view('breadcrumbs::json-ld', 'user.home') }}
@endsection

@section('page-title', env('APP_NAME'))

@section('vendor-css')
@endsection

@section('page-css')
    <style>
        .swiper {
            width: 100%;
            height: 100%;
        }

        .bg-banner {
            height: 450px;
            background-color: #D4F7FF;
            border-radius: 8px;
            padding: 60px 60px 25px 60px;
            background-repeat: no-repeat;
            background-position: right bottom;
            background-size: contain !important;
        }

        .banner-swiper .swiper-pagination {
            text-align: left;
            left: 20px !important;
            bottom: 20px !important;
        }

        .banner-swiper .swiper-pagination .swiper-pagination-bullet {
            width: 10px;
            height: 10px;
            display: inline-block;
            border-radius: 50%;
            background: #FD9636;
            opacity: 0.5;
        }

        .banner-swiper .swiper-pagination .swiper-pagination-bullet-active {
            opacity: 1;
            width: 12px;
            height: 12px;
        }

        .background-image-1 {
            background-image: url("{{ asset('user-assets') }}/imgs/page/homepage1/banner-small-1.png");
            height: 215px;
            background-repeat: no-repeat;
            background-position: right bottom;
            background-size: 60% auto;
            border-radius: 8px;
            background-color: #FFF4F6;
        }

        .background-image-2 {
            background-image: url("{{ asset('user-assets') }}/imgs/page/homepage1/banner-small-2.png");
            height: 215px;
            background-repeat: no-repeat;
            background-position: right bottom;
            background-size: 60% auto;
            border-radius: 8px;
            background-color: #FFF4F6;
        }

        .custom-swiper-button-next,
        .custom-swiper-button-prev {
            border: 2px solid #685dd8;
            border-radius: 10px;
            height: 30px;
            width: 30px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 5px;
        }
    </style>
@endsection

@section('breadcrumbs')

@endsection

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">

        {{-- Banner --}}
        <div class="row mb-4">
            <div class="col-8">
                <div class="swiper banner-swiper">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="bg-banner"
                                style="background-image: url({{ asset('user-assets') }}/imgs/page/homepage1/banner.png)">
                                <span class="font-sm text-uppercase">Hot Right Now</span>
                                <h2 class="mt-10">Sale Up to 50% Off</h2>
                                <h1>Mobile Devices</h1>
                                <div class="row">
                                    <div class="col-lg-5 col-md-7 col-sm-12">
                                        <p class="font-sm color-brand-3">Curabitur id lectus in felis hendrerit efficitur
                                            quis quis lectus. Donec sollicitudin elit eu ipsum maximus blandit. Curabitur
                                            blandit tempus consectetur.</p>
                                    </div>
                                </div>
                                <div class="mt-30">
                                    <a class="btn btn-primary" href="shop-grid.html">Shop now</a>
                                    <a class="btn" href="shop-grid.html">Learn more</a>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="bg-banner"
                                style="background-image: url({{ asset('user-assets') }}/imgs/page/homepage1/banner-hero-2.png)">
                                <span class="font-sm text-uppercase">Hot Right Now</span>
                                <h2 class="mt-10">Sale Up to 50% Off</h2>
                                <h1>Mobile Devices</h1>
                                <div class="row">
                                    <div class="col-lg-5 col-md-7 col-sm-12">
                                        <p class="font-sm color-brand-3">Curabitur id lectus in felis hendrerit efficitur
                                            quis quis lectus. Donec sollicitudin elit eu ipsum maximus blandit. Curabitur
                                            blandit tempus consectetur.</p>
                                    </div>
                                </div>
                                <div class="mt-30">
                                    <a class="btn btn-primary" href="shop-grid.html">Shop now</a>
                                    <a class="btn" href="shop-grid.html">Learn more</a>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="bg-banner"
                                style="background-image: url({{ asset('user-assets') }}/imgs/page/homepage1/banner-hero-3.png)">
                                <span class="font-sm text-uppercase">Hot Right Now</span>
                                <h2 class="mt-10">Sale Up to 50% Off</h2>
                                <h1>Mobile Devices</h1>
                                <div class="row">
                                    <div class="col-lg-5 col-md-7 col-sm-12">
                                        <p class="font-sm color-brand-3">Curabitur id lectus in felis hendrerit efficitur
                                            quis quis lectus. Donec sollicitudin elit eu ipsum maximus blandit. Curabitur
                                            blandit tempus consectetur.</p>
                                    </div>
                                </div>
                                <div class="mt-30">
                                    <a class="btn btn-primary" href="shop-grid.html">Shop now</a>
                                    <a class="btn" href="shop-grid.html">Learn more</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div> --}}
                    <div class="swiper-pagination"></div>
                </div>
            </div>
            <div class="col-4">
                <div class="row gap-3">
                    <div class="col-lg-12 col-md-6 col-sm-12">
                        <div class="background-image-1 p-4">
                            <div class="banner-small banner-small-1 bg-13"><span
                                    class="color-danger text-uppercase font-sm-lh32">10%<span class="color-brand-3">Sale
                                        Off</span></span>
                                <h4 class="mb-10">Apple Watch Serial 7</h4>
                                <p class="color-brand-3 font-desc">Don't miss the last<br class="d-none d-lg-block">
                                    opportunity.</p>
                                <div class="mt-20">
                                    <a class="btn btn-primary btn-arrow-right" href="shop-grid.html">Shop
                                        now</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-12 col-md-6 col-sm-12">
                        <div class="background-image-2 p-4">
                            <div class="banner-small banner-small-1 bg-13"><span
                                    class="color-danger text-uppercase font-sm-lh32">10%<span class="color-brand-3">Sale
                                        Off</span></span>
                                <h4 class="mb-10">Apple Watch Serial 7</h4>
                                <p class="color-brand-3 font-desc">Don't miss the last<br class="d-none d-lg-block">
                                    opportunity.</p>
                                <div class="mt-20">
                                    <a class="btn btn-primary btn-arrow-right" href="shop-grid.html">Shop
                                        now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mb-4">
            <div class="col-lg-12">
                <h3>Featured Categories</h3>
                <p class="font-base">Choose your necessary products from this feature categories.</p>
            </div>
        </div>

        {{-- Categories Swiper --}}
        <div class="row">
            <div class="col-12">
                <div class="d-flex align-items-center border-bottom mb-3">
                    <div class="flex-grow-1">
                        <h1 class="m-0">Men</h1>
                    </div>
                    <div class="men-swiper-navigation-button d-flex gap-1">
                        <div class="men-swiper-button-next btn btn-sm btn-primary">
                            <i class="fa-solid fa-angle-left"></i>
                        </div>
                        <div class="men-swiper-button-prev btn btn-sm btn-primary">
                            <i class="fa-solid fa-angle-right"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="swiper categories-swiper">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="row row-cols-5 g-4">
                                <div class="col">
                                    <div class="card border-1 overflow-hidden h-100 position-relative"
                                        style="border-color: #7367f0">

                                        <div class="top-border"></div>
                                        <div class="bg-label-primary rounded text-center m-2 position-relative">
                                            <div class="d-flex justify-content-between position-absolute w-100">
                                                <span class="badge bg-warning">10%</span>
                                                <span class="badge bg-danger">Hot</span>
                                            </div>
                                            <div class="p-3">
                                                <img class="card-img-top img-fluid"
                                                    src="{{ asset('admin-assets') }}/img/illustrations/girl-with-laptop.png"
                                                    alt="Card girl image" width="140">
                                            </div>
                                        </div>
                                        <div class="card-body p-3">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <a href="#"><small>Dell</small></a>
                                                <div id="rateYo"></div>
                                            </div>
                                            <h5 class="mb-1">Lenovo</h5>

                                            <ul>
                                                <li>asdasdasd</li>
                                                <li>asdasdasd</li>
                                                <li>asdasdasd</li>
                                            </ul>
                                            <a href="javascript:void(0);"
                                                class="btn btn-primary w-100 waves-effect waves-light">Add to cart</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card border-1 overflow-hidden h-100 position-relative"
                                        style="border-color: #7367f0">

                                        <div class="top-border"></div>
                                        <div class="bg-label-primary rounded text-center m-2 position-relative">
                                            <div class="d-flex justify-content-between position-absolute w-100">
                                                <span class="badge bg-warning">10%</span>
                                                <span class="badge bg-danger">Hot</span>
                                            </div>
                                            <div class="p-3">
                                                <img class="card-img-top img-fluid"
                                                    src="{{ asset('admin-assets') }}/img/illustrations/girl-with-laptop.png"
                                                    alt="Card girl image" width="140">
                                            </div>
                                        </div>
                                        <div class="card-body p-3">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <a href="#"><small>Dell</small></a>
                                                <div id="rateYo"></div>
                                            </div>
                                            <h5 class="mb-1">Lenovo</h5>

                                            <ul>
                                                <li>asdasdasd</li>
                                                <li>asdasdasd</li>
                                                <li>asdasdasd</li>
                                            </ul>
                                            <a href="javascript:void(0);"
                                                class="btn btn-primary w-100 waves-effect waves-light">Add to cart</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card border-1 overflow-hidden h-100 position-relative"
                                        style="border-color: #7367f0">

                                        <div class="top-border"></div>
                                        <div class="bg-label-primary rounded text-center m-2 position-relative">
                                            <div class="d-flex justify-content-between position-absolute w-100">
                                                <span class="badge bg-warning">10%</span>
                                                <span class="badge bg-danger">Hot</span>
                                            </div>
                                            <div class="p-3">
                                                <img class="card-img-top img-fluid"
                                                    src="{{ asset('admin-assets') }}/img/illustrations/girl-with-laptop.png"
                                                    alt="Card girl image" width="140">
                                            </div>
                                        </div>
                                        <div class="card-body p-3">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <a href="#"><small>Dell</small></a>
                                                <div id="rateYo"></div>
                                            </div>
                                            <h5 class="mb-1">Lenovo</h5>

                                            <ul>
                                                <li>asdasdasd</li>
                                                <li>asdasdasd</li>
                                                <li>asdasdasd</li>
                                            </ul>
                                            <a href="javascript:void(0);"
                                                class="btn btn-primary w-100 waves-effect waves-light">Add to cart</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card border-1 overflow-hidden h-100 position-relative"
                                        style="border-color: #7367f0">

                                        <div class="top-border"></div>
                                        <div class="bg-label-primary rounded text-center m-2 position-relative">
                                            <div class="d-flex justify-content-between position-absolute w-100">
                                                <span class="badge bg-warning">10%</span>
                                                <span class="badge bg-danger">Hot</span>
                                            </div>
                                            <div class="p-3">
                                                <img class="card-img-top img-fluid"
                                                    src="{{ asset('admin-assets') }}/img/illustrations/girl-with-laptop.png"
                                                    alt="Card girl image" width="140">
                                            </div>
                                        </div>
                                        <div class="card-body p-3">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <a href="#"><small>Dell</small></a>
                                                <div id="rateYo"></div>
                                            </div>
                                            <h5 class="mb-1">Lenovo</h5>

                                            <ul>
                                                <li>asdasdasd</li>
                                                <li>asdasdasd</li>
                                                <li>asdasdasd</li>
                                            </ul>
                                            <a href="javascript:void(0);"
                                                class="btn btn-primary w-100 waves-effect waves-light">Add to cart</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card border-1 overflow-hidden h-100 position-relative"
                                        style="border-color: #7367f0">

                                        <div class="top-border"></div>
                                        <div class="bg-label-primary rounded text-center m-2 position-relative">
                                            <div class="d-flex justify-content-between position-absolute w-100">
                                                <span class="badge bg-warning">10%</span>
                                                <span class="badge bg-danger">Hot</span>
                                            </div>
                                            <div class="p-3">
                                                <img class="card-img-top img-fluid"
                                                    src="{{ asset('admin-assets') }}/img/illustrations/girl-with-laptop.png"
                                                    alt="Card girl image" width="140">
                                            </div>
                                        </div>
                                        <div class="card-body p-3">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <a href="#"><small>Dell</small></a>
                                                <div id="rateYo"></div>
                                            </div>
                                            <h5 class="mb-1">Lenovo</h5>

                                            <ul>
                                                <li>asdasdasd</li>
                                                <li>asdasdasd</li>
                                                <li>asdasdasd</li>
                                            </ul>
                                            <a href="javascript:void(0);"
                                                class="btn btn-primary w-100 waves-effect waves-light">Add to cart</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="row row-cols-5 g-4">
                                <div class="col">
                                    <div class="card border-1 overflow-hidden h-100 position-relative"
                                        style="border-color: #7367f0">

                                        <div class="top-border"></div>
                                        <div class="bg-label-primary rounded text-center m-2 position-relative">
                                            <div class="d-flex justify-content-between position-absolute w-100">
                                                <span class="badge bg-warning">10%</span>
                                                <span class="badge bg-danger">Hot</span>
                                            </div>
                                            <div class="p-3">
                                                <img class="card-img-top img-fluid"
                                                    src="{{ asset('admin-assets') }}/img/illustrations/girl-with-laptop.png"
                                                    alt="Card girl image" width="140">
                                            </div>
                                        </div>
                                        <div class="card-body p-3">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <a href="#"><small>Dell</small></a>
                                                <div id="rateYo"></div>
                                            </div>
                                            <h5 class="mb-1">Lenovo</h5>

                                            <ul>
                                                <li>asdasdasd</li>
                                                <li>asdasdasd</li>
                                                <li>asdasdasd</li>
                                            </ul>
                                            <a href="javascript:void(0);"
                                                class="btn btn-primary w-100 waves-effect waves-light">Add to cart</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card border-1 overflow-hidden h-100 position-relative"
                                        style="border-color: #7367f0">

                                        <div class="top-border"></div>
                                        <div class="bg-label-primary rounded text-center m-2 position-relative">
                                            <div class="d-flex justify-content-between position-absolute w-100">
                                                <span class="badge bg-warning">10%</span>
                                                <span class="badge bg-danger">Hot</span>
                                            </div>
                                            <div class="p-3">
                                                <img class="card-img-top img-fluid"
                                                    src="{{ asset('admin-assets') }}/img/illustrations/girl-with-laptop.png"
                                                    alt="Card girl image" width="140">
                                            </div>
                                        </div>
                                        <div class="card-body p-3">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <a href="#"><small>Dell</small></a>
                                                <div id="rateYo"></div>
                                            </div>
                                            <h5 class="mb-1">Lenovo</h5>

                                            <ul>
                                                <li>asdasdasd</li>
                                                <li>asdasdasd</li>
                                                <li>asdasdasd</li>
                                            </ul>
                                            <a href="javascript:void(0);"
                                                class="btn btn-primary w-100 waves-effect waves-light">Add to cart</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card border-1 overflow-hidden h-100 position-relative"
                                        style="border-color: #7367f0">

                                        <div class="top-border"></div>
                                        <div class="bg-label-primary rounded text-center m-2 position-relative">
                                            <div class="d-flex justify-content-between position-absolute w-100">
                                                <span class="badge bg-warning">10%</span>
                                                <span class="badge bg-danger">Hot</span>
                                            </div>
                                            <div class="p-3">
                                                <img class="card-img-top img-fluid"
                                                    src="{{ asset('admin-assets') }}/img/illustrations/girl-with-laptop.png"
                                                    alt="Card girl image" width="140">
                                            </div>
                                        </div>
                                        <div class="card-body p-3">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <a href="#"><small>Dell</small></a>
                                                <div id="rateYo"></div>
                                            </div>
                                            <h5 class="mb-1">Lenovo</h5>

                                            <ul>
                                                <li>asdasdasd</li>
                                                <li>asdasdasd</li>
                                                <li>asdasdasd</li>
                                            </ul>
                                            <a href="javascript:void(0);"
                                                class="btn btn-primary w-100 waves-effect waves-light">Add to cart</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card border-1 overflow-hidden h-100 position-relative"
                                        style="border-color: #7367f0">

                                        <div class="top-border"></div>
                                        <div class="bg-label-primary rounded text-center m-2 position-relative">
                                            <div class="d-flex justify-content-between position-absolute w-100">
                                                <span class="badge bg-warning">10%</span>
                                                <span class="badge bg-danger">Hot</span>
                                            </div>
                                            <div class="p-3">
                                                <img class="card-img-top img-fluid"
                                                    src="{{ asset('admin-assets') }}/img/illustrations/girl-with-laptop.png"
                                                    alt="Card girl image" width="140">
                                            </div>
                                        </div>
                                        <div class="card-body p-3">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <a href="#"><small>Dell</small></a>
                                                <div id="rateYo"></div>
                                            </div>
                                            <h5 class="mb-1">Lenovo</h5>

                                            <ul>
                                                <li>asdasdasd</li>
                                                <li>asdasdasd</li>
                                                <li>asdasdasd</li>
                                            </ul>
                                            <a href="javascript:void(0);"
                                                class="btn btn-primary w-100 waves-effect waves-light">Add to cart</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card border-1 overflow-hidden h-100 position-relative"
                                        style="border-color: #7367f0">

                                        <div class="top-border"></div>
                                        <div class="bg-label-primary rounded text-center m-2 position-relative">
                                            <div class="d-flex justify-content-between position-absolute w-100">
                                                <span class="badge bg-warning">10%</span>
                                                <span class="badge bg-danger">Hot</span>
                                            </div>
                                            <div class="p-3">
                                                <img class="card-img-top img-fluid"
                                                    src="{{ asset('admin-assets') }}/img/illustrations/girl-with-laptop.png"
                                                    alt="Card girl image" width="140">
                                            </div>
                                        </div>
                                        <div class="card-body p-3">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <a href="#"><small>Dell</small></a>
                                                <div id="rateYo"></div>
                                            </div>
                                            <h5 class="mb-1">Lenovo</h5>

                                            <ul>
                                                <li>asdasdasd</li>
                                                <li>asdasdasd</li>
                                                <li>asdasdasd</li>
                                            </ul>
                                            <a href="javascript:void(0);"
                                                class="btn btn-primary w-100 waves-effect waves-light">Add to cart</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection

    @section('vendor-js')
    @endsection

    @section('page-js')
        {{-- @vite(['resources/js/app.js']) --}}
        <script>
            $(document).ready(function() {
                $("#rateYo").rateYo({
                    starWidth: "15px",
                    // normalFill: "#685dd8"
                    ratedFill: "#7367f0"
                });
            });

            new Swiper(".banner-swiper", {
                spaceBetween: 10,
                autoplay: {
                    delay: 2500,
                    disableOnInteraction: false,
                },
                pagination: {
                    el: ".banner-swiper .swiper-pagination",
                    // dynamicBullets: true,
                    clickable: true,
                },
                navigation: {
                    nextEl: ".banner-swiper .swiper-button-next",
                    prevEl: ".banner-swiper .swiper-button-prev",
                },
            });

            new Swiper(".categories-swiper", {
                spaceBetween: 25,
                autoplay: {
                    delay: 2500,
                    disableOnInteraction: false,
                },
                navigation: {
                    prevEl: ".men-swiper-button-next",
                    nextEl: ".men-swiper-button-prev",
                }
            });
        </script>
    @endsection
