@extends('seller.layout.layout')

@section('seo-breadcrumb')
    {{ Breadcrumbs::view('breadcrumbs::json-ld', 'seller.shops.create') }}
@endsection

@section('page-title', 'Categories')

@section('page-css')
@endsection

@section('custom-css')
@endsection

@section('breadcrumbs')
    <div class="d-flex justify-content-start align-items-center mb-3">
        <h2 class="content-header-title float-start mb-0 mx-3">Categories</h2>
        {{ Breadcrumbs::render('seller.shops.create') }}
    </div>
@endsection

@section('content')
    <form class="form form-vertical" action="{{ route('seller.shops.store') }}" method="POST" enctype="multipart/form-data">

        <div class="row g-3">
            <div class="col-lg-9 col-md-9 col-sm-12 position-relative">

                @csrf
                {{ view('seller.shops.form-fields') }}

            </div>

            <div class="col-lg-3 col-md-3 col-sm-12 position-relative">
                <div class="sticky-md-top top-lg-100px top-md-100px top-sm-0px" style="z-index: auto;">
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="row g-3">
                                <div class="col-md-12">
                                    <div class="d-block mb-1">
                                        <label class="form-label" style="font-size: 15px" for="brand_image">Brand
                                            Logo</label>
                                        <input id="brand_image" type="file"
                                            class="filepond m-0 @error('brand_image') is-invalid @enderror"
                                            name="brand_image" accept="image/png, image/jpeg, image/gif" />
                                        @error('brand_image')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @else
                                            <p class="m-0">
                                                <small class="text-muted">Upload brand logo.</small>
                                            </p>
                                        @enderror
                                    </div>

                                </div>
                            </div>

                            <hr>

                            <div class="row g-3">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-success w-100  buttonToBlockUI me-1">
                                        <i class="fa-solid fa-floppy-disk icon mx-2"></i>
                                        Save Brand
                                    </button>
                                </div>
                                <div class="col-md-12">
                                    <a href="{{ route('admin.brands.index') }}" class="btn btn-danger w-100 ">
                                        <i class="fa-solid fa-xmark icon mx-2"></i>
                                        Cancel
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <div class="alert alert-primary alert-dismissible d-flex align-items-baseline show fade" role="alert">
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
                            <div class="alert alert-warning alert-dismissible d-flex align-items-baseline show fade" role="alert">
                                <span class="alert-icon alert-icon-lg text-warning me-2">
                                    <i class="material-icons md-48 md-warning"></i>
                                </span>
                                <div class="d-flex flex-column ps-1">
                                    <h4 class="alert-heading mb-2">Note!</h4>
                                    <div class="alert-body">
                                        Our inspector will visit your shop for verification. Please try to enter right shop address, latitude & longitude.
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
    </form>
@endsection

@section('page-js')
@endsection

@section('custom-js')
@endsection
