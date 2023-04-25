<div class="card">
    <div class="card-body">
        <div class="row mb-3">
            <div class="col-lg-6 col-md-6 col-sm-12 position-relative">
                <label class="form-label" style="font-size: 15px" for="name">Name <span
                        class="text-danger">*</span></label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                    name="name" placeholder="Name" value="{{ isset($shop) ? $shop->name : old('name') }}"
                    minlength="1" maxlength="50" />
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @else
                    <p class="m-0">
                        <small class="text-muted">Enter shop name.</small>
                    </p>
                @enderror
            </div>

            <div class="col-lg-6 col-md-6 col-sm-12 position-relative">
                <label class="form-label" style="font-size: 15px" for="slug">Slug</label>
                <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug"
                    placeholder="Slug" name="slug" value="{{ isset($shop) ? $shop->slug : old('slug') }}"
                    minlength="1" readonly maxlength="50" />

                @error('slug')
                    <div class="invalid-feedback">{{ $message }}</div>
                @else
                    <p class="m-0">
                        <small class="text-muted">Shop unique slug.</small>
                    </p>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-lg-12 col-md-12 col-sm-12 position-relative">
                <label class="form-label" style="font-size: 15px" for="address">
                    Address
                    <span class="text-danger">*</span>
                </label>

                <textarea class="form-control @error('address') is-invalid @enderror" id="address" name="address"
                    placeholder="Address" minlength="1" maxlength="254"
                    rows="5">{{ isset($shop) ? $shop->address : old('address') }}</textarea>

                @error('address')
                    <div class="invalid-feedback">{{ $message }}</div>
                @else
                    <p class="m-0">
                        <small class="text-muted">Enter shop full address.</small>
                    </p>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-lg-6 col-md-6 col-sm-12 position-relative">
                <label class="form-label" style="font-size: 15px" for="latitude">Latitude <span
                        class="text-danger">*</span></label>
                <input type="number" class="form-control @error('latitude') is-invalid @enderror" id="latitude"
                    name="latitude" placeholder="Latitude"
                    value="{{ isset($shop) ? $shop->lat : old('latitude') }}" />
                @error('latitude')
                    <div class="invalid-feedback">{{ $message }}</div>
                @else
                    <p class="m-0">
                        <small class="text-muted">Enter shop latitude.</small>
                    </p>
                @enderror
            </div>

            <div class="col-lg-6 col-md-6 col-sm-12 position-relative">
                <label class="form-label" style="font-size: 15px" for="longitude">Longitude <span
                        class="text-danger">*</span></label>
                <input type="number" class="form-control @error('longitude') is-invalid @enderror" id="longitude"
                    name="longitude" placeholder="Longitude"
                    value="{{ isset($shop) ? $shop->long : old('longitude') }}" />
                @error('longitude')
                    <div class="invalid-feedback">{{ $message }}</div>
                @else
                    <p class="m-0">
                        <small class="text-muted">Enter shop longitude.</small>
                    </p>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 mb-2">
                <label class="form-label" style="font-size: 15px" for="status">Status <span
                        class="text-danger">*</span></label>
                <select class="select2-size-lg form-select" id="status" name="status">
                    @foreach ($statuses as $key => $status)
                        <option data-icon="material-icons md-keyboard_arrow_right" value="{{ $key }}"
                            {{ (isset($shop) ? $shop->status : old('status')) == $key ? 'selected' : '' }}>
                            {{ Str::of($status)->replace('_', ' ') }}</option>
                    @endforeach
                </select>
                @error('status')
                    <div class="invalid-feedback">{{ $message }}</div>
                @else
                    <p class="m-0">
                        <small class="text-muted">Select status for shop.</small>
                    </p>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-lg-12 col-md-12 col-sm-12 position-relative">
                <label class="form-label" style="font-size: 15px" for="reason">
                    Reason
                </label>

                <input type="text" class="form-control @error('reason') is-invalid @enderror" id="reason"
                    name="reason" placeholder="Reason" value="{{ isset($shop) ? $shop->reason : old('reason') }}"
                    minlength="1" maxlength="254" />

                @error('reason')
                    <div class="invalid-feedback">{{ $message }}</div>
                @else
                    <p class="m-0">
                        <small class="text-muted">Enter reason.</small>
                    </p>
                @enderror
            </div>
        </div>

    </div>
</div>
