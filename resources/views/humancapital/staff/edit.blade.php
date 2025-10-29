<?php $page = 'edit-role'; ?>
@extends('layouts.app', ['activePage' => 'table', 'title' => 'Create Role - Admin Panel - CarGuru', 'navName' => 'Table List', 'activeButton' => 'laravel'])
@section('content')
  <div class="page-wrapper ">
    <div class="content">

      <div class="">

        <div class=" bg-light">
          <div class="card shadow-sm p-4">
            <div class="page-header">
              <div class="add-item d-flex">
                <div class="page-title">
                  <h5 class="fw-bold">Department<i class="fa-solid fa-circle-info pt-1 ms-2"></i></h5>
                  <!-- <h6>Manage your Commission</h6> -->
                </div>
              </div>
              <div class="d-flex justify-content-end">
                <button type="reset" class="btn btn-light text-dark btn-sm px-4 py-2">Reset</button>
                <button type="button" id="disableBtn" class="btn bg-warning text-black">Modify</button>
              </div>
            </div>
            <form method="POST" action="{{ route('staff.update', $staff->id) }}"
              class="p-4 border rounded bg-white shadow-sm" enctype="multipart/form-data">
              @csrf
              @method('PUT')
              <div class="container my-4">
                <!-- Row 1 -->
                <div class="row g-3">
                  <div class="col-md-10">
                    <div class="row g-3">
                      <div class="col-md-3">
                        <label class="form-label">Staff ID</label>
                        <input type="text" id="staff_id" name="staff_id" class="form-control bg-light text-dark fw-bold"
                          readonly value="{{ $staff->staff_id ?? '-' }}">
                      </div>
                      <div class="col-md-3 section" data-section="business">
                        <div class="d-flex justify-content-between align-items-center">
                          <label class="form-label">Business Unit</label>
                          <!-- <i class="fa-solid fa-plus text-dark bg-warning rounded-circle cursor-pointer d-flex align-items-center justify-content-center p-1 plus-icon"></i> -->
                        </div>
                        <div class="position-relative mb-2">
                          <select id="business_unit" name="business_unit"
                            class="form-control select2-ajax @error('business_unit') is-invalid @enderror"
                            data-placeholder="Select or Add Business Unit"
                            data-search-url="{{ route('commition.search') }}"
                            data-selected-id="{{ $staff->getBusinessUnit->id ?? '' }}"
                            data-selected-text="{{ $staff->getBusinessUnit->name ?? '' }}">
                          </select>
                          <i
                            class="fa-solid fa-caret-down position-absolute top-50 end-0 translate-middle-y me-3 pointer-events-none"></i>
                        </div>
                        <div class="dynamic-inputs"></div>
                      </div>
                      <div class="col-md-3 section" data-section="department">
                        <div class="d-flex justify-content-between align-items-center">
                          <label class="form-label">Department</label>
                          <!-- <i class="fa-solid fa-plus text-dark bg-warning rounded-circle cursor-pointer d-flex align-items-center justify-content-center p-1 plus-icon"></i> -->
                        </div>
                        <div class="position-relative mb-2">
                          <select id="department" name="department"
                            class="form-control select2-ajax @error('department') is-invalid @enderror"
                            data-placeholder="Select or Add Department" data-search-url="{{ route('department.search') }}"
                            data-selected-id="{{ $staff->getDepartment->id ?? '' }}"
                            data-selected-text="{{ $staff->getDepartment->name ?? '' }}">
                          </select>
                          <i
                            class="fa-solid fa-caret-down position-absolute top-50 end-0 translate-middle-y me-3 pointer-events-none"></i>
                        </div>
                        <div class="dynamic-inputs"></div>
                      </div>


                      <div class="col-md-3 section" data-section="status">
                        <div class="d-flex justify-content-between align-items-center">
                          <label class="form-label">Status</label>
                          <!-- <i class="fa-solid fa-plus text-dark bg-warning rounded-circle cursor-pointer d-flex align-items-center justify-content-center p-1 plus-icon"></i> -->
                        </div>
                        <div class="position-relative mb-2">
                          <select id="status" name="status"
                            class="form-select @error('status') is-invalid @enderror form-control">
                            <option disabled>Select Status</option>
                            <option value="active" {{ $staff->status == 'active' ? 'selected' : '' }}>Active</option>
                            <option value="suspended" {{ $staff->status == 'suspended' ? 'selected' : '' }}>Suspended
                            </option>
                            <option value="resigned" {{ $staff->status == 'resigned' ? 'selected' : '' }}>Resigned</option>
                            <option value="dismissed" {{ $staff->status == 'dismissed' ? 'selected' : '' }}>Dismissed
                            </option>
                          </select>
                          <i
                            class="fa-solid fa-caret-down position-absolute top-50 end-0 translate-middle-y me-3 pointer-events-none"></i>
                        </div>
                        <div class="dynamic-inputs"></div>
                      </div>
                    </div>
                    <div class="row g-3 mt-2">
                      <div class="col-md-3 section" data-section="designatedRole">
                        <div class="d-flex justify-content-between align-items-center">
                          <label class="form-label">Designated Role</label>
                          <!-- <i class="fa-solid fa-plus text-dark bg-warning rounded-circle cursor-pointer d-flex align-items-center justify-content-center p-1 plus-icon"></i> -->
                        </div>
                        <div class="position-relative mb-2">
                          <select id="designated_role" name="designated_role"
                            class="form-select @error('designated_role') is-invalid @enderror form-control">
                            <option disabled selected>Enter Designated Role</option>
                            <option value="inspection" {{ $staff->designated_role == 'inspection' ? 'selected' : '' }}>
                              Inspection</option>
                            <option value="sales" {{ $staff->designated_role == 'sales' ? 'selected' : '' }}>Sales
                            </option>
                            <option value="marketing" {{ $staff->designated_role == 'marketing' ? 'selected' : '' }}>
                              Marketing</option>
                            <option value="others" {{ $staff->designated_role == 'others' ? 'selected' : '' }}>Others
                            </option>
                          </select>
                          <i
                            class="fa-solid fa-caret-down position-absolute top-50 end-0 translate-middle-y me-3 pointer-events-none"></i>
                        </div>
                        <div class="dynamic-inputs"></div>
                      </div>
                      <div class="col-md-3 section" data-section="designatedLocation">
                        <div class="d-flex justify-content-between align-items-center">
                          <label class="form-label">Designated Location</label>
                          <!-- <i class="fa-solid fa-plus text-dark bg-warning rounded-circle cursor-pointer d-flex align-items-center justify-content-center p-1 plus-icon"></i> -->
                        </div>
                        <div class="position-relative mb-2">
                          <select id="designated_location" name="designated_location"
                            class="form-select @error('designated_location') is-invalid @enderror form-control">
                            <option selected disabled>Enter Designated Location</option>
                            <option value="all_location" {{ $staff->designated_location == 'all_location' ? 'selected' : '' }}>All Location</option>
                            @foreach ($branches as $branch)
                              <option value="{{ $branch->id }}" {{ $staff->designated_location == $branch->id ? 'selected' : '' }}>
                                {{ $branch->branch_name }}
                              </option>
                            @endforeach
                            <option value="others" {{ $staff->designated_location == 'others' ? 'selected' : '' }}>Others
                            </option>
                          </select>
                          <i
                            class="fa-solid fa-caret-down position-absolute top-50 end-0 translate-middle-y me-3 pointer-events-none"></i>
                        </div>
                        <div class="dynamic-inputs"></div>
                      </div>
                      <div class="col-md-3 section" data-section="specificFunction">
                        <div class="d-flex justify-content-between align-items-center ">
                          <label class="form-label">Specific Function</label>
                          <!-- <i class="fa-solid fa-plus text-dark bg-warning rounded-circle cursor-pointer d-flex align-items-center justify-content-center p-1 plus-icon" ></i> -->
                        </div>
                        <input type="text" class="form-control mb-2 @error('specific_function') is-invalid @enderror"
                          placeholder="Enter Specific Function (Optional)" id="specific_function" name="specific_function"
                          value="{{ $staff->specific_function ?? '-' }}">
                        <div class="dynamic-inputs"></div>
                      </div>
                    </div>
                    <div class="row g-3 mt-2">
                      <div class="col-md-3">
                        <label class="form-label">Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                          placeholder="Enter Name" id="name" name="name" value="{{ $staff->name ?? '-' }}">
                      </div>
                      <div class="col-md-3">
                        <label class="form-label">I.C. Number</label>
                        <input type="text" class="form-control @error('i_c_number') is-invalid @enderror"
                          placeholder="Enter I.C. Number" id="i_c_number" name="i_c_number"
                          value="{{ $staff->i_c_number ?? '-' }}">
                      </div>
                      <div class="col-md-3">
                        <label class="form-label">Gender</label>
                        <div class="position-relative mb-2">
                          <select id="gender" name="gender"
                            class="form-select @error('gender') is-invalid @enderror form-control">
                            <option disabled selected>Select Gender</option>
                            <option value="male" {{ $staff->gender == 'male' ? 'selected' : '' }}>Male</option>
                            <option value="female" {{ $staff->gender == 'female' ? 'selected' : '' }}>Female</option>
                          </select>
                          <i
                            class="fa-solid fa-caret-down position-absolute top-50 end-0 translate-middle-y me-3 pointer-events-none"></i>
                        </div>

                      </div>
                      <div class="col-md-3">
                        <label class="form-label">Race</label>
                        <div class="position-relative mb-2">
                          <select id="race" name="race"
                            class="form-control select2-ajax @error('race') is-invalid @enderror"
                            data-placeholder="Select or Add Race" data-search-url="{{ route('race.searchtype') }}"
                            data-selected-id="{{ $staff->getRace->id ?? '' }}"
                            data-selected-text="{{ $staff->getRace->name ?? '' }}">
                          </select>
                          <i
                            class="fa-solid fa-caret-down position-absolute top-50 end-0 translate-middle-y me-3 pointer-events-none"></i>
                        </div>
                      </div>

                    </div>

                    <div class="row g-3 mt-2">

                      <div class="col-md-3">
                        <label class="form-label">Contact Number</label>
                        <input type="text" id="contact_number" name="contact_number"
                          class="form-control @error('contact_number') is-invalid @enderror"
                          placeholder="Enter Contact Number" value="{{ $staff->contact_number ?? '-' }}">
                      </div>
                      <div class="col-md-3">
                        <label class="form-label">Email Address</label>
                        <input type="email" id="email" name="email"
                          class="form-control @error('email') is-invalid @enderror" placeholder="Enter Email Address"
                          value="{{ $staff->email ?? '-' }}">
                      </div>

                    </div>
                  </div>

                  <!-- Profile Image -->
                  <div class="col-md-2 ">

                    <label class="form-label d-flex justify-content-center mt-1">Profile Image</label>
                    <div class="upload-box w-100 text-center p-3 border rounded" id="uploadBox">
                      <div id="preview">
                        @if (!empty($staff->profile_image))
                          {{-- Show existing image --}}
                          <img src="{{ asset('storage/' . $staff->profile_image) }}" alt="Profile"
                            style="max-width:100px; max-height:100px; border-radius:4px; object-fit:cover;" />
                          <p class="mt-2 text-muted">Click to change</p>
                        @else
                          {{-- Default upload UI --}}
                          <i class="fa-solid fa-cloud-arrow-up fa-2x mb-2"></i>
                          <p class="upload-text">Upload Photo (30x30px)</p>
                          <small class="upload-subtext">Drag & drop file here (PNG/JPG)</small>
                        @endif
                      </div>
                      <input type="file" id="brand_logo" name="profile_image" accept="image/png, image/jpeg"
                        class="@error('brand_logo') is-invalid @enderror" hidden>
                    </div>

                  </div>
                </div>

                <hr class="mb-3 mt-5">

                <!-- Address -->
                <div class="row g-3 mt-3">
                  <div class="col-12 address">
                    <label class="form-label">Address</label>
                    <input type="text" id="address_line_1" name="address_line_1"
                      class="form-control mb-2 @error('address_line_1') is-invalid @enderror" placeholder="Address line 1"
                      value="{{ $staff->address_line_1 ?? '-' }}">
                    <input type="text" id="address_line_2" name="address_line_2"
                      class="form-control @error('address_line_2') is-invalid @enderror" placeholder="Address line 2"
                      value="{{ $staff->address_line_2 ?? '-' }}">
                  </div>
                  <div class="col-4"></div>
                </div>

                <!-- City, State, Postcode -->
                <div class="row g-5 mt-1">
                  <div class="col-10">
                    <div class="row">
                      <div class="col-md-4">
                        <label class="form-label">State</label>
                        <div class="position-relative mb-2">
                          <select id="state_id" name="state_id"
                            class="form-select @error('state_id') is-invalid @enderror form-control">
                            <option selected disabled>Select State</option>
                            @foreach ($states as $state)
                              <option value="{{ $state->id }}" {{ $staff->state_id == $state->id ? 'selected' : '' }}>
                                {{ $state->state_name }}
                              </option>
                            @endforeach
                          </select>
                          <i
                            class="fa-solid fa-caret-down position-absolute top-50 end-0 translate-middle-y me-3 pointer-events-none"></i>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <label class="form-label">City</label>
                        <div class="position-relative mb-2">
                          <select id="city_id" name="city_id"
                            class="form-select @error('city_id') is-invalid @enderror form-control">
                            <option selected disabled>Select City</option>
                          </select>
                          <i
                            class="fa-solid fa-caret-down position-absolute top-50 end-0 translate-middle-y me-3 pointer-events-none"></i>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <label class="form-label">Postcode</label>
                        <input type="text" class="form-control @error('Postcode') is-invalid @enderror"
                          placeholder="Enter Postcode" id="postcode" name="postcode"
                          value="{{ $staff->postcode ?? '-' }}">
                      </div>
                    </div>
                    <div class="row mt-3">
                      <div class="col-md-4">
                        <label class="form-label">Name of Emergency Contact</label>
                        <input type="text" class="form-control @error('emergency_name') is-invalid @enderror"
                          placeholder="Name" id="emergency_name" name="emergency_name"
                          value="{{ $staff->emergency_name ?? '-' }}">
                      </div>
                      <div class="col-md-4">
                        <label class="form-label">Emergency Contact</label>
                        <input type="text" class="form-control @error('emergency_contact') is-invalid @enderror"
                          placeholder="Enter Contact Number" id="emergency_contact" name="emergency_contact"
                          value="{{ $staff->emergency_contact ?? '-' }}">
                      </div>
                      <div class="col-md-4">
                        <label class="form-label">Relationship</label>
                        <div class="position-relative mb-2">
                          <select id="relationship" name="relationship"
                            class="form-control select2-ajax @error('relationship') is-invalid @enderror"
                            data-placeholder="Select or Add Relationship"
                            data-search-url="{{ route('relationship.searchtype') }}"
                            data-selected-id="{{ $staff->getRelationship->id ?? '' }}"
                            data-selected-text="{{ $staff->getRelationship->name ?? '' }}">
                          </select>
                          <i
                            class="fa-solid fa-caret-down position-absolute top-50 end-0 translate-middle-y me-3 pointer-events-none"></i>
                        </div>
                      </div>
                    </div>
                    <div class="row mt-3">
                      <div class="col-md-4">
                        <label class="form-label">Bank</label>
                        <input type="text" id="bank_name" name="bank_name"
                          class="form-control @error('bank_name') is-invalid @enderror" placeholder="Enter Bank"
                          value="{{ $staff->bank_name ?? '-' }}">
                      </div>
                      <div class="col-md-8">
                        <label class="form-label">Bank Account Number</label>
                        <input type="text" id="bank_account_number" name="bank_account_number"
                          class="form-control @error('bank_account_number') is-invalid @enderror"
                          placeholder="Enter Bank Account Number" value="{{ $staff->bank_account_number ?? '-' }}">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-warning ms-2 text-dark btn-sm px-4 py-2">Save</button>
              </div>
            </form>
          </div>

          <!-- Add Row Button -->
          <button type="button" class="btn btn-primary btn-sm mt-3 d-none" id="addRow">+ Add Row</button>
        </div>
      </div>
    </div>
    <style>
      .custom-select {
        appearance: none;
        -webkit-appearance: none;
        -moz-appearance: none;
        background: none;
      }

      .upload-box {
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 10px;
        min-height: 60%;
      }

      .plus-icon {
        font-size: 10px !important;
      }

      .address {
        width: 63% !important;
      }

      .upload-text {
        font-size: 12px !important;
      }

      .upload-subtext {
        font-size: 8px !important;
      }
    </style>

    <script>
      document.addEventListener("DOMContentLoaded", function () {
        let stateSelect = document.getElementById("state_id");
        let citySelect = document.getElementById("city_id");

        function loadCities(stateId, selectedCityId = null) {
          if (!stateId) return;

          citySelect.innerHTML = '<option selected disabled>Loading...</option>';

          fetch(`/get-cities/${stateId}`)
            .then(res => res.json())
            .then(data => {
              citySelect.innerHTML = '<option disabled>Select City</option>';

              data.forEach(city => {
                let option = document.createElement("option");
                option.value = city.id;
                option.textContent = city.city_name;

                // auto-select if matches staff->city_id
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

        // On change
        stateSelect.addEventListener("change", function () {
          loadCities(this.value);
        });

        // On page load (for edit page)
        let selectedState = stateSelect.value;
        let selectedCity = "{{ $staff->city_id ?? '' }}";
        if (selectedState) {
          loadCities(selectedState, selectedCity);
        }
      });
    </script>

    <script>
      const fileInput = document.getElementById("brand_logo");
      const uploadBox = document.getElementById("uploadBox");
      const previewBox = document.getElementById("preview");

      // Clicking the box opens file picker
      uploadBox.addEventListener("click", () => fileInput.click());

      // Handle file select
      fileInput.addEventListener("change", function () {
        previewImage(this.files[0]);
      });

      // Drag and drop
      uploadBox.addEventListener("dragover", (e) => {
        e.preventDefault();
        uploadBox.classList.add("drag-over");
      });

      uploadBox.addEventListener("dragleave", () => {
        uploadBox.classList.remove("drag-over");
      });

      uploadBox.addEventListener("drop", (e) => {
        e.preventDefault();
        uploadBox.classList.remove("drag-over");
        if (e.dataTransfer.files.length > 0) {
          fileInput.files = e.dataTransfer.files; // attach dropped file
          previewImage(e.dataTransfer.files[0]);
        }
      });

      // Preview function
      function previewImage(file) {
        if (!file) return;

        if (!file.type.startsWith("image/")) {
          alert("Please upload a valid image (PNG/JPG).");
          return;
        }

        const reader = new FileReader();
        reader.onload = function (e) {
          previewBox.innerHTML = `
                                                                                <img src="${e.target.result}" 
                                                                                     alt="Preview" 
                                                                                     style="max-width:100px; max-height:100px; border-radius:4px; object-fit:cover;"/>
                                                                                <p class="mt-2 text-muted">Click to change</p>
                                                                              `;
        };
        reader.readAsDataURL(file);
      }
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
        }
      });
    </script>
    <script>
      // Reset Button
      document.addEventListener("DOMContentLoaded", function () {
        let resetBtn = document.getElementById("resetBtn");
        if (resetBtn) {
          resetBtn.addEventListener("click", function () {
            let fields = @json(\App\Constants\commonConstant::CAPITAL_HUMAN_STAFF);

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
        let fields = @json(\App\Constants\commonConstant::CAPITAL_HUMAN_STAFF);

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