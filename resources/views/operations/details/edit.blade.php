<?php $page = 'create-cardetails'; ?>
@extends('layouts.app', ['activePage' => 'table', 'title' => 'View / Modify Car Details - Admin Panel - CarGuru', 'navName' => 'Table List', 'activeButton' => 'laravel'])
@section('content')
    <div class="page-wrapper">
        <div class="content">
            <div class="page-header">
                <div class="add-item d-flex">
                    <div class="page-title">
                        <h4 class="fw-bold">View / Modify Car Details</h4>
                        <h6>View / Modify Details</h6>
                    </div>
                </div>
                <ul class="table-top-head">
                    <li>
                        <a data-bs-toggle="tooltip" data-bs-placement="top" title="Collapse" id="collapse-header"><i
                                class="ti ti-chevron-up"></i></a>
                    </li>
                </ul>
                <div class="page-btn mt-0">
                    <a href="{{route('car-details.index')}}" class="btn btn-secondary"><i data-feather="arrow-left"
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
            <form method="POST" action="{{ route('car-details.update', $carDetail->id) }}" class="add-role-form"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="add-product">
                    <div class="accordions-items-seperate" id="accordionSpacingExample">
                        <div class="accordion-item border mb-4">
                            <div id="SpacingOne" class="accordion-collapse collapse show"
                                aria-labelledby="headingSpacingOne">
                                <div class="accordion-body border-top">
                                    @include('operations.details.edit.info')
                                    @include('operations.details.edit.enigne')
                                    <div class="col-lg-12">
                                        <div class="d-flex align-items-center justify-content-end mb-4">
                                            <button type="button" class="btn btn-secondary me-2"
                                                href="{{ route('car-details.index') }}">Cancel</button>
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            @include('layouts.partials.footer-moden')
        </div>
    </div>
@endsection

@push('scripts')
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

                // On subsequent selections, run logic
                $('#car_info_category').on('select2:select', function (e) {
                    if (!initialized) return; // ignore first auto-trigger
                    let prefix = e.params.data.id;
                    if (!prefix) return;

                    if (prefix != selectedId) {
                        // New category → generate new code
                        fetch(`/generate-code/${prefix}`)
                            .then(r => r.json())
                            .then(data => {
                                if (data.code) {
                                    $('#car_detail_id').val(data.code);
                                }
                            });
                    } else {
                        // Same as original → restore prefilled code
                        $('#car_detail_id').val('{{ $carDetail->car_detail_id ?? "" }}');
                    }
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
@endpush