@extends('seller.layout.layout')

@section('seo-breadcrumb')
    {{ Breadcrumbs::view('breadcrumbs::json-ld', 'seller.shops.edit') }}
@endsection

@section('page-title', 'Edit Shops')

@section('page-css')
    @include('seller.layout.filepond.css')
@endsection

@section('custom-css')
@endsection

@section('breadcrumbs')
    <div class="d-flex justify-content-start align-items-center mb-3">
        <h2 class="content-header-title float-start mb-0 mx-3">Edit Shops</h2>
        {{ Breadcrumbs::render('seller.shops.edit') }}
    </div>
@endsection

@section('content')
    <form class="form form-vertical" action="{{ route('seller.shops.update', ['shop' => $shop->id]) }}" method="POST"
        enctype="multipart/form-data">

        @method('PUT')
        @csrf
        @include('seller.shops.form-fields')

    </form>
@endsection

@section('page-js')
    @include('seller.layout.filepond.js')
@endsection

@section('custom-js')
    @include('seller.shops.form-fields-js', ['source' => 'edit', 'isReadOnly' => true])
@endsection
