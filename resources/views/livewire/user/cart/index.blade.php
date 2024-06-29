<section class="bg-white">
    <div class="container-xxl flex-grow-1 container-p-y" style="min-height: 450px;">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h5 class="m-0">My Shopping Bag ({{ count($cartItems) }}
                Item{{ count($cartItems) > 1 ? 's' : '' }})</h5>
        </div>
        <div class="row">
            <div class="{{ count($cartItems) > 0 ? 'col-xl-8' : 'col-xl-12' }} overflow-scroll"
                style="max-height: 1000px">
                <div>
                    <form action="{{ route('user.checkout.shipping') }}" method="post" id="form-cart">
                        @csrf

                        @foreach ($checkoutBag as $bagItem)
                            <input type="hidden" name="bag[]" value="{{ $bagItem['id'] }}">
                        @endforeach

                        <div class="row flex-column gap-2">
                            @forelse ($cartItems as $cartItem)
                                <livewire:user.cart.item :key="$cartItem->id" :$cartItem />
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
            </div>
            @if (count($cartItems) > 0)
                <div class="col-xl-4">
                    <div class="border rounded p-3 mb-4">

                        {{-- <!-- Offer -->
                        <h6>Offer</h6>
                        <div class="row g-4 mb-4">
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
                            <h6 class="mb-2">Buying gift for a loved one?</h6>
                            <p class="mb-2">Gift wrap and personalized message on card, Only for $2.</p>
                            <a href="javascript:void(0)" class="fw-medium">Add a gift wrap</a>
                        </div>
                        <hr class="mx-n6 my-6"> --}}

                        <!-- Price Details -->
                        <h6>Price Details</h6>
                        <dl class="row mb-0 text-heading">
                            <dt class="col-6 fw-normal">Bag Total</dt>
                            <dd class="col-6 text-end">{{ currencyParser($checkoutBagTotal, symbol: 'Rs.') }}</dd>

                            <dt class="col-6 fw-normal">Delivery Charges</dt>
                            <dd class="col-6 text-end">
                                {{-- <s class="text-muted">{{ currencyParser($deliveryCharges, symbol: 'Rs.') }}</s> --}}
                                <span class="badge bg-label-success ms-1">Free</span>
                            </dd>
                        </dl>

                        <hr class="mx-n6 my-6">
                        <dl class="row mb-0">
                            <dt class="col-6 text-heading">Total</dt>
                            <dd class="col-6 fw-medium text-end text-heading mb-0">
                                {{ currencyParser($checkoutBagTotal, symbol: 'Rs.') }}</dd>
                        </dl>
                    </div>
                    <div class="d-grid">
                        <button class="btn btn-primary btn-next waves-effect waves-light" id="btn-place-order"
                            {{ count($checkoutBag) ? '' : 'disabled' }}>{{ count($checkoutBag) ? 'Place Order (' . count($checkoutBag) . ')' : 'Place Order' }}</button>
                    </div>
                </div>
            @endif
        </div>
    </div>
</section>

<script>
    $(document).ready(function() {
        $('#btn-place-order').on('click', function() {
            $('#form-cart').submit();
        });
    });
</script>