<div class="d-flex justify-content-cetner align-items-center">
    @can('admin.sellers.shops.edit')
        <a class="btn btn-warning m-1" href="{{ route('admin.sellers.shops.edit', ['seller' => encryptParams($seller), 'shop' => encryptParams($shop)]) }}">
            <i class="ti ti-edit"></i>
        </a>
    @endcan
</div>
