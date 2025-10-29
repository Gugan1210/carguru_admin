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
        <div class="card shadow-sm p-4 mb-4">
          <div class="row">
            <div class="col-11">
              <h6 class="fw-bold">A&P MECHANICS</h6>
            </div>
            <div class="col-1">
              <button type="button" id="resetBtn" class="btn btn-warning text-dark">Reset</button>
            </div>
          </div>
          <hr>
          <div class="mb-3">
            <label class="form-label">PROMOTION ID</label>
            <div class="d-flex align-items-center gap-3">
              <input type="text" class="form-control w-25" id="promotion_id" name="promotion_id"
                placeholder="PROMOTION ID" value="{{ $promotion_id }}" readonly>
            </div>
          </div>

          <div class="row g-3">
            <div class="col-md-4">
              <label for="promoName" class="form-label">Promotion</label>
              <input type="text" name="promotion_name" class="form-control" id="promotion_name" maxlength="30"
                placeholder="Enter Promotion (max 30 letters)">
            </div>
            <div class="col-md-4">
              <label for="promoDetail" class="form-label">Promotion Detail</label>
              <input type="text" name="promotion_detail" class="form-control" id="promotion_detail"
                placeholder="Enter Amount or Discount %">
            </div>
          </div>

          <div class="row g-3 mt-2">
            <div class="col-md-3">
              <label for="startDate" class="form-label">Start Date</label>
              <input type="date" class="form-control" id="start_date" name="start_date">
            </div>
            <div class="col-md-3">
              <label for="endDate" class="form-label">End Date</label>
              <input type="date" class="form-control" id="end_date" name="end_date">
            </div>
            <div class="col-md-3">
              <label for="startTime" class="form-label">Start Time</label>
              <input type="time" class="form-control" id="start_time" name="start_time">
            </div>
            <div class="col-md-3">
              <label for="endTime" class="form-label">End Time</label>
              <input type="time" class="form-control" id="end_time" name="end_time">
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
                  <option value="{{ $car_discount['value'] }}">{{ $car_discount['name'] }}</option>
                @endforeach
              </select>
            </div>
            <div class="col-md-3">
              <label for="typeDisplay" class="form-label">Display</label>
              <select id="display" class="form-select" name="display">
                <option disabled selected>Select Display</option>
                @foreach (\App\Constants\CommonConstant::PROMOTION_CAR_DISPLAY as $car_display)
                  <option value="{{ $car_display['value'] }}">{{ $car_display['name'] }}</option>
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
                  <option value="{{ $car_discount_format['value'] }}">{{ $car_discount_format['name'] }}</option>
                @endforeach
              </select>
            </div>
            <div class="col-md-3">
              <label for="typeDisplay" class="form-label">Percentage Discount</label>
              <div class="input-group" style="max-width: 250px;">
                <input type="number" id="percentage_discount" name="percentage_discount" class="form-control"
                  placeholder="Enter Percentage">
                <span class="input-group-text">% OFF</span>
              </div>
            </div>
            <div class="col-md-3">
              <label for="typeDisplay" class="form-label">Amount Discount</label>
              <div class="input-group" style="max-width: 250px;">
                <input type="number" id="amount_discount" name="amount_discount" class="form-control"
                  placeholder="Enter Amount">
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
              <label for="carCategory" class="form-label">Car Category</label>
              <select id="car_category" class="form-select" name="car_category">
                <option disable>Select Car Category</option>
                @foreach ($carCategory as $category)
                  @if(strtolower($category->name) != 'bidding')
                    <option value="{{ $category->key }}">{{ $category->name }}</option>
                  @endif
                @endforeach

              </select>
            </div>
            <div class="col-md-3">
              <label for="registration_number" class="form-label">Car Registration Number</label>
              <input type="text" id="registration_number" class="form-control" name="registration_number"
                placeholder="Registration Number">
            </div>
            <div class="col-md-4">
              <button type="button" id="loadOffcanvasBtn" class="search-box btn btn-warning fw-bold text-dark ">
                Shortlist Cars for Promo
              </button>
              <div id="offcanvasContainer"></div>
            </div>
          </div>
          <div class="col-lg-12">
            <div class="d-flex align-items-center justify-content-end mb-4">
              <button type="button" class="btn btn-secondary me-2">Cancel</button>
              <button type="submit" id="promoSubmit" onclick="formSubmit()" class="btn btn-primary">Submit</button>
            </div>
          </div>
        </div>


