<?php $page = 'create-carmake'; ?>
@extends('layouts.app', ['activePage' => 'table', 'title' => 'Create Car Makes - Admin Panel - CarGuru', 'navName' => 'Table List', 'activeButton' => 'laravel'])
@section('content')
    <div class="page-wrapper">
        <div class="content">
            <div class="page-header">
                <div class="add-item d-flex">
                    <div class="page-title">
                        <h4 class="fw-bold">CAR MASTER DATA / CAR MAKE</h4>
                        <h6>Create Make</h6>
                    </div>
                </div>
                <ul class="table-top-head">
                    <li>
                        <a data-bs-toggle="tooltip" data-bs-placement="top" title="Collapse" id="collapse-header"><i
                                class="ti ti-chevron-up"></i></a>
                    </li>
                </ul>
                <div class="page-btn mt-0">
                    <a href="{{route('carmakes.index')}}" class="btn btn-secondary"><i data-feather="arrow-left"
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
            <form method="POST" action="{{ route('carmakes.store') }}" class="add-role-form" enctype="multipart/form-data">
                @csrf
                <div class="add-product">
                    <div class="accordions-items-seperate" id="accordionSpacingExample">
                        <div class="accordion-item border mb-4">
                            <div id="SpacingOne" class="accordion-collapse collapse show"
                                aria-labelledby="headingSpacingOne">
                                <div class="accordion-body border-top">
                                    @include('cars.makes.create.mmv')
                                    @include('cars.makes.create.enigne')
                                    @include('cars.makes.create.dimension')
                                    @include('cars.makes.create.brakes')
                                    @include('cars.makes.create.warranty')
                                    <div class="col-lg-12">
                                        <div class="d-flex align-items-center justify-content-end mb-4">
                                            <button type="button" class="btn btn-secondary me-2"
                                                href="{{ route('carmakes.index') }}">Cancel</button>
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
        @include('layouts.partials.footer-moden')
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

        // Reset Button
        document.getElementById("resetBtn").addEventListener("click", function () {
            let fields = @json(\App\Constants\commonConstant::CAR_MAKE_RESET_FIELDS);

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
    </script>
    <script>
        $(document).ready(function () {
            const $start = $("#start_year");
            const $end = $("#end_year");
            const $error = $("#yearError");

            function validateRange() {
                let start = parseInt($start.val());
                let end = parseInt($end.val());

                if ($start.val() && $end.val()) {
                    if (start > end) {
                        $error.text("End Year must be greater than or equal to Start Year").show();
                        $end.addClass("is-invalid");
                    } else {
                        $error.hide();
                        $end.removeClass("is-invalid");
                    }
                } else {
                    $error.hide();
                    $end.removeClass("is-invalid");
                }
            }

            $start.on("input", validateRange);
            $end.on("input", validateRange);
        });
    </script>
@endpush