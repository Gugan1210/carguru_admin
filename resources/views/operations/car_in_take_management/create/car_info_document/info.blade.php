<div class="row g-3 ms-3 me-2">
    <h6 class="fw-bold text-uppercase mb-1">Car Info</h6>
    <div class="top col-2">
        <label class="form-label">Car Category</label>
        <div class="position-relative mb-2">
            <select id="car_info_category" name="car_info_category" class="form-control select2-ajax select2-cate"
                data-placeholder="Select or Add Category" data-search-url="{{ route('categoryDetail-search') }}">
            </select>
        </div>
    </div>

    <div class="top col-2">
        <div class=" mt-2"><label>CAR ID</label>
            <input type="text" id="car_detail_id" name="car_detail_id"
                class="form-control bg-light  border border-dark rounded-1" placeholder="Car Detail ID" readonly>
        </div>
    </div>
    <div class="top col-2">
        <div class="mt-2"><label>Car Price</label>
            <input type="number" id="car_info_price" name="car_info_price"
                class="form-control border border-dark rounded-1" placeholder="RM 40,550">
        </div>
    </div>
    <div class="top col-2">
        <div class="mt-2"><label>Mileage (km)</label>
            <input type="number" id="mileage" name="mileage" class="form-control border border-dark rounded-1"
                placeholder="2" min="0">
        </div>
    </div>
    <div class="top col-2">
        <label class="form-label">Location</label>
        <div class="position-relative mb-2">
            <select id="car_info_location" name="car_info_location" class="form-control search-only select2-url"
                data-placeholder="Select Branch center" data-search-url="{{ route('branchCenter.search') }}">
            </select>
        </div>
    </div>
</div>
<!-- Left column -->
<div class="row g-3 ms-3  ">
    <div class="top col-lg-4">
        <div class="form-section">

            <div class="mb-2"><label>Registration Number</label>
                <input type="text" id="car_info_registration_number" name="car_info_registration_number"
                    class="form-control border border-dark rounded-1" placeholder="JDV5817">
            </div>
            <div class="mb-2"><label>Car Make</label>
                <select id="brand_id" name="brand_id" class="form-control border border-dark rounded-1"></select>
            </div>




            <div class="mb-2"><label>Model</label><input type="text" class="form-control border border-dark rounded-1"
                    value="Camry"></div>
            <div class="mb-2"><label>Variant</label><input type="text" class="form-control border border-dark rounded-1"
                    value="2.5V"></div>



            <div class="mb-2"><label>Engine (CC)</label>
                <input type="text" id="engine_number" name="engine_number"
                    class="form-control border border-dark rounded-1">
            </div>

            <div class="mb-2"><label>Fuel Type</label><input type="text"
                    class="form-control bg-light border border-dark rounded-1" value="Petrol" readonly></div>

            <div class="mb-2">
                <label class="form-label">Registration Type</label>
                <div class="position-relative mb-2">
                    <select id="car_registration_type" name="car_info_registration_type"
                        class="form-control bg-light border border-dark rounded-1 select2-ajax select2-url"
                        data-placeholder="Select or Add Registration Type"
                        data-search-url="{{ route('registrationType.search') }}"
                        data-add-url="{{ route('registrationType.add') }}">
                    </select>
                </div>
            </div>
            <div class="mb-2">
                <label>Car Make Year</label>
                <div class="input-group border border-dark rounded-1">
                    <input type="number" class="form-control " value="1990">
                    <span class="input-group-text border-0"><i class="fa-solid fa-calendar-days"></i></span>
                </div>
            </div>

            <div class="mb-2 ">
                <label>Registration Date</label>
                <div class="input-group">
                    <input type="date" class="form-control border border-dark rounded-1" value="2013-02-08">
                </div>
            </div>


        </div>
    </div>


    <!-- Right column -->
    <div class="right col-lg-8 mt-3 w-auto ms-5">
        <label class="form-label fw-bold">Upload Document</label>
        <div class="upload-box" id="uploadBoxRC">
            <div class="upload-content" id="uploadContentRC">
                <i class="fa-solid fa-cloud-arrow-up fa-2x mb-2"></i>
                <p class="fw-semibold">Upload Document</p>
                <small>PNG / JPG</small>
            </div>
            <img id="imgRC" alt="Preview">
            <input type="file" id="fileRC" accept="image/*" hidden>
            <input type="range" id="zoomRC" class="form-range zoom-range color-fill-range" min="1" max="3" step="0.1"
                value="1">
        </div>
    </div>
