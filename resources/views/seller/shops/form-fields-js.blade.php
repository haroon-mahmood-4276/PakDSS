<script>
    $(document).ready(function() {
        $('#name').on('keyup blur', function() {
            $('#slug').val($(this).val().toLowerCase().trim().replace(/[\/\\]/g, '').replace(/\s+/g,
                ' ').replace(/[^a-z0-9- ]/gi, '').replace(/-+/g, '-').replace(/\s/g, '-'));
        });
    });

    @if (!isset($isReadOnly))
        window.addEventListener('load', function() {
            @endif
            var files = [];
            @if ($source === 'edit')
                @forelse($shop_logo as $image)
                    files.push({
                        source: '{{ $image->getFullUrl() }}',
                    });
                @empty
                @endforelse
            @endif

            FilePond.create(document.getElementById('shop_logo'), {
                files: files,
                styleButtonRemoveItemPosition: 'right',
                imageCropAspectRatio: '1:1',
                acceptedFileTypes: ['image/png', 'image/jpeg', 'image/jpg'],
                maxFileSize: '536KB',
                ignoredFiles: ['.ds_store', 'thumbs.db', 'desktop.ini'],
                storeAsFile: true,
                // allowMultiple: true,
                // maxFiles: 2,
                @if (isset($isReadOnly))
                    disabled: true,
                @endif
                checkValidity: true,
                credits: {
                    label: '',
                    url: ''
                }
            });
            @if (!isset($isReadOnly))
        });
    @endif
</script>
