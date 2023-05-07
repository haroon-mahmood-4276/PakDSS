@extends('admin.layout.layout')

@section('seo-breadcrumb')
    {{ Breadcrumbs::view('breadcrumbs::json-ld', 'admin.users.edit') }}
@endsection

@section('page-title', 'Edit User')

@section('page-vendor')
@endsection

@section('page-css')
@endsection

@section('custom-css')
@endsection

@section('breadcrumbs')
    <div class="d-flex justify-content-start align-items-center mb-3">
        <h2 class="content-header-title float-start mb-0 mx-3">Edit User</h2>
        {{ Breadcrumbs::render('admin.users.edit') }}
    </div>
@endsection

@section('content')
    <form class="form form-vertical" action="{{ route('admin.users.update', ['id' => $user->id]) }}" method="POST" enctype="multipart/form-data">

        @method('PUT')
        @csrf
        {{ view('admin.users.form-fields', ['user' => $user, 'roles' => $roles]) }}

    </form>
@endsection

@section('vendor-js')
@endsection

@section('page-js')
@endsection

@section('custom-js')
@endsection
