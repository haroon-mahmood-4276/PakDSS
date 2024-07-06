<div class="col-12">
    <div class="d-flex border p-3 rounded gap-3 {{ $isSelected ? 'border-primary' : '' }}">
        <div>
            <input class="form-check-input" type="checkbox" wire:model.live="isSelected" value="1"
                id="cart-product-{{ $cartItem->product_id }}" >
        </div>
        <div class="d-flex gap-3 w-100">
            <div class="flex-shrink-0 d-flex align-items-center">
                <img src="{{ asset('admin-assets') }}/img/products/1.png" alt="google home" class="w-px-100">
            </div>
            <div class="flex-grow-1">
                <div class="row">
                    <div class="col-md-8">
                        <p class="m-0">
                            <a href="{{ route('user.products.index', ['product' => $cartItem->product]) }}"
                                class="text-body fw-bold">{{ $cartItem->product->name }}</a>
                        </p>
                        <div class="text-muted mb-2 d-flex flex-wrap">
                            <span class="me-1">Sold by:</span>
                            <a href="{{ route('user.brands.index', ['brand' => $cartItem->product->brand]) }}"
                                class="me-3">{{ $cartItem->product->brand->name }}</a>
                            <span class="badge bg-label-success">In Stock</span>
                        </div>
                        <div>
                            <label for="">Quantity</label>
                            <input type="number" wire:model.blur="quantity" value="{{ $quantity }}"
                                class="form-control form-control-sm w-px-100 my-2" min="1" max="10" >
                        </div>
                        <h5 class="m-0">
                            <span class="text-primary">
                                Total
                                {{ currencyParser($totalPrice, symbol: 'Rs.') }}
                            </span>
                        </h5>
                    </div>
                    <div class="col-md-4">
                        <div class="text-md-end position-relative">
                            <button type="button" class="btn-delete-item btn-close"
                                wire:click="deleteItemFromCart('{{ $cartItem->id }}')"></button>
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
    </div>
</div>
