@extends('admin.layout.layout')

@section('seo-breadcrumb')
    {{ Breadcrumbs::view('breadcrumbs::json-ld', 'admin.settings.tab_sites.index', $tab) }}
@endsection

@section('page-title', ucfirst($tab) . ' Setting')

@section('page-vendor')
@endsection

@section('page-css')
@endsection

@section('custom-css')
@endsection

@section('breadcrumbs')
    <div class="d-flex justify-content-start align-items-center mb-3">
        <h2 class="content-header-title float-start mb-0 me-3">{{ ucfirst($tab) }} Setting</h2>
        {{ Breadcrumbs::render('admin.settings.tab_sites.index', $tab) }}
    </div>
@endsection

@section('content')

    <div class="row">
        <div class="col-12">
            <div class="nav-align-top mb-4">
                <ul class="nav nav-pills mb-3" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a href="{{ route('admin.settings.index', ['tab' => 'admin']) }}"
                            class="nav-link {{ $tab === 'admin' ? 'active' : '' }}" role="tab">
                            <i class="fa-solid fa-user-shield me-2"></i>
                            <span>Admin</span>
                        </a>
                    </li>
                    {{-- <li class="nav-item" role="presentation">
                        <a href="{{ route('admin.settings.index', ['tab' => 'seller']) }}"
                            class="nav-link {{ $tab === 'seller' ? 'active' : '' }}" role="tab">
                            <i class="fa-solid fa-person-shelter me-2"></i>
                            <span>Seller </span>
                        </a>
                    <li class="nav-item" role="presentation">
                        <a href="{{ route('admin.settings.index', ['tab' => 'site']) }}"
                            class="nav-link {{ $tab === 'site' ? 'active' : '' }}" role="tab">
                            <i class="fa-solid fa-globe me-2"></i>
                            <span>Site</span>
                        </a> --}}
                    </li>
                </ul>
                {{ view('admin.settings.' . $tab . '-fileds', ['tab' => $tab]) }}
            </div>
        </div>
    </div>
@endsection

@section('vendor-js')
@endsection

@section('page-js')
@endsection

@section('custom-js')
@endsection
