<div class="d-flex justify-content-cetner align-items-center">
    <a class="btn btn-warning m-1" href="{{ route('seller.shops.edit', ['id' => encryptParams($id)]) }}">
        <i class="icon material-icons md-edit text-white "></i>
    </a>
    {{-- <a class="btn btn-primary m-1" href="{{ route('seller.shops.products.index', ['shop_id' => encryptParams($id)]) }}">
        <i class="icon material-icons md-shopping_basket text-white me-0 "></i>
    </a> --}}
</div>
