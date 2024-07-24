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
    <section>
        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="row">
                <div class="col-xl-12">

                    @include('user.layout.alerts')

                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h5 class="m-0">Address Book</h5>
                        <a href="{{ route('user.addresses.create') }}" class="btn btn-primary waves-effect waves-light" id="btn-add-address">
                            <i class="fa-solid fa-plus me-1"></i>
                            Add Address</a>
                    </div>

                    <div class="row">
                        @forelse ($addresses as $address)
                            <div class="col-6 mb-4">
                                <div
                                    class="w-100 h-100 border {{ $address->default_delivery_address ? 'border-primary' : '' }} p-3 rounded">
                                    <span class="d-flex justify-content-between mb-2">
                                        <span class="fw-medium text-heading mb-0">{{ $address->name }}
                                            {{ $address->default_delivery_address ? '(Default)' : '' }}</span>
                                        <span
                                            class="badge {{ $address->address_type === 'office' ? 'bg-label-success' : 'bg-label-primary' }}">{{ ucfirst($address->address_type) }}</span>
                                    </span>
                                    <span>
                                        <small>{{ $address->address_1 }}, {{ $address->address_2 }}</small>
                                        <br>
                                        <small>Mobile: {{ $address->mobile_no }}</small>
                                        <span class="my-2 border-bottom d-block"></span>
                                        <span class="d-flex">
                                            <a class="me-2" href="{{ route('user.addresses.edit', ['address' => $address->id]) }}">Edit</a>
                                            <a class="me-2" href="{{ route('user.addresses.destroy', ['address' => $address->id]) }}">Remove</a>
                                        </span>
                                    </span>
                                </div>
                            </div>
                        @empty
                            <div class="col-12">
                                <div class="w-100 h-100 p-3 rounded">
                                    <h3>No address found! 😔</h3>
                                </div>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('vendor-js')
@endsection

@section('page-js')
@endsection
