@extends('admin.layout.layout')

@section('seo-breadcrumb')
    {{ Breadcrumbs::view('breadcrumbs::json-ld', 'admin.approvals.' . $model . '.index') }}
@endsection

@section('page-title', Str::of($model)->ucfirst() . ' Approvals')

@section('page-vendor')
    {{ view('admin.layout.datatables.css') }}
@endsection

@section('page-css')
@endsection

@section('custom-css')
@endsection

@section('breadcrumbs')
    <div class="d-flex justify-content-start align-items-center mb-3">
        <h2 class="content-header-title float-start mb-0 mx-3">{{ Str::of($model)->ucfirst() }} Approvals</h2>
        {{ Breadcrumbs::render('admin.approvals.' . $model . '.index') }}
    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin.approvals.store') }}"
                        id="approval-{{ $model }}-table-form" method="get">
                        <input type="hidden" name="for" id="for" value="{{ $model }}">
                        <input type="hidden" name="status" id="status" value="">
                        {{ $dataTable->table() }}
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('vendor-js')
    {{ view('admin.layout.datatables.js') }}
@endsection

@section('page-js')
@endsection

@section('custom-js')
    {{ $dataTable->scripts() }}
    <script>
        function rowStatusChange(status) {
            var selectedCheckboxes = $('.dt-checkboxes:checked').length;
            if (selectedCheckboxes > 0) {

                Swal.fire({
                    icon: 'warning',
                    title: 'Warning',
                    text: 'Are you sure you want to ' + status +
                        ' the selected {{ Str::of($model)->singular() }}(s)?',
                    showCancelButton: true,
                    cancelButtonText: 'No',
                    confirmButtonText: 'Yes - ' + selectedCheckboxes + ' {{ Str::of($model)->singular() }}(s)',
                    buttonsStyling: false,
                    customClass: {
                        confirmButton: 'btn me-1 ' + (status === 'approve' ? 'btn-success' : 'btn-danger'),
                        cancelButton: 'btn me-1 ' + (status === 'approve' ? 'btn-danger' : 'btn-success')
                    },
                }).then((result) => {
                    if (result.isConfirmed) {
                        $('#status').val(status);
                        $('#approval-{{ $model }}-table-form').submit();
                    }
                });
            } else {
                Swal.fire({
                    icon: 'warning',
                    title: 'Warning',
                    text: 'Please select at least one {{ Str::of($model)->singular() }}!',
                    buttonsStyling: false,
                    customClass: {
                        confirmButton: 'btn btn-warning me-1',
                    },
                });
            }
        }
    </script>
@endsection
