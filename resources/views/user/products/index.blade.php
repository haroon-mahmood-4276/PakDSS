@extends('user.layout.layout', [''])

@section('seo-breadcrumb')
    {{ Breadcrumbs::view('breadcrumbs::json-ld', 'user.home') }}
@endsection

@section('page-title', $product->name)

@section('vendor-css')
    <link rel="stylesheet" href="{{ asset('admin-assets') }}/vendor/libs/swiper/swiper.css" />
    <link rel="stylesheet" href="{{ asset('admin-assets') }}/vendor/libs/rateyo/jquery.rateyo.min.css" />
@endsection

@section('page-css')
    <style>
        .swiper {
            width: 100%;
            height: 400px
        }

        .swiper .swiper-slide {
            text-align: center;
            font-size: 1.5rem;
            background-color: #ecebed;
            background-position: center;
            background-size: cover
        }

        #product-swiper {
            height: 500px
        }

        #product-swiper .product-top {
            height: 80%;
            width: 100%
        }

        #product-swiper .product-thumbs {
            height: 20%;
            box-sizing: border-box;
            padding: 10px 0
        }

        #product-swiper .product-thumbs .swiper-slide {
            width: 25%;
            height: 100%;
            opacity: .4;
            cursor: pointer;
        }

        .swiper-slide {
            border-radius: 8px;
        }

        #product-swiper .product-thumbs .swiper-slide-thumb-active {
            opacity: 1;
            cursor: pointer;
            border: 1px solid #7267f096;
        }

        .swiper-slide {
            overflow: hidden;
        }
    </style>
@endsection

@section('breadcrumbs')
    asdasdas
@endsection

