<?php $page = 'edit-role'; ?>
@extends('layouts.app', ['activePage' => 'table', 'title' => 'Create Role - Admin Panel - CarGuru', 'navName' => 'Table List', 'activeButton' => 'laravel'])
@section('content')
  <div class="page-wrapper">
    <div class="content">
      <div class="page-header">
        <div class="add-item d-flex">
          <div class="page-title">
            <h4 class="fw-bold">Promos & Discounts</h4>
            <h6>Manage your Promos & Discounts</h6>
          </div>
        </div>
      </div>
      <div class="">
        <!-- A&P MECHANICS -->
        <div id="toast" class="toast-hidden">
          <p id="toast-message"></p>
        </div>
        @if ($errors->any())
          <div class="alert alert-danger">
            <ul>
              @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
        @endif
        <div class="card shadow-sm p-4 mb-4">
          <div class="row">
            <div class="col-10">
              <h6 class="fw-bold">A&P MECHANICS</h6>
            </div>
            <div class="col-2 justify-content-end">
              <button type="reset" class="btn btn-warning text-dark">Reset</button>
              <button type="button" id="disableBtn" class="btn bg-warning text-black">Modify</button>
            </div>
          </div>
          <hr>
          <form method="POST" action="{{ route('promo_discounts.update', $promoDiscount->id) }}">
            @csrf
            @method('PUT')
            <div class="mb-3">
              <label class="form-label">PROMOTION ID</label>
              <div class="d-flex align-items-center gap-3">
                <input type="text" class="form-control w-25" id="promotion_id" name="promotion_id"
                  placeholder="PROMOTION ID" value="{{ $promoDiscount->promotion_id }}" readonly>
              </div>
            </div>

            <div class="row g-3">
              <div class="col-md-4">
                <label for="promoName" class="form-label">Promotion</label>
                <input type="text" name="promotion_name" class="form-control" id="promotion_name" maxlength="30"
                  placeholder="Enter Promotion (max 30 letters)" value="{{ $promoDiscount->promotion_name }}">
              </div>
              <div class="col-md-4">
                <label for="promoDetail" class="form-label">Promotion Detail</label>
                <input type="text" name="promotion_detail" class="form-control" id="promotion_detail"
                  placeholder="Enter Amount or Discount %" value="{{ $promoDiscount->promotion_detail }}">
              </div>
            </div>

            <div class="row g-3 mt-2">
              <div class="col-md-3">
                <label for="startDate" class="form-label">Start Date</label>
                <input type="date" class="form-control" id="start_date" name="start_date"
                  value="{{ $promoDiscount->start_date }}">
              </div>
              <div class="col-md-3">
                <label for="endDate" class="form-label">End Date</label>
                <input type="date" class="form-control" id="end_date" name="end_date"
                  value="{{ $promoDiscount->end_date }}">
              </div>
              <div class="col-md-3">
                <label for="startTime" class="form-label">Start Time</label>
                <input type="time" class="form-control" id="start_time" name="start_time"
                  value="{{ $promoDiscount->start_time }}">
              </div>
              <div class="col-md-3">
                <label for="endTime" class="form-label">End Time</label>
                <input type="time" class="form-control" id="end_time" name="end_time"
                  value="{{ $promoDiscount->end_time }}">
              </div>
            </div>
        </div>

        <div class="card shadow-sm p-4 mb-4">
          <h6 class="fw-bold">TYPE</h6>
          <div class="row g-3 align-items-end">
            <div class="col-md-3">
              <label for="typeDescount" class="form-label" data-bs-toggle="tooltip" title="Tooltip text">Discount</label>
              <select id="discount" class="form-select" name="discount">
                <option disabled selected>Select Discount</option>
                @foreach (\App\Constants\CommonConstant::PROMOTION_CAR_DISCOUNT as $car_discount)
                  <option value="{{ $car_discount['value'] }}" {{ $promoDiscount->discount == $car_discount['value'] ? 'selected' : '' }}>{{ $car_discount['name'] }}</option>
                @endforeach
              </select>
            </div>
            <div class="col-md-3">
              <label for="typeDisplay" class="form-label">Display</label>
              <select id="display" class="form-select" name="display">
                <option disabled selected>Select Display</option>
                @foreach (\App\Constants\CommonConstant::PROMOTION_CAR_DISPLAY as $car_display)
                  <option value="{{ $car_display['value'] }}" {{ $promoDiscount->display == $car_display['value'] ? 'selected' : '' }}>{{ $car_display['name'] }}</option>
                @endforeach
              </select>
            </div>
          </div>
          <div class="row g-3 align-items-end mt-1">
            <div class="col-md-3">
              <label for="typeDescount" class="form-label" data-bs-toggle="tooltip" title="Tooltip text">Format</label>
              <select id="discount_format" class="form-select" name="discount_format">
                <option disabled selected>Select Discount Format</option>
                @foreach (\App\Constants\CommonConstant::PROMOTION_CAR_DISCOUNT_FORMAT as $car_discount_format)
                  <option value="{{ $car_discount_format['value'] }}" {{ $promoDiscount->discount_format == $car_discount_format['value'] ? 'selected' : '' }}>
                    {{ $car_discount_format['name'] }}
                  </option>
                @endforeach
              </select>
            </div>
            <div class="col-md-3">
              <label for="typeDisplay" class="form-label">Percentage Discount</label>
              <div class="input-group" style="max-width: 250px;">
                <input type="number" id="percentage_discount" name="percentage_discount" class="form-control"
                  placeholder="Enter Percentage" value="{{ $promoDiscount->percentage_discount ?? '' }}">
                <span class="input-group-text">% OFF</span>
              </div>
            </div>
            <div class="col-md-3">
              <label for="typeDisplay" class="form-label">Amount Discount</label>
              <div class="input-group" style="max-width: 250px;">
                <input type="number" id="amount_discount" name="amount_discount" class="form-control"
                  placeholder="Enter Amount" value="{{ $promoDiscount->amount_discount ?? '' }}">
                <span class="input-group-text">OFF</span>
              </div>
            </div>
          </div>
        </div>

        <!-- CARS ON PROMO -->
        <div class="card shadow-sm p-4 mb-4">
          <h6 class="fw-bold">CARS ON PROMO</h6>
          <div class="row g-3 align-items-end">
            <div class="col-md-3">
              <label for="carCategory" class="form-label">Car Category : </label>
              <span class="badge text-bg-success text-white fw-bold">{!! $promoDiscount->carCategory->name  !!}</span>
            </div>
            @php
              $registrationNumber = '';

              if (!empty($promoDiscount->registration_number)) {
                $data = json_decode($promoDiscount->registration_number, true);

                if (is_array($data)) {
                  // clean each value
                  $data = array_map(function ($val) {
                    return trim($val, '"');   // removes double quotes if present
                  }, $data);

                  $registrationNumber = implode(', ', $data);
                } else {
                  $registrationNumber = trim($promoDiscount->registration_number, '"');
                }
              }
            @endphp
            <div class="col-md-3">
              <label for="registration_number" class="form-label">Car Registration Number</label>
              <input type="text" id="registration_number" class="form-control" name="registration_number"
                placeholder="Registration Number" value="{{ $registrationNumber }}">
            </div>
            <div class="col-lg-12">
              <div class="d-flex align-items-center justify-content-end mb-4">
                <button type="button" class="btn btn-secondary me-2">Cancel</button>
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </div>
            </form>

            @include('marketing.promo_discounts.table')
          </div>

        </div>

