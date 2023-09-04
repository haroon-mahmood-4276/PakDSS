@extends('seller.layout.layout')

@section('seo-breadcrumb')
    {{ Breadcrumbs::view('breadcrumbs::json-ld', 'seller.shops.create') }}
@endsection

@section('page-title', 'Create Shops')

@section('page-css')
    {{ view('seller.layout.filepond.css') }}
@endsection

@section('custom-css')
@endsection

@section('breadcrumbs')
    <div class="d-flex justify-content-start align-items-center mb-3">
        <h2 class="content-header-title float-start mb-0 mx-3">Create Shops</h2>
        {{ Breadcrumbs::render('seller.shops.create') }}
    </div>
@endsection

@section('content')
    <form class="form form-vertical" action="{{ route('seller.shops.store') }}" method="POST"
          enctype="multipart/form-data">

        @csrf
        @include('seller.shops.form-fields')

    </form>
@endsection

@section('page-js')
    {{ view('seller.layout.filepond.js') }}
@endsection

@section('custom-js')
   @include('seller.shops.form-fields-js', ['source' => 'create'])
@endsection
