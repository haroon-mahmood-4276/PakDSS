@extends('admin.layout.layout')

@section('seo-breadcrumb')
    {{ Breadcrumbs::view('breadcrumbs::json-ld', 'admin.sellers.shops.create', $seller) }}
@endsection

@section('page-title', 'Edit Shops')

@section('page-css')
    {{ view('admin.layout.filepond.css') }}
@endsection

@section('custom-css')
@endsection

@section('breadcrumbs')
    <div class="d-flex justify-content-start align-items-center mb-3">
        <h2 class="content-header-title float-start mb-0 mx-3">Edit Shops</h2>
        {{ Breadcrumbs::render('admin.sellers.shops.create', $seller) }}
    </div>
@endsection

@section('content')
    <form class="form form-vertical" action="{{ route('admin.sellers.shops.update', [$seller, $shop]) }}" method="POST"
          enctype="multipart/form-data">

        <div class="row g-3">
            <div class="col-xl-9 col-lg-12 col-md-12 col-sm-12 position-relative">

                @csrf
                @method('PUT')
                @include('admin.sellers.shops.form-fields')

            </div>

            <div class="col-lg-3 col-md-3 col-sm-12 position-relative">
                <div class="sticky-md-top top-lg-100px top-md-100px top-sm-0px" style="z-index: auto;">
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="row g-3">
                                <div class="col-md-12">
                                    <div class="d-block mb-1">
                                        <label class="form-label" style="font-size: 15px" for="shop_logo">Shop
                                            Logo</label>
                                        <input id="shop_logo" type="file"
                                               class="filepond m-0 @error('shop_logo') is-invalid @enderror"
                                               name="shop_logo" accept="image/png, image/jpeg, image/gif"/>
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
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-success w-100  buttonToBlockUI me-1">
                                        <i class="fa-solid fa-floppy-disk icon mx-2"></i>
                                        Update Shop
                                    </button>
                                </div>
                                <div class="col-md-12">
                                    <a href="{{ route('admin.sellers.shops.index', $seller) }}" class="btn btn-danger w-100 ">
                                        <i class="fa-solid fa-xmark icon mx-2"></i>
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

@section('page-js')
    {{ view('admin.layout.filepond.js') }}
@endsection

@section('custom-js')
<script>
    $(document).ready(function () {
        $('#name').on('keyup blur', function () {
            $('#slug').val($(this).val().toLowerCase().trim().replace(/[\/\\]/g, '').replace(/\s+/g,
                ' ').replace(/[^a-z0-9- ]/gi, '').replace(/-+/g, '-').replace(/\s/g, '-'));
        });
    });

    window.addEventListener('load', function () {

        var files = [];
        @forelse($shop_logo as $image)
        files.push({
            source: '{{ $image->getFullUrl() }}',
        });
        @empty
        @endforelse

        FilePond.create(document.getElementById('shop_logo'), {
            files: files,
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
