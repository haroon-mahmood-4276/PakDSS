<script src="{{ asset('admin-assets') }}/vendor/libs/filepond/plugins/filepond.preview.min.js"></script>
<script src="{{ asset('admin-assets') }}/vendor/libs/filepond/plugins/filepond.typevalidation.min.js"></script>
<script src="{{ asset('admin-assets') }}/vendor/libs/filepond/plugins/filepond.imagecrop.min.js"></script>
<script src="{{ asset('admin-assets') }}/vendor/libs/filepond/plugins/filepond.imagesizevalidation.min.js"></script>
<script src="{{ asset('admin-assets') }}/vendor/libs/filepond/plugins/filepond.filesizevalidation.min.js"></script>
<script src="{{ asset('admin-assets') }}/vendor/libs/filepond/filepond.min.js"></script>
<script>
    FilePond.registerPlugin(
        FilePondPluginImagePreview,
        FilePondPluginFileValidateType,
        FilePondPluginFileValidateSize,
        FilePondPluginImageValidateSize,
        FilePondPluginImageCrop,
    );

    var files = [];
    @if ($source === 'edit')
        @foreach ($slider_logo as $image)
            files.push({
                source: '{{ $image->getFullUrl() }}',
            });
        @endforeach
    @endif

    $(document).ready(function() {
        window.addEventListener('load', function() {
            FilePond.create(document.getElementById('slider_image'), {
                files: files,
                styleButtonRemoveItemPosition: 'right',
                imageCropAspectRatio: '1:1',
                acceptedFileTypes: ['image/png', 'image/jpeg', 'image/jpg'],
                maxFileSize: '536KB',
                ignoredFiles: ['.ds_store', 'thumbs.db', 'desktop.ini'],
                storeAsFile: true,
                allowMultiple: false,
                maxFiles: 1,
                checkValidity: true,
                credits: {
                    label: '',
                    url: ''
                }
            });

        });
    });
</script>
