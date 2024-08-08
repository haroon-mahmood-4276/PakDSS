<div class="d-flex justify-content-cetner align-items-center">
    @can('admin.homepage.sliders.edit')
        <a class="btn btn-warning m-1" href="{{ route('admin.homepage.sliders.edit', ['slider' => $id]) }}">
            <i class="ti ti-edit"></i>
        </a>
    @endcan
</div>
