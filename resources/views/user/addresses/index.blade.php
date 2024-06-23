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

                    @include('user.layout.alerts')

                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h5 class="m-0">Address Book</h5>
                        <button class="btn btn-primary waves-effect waves-light" id="btn-add-address">
                            <i class="fa-solid fa-plus me-1"></i>
                            Add Address</button>
                    </div>

                    <div class="row">
                        @forelse ($addresses as $address)
                            <div class="col-6 mb-4">
                                <div
                                    class="w-100 h-100 border {{ $address->default_delivery_address ? 'border-primary' : '' }} p-3 rounded">
                                    <span class="d-flex justify-content-between mb-2">
                                        <span class="fw-medium text-heading mb-0">{{ $address->name }}
                                            {{ $address->default_delivery_address ? '(Default)' : '' }}</span>
                                        <span
                                            class="badge {{ $address->address_type === 'office' ? 'bg-label-success' : 'bg-label-primary' }}">{{ ucfirst($address->address_type) }}</span>
                                    </span>
                                    <span>
                                        <small>{{ $address->address_1 }}, {{ $address->address_2 }}</small>
                                        <br>
                                        <small>Mobile: {{ $address->mobile_no }}</small>
                                        <span class="my-2 border-bottom d-block"></span>
                                        <span class="d-flex">
                                            <a class="me-2" href="javascript:void(0)">Edit</a>
                                            <a class="me-2" href="javascript:void(0)">Remove</a>
                                        </span>
                                    </span>
                                </div>
                            </div>
                        @empty
                            <div class="col-12">
                                <div class="w-100 h-100 p-3 rounded">
                                    <h3>No address found! 😔</h3>
                                </div>
                            </div>
                        @endforelse
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
                            errorsHtml +=
                                "<span class='badge rounded-pill bg-danger p-3 m-3'>" +
                                index +
                                " -> " + value + "</span>";
                        });
                    }
                });
            });
        });
    </script>
@endsection
