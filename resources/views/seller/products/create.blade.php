@extends('seller.layout.layout')

@section('seo-breadcrumb')
    {{ Breadcrumbs::view('breadcrumbs::json-ld', 'seller.products.create') }}
@endsection

@section('page-title', 'Create Products')

@section('page-css')
    {{ view('seller.layout.filepond.css', ['isHalf' => true]) }}
    <link rel="stylesheet" href="{{ asset('admin-assets') }}/vendors/tagify/tagify.min.css">
@endsection

@section('custom-css')
@endsection

@section('breadcrumbs')
    <div class="d-flex justify-content-start align-items-center mb-3">
        <h2 class="content-header-title float-start mb-0 mx-3">Create Products</h2>
        {{ Breadcrumbs::render('seller.products.create') }}
    </div>
@endsection

@section('content')
    <form class="form form-vertical" action="{{ route('seller.products.store') }}" method="POST" enctype="multipart/form-data">

        @csrf
        @include('seller.products.form-fields')

    </form>
@endsection

@section('page-js')
    {{ view('seller.layout.filepond.js') }}

    <script src="{{ asset('admin-assets') }}/vendors/tagify/tagify.min.js"></script>
    <script src="{{ asset('admin-assets') }}/vendors/tagify/tagify.polyfills.min.js"></script>

    <script src="{{ asset('admin-assets') }}/vendors/tinymce/tinymce.min.js" referrerpolicy="origin"></script>
    <script src="{{ asset('admin-assets') }}/vendors/tinymce/tinymce-jquery.min.js"></script>

@endsection

@section('custom-js')
    @include('seller.products.form-fields-js', ['source' => 'create'])
@endsection
