<div class="container">
    <div class="row">
        <div class="col-10">
            <h5>CAR INFO</h5>
        </div>
        <div class="col-2 justify-content-end">
            <button type="button" id="resetBtn" class="btn bg-warning text-black">Reset</button>
            <button type="button" id="disableBtn" class="btn bg-warning text-black">Modify</button>
        </div>
    </div>
    <hr />

    <div class="row">
        <!-- Car Category -->
        <div class="col-lg-2 col-md-6 col-sm-12">
            <div class="mb-3">
                <label class="form-label">Car Category</label>
                <select id="car_info_category" name="car_info_category" class="form-control select2-ajax select2-cate"
                    data-placeholder="Select or Add Category" data-search-url="{{ route('categoryDetail-search') }}"
                    data-selected-id="{{ $carDetail->getCarDetailCategory->key ?? '' }}"
                    data-selected-text="{{ $carDetail->getCarDetailCategory->name ?? '' }}">
                </select>
            </div>
        </div>

        <!-- CAR ID -->
        <div class="col-lg-2 col-md-6 col-sm-12">
            <div class="mb-3">
                <label class="form-label">CAR ID</label>
                <input type="text" id="car_detail_id" name="car_detail_id" class="form-control"
                    placeholder="Car Detail ID" value="{{ $carDetail->car_detail_id ?? '-' }}" readonly>
            </div>
        </div>

        <!-- Car Price -->
        <div class="col-lg-2 col-md-6 col-sm-12">
            <div class="mb-3">
                <label class="form-label">Car Price</label>
                <input type="text" id="car_info_price" name="car_info_price" class="form-control"
                    placeholder="RM 40,550" value="{{ $carDetail->car_info_price ?? '-' }}">
            </div>
        </div>

        <!-- Location -->
        <div class="col-lg-2 col-md-6 col-sm-12">
            <div class="mb-3">
                <label class="form-label">Location</label>
                <select id="car_info_location" name="car_info_location" class="form-control search-only"
                    data-placeholder="Select Branch Center" data-search-url="{{ route('branchCenter.search') }}"
                    data-selected-id="{{ $carDetail->getBranchCenter->id ?? '' }}"
                    data-selected-text="{{ $carDetail->getBranchCenter->name ?? '' }}">
                </select>
            </div>
        </div>
        <!-- Location -->
        <div class="col-lg-2 col-md-6 col-sm-12">
            <div class="mb-3">
            </div>
        </div>
        <div class="col-lg-2 col-md-6 col-sm-12">
            <div class="mb-3"></div>
        </div>
    </div>

    <div class="row">
        <!-- Car Category -->
        <div class="col-lg-2 col-md-6 col-sm-12">
            <div class="mb-3">
                <label class="form-label">Car Make</label>
                <!-- <input type="text" id="brand_id" name="brand_id" class="form-control" placeholder="Make"> -->
                <select id="brand_id" name="brand_id" class="form-control"></select>
            </div>
        </div>

        <!-- CAR ID -->
        <div class="col-lg-2 col-md-6 col-sm-12">
            <div class="mb-3">
                <label class="form-label">Model</label>
                <!-- <input type="text" id="model_id" name="model_id" class="form-control" placeholder="Model"> -->
                <select id="model_id" name="model_id" class="form-control"></select>
            </div>
        </div>

        <!-- Car Price -->
        <div class="col-lg-2 col-md-6 col-sm-12">
            <div class="mb-3">
                <label class="form-label">Variant</label>
                <!-- <input type="text" id="variant_id" name="variant_id" class="form-control"
                    placeholder="Variant"> -->
                <select id="variant_id" name="variant_id" class="form-control"></select>
            </div>
        </div>

        <!-- Location -->
        <div class="col-lg-2 col-md-6 col-sm-12">
            <div class="mb-3">
                <label class="form-label">Fuel Type</label>
                <input type="text" id="car_info_fuel_type" name="car_info_fuel_type" class="form-control" readonly>
            </div>
        </div>
        <!-- Location -->
        <div class="col-lg-2 col-md-6 col-sm-12">
            <div class="mb-3">
            </div>
        </div>
        <div class="col-lg-2 col-md-6 col-sm-12">
            <div class="mb-3"></div>
        </div>
    </div>

    <div class="row">
        <!-- Registration Type -->
        <div class="col-lg-2 col-md-6 col-sm-12">
            <div class="mb-3">
                <label class="form-label">Registration Type</label>
                <select id="car_registration_type" name="car_info_registration_type"
                    class="form-control select2-ajax select2-url" data-placeholder="Select or Add Registration Type"
                    data-search-url="{{ route('registrationType.search') }}"
                    data-selected-id="{{ $carDetail->getRegistrationType->id ?? '' }}"
                    data-selected-text="{{ $carDetail->getRegistrationType->name ?? '' }}">
                </select>
            </div>
        </div>


        <!-- Registration Number -->
        <div class="col-lg-2 col-md-6 col-sm-12">
            <div class="mb-3">
                <label class="form-label">Registration Number</label>
                <input type="text" id="car_info_registration_number" name="car_info_registration_number"
                    class="form-control" placeholder="JDV5817"
                    value="{{ $carDetail->car_info_registration_number ?? '-' }}">
            </div>
        </div>

        <!-- Registration Date -->
        <div class="col-lg-2 col-md-6 col-sm-12">
            <div class="mb-3">
                <label class="form-label">Registration Date</label>
                <input type="date" id="car_info_registration_date" name="car_info_registration_date"
                    class="form-control" value="{{ $carDetail->car_info_registration_date ?? '-' }}">
            </div>
        </div>

        <!-- Car Make Year -->
        <div class="col-lg-2 col-md-6 col-sm-12">
            <div class="mb-3">
                <label class="form-label">Car Make Year</label>
                <select id="car_info_car_make_year" name="car_info_car_make_year" class="form-control">
                    <option value="">Select Make Year</option>
                    @for ($i = 1990; $i <= date('Y'); $i++)
                        <option value="{{ $i }}" {{ $carDetail->car_info_car_make_year == $i ? 'selected' : '' }}>{{ $i }}
                        </option>
                    @endfor
                </select>
            </div>
        </div>
    </div>