</div>



<div class="">
    <div class="row g-3 mt-4">
        <!-- Left Side -->
        <div class="bottom col-lg-6">
            <div class="row g-3 ms-3">
                <div class="col-6">
                    <label>Exterior Color</label>
                    <select id="car_info_exterior_color" name="car_info_exterior_color"
                        class="form-control form-select border border-dark rounded-1 select2-color"
                        data-placeholder="Select or Add Exterior Color"
                        data-search-url="{{ route('exteriorColor.search') }}"></select>
                </div>
                <div class="col-6 d-flex align-items-end">
                    <h6 class="fw-bold mb-0">ENGINE</h6>
                </div>
                <div class="col-6">
                    <label>Interior Color</label>
                    <select id="interior_color" name="interior_color"
                        class="form-control form-select border border-dark rounded-1 select2-color"
                        data-placeholder="Select or Add Interior Color"
                        data-search-url="{{ route('interiorColor.search') }}">
                    </select>
                </div>
                <div class="col-6">
                    <label>Chassis Number</label>
                    <input type="text" class="form-control bg-light border border-dark rounded-1"
                        placeholder="PN153AK500700428">
                </div>
                <div class="col-6">
                    <label>Number of Keys</label>
                    <input type="number" class="form-control border border-dark rounded-1" placeholder="2">
                </div>
                <div class="col-6">
                    <label>Engine Number</label>
                    <input type="text" class="form-control border border-dark rounded-1" placeholder="2AR0768475">
                </div>
            </div>
        </div>

        <!-- Right Side -->
        <div class="col-lg-6 ms-3">
            <div class="row g-4">
                <!-- Chassis Image -->
                <div class="col-6">
                    <label>Photo of Chassis Number</label>
                    <div class="image-upload-box" id="chassisBox">
                        <div class="upload-placeholder mt-5">
                            <i class="fa-solid fa-cloud-arrow-up fa-2x mb-2"></i>
                            <p class="fw-semibold">Upload Image</p>
                            <small>PNG / JPG</small>
                        </div>
                        <img id="chassisImg">
                        <input type="file" id="chassisInput" accept="image/*" hidden>
                        <input type="range" min="1" max="3" step="0.1" value="1" class="zoom-slider" id="chassisZoom">
                    </div>
                </div>

                <!-- Engine Image -->
                <div class="col-6">
                    <label>Photo of Engine Number</label>
                    <div class="image-upload-box" id="engineBox">
                        <div class="upload-placeholder mt-5">
                            <i class="fa-solid fa-cloud-arrow-up fa-2x mb-2"></i>
                            <p class="fw-semibold">Upload Image</p>
                            <small>PNG / JPG</small>
                        </div>
                        <img id="engineImg">
                        <input type="file" id="engineInput" accept="image/*" hidden>
                        <input type="range" min="1" max="3" step="0.1" value="1" class="zoom-slider" id="engineZoom">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {

        $(function () {
            // --- generic initializer for AJAX-backed select2 ---
            function initSelect2Ajax($el, opts) {
                const searchUrl = $el.data('search-url') || opts.searchUrl;
                if (!searchUrl) { console.warn('select2: missing data-search-url for', $el[0]); return; }

                const placeholder = $el.data('placeholder') || opts.placeholder || 'Select or Add';
                const dropdownParent = $el.data('dropdown-parent')
                    ? $($el.data('dropdown-parent'))
                    : ($el.closest('.modal').length ? $el.closest('.modal') : $(document.body));

                $el.select2({
                    width: '100%',
                    placeholder,
                    minimumInputLength: 0,
                    dropdownParent,
                    ajax: {
                        url: searchUrl,
                        dataType: 'json',
                        delay: 250,
                        data: params => ({
                            q: (params.term || '').trim(),
                            field_id: $el.attr('id') || undefined
                        }),
                        processResults: data => {
                            const arr = Array.isArray(data) ? data : (data.results || []);
                            return {
                                results: arr.map(item => ({
                                    // be lenient about server field names
                                    id: item.id ?? item.key ?? item.value ?? item.color ?? item.hex,
                                    text: item.text ?? item.name ?? item.label ?? String(item.id ?? item.key ?? ''),
                                    color: item.color ?? item.hex ?? null
                                }))
                            };
                        },
                        cache: true,
                        // helpful error logging
                        transport: function (params, success, failure) {
                            const req = $.ajax(params);
                            req.then(success);
                            req.fail(function (xhr) {
                                console.error('Select2 AJAX error:', xhr.status, xhr.responseText);
                            });
                            return req;
                        }
                    },
                    templateResult: opts.templateResult,
                    templateSelection: opts.templateSelection,
                    escapeMarkup: m => m // allow HTML in templates
                });
            }

            // --- categories (simple text) ---
            $('.select2-cate').each(function () {
                initSelect2Ajax($(this), { placeholder: 'Select category' });
            });

            // --- colors (with swatch) ---
            const renderColor = state => {
                if (!state.id) return state.text; // placeholder
                const c = state.color || $(state.element).data('color') || '#ccc';
                return $(
                    `<span style="display:flex;align-items:center;gap:8px">
         <span style="width:16px;height:16px;border:1px solid #999;background:${c}"></span>
         <span>${state.text}</span>
       </span>`
                );
            };

            $('.select2-color').each(function () {
                initSelect2Ajax($(this), {
                    placeholder: 'Select color',
                    templateResult: renderColor,
                    templateSelection: renderColor
                });
            });
        });

        $('.select2-cate').on('select2:select', function (e) {
            let prefix = e.params.data.id;
            if (!prefix) return;
            fetch(`/generate-code/${prefix}`)
                .then(r => r.json())
                .then(data => {
                    if (data.code) $('#car_detail_id').val(data.code);
                });
        });

    });
