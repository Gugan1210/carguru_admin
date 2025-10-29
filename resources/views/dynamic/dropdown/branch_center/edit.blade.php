<?php $page = 'edit-role'; ?>
@extends('layouts.app', ['activePage' => 'table', 'title' => 'Update Branch Center - Admin Panel - CarGuru', 'navName' => 'Table List', 'activeButton' => 'laravel'])
@section('content')
    <div class="page-wrapper">
        <div class="content">
            <div class="page-header">
                <div class="add-item d-flex">
                    <div class="page-title">
                        <h4 class="fw-bold">Update Branch Center</h4>
                        <h6>Update Branch Center</h6>
                    </div>
                </div>
                <ul class="table-top-head">
                    <li>
                        <a data-bs-toggle="tooltip" data-bs-placement="top" title="Refresh"><i
                                class="ti ti-refresh"></i></a>
                    </li>
                    <li>
                        <a data-bs-toggle="tooltip" data-bs-placement="top" title="Collapse" id="collapse-header"><i
                                class="ti ti-chevron-up"></i></a>
                    </li>
                </ul>
                <div class="page-btn mt-0">
                    <a href="{{route('branch_center.index')}}" class="btn btn-secondary"><i data-feather="arrow-left"
                            class="me-2"></i>Back</a>
                </div>
            </div>
            <form method="POST" action="{{ route('branch_center.update', $branch_center->id) }}"
                class="edit-transmission-form">
                @csrf
                @method('PUT')
                <div class="add-product">
                    <div class="accordions-items-seperate" id="accordionSpacingExample">
                        <div class="accordion-item border mb-4">
                            <div id="SpacingOne" class="accordion-collapse collapse show"
                                aria-labelledby="headingSpacingOne">
                                <div class="accordion-body border-top">
                                    <div class="row">
                                        <!-- Country Dropdown -->
                                        <div class="col-sm-4 mb-3">
                                            <label for="country_id" class="form-label">Country<span
                                                    class="text-danger">*</span></label>
                                            <select name="country_id" id="country_id" class="form-select" required>
                                                <option value="">Select Country</option>
                                                @foreach ($countries as $country)
                                                    <option value="{{ $country->id }}" {{ $branch_center->country_id == $country->id ? 'selected' : '' }}>
                                                        {{ $country->country_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="col-sm-4 col-12">
                                            <div class="mb-3">
                                                <label class="form-label">State<span
                                                        class="text-danger ms-1">*</span></label>
                                                <select name="state_id" id="state_id"
                                                    class="form-select border border-dark rounded-1 pe-5 custom-select form-control">
                                                    <option selected disabled>Select State</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-4 col-12">
                                            <div class="mb-3">
                                                <label class="form-label">City<span
                                                        class="text-danger ms-1">*</span></label>
                                                <select id="city_id" name="city_id"
                                                    class="form-select border border-dark rounded-1 pe-5 custom-select form-control">
                                                    <option selected disabled>Select City</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-4 col-12">
                                            <div class="mb-3">
                                                <label class="form-label">Branch Type<span
                                                        class="text-danger ms-1">*</span></label>
                                                <select id="branch_type" name="branch_type"
                                                    class="form-control select2-ajax select2-url"
                                                    data-placeholder="Select or Add Branch Type"
                                                    data-search-url="{{ route('branchType.search') }}"
                                                    data-selected-id="{{ $branch_center->getBranchType->id ?? '' }}"
                                                    data-selected-text="{{ $branch_center->getBranchType->name ?? '' }}">
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-4 col-12">
                                            <div class="mb-3">
                                                <label class="form-label">Branch Name<span
                                                        class="text-danger ms-1">*</span></label>
                                                <input type="text" name="name" id="name" class="form-control"
                                                    value="{{ $branch_center->name }}">
                                            </div>
                                        </div>
                                        <div class="col-sm-4 col-12">
                                            <div class="mb-3">
                                                <label class="form-label">Status<span
                                                        class="text-danger ms-1">*</span></label>
                                                <select class="select" name="status" id="status">
                                                    <option value="1" {{ $branch_center->status == '1' ? 'selected' : '' }}>
                                                        Active
                                                    </option>
                                                    <option value="0" {{ $branch_center->status == '0' ? 'selected' : '' }}>
                                                        In-Active
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="d-flex align-items-center justify-content-end mb-4">
                                                <button type="button" class="btn btn-secondary me-2">Cancel</button>
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </form>
        </div>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            let countrySelect = document.getElementById("country_id");
            let stateSelect = document.getElementById("state_id");
            let citySelect = document.getElementById("city_id");

            // ---- Load States ----
            function loadStates(countryId, selectedStateId = null) {
                if (!countryId) return;

                stateSelect.innerHTML = '<option selected disabled>Loading...</option>';
                citySelect.innerHTML = '<option selected disabled>Select City</option>'; // reset city

                fetch(`/get-states/${countryId}`)
                    .then(res => res.json())
                    .then(data => {
                        stateSelect.innerHTML = '<option disabled selected>Select State</option>';
                        data.forEach(state => {
                            let option = document.createElement("option");
                            option.value = state.id;
                            option.textContent = state.state_name;

                            if (selectedStateId && state.id == selectedStateId) {
                                option.selected = true;
                            }

                            stateSelect.appendChild(option);
                        });

                        // If editing and state is preselected, trigger loading cities
                        if (selectedStateId) {
                            loadCities(selectedStateId, "{{ old('city_id', $branch_center->city_id ?? '') }}");
                        }
                    })
                    .catch(err => {
                        console.error("Error fetching states:", err);
                        stateSelect.innerHTML = '<option selected disabled>Error loading states</option>';
                    });
            }

            // ---- Load Cities ----
            function loadCities(stateId, selectedCityId = null) {
                if (!stateId) return;

                citySelect.innerHTML = '<option selected disabled>Loading...</option>';

                fetch(`/get-cities/${stateId}`)
                    .then(res => res.json())
                    .then(data => {
                        citySelect.innerHTML = '<option disabled selected>Select City</option>';
                        data.forEach(city => {
                            let option = document.createElement("option");
                            option.value = city.id;
                            option.textContent = city.city_name;

                            if (selectedCityId && city.id == selectedCityId) {
                                option.selected = true;
                            }

                            citySelect.appendChild(option);
                        });
                    })
                    .catch(err => {
                        console.error("Error fetching cities:", err);
                        citySelect.innerHTML = '<option selected disabled>Error loading cities</option>';
                    });
            }

            // ---- Event Listeners ----
            countrySelect.addEventListener("change", function () {
                loadStates(this.value);
            });

            stateSelect.addEventListener("change", function () {
                loadCities(this.value);
            });

            // ---- On Page Load (edit mode) ----
            let selectedCountry = "{{ old('country_id', $branch_center->country_id ?? '') }}";
            let selectedState = "{{ old('state_id', $branch_center->state_id ?? '') }}";
            let selectedCity = "{{ old('city_id', $branch_center->city_id ?? '') }}";

            if (selectedCountry) {
                loadStates(selectedCountry, selectedState);
            }
        });
    </script>
    <script>
        //Select2 Dropdown
        $(document).ready(function () {
            // Initialize all select2-ajax dropdowns
            $('.select2-ajax').each(function () {
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
                            if (field_id == 'car_info_category') {
                                return {
                                    results: data.map(item => ({
                                        id: item.key,
                                        text: item.name
                                    }))
                                };
                            }
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

                let initialized = false;

                // On first load, mark as initialized AFTER select2 sets prefilled value
                $('#car_info_category').one('select2:select', function () {
                    initialized = true;
                });
            }
        });

        // Reset Button
        document.getElementById("resetBtn").addEventListener("click", function () {
            let fields = @json(\App\Constants\commonConstant::CAR_DETAIL_RESET_FIELDS);

            fields.forEach(id => {
                let el = document.getElementById(id);
                if (el) {
                    if (el.type === "checkbox" || el.type === "radio") {
                        el.checked = false;
                    } else if (el.tagName === "SELECT") {
                        // Reset normal select
                        el.selectedIndex = 0;

                        // Reset all Select2 (with or without .select2-ajax class)
                        if ($(el).data('select2')) {
                            $(el).val(null).trigger("change");
                        }
                    } else {
                        el.value = "";
                    }
                }
            });

            // Reset file upload preview
            document.getElementById("brand_logo").value = "";
            document.getElementById("preview").innerHTML = "";
            document.getElementById("logoView").innerHTML = "";
        });


        document.addEventListener("DOMContentLoaded", function () {
            let fields = @json(\App\Constants\commonConstant::CAR_DETAIL_RESET_FIELDS);

            // Disable everything by default
            fields.forEach(id => {
                let el = document.getElementById(id);
                if (el) {
                    el.disabled = true;

                    if ($(el).data('select2')) {
                        $(el).prop("disabled", true).trigger("change");
                    }
                }
            });

            let logoInput = document.getElementById("brand_logo");
            if (logoInput) logoInput.disabled = true;

            let preview = document.getElementById("preview");
            if (preview) preview.classList.add("disabled");

            let logoView = document.getElementById("logoView");
            if (logoView) logoView.classList.add("disabled");

            // On button click → remove disabled
            document.getElementById("disableBtn").addEventListener("click", function () {
                fields.forEach(id => {
                    let el = document.getElementById(id);
                    if (el) {
                        el.disabled = false;

                        if ($(el).data('select2')) {
                            $(el).prop("disabled", false).trigger("change");
                        }
                    }
                });

                if (logoInput) logoInput.disabled = false;
                if (preview) preview.classList.remove("disabled");
                if (logoView) logoView.classList.remove("disabled");
            });
        });
    </script>

@endsection