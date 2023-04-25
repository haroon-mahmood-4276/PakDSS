@extends('seller.layout.layout')

@section('seo-breadcrumb')
    {{ Breadcrumbs::view('breadcrumbs::json-ld', 'seller.categories.index') }}
@endsection

@section('page-title', 'Categories')

@section('page-css')
    {{ view('seller.layout.datatables.css') }}
@endsection

@section('custom-css')
@endsection

@section('breadcrumbs')
    <div class="d-flex justify-content-start align-items-center mb-3">
        <h2 class="content-header-title float-start mb-0 mx-3">Categories</h2>
        {{ Breadcrumbs::render('seller.categories.index') }}
    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    {{ $dataTable->table() }}
                </div>
            </div>
        </div>
    </div>
@endsection

@section('page-js')
    {{ view('seller.layout.datatables.js') }}
@endsection

@section('custom-js')
    {{ $dataTable->scripts() }}
@endsection
