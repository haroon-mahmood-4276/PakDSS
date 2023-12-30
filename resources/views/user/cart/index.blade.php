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
    <section class="bg-white">
        <div class="container-xxl flex-grow-1 container-p-y">
           
        </div>
    </section>
@endsection

@section('vendor-js')
@endsection

@section('page-js')
@endsection
