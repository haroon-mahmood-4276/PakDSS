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
                    <form action="{{ route('admin.approvals.' . $model . '.store') }}"
                        id="approval-{{ $model }}-table-form" method="get">
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
        function approval() {
            var selectedCheckboxes = $('.dt-checkboxes:checked').length;
            if (selectedCheckboxes > 0) {

                Swal.fire({
                    icon: 'warning',
                    title: 'Warning',
                    text: 'Are you sure you want to delete the selected categories?',
                    showCancelButton: true,
                    cancelButtonText: 'No',
                    confirmButtonText: 'Yes (' + selectedCheckboxes + ' categories)',
                    confirmButtonClass: 'btn-danger',
                    buttonsStyling: false,
                    customClass: {
                        confirmButton: 'btn btn-danger me-1',
                        cancelButton: 'btn btn-success me-1'
                    },
                }).then((result) => {
                    if (result.isConfirmed) {
                        $('#approval-{{ $model }}-table-form').submit();
                    }
                });
            } else {
                Swal.fire({
                    icon: 'warning',
                    title: 'Warning',
                    text: 'Please select at least one category!',
                    buttonsStyling: false,
                    customClass: {
                        confirmButton: 'btn btn-warning me-1',
                    },
                });
            }
        }
    </script>
@endsection
