@extends('seller.layout.layout')

@section('seo-breadcrumb')
    {{ Breadcrumbs::view('breadcrumbs::json-ld', 'seller.products.edit') }}
@endsection

@section('page-title', 'Edit Products')

@section('page-css')
    @include('seller.layout.filepond.css', ['isHalf' => true])
    <link rel="stylesheet" href="{{ asset('seller-assets') }}/vendors/tagify/tagify.min.css">
@endsection

@section('custom-css')
@endsection

@section('breadcrumbs')
    <div class="d-flex justify-content-start align-items-center mb-3">
        <h2 class="content-header-title float-start mb-0 mx-3">Edit Products</h2>
        {{ Breadcrumbs::render('seller.products.edit') }}
    </div>
@endsection

@section('content')
    <form class="form form-vertical" action="{{ route('seller.products.update', ['id' => $product->id]) }}" method="POST"
        enctype="multipart/form-data">

        @method('PUT')
        @csrf
        @include('seller.products.form-fields')

    </form>
@endsection

@section('page-js')
    @include('seller.layout.filepond.js')

    <script src="{{ asset('seller-assets') }}/vendors/tagify/tagify.min.js"></script>
    <script src="{{ asset('seller-assets') }}/vendors/tagify/tagify.polyfills.min.js"></script>

    <script src="{{ asset('seller-assets') }}/vendors/tinymce/tinymce.min.js" referrerpolicy="origin"></script>
    <script src="{{ asset('seller-assets') }}/vendors/tinymce/tinymce-jquery.min.js"></script>

@endsection

@section('custom-js')
    @include('seller.products.form-fields-js', ['source' => 'edit'])
@endsection
