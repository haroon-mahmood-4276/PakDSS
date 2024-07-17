<div class="d-flex justify-content-cetner align-items-center">
    @can('admin.sellers.edit')
        <a class="btn btn-warning m-1" href="{{ route('admin.sellers.edit', ['seller' => $seller]) }}">
            <i class="ti ti-edit"></i>
        </a>
    @endcan
    @can('admin.sellers.shops.index')
        <a class="btn btn-primary m-1" href="{{ route('admin.sellers.shops.index', ['seller' => $seller]) }}">
            <i class="ti ti-shopping-cart"></i>
        </a>
    @endcan
</div>
