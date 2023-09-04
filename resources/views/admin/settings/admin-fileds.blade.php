<form class="form form-vertical" action="{{ route('admin.settings.store', ['tab' => $tab]) }}" method="POST"
    enctype="multipart/form-data">

    <div class="row g-3">
        <div class="col-lg-9 col-md-9 col-sm-12 position-relative">

            @csrf
            <div class="row mb-3">
                <div class="col-12">
                    <div class="card">
                        <div class="d-flex card-header justify-content-between">
                            <h3 class="m-0">Exchange Rates</h3>
                            <div>
                                <label class="switch switch-square m-0">
                                    <input type="hidden" name="rate_auto_update" value="0">
                                    <input type="checkbox" class="switch-input" id="rate_auto_update" name="rate_auto_update" {{ settings('rate_auto_update') ? 'checked' : null }} value="1">
                                    <span class="switch-toggle-slider">
                                        <span class="switch-on"><i class="ti ti-check"></i></span>
                                        <span class="switch-off"><i class="ti ti-x"></i></span>
                                    </span>
                                    <span class="switch-label">Auto update hourly</span>
                                </label>
                            </div>
                        </div>
                        <div class="card-body">

                            <input type="hidden" name="tab" value="{{ $tab }}">

                            <div class="row mb-3 flex-row-reverse">
                                <div class="col-xl-2 col-lg-3 col-md-3 col-sm-3 position-relative">

                                </div>
                            </div>

                            <div class="row">
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 position-relative">
                                    <label class="form-label" style="font-size: 15px" for="one_dollar_rate">One Dollor
                                        Rate (<i class="fa-solid fa-dollar-sign"></i>)  <span
                                            class="text-danger">*</span></label>
                                    <input type="number"
                                        class="form-control @error('one_dollar_rate') is-invalid @enderror"
                                        id="one_dollar_rate" name="one_dollar_rate" placeholder="0"
                                        value="{{ settings('one_dollar_rate') }}" />
                                    @error('one_dollar_rate')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @else
                                        <p class="m-0">
                                            <small class="text-muted">Enter current dollor rate.</small>
                                        </p>
                                    @enderror
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 position-relative">
                                    <label class="form-label" style="font-size: 15px" for="one_pound_rate">One Pound
                                        Rate (<i class="fa-solid fa-sterling-sign"></i>) <span
                                            class="text-danger">*</span></label>
                                    <input type="number"
                                        class="form-control @error('one_pound_rate') is-invalid @enderror"
                                        id="one_pound_rate" name="one_pound_rate" placeholder="0"
                                        value="{{ settings('one_pound_rate') }}" />
                                    @error('one_pound_rate')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @else
                                        <p class="m-0">
                                            <small class="text-muted">Enter current pound rate.</small>
                                        </p>
                                    @enderror
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
