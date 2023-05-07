<div class="d-flex justify-content-cetner align-items-center">
    @can('admin.users.edit')
        <a class="btn btn-warning m-1" href="{{ route('admin.users.edit', ['id' => encryptParams($id)]) }}">
            <i class="ti ti-edit"></i>
        </a>
    @endcan
</div>
