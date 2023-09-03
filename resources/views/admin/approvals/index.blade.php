@extends('admin.layout.layout')

@section('seo-breadcrumb')
    {{ Breadcrumbs::view('breadcrumbs::json-ld', 'admin.approvals.' . $model . '.index') }}
@endsection

@section('page-title', Str::of($model)->ucfirst() . ' Approvals')

@section('page-vendor')
    @include('admin.layout.datatables.css')
    @include('admin.layout.filepond.css', ['isHalf' => true])
    <link rel="stylesheet" href="{{ asset('admin-assets') }}/vendor/libs/tagify/tagify.min.css">
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
                        <input type="hidden" name="for" id="for" value="{{ $model }}">
                        <input type="hidden" name="status" id="status" value="">
                        {{ $dataTable->table() }}
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div id="modalPlace"></div>
@endsection

@section('vendor-js')
    @include('admin.layout.datatables.js')
    @include('admin.layout.filepond.js')
    <script src="{{ asset('admin-assets') }}/vendor/libs/tagify/tagify.min.js"></script>
    <script src="{{ asset('admin-assets') }}/vendor/libs/tagify/tagify.polyfills.min.js"></script>

    <script src="{{ asset('seller-assets') }}/vendors/tinymce/tinymce.min.js" referrerpolicy="origin"></script>
    <script src="{{ asset('seller-assets') }}/vendors/tinymce/tinymce-jquery.min.js"></script>

@endsection

@section('page-js')
@endsection

@section('custom-js')
    {{ $dataTable->scripts() }}
    <script>
        function ApprovalDataShowModal(url) {
            $.ajax({
                url: url,
                type: 'GET',
                cache: false,
                beforeSend: function() {
                    showBlockUI();
                },
                success: function(response) {
                    if (response.status) {
                        $('#' + response.data.modalPlace).html(response.data.modal);
                        $('#' + response.data.currentModal).modal('show');
                        hideBlockUI();
                    }
                },
                error: function(jqXhr, json, errorThrown) {
                    var errors = jqXhr.responseJSON;
                    var errorsHtml = '';

                    $.each(errors['errors'], function(index, value) {
                        errorsHtml += "<span class='badge rounded-pill bg-danger p-3 m-3'>" + index +
                            " -> " + value + "</span>";
                    });
                },
                complete: function() {
                    hideBlockUI();
                },
            });
        }

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
