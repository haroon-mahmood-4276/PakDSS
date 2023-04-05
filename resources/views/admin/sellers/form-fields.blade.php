{{-- Login Credentials --}}
<div class="row mb-3">
    <div class="col-12">
        <div class="card">
            <div class="card-header m-0">
                <h4 class="m-0">1. Login Credentials</h4>
            </div>
            <div class="card-body">
                <div class="row mb-1">
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 position-relative">
                        <label class="form-label" style="font-size: 15px" for="email">Email <span
                                class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('email') is-invalid @enderror" id="email"
                            name="email" placeholder="Email" {{ isset($seller) ? 'readonly' : null }}
                            value="{{ isset($seller) ? $seller->email : old('email') }}" minlength="3"
                            maxlength="50" />
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @else
                            <p class="m-0">
                                <small class="text-muted">Enter login email.</small>
                            </p>
                        @enderror
                    </div>

                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 position-relative">
                        <label class="form-label" style="font-size: 15px" for="password">Password <span
                                class="text-danger">*</span></label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror"
                            id="password" name="password"
                            placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                            value="" />
                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @else
                            <p class="m-0">
                                <small class="text-muted">Enter login password. Leave blank if you don't want to
                                    change.</small>
                            </p>
                        @enderror
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

{{-- Personal Information --}}
<div class="row mb-3">
    <div class="col-12">
        <div class="card">
            <div class="card-header m-0">
                <h4 class="m-0">2. Personal Information</h4>
            </div>
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-lg-4 col-md-4 col-sm-12 position-relative">
                        <label class="form-label" style="font-size: 15px" for="first_name">First Name <span
                                class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('first_name') is-invalid @enderror"
                            id="first_name" name="first_name" placeholder="First Name"
                            value="{{ isset($seller) ? $seller->first_name : old('first_name') }}" minlength="3"
                            maxlength="50" />
                        @error('first_name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @else
                            <p class="m-0">
                                <small class="text-muted">Enter first name.</small>
                            </p>
                        @enderror
                    </div>

                    <div class="col-lg-4 col-md-4 col-sm-12 position-relative">
                        <label class="form-label" style="font-size: 15px" for="middle_name">Middle Name</label>
                        <input type="text" class="form-control @error('middle_name') is-invalid @enderror"
                            id="middle_name" name="middle_name" placeholder="Middle Name"
                            value="{{ isset($seller) ? $seller->middle_name : old('middle_name') }}" minlength="3"
                            maxlength="50" />
                        @error('middle_name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @else
                            <p class="m-0">
                                <small class="text-muted">Enter middle name.</small>
                            </p>
                        @enderror
                    </div>

                    <div class="col-lg-4 col-md-4 col-sm-12 position-relative">
                        <label class="form-label" style="font-size: 15px" for="last_name">Last Name <span
                                class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('last_name') is-invalid @enderror"
                            id="last_name" name="last_name" placeholder="Last Name"
                            value="{{ isset($seller) ? $seller->last_name : old('last_name') }}" minlength="3"
                            maxlength="50" />
                        @error('last_name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @else
                            <p class="m-0">
                                <small class="text-muted">Enter last name.</small>
                            </p>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 position-relative">
                        <label class="form-label" style="font-size: 15px" for="cnic">CNIC <span
                                class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('cnic') is-invalid @enderror" id="cnic"
                            name="cnic" placeholder="CNIC"
                            value="{{ isset($seller) ? $seller->cnic : old('cnic') }}" minlength="3"
                            maxlength="50" />
                        @error('cnic')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @else
                            <p class="m-0">
                                <small class="text-muted">Enter your National Indentification Card Number.</small>
                            </p>
                        @enderror
                    </div>

                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 position-relative">
                        <label class="form-label" style="font-size: 15px" for="ntn_number">NTN <span
                                class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('ntn_number') is-invalid @enderror"
                            id="ntn_number" name="ntn_number" placeholder="NTN"
                            value="{{ isset($seller) ? $seller->ntn_number : old('ntn_number') }}" minlength="3"
                            maxlength="50" />
                        @error('ntn_number')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @else
                            <p class="m-0">
                                <small class="text-muted">Enter ntn number.</small>
                            </p>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 position-relative">
                        <label class="form-label" style="font-size: 15px" for="phone_primary">Phone 1 <span
                                class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('phone_primary') is-invalid @enderror"
                            id="phone_primary" name="phone_primary" placeholder="Phone 1"
                            value="{{ isset($seller) ? $seller->phone_primary : old('phone_primary') }}"
                            minlength="3" maxlength="50" />
                        @error('phone_primary')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @else
                            <p class="m-0">
                                <small class="text-muted">Enter your primary number.</small>
                            </p>
                        @enderror
                    </div>

                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 position-relative">
                        <label class="form-label" style="font-size: 15px" for="phone_secondary">Phone 2</label>
                        <input type="text" class="form-control @error('phone_secondary') is-invalid @enderror"
                            id="phone_secondary" name="phone_secondary" placeholder="Phone 1"
                            value="{{ isset($seller) ? $seller->phone_secondary : old('phone_secondary') }}"
                            minlength="3" maxlength="50" />
                        @error('phone_secondary')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @else
                            <p class="m-0">
                                <small class="text-muted">Enter your secondary number.</small>
                            </p>
                        @enderror
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>


{{-- Authorization --}}
<div class="row mb-3">
    <div class="col-12">
        <div class="card">
            <div class="card-header m-0">
                <h4 class="m-0">3. Authorization</h4>
            </div>
            <div class="card-body">
                <div class="row mb-3">

                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 mb-2">
                        <label class="form-label" style="font-size: 15px" for="status">Status <span
                                class="text-danger">*</span></label>
                        <select class="select2-size-lg form-select" id="status" name="status">
                            @foreach ($statuses as $key => $status)
                                <option data-icon="fa-solid fa-angle-right" value="{{ $key }}"
                                    {{ (isset($seller) ? $seller->status : old('status')) == $key ? 'selected' : '' }}>
                                    {{ $status }}</option>
                            @endforeach
                        </select>
                        @error('status')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @else
                            <p class="m-0">
                                <small class="text-muted">Select status for seller.</small>
                            </p>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-lg-12 col-md-12 col-sm-12 position-relative">
                        <label class="form-label" style="font-size: 15px" for="reason">Reason</label>
                        <textarea class="form-control @error('reason') is-invalid @enderror" id="reason" name="reason"
                            placeholder="Reason" rows="5">{{ isset($seller) ? $seller->reason : old('reason') }}</textarea>
                        @error('reason')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @else
                            <p class="m-0">
                                <small class="text-muted">Enter reason for in-active or objected.</small>
                            </p>
                        @enderror
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
