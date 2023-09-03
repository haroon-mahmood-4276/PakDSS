<div class="modal fade" id="basicModal" tabindex="-1" aria-hidden="true">
    {{-- <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg" role="document"> --}}
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel1">Review</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                    id="basicModal-close"></button>
            </div>
            <div class="modal-body">
                @include('seller.products.form-fields', ['source' => 'edit', 'isReadOnly' => true])
            </div>
        </div>
    </div>
</div>


@include('seller.products.form-fields-js', ['source' => 'edit', 'isReadOnly' => true])
<script>
    $(document).ready(function() {
        $('#basicModal-close').on('click', function() {
            $('#modalPlace').html('');
            delete filePondOptions;
        });

        $(".select2-size-lg").each(function() {
            var e = $(this);
            e.wrap('<div class="position-relative"></div>');
            e.select2({
                dropdownAutoWidth: !0,
                dropdownParent: e.parent(),
                width: "100%",
                containerCssClass: "select-lg",
                templateResult: c,
                escapeMarkup: function(e) {
                    return e
                }
            });
        });

        $(".select2-size-lg-multiple").each(function() {
                var e = $(this);
                e.wrap('<div class="position-relative"></div>');
                e.select2({
                    dropdownAutoWidth: !0,
                    width: "100%",
                    containerCssClass: "select-lg",
                    escapeMarkup: function(e) {
                        return e
                    }
                });
            });

    });

    function c(e) {
        return e.id ? "<i class='" + $(e.element).data("icon") + "'></i> " + e.text : e.text
    }
</script>
