<div class="row">
    <div class="col">
        <h5>BRAKES</h5>
        <hr />
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="mb-3">
                    <label class="form-label">Front<span class="text-danger ms-1">*</span></label>
                    <select id="brake_front" name="brake_front" class="form-control select2-ajax"
                        data-selected-id="{{ $carMake->getBrake->getBrakeFront->id ?? '' }}"
                        data-selected-text="{{ $carMake->getBrake->getBrakeFront->name ?? '' }}">
                    </select>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="mb-3">
                    <label class="form-label">Rear<span class="text-danger ms-1">*</span></label>
                    <select id="brake_rear" name="brake_rear" class="form-control select2-ajax"
                        data-placeholder="Select or Add Brake Front" data-search-url="{{ route('brake.search') }}"
                        data-selected-id="{{ $carMake->getBrake->getBrakeRear->id ?? '' }}"
                        data-selected-text="{{ $carMake->getBrake->getBrakeRear->name ?? '' }}">
                    </select>
                </div>
            </div>
        </div>
    </div>
    <div class="col">
        <h5>SUSPENSION</h5>
        <hr />
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="mb-3">
                    <label class="form-label">Front<span class="text-danger ms-1">*</span></label>
                    <select id="suspension_front" name="suspension_front" class="form-control select2-ajax"
                        data-placeholder="Select or Add a Suspension Front"
                        data-search-url="{{ route('suspension.search') }}"
                        data-selected-id="{{ $carMake->getBrake->getSuspensionFront->id ?? '' }}"
                        data-selected-text="{{ $carMake->getBrake->getSuspensionFront->name ?? '' }}">
                    </select>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="mb-3">
                    <label class="form-label">Back<span class="text-danger ms-1">*</span></label>
                    <select id="suspension_back" name="suspension_back" class="form-control select2-ajax"
                        data-placeholder="Select or Add Suspension Front"
                        data-search-url="{{ route('suspension.search') }}"
                        data-selected-id="{{ $carMake->getBrake->getSuspensionBack->id ?? '' }}"
                        data-selected-text="{{ $carMake->getBrake->getSuspensionBack->name ?? '' }}">
                    </select>
                </div>
            </div>
        </div>
    </div>
    <div class="col">
        <h5>STEERING</h5>
        <hr />
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="mb-3">
                    <label class="form-label">Steering<span class="text-danger ms-1">*</span></label>
                    <select id="steering" name="steering" class="form-control select2-ajax"
                        data-placeholder="Select or Add Steering" data-search-url="{{ route('steering.search') }}"
                        data-selected-id="{{ $carMake->getBrake->getSteering->id ?? '' }}"
                        data-selected-text="{{ $carMake->getBrake->getSteering->name ?? '' }}">
                    </select>
                </div>
            </div>
        </div>
    </div>
</div>
<h5>TYPE OF WHEELS</h5>
<hr />
<div class="row">
    <div class="col-lg-2 col-md-6 col-sm-12">
        <div class="mb-3">
            <label class="form-label">Front<span class="text-danger ms-1">*</span></label>
            <input type="text" id="wheel_type_front" name="wheel_type_front" class="form-control"
                placeholder="Wheel Type Front" value="{{ $carMake->getBrake->wheel_type_front ?? '-' }}">
        </div>
    </div>
    <div class="col-lg-2 col-md-6 col-sm-12">
        <div class="mb-3">
            <label class="form-label">Rear<span class="text-danger ms-1">*</span></label>
            <input type="text" id="wheel_type_rear" name="wheel_type_rear" class="form-control"
                placeholder="WHeel Type Rear" value="{{ $carMake->getBrake->wheel_type_rear ?? '-' }}">
        </div>
    </div>
    <div class="col-lg-2 col-md-6 col-sm-12">
        <div class="mb-3">
            <label class="form-label">Front Rims<span class="text-danger ms-1">*</span></label>
            <input type="input" id="wheel_type_front_rims" name="wheel_type_front_rims" class="form-control"
                placeholder="Wheel Type Front" value="{{ $carMake->getBrake->wheel_type_front_rims ?? '-' }}">
        </div>
    </div>
    <div class="col-lg-2 col-md-6 col-sm-12">
        <div class="mb-3">
            <label class="form-label">Rear Rims<span class="text-danger ms-1">*</span></label>
            <input type="input" id="wheel_type_rear_rims" name="wheel_type_rear_rims" class="form-control"
                placeholder="Wheel Type Rear" value="{{ $carMake->getBrake->wheel_type_rear_rims ?? '-' }}">
        </div>
    </div>
</div>
<h5>STANDARD FEATURES / EQUIPMENTS</h5>
<hr />
<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-12">
        <div class="mb-3">
            <select id="features_equipments" name="features_equipments[]" multiple
                data-selected-value='@json($carMake->getBrake->features_equipments_list)'>
            </select>
        </div>
    </div>
</div>
<!-- Start Feature & Equipments -->
<script>
    $(document).ready(function () {

        $('#features_equipments').each(function () {
            let $el = $(this);
            let selectedValue = $el.data('selected-value'); // contains preselected JSON

            multiDropDown(selectedValue);
        });

        function multiDropDown(idata) {
            let $features = $('#features_equipments');

            $features.select2({
                placeholder: 'Select or Add',
                tags: true,
                minimumInputLength: 1,
                ajax: {
                    url: '{{ route("feature.search") }}',
                    dataType: 'json',
                    delay: 250,
                    data: function (params) {
                        return { q: params.term };
                    },
                    processResults: function (data) {
                        return { results: data };
                    },
                    cache: true
                },
                createTag: function (params) {
                    let term = $.trim(params.term);
                    if (term === '') return null;
                    return {
                        id: 'new_' + term,
                        text: term,
                        is_new: true
                    };
                }
            });

            // Handle "Add New" option
            $features.on('select2:select', function (e) {
                let data = e.params.data;
                if (data.is_new) {
                    $.ajax({
                        type: 'POST',
                        url: '{{ route("feature.add") }}',
                        data: {
                            _token: '{{ csrf_token() }}',
                            feature_name: data.text
                        },
                        success: function (response) {
                            // Remove the temp new_* tag
                            $features.find('option[value="' + data.id + '"]').remove();
                            // Add real saved option
                            let option = new Option(response.text, response.id, true, true);
                            $features.append(option).trigger('change');
                        }
                    });
                }
            });

            // Prefill selected values (idata comes from Blade)
            let selectedFeatures = idata ?? [];

            if (selectedFeatures.length > 0) {
                selectedFeatures.forEach(item => {
                    let option = new Option(item.text, item.id, true, true);
                    $features.append(option).trigger('change');
                });
            } else {
                console.log('No Selected Value');
            }
        }
    });

</script>