@endsection
      <style>
        .table thead tr th {
          background: #ffeebf !important;
        }

        .table thead tr th:nth-child(3) {
          background: #FFDCB8 !important;
        }

        .table thead tr th:nth-child(4) {
          background: #FFDCB8 !important;
        }

        .table thead tr th:nth-child(5) {
          background: #FFDCB8 !important;
        }

        .table thead tr th:nth-child(6) {
          background: #FFDCB8 !important;
        }

        .table thead tr th:nth-child(7) {
          background: #FFDCB8 !important;
        }

        .table tbody tr td:nth-child(3) {
          background: #fcedf5 !important;
        }

        .table tbody tr td:nth-child(4) {
          background: #fcedf5 !important;
        }

        .table tbody tr td:nth-child(5) {
          background: #fcedf5 !important;
        }

        .table tbody tr td:nth-child(6) {
          background: #fcedf5 !important;
        }

        .table tbody tr td:nth-child(7) {
          background: #fcedf5 !important;
        }

        .table thead tr th:nth-child(11) {
          background: #FAE1A0 !important;
        }

        .table tbody tr td:nth-child(11) {
          background: #f7edd2 !important;
        }
      </style>
      <script>

        // Reset Button
        document.addEventListener("DOMContentLoaded", function () {
          let resetBtn = document.getElementById("resetBtn");
          if (resetBtn) {
            resetBtn.addEventListener("click", function () {
              let fields = @json(\App\Constants\commonConstant::MARKETING_PROMOS_DISCOUNTS_FIELDS);

              fields.forEach(id => {
                let el = document.getElementById(id);
                if (el) {
                  if (el.type === "checkbox" || el.type === "radio") {
                    el.checked = false;
                  } else if (el.tagName === "SELECT") {
                    el.selectedIndex = 0;
                    if ($(el).data('select2')) {
                      $(el).val(null).trigger("change");
                    }
                  } else {
                    el.value = "";
                  }
                }
              });
            });
          }
        });
        // Modify
        document.addEventListener("DOMContentLoaded", function () {
          let fields = @json(\App\Constants\commonConstant::MARKETING_PROMOS_DISCOUNTS_FIELDS);

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
      <script>
        document.addEventListener('DOMContentLoaded', function () {
          const select = document.getElementById('discount_format');
          const percentageBox = document.getElementById('percentage_discount').closest('.col-md-3');
          const amountBox = document.getElementById('amount_discount').closest('.col-md-3');
          const percentageInput = document.getElementById('percentage_discount');
          const amountInput = document.getElementById('amount_discount');

          // Hide both initially
          percentageBox.style.display = 'none';
          amountBox.style.display = 'none';

          // Get default format from backend (for edit mode)
          const defaultFormat = `{{ $promoDiscount->discount_format ?? '' }}`;
          const percentageValue = `{{ $promoDiscount->percentage_discount ?? '' }}`;
          const amountValue = `{{ $promoDiscount->amount_discount ?? '' }}`;

          // Set default selected format if editing
          if (defaultFormat) {
            select.value = defaultFormat;
          }

          // Function to handle visibility based on value
          function handleDiscountVisibility(value) {
            percentageBox.style.display = 'none';
            amountBox.style.display = 'none';

            if (value === 'percentage_discount') {
              percentageBox.style.display = '';
              percentageInput.value = percentageValue;
              amountInput.value = '';
            } else if (value === 'amount_discount') {
              amountBox.style.display = '';
              amountInput.value = amountValue;
              percentageInput.value = '';
            }
          }

          // Trigger change when page loads (edit mode)
          handleDiscountVisibility(select.value);

          // Listen for user changes
          select.addEventListener('change', function () {
            handleDiscountVisibility(this.value);
          });
        });
      </script>