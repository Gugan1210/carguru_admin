<?php $page = 'edit-role'; ?>
@extends('layouts.app', ['activePage' => 'table', 'title' => 'Create Role - Admin Panel - CarGuru', 'navName' => 'Table List', 'activeButton' => 'laravel'])
@section('content')
  <div class="page-wrapper ">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <div class="content">

      <div class="">
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
        <div class=" pt-2 bg-light">
          <div class="card shadow-sm p-4">
            <div class="page-header">
              <div class="add-item d-flex">
                <div class="page-title">
                  <h5 class="fw-bold">MAKE & MODEL</h5>
                  <!-- <h6>Manage your Commission</h6> -->
                </div>
              </div>
              <div class="d-flex justify-content-end">
                <button type="reset" class="btn btn-warning text-dark btn-sm">Reset</button>
              </div>
            </div>
            <form method="POST" action="{{ route('car_valuation.update', $valuation->id) }}" class="add-role-form">
              @csrf
              @method('PUT')
              <div class="row g-3">
                <!-- Car Make -->
                <div class="col-md-2 input-col">
                  <label for="car_make" class="form-label fw-bold text-uppercase small">Car Make</label>
                  <div class="custom-select-wrapper">
                    <select id="brand_id" name="brand_id" class="form-control form-select"></select>
                    <i class="bi bi-caret-down-fill"></i>
                  </div>
                </div>

                <!-- Car Model -->
                <div class="col-md-2 input-col">
                  <label for="car_model" class="form-label fw-bold text-uppercase small">Car Model</label>
                  <div class="custom-select-wrapper">
                    <select id="model_id" name="model_id" class="form-control form-select"></select>
                    <i class="bi bi-caret-down-fill"></i>
                  </div>
                </div>

                <!-- MSRP -->
                <div class="col-md-2 input-col">
                  <label for="msrp" class="form-label fw-bold text-uppercase small">MSRP</label>
                  <input type="text" id="msrp" name="msrp" class="form-control" placeholder="Enter Number"
                    value="{{ $valuation->msrp ?? '-' }}">

                </div>

                <!-- Platform Discount -->
                <div class="col-md-2 input-col">
                  <label for="discount" class="form-label fw-bold text-uppercase small">Platform Discount</label>
                  <div class="input-group">
                    <input type="text" id="platform_discount" name="platform_discount" class="form-control"
                      placeholder="Enter Number" value="{{ $valuation->platform_discount ?? '-' }}">
                    <span class="input-group-text ">%</span>
                  </div>
                </div>

                <!-- Base Mileage -->
                <div class="col-md-2 input-col">
                  <label for="base_mileage" class="form-label fw-bold text-uppercase small">Base Mileage Per Year
                    (KM)</label>
                  <input type="text" id="base_mileage_per_year" name="base_mileage_per_year" class="form-control"
                    placeholder="Enter Number" value="{{ $valuation->base_mileage_per_year ?? '-' }}">
                </div>
              </div>
              <div class="row g-3 mt-3">
                <div>
                  <h5 class="fw-bold">DEPRECIATION TYPE</h5>
                </div>
                <!-- Depreciation Type -->
                <div class="col-md-5">
                  <label for="from_year" class="form-label fw-bold text-uppercase small">Select or Add Type</label>
                  <div class="custom-select-wrapper">
                    <select id="depreciationType" name="depreciation" class="form-select">
                      <option value="">Select</option>
                      <option value="car">Car Depreciation</option>
                      <option value="aging">Other Aging Depreciation</option>
                      <!-- <option value="accident">Accident Penalty</option> -->
                    </select>
                    <i class="bi bi-caret-down-fill"></i>
                  </div>

                </div>

                <!-- Valuation From Year -->
                <div class="col-md-2">
                  <label for="from_year" class="form-label fw-bold text-uppercase small">Valuation From Year</label>
                  <input type="text" id="fromYear" name="fromyear" class="form-control" placeholder="Enter Number"
                    value="1">
                </div>

                <!-- Valuation To Year -->
                <div class="col-md-2">
                  <label for="from_year" class="form-label fw-bold text-uppercase small">Valuation To Year</label>
                  <input type="text" id="toYear" name="toyear" class="form-control" placeholder="Enter Number">
                </div>
                <div class="col-md-2 d-flex align-items-end">
                  <button class="btn btn-primary w-100" id="generateBtn">Generate</button>
                </div>
              </div>
              <div class="row g-3 mt-4">
                <div class="col-md-4">
                  <div class="depreciation-card">
                    <h6 class="fw-bold mb-3">CAR DEPRECIATION</h6>
                    <div id="carContainer"></div>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="other-depreciation-card">
                    <h6 class="fw-bold mb-3">OTHER AGING DEPRECIATION</h6>
                    <div id="agingContainer"></div>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="accident-penality-card">
                    <h6 class="fw-bold mb-3">ACCIDENT PENALTY</h6>
                    <!-- <div id="accidentContainer"></div> -->
                    <div class="year-input-row2">
                      <label for="" class=" form-label fw-bold text-uppercase small">No Accident</label>
                      <input type="text" id="no_accident" name="no_accident" class="form-control"
                        placeholder="Enter Number" value="{{ $valuation->no_accident ?? '-' }}">
                    </div>
                    <div class="year-input-row2">
                      <label for="" class=" form-label fw-bold text-uppercase small">Minor Accident</label>
                      <input type="text" id="minor_accidend" name="minor_accidend" class="form-control"
                        placeholder="Enter Number" value="{{ $valuation->minor_accidend ?? '-' }}">
                    </div>
                    <div class="year-input-row2">
                      <label for="" class=" form-label fw-bold text-uppercase small">Major Accident</label>
                      <input type="text" id="major_accident" name="major_accident" class="form-control"
                        placeholder="Enter Number" value="{{ $valuation->major_accident ?? '-' }}">
                    </div>
                    <div class="year-input-row2">
                      <label for="" class=" form-label fw-bold text-uppercase small">Severe / Flooding</label>
                      <input type="text" id="severe_flooding" name="severe_flooding" class="form-control"
                        placeholder="Enter Number" value="{{ $valuation->severe_flooding ?? '-' }}">
                    </div>
                  </div>
                </div>
              </div>
              <!-- Add Row Button -->
              <button type="button" class="btn btn-primary btn-sm mt-3 d-none" id="addRow">+ Add Row</button>
              <div class="d-flex justify-content-end mt-2">
                <button type="submit" class="btn btn-warning ms-2 text-dark btn-sm">Submit</button>
              </div>
            </form>
          </div>
        </div>

        <style>
          .form-label {
            font-size: 10px;
          }

          .input-col {
            width: 20%;
          }

          .cursor-pointer {
            font-size: 8px;
          }

          /* wrapper for absolute icon */
          .custom-select-wrapper {
            position: relative;
          }

          /* remove native arrow (all browsers) and remove bootstrap background-image */
          .custom-select-wrapper .form-select,
          .custom-select-wrapper select {
            -webkit-appearance: none !important;
            -moz-appearance: none !important;
            appearance: none !important;

            /* Bootstrap sets a background-image for its .form-select caret — remove it */
            background-image: none !important;
            background-repeat: no-repeat !important;
            background-position: right center !important;

            /* room for your custom icon */
            padding-right: 2.4rem !important;
          }

          /* hide the MS dropdown arrow (IE/Edge) */
          .custom-select-wrapper .form-select::-ms-expand {
            display: none;
          }

          /* firefox focus hack (prevents weird arrow on some FF versions) */
          .custom-select-wrapper .form-select:-moz-focusring {
            color: transparent;
            text-shadow: 0 0 0 #000;
          }

          .form-control {
            font-size: 0.7rem;
          }

          /* the caret icon position */
          .custom-select-wrapper .bi-caret-down-fill {
            position: absolute;
            right: 0.75rem;
            top: 50%;
            transform: translateY(-50%);
            pointer-events: none;
            color: #000;
            font-size: 1rem;
          }

          .depreciation-card {
            border: 1px solid #fff6d5;
            border-radius: 8px;
            padding: 1rem;
            min-height: 250px;
            text-align: center;
            background: #fff;

          }

          .other-depreciation-card {
            border: 1px solid #fff6d5;
            border-radius: 8px;
            padding: 1rem;
            min-height: 250px;
            text-align: center;
            background: #fff;

          }

          .accident-penality-card {
            border: 1px solid #fff6d5;
            border-radius: 8px;
            padding: 1rem;
            min-height: 250px;
            text-align: center;
            background: #fff;

          }

          .year-input-row {
            display: flex;
            align-items: center;
            margin-bottom: 0.5rem;
          }

          .year-input-row label {
            flex: 1;
            margin-right: 0.5rem;
          }

          .year-input-row input {
            max-width: 150px;
          }

          .year-input-row2 {
            display: flex;
            align-items: center;
            margin-bottom: 0.5rem;
          }

          .year-input-row2 label {
            flex: 1;
            margin-right: 0.3rem;
          }

          .year-input-row2 input {
            max-width: 170px;
          }
        </style>

        <script>
          document.addEventListener("DOMContentLoaded", function () {

            function addRow(type, key, value = '') {
              let targetContainer;
              let namePrefix = '';

              if (type === 'car') {
                targetContainer = document.getElementById("carContainer");
                namePrefix = 'car_depreciation';
              } else if (type === 'aging') {
                targetContainer = document.getElementById("agingContainer");
                namePrefix = 'other_aging_depreciation';
              }

              const row = document.createElement("div");
              row.classList.add("year-input-row", "d-flex", "align-items-center", "mb-2");
              row.dataset.range = key;

              row.innerHTML = `
                <label class="me-2">${key}</label>
                <div class="input-group w-auto">
                    <input type="text" 
                           name="${namePrefix}[${key}]" 
                           value="${value}" 
                           class="form-control" 
                           placeholder="Enter Number">
                    <span class="input-group-text">%</span>
                </div>
                <button type="button" class="btn btn-sm ms-2 remove-row">&times;</button>
            `;

              row.querySelector(".remove-row").addEventListener("click", function () {
                row.remove();
              });

              targetContainer.appendChild(row);
            }

            // --- Prefill Car Depreciation ---
            @if(!empty($valuation->car_depreciation))
              let carDep = JSON.parse(@json($valuation->car_depreciation)); // parse JSON string
              Object.entries(carDep).forEach(([key, value]) => {
                addRow('car', key, value);
              });
            @endif

              // --- Prefill Other Aging Depreciation ---
              @if(!empty($valuation->other_aging_depreciation))
                let agingDep = JSON.parse(@json($valuation->other_aging_depreciation)); // parse JSON string
                Object.entries(agingDep).forEach(([key, value]) => {
                  addRow('aging', key, value);
                });
              @endif

            // --- Generate Button Logic ---
            document.getElementById("generateBtn").addEventListener("click", function (e) {
              e.preventDefault();

              const type = document.getElementById("depreciationType").value;
              const fromYear = parseInt(document.getElementById("fromYear").value);
              const toYear = parseInt(document.getElementById("toYear").value);

              if (!type || isNaN(fromYear) || isNaN(toYear) || fromYear > toYear) {
                alert("Please select type and enter a valid year range");
                return;
              }

              let targetContainer = type === "car" ? document.getElementById("carContainer") : document.getElementById("agingContainer");

              // Check overlap
              const existingRows = targetContainer.querySelectorAll(".year-input-row");
              for (let row of existingRows) {
                const [existFrom, existTo] = row.dataset.range.split("-").map(Number);
                if (fromYear <= existTo && existFrom <= toYear) {
                  alert(`This range (${fromYear}-${toYear}) overlaps with existing range (${existFrom}-${existTo})!`);
                  return;
                }
              }

              const rangeKey = fromYear === toYear ? `${fromYear}` : `${fromYear}-${toYear}`;
              addRow(type, rangeKey);
            });

          });
        </script>





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
                    country_id: '1'
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

            // --- Prefill for edit ---
            @if(isset($valuation) && $valuation->getModel->brand)
              let brandId = '{{ $valuation->getModel->brand->id }}';
              let brandName = '{{ $valuation->getModel->brand->brand_name }}';

              let option = new Option(brandName, brandId, true, true);
              $('#brand_id').append(option).trigger('change'); // sets as selected + searchable
            @endif
                                                      });


          $(document).ready(function () {
            // --- Model Select2 with search ---
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
                    brand_id: $('#brand_id').val()
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

            // --- Prefill for edit ---
            @if(isset($valuation) && $valuation->getModel)
              let modelId = '{{ $valuation->getModel->id }}';
              let modelName = '{{ $valuation->getModel->model_name }}';

              let option = new Option(modelName, modelId, true, true);
              $('#model_id').append(option).trigger('change'); // prefill and keep searchable
            @endif
                                            });

        </script>
@endsection