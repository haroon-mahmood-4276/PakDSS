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
        <div class="container-xxl flex-grow-1 container-p-y" style="min-height: 450px;">
            <div class="row">
                <!-- Address left -->
                <div class="col-xl-8 mb-6 mb-xl-0">

                    <!-- Select address -->
                    <p class="fw-medium text-heading">Select your preferable address</p>
                    <div class="row mb-6 g-6">
                        <div class="col-md">
                            <div class="form-check custom-option custom-option-basic checked">
                                <label class="form-check-label custom-option-content" for="customRadioAddress1">
                                    <input name="customRadioTemp" class="form-check-input" type="radio" value=""
                                        id="customRadioAddress1" checked="">
                                    <span class="custom-option-header mb-2">
                                        <span class="fw-medium text-heading mb-0">John Doe (Default)</span>
                                        <span class="badge bg-label-primary">Home</span>
                                    </span>
                                    <span class="custom-option-body">
                                        <small>4135 Parkway Street, Los Angeles, CA, 90017.<br> Mobile : 1234567890 Card /
                                            Cash on
                                            delivery available</small>
                                        <span class="my-3 border-bottom d-block"></span>
                                        <span class="d-flex">
                                            <a class="me-4" href="javascript:void(0)">Edit</a> <a
                                                href="javascript:void(0)">Remove</a>
                                        </span>
                                    </span>
                                </label>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-check custom-option custom-option-basic">
                                <label class="form-check-label custom-option-content" for="customRadioAddress2">
                                    <input name="customRadioTemp" class="form-check-input" type="radio" value=""
                                        id="customRadioAddress2">
                                    <span class="custom-option-header mb-2">
                                        <span class="fw-medium text-heading mb-0">ACME Inc.</span>
                                        <span class="badge bg-label-success">Office</span>
                                    </span>
                                    <span class="custom-option-body">
                                        <small>87 Hoffman Avenue, New York, NY, 10016.<br>Mobile : 1234567890 Card / Cash on
                                            delivery available</small>
                                        <span class="my-3 border-bottom d-block"></span>
                                        <span class="d-flex">
                                            <a class="me-4" href="javascript:void(0)">Edit</a> <a
                                                href="javascript:void(0)">Remove</a>
                                        </span>
                                    </span>
                                </label>
                            </div>
                        </div>
                    </div>
                    <button type="button" class="btn btn-label-primary mb-6 waves-effect" data-bs-toggle="modal"
                        data-bs-target="#addNewAddress">Add new address</button>

                    <!-- Choose Delivery -->
                    <p class="fw-medium text-heading">Choose Delivery Speed</p>
                    <div class="row mt-2">
                        <div class="col-md mb-md-0 mb-2">
                            <div class="form-check custom-option custom-option-icon position-relative">
                                <label class="form-check-label custom-option-content" for="customRadioDelivery1">
                                    <span class="custom-option-body">
                                        <i class="ti ti-user ti-lg"></i>
                                        <span class="custom-option-title mb-2">Standard</span>
                                        <span class="badge bg-label-success btn-pinned">FREE</span>
                                        <small>Get your product in 1 Week.</small>
                                    </span>
                                    <input name="customRadioIcon" class="form-check-input" type="radio" value=""
                                        id="customRadioDelivery1" checked="">
                                </label>
                            </div>
                        </div>
                        <div class="col-md mb-md-0 mb-2">
                            <div class="form-check custom-option custom-option-icon position-relative">
                                <label class="form-check-label custom-option-content" for="customRadioDelivery2">
                                    <span class="custom-option-body">
                                        <i class="ti ti-star ti-lg"></i>
                                        <span class="custom-option-title mb-2">Express</span>
                                        <span class="badge bg-label-secondary btn-pinned">$10</span>
                                        <small>Get your product in 3-4 days.</small>
                                    </span>
                                    <input name="customRadioIcon" class="form-check-input" type="radio" value=""
                                        id="customRadioDelivery2">
                                </label>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-check custom-option custom-option-icon position-relative checked">
                                <label class="form-check-label custom-option-content" for="customRadioDelivery3">
                                    <span class="custom-option-body">
                                        <i class="ti ti-crown ti-lg"></i>
                                        <span class="custom-option-title mb-2">Overnight</span>
                                        <span class="badge bg-label-secondary btn-pinned">$15</span>
                                        <small>Get your product in 0-1 days.</small>
                                    </span>
                                    <input name="customRadioIcon" class="form-check-input" type="radio" value=""
                                        id="customRadioDelivery3">
                                </label>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Address right -->
                <div class="col-xl-4">
                    <div class="border rounded p-6 mb-4">

                        <!-- Estimated Delivery -->
                        <h6>Estimated Delivery Date</h6>
                        <ul class="list-unstyled">
                            <li class="d-flex gap-4 align-items-center py-2 mb-4">
                                <div class="flex-shrink-0">
                                    <img src="../../assets/img/products/1.png" alt="google home" class="w-px-50">
                                </div>
                                <div class="flex-grow-1">
                                    <p class="mb-0"><a class="text-body" href="javascript:void(0)">Google - Google Home
                                            -
                                            White</a></p>
                                    <p class="fw-medium mb-0">18th Nov 2021</p>
                                </div>
                            </li>
                            <li class="d-flex gap-4 align-items-center py-2">
                                <div class="flex-shrink-0">
                                    <img src="../../assets/img/products/2.png" alt="google home" class="w-px-50">
                                </div>
                                <div class="flex-grow-1">
                                    <p class="mb-0"><a class="text-body" href="javascript:void(0)">Apple iPhone 11
                                            (64GB,
                                            Black)</a></p>
                                    <p class="fw-medium mb-0">20th Nov 2021</p>
                                </div>
                            </li>
                        </ul>

                        <hr class="mx-n6 my-6">

                        <!-- Price Details -->
                        <h6>Price Details</h6>
                        <dl class="row mb-0 text-heading">

                            <dt class="col-6 fw-normal">Order Total</dt>
                            <dd class="col-6 text-end">$1198.00</dd>

                            <dt class="col-6 fw-normal">Delivery Charges</dt>
                            <dd class="col-6 text-end"><s class="text-muted">$5.00</s> <span
                                    class="badge bg-label-success ms-2">Free</span></dd>

                        </dl>
                        <hr class="mx-n6 my-6">
                        <dl class="row mb-0">
                            <dt class="col-6 text-heading">Total</dt>
                            <dd class="col-6 fw-medium text-end text-heading mb-0">$1198.00</dd>
                        </dl>
                    </div>
                    <div class="d-grid">
                        <button class="btn btn-primary btn-next waves-effect waves-light">Place Order</button>
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
