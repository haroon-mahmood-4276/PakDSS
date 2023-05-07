@extends('admin.layout.layout')

@section('seo-breadcrumb')
    {{ Breadcrumbs::view('breadcrumbs::json-ld', 'admin.users.create') }}
@endsection

@section('page-title', 'Create User')

@section('page-vendor')
@endsection

@section('page-css')
@endsection

@section('custom-css')
@endsection

@section('breadcrumbs')
    <div class="d-flex justify-content-start align-items-center mb-3">
        <h2 class="content-header-title float-start mb-0 mx-3">Create User</h2>
        {{ Breadcrumbs::render('admin.users.create') }}
    </div>
@endsection

@section('content')
    <form class="form form-vertical" action="{{ route('admin.users.store') }}" method="POST" enctype="multipart/form-data">

        @csrf
        {{ view('admin.users.form-fields', ['roles' => $roles]) }}

    </form>
@endsection

@section('vendor-js')
@endsection

@section('page-js')
@endsection

@section('custom-js')
@endsection
