@extends('seller.layout.layout')

@section('seo-breadcrumb')
    {{ Breadcrumbs::view('breadcrumbs::json-ld', 'seller.products.create') }}
@endsection

@section('page-title', 'Create Products')

@section('page-css')
    {{ view('seller.layout.filepond.css', ['isHalf' => true]) }}
    <link rel="stylesheet" href="{{ asset('seller-assets') }}/vendors/tagify/tagify.min.css">
@endsection

@section('custom-css')
@endsection

@section('breadcrumbs')
    <div class="d-flex justify-content-start align-items-center mb-3">
        <h2 class="content-header-title float-start mb-0 mx-3">Create Products</h2>
        {{ Breadcrumbs::render('seller.products.create') }}
    </div>
@endsection

@section('content')
    <form class="form form-vertical" action="{{ route('seller.products.store') }}" method="POST" enctype="multipart/form-data">

        @csrf
        {{ view('seller.products.form-fields', ['brands' => $brands, 'categories' => $categories, 'shops' => $shops, 'tags' => $tags]) }}

    </form>
@endsection

@section('page-js')
    {{ view('seller.layout.filepond.js') }}

    <script src="{{ asset('seller-assets') }}/vendors/tagify/tagify.min.js"></script>
    <script src="{{ asset('seller-assets') }}/vendors/tagify/tagify.polyfills.min.js"></script>

    <script src="{{ asset('seller-assets') }}/vendors/tinymce/tinymce.min.js" referrerpolicy="origin"></script>
    <script src="{{ asset('seller-assets') }}/vendors/tinymce/tinymce-jquery.min.js"></script>

@endsection

@section('custom-js')
    <script>
        $(document).ready(function() {
            $('#name').on('keyup blur', function() {
                let permalink = $(this).val().toLowerCase()
                    .trim().replace(/[\/\\]/g, '').replace(/\s+/g,
                        ' ').replace(/[^a-z0-9- ]/gi, '').replace(/-+/g, '-').replace(/\s/g, '-');
                $('#permalink').val(permalink);
                $('#permalink-text').html('{{ env('APP_URL') }}:8000/products/' + permalink);
            });


            $('#short_description').tinymce({
                height: 300,
                schema: 'html5-strict',
                invalid_elements: 'script,style',
                menubar: true,
                branding: false,
                plugins: [
                    'advlist', 'autolink', 'lists', 'link', 'image', 'charmap', 'preview',
                    'anchor', 'searchreplace', 'visualblocks', 'fullscreen',
                    'insertdatetime', 'media', 'table', 'code', 'help', 'wordcount'
                ],
                toolbar: 'undo redo | blocks | bold italic backcolor | ' +
                    'alignleft aligncenter alignright alignjustify | ' +
                    'bullist numlist outdent indent | removeformat | help',
                maxlength: 2,
                setup: function(editor) {
                    editor.on('keydown', function(e) {
                        var words = editor.plugins.wordcount.getCount();
                        if (words >= 2 && e.keyCode !== 8 && !e.ctrlKey && !e
                            .metaKey) {
                            e.preventDefault();
                            e.stopPropagation();
                            return false;
                        }
                    });
                }
            });

            $('#long_description').tinymce({
                height: 500,
                schema: 'html5-strict',
                invalid_elements: 'script,style',
                menubar: true,
                branding: false,
                plugins: [
                    'advlist', 'autolink', 'lists', 'link', 'image', 'charmap', 'preview',
                    'anchor', 'searchreplace', 'visualblocks', 'fullscreen',
                    'insertdatetime', 'media', 'table', 'code', 'help', 'wordcount'
                ],
                toolbar: 'undo redo | blocks | bold italic backcolor | ' +
                    'alignleft aligncenter alignright alignjustify | ' +
                    'bullist numlist outdent indent | removeformat | help',
                maxlength: 2,
                setup: function(editor) {
                    editor.on('keydown', function(e) {
                        var words = editor.plugins.wordcount.getCount();
                        if (words >= 2 && e.keyCode !== 8 && !e.ctrlKey && !e
                            .metaKey) {
                            e.preventDefault();
                            e.stopPropagation();
                            return false;
                        }
                    });
                }
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

            FilePond.create(document.getElementById('file_video'), {
                styleButtonRemoveItemPosition: 'right',
                imageCropAspectRatio: '1:1',
                acceptedFileTypes: ['video/mp4', 'image/jpeg', 'image/jpg'],
                labelFileTypeNotAllowed: 'Unsupported file type',
                maxFileSize: '536KB',
                ignoredFiles: ['.ds_store', 'thumbs.db', 'desktop.ini'],
                storeAsFile: true,
                maxFiles: 1,
                checkValidity: true,
                credits: {
                    label: '',
                    url: ''
                }
            });

            FilePond.create(document.getElementById('file_pdf'), {
                styleButtonRemoveItemPosition: 'right',
                imageCropAspectRatio: '1:1',
                acceptedFileTypes: ['application/pdf'],
                labelFileTypeNotAllowed: 'Unsupported file type',
                maxFileSize: '536KB',
                ignoredFiles: ['.ds_store', 'thumbs.db', 'desktop.ini'],
                storeAsFile: true,
                maxFiles: 1,
                checkValidity: true,
                credits: {
                    label: '',
                    url: ''
                }
            });

            var tagify = new Tagify(document.getElementById('meta_keywords'), {});
        });
    </script>
@endsection
