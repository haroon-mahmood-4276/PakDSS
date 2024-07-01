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
            <form action="{{ route('user.order.store') }}" method="POST">
                @csrf

                <div class="row">
                    <!-- Address left -->
                    <div class="col-xl-8 mb-3 mb-xl-0">
    
                        <!-- Select address -->
                        <p class="fw-medium text-heading">Select your preferable address</p>
                        <div class="row mb-3 g-3">
                            @forelse ($addresses as $address)
                                <div class="col-xl-6">
                                    <div
                                        class="form-check custom-option custom-option-basic {{ $address->default_delivery_address ? 'checked' : '' }}">
                                        <label class="form-check-label custom-option-content" for="address_{{ $address->id }}">

                                            <input name="shpping_address" class="form-check-input" type="radio"
                                                value="{{ $address->id }}" id="address_{{ $address->id }}"
                                                {{ $address->default_delivery_address ? 'checked' : '' }}>
    
                                            <span class="custom-option-header mb-2">
                                                <span class="fw-medium text-heading mb-0">{{ $address->name }}
                                                    {{ $address->default_delivery_address ? '(Default)' : '' }}</span>
                                                <span
                                                    class="badge {{ $address->address_type === 'office' ? 'bg-label-success' : 'bg-label-primary' }}">{{ ucfirst($address->address_type) }}</span>
                                            </span>
    
                                            <span class="custom-option-body">
                                                <small>{{ $address->address_1 }}, {{ $address->address_2 }}</small>
                                                <br>
                                                <small>Mobile: {{ $address->mobile_no }}</small>
                                                {{-- <span class="my-3 border-bottom d-block"></span>
                                                <span class="d-flex">
                                                    <a class="me-4" href="javascript:void(0)">Edit</a> <a
                                                        href="javascript:void(0)">Remove</a>
                                                </span> --}}
                                            </span>
                                        </label>
                                    </div>
                                </div>
                            @empty
                                <div class="col-12">
                                    <div class="w-100 h-100 p-3 rounded">
                                        <h3>No address found! 😔</h3>
                                    </div>
                                </div>
                            @endforelse
                        </div>
                        {{-- <button type="button" class="btn btn-label-primary mb-5 waves-effect" data-bs-toggle="modal"
                            data-bs-target="#addNewAddress">Add new address</button> --}}
    
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
                                        <input name="shipping_address_speed" class="form-check-input" type="radio" value="standard"
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
                                        <input name="shipping_address_speed" class="form-check-input" type="radio" value="express"
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
                                        <input name="shipping_address_speed" class="form-check-input" type="radio" value="overnight"
                                            id="customRadioDelivery3">
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
    
                    <!-- Address right -->
                    <div class="col-xl-4">
                        <div class="border rounded p-3 mb-4">
    
                            <!-- Estimated Delivery -->
                            <h6>Estimated Delivery Date</h6>
                            <ul class="list-unstyled">
    
                                @foreach ($checkoutBag as $bagItem)

                                    <input type="hidden" name="bag[]" value="{{ $bagItem->id }}">
                                    <li class="d-flex gap-4 align-items-center py-2 mb-4">
                                        <div class="flex-shrink-0">
                                            <img src="{{ asset('admin-assets') }}/img/products/1.png" alt="google home"
                                                class="w-px-50">
                                        </div>
                                        <div class="flex-grow-1">
                                            <p class="mb-0">
                                                <a class="text-body"
                                                    href="javascript:void(0)">{{ $bagItem->product->name }}</a>
                                            </p>
                                            <p class="fw-medium mb-0">
                                                {{ \Carbon\Carbon::now()->addDays(7)->toFormattedDayDateString() }}</p>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
    
                            <hr class="mx-n6 my-3">
    
                            <!-- Price Details -->
                            <h6>Price Details</h6>
                            <dl class="row mb-0 text-heading">
    
                                <dt class="col-6 fw-normal">Order Total</dt>
                                <dd class="col-6 text-end">{{ currencyParser($checkoutBagTotal, symbol: 'Rs.') }}</dd>
    
                                <dt class="col-6 fw-normal">Delivery Charges</dt>
                                <dd class="col-6 text-end">
                                    {{-- <s class="text-muted">$5.00</s> --}}
                                    <span class="badge bg-label-success ms-2">Free</span>
                                </dd>
    
                            </dl>
                            <hr class="mx-n6 my-6">
                            <dl class="row mb-0">
                                <dt class="col-6 text-heading">Total</dt>
                                <dd class="col-6 fw-medium text-end text-heading mb-0">{{ currencyParser($checkoutBagTotal, symbol: 'Rs.') }}</dd>
                            </dl>
                        </div>
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary btn-next waves-effect waves-light">Place Order</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection

@section('vendor-js')
@endsection

@section('page-js')

@endsection