@endsection
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
      <script src="{{ asset('build/js/offcanva.js') }}"></script>

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
        function formSubmit() {
          let promotion_id = $("#promotion_id").val();
          let promotion_name = $("#promotion_name").val();
          let promotion_detail = $("#promotion_detail").val();
          let start_date = $("#start_date").val();
          let end_date = $("#end_date").val();
          let start_time = $("#start_time").val();
          let end_time = $("#end_time").val();
          let car_category = $("#car_category").val();
          let registration_number = $('#registration_number').val();
          let discount = $('#discount').val();
          let display = $('#display').val();
          let discount_format = $('#discount_format').val();
          let percentage_discount = $('#percentage_discount').val();
          let amount_discount = $('#amount_discount').val();

          $.ajax({
            url: "{{ route('promo_discounts.store') }}",
            type: "POST",
            data: {
              _token: document.querySelector('meta[name="csrf-token"]').getAttribute("content"),
              promotion_id: promotion_id,
              promotion_name: promotion_name,
              promotion_detail: promotion_detail,
              start_date: start_date,
              end_date: end_date,
              start_time: start_time,
              end_time: end_time,
              car_category: car_category,
              registration_number: registration_number,
              discount: discount,
              display: display,
              discount_format: discount_format,
              percentage_discount: percentage_discount,
              amount_discount: amount_discount,
            },
            success: function (response) {
              showToast('', response.message);
              // submitFilter();

              setTimeout(function () {
                window.location.href = "/marketing/promo_discounts";
              }, 4000);

            },
            error: function (xhr) {
              $('#result').html('');
              if (xhr.responseJSON && xhr.responseJSON.errors) {
                $.each(xhr.responseJSON.errors, function (key, value) {
                  showToast('', value);
                });
              } else {
                showToast('', 'Something went wrong');
              }
            }
          });
        }

        function showToast(topic, message) {
          const toast = $('#toast');
          const toastMessage = $('#toast-message');

          toastMessage.html(`<p style="color:green;">${topic} ${message}</p>`);
          toast.addClass('show').removeClass('toast-hidden');

          setTimeout(function () {
            toast.removeClass('show').addClass('toast-hidden');
          }, 3000);
        }
      </script>
      <script>
        document.addEventListener("DOMContentLoaded", function () {
          // disable past dates for start_date
          let today = new Date().toISOString().split('T')[0];
          document.getElementById("start_date").setAttribute("min", today);

          // when user selects start_date, set it as min for end_date
          $('#start_date').on('change', function () {
            let startDate = $(this).val();
            $('#end_date').attr('min', startDate);
          });
        });
      </script>
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
      </script>
      <style>
        #toast {
          visibility: hidden;
          min-width: 250px;
          background-color: #fcdf3dff;
          color: #000000ff;
          text-align: center;
          border-radius: 5px;
          padding: 16px;
          position: fixed;
          z-index: 1;
          bottom: 30px;
          left: 50%;
          transform: translateX(-50%);
          transition: visibility 0s, opacity 0.5s linear;
        }

        #toast.show {
          visibility: visible;
          opacity: 1;
        }

        .toast-hidden {
          opacity: 0;
        }
      </style>
      <script>
        document.addEventListener('DOMContentLoaded', function () {
          const select = document.getElementById('discount_format');
          const percentageBox = document.getElementById('percentage_discount').closest('.col-md-3');
          const amountBox = document.getElementById('amount_discount').closest('.col-md-3');

          // Hide both initially
          percentageBox.style.display = 'none';
          amountBox.style.display = 'none';

          select.addEventListener('change', function () {
            const value = this.value;

            // Hide both first
            percentageBox.style.display = 'none';
            amountBox.style.display = 'none';

            // Show based on selection
            if (value === 'percentage_discount') {
              percentageBox.style.display = '';
              document.getElementById('amount_discount').value = '';
            } else if (value === 'amount_discount') {
              amountBox.style.display = '';
              document.getElementById('percentage_discount').value = '';
            }
          });
        });
      </script>