@section('content')
    <section class="bg-white">
        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="row">
                {{-- Product Pictures --}}
                <div class="col-5">
                    @if ($product->media->count() > 0)
                        <div id="product-swiper">
                            <div class="swiper product-top">
                                <div class="swiper-wrapper">
                                    @foreach ($product?->media as $image)
                                        <div class="swiper-slide">
                                            <div class="swiper-zoom-container">
                                                <img src="{{ $image->getUrl() }}" alt="{{ $product?->model_no }}">
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="swiper product-thumbs">
                                <div class="swiper-wrapper">
                                    @foreach ($product?->media as $image)
                                        <div class="swiper-slide"
                                            style="background-repeat: no-repeat; background-image:url({{ $image->getUrl() }})">
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @else
                        <img class="card-img-top img-fluid" src="{{ getDoNotDeleteImage() }}"
                            alt="{{ $product?->model_no }}" width="140" />
                    @endif
                </div>

                {{-- Product Details --}}
                <div class="col-7">
                    <form action="{{ route('user.cart.store') }}" id="form-product-order-data" method="POST">
                        @csrf

                        <input type="hidden" name="referance" value="{{ $product->id }}">

                        <div class="product-heading">
                            <h2 class="m-0 p-0">{{ $product->name }}</h2>
                        </div>
                        <div class="product-stats border-bottom pb-2 mb-3">
                            <div class="row">
                                {{-- Product Branding & Rating --}}
                                <div class="col-6">
                                    <div class="d-flex flex-column gap-2">
                                        <div class="product-brand">
                                            <small class="ms-1 text-primary">by {{ $product->seller->name }}</small>
                                        </div>
                                        {{-- <div class="product-rating" style="z-index: 1;">
                                            <div class="d-flex gap-1">
                                                <div id="product-rating" class="p-0"></div>
                                                <span class="font-xs font-medium"> (65 reviews)</span>
                                            </div>
                                        </div> --}}
                                    </div>
                                </div>

                                {{-- Product Wishlist --}}
                                {{-- <div class="col-6">
                                    <div class="d-flex align-items-end h-100 justify-content-end gap-3">
                                        <a href="#" class="btn btn-icon btn-primary waves-effect"
                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                            data-bs-original-title="Add to wishlist">
                                            <span class="fa-regular fa-heart"></span>
                                        </a>
                                        <a href="#" class="btn btn-icon btn-primary waves-effect"
                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                            data-bs-original-title="Compare with another product">
                                            <span class="fa-solid fa-code-compare"></span>
                                        </a>
                                    </div>
                                </div> --}}
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="{{ $product->call_for_final_rates ? 'col-6' : 'col-12' }}">
                                <h3 class="m-0">
                                    {{ currencyParser($product->discounted_price > 0 ? $product->discounted_price : $product->price, symbol: 'Rs.') }}
                                    @if ($product->discounted_price > 0)
                                        <small
                                            class="text-body-secondary"><s>{{ currencyParser($product->price, symbol: 'Rs.') }}</s>&nbsp;&nbsp;&nbsp;<span
                                                class="badge text-bg-primary">{{ calculateDiscountPercentage($product->price, $product->discounted_price) }}%</span></small>
                                    @endif
                                </h3>
                            </div>
                            @if ($product->call_for_final_rates)
                                <div class="col-6">
                                    <div class="alert alert-warning d-flex align-items-center gap-2 m-0" role="alert">
                                        <span class="alert-icon rounded">
                                            <i class="ti ti-exclamation-mark"></i>
                                        </span>
                                        Call for final rates!.
                                    </div>
                                </div>
                            @endif
                        </div>
                        <div class="product-short-description mb-3" style="min-height: 130px ">
                            {!! decodeHtmlEntities($product->short_description) !!}
                        </div>
                        {{-- <div class="product-color mt-20">
                            <p class="font-sm color-gray-900">Color:<span class="color-brand-2 nameColor">Pink Gold</span>
                            </p>
                            <ul class="list-colors">
                                <li class="disabled"><img src="assets/imgs/page/product/img-gallery-1.jpg" alt="Ecom"
                                        title="Pink"></li>
                                <li><img src="assets/imgs/page/product/img-gallery-2.jpg" alt="Ecom" title="Gold">
                                </li>
                                <li><img src="assets/imgs/page/product/img-gallery-3.jpg" alt="Ecom" title="Pink Gold">
                                </li>
                                <li><img src="assets/imgs/page/product/img-gallery-4.jpg" alt="Ecom" title="Silver">
                                </li>
                                <li class="active"><img src="assets/imgs/page/product/img-gallery-5.jpg" alt="Ecom"
                                        title="Pink Gold"></li>
                                <li class="disabled"><img src="assets/imgs/page/product/img-gallery-6.jpg" alt="Ecom"
                                        title="Black"></li>
                                <li class="disabled"><img src="assets/imgs/page/product/img-gallery-7.jpg" alt="Ecom"
                                        title="Red"></li>
                            </ul>
                        </div> --}}
                        <div class="product-buy mb-3">
                            <div class="row">
                                <div class="col-3">
                                    <div class="input-group product-quantity">
                                        <button class="btn btn-outline-primary waves-effect" id="product-quantity-decrease"
                                            type="button">
                                            <i class="fa-solid fa-minus"></i>
                                        </button>
                                        <input type="number" class="form-control text-center border-primary"
                                            placeholder="Quantity" name="product_quantity" id="product-quantity-value"
                                            value="1" min="1" max="10">
                                        <button class="btn btn-outline-primary waves-effect" id="product-quantity-increase"
                                            type="button">
                                            <i class="fa-solid fa-plus"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="col-8">
                                    <div class="d-flex justify-content-end align-items-center gap-3">
                                        <button type="submit" class="btn btn-primary waves-effect waves-light">
                                            Add to cart
                                        </button>
                                        {{-- <button class="btn btn-primary waves-effect waves-light">
                                                <i class="fa-solid fa-cart-arrow-down me-1"></i>
                                                Buy now
                                            </button> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="info-product mb-3">
                            <div class="row">
                                <div class="col-lg-5 col-md-5">
                                    <span class="font-sm font-medium color-gray-900">
                                        <strong class="text-primary">Brand:</strong>
                                        <a
                                            href="{{ route('user.brands.index', ['brand' => $product->brand->slug]) }}">{{ $product->brand->name }}</a>
                                        <br>
                                        <strong class="text-primary">SKU:</strong>
                                        <span class="">{{ $product->model_no }}</span>
                                        <br>
                                        <strong class="text-primary">Tags:</strong>
                                        <span
                                            class="">{{ implode(', ', $product->tags?->pluck('name')->all() ?? []) }}</span>
                                    </span>
                                </div>
                                <div class="col-lg-4 col-md-4">
                                    <span class="font-sm font-medium">Free Delivery <br>
                                        <span class="">Available for all locations.</span> <br>
                                        <span class="">Delivery Options &amp; Info</span>
                                    </span>
                                </div>
                                {{-- <div class="col-lg-3 col-md-3">
                                    <div class="d-flex justify-content-end align-items-center h-100">
                                        <div class="icons d-flex justify-content-around w-50">
                                            <a class="icon-facebook fs-3" href="#" data-bs-toggle="tooltip"
                                                data-bs-placement="top" data-bs-title="Share on facebook"><i
                                                    class="fa-brands fa-square-facebook"></i></a>
                                            <a class="icon-twitter fs-3" href="#" data-bs-toggle="tooltip"
                                                data-bs-placement="top" data-bs-title="Share on twitter"><i
                                                    class="fa-brands fa-square-x-twitter"></i></a>
                                            <a class="icon-instagram fs-3" href="#" data-bs-toggle="tooltip"
                                                data-bs-placement="top" data-bs-title="Share on instagram"><i
                                                    class="fa-brands fa-square-instagram"></i></a>
                                        </div>
                                    </div>
                                </div> --}}
                            </div>
                        </div>
                    </form>
                </div>

                {{-- Product Details --}}
                {{-- <div class="col-2">
                    <div class="border rounded h-100 w-100">
                        asd
                    </div>
                </div> --}}
            </div>
        </div>

        {{-- Product Descriptions, Additional Informations & Reviews --}}
        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="row mb-4">
                <div class="col-xl-12">
                    <div class="nav-align-top mb-4">
                        <ul class="nav nav-pills nav-fill gap-3 mb-3">
                            <li class="nav-item border rounded-3">
                                <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab"
                                    data-bs-target="#navs-description" aria-controls="navs-description"
                                    aria-selected="false" tabindex="-1"><i class="fa-solid fa-file-pen me-1"></i>
                                    Description</button>
                            </li>
                            {{-- <li class="nav-item border rounded-3">
                                <button type="button" class="nav-link" role="tab" data-bs-toggle="tab"
                                    data-bs-target="#navs-reviews" aria-controls="navs-reviews" aria-selected="false"
                                    tabindex="-1"><i class="fa-regular fa-comments me-1"></i> Reviews (65)</button>
                            </li>
                            <li class="nav-item border rounded-3">
                                <button type="button" class="nav-link" role="tab" data-bs-toggle="tab"
                                    data-bs-target="#navs-questions-answers" aria-controls="navs-questions-answers"
                                    aria-selected="false" tabindex="-1"><i
                                        class="fa-regular fa-circle-question me-1"></i> Q&A (65)</button>
                            </li> --}}
                        </ul>
                        <div class="tab-content shadow-none ">
                            <div class="tab-pane fade active show" id="navs-description" role="tabpanel">
                                {!! decodeHtmlEntities($product->long_description) !!}
                            </div>
                            {{-- <div class="tab-pane fade" id="navs-reviews" role="tabpanel">
                                <p>
                                    Oat cake chupa chups dragée donut toffee. Sweet cotton candy jelly beans macaroon
                                    gummies cupcake gummi
                                    bears
                                    cake chocolate.
                                </p>
                                <p class="mb-0">
                                    Cake chocolate bar cotton candy apple pie tootsie roll ice cream apple pie brownie cake.
                                    Sweet roll icing
                                    sesame snaps caramels danish toffee. Brownie biscuit dessert dessert. Pudding jelly
                                    jelly-o tart brownie
                                    jelly.
                                </p>
                            </div>
                            <div class="tab-pane fade" id="navs-questions-answers" role="tabpanel">
                                <p>
                                    Oat cake chupa chups dragée donut toffee. Sweet cotton candy jelly beans macaroon
                                    gummies cupcake gummi
                                    bears
                                    cake chocolate.
                                </p>
                                <p class="mb-0">
                                    Cake chocolate bar cotton candy apple pie tootsie roll ice cream apple pie brownie cake.
                                    Sweet roll icing
                                    sesame snaps caramels danish toffee. Brownie biscuit dessert dessert. Pudding jelly
                                    jelly-o tart brownie
                                    jelly.
                                </p>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
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
            $("#product-rating").rateYo({
                rating: 4,
                maxValue: 5,
                readOnly: true,
                starWidth: "19px",
                numStars: 5,
                ratedFill: "#ff9f43",
                "starSvg": '<svg clip-rule="evenodd" fill-rule="evenodd" stroke-linejoin="round" stroke-miterlimit="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="m11.322 2.923c.126-.259.39-.423.678-.423.289 0 .552.164.678.423.974 1.998 2.65 5.44 2.65 5.44s3.811.524 6.022.829c.403.055.65.396.65.747 0 .19-.072.383-.231.536-1.61 1.538-4.382 4.191-4.382 4.191s.677 3.767 1.069 5.952c.083.462-.275.882-.742.882-.122 0-.244-.029-.355-.089-1.968-1.048-5.359-2.851-5.359-2.851s-3.391 1.803-5.359 2.851c-.111.06-.234.089-.356.089-.465 0-.825-.421-.741-.882.393-2.185 1.07-5.952 1.07-5.952s-2.773-2.653-4.382-4.191c-.16-.153-.232-.346-.232-.535 0-.352.249-.694.651-.748 2.211-.305 6.021-.829 6.021-.829s1.677-3.442 2.65-5.44z" fill-rule="nonzero"/></svg> '
            });

            $('#product-quantity-increase').on('click', function() {
                $('#product-quantity-value').val(parseInt($('#product-quantity-value').val()) + 1);
            });

            $('#product-quantity-decrease').on('click', function() {
                $('#product-quantity-value').val((parseInt($('#product-quantity-value').val()) - 1) <= 0 ?
                    0 : parseInt($('#product-quantity-value').val()) - 1);
            });

            $('#product-quantity-value').on('change', function() {
                if ($('#product-quantity-value').val().length < 1) {
                    $('#product-quantity-value').val(0);
                } else if (parseInt($('#product-quantity-value').val()) <= 0) {
                    $('#product-quantity-value').val(1);
                } else if (parseInt($('#product-quantity-value').val()) >= 10) {
                    $('#product-quantity-value').val(10);
                } else {
                    $('#product-quantity-value').val(parseInt($('#product-quantity-value').val()));
                }
            });
        });
        var product_top = new Swiper(".product-top", {
            spaceBetween: 10,
            zoom: true,
            loop: true,
            thumbs: {
                swiper: new Swiper(".product-thumbs", {
                    spaceBetween: 10,
                    slidesPerView: 4,
                })
            }
        })
    </script>
@endsection