</div>
<div class=" row ms-0">
    <!-- Exterior Color -->
    <div class="col-lg-2 col-md-6 col-sm-12">
        <div class="mb-3 ">
            <label class="form-label">Exterior Color</label>
            <select id="car_info_exterior_color" name="car_info_exterior_color" class="form-control select2-color"
                data-placeholder="Select or Add Exterior Color" data-search-url="{{ route('exteriorColor.search') }}"
                data-selected-id="{{ $carDetail->getExteriorColor->color ?? '' }}"
                data-selected-text="{{ $carDetail->getExteriorColor->name ?? '' }}">
            </select>
        </div>
    </div>

    <!-- Interior Color -->
    <div class="col-lg-2 col-md-6 col-sm-12">
        <div class="mb-3">
            <label class="form-label">Interior Color</label>
            <select id="interior_color" name="interior_color" class="form-control select2-color"
                data-placeholder="Select or Add Interior Color" data-search-url="{{ route('interiorColor.search') }}"
                data-selected-id="{{ $carDetail->getInteriorColor->color ?? '' }}"
                data-selected-text="{{ $carDetail->getInteriorColor->name ?? '' }}"></select>
        </div>
    </div>

    <!-- Number of Keys -->
    <div class="col-lg-2 col-md-6 col-sm-12">
        <div class="mb-3">
            <label class="form-label">Number of Keys</label>
            <input type="number" id="number_of_keys" name="number_of_keys" class="form-control" placeholder="2" min="0"
                value="{{ $carDetail->number_of_keys ?? '-' }}">
        </div>
    </div>
    <div class="col-lg-2 col-md-6 col-sm-12">
        <div class="mb-3">
            <label class="form-label">Mileage</label>
            <input type="number" id="mileage" name="mileage" class="form-control" placeholder="2" min="0"
                value="{{ $carDetail->mileage ?? '-' }}">
        </div>
    </div>

</div>
</div>

<script>
    $(document).ready(function () {

        $('.select2-color').each(function () {
            let $el = $(this);

            // Read attributes from the element
            let field_id = $el.attr('id');
            let placeholder = $el.data('placeholder') || 'Select Color';
            let searchUrl = $el.data('search-url');
            let selectedId = $el.data('selected-id');
            let selectedText = $el.data('selected-text');

            // Initialize Select2
            $el.select2({
                placeholder: placeholder,
                width: '100%',
                minimumInputLength: 0,
                ajax: {
                    url: searchUrl,
                    dataType: 'json',
                    delay: 250,
                    data: function (params) {
                        return {
                            q: params.term || '',
                            field_id: field_id
                        };
                    },
                    processResults: function (data) {
                        return {
                            results: data.map(item => ({
                                id: item.color,
                                text: item.name,
                                color: item.color
                            }))
                        };
                    },
                    cache: true
                },
                templateResult: formatColor,
                templateSelection: formatColor,
                escapeMarkup: m => m
            });

            // Prefill if selected
            if (selectedId) {
                let option = new Option(selectedText, selectedId, true, true);
                $(option).attr('data-color', selectedId);
                $el.append(option).trigger('change');
            }
        });

        // Formatter for color swatch
        function formatColor(state) {
            if (!state.id) return state.text;
            const c = state.color || $(state.element).data('color') || '#ccc';
            return $(`
        <span style="display:flex;align-items:center;gap:8px">
            <span style="width:16px;height:16px;border:1px solid #999;background:${c}"></span>
            <span>${state.text}</span>
        </span>
        `);
        }

    });
