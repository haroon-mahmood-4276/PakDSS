@extends('seller.layout.layout')

@section('seo-breadcrumb')
    {{ Breadcrumbs::view('breadcrumbs::json-ld', 'seller.requests.index', $request_for) }}
@endsection

@section('page-title', Str::of($request_for)->ucfirst())

@section('page-css')
    {{ view('seller.layout.datatables.css') }}
@endsection

@section('custom-css')
@endsection

@section('breadcrumbs')
    <div class="d-flex justify-content-start align-items-center mb-3">
        <h2 class="content-header-title float-start mb-0 mx-3">{{ Str::of($request_for)->ucfirst() }}</h2>
        {{ Breadcrumbs::render('seller.requests.index', $request_for) }}
    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    {{-- <form action="{{ route('seller.products.destroy') }}" id="products-table-form" method="get"> --}}
                    {{ $dataTable->table() }}
                    {{-- </form> --}}
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