</script>
<script>
    $(document).ready(function () {
        // Start Brand
        $('#brand_id').select2({
            placeholder: 'Select or Add a Brand',
            minimumInputLength: 0,
            ajax: {
                url: '{{ route('get-car-make.details') }}',
                dataType: 'json',
                delay: 250,
                data: function (params) {
                    return {
                        q: params.term,
                    };
                },
                processResults: function (data, params) {
                    let results = data.map(item => ({
                        id: item.id,
                        text: item.brand_name
                    }));

                    // If no results, show option to add
                    if (results.length === 0 && params.term) {
                        results.push({
                            id: 'new_' + params.term,
                            text: '➕ Add "' + params.term + '"',
                            is_new: true
                        });
                    }
                    return {
                        results: results
                    };
                },
                cache: true
            }
        });

        // Handle "Add Brand" option
        $('#brand_id').on('select2:select', function (e) {
            let data = e.params.data;
            if (data.is_new) {
                $.post('{{ route('brands.add') }}', {
                    _token: '{{ csrf_token() }}',
                    brand_name: data.text.replace('➕ Add "', '').replace('"', ''),
                    country_id: $('#brand_country').val(),
                }, function (response) {
                    // Set the newly created brand in dropdown
                    let newOption = new Option(response.brand_name, response.id, true, true);
                    $('#brand_id').append(newOption).trigger('change');
                    $('.upload-box').show();
                    $('#logoView').hide();
                });
            }
        });

        // Fetch Brand Emblem
        $('#brand_id').on('change', function () {
            let brand_id = $(this).val();
            $.ajax({
                url: '{{ route('brand.logo') }}',
                type: 'GET',
                data: {
                    id: brand_id
                },
                success: function (response) {

                    if (response.logo != null) {
                        $('.upload-box').hide();
                        $('#logoView').show();
                        $('#logoView').html(
                            `<img src="/storage/${response.logo}" width="100" height="100" alt="Brand Logo">`
                        );
                    } else {
                        $('.upload-box').show();
                        $('#logoView').hide();
                    }
                }
            });
        });
        // End Brand
    });

    // Start Models
    $(document).ready(function () {
        // Start Model
        $('#model_id').select2({
            placeholder: 'Select or Add a Model',
            minimumInputLength: 0,
            ajax: {
                url: '{{ route('models.search') }}',
                dataType: 'json',
                delay: 250,
                data: function (params) {
                    return {
                        q: params.term,
                        brand_id: $('#brand_id').val()
                    };
                },
                processResults: function (data, params) {
                    let results = data.map(item => ({
                        id: item.id,
                        text: item.model_name
                    }));

                    if (results.length === 0 && params.term) {
                        results.push({
                            id: 'new_' + params.term,
                            text: '➕ Add "' + params.term + '"',
                            is_new: true
                        });
                    }

                    return {
                        results: results
                    };
                },
                cache: true
            }
        });

        // Handle adding new model
        $('#model_id').on('select2:select', function (e) {
            let data = e.params.data;
            if (data.is_new) {
                $.post('{{ route('models.add') }}', {
                    _token: '{{ csrf_token() }}',
                    brand_id: $('#brand_id').val(),
                    model_name: data.text.replace('➕ Add "', '').replace('"', '')
                }, function (response) {
                    let newOption = new Option(response.model_name, response.id, true, true);
                    $('#model_id').append(newOption).trigger('change');
                });
            }
        });
        // End Model
    });

    // Start Variant
    $(document).ready(function () {
        $('#variant_id').select2({
            placeholder: 'Select or Add a Variant',
            minimumInputLength: 0,
            ajax: {
                url: '{{ route('variants.search') }}',
                dataType: 'json',
                delay: 250,
                data: function (params) {
                    return {
                        q: params.term,
                        brand_id: $('#brand_id').val(),
                        model_id: $('#model_id').val()
                    };
                },
                processResults: function (data, params) {
                    let results = data.map(item => ({
                        id: item.id,
                        text: item.variant_name
                    }));

                    if (results.length === 0 && params.term) {
                        results.push({
                            id: 'new_' + params.term,
                            text: '➕ Add "' + params.term + '"',
                            is_new: true
                        });
                    }

                    return {
                        results: results
                    };
                },
                cache: true
            }
        });

        // Handle adding new variant
        $('#variant_id').on('select2:select', function (e) {
            let data = e.params.data;
            if (data.is_new) {
                $.post('{{ route('variants.add') }}', {
                    _token: '{{ csrf_token() }}',
                    brand_id: $('#brand_id').val(),
                    model_id: $('#model_id').val(),
                    variant_name: data.text.replace('➕ Add "', '').replace('"', '')
                }, function (response) {
                    let newOption = new Option(response.variant_name, response.id, true, true);
                    $('#variant_id').append(newOption).trigger('change');
                });
            }
            fetchFuelType();
        });

        function fetchFuelType() {
            $.ajax({
                url: "{{ route('getFuelType') }}",
                type: "GET",
                data: {
                    make: $('#brand_id').val(),
                    model: $('#model_id').val(),
                    variant: $('#variant_id').val()
                    // _token: $('meta[name="csrf-token"]').attr('content')
                },
                success: function (response) {
                    $('#car_info_fuel_type').val(response.fuel_type);
                },
                error: function (xhr) {
                    alert("Request failed: " + xhr.responseText);
                }
            });

        };

    });
</script>
<script>
    //Select2 Dropdown
    $(document).ready(function () {
        // Initialize all select2-ajax dropdowns
        $('.search-only').each(function () {
            let $el = $(this);

            dropDown(
                $el.attr('id'),
                $el.data('placeholder'),
                $el.data('search-url'),
            );
        });

        function dropDown(field_id, placeholder, routePathSearch) {
            $('#' + field_id).select2({
                placeholder: placeholder,
                minimumInputLength: 0, // allow fetching without typing
                ajax: {
                    url: routePathSearch,
                    dataType: 'json',
                    delay: 250,
                    data: function (params) {
                        return {
                            q: params.term || '',  // empty string means "all"
                            field_id: field_id
                        };
                    },
                    processResults: function (data) {
                        return {
                            results: data.map(item => ({
                                id: item.id,
                                text: item.name
                            }))
                        };
                    },
                    cache: true
                }
            });

            // 👇 Trigger search when opening (load all by default)
            $('#' + field_id).on('select2:open', function () {
                if (!$('#' + field_id).data('select2').results.lastParams) {
                    $('#' + field_id).select2('search', '');
                }
            });
        }
    });
</script>