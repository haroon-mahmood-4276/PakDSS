@extends('admin.layout.layout')

@section('seo-breadcrumb')
    {{ Breadcrumbs::view('breadcrumbs::json-ld', 'admin.settings.tab_general.index', $tab) }}
@endsection

@section('page-title', ucfirst($tab) . ' Setting')

@section('page-css')
@endsection

@section('custom-css')
@endsection

@section('breadcrumbs')
    <div class="d-flex justify-content-start align-items-center mb-3">
        <h2 class="content-header-title float-start mb-0 me-3">{{ ucfirst($tab) }} Setting</h2>
        {{ Breadcrumbs::render('admin.settings.tab_general.index', $tab) }}
    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="nav-align-top mb-4">
                <ul class="nav nav-pills" role="tablist">
                    @foreach ($tabs as $key => $rowTab)
                        <li class="nav-item" role="presentation">
                            <a href="{{ route('admin.settings.index', ['tab' => $key ]) }}"
                                class="nav-link {{ $tab === $key ? 'active' : '' }}" role="tab">
                                <i class="{{ $rowTab['icon'] }} me-2"></i>
                                <span>{{ $rowTab['title'] }}</span>
                            </a>
                        </li>
                    @endforeach
                </ul>

                <hr>

                @includeIf('admin.settings.' . $tab . '.index', ['sections' => $tabs[$tab]['sections']])
            </div>
        </div>
    </div>
@endsection
