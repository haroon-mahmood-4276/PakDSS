<div class="d-flex justify-content-cetner align-items-center">
    <a class="btn btn-success m-1" href="{{ route('admin.approvals.shops.store', ['id' => $id, 'status' => 'approve']) }}"
        data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Approve">
        <i class="fa-solid fa-circle-check"></i>
    </a>
    <a class="btn btn-danger m-1" href="{{ route('admin.approvals.shops.store', ['id' => $id, 'status' => 'object']) }}"
        data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Object">
        <i class="fa-solid fa-circle-xmark"></i>
    </a>
</div>
