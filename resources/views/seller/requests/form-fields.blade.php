<div class="row g-3">
    <div class="col-xl-8 col-lg-12 col-md-12 col-sm-12 position-relative">

        <div class="card mb-3">
            <div class="card-body">

                <div class="row mb-3">

                    <div class="col-lg-6 col-md-6 col-sm-6 position-relative">
                        <label class="form-label" style="font-size: 15px" for="name">Name <span
                                class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                            name="name" placeholder="Name" maxlength="50"
                            value="{{ isset($requestForData) ? $requestForData->name : old('name') }}" minlength="1" />
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @else
                            <small>Enter name.</small>
                        @enderror
                    </div>

                    <div class="col-lg-6 col-md-6 col-sm-12 position-relative">
                        <label class="form-label" style="font-size: 15px" for="slug">Slug</label>
                        <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug"
                            placeholder="Slug" name="slug" maxlength="50"
                            value="{{ isset($requestForData) ? $requestForData->slug : old('slug') }}" minlength="3" readonly />

                        @error('slug')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @else
                            <p class="m-0">
                                <small class="text-muted">Enter unique slug.</small>
                            </p>
                        @enderror
                    </div>

                </div>

            </div>
        </div>

    </div>

    <div class="col-xl-4 col-lg-12 col-md-12 col-sm-12 position-relative">
        <div class="sticky-md-top top-lg-20px top-md-20px top-sm-10px" style="z-index: auto;">

            <div class="card mb-4">
                <div class="card-body">
                    <div class="row g-3">
                        <div class="col-md-12">
                            <div class="d-block mb-1">
                                <label class="form-label" style="font-size: 15px" for="image">Images</label>
                                <input id="image" type="file"
                                    class="filepond m-0 @error('image') is-invalid @enderror" name="image"
                                    accept="image/png, image/jpeg, image/gif" />
                                @error('image')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @else
                                    <p class="m-0">
                                        <small class="text-muted">Upload product image. (Max Size: 536KB)</small>
                                    </p>
                                @enderror
                            </div>

                        </div>
                    </div>

                    <hr>

                    <div class="row g-3">
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <button type="submit" class="btn btn-success w-100 text-white buttonToBlockUI">
                                <i class="material-icons md-save"></i>
                                {{ isset($requestFor) ? 'Update' : 'Save' }}
                            </button>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <a href="{{ route('seller.products.index') }}" class="btn btn-danger w-100 ">
                                <i class="material-icons md-cancel"></i>
                                Cancel
                            </a>
                        </div>
                    </div>
                </div>
            </div>

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
                                Our inspector will visit your products for verification. Please try to enter right
                                product information.
                            </div>
                            {{-- <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                        </button> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
