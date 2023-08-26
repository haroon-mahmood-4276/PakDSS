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
                <label class="form-label" style="font-size: 15px" for="email">Email <span
                        class="text-danger">*</span></label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                    name="email" placeholder="Email" value="{{ isset($shop) ? $shop->email : old('email') }}" />
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
                <input type="number" class="form-control @error('phone_1') is-invalid @enderror" id="phone_1"
                    name="phone_1" placeholder="Phone 1" value="{{ isset($shop) ? $shop->phone_1 : old('phone_1') }}" />
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
                <input type="number" class="form-control @error('phone_2') is-invalid @enderror" id="phone_2"
                    name="phone_2" placeholder="Phone 2" value="{{ isset($shop) ? $shop->phone_2 : old('phone_2') }}" />
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
                    placeholder="Address" minlength="1" maxlength="254" rows="5">{{ isset($shop) ? $shop->address : old('address') }}</textarea>

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

                <textarea class="form-control @error('pickup_address') is-invalid @enderror" id="pickup_address" name="pickup_address"
                    placeholder="Pickup Address" minlength="1" maxlength="254" rows="5">{{ isset($shop) ? $shop->pickup_address : old('pickup_address') }}</textarea>

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
                    placeholder="Description of shop" minlength="1" maxlength="254" rows="15">{{ isset($shop) ? $shop->description : old('description') }}</textarea>

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
                            id="latitude" name="latitude" placeholder="Latitude"
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
                            id="longitude" name="longitude" placeholder="Longitude"
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
                    id="manager_name" name="manager_name" placeholder="Name"
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
