<div class="row">
    <div class="col-10">
    </div>
    <div class="col-2 justify-content-end">
        <button type="button" id="resetBtn" class="btn bg-warning text-black">Reset</button>
        <button type="button" id="disableBtn" class="btn bg-warning text-black">Modify</button>
    </div>
</div>
<hr />
<h6>BRAND, MODEL & CAR TYPE</h6>
<div class="row mt-4">
    <div class="col-lg-2 col-md-6 col-sm-12">
        <div class="mb-3">
            <label class="form-label">Country of Make<span class="text-danger ms-1">*</span></label>
            <select id="brand_country" name="brand_country" class="form-control search-only"
                data-placeholder="Select Country" data-search-url="{{ route('brandCountry.search') }}"
                data-selected-id="{{ $carMake->getCountry->id ?? '' }}"
                data-selected-text="{{ $carMake->getCountry->country_name ?? '' }}"></select>
        </div>
    </div>

    <div class="col-lg-2 col-md-6 col-sm-12">
        <div class="mb-3">
            <label class="form-label">Car Make<span class="text-danger ms-1">*</span></label>
            <select id="brand_id" name="brand_id" class="form-control"></select>
        </div>
    </div>
    <div class="col-lg-2 col-md-6 col-sm-12">
        <div class="mb-3">
            <label class="form-label">Model<span class="text-danger ms-1">*</span></label>
            <select id="model_id" name="model_id" class="form-control"></select>
        </div>
    </div>
    <div class="col-lg-2 col-md-6 col-sm-12">

    </div>


    <div class="col-lg-4 col-md-6 col-sm-12">
        <label class="form-label">Brand Emblem<span class="text-danger ms-1">*</span></label>
        <div class="upload-box" id="uploadBox">
            <div class="preview" id="preview"></div>
            <label for="brand_logo">
                <div class="upload-content">
                    <i class="fa-solid fa-cloud-arrow-up"></i>
                    <p>Upload Graphic File (30x30px)</p>
                    <small>Drag & drop file here (PNG/JPG)</small>
                </div>
            </label>
            <input type="file" id="brand_logo" name="brand_emblem" accept="image/png, image/jpeg" hidden>

        </div>
        <div id="logoView"></div>
    </div>
    <div class="col-lg-2 col-md-6 col-sm-12">
        <div class="mb-3">
            <label class="form-label">Start Year<span class="text-danger ms-1">*</span></label>
            <select id="start_year" name="start_year" class="form-control">
                <option value="">Select start Year</option>
                @for ($i = 1990; $i <= date('Y'); ++$i)
                    <option value="{{ $i }}" {{ $carMake->start_year == $i ? 'selected' : '' }}>{{ $i }}</option>
                @endfor
            </select>
        </div>
    </div>
    <div class="col-lg-2 col-md-6 col-sm-12">
        <div class="mb-3">
            <label class="form-label">Discontinue Year<span class="text-danger ms-1">*</span></label>
            <select id="end_year" name="end_year" class="form-control">
                <option value="">Select Discountine Year</option>
                @for ($i = 1990; $i <= date('Y'); ++$i)
                    <option value="{{ $i }}" {{ $carMake->end_year == $i ? 'selected' : '' }}>{{ $i }}</option>
                @endfor
            </select>
            <p id="yearError" style="color:red; display:none;"></p>
        </div>
    </div>
    <div class="col-lg-2 col-md-6 col-sm-12">
        <div class="mb-3">
            <label class="form-label">Variant<span class="text-danger ms-1">*</span></label>
            <select id="variant_id" name="variant_id" class="form-control"></select>
        </div>
    </div>
    <div class="col-lg-2 col-md-6 col-sm-12">
        <div class="mb-3">
            <label class="form-label">Body Type<span class="text-danger ms-1">*</span></label>
            <select id="body_type" name="body_type" class="form-control select2-ajax"
                data-placeholder="Select or Add a Body Type" data-search-url="{{ route('bodyType.search') }}"
                data-selected-id="{{ $carMake->getBodyType->id ?? '' }}"
                data-selected-text="{{ $carMake->getBodyType->name ?? '' }}"></select>
        </div>
    </div>
    <div class="col-lg-2 col-md-6 col-sm-12"></div>
    <div class="col-lg-2 col-md-6 col-sm-12"></div>
    <div class="col-lg-2 col-md-6 col-sm-12">
        <div class="mb-3">
            <label class="form-label">Transmission<span class="text-danger ms-1">*</span></label>
            <select id="transmission" name="transmission" class="form-control select2-ajax"
                data-placeholder="Select or Add a Transmission" data-search-url="{{ route('transmissions.search') }}"
                data-selected-id="{{ $carMake->getTransmission->id ?? '' }}"
                data-selected-text="{{ $carMake->getTransmission->name ?? '' }}"></select>
        </div>
    </div>
    <div class="col-lg-2 col-md-6 col-sm-12">
        <div class="mb-3">
            <label class="form-label">Drive Train<span class="text-danger ms-1">*</span></label>
            <select id="drive_train" name="drive_train" class="form-control select2-ajax"
                data-placeholder="Select or Add a Drive Train" data-search-url="{{ route('driveTrains.search') }}"
                data-selected-id="{{ $carMake->getDriveTrain->id ?? '' }}"
                data-selected-text="{{ $carMake->getDriveTrain->name ?? '' }}"></select>
        </div>
    </div>
    <div class="col-lg-2 col-md-6 col-sm-12">
        <div class="mb-3">
            <label class="form-label">Fuel Type<span class="text-danger ms-1">*</span></label>
            <select id="fuel_type" name="fuel_type" class="form-control select2-ajax"
                data-placeholder="Select or Add a Fuel Type" data-search-url="{{ route('fuelType.search') }}"
                data-selected-id="{{ $carMake->getFuelType->id ?? '' }}"
                data-selected-text="{{ $carMake->getFuelType->name ?? '' }}"></select>
        </div>
    </div>
    <div class="col-lg-2 col-md-6 col-sm-12">
        <div class="mb-3">
            <label class="form-label">Number of Door<span class="text-danger ms-1">*</span></label>
            <select id="no_of_door" name="no_of_door" class="form-control">
                <option value="">Select Number of Doors</option>
                @for ($i = 1; $i <= 6; ++$i)
                    <option value="{{ $i }}" {{ $carMake->no_of_door == $i ? 'selected' : '' }}>{{ $i }}</option>
                @endfor
            </select>
        </div>
    </div>
    <div class="col-lg-2 col-md-6 col-sm-12"></div>
    <div class="col-lg-2 col-md-6 col-sm-12"></div>
    <div class="col-lg-2 col-md-6 col-sm-12">
        <div class="mb-3">
            <label class="form-label">Seat (person)<span class="text-danger ms-1">*</span></label>
            <select id="seat" name="seat" class="form-control select2-ajax" data-placeholder="Select or Add a Seat"
                data-search-url="{{ route('seat.search') }}" data-selected-id="{{ $carMake->getSeat->id ?? '' }}"
                data-selected-text="{{ $carMake->getSeat->name ?? '' }}"></select>
        </div>
    </div>
    <div class="col-lg-2 col-md-6 col-sm-12">
        <div class="mb-3">
            <label class="form-label">Consumption<span class="text-danger ms-1">*</span></label>
            <select id="consumption" name="consumption" class="form-control select2-ajax"
                data-placeholder="Select or Add a Consumption" data-search-url="{{ route('consumption.search') }}"
                data-selected-id="{{ $carMake->getConsumption->id ?? '' }}"
                data-selected-text="{{ $carMake->getConsumption->name ?? '' }}"></></select>
        </div>
    </div>
    <div class="col-lg-2 col-md-6 col-sm-12">
        <div class="mb-3">
            <label class="form-label">MSRP<span class="text-danger ms-1">*</span></label>
            <input type="text" id="mprs" name="mprs" class="form-control" placeholder="MSRP"
                value="{{ $carMake->mprs }}">
        </div>
    </div>
    <div class="col-lg-2 col-md-6 col-sm-12">
        <div class="mb-3">
            <label class="form-label">Consumption Value (km/L)<span class="text-danger ms-1">*</span></label>
            <input type="number" id="consumption_value_km_l" name="consumption_value_km_l" class="form-control"
                placeholder="Consumption" value="{{ $carMake->consumption_value_km_l ?? '' }}">
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        // --- Brand Select2 ---
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

        // --- Helper: fetch brand logo ---
        function fetchBrandLogo(brandId) {
            if (!brandId) {
                $('.upload-box').show();
                $('#logoView').hide();
                return;
            }

            $.ajax({
                url: '{{ route('brand.logo') }}',
                type: 'GET',
                data: { id: brandId },
                success: function (response) {
                    if (response.logo) {
                        $('.upload-box').hide();
                        $('#logoView').show().html(
                            `<img src="{{ asset('storage') }}/${response.logo}" width="100" height="100" alt="Brand Logo">`
                        );
                    } else {
                        $('.upload-box').show();
                        $('#logoView').hide();
                    }
                }
            });
        }

        // --- On brand change ---
        $('#brand_id').on('change', function () {
            let brandId = $(this).val();
            fetchBrandLogo(brandId);
        });

        // --- Prefill edit mode ---
        @if(isset($carMake) && $carMake->getVariant->model->brand->id)
            let brandId = '{{ $carMake->getVariant->model->brand->id }}';
            let brandName = '{{ $carMake->getVariant->model->brand->brand_name }}';

            // Prefill Select2
            let option = new Option(brandName, brandId, true, true);
            $('#brand_id').append(option).trigger('change');

            // Load logo directly
            fetchBrandLogo(brandId);
        @endif
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
        @if(isset($carMake) && $carMake->getVariant->model)
            let modelId = '{{ $carMake->getVariant->model->id }}';
            let modelName = '{{ $carMake->getVariant->model->model_name }}';

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
        @if(isset($carMake) && $carMake->getVariant)
            let variantId = '{{ $carMake->getVariant->id }}';
            let variantName = '{{ $carMake->getVariant->variant_name }}';

            let option = new Option(variantName, variantId, true, true);
            $('#variant_id').append(option).trigger('change');
        @endif
    // End Variant
});

</script>

<script>
    $(document).ready(function () {
        const fileInput = document.getElementById("brand_logo");
        const preview = document.getElementById("preview");

        fileInput.addEventListener("change", () => {
            if (fileInput.files && fileInput.files[0]) {
                const file = fileInput.files[0];

                if (!file.type.startsWith("image/")) {
                    alert("Please select a valid image file (PNG/JPG).");
                    fileInput.value = "";
                    return;
                }

                const reader = new FileReader();
                reader.onload = (e) => {
                    preview.innerHTML = `<img src="${e.target.result}" alt="Preview">`;
                };
                $('.upload-content').hide();
                reader.readAsDataURL(file);
            }
        });

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
                                text: item.country_name
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