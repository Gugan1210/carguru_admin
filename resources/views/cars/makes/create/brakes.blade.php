<div class="row">
    <div class="col">
        <h5>BRAKES</h5>
        <hr />
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="mb-3">
                    <label class="form-label">Front</label>
                    <select id="brake_front" name="brake_front" class="form-control select2-ajax"
                        data-placeholder="Select or Add Brake Front" data-search-url="{{ route('brake.search') }}"
                        data-add-url="{{ route('brake.add') }}">
                    </select>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="mb-3">
                    <label class="form-label">Rear</label>
                    <select id="brake_rear" name="brake_rear" class="form-control select2-ajax"
                        data-placeholder="Select or Add Brake Front" data-search-url="{{ route('brake.search') }}"
                        data-add-url="{{ route('brake.add') }}">
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
                    <label class="form-label">Front</label>
                    <select id="suspension_front" name="suspension_front" class="form-control select2-ajax"
                        data-placeholder="Select or Add a Suspension Front"
                        data-search-url="{{ route('suspension.search') }}" data-add-url="{{ route('suspension.add') }}">
                    </select>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="mb-3">
                    <label class="form-label">Back</label>
                    <select id="suspension_back" name="suspension_back" class="form-control select2-ajax"
                        data-placeholder="Select or Add Suspension Front"
                        data-search-url="{{ route('suspension.search') }}" data-add-url="{{ route('suspension.add') }}">
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
                    <label class="form-label">Steering</label>
                    <select id="steering" name="steering" class="form-control select2-ajax"
                        data-placeholder="Select or Add Steering" data-search-url="{{ route('steering.search') }}"
                        data-add-url="{{ route('steering.add') }}">
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
            <label class="form-label">Front</label>
            <input type="text" id="wheel_type_front" name="wheel_type_front" class="form-control"
                placeholder="Wheel Type Front">
        </div>
    </div>
    <div class="col-lg-2 col-md-6 col-sm-12">
        <div class="mb-3">
            <label class="form-label">Rear</label>
            <input type="text" id="wheel_type_rear" name="wheel_type_rear" class="form-control"
                placeholder="WHeel Type Rear">
        </div>
    </div>
    <div class="col-lg-2 col-md-6 col-sm-12">
        <div class="mb-3">
            <label class="form-label">Front Rims</label>
            <input type="input" id="wheel_type_front_rims" name="wheel_type_front_rims" class="form-control"
                placeholder="Wheel Type Front">
        </div>
    </div>
    <div class="col-lg-2 col-md-6 col-sm-12">
        <div class="mb-3">
            <label class="form-label">Rear Rims</label>
            <input type="input" id="wheel_type_rear_rims" name="wheel_type_rear_rims" class="form-control"
                placeholder="Wheel Type Rear">
        </div>
    </div>
</div>
<h5>STANDARD FEATURES / EQUIPMENTS</h5>
<hr />
<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-12">
        <div class="mb-3">
            <select id="features_equipments" name="features_equipments[]" multiple="multiple"
                style="width: 100%"></select>
        </div>
    </div>
</div>
<!-- Start Feature & Equipments -->
<script>
    $(document).ready(function () {
        $('#features_equipments').select2({
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
                    return {
                        results: data
                    };
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

        // Handle new tag creation (same as brand)
        $('#features_equipments').on('select2:select', function (e) {
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
                        $('#features_equipments').find('option[value="' + data.id + '"]').remove();
                        // Add real saved option
                        let option = new Option(response.text, response.id, true, true);
                        $('#features_equipments').append(option).trigger('change');
                    }
                });
            }
        });
    });
</script>