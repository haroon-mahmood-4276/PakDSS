<script>
    country = $("#country").wrap('<div class="position-relative"></div>');
    country.select2({
        ajax: {
            url: "{{ route('user.ajax.modal.addresses.search.country') }}",
            dataType: 'json',
            delay: 500,
            data: function(params) {
                return {
                    q: params.term,
                    type: "query",
                    page: params.page,
                    per_page: 15,
                };
            },
            processResults: function(response, params) {
                return {
                    results: response.data.data,
                    pagination: {
                        more: response.data.next_page_url !== null
                    }
                };
            },
            cache: true
        },
        placeholder: 'Search for countries...',
        dropdownAutoWidth: !0,
        // minimumInputLength: 2,
        dropdownParent: country.parent(),
        width: "100%",
        containerCssClass: "select-lg",
        templateResult: (row) => row.text,
        templateSelection: (row) => row.text,
    }).on('select2:select', function(e) {
        $("#state").val(null).trigger("change");
    });

    state = $("#state").wrap('<div class="position-relative"></div>');
    state.select2({
        ajax: {
            url: "{{ route('user.ajax.modal.addresses.search.state') }}",
            dataType: 'json',
            delay: 500,
            data: function(params) {
                let data = {
                    q: params.term,
                    type: "query",
                    page: params.page,
                    per_page: 15,
                };
                data.country_id = $('#country').select2('data')[0]?.id;
                return data;
            },
            processResults: function(response, params) {
                return {
                    results: response.data.data,
                    pagination: {
                        more: response.data.next_page_url !== null
                    }
                };
            },
            cache: true
        },
        placeholder: 'Search for states...',
        dropdownAutoWidth: !0,
        // minimumInputLength: 2,
        dropdownParent: state.parent(),
        width: "100%",
        containerCssClass: "select-lg",
        templateResult: (row) => row.text,
        templateSelection: (row) => row.text,
    }).on('select2:select', function(e) {
        $("#city").val(null).trigger("change");
    });

    city = $("#city").wrap('<div class="position-relative"></div>');
    city.select2({
        ajax: {
            url: "{{ route('user.ajax.modal.addresses.search.city') }}",
            dataType: 'json',
            delay: 500,
            data: function(params) {
                let data = {
                    q: params.term,
                    type: "query",
                    page: params.page,
                    per_page: 15,
                };
                data.state_id = $('#state').select2('data')[0]?.id;
                return data;
            },
            processResults: function(response, params) {
                return {
                    results: response.data.data,
                    pagination: {
                        more: response.data.next_page_url !== null
                    }
                };
            },
            cache: true
        },
        placeholder: 'Search for cities...',
        dropdownAutoWidth: !0,
        // minimumInputLength: 2,
        dropdownParent: city.parent(),
        width: "100%",
        containerCssClass: "select-lg",
        templateResult: (row) => row.text,
        templateSelection: (row) => row.text,
    })
</script>
