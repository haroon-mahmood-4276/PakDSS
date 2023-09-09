@extends('user.layout.layout', [''])

@section('seo-breadcrumb')
    {{ Breadcrumbs::view('breadcrumbs::json-ld', 'user.home') }}
@endsection

@section('page-title', env('APP_NAME'))

@section('vendor-css')
@endsection

@section('page-css')
@endsection

@section('breadcrumbs')

@endsection

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">

        </div>
    </div>
@endsection

@section('vendor-js')
@endsection

@section('page-js')
    {{-- @vite(['resources/js/app.js']) --}}
@endsection
