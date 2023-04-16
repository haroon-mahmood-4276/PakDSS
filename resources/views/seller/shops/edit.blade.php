@extends('seller.layout.layout')

@section('seo-breadcrumb')
    {{ Breadcrumbs::view('breadcrumbs::json-ld', 'seller.shops.create') }}
@endsection

@section('page-title', 'Shops')

@section('page-css')
    {{ view('seller.layout.filepond.css') }}
@endsection

@section('custom-css')
@endsection

@section('breadcrumbs')
    <div class="d-flex justify-content-start align-items-center mb-3">
        <h2 class="content-header-title float-start mb-0 mx-3">Shops</h2>
        {{ Breadcrumbs::render('seller.shops.create') }}
    </div>
@endsection

@section('content')
    <form class="form form-vertical" action="{{ route('seller.shops.store') }}" method="POST" enctype="multipart/form-data">

        <div class="row g-3">
            <div class="col-xl-9 col-lg-12 col-md-12 col-sm-12 position-relative">

                @csrf
                {{ view('seller.shops.form-fields', ['statuses' => $statuses]) }}

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
                                            class="filepond m-0 @error('shop_logo') is-invalid @enderror"
                                            name="shop_logo" accept="image/png, image/jpeg, image/gif" />
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
                                        Our inspector will visit your shop for verification. Please try to enter right shop
                                        address, latitude & longitude.
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
    {{ view('seller.layout.filepond.js') }}
@endsection

@section('custom-js')
    <script>
         $(document).ready(function() {
            $('#name').on('keyup blur', function() {
                $('#slug').val($(this).val().toLowerCase().trim().replace(/[\/\\]/g, '').replace(/\s+/g,
                    ' ').replace(/[^a-z0-9- ]/gi, '').replace(/-+/g, '-').replace(/\s/g, '-'));
            });
        });

        window.addEventListener('load', function() {
            FilePond.create(document.getElementById('shop_logo'), {
                styleButtonRemoveItemPosition: 'right',
                imageCropAspectRatio: '1:1',
                acceptedFileTypes: ['image/png', 'image/jpeg', 'image/jpg'],
                maxFileSize: '536KB',
                ignoredFiles: ['.ds_store', 'thumbs.db', 'desktop.ini'],
                storeAsFile: true,
                // allowMultiple: true,
                // maxFiles: 2,
                checkValidity: true,
                credits: {
                    label: '',
                    url: ''
                }
            });

        });
    </script>
@endsection
