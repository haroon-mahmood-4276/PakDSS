@extends('seller.layout.layout')

@section('seo-breadcrumb')
    {{ Breadcrumbs::view('breadcrumbs::json-ld', 'seller.brands.index') }}
@endsection

@section('page-title', 'Dashboard')

@section('custom-css')
    <style>
    </style>
@endsection

@section('breadcrumbs')
    <div class="content-header">
        <div>
            <div class="d-flex justify-content-start align-items-center position-relative">
                <h2 class="content-title card-title">Brands</h2>
                <div class="breadcrumb-divider mx-2"></div>
                <div class="custom-breadcrumb">{{ Breadcrumbs::render('seller.brands.index') }}</div>
            </div>
            <p>Brands list</p>
        </div>
        {{-- <div>
            <a class="btn btn-primary" href="#">
                <i class="text-muted material-icons md-post_add"></i>Add New Brand
            </a>
        </div> --}}
    </div>
@endsection

@section('content')
    <div class="card mb-4">
        <header class="card-header">
            <div class="row gx-3">
                <div class="col-lg-4 mb-lg-0 mb-15 me-auto">
                    <input class="form-control" type="text" placeholder="Search...">
                </div>
                <div class="col-lg-2 col-6">
                    <div class="custom_select">
                        <select class="form-select select-nice">
                            <option selected="">Categories</option>
                            <option>Technology</option>
                            <option>Fashion</option>
                            <option>Home Decor</option>
                            <option>Healthy</option>
                            <option>Travel</option>
                            <option>Auto-car</option>
                        </select>
                    </div>
                </div>
                <div class="col-lg-2 col-6">
                    <input class="form-control" type="date" name="">
                </div>
            </div>
        </header>
        <div class="card-body">
            <div class="row gx-3">

                @forelse ($brands as $brand)
                    <div class="col-xl-2 col-lg-3 col-md-4 col-6">
                        <figure class="card border-1">
                            <div class="card-header bg-white text-center">
                                <img class="img-fluid" height="76"
                                    src="{{ asset('seller-assets') }}/imgs/brands/brand-1.jpg" alt="Logo">
                            </div>
                            <figcaption class="card-body text-center">
                                <h6 class="card-title m-0">{{ $brand->name }}</h6>
                                <a href="#"> 0 products</a> | {{ $brand->categories_count }} categories
                            </figcaption>
                        </figure>
                    </div>
                @empty
                @endforelse

                {{ $brands->onEachSide(2)->links('seller.layout.pagination.bootstrap-5') }}

            </div>

        </div>
    </div>
@endsection

@section('page-js')
@endsection

@section('custom-js')
@endsection
