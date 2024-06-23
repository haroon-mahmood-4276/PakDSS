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
    @php
        $subtotal = 0;
    @endphp
    <section class="bg-white">
        <div class="container-xxl flex-grow-1 container-p-y" style="min-height: 450px;">
            <div class="row">
                <div class="@if (count($cartItems) > 0) col-xl-8 @else col-xl-12 @endif">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h5 class="m-0">My Shopping Bag ({{ count($cartItems) }} Item(s))</h5>
                        <button class="btn btn-primary waves-effect waves-light" id="btn-update-cart"
                            {{ count($cartItems) < 1 ? 'disabled' : null }}><i class="fa-solid fa-arrows-rotate me-1"></i>
                            Update Cart</button>
                    </div>
                    <form action="{{ route('user.cart.update') }}" method="post" id="form-cart">

                        @csrf
                        @method('PUT')

                        <div class="row flex-column gap-2">
                            @forelse ($cartItems as $cartItem)
                                <div class="col-12">
                                    <div
                                        class="form-check custom-option custom-option-basic cart-product-{{ $cartItem->product_id }}">

                                        <label class="form-check-label custom-option-content"
                                            for="cart-product-{{ $cartItem->product_id }}">
                                            {{-- <input type="hidden" value="0"
                                                name="product-{{ $cartItem->product_id }}" />
                                            <input class="form-check-input" type="checkbox" value="1"
                                                name="product-{{ $cartItem->product_id }}"
                                                id="cart-product-{{ $cartItem->product_id }}"> --}}

                                            <div class="d-flex gap-3">
                                                <div class="flex-shrink-0 d-flex align-items-center">
                                                    <img src="{{ asset('admin-assets') }}/img/products/1.png"
                                                        alt="google home" class="w-px-100">
                                                </div>
                                                <div class="flex-grow-1">
                                                    <div class="row">
                                                        <div class="col-md-8">
                                                            <p class="m-0">
                                                                <a href="{{ route('user.products.index', ['product' => $cartItem->product]) }}"
                                                                    class="text-body">{{ $cartItem->product->name }}</a>
                                                            </p>
                                                            <div class="text-muted mb-2 d-flex flex-wrap">
                                                                <span class="me-1">Sold by:</span> <a
                                                                    href="{{ route('user.brands.index', ['brand' => $cartItem->product->brand]) }}"
                                                                    class="me-3">{{ $cartItem->product->brand->name }}</a>
                                                                <span class="badge bg-label-success">In Stock</span>
                                                            </div>
                                                            {{-- Rating --}}
                                                            <div>
                                                                <label for="">Quantity</label>
                                                                <input type="number"
                                                                    class="form-control form-control-sm w-px-100 my-2"
                                                                    name="cart[{{ $cartItem->id }}][quantity]"
                                                                    min="1" max="10"
                                                                    value="{{ $cartItem->quantity }}">
                                                            </div>
                                                            <h4 class="m-0">
                                                                <span class="text-primary">
                                                                    Total
                                                                    {{ currencyParser($cartItem->total_price, symbol: 'Rs.') }}
                                                                </span>
                                                            </h4>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="text-md-end position-relative">
                                                                <button type="button" class="btn-delete-item btn-close"
                                                                    data-referance="{{ $cartItem->id }}"></button>
                                                                <div class="my-2 my-md-4 mb-md-5">
                                                                    <h4>
                                                                        <span class="text-primary">
                                                                            {{ currencyParser($cartItem->product->discounted_price > 0 ? $cartItem->product->discounted_price : $cartItem->product->price, symbol: 'Rs.') }}
                                                                        </span>
                                                                        @if ($cartItem->product->discounted_price > 0)
                                                                            <small class="text-body-secondary">
                                                                                <s>{{ currencyParser($cartItem->product->discounted_price, symbol: 'Rs.') }}</s>
                                                                            </small>
                                                                        @endif
                                                                    </h4>
                                                                </div>
                                                                {{-- <button type="button"
                                                                class="btn btn-sm btn-label-primary mt-md-3 waves-effect">Move
                                                                to wishlist</button> --}}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </label>
                                    </div>
                                </div>

                                @php
                                    $subtotal += floatval($cartItem->total_price);
                                @endphp
                            @empty
                                <div class="col-12">
                                    <div class="d-flex justify-content-center align-items-center p-3">
                                        <h3 class="m-0 p-0P">The bag is empty! 😔</h3>
                                    </div>
                                </div>
                            @endforelse
                        </div>
                    </form>
                </div>
                @if (count($cartItems) > 0)
                    <div class="col-lg-4 col-md-4 position-relative">
                        <div class="sticky-md-top top-lg-140px top-md-140px top-sm-0px" style="z-index: auto;">
                            <div class="border rounded p-4 mb-3 pb-3">

                                {{-- <h6>Offer</h6>
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
                            <hr class="mx-n4"> --}}

                                <!-- Price Details -->
                                <h6>Price Details</h6>
                                <dl class="row mb-0">
                                    <dt class="col-6 fw-normal text-heading">Bag Total</dt>
                                    <dd class="col-6 text-end">{{ currencyParser($subtotal, symbol: 'Rs. ') }}</dd>

                                    {{-- <dt class="col-sm-6 fw-normal">Coupon Discount</dt>
                            <dd class="col-sm-6 text-end"><a href="javascript:void(0)">Apply Coupon</a></dd>

                            <dt class="col-6 fw-normal text-heading">Order Total</dt>
                            <dd class="col-6 text-end">$1198.00</dd> --}}

                                    <dt class="col-6 fw-normal text-heading">Delivery Charges</dt>
                                    <dd class="col-6 text-end">
                                        <s class="text-muted">$5.00</s>
                                        <span class="badge bg-label-success ms-1">Free</span>
                                    </dd>
                                </dl>

                                <hr class="mx-n4">
                                <dl class="row mb-0">
                                    <dt class="col-6 text-heading">Total</dt>
                                    <dd class="col-6 fw-medium text-end text-heading mb-0">
                                        {{ currencyParser($subtotal, symbol: 'Rs. ') }}</dd>
                                </dl>
                            </div>
                            <div class="d-grid">
                                <a href="{{ route('user.checkout.shipping') }}" class="btn btn-primary btn-next waves-effect waves-light">Proceed to
                                    checkout</a>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </section>
@endsection

@section('vendor-js')
@endsection

@section('page-js')
    <script>
        $(document).ready(function() {
            $('.btn-delete-item').on('click', function() {
                window.location.replace("{{ route('user.cart.delete', ['cart' => ':cart_id']) }}".replace(
                    ':cart_id', $(this).data('referance')))
            })
            $('#btn-update-cart').on('click', function() {
                $('#form-cart').submit();
            })
        });
    </script>
@endsection
