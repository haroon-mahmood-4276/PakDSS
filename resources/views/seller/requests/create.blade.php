@extends('seller.layout.layout')

@section('seo-breadcrumb')
    {{ Breadcrumbs::view('breadcrumbs::json-ld', 'seller.requests.create', $requestFor) }}
@endsection

@section('page-title', 'Create Request')

@section('page-css')
    {{ view('seller.layout.filepond.css', ['isHalf' => false]) }}
@endsection

@section('custom-css')
@endsection

@section('breadcrumbs')
    <div class="d-flex justify-content-start align-items-center mb-3">
        <h2 class="content-header-title float-start mb-0 mx-3">Create Request</h2>
        {{ Breadcrumbs::render('seller.requests.create', $requestFor) }}
    </div>
@endsection

@section('content')
    <form class="form form-vertical" action="{{ route('seller.requests.store', ['request' => $requestFor]) }}" method="POST"
        enctype="multipart/form-data">

        @csrf
        {{ view('seller.requests.form-fields') }}

    </form>
@endsection

@section('page-js')
    {{ view('seller.layout.filepond.js') }}
@endsection

@section('custom-js')
    <script>
        $(document).ready(function() {
            $('#name').on('keyup blur', function() {
                $("#slug").val($(this).val().toLowerCase().trim().replace(/[\/\\]/g, '').replace(/\s+/g,
                    ' ').replace(/[^a-z0-9 ]/gi, '').replace(/\s/g, '-'));
            });
        });

        window.addEventListener('load', function() {
            FilePond.create(document.getElementById('product_images'), {
                styleButtonRemoveItemPosition: 'right',
                imageCropAspectRatio: '1:1',
                acceptedFileTypes: ['image/png', 'image/jpeg', 'image/jpg'],
                labelFileTypeNotAllowed: 'Unsupported file type',
                maxFileSize: '536KB',
                ignoredFiles: ['.ds_store', 'thumbs.db', 'desktop.ini'],
                storeAsFile: true,
                allowMultiple: true,
                maxFiles: 3,
                checkValidity: true,
                credits: {
                    label: '',
                    url: ''
                }
            });
        });
    </script>
@endsection
