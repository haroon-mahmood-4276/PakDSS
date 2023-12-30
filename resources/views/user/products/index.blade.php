@extends('user.layout.layout', [''])

@section('seo-breadcrumb')
    {{ Breadcrumbs::view('breadcrumbs::json-ld', 'user.home') }}
@endsection

@section('page-title', env('APP_NAME'))

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
            opacity: 1
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
                {{-- Product Puct --}}
                <div class="col-5">
                    <div id="product-swiper">
                        <div class="swiper product-top">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <div class="swiper-zoom-container">
                                        <img src="{{ asset('admin-assets') }}/img/backgrounds/2.jpg" alt="">
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="swiper-zoom-container">
                                        <img src="{{ asset('admin-assets') }}/img/backgrounds/1.jpg" alt="">
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="swiper-zoom-container">
                                        <img src="{{ asset('admin-assets') }}/img/backgrounds/3.jpg" alt="">
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="swiper-zoom-container">
                                        <img src="{{ asset('admin-assets') }}/img/backgrounds/4.jpg" alt="">
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="swiper-zoom-container">
                                        <img src="{{ asset('admin-assets') }}/img/backgrounds/6.jpg" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper product-thumbs">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide"
                                    style="background-image:url({{ asset('admin-assets') }}/img/backgrounds/2.jpg)"></div>
                                <div class="swiper-slide"
                                    style="background-image:url({{ asset('admin-assets') }}/img/backgrounds/1.jpg)"></div>
                                <div class="swiper-slide"
                                    style="background-image:url({{ asset('admin-assets') }}/img/backgrounds/3.jpg)"></div>
                                <div class="swiper-slide"
                                    style="background-image:url({{ asset('admin-assets') }}/img/backgrounds/4.jpg)"></div>
                                <div class="swiper-slide"
                                    style="background-image:url({{ asset('admin-assets') }}/img/backgrounds/6.jpg)"></div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Product Details --}}
                <div class="col-7">
                    <div class="product-header">
                        <div class="product-heading">
                            <h2>Samsung Galaxy S22 Ultra, 8K Camera & Video, Brightest Display Screen, S Pen Pro</h2>
                        </div>
                        <div class="product-stats border-bottom pb-2 mb-3">
                            <div class="row">
                                {{-- Product Branding & Rating --}}
                                <div class="col-6">
                                    <div class="d-flex flex-column gap-2">
                                        <div class="product-brand">
                                            <small class="ms-1">by <a href="#">Dell</a></small>
                                        </div>
                                        <div class="product-rating" style="z-index: 1;">
                                            <div class="d-flex gap-1">
                                                <div id="product-rating" class="p-0"></div>
                                                <span class="font-xs color-gray-500 font-medium"> (65 reviews)</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{-- Product Wishlist --}}
                                <div class="col-6">
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
                                </div>
                            </div>
                        </div>
                        <div class="product-price mb-3">
                            <h3>$2856.3 <small class="text-body-secondary"><s>$3225.6</s></small></h3>
                        </div>
                        <div class="product-short-description mb-3">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <ul class="list-dot">
                                        <li>8k super steady video</li>
                                        <li>Nightography plus portait mode</li>
                                        <li>50mp photo resolution plus bright display</li>
                                    </ul>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <ul class="list-dot">
                                        <li>Adaptive color contrast</li>
                                        <li>premium design &amp; craftmanship</li>
                                        <li>Long lasting battery plus fast charging</li>
                                    </ul>
                                </div>
                            </div>
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
                                <div class="col-4">
                                    <div class="input-group product-quantity">
                                        <button class="btn btn-outline-primary waves-effect" type="button">
                                            <i class="fa-solid fa-plus"></i>
                                        </button>
                                        <input type="text" class="form-control border-primary" placeholder="Quantity">
                                        <button class="btn btn-outline-primary waves-effect" type="button">
                                            <i class="fa-solid fa-minus"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="col-8">
                                    <div class="d-flex justify-content-end align-items-center gap-3">
                                        <button class="btn btn-primary waves-effect waves-light">
                                            <span class="fa-solid fa-cart-plus me-1"></span>
                                            Add new cart
                                        </button>
                                        <button class="btn btn-primary waves-effect waves-light">
                                            <i class="fa-solid fa-cart-arrow-down me-1"></i>
                                            Buy now
                                        </button>
                                    </div>
                                </div>
                            </div>

                            {{-- <div class="box-quantity">
                                <div class="input-quantity">
                                    <input class="font-xl color-brand-3" type="text" value="1"><span
                                        class="minus-cart"></span><span class="plus-cart"></span>
                                </div>
                                <div class="button-buy"><a class="btn btn-cart" href="shop-cart.html">Add to cart</a><a
                                        class="btn btn-buy" href="shop-checkout.html">Buy now</a></div>
                            </div> --}}
                        </div>
                        <div class="info-product mb-3">
                            <div class="row">
                                <div class="col-lg-5 col-md-5">
                                    <span class="font-sm font-medium color-gray-900">
                                        <strong class="text-primary">SKU:</strong> <span
                                            class="color-gray-500">iphone12pro128</span> <br>
                                        <strong class="text-primary">Category:</strong> <span
                                            class="color-gray-500">Smartphones</span> <br>
                                        <strong class="text-primary">Tags:</strong> <span class="color-gray-500">Blue,
                                            Smartphone</span>
                                    </span>
                                </div>
                                <div class="col-lg-4 col-md-4">
                                    <span class="font-sm font-medium color-gray-900">Free Delivery <br>
                                        <span class="color-gray-500">Available for all locations.</span> <br>
                                        <span class="color-gray-500">Delivery Options &amp; Info</span>
                                    </span>
                                </div>
                                <div class="col-lg-3 col-md-3">
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
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Product Descriptions, Additional Informations & Reviews --}}
        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="row mb-4">
                <div class="col-xl-12">
                    <div class="nav-align-top mb-4">
                        <ul class="nav nav-pills mb-3" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab"
                                    data-bs-target="#navs-description" aria-controls="navs-description"
                                    aria-selected="false" tabindex="-1"><i class="fa-solid fa-file-pen me-1"></i>
                                    Description</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button type="button" class="nav-link" role="tab" data-bs-toggle="tab"
                                    data-bs-target="#navs-specifications" aria-controls="navs-specifications"
                                    aria-selected="true"><i class="fa-solid fa-circle-info me-1"></i>
                                    Specifications</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button type="button" class="nav-link" role="tab" data-bs-toggle="tab"
                                    data-bs-target="#navs-additional-information"
                                    aria-controls="navs-additional-information" aria-selected="false" tabindex="-1"><i
                                        class="fa-solid fa-circle-info me-1"></i> Additional Information</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button type="button" class="nav-link" role="tab" data-bs-toggle="tab"
                                    data-bs-target="#navs-reviews" aria-controls="navs-reviews" aria-selected="false"
                                    tabindex="-1"><i class="fa-regular fa-comments me-1"></i></i> Reviews (65)</button>
                            </li>
                        </ul>
                        <div class="tab-content shadow-none ">
                            <div class="tab-pane fade active show" id="navs-description" role="tabpanel">
                                <p>
                                    Icing pastry pudding oat cake. Lemon drops cotton candy caramels cake caramels sesame
                                    snaps powder. Bear
                                    claw
                                    candy topping.
                                </p>
                                <p class="mb-0">
                                    Tootsie roll fruitcake cookie. Dessert topping pie. Jujubes wafer carrot cake jelly.
                                    Bonbon jelly-o
                                    jelly-o ice
                                    cream jelly beans candy canes cake bonbon. Cookie jelly beans marshmallow jujubes sweet.
                                </p>
                            </div>
                            <div class="tab-pane fade" id="navs-specifications" role="tabpanel">
                                <h5 class="mb-25">Specification</h5>
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <tbody>
                                            <tr>
                                                <td>Mode</td>
                                                <td>#SK10923</td>
                                            </tr>
                                            <tr>
                                                <td>Brand</td>
                                                <td>SamSung</td>
                                            </tr>
                                            <tr>
                                                <td>Size</td>
                                                <td>6.7"</td>
                                            </tr>
                                            <tr>
                                                <td>Finish</td>
                                                <td>Pacific Blue</td>
                                            </tr>
                                            <tr>
                                                <td>Origin of Country</td>
                                                <td>United States</td>
                                            </tr>
                                            <tr>
                                                <td>Manufacturer</td>
                                                <td>USA</td>
                                            </tr>
                                            <tr>
                                                <td>Released Year</td>
                                                <td>2022</td>
                                            </tr>
                                            <tr>
                                                <td>Warranty</td>
                                                <td>International</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="navs-additional-information" role="tabpanel">
                                <h5 class="mb-25">Additional information</h5>
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <tbody>
                                            <tr>
                                                <td>Weight</td>
                                                <td>
                                                    <p>0.240 kg</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Dimensions</td>
                                                <td>
                                                    <p>0.74 x 7.64 x 16.08 cm</p>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="navs-reviews" role="tabpanel">
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
        });
        var product_top = new Swiper(".product-top", {
            spaceBetween: 10,
            zoom: true,
            thumbs: {
                swiper: new Swiper(".product-thumbs", {
                    spaceBetween: 10,
                    slidesPerView: 4,
                })
            }
        })
    </script>
@endsection
