@extends('user.layout.layout', [''])

@section('seo-breadcrumb')
    {{ Breadcrumbs::view('breadcrumbs::json-ld', 'user.home') }}
@endsection

@section('page-title', env('APP_NAME'))

@section('vendor-css')
@endsection

@section('page-css')
@endsection

@section('breadcrumbs')
@endsection

@section('content')
    <section class="bg-white">
        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="row">
                <div class="col-xl-8">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h5 class="m-0">My Shopping Bag (2 Items)</h5>
                        <button class="btn btn-primary waves-effect waves-light"><i class="fa-solid fa-arrows-rotate me-1"></i> Update Cart</button>
                    </div>
                    <div class="row flex-column gap-2">
                        <div class="col-12">
                            <div class="form-check custom-option custom-option-basic">
                                <label class="form-check-label custom-option-content" for="customCheckTemp3">
                                    <input class="form-check-input" type="checkbox" value="" id="customCheckTemp3"
                                        checked="">

                                    <div class="d-flex gap-3">
                                        <div class="flex-shrink-0 d-flex align-items-center">
                                            <img src="{{ asset('admin-assets') }}/img/products/1.png" alt="google home"
                                                class="w-px-100">
                                        </div>
                                        <div class="flex-grow-1">
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <p class="">
                                                        <a href="javascript:void(0)" class="text-body">Google - Google Home
                                                            - White</a>
                                                    </p>
                                                    <div class="text-muted mb-2 d-flex flex-wrap"><span class="me-1">Sold
                                                            by:</span> <a href="javascript:void(0)" class="me-3">Apple</a>
                                                        <span class="badge bg-label-success">In Stock</span>
                                                    </div>
                                                    aasdas
                                                    <input type="number" class="form-control form-control-sm w-px-100 mt-2"
                                                        value="1" min="1" max="5">
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="text-md-end position-relative">
                                                        <button type="button" class="btn-close"
                                                            aria-label="Close"></button>
                                                        <div class="my-2 my-md-4 mb-md-5"><span
                                                                class="text-primary">$299/</span><s
                                                                class="text-muted">$359</s></div>
                                                        <button type="button"
                                                            class="btn btn-sm btn-label-primary mt-md-3 waves-effect">Move
                                                            to wishlist</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </label>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="col-xl-4">
                    <div class="border rounded p-4 mb-3 pb-3">

                        <h6>Offer</h6>
                        <!-- Offer -->
                        <div class="row g-3 mb-3">
                            <div class="col-8 col-xxl-8 col-xl-12">
                                <input type="text" class="form-control" placeholder="Enter Promo Code"
                                    aria-label="Enter Promo Code">
                            </div>
                            <div class="col-4 col-xxl-4 col-xl-12">
                                <div class="d-grid">
                                    <button type="button" class="btn btn-label-primary waves-effect">Apply</button>
                                </div>
                            </div>
                        </div>

                        <!-- Gift wrap -->
                        <div class="bg-lighter rounded p-3">
                            <p class="fw-medium mb-2">Buying gift for a loved one?</p>
                            <p class="mb-2">Gift wrap and personalized message on card, Only for $2.</p>
                            <a href="javascript:void(0)" class="fw-medium">Add a gift wrap</a>
                        </div>
                        <hr class="mx-n4">

                        <!-- Price Details -->
                        <h6>Price Details</h6>
                        <dl class="row mb-0">
                            <dt class="col-6 fw-normal text-heading">Bag Total</dt>
                            <dd class="col-6 text-end">$1198.00</dd>

                            <dt class="col-sm-6 fw-normal">Coupon Discount</dt>
                            <dd class="col-sm-6 text-end"><a href="javascript:void(0)">Apply Coupon</a></dd>

                            <dt class="col-6 fw-normal text-heading">Order Total</dt>
                            <dd class="col-6 text-end">$1198.00</dd>

                            <dt class="col-6 fw-normal text-heading">Delivery Charges</dt>
                            <dd class="col-6 text-end"><s class="text-muted">$5.00</s> <span
                                    class="badge bg-label-success ms-1">Free</span></dd>
                        </dl>

                        <hr class="mx-n4">
                        <dl class="row mb-0">
                            <dt class="col-6 text-heading">Total</dt>
                            <dd class="col-6 fw-medium text-end text-heading mb-0">$1198.00</dd>
                        </dl>
                    </div>
                    <div class="d-grid">
                        <button class="btn btn-primary btn-next waves-effect waves-light">Proceed to checkout</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('vendor-js')
@endsection

@section('page-js')
@endsection
