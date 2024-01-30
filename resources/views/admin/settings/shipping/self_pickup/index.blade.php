<form class="form form-vertical" method="POST" enctype="multipart/form-data">

    <div class="row g-3">
        <div class="col-lg-9 col-md-9 col-sm-12 position-relative">

            @csrf
            
            <div class="row mb-3">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="m-0">General</h3>
                        </div>

                        <div class="card-body">

                            <div class="row mb-3">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 position-relative">
                                    <label class="switch switch-square m-0">
                                        <input type="hidden" name="shipping_enable" value="0">
                                        <input type="checkbox" class="switch-input" id="shipping_enable"
                                            name="shipping_enable" value="1">
                                        <span class="switch-toggle-slider">
                                            <span class="switch-on"><i class="ti ti-check"></i></span>
                                            <span class="switch-off"><i class="ti ti-x"></i></span>
                                        </span>
                                        <span class="switch-label">Enable</span>
                                    </label>
                                    <p class="m-0">
                                        <small class="text-muted">When enabled, local pickup will appear as an option on
                                            the block based checkout.</small>
                                    </p>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 position-relative">
                                    <label class="form-label" style="font-size: 15px" for="shipping_title">Title<span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="shipping_title" name="shipping_title"
                                        placeholder="Ex. Self Pickup" value="{{ settings('shipping_title') }}" />
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 position-relative">
                                    <div class="form-check">
                                        <input type="hidden" value="0" name="enable_self_pickup_price">
                                        <input class="form-check-input" type="checkbox" value="1"
                                            id="enable_self_pickup_price" name="enable_self_pickup_price">
                                        <label class="form-check-label" for="enable_self_pickup_price">
                                            Add a price for customers who choose local pickup.
                                        </label>
                                        <p class="m-0">
                                            <small class="text-muted">By default, the local pickup shipping method is
                                                free.</small>
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div id="div_self_pickup_price" style="display: none;">

                                <div class="row mb-3">
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 position-relative">
                                        <label class="form-label" style="font-size: 15px" for="self_pickup_price">Cost
                                            <span class="text-danger">*</span></label>
                                        <input type="number"
                                            class="form-control @error('self_pickup_price') is-invalid @enderror"
                                            id="self_pickup_price" name="self_pickup_price" placeholder="0" />
                                        @error('self_pickup_price')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @else
                                            <p class="m-0">
                                                <small class="text-muted">Optional cost to charge for local pickup.</small>
                                            </p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-3 col-sm-12 position-relative">
            <div class="sticky-md-top top-lg-100px top-md-100px top-sm-0px" style="z-index: auto;">
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="row g-3">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-success w-100  buttonToBlockUI me-1">
                                    <i class="fa-solid fa-floppy-disk icon mx-2"></i>
                                    Save
                                </button>
                            </div>
                            <div class="col-md-12">
                                <button type="reset" class="btn btn-danger w-100 ">
                                    <i class="fa-solid fa-xmark icon mx-2"></i>
                                    Cancel
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="alert alert-primary alert-dismissible fade show" role="alert">
                            <h4 class="alert-heading"><i data-feather="info" class="me-50"></i>Information!</h4>
                            <div class="alert-body">

                                <span class="text-danger">*</span> means required field. <br>
                                <span class="text-danger">**</span> means required field and must be unique.
                            </div>
                            {{-- <button type="button" class="btn-close" data-bs-dismiss="alert"
                        aria-label="Close"></button> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

{{-- @include('admin.settings.shipping.self_pickup.locations.index') --}}

@section('custom-js')
    <script>
        $(function() {
            $('#enable_self_pickup_price').on('click', function() {
                if ($(this).is(':checked')) {
                    $('#div_self_pickup_price').show();
                } else {
                    $('#div_self_pickup_price').hide();
                }
            });
        });
    </script>
@endsection
