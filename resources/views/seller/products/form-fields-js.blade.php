<script>
    $(document).ready(() => {
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
            // setup: function(editor) {
            //     editor.on('keydown', function(e) {
            //         var words = editor.plugins.wordcount.getCount();
            //         if (words >= 2 && e.keyCode !== 8 && !e.ctrlKey && !e
            //             .metaKey) {
            //             e.preventDefault();
            //             e.stopPropagation();
            //             return false;
            //         }
            //     });
            // }
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
            // setup: function(editor) {
            //     editor.on('keydown', function(e) {
            //         var words = editor.plugins.wordcount.getCount();
            //         if (words >= 2 && e.keyCode !== 8 && !e.ctrlKey && !e
            //             .metaKey) {
            //             e.preventDefault();
            //             e.stopPropagation();
            //             return false;
            //         }
            //     });
            // }
        });

        $('#length, #width, #height').on('keyup', function() {
            let length = parseFloat($('#length').val()) || 0;
            let width = parseFloat($('#width').val()) || 0;
            let height = parseFloat($('#height').val()) || 0;

            $('#span-dimentions-value').html(parseFloat(length * width * height).toFixed(2));
        }).trigger('keyup');
    });
</script>

<script>
    var files = {
        'product_images': [],
        'product_pdf': [],
        'product_video': [],
    };

    @if ($source === 'edit')
        @forelse($product_images as $image)
            files['product_images'].push({
                source: '{{ $image->getFullUrl() }}',
            });
        @empty
        @endforelse
        @forelse($product_pdf as $image)
            files['product_pdf'].push({
                source: '{{ $image->getFullUrl() }}',
            });
        @empty
        @endforelse
        @forelse($product_video as $image)
            files['product_video'].push({
                source: '{{ $image->getFullUrl() }}',
            });
        @empty
        @endforelse
    @endif
    window.addEventListener('load', function() {
        var tagify = new Tagify(document.getElementById('meta_keywords'), {});

        let filePondOptions = {
            allowReorder: true,
            styleButtonRemoveItemPosition: 'right',
            imageCropAspectRatio: '1:1',
            labelFileTypeNotAllowed: 'Unsupported file type',
            maxFileSize: '536KB',
            ignoredFiles: ['.ds_store', 'thumbs.db', 'desktop.ini'],
            storeAsFile: true,
            checkValidity: true,
            maxFiles: 1,
            credits: {
                label: '',
                url: ''
            }
        };


        FilePond.create(document.getElementById('product_images'), {
            ...filePondOptions,
            files: files['product_images'],
            acceptedFileTypes: ['image/png', 'image/jpeg', 'image/jpg'],
            allowMultiple: true,
            maxFiles: 3,
        });


        FilePond.create(document.getElementById('product_video'), {
            files: files['product_video'],
            maxFileSize: '1536KB',
            acceptedFileTypes: ['video/mp4', 'video/webm', 'video/mov', 'video/avi', 'video/wmv',
                'video/mkv'
            ],
        });


        FilePond.create(document.getElementById('product_pdf'), {
            ...filePondOptions,
            files: files['product_pdf'],
            acceptedFileTypes: ['application/pdf'],
        });
    });
</script>
