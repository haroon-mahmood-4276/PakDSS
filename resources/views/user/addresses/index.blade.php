@extends('user.layout.layout', [''])

@section('seo-breadcrumb')
    {{ Breadcrumbs::view('breadcrumbs::json-ld', 'user.home') }}
@endsection

@section('page-title', env('APP_NAME'))

@section('vendor-css')
@endsection

@section('page-css')
@endsection

@section('breadcrumbs')
@endsection

@section('content')
    <section class="bg-white">
        <div class="container-xxl flex-grow-1 container-p-y" style="min-height: 450px;">
            <div class="row">
                <div class="col-xl-12">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h5 class="m-0">Address Book</h5>
                        <button class="btn btn-primary waves-effect waves-light" id="btn-add-address">
                            <i class="fa-solid fa-plus me-1"></i>
                            Add Address</button>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md mb-md-0 mb-2">
                            <div class="form-check custom-option custom-option-basic checked">
                                <label class="form-check-label custom-option-content" for="customRadioAddress1">
                                    <input name="customRadioTemp" class="form-check-input" type="radio" value=""
                                        id="customRadioAddress1" checked="">
                                    <span class="custom-option-header mb-2">
                                        <span class="fw-medium text-heading mb-0">John Doe (Default)</span>
                                        <span class="badge bg-label-primary">Home</span>
                                    </span>
                                    <span class="custom-option-body">
                                        <small>4135 Parkway Street, Los Angeles, CA, 90017.<br> Mobile : 1234567890 Card /
                                            Cash on delivery available</small>
                                        <span class="my-2 border-bottom d-block"></span>
                                        <span class="d-flex">
                                            <a class="me-2" href="javascript:void(0)">Edit</a> <a
                                                href="javascript:void(0)">Remove</a>
                                        </span>
                                    </span>
                                </label>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-check custom-option custom-option-basic">
                                <label class="form-check-label custom-option-content" for="customRadioAddress2">
                                    <input name="customRadioTemp" class="form-check-input" type="radio" value=""
                                        id="customRadioAddress2">
                                    <span class="custom-option-header mb-2">
                                        <span class="fw-medium text-heading mb-0">ACME Inc.</span>
                                        <span class="badge bg-label-success">Office</span>
                                    </span>
                                    <span class="custom-option-body">
                                        <small>87 Hoffman Avenue, New York, NY, 10016.<br>Mobile : 1234567890 Card / Cash on
                                            delivery available</small>
                                        <span class="my-2 border-bottom d-block"></span>
                                        <span class="d-flex">
                                            <a class="me-2" href="javascript:void(0)">Edit</a> <a
                                                href="javascript:void(0)">Remove</a>
                                        </span>
                                    </span>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('vendor-js')
@endsection

@section('page-js')
    <script>
        $(document).ready(function() {
            $('#btn-add-address').on('click', function() {
                $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $(' meta[name="csrf-token"]').attr('content'),
                },
                url: "{{ route('user.ajax.modal.addresses.create') }}",
                type: 'GET',
                cache: false,
                success: function(response) {
                    if (response.status) {
                        $('#' + response.data.modalPlace).html(response.data.modal);
                        $('#' + response.data.currentModal).modal('show');
                        hideBlockUI();
                    }
                },
                error: function(jqXhr, json, errorThrown) {
                    hideBlockUI();

                    var errors = jqXhr.responseJSON;
                    var errorsHtml = '';

                    $.each(errors['errors'], function(index, value) {
                        errorsHtml += "<span class='badge rounded-pill bg-danger p-3 m-3'>" + index +
                            " -> " + value + "</span>";
                    });
                }
            });
            });
        });
    </script>
@endsection
