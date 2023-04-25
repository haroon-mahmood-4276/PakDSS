<script src="{{ asset('seller-assets') }}/vendors/filepond/plugins/filepond.preview.min.js"></script>
<script src="{{ asset('seller-assets') }}/vendors/filepond/plugins/filepond.typevalidation.min.js"></script>
<script src="{{ asset('seller-assets') }}/vendors/filepond/plugins/filepond.imagecrop.min.js"></script>
<script src="{{ asset('seller-assets') }}/vendors/filepond/plugins/filepond.imagesizevalidation.min.js"></script>
<script src="{{ asset('seller-assets') }}/vendors/filepond/plugins/filepond.filesizevalidation.min.js"></script>
<script src="{{ asset('seller-assets') }}/vendors/filepond/filepond.min.js"></script>
<script>
    FilePond.registerPlugin(
        FilePondPluginImagePreview,
        FilePondPluginFileValidateType,
        FilePondPluginFileValidateSize,
        FilePondPluginImageValidateSize,
        FilePondPluginImageCrop,
    );
</script>
