@extends('seller.layout.layout')

@section('seo-breadcrumb')
    {{ Breadcrumbs::view('breadcrumbs::json-ld', 'seller.requests.index', $requestFor) }}
@endsection

@section('page-title', Str::of($requestFor)->ucfirst())

@section('page-css')
    {{ view('seller.layout.datatables.css') }}
@endsection

@section('custom-css')
@endsection

@section('breadcrumbs')
    <div class="d-flex justify-content-start align-items-center mb-3">
        <h2 class="content-header-title float-start mb-0 mx-3">{{ Str::of($requestFor)->ucfirst() }}</h2>
        {{ Breadcrumbs::render('seller.requests.index', $requestFor) }}
    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('seller.requests.destroy', ['request' => $requestFor]) }}" id="requests-table-form" method="get">
                        {{ $dataTable->table() }}
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('page-js')
    {{ view('seller.layout.datatables.js') }}
@endsection

@section('custom-js')
    {{ $dataTable->scripts() }}
    <script>
        function addNew() {
            location.href = "{{ route('seller.requests.create', ['request' => $requestFor]) }}";
        }

        function deleteSelected() {
            const selectedCheckboxes = $('.dt-checkboxes:checked').length;
            if (selectedCheckboxes > 0) {

                Swal.fire({
                    icon: 'warning',
                    title: 'Warning',
                    text: 'Are you sure you want to delete the selected requests?',
                    showCancelButton: true,
                    cancelButtonText: 'No',
                    confirmButtonText: 'Yes (' + selectedCheckboxes + ' requests)',
                    confirmButtonClass: 'btn-danger',
                    buttonsStyling: false,
                    customClass: {
                        confirmButton: 'btn btn-danger me-1',
                        cancelButton: 'btn btn-success me-1'
                    },
                }).then((result) => {
                    if (result.isConfirmed) {
                        $('#requests-table-form').submit();
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

        setInterval(() => {
            $('#table-reload-button').trigger('click');
        }, 600000);
    </script>
@endsection
