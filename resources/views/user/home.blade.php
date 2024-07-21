@extends('user.layout.layout', [''])

@section('seo-breadcrumb')
    {{ Breadcrumbs::view('breadcrumbs::json-ld', 'user.home') }}
@endsection

@section('page-title',
    "Pakistan's best online shopping store with 15+ million products at resounding discounts in
    Karachi | Lahore | Islamabad | All across Pakistan with cash on delivery (COD). Pick your favorite Mobiles, Appliances,
    Apparels, and Fashion accessories on amazing deals exclusively available at Pakdss.com")

@section('vendor-css')
    <link rel="stylesheet" href="{{ asset('admin-assets') }}/vendor/libs/swiper/swiper.css" />
    <link rel="stylesheet" href="{{ asset('admin-assets') }}/vendor/libs/rateyo/jquery.rateyo.min.css" />
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
    </style>
@endsection

@section('breadcrumbs')

@endsection

@section('content')
    <section class="bg-white">
        <div class="container-xxl flex-grow-1 container-p-y">
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
                                            <p class="font-sm color-brand-3">Curabitur id lectus in felis hendrerit
                                                efficitur
                                                quis quis lectus. Donec sollicitudin elit eu ipsum maximus blandit.
                                                Curabitur
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
                                            <p class="font-sm color-brand-3">Curabitur id lectus in felis hendrerit
                                                efficitur
                                                quis quis lectus. Donec sollicitudin elit eu ipsum maximus blandit.
                                                Curabitur
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
                                            <p class="font-sm color-brand-3">Curabitur id lectus in felis hendrerit
                                                efficitur
                                                quis quis lectus. Donec sollicitudin elit eu ipsum maximus blandit.
                                                Curabitur
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
        </div>
    </section>

    <section class="bg-white">
        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Featured Categories</h2>
                    <p class="font-base">Choose your necessary products from this feature categories.</p>
                </div>
            </div>
        </div>
    </section>

    {{-- Categories Swiper --}}
    <section class="bg-white pb-4">
        <div class="container-xxl flex-grow-1">
            @foreach ($categories_products as $catrgory_name => $product_chunks)
                <div class="row">
                    <div class="col-12">
                        <div class="d-flex align-items-center mb-3">
                            <div class="flex-grow-1">
                                <div class="d-flex align-items-center">
                                    <h1 class="m-0">{{ Str::of($catrgory_name)->title() }}</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="position-relative">
                            <button
                                class="position-absolute top-50 start-0 translate-middle parent-swiper-button-next btn btn-sm bg-white shadow-none border rounded-pill"
                                style="z-index: 10; height: 70px; translate: 5px;">
                                <i class="fa-solid fa-angle-left"></i>
                            </button>
                            <button
                                class="position-absolute top-50 start-100 translate-middle parent-swiper-button-prev btn btn-sm bg-white shadow-none border rounded-pill"
                                style="z-index: 10; height: 70px; translate: -5px;">
                                <i class="fa-solid fa-angle-right"></i>
                            </button>
                            <div class="swiper parent-categories-swiper">
                                <div class="swiper-wrapper">
                                    @foreach ($product_chunks as $chunk)
                                        <div class="swiper-slide">
                                            <div class="row row-cols-6 g-2">
                                                @foreach ($chunk as $product)
                                                    {{-- Product --}}
                                                    <div class="col p-2 m-0">
                                                        <a
                                                            href="{{ route('user.products.index', ['product' => $product->permalink]) }}">
                                                            <div class="card shadow-none border h-100"
                                                                style="border-radius: 15px">
                                                                <div class="text-center position-relative"
                                                                    style="border-radius: 15px">
                                                                    <div class="p-1">
                                                                        @if ($product?->media->count())
                                                                            <div class="swiper productImageSwipper">
                                                                                <div class="swiper-wrapper">
                                                                                    @foreach ($product?->media as $image)
                                                                                        <div class="swiper-slide">
                                                                                            <img class="card-img-top img-fluid"
                                                                                                src="{{ $image->getUrl() }}"
                                                                                                alt="{{ $product?->model_no }}"
                                                                                                width="140" />
                                                                                        </div>
                                                                                    @endforeach
                                                                                </div>
                                                                                <div class="swiper-pagination"></div>
                                                                            </div>
                                                                        @else
                                                                            <img class="card-img-top img-fluid"
                                                                                src="{{ getDoNotDeleteImage() }}"
                                                                                alt="{{ $product?->model_no }}"
                                                                                width="140" />
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                                <div class="card-body p-3 d-flex flex-column">
                                                                    <div
                                                                        class="d-flex justify-content-between align-items-center">
                                                                        <p class="m-0 p-0">
                                                                            <small>{{ $product->brand->name }}</small>
                                                                        </p>
                                                                        <div id="rateYo" class="rateYo"></div>
                                                                    </div>
                                                                    <p class="mb-1 text-dark fw-bolder">
                                                                        <a<strong>{{ $product->name }}</strong>
                                                                    </p>
                                                                    <div
                                                                        class="d-flex justify-content-between align-items-center flex-col mb-2">
                                                                        <p class="m-0 p-0 text-dark">
                                                                            <span
                                                                                class="fw-bolder">{{ currencyParser($product->discounted_price > 0 ? $product->discounted_price : $product->price, symbol: 'Rs.') }}</span>
                                                                            @if ($product->discounted_price > 0)
                                                                                <small
                                                                                    class="text-body-secondary"><s>{{ currencyParser($product->price, symbol: 'Rs.') }}</s></small>
                                                                            @endif
                                                                        </p>
                                                                        <p class="m-0 p-0 text-dark">
                                                                            @if ($product->discounted_price > 0)
                                                                                <span
                                                                                    class="badge text-bg-primary">{{ calculateDiscountPercentage($product->price, $product->discounted_price) }}%</span>
                                                                            @endif
                                                                        </p>
                                                                    </div>
                                                                    <p class="m-0 p-0"><span class="text-dark">By</span> {{ $product->seller->name }}</p>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                @if ($loop->index == 1)
                    <div class="row mb-5">
                        <div class="col-3">
                            <div class="card shadow-none border">
                                <div class="card-body">
                                    <div class="d-flex justify-content-start">
                                        <img class="img-fluid m-2"
                                            src="http://localhost:8000/user-assets/imgs/template/delivery.svg"
                                            alt="Ecom">
                                        <div class="flex-grow-1 m-2">
                                            <h5 class="m-0">Free Delivery</h5>
                                            <p class="m-0">From all orders over $10</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="card shadow-none border">
                                <div class="card-body">
                                    <div class="d-flex justify-content-start">
                                        <img class="img-fluid m-2"
                                            src="http://localhost:8000/user-assets/imgs/template/support.svg"
                                            alt="Ecom">
                                        <div class="flex-grow-1 m-2">
                                            <h5 class="m-0">Support 24/7</h5>
                                            <p class="m-0">Shop with an expert</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="card shadow-none border">
                                <div class="card-body">
                                    <div class="d-flex justify-content-start">
                                        <img class="img-fluid m-2"
                                            src="http://localhost:8000/user-assets/imgs/template/voucher.svg"
                                            alt="Ecom">
                                        <div class="flex-grow-1 m-2">
                                            <h5 class="m-0">Gift voucher</h5>
                                            <p class="m-0">Refer a friend</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="card shadow-none border">
                                <div class="card-body">
                                    <div class="d-flex justify-content-start">
                                        <img class="img-fluid m-2"
                                            src="http://localhost:8000/user-assets/imgs/template/return.svg"
                                            alt="Ecom">
                                        <div class="flex-grow-1 m-2">
                                            <h5 class="m-0">Return &amp; Refund</h5>
                                            <p class="m-0">Free return over $200</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="card shadow-none border">
                                <div class="card-body">
                                    <div class="d-flex justify-content-start">
                                        <img class="img-fluid m-2"
                                            src="http://localhost:8000/user-assets/imgs/template/secure.svg"
                                            alt="Ecom">
                                        <div class="flex-grow-1 m-2">
                                            <h5 class="m-0">Secure payment</h5>
                                            <p class="m-0">100% Protected</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </section>
@endsection

@section('vendor-js')
    <script src="{{ asset('admin-assets') }}/vendor/libs/swiper/swiper.js"></script>
    <script src="{{ asset('admin-assets') }}/vendor/libs/rateyo/jquery.rateyo.min.js"></script>
@endsection

@section('page-js')
    {{-- @vite(['resources/js/app.js']) --}}
    <script>
        $(document).ready(function() {
            $(".rateYo").rateYo({
                starWidth: "15px",
                // normalFill: "#685dd8"
                ratedFill: "#7367f0",
                starSvg: "<i class='fa-solid fa-star'></i>"
            });


            new Swiper(".banner-swiper", {
                spaceBetween: 10,
                autoplay: {
                    delay: 150000,
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

            new Swiper(".productImageSwipper", {
                spaceBetween: 10,
                pagination: {
                    el: ".productImageSwipper .swiper-pagination",
                    // dynamicBullets: true,
                    clickable: true,
                },
            });

            new Swiper(".parent-categories-swiper", {
                spaceBetween: 7,
                autoplay: {
                    delay: 25000,
                    disableOnInteraction: false,
                },
                navigation: {
                    prevEl: ".parent-swiper-button-next",
                    nextEl: ".parent-swiper-button-prev",
                }
            });
        });
    </script>
@endsection
