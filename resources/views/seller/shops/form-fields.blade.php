<div class="row g-3">
    <div class="col-xl-9 col-lg-12 col-md-12 col-sm-12 position-relative">
        <div class="card mb-3">
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-lg-6 col-md-6 col-sm-12 position-relative">
                        <label class="form-label" style="font-size: 15px" for="name">Name <span
                                class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                            {{ isset($isReadOnly) && $isReadOnly ? 'readonly' : '' }} name="name" placeholder="Name"
                            value="{{ isset($shop) ? $shop->name : old('name') }}" minlength="1" maxlength="50" />
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
                        <input type="text" class="form-control @error('slug') is-invalid @enderror"
                            {{ isset($isReadOnly) && $isReadOnly ? 'readonly' : '' }}id="slug" placeholder="Slug"
                            name="slug" value="{{ isset($shop) ? $shop->slug : old('slug') }}" minlength="1"
                            readonly maxlength="50" />

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
                        <label class="form-label" style="font-size: 15px" for="email">Email <span
                                class="text-danger">*</span></label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror"
                            {{ isset($isReadOnly) && $isReadOnly ? 'readonly' : '' }} id="email" name="email"
                            placeholder="Email" value="{{ isset($shop) ? $shop->email : old('email') }}" />
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @else
                            <p class="m-0">
                                <small class="text-muted">Enter shop email.</small>
                            </p>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-lg-6 col-md-6 col-sm-12 position-relative">
                        <label class="form-label" style="font-size: 15px" for="phone_1">Phone 1 <span
                                class="text-danger">*</span></label>
                        <input type="number" class="form-control @error('phone_1') is-invalid @enderror"
                            {{ isset($isReadOnly) && $isReadOnly ? 'readonly' : '' }} id="phone_1" name="phone_1"
                            placeholder="Phone 1" value="{{ isset($shop) ? $shop->phone_1 : old('phone_1') }}" />
                        @error('phone_1')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @else
                            <p class="m-0">
                                <small class="text-muted">Enter phone 1.</small>
                            </p>
                        @enderror
                    </div>

                    <div class="col-lg-6 col-md-6 col-sm-12 position-relative">
                        <label class="form-label" style="font-size: 15px" for="phone_2">Phone 2 </label>
                        <input type="number" class="form-control @error('phone_2') is-invalid @enderror"
                            {{ isset($isReadOnly) && $isReadOnly ? 'readonly' : '' }} id="phone_2" name="phone_2"
                            placeholder="Phone 2" value="{{ isset($shop) ? $shop->phone_2 : old('phone_2') }}" />
                        @error('phone_2')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @else
                            <p class="m-0">
                                <small class="text-muted">Enter phone 2.</small>
                            </p>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-lg-6 col-md-6 col-sm-12 position-relative">
                        <label class="form-label" style="font-size: 15px" for="address">
                            Address
                            <span class="text-danger">*</span>
                        </label>

                        <textarea class="form-control @error('address') is-invalid @enderror" id="address" name="address"
                            {{ isset($isReadOnly) && $isReadOnly ? 'readonly' : '' }} placeholder="Address" minlength="1" maxlength="254"
                            rows="5">{{ isset($shop) ? $shop->address : old('address') }}</textarea>

                        @error('address')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @else
                            <p class="m-0">
                                <small class="text-muted">Enter shop full address.</small>
                            </p>
                        @enderror
                    </div>

                    <div class="col-lg-6 col-md-6 col-sm-12 position-relative">
                        <label class="form-label" style="font-size: 15px" for="pickup_address">
                            Pickup Address
                            <span class="text-danger">*</span>
                        </label>

                        <textarea class="form-control @error('pickup_address') is-invalid @enderror" id="pickup_address"
                            {{ isset($isReadOnly) && $isReadOnly ? 'readonly' : '' }} name="pickup_address" placeholder="Pickup Address"
                            minlength="1" maxlength="254" rows="5">{{ isset($shop) ? $shop->pickup_address : old('pickup_address') }}</textarea>

                        @error('pickup_address')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @else
                            <p class="m-0">
                                <small class="text-muted">Enter shop full pickup address.</small>
                            </p>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-lg-6 col-md-6 col-sm-12 position-relative">
                        <label class="form-label" style="font-size: 15px" for="description">
                            Description of Shop
                            <span class="text-danger">*</span>
                        </label>

                        <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description"
                            {{ isset($isReadOnly) && $isReadOnly ? 'readonly' : '' }} placeholder="Description of shop" minlength="1"
                            maxlength="254" rows="15">{{ isset($shop) ? $shop->description : old('description') }}</textarea>

                        @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @else
                            <p class="m-0">
                                <small class="text-muted">Enter description of shop.</small>
                            </p>
                        @enderror
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 position-relative">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 position-relative">
                                <label class="form-label" style="font-size: 15px" for="latitude">Latitude</label>
                                <input type="number" class="form-control @error('latitude') is-invalid @enderror"
                                    {{ isset($isReadOnly) && $isReadOnly ? 'readonly' : '' }} id="latitude"
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

                            <div class="col-lg-12 col-md-12 col-sm-12 position-relative">
                                <label class="form-label" style="font-size: 15px" for="longitude">Longitude</label>
                                <input type="number" class="form-control @error('longitude') is-invalid @enderror"
                                    {{ isset($isReadOnly) && $isReadOnly ? 'readonly' : '' }} id="longitude"
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
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h3>Manager</h3>
            </div>
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-lg-6 col-md-6 col-sm-12 position-relative">
                        <label class="form-label" style="font-size: 15px" for="manager_name">Name <span
                                class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('manager_name') is-invalid @enderror"
                            {{ isset($isReadOnly) && $isReadOnly ? 'readonly' : '' }} id="manager_name"
                            name="manager_name" placeholder="Name"
                            value="{{ isset($shop) ? $shop->manager_name : old('manager_name') }}" minlength="1"
                            maxlength="50" />
                        @error('manager_name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @else
                            <p class="m-0">
                                <small class="text-muted">Enter shop manager_name.</small>
                            </p>
                        @enderror
                    </div>

                    <div class="col-lg-6 col-md-6 col-sm-12 position-relative">
                        <label class="form-label" style="font-size: 15px" for="manager_mobile">Mobile<span
                                class="text-danger">*</span></label>
                        <input type="number" class="form-control @error('manager_mobile') is-invalid @enderror"
                            id="manager_mobile" placeholder="mobile" name="manager_mobile"
                            {{ isset($isReadOnly) && $isReadOnly ? 'readonly' : '' }}
                            value="{{ isset($shop) ? $shop->manager_mobile : old('manager_mobile') }}" minlength="1"
                            axlength="50" />

                        @error('manager_mobile')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @else
                            <p class="m-0">
                                <small class="text-muted">Shop manager mobile.</small>
                            </p>
                        @enderror
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 position-relative">
                        <label class="form-label" style="font-size: 15px" for="manager_email">Email </label>
                        <input type="manager_email" class="form-control @error('manager_email') is-invalid @enderror"
                            id="manager_email" name="manager_email" placeholder="Email"
                            {{ isset($isReadOnly) && $isReadOnly ? 'readonly' : '' }}
                            value="{{ isset($shop) ? $shop->manager_email : old('manager_email') }}" />
                        @error('manager_email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @else
                            <p class="m-0">
                                <small class="text-muted">Enter manager email.</small>
                            </p>
                        @enderror
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-lg-12 col-md-12 col-sm-12 position-relative">
        <div class="sticky-md-top top-lg-20px top-md-20px top-sm-10px" style="z-index: auto;">
            <div class="card mb-4">
                <div class="card-body">
                    <div class="row g-3">
                        <div class="col-md-12">
                            <div class="d-block mb-1">
                                <label class="form-label" style="font-size: 15px" for="shop_logo">Shop
                                    Logo</label>
                                <input id="shop_logo" type="file"
                                    class="filepond m-0 @error('shop_logo') is-invalid @enderror" name="shop_logo"
                                    accept="image/png, image/jpeg, image/gif" />
                                @error('shop_logo')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @else
                                    <p class="m-0">
                                        <small class="text-muted">Upload shop logo.</small>
                                    </p>
                                @enderror
                            </div>

                        </div>
                    </div>

                    @if (!isset($isReadOnly))
                        <hr>

                        <div class="row g-3">
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <button type="submit" class="btn btn-success w-100 text-white buttonToBlockUI">
                                    <i class="material-icons md-save"></i>
                                    Save Shop
                                </button>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <a href="{{ route('seller.shops.index') }}" class="btn btn-danger w-100 ">
                                    <i class="material-icons md-cancel"></i>
                                    Cancel
                                </a>
                            </div>
                        </div>
                    @endif
                </div>
            </div>

            @if (!isset($isReadOnly))
                <div class="row">
                    <div class="col-12">
                        <div class="alert alert-primary alert-dismissible d-flex align-items-baseline show fade"
                            role="alert">
                            <span class="alert-icon alert-icon-lg text-info me-2">
                                <i class="material-icons md-48 md-info"></i>
                            </span>
                            <div class="d-flex flex-column ps-1">
                                <h4 class="alert-heading mb-2">Information!</h4>
                                <div class="alert-body">
                                    <span class="text-danger">*</span> means required field. <br>
                                    <span class="text-danger">**</span> means required field and must be unique.
                                </div>
                                {{-- <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                            </button> --}}
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="alert alert-warning alert-dismissible d-flex align-items-baseline show fade"
                            role="alert">
                            <span class="alert-icon alert-icon-lg text-warning me-2">
                                <i class="material-icons md-48 md-warning"></i>
                            </span>
                            <div class="d-flex flex-column ps-1">
                                <h4 class="alert-heading mb-2">Note!</h4>
                                <div class="alert-body">
                                    Our inspector will visit your shop for verification. Please try to enter right
                                    shop
                                    address, latitude & longitude.
                                </div>
                                {{-- <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                            </button> --}}
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
