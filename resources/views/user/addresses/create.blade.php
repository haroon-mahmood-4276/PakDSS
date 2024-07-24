@extends('user.layout.layout', [''])

@section('seo-breadcrumb')
    {{ Breadcrumbs::view('breadcrumbs::json-ld', 'user.home') }}
@endsection

@section('page-title', 'Create Address')

@section('vendor-css')
@endsection

@section('page-css')
@endsection

@section('breadcrumbs')
@endsection

@section('content')
    <section class="bg-white">
        <div class="container-xxl flex-grow-1 container-p-y">
            <form class="form form-vertical" action="{{ route('user.addresses.store') }}" method="POST"
                enctype="multipart/form-data">

                <div class="row">
                    <div class="col-lg-9 col-md-9 col-sm-12 position-relative">

                        @csrf
                        @include('user.addresses.form-fields', ['from' => 'create'])

                    </div>

                    <div class="col-lg-3 col-md-3 col-sm-12 position-relative">
                        <div class="sticky-md-top top-lg-100px top-md-100px top-sm-0px" style="z-index: auto;">
                            <div class="card mb-4">
                                <div class="card-body">
                                    <div class="row g-3">
                                        <div class="col-md-12">
                                            <button type="submit" class="btn btn-success w-100  buttonToBlockUI me-1">
                                                <i class="fa-solid fa-floppy-disk icon mx-2"></i>
                                                Save Address
                                            </button>
                                        </div>
                                        <div class="col-md-12">
                                            <a href="{{ route('user.addresses.index') }}" class="btn btn-danger w-100 ">
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
                                        <h4 class="alert-heading"><i data-feather="info" class="me-50"></i>Information!
                                        </h4>
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
        </div>
    </section>
@endsection

@section('vendor-js')
@endsection

@section('page-js')
    @include('user.addresses.form-fields-js')
@endsection
