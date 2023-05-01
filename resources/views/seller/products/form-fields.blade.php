<div class="card">
    <div class="card-body">

        <div class="row mb-3">
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 mb-2">
                <label class="form-label" style="font-size: 15px" for="status">Status <span
                        class="text-danger">*</span></label>
                <select class="select2-size-lg form-select" id="status" name="status">
                    @foreach ($statuses as $key => $status)
                        <option data-icon="material-icons md-keyboard_arrow_right" value="{{ $key }}"
                            {{ (isset($product) ? $product->status : old('status')) == $key ? 'selected' : '' }}>
                            {{ Str::of($status)->replace('_', ' ') }}</option>
                    @endforeach
                </select>
                @error('status')
                    <div class="invalid-feedback">{{ $message }}</div>
                @else
                    <p class="m-0">
                        <small class="text-muted">Select status for product.</small>
                    </p>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-lg-12 col-md-12 col-sm-12 position-relative">
                <label class="form-label" style="font-size: 15px" for="name">Name <span
                        class="text-danger">*</span></label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                    name="name" placeholder="Name" value="{{ isset($product) ? $product->name : old('name') }}"
                    minlength="1" maxlength="50" />
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @else
                    <p class="m-0" id="permalink">{{ env('APP_URL') }}:8000/products/</p>
                @enderror
            </div>

            {{-- <div class="col-lg-6 col-md-6 col-sm-12 position-relative">
                <label class="form-label" style="font-size: 15px" for="permalink">Slug</label>
                <input type="text" class="form-control @error('permalink') is-invalid @enderror" id="permalink"
                    placeholder="Slug" name="permalink" value="{{ isset($product) ? $product->permalink : old('permalink') }}"
                    minlength="1" readonly maxlength="50" />

                @error('permalink')
                    <div class="invalid-feedback">{{ $message }}</div>
                @else
                    <p class="m-0">
                        <small class="text-muted">Shop unique permalink.</small>
                    </p>
                @enderror
            </div> --}}
        </div>

        <div class="row mb-3">
            <div class="col-lg-12 col-md-12 col-sm-12 position-relative">
                <label class="form-label" style="font-size: 15px" for="address">
                    Address
                    <span class="text-danger">*</span>
                </label>

                <textarea class="form-control @error('address') is-invalid @enderror" id="address" name="address"
                    placeholder="Address" minlength="1" maxlength="254" rows="5">{{ isset($product) ? $product->address : old('address') }}</textarea>

                @error('address')
                    <div class="invalid-feedback">{{ $message }}</div>
                @else
                    <p class="m-0">
                        <small class="text-muted">Enter product full address.</small>
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
                    value="{{ isset($product) ? $product->lat : old('latitude') }}" />
                @error('latitude')
                    <div class="invalid-feedback">{{ $message }}</div>
                @else
                    <p class="m-0">
                        <small class="text-muted">Enter product latitude.</small>
                    </p>
                @enderror
            </div>

            <div class="col-lg-6 col-md-6 col-sm-12 position-relative">
                <label class="form-label" style="font-size: 15px" for="longitude">Longitude <span
                        class="text-danger">*</span></label>
                <input type="number" class="form-control @error('longitude') is-invalid @enderror" id="longitude"
                    name="longitude" placeholder="Longitude"
                    value="{{ isset($product) ? $product->long : old('longitude') }}" />
                @error('longitude')
                    <div class="invalid-feedback">{{ $message }}</div>
                @else
                    <p class="m-0">
                        <small class="text-muted">Enter product longitude.</small>
                    </p>
                @enderror
            </div>
        </div>

        {{-- <div class="row mb-3">
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 mb-2">
                <label class="form-label" style="font-size: 15px" for="status">Status <span
                        class="text-danger">*</span></label>
                <select class="select2-size-lg form-select" id="status" name="status">
                    @foreach ($statuses as $key => $status)
                        <option data-icon="material-icons md-keyboard_arrow_right" value="{{ $key }}"
                            {{ (isset($product) ? $product->status : old('status')) == $key ? 'selected' : '' }}>
                            {{ Str::of($status)->replace('_', ' ') }}</option>
                    @endforeach
                </select>
                @error('status')
                    <div class="invalid-feedback">{{ $message }}</div>
                @else
                    <p class="m-0">
                        <small class="text-muted">Select status for product.</small>
                    </p>
                @enderror
            </div>
        </div> --}}

        {{-- <div class="row mb-3">
            <div class="col-lg-12 col-md-12 col-sm-12 position-relative">
                <label class="form-label" style="font-size: 15px" for="reason">
                    Reason
                </label>

                <input type="text" class="form-control @error('reason') is-invalid @enderror" id="reason"
                    name="reason" placeholder="Reason" value="{{ isset($product) ? $product->reason : old('reason') }}"
                    minlength="1" maxlength="254" />

                @error('reason')
                    <div class="invalid-feedback">{{ $message }}</div>
                @else
                    <p class="m-0">
                        <small class="text-muted">Enter reason.</small>
                    </p>
                @enderror
            </div>
        </div> --}}

    </div>
</div>



{{-- 'seller_id',
'shop_id',

'name',

'permalink',
'sku',
'price',

'short_description',
'long_description',

'keywords',

'meta_aurthor',
'meta_keywords',
'meta_description',

'status',
'reason', --}}
