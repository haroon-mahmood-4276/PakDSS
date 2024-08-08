@extends('admin.layout.layout')

@section('seo-breadcrumb')
    {{ Breadcrumbs::view('breadcrumbs::json-ld', 'admin.homepage.sliders.edit') }}
@endsection

@section('page-title', 'Edit slider')

@section('page-vendor')
@endsection

@section('page-css')
    <link rel="stylesheet" type="text/css" href="{{ asset('admin-assets') }}/vendor/libs/filepond/filepond.min.css">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('admin-assets') }}/vendor/libs/filepond/plugins/filepond.preview.min.css">
@endsection

@section('custom-css')
    <style>
        .filepond--drop-label {
            color: #7367F0 !important;
        }

        .filepond--item-panel {
            background-color: #7367F0;
        }

        .filepond--panel-root {
            background-color: #e3e0fd;
        }

        /* .filepond--item {
                    width: calc(20% - 0.5em);
                } */
    </style>
@endsection

@section('breadcrumbs')
    <div class="d-flex justify-content-start align-items-center mb-3">
        <h2 class="content-header-title float-start mb-0 mx-3">Edit Slider</h2>
        {{ Breadcrumbs::render('admin.homepage.sliders.edit') }}
    </div>
@endsection

@section('content')
    <form class="form form-vertical" action="{{ route('admin.homepage.sliders.update', ['slider' => $slider->id]) }}"
        method="POST" enctype="multipart/form-data">

        <div class="row g-3">
            <div class="col-lg-9 col-md-9 col-sm-12 position-relative">

                @csrf
                @method('PUT')
                @include('admin.homepage.sliders.form-fields')

            </div>

            <div class="col-lg-3 col-md-3 col-sm-12 position-relative">
                <div class="sticky-md-top top-lg-100px top-md-100px top-sm-0px" style="z-index: auto;">
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="row g-3">
                                <div class="col-md-12">
                                    <div class="d-block mb-1">
                                        <label class="form-label" style="font-size: 15px" for="slider_image">Slider
                                            Image</label>
                                        <input id="slider_image" type="file"
                                            class="filepond m-0 @error('slider_image') is-invalid @enderror"
                                            name="slider_image" accept="image/png, image/jpeg, image/gif, image/webp" />
                                        @error('slider_image')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @else
                                            <p class="m-0">
                                                <small class="text-muted">Upload slider image.</small>
                                            </p>
                                        @enderror
                                    </div>

                                </div>
                            </div>

                            <hr>

                            <div class="row g-3">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-success w-100  buttonToBlockUI me-1">
                                        <i class="fa-solid fa-floppy-disk icon me-2"></i>
                                        Update Slider
                                    </button>
                                </div>
                                <div class="col-md-12">
                                    <a href="{{ route('admin.homepage.sliders.index') }}" class="btn btn-danger w-100 ">
                                        <i class="fa-solid fa-xmark icon me-2"></i>
                                        Cancel
                                    </a>
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
@endsection

@section('vendor-js')
@endsection

@section('page-js')
    <script src="{{ asset('admin-assets') }}/vendor/libs/filepond/plugins/filepond.preview.min.js"></script>
    <script src="{{ asset('admin-assets') }}/vendor/libs/filepond/plugins/filepond.typevalidation.min.js"></script>
    <script src="{{ asset('admin-assets') }}/vendor/libs/filepond/plugins/filepond.imagecrop.min.js"></script>
    <script src="{{ asset('admin-assets') }}/vendor/libs/filepond/plugins/filepond.imagesizevalidation.min.js"></script>
    <script src="{{ asset('admin-assets') }}/vendor/libs/filepond/plugins/filepond.filesizevalidation.min.js"></script>
    <script src="{{ asset('admin-assets') }}/vendor/libs/filepond/filepond.min.js"></script>
@endsection

@section('custom-js')
    @include('admin.homepage.sliders.form-fields-js', ['source' => 'edit'])
@endsection
