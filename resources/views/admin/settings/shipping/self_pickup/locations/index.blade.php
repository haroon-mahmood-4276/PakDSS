@section('page-vendor')
    @include('admin.layout.datatables.css')
@endsection

<form class="form form-vertical" method="POST" enctype="multipart/form-data">

    <div class="row g-3">
        <div class="col-lg-12 col-md-12 col-sm-12 position-relative">

            @csrf
            <input type="hidden" name="tab" value="{{ $tab }}">
            <input type="hidden" name="section" value="{{ $section }}">

            <div class="row mb-3">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h3 class="m-0">Pickup locations</h3>

                            <button class="btn btn-primary waves-effect waves-float waves-light">
                                <i class="fa-solid fa-plus me-2"></i>Add new</button>
                        </div>

                        <div class="card-body">
                            <table class="table" id="table_self_pickup_locations">
                                <thead>
                                    <tr>
                                        <th>Project</th>
                                        <th>Client</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="table-border-bottom-0">
                                    <tr>
                                        <td><i class="ti ti-brand-angular ti-lg text-danger me-3"></i> <span
                                                class="fw-medium">Angular Project</span></td>
                                        <td>Albert Cook</td>
                                        <td><span class="badge bg-label-primary me-1">Active</span></td>
                                        <td>
                                            <div class="dropdown">
                                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                                    data-bs-toggle="dropdown"><i
                                                        class="ti ti-dots-vertical"></i></button>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" href="javascript:void(0);"><i
                                                            class="ti ti-pencil me-1"></i> Edit</a>
                                                    <a class="dropdown-item" href="javascript:void(0);"><i
                                                            class="ti ti-trash me-1"></i> Delete</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><i class="ti ti-brand-react-native ti-lg text-info me-3"></i> <span
                                                class="fw-medium">React Project</span></td>
                                        <td>Barry Hunter</td>
                                        <td><span class="badge bg-label-success me-1">Completed</span></td>
                                        <td>
                                            <div class="dropdown">
                                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                                    data-bs-toggle="dropdown"><i
                                                        class="ti ti-dots-vertical"></i></button>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" href="javascript:void(0);"><i
                                                            class="ti ti-pencil me-2"></i> Edit</a>
                                                    <a class="dropdown-item" href="javascript:void(0);"><i
                                                            class="ti ti-trash me-2"></i> Delete</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><i class="ti ti-brand-vue ti-lg text-success me-3"></i> <span
                                                class="fw-medium">VueJs Project</span></td>
                                        <td>Trevor Baker</td>
                                        <td><span class="badge bg-label-info me-1">Scheduled</span></td>
                                        <td>
                                            <div class="dropdown">
                                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                                    data-bs-toggle="dropdown"><i
                                                        class="ti ti-dots-vertical"></i></button>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" href="javascript:void(0);"><i
                                                            class="ti ti-pencil me-2"></i> Edit</a>
                                                    <a class="dropdown-item" href="javascript:void(0);"><i
                                                            class="ti ti-trash me-2"></i> Delete</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><i class="ti ti-brand-bootstrap ti-lg text-primary me-3"></i> <span
                                                class="fw-medium">Bootstrap Project</span></td>
                                        <td>Jerry Milton</td>
                                        <td><span class="badge bg-label-warning me-1">Pending</span></td>
                                        <td>
                                            <div class="dropdown">
                                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                                    data-bs-toggle="dropdown"><i
                                                        class="ti ti-dots-vertical"></i></button>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" href="javascript:void(0);"><i
                                                            class="ti ti-pencil me-2"></i> Edit</a>
                                                    <a class="dropdown-item" href="javascript:void(0);"><i
                                                            class="ti ti-trash me-2"></i> Delete</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

@section('vendor-js')
    @include('admin.layout.datatables.js')
@endsection

@section('custom-js')
    <script>
        $(function() {
            $('#table_self_pickup_locations').DataTable({});
        });
    </script>
@endsection
