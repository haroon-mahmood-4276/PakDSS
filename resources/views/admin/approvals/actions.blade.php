<div class="d-flex justify-content-cetner align-items-center">
    @canany(['admin.approvals.products.index', 'admin.approvals.shops.index'])
        @if ($for !== 'seller')
            <button class="btn btn-primary m-1"
                onclick="ApprovalDataShowModal('{{ route('admin.approvals.' . $for . '.show', ['id' => $id, 'for' => $for]) }}')"
                data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Object" type="button">
                <i class="fa-solid fa-eye"></i>
            </button>
        @endif
        <a class="btn btn-success m-1"
            href="{{ route('admin.approvals.' . $for . '.store', ['id' => $id, 'for' => $for, 'status' => 'approve']) }}"
            data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Approve">
            <i class="fa-solid fa-circle-check"></i>
        </a>
        <a class="btn btn-danger m-1"
            href="{{ route('admin.approvals.' . $for . '.store', ['id' => $id, 'for' => $for, 'status' => 'object']) }}"
            data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Object">
            <i class="fa-solid fa-circle-xmark"></i>
        </a>
    @endcanany
</div>
