@extends('admin.layout.layout')

@section('seo-breadcrumb')
    {{ Breadcrumbs::view('breadcrumbs::json-ld', 'admin.sellers.shops.index', $seller) }}
@endsection

@section('page-title', 'Shops')

@section('page-css')
    {{ view('admin.layout.datatables.css') }}
@endsection

@section('custom-css')
@endsection

@section('breadcrumbs')
    <div class="d-flex justify-content-start align-items-center mb-3">
        <h2 class="content-header-title float-start mb-0 mx-3">Shops</h2>
        {{ Breadcrumbs::render('admin.sellers.shops.index', $seller) }}
    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin.sellers.shops.destroy', $seller) }}" id="shops-table-form" method="get">
                        {{ $dataTable->table() }}
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('page-js')
    {{ view('admin.layout.datatables.js') }}
@endsection

@section('custom-js')
    {{ $dataTable->scripts() }}
    <script>
        function deleteSelected() {
            const selectedCheckboxes = $('.dt-checkboxes:checked').length;
            if (selectedCheckboxes > 0) {

                Swal.fire({
                    icon: 'warning',
                    title: 'Warning',
                    text: 'Are you sure you want to delete the selected shops?',
                    showCancelButton: true,
                    cancelButtonText: 'No',
                    confirmButtonText: 'Yes (' + selectedCheckboxes + ' shops)',
                    confirmButtonClass: 'btn-danger',
                    buttonsStyling: false,
                    customClass: {
                        confirmButton: 'btn btn-danger me-1',
                        cancelButton: 'btn btn-success me-1'
                    },
                }).then((result) => {
                    if (result.isConfirmed) {
                        $('#shops-table-form').submit();
                    }
                });
            } else {
                Swal.fire({
                    icon: 'warning',
                    title: 'Warning',
                    text: 'Please select at least one shop!',
                    buttonsStyling: false,
                    customClass: {
                        confirmButton: 'btn btn-warning text-white me-1',
                    },
                });
            }
        }

        function addNew() {
            location.href = "{{ route('admin.sellers.shops.create', $seller) }}";
        }
    </script>
@endsection