</script>

<script>
    $(document).ready(function () {
        // Start Brand
        $('#brand_id').select2({
            placeholder: 'Select a Brand',
            minimumInputLength: 0,
            ajax: {
                url: '{{ route('brands.search') }}',
                dataType: 'json',
                delay: 250,
                data: function (params) {
                    return {
                        q: params.term,
                        country_id: $('#brand_country').val()
                    };
                },
                processResults: function (data) {
                    return {
                        results: data.map(item => ({
                            id: item.id,
                            text: item.brand_name
                        }))
                    };
                },
                cache: true
            }
        });

        // Fetch Brand Emblem on change
        $('#brand_id').on('change', function () {
            let brand_id = $(this).val();
            $.ajax({
                url: '{{ route('brand.logo') }}',
                type: 'GET',
                data: { id: brand_id },
                success: function (response) {
                    if (response.logo) {
                        $('.upload-box').hide();
                        $('#logoView').show().html(
                            `<img src="/storage/${response.logo}" width="100" height="100" alt="Brand Logo">`
                        );
                    } else {
                        $('.upload-box').show();
                        $('#logoView').hide();
                    }
                }
            });
        });

        // Prefill selected brand (edit mode)
        @if(isset($carDetail) && $carDetail->getVariant->model->brand->id)
            let brandId = '{{ $carDetail->getVariant->model->brand->id ?? '' }}';
            let brandName = '{{ $carDetail->getVariant->model->brand->brand_name ?? '' }}';

            let option = new Option(brandName, brandId, true, true);
            $('#brand_id').append(option).trigger('change');
        @endif
        // End Brand
    });


    // Start Models
    $(document).ready(function () {
        // Start Model
        $('#model_id').select2({
            placeholder: 'Select a Model',
            minimumInputLength: 0,
            ajax: {
                url: '{{ route('models.search') }}',
                dataType: 'json',
                delay: 250,
                data: function (params) {
                    return {
                        q: params.term,
                        brand_id: $('#brand_id').val() // filter by selected brand
                    };
                },
                processResults: function (data) {
                    return {
                        results: data.map(item => ({
                            id: item.id,
                            text: item.model_name
                        }))
                    };
                },
                cache: true
            }
        });

        // Prefill selected model (edit mode)
        @if(isset($carDetail) && $carDetail->getVariant->model)
            let modelId = '{{ $carDetail->getVariant->model->id }}';
            let modelName = '{{ $carDetail->getVariant->model->model_name }}';

            let option = new Option(modelName, modelId, true, true);
            $('#model_id').append(option).trigger('change');
        @endif
    // End Model
    });


    // Start Variant
    $(document).ready(function () {
        // Start Variant
        $('#variant_id').select2({
            placeholder: 'Select a Variant',
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
                processResults: function (data) {
                    return {
                        results: data.map(item => ({
                            id: item.id,
                            text: item.variant_name
                        }))
                    };
                },
                cache: true
            }
        });

        // Prefill selected variant (edit mode)
        @if(isset($carDetail) && $carDetail->getVariant)
            let variantId = '{{ $carDetail->getVariant->id }}';
            let variantName = '{{ $carDetail->getVariant->variant_name }}';

            let option = new Option(variantName, variantId, true, true);
            $('#variant_id').append(option).trigger('change');
            fetchFuelType();
        @endif
        // End Variant
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
                $el.data('selected-id'),
                $el.data('selected-text')
            );
        });

        function dropDown(field_id, placeholder, routePathSearch, selectedId, selectedText) {
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

            // 👇 Prefill selected value when editing
            if (selectedId && selectedText) {
                let option = new Option(selectedText, selectedId, true, true);
                $('#' + field_id).append(option).trigger('change');
            }
        }
    });
</script>