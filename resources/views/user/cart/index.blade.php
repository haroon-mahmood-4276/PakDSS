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
    <livewire:user.cart.index />
@endsection

@section('vendor-js')
@endsection

@section('page-js')
    {{-- <script>
        $(document).ready(function() {
            $('.btn-delete-item').on('click', function() {
                window.location.replace("{{ route('user.cart.delete', ['cart' => ':cart_id']) }}".replace(
                    ':cart_id', $(this).data('referance')))
            })
            $('#btn-update-cart').on('click', function() {
                $('#form-cart').submit();
            })
        });
    </script> --}}
@endsection
