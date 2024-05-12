<script>
    $(document).ready(function() {
        e = $("#category");
        e.wrap('<div class="position-relative"></div>');
        e.select2({
            dropdownAutoWidth: !0,
            dropdownParent: e.parent(),
            width: "100%",
            containerCssClass: "select-lg",
            templateResult: c,
            templateSelection: c,
            escapeMarkup: function(e) {
                return e
            }
        });

        $('#name').on('keyup blur', function() {
            $(this).val($(this).val().toLowerCase().trim().replace(/[\/\\]/g, '').replace(/\s+/g, ' ')
                .replace(/[^a-z0-9- ]/gi, '').replace(/-+/g, '-').replace(/\s/g, '-'));
        });
    });

    function c(e) {
        return e.id ? "<i class='" + $(e.element).data("icon") + " me-2'></i>" + e.text : e.text
    }
</script>
