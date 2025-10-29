<?php $page = 'edit-role'; ?>
@extends('layouts.app', ['activePage' => 'table', 'title' => 'Create Branch Center - Admin Panel - CarGuru', 'navName' => 'Table List', 'activeButton' => 'laravel'])
@section('content')
    <div class="page-wrapper">
        <div class="content">
            <div class="page-header">
                <div class="add-item d-flex">
                    <div class="page-title">
                        <h4 class="fw-bold">Create Branch Center</h4>
                        <h6>Create Branch Center</h6>
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
            @session('success')
                <div class="alert alert-success" role="alert">
                    {{ $value }}
                </div>
            @endsession
            @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form method="POST" action="{{ route('branch_center.store') }}" class="add-role-form">
                @csrf
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
                                                    <option value="{{ $country->id }}" {{ old('country_id') == $country->id ? 'selected' : '' }}>
                                                        {{ $country->country_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-sm-4 mb-3">
                                            <label for="state_name" class="form-label">State<span
                                                    class="text-danger">*</span></label>
                                            <select name="state_id" id="state_id"
                                                class="form-select border border-dark rounded-1 pe-5 custom-select form-control">
                                                <option selected disabled>Select State</option>
                                            </select>
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
                                                    class="form-control select2-ajax select2-cate"
                                                    data-placeholder="Select or Add Category"
                                                    data-search-url="{{ route('branchType.search') }}"
                                                    data-add-url="{{ route('branchType.add') }}">
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-4 col-12">
                                            <div class="mb-3">
                                                <label class="form-label">Branch Name<span
                                                        class="text-danger ms-1">*</span></label>
                                                <input type="text" name="name" id="name" required class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-sm-4 col-12">
                                            <div class="mb-3">
                                                <label class="form-label">Status<span
                                                        class="text-danger ms-1">*</span></label>
                                                <select class="select" name="status" id="status">
                                                    <option value="1">Active
                                                    </option>
                                                    <option value="0">In-Active
                                                    </option>
                                                </select>
                                            </div>
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
        document.getElementById("country_id").addEventListener("change", function () {
            let countryId = this.value;
            let stateSelect = document.getElementById("state_id");

            // Clear old options in state dropdown
            stateSelect.innerHTML = '<option selected disabled>Loading...</option>';

            fetch(`/get-states/${countryId}`)
                .then(res => res.json())
                .then(data => {
                    stateSelect.innerHTML = '<option selected disabled>Select State</option>';

                    data.forEach(state => {
                        let option = document.createElement("option");
                        option.value = state.id;
                        option.textContent = state.state_name;
                        stateSelect.appendChild(option);
                    });

                    // Reset city dropdown too
                    document.getElementById("city_id").innerHTML = '<option selected disabled>Select City</option>';
                })
                .catch(err => {
                    console.error("Error fetching states:", err);
                    stateSelect.innerHTML = '<option selected disabled>Error loading states</option>';
                });
        });
    </script>

    <script>
        document.getElementById("state_id").addEventListener("change", function () {
            let stateId = this.value;
            let citySelect = document.getElementById("city_id");

            // Clear old options in city dropdown
            citySelect.innerHTML = '<option selected disabled>Loading...</option>';

            fetch(`/get-cities/${stateId}`)
                .then(res => res.json())
                .then(data => {
                    citySelect.innerHTML = '<option selected disabled>Select City</option>';

                    data.forEach(city => {
                        let option = document.createElement("option");
                        option.value = city.id;
                        option.textContent = city.city_name;
                        citySelect.appendChild(option);
                    });
                })
                .catch(err => {
                    console.error("Error fetching cities:", err);
                    citySelect.innerHTML = '<option selected disabled>Error loading cities</option>';
                });
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
                    $el.data('add-url')
                );
            });

            function dropDown(field_id, placeholder, routePathSearch, routePathAdd) {
                $('#' + field_id).select2({
                    placeholder: placeholder,
                    minimumInputLength: 0, // 👈 allow fetching without typing
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
                        processResults: function (data, params) {
                            let results = data.map(item => ({
                                id: item.id,
                                text: item.name
                            }));

                            // If no results, show option to add
                            if (results.length === 0 && params.term) {
                                results.push({
                                    id: 'new_' + params.term,
                                    text: '➕ Add "' + params.term + '"',
                                    is_new: true
                                });
                            }

                            return { results: results };
                        },
                        cache: true
                    }
                });

                // 👇 Trigger search when clicking (to load all records by default)
                $('#' + field_id).on('select2:open', function () {
                    if (!$('#' + field_id).data('select2').results.lastParams) {
                        $('#' + field_id).select2('search', '');
                    }
                });

                // Handle "Add New" option
                $('#' + field_id).on('select2:select', function (e) {
                    let data = e.params.data;
                    if (data.is_new) {
                        $.post(routePathAdd, {
                            _token: '{{ csrf_token() }}',
                            name: data.text.replace('➕ Add "', '').replace('"', ''),
                            field_id: field_id
                        }, function (response) {
                            // Add and select the newly created option
                            let newOption = new Option(response.name, response.id, true, true);
                            $('#' + field_id).append(newOption).trigger('change');
                        });
                    }
                });
            }

        });
    </script>

@endsection