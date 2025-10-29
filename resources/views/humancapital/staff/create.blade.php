<div class="bg-light">
  <div class="card shadow-sm p-4">
    <div class="page-header">
      <div class="add-item d-flex">
        <div class="page-title">
          <h5 class="fw-bold">Department<i class="fa-solid fa-circle-info pt-1 ms-2"></i></h5>
          <!-- <h6>Manage your Commission</h6> -->
        </div>
      </div>
      <div class="d-flex justify-content-end">
        <button type="reset" id="resetBtn" class="btn btn-light text-dark btn-sm px-4 py-2">Reset</button>
      </div>
    </div>
    <form method="POST" action="{{ route('staff.store') }}" class="p-4 border rounded bg-white shadow-sm"
      enctype="multipart/form-data">
      @csrf
      <div class="container my-4">
        <!-- Row 1 -->
        <div class="row g-3">
          <div class="col-md-10">
            <div class="row g-3">
              <div class="col-md-3">
                <label class="form-label">Staff ID</label>
                <input type="text" id="staff_id" name="staff_id" class="form-control bg-light text-dark fw-bold"
                  readonly>
              </div>
              <div class="col-md-3 section" data-section="business">
                <div class="d-flex justify-content-between align-items-center">
                  <label class="form-label">Business Unit</label>
                  <!-- <i class="fa-solid fa-plus text-dark bg-warning rounded-circle cursor-pointer d-flex align-items-center justify-content-center p-1 plus-icon"></i> -->
                </div>
                <div class="position-relative mb-2">
                  <select id="business_unit" name="business_unit"
                    class="form-select border  select2-ajax @error('business_unit') is-invalid @enderror"
                    data-placeholder="Select or Add a Business Unit" data-search-url="{{ route('commition.search') }}"
                    data-add-url="{{ route('commition.add') }}">
                  </select>
                  <!-- <i class="fa-solid fa-plus text-dark bg-warning rounded-circle cursor-pointer d-flex align-items-center justify-content-center p-1 plus-icon"></i> -->
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
                    data-add-url="{{ route('department.add') }}">
                  </select>
                  <!-- <!-- <i class="fa-solid fa-plus text-dark bg-warning rounded-circle cursor-pointer d-flex align-items-center justify-content-center p-1 plus-icon"></i> -->
                  -->
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
                    class="form-select border  form-control @error('status') is-invalid @enderror">
                    <option disabled>Select Status</option>
                    <option value="active" {{ old('status') == 'active' ? 'selected' : ''}}>Active</option>
                    <option value="suspended" {{ old('status') == 'suspended' ? 'selected' : ''}}>Suspended</option>
                    <option value="resigned" {{ old('status') == 'resigned' ? 'selected' : ''}}>Resigned</option>
                    <option value="dismissed" {{ old('status') == 'dismissed' ? 'selected' : ''}}>Dismissed</option>
                  </select>
                  <!-- <i class="fa-solid fa-plus text-dark bg-warning rounded-circle cursor-pointer d-flex align-items-center justify-content-center p-1 plus-icon"></i> -->
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
                    class="form-select border  form-control @error('designated_role') is-invalid @enderror">
                    <option disabled selected>Enter Designated Role</option>
                    <option value="inspection" {{ old('designated_role') == 'inspection' ? 'selected' : ''}}>Inspection
                    </option>
                    <option value="sales" {{ old('designated_role') == 'sales' ? 'selected' : ''}}>Sales</option>
                    <option value="marketing" {{ old('designated_role') == 'marketing' ? 'selected' : ''}}>Marketing
                    </option>
                    <option value="others" {{ old('designated_role') == 'others' ? 'selected' : ''}}>Others</option>
                  </select>
                  <!-- <i class="fa-solid fa-plus text-dark bg-warning rounded-circle cursor-pointer d-flex align-items-center justify-content-center p-1 plus-icon"></i> -->
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
                    class="form-select border @error('designated_location') is-invalid @enderror">
                    <option selected disabled>Enter Designated Location</option>
                    <option value="all_location" {{ old('designated_location') == 'all_location' ? 'selected' : ''}}>All
                      Location</option>
                    @foreach ($branches as $branch)
                      <option value="{{ $branch->id }}" {{ old('designated_location') == $branch->id ? 'selected' : '' }}>
                        {{ $branch->branch_name }}
                      </option>
                    @endforeach
                    <option value="others" {{ old('designated_location') == 'others' ? 'selected' : ''}}>
                      Others
                    </option>
                  </select>
                  <!-- <i class="fa-solid fa-plus text-dark bg-warning rounded-circle cursor-pointer d-flex align-items-center justify-content-center p-1 plus-icon"></i> -->
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
                  value="{{ old('specific_function') }}">
                <div class="dynamic-inputs"></div>
              </div>
            </div>
            <div class="row g-3 mt-2">
              <div class="col-md-3">
                <label class="form-label">Name</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Enter Name"
                  id="name" name="name" value="{{ old('name') }}">
              </div>
              <div class="col-md-3">
                <label class="form-label">I.C. Number</label>
                <input type="text" class="form-control @error('i_c_number') is-invalid @enderror"
                  placeholder="Enter I.C. Number" id="i_c_number" name="i_c_number" value="{{ old('i_c_number') }}">
              </div>
              <div class="col-md-3">
                <label class="form-label">Gender</label>
                <div class="position-relative mb-2">
                  <select id="gender" name="gender"
                    class="form-select border  form-control @error('gender') is-invalid @enderror">
                    <option disabled selected>Select Gender</option>
                    <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>Male</option>
                    <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>Female</option>
                  </select>
                  <!-- <i class="fa-solid fa-plus text-dark bg-warning rounded-circle cursor-pointer d-flex align-items-center justify-content-center p-1 plus-icon"></i> -->
                </div>

              </div>
              <div class="col-md-3">
                <label class="form-label">Race</label>
                <div class="position-relative mb-2">
                  <select id="race" name="race"
                    class="form-select border  select2-ajax @error('race') is-invalid @enderror"
                    data-placeholder="Select or Add a Race" data-search-url="{{ route('race.searchtype') }}"
                    data-add-url="{{ route('race.addtype') }}">
                  </select>
                  <!-- <i class="fa-solid fa-plus text-dark bg-warning rounded-circle cursor-pointer d-flex align-items-center justify-content-center p-1 plus-icon"></i> -->
                </div>
              </div>

            </div>

            <div class="row g-3 mt-2">

              <div class="col-md-3">
                <label class="form-label">Contact Number</label>
                <input type="text" id="contact_number" name="contact_number"
                  class="form-control @error('contact_number') is-invalid @enderror" placeholder="Enter Contact Number"
                  value="{{ old('contact_number') }}">
              </div>
              <div class="col-md-3">
                <label class="form-label">Email Address</label>
                <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror"
                  placeholder="Enter Email Address" value="{{ old('email') }}">
                <!-- @error('email')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror -->
              </div>

            </div>
          </div>

          <!-- Profile Image -->
          <div class="col-md-2 ">

            <label class="form-label d-flex justify-content-center mt-1">Profile Image</label>
            <div class="upload-box w-100 text-center p-3 border rounded" id="uploadBox">
              <div id="preview">
                <i class="fa-solid fa-cloud-arrow-up fa-2x mb-2"></i>
                <p class="upload-text">Upload Photo (30x30px)</p>
                <small class="upload-subtext">Drag & drop file here (PNG/JPG)</small>
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
              value="{{ old('address_line_1') }}">
            <input type="text" id="address_line_2" name="address_line_2"
              class="form-control @error('address_line_2') is-invalid @enderror" placeholder="Address line 2"
              value="{{ old('address_line_2') }}">
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
                    class="form-select border  form-control @error('state_id') is-invalid @enderror">
                    <option selected disabled>Select State</option>
                    @foreach ($states as $state)
                      <option value="{{ $state->id }}" {{ old('state_id') == $state->id ? 'selected' : '' }}>
                        {{ $state->state_name }}
                      </option>
                    @endforeach
                  </select>
                  <!-- <i class="fa-solid fa-plus text-dark bg-warning rounded-circle cursor-pointer d-flex align-items-center justify-content-center p-1 plus-icon"></i> -->
                </div>
              </div>
              <div class="col-md-4">
                <label class="form-label">City</label>
                <div class="position-relative mb-2">
                  <select id="city_id" name="city_id"
                    class="form-select border  form-control @error('city_id') is-invalid @enderror">
                    <option selected disabled>Select City</option>
                  </select>
                  <!-- <i class="fa-solid fa-plus text-dark bg-warning rounded-circle cursor-pointer d-flex align-items-center justify-content-center p-1 plus-icon"></i> -->
                </div>
              </div>
              <div class="col-md-4">
                <label class="form-label">Postcode</label>
                <input type="text" class="form-control @error('postcode') is-invalid @enderror"
                  placeholder="Enter Postcode" id="postcode" name="postcode" value="{{ old('postcode') }}">
              </div>
            </div>
            <div class="row mt-3">
              <div class="col-md-4">
                <label class="form-label">Name of Emergency Contact</label>
                <input type="text" class="form-control @error('emergency_name') is-invalid @enderror" placeholder="Name"
                  id="emergency_name" name="emergency_name" value="{{ old('emergency_name') }}">
              </div>
              <div class="col-md-4">
                <label class="form-label">Emergency Contact</label>
                <input type="text" class="form-control @error('designated_location') is-invalid @enderror"
                  placeholder="Enter Contact Number" id="emergency_contact" name="emergency_contact"
                  value="{{ old('emergency_contact') }}">
              </div>
              <div class="col-md-4">
                <label class="form-label">Relationship</label>
                <div class="position-relative mb-2">
                  <select id="relationship" name="relationship"
                    class="form-select border  select2-ajax @error('relationship') is-invalid @enderror"
                    data-placeholder="Select or Add a Relationship"
                    data-search-url="{{ route('relationship.searchtype') }}"
                    data-add-url="{{ route('relationship.addtype') }}">
                  </select>
                  <!-- <i class="fa-solid fa-plus text-dark bg-warning rounded-circle cursor-pointer d-flex align-items-center justify-content-center p-1 plus-icon"></i> -->
                </div>
              </div>
            </div>
            <div class="row mt-3">
              <div class="col-md-4">
                <label class="form-label">Bank</label>
                <input type="text" id="bank_name" name="bank_name"
                  class="form-control @error('bank_name') is-invalid @enderror" placeholder="Enter Bank"
                  value="{{ old('bank_name') }}">
              </div>
              <div class="col-md-8">
                <label class="form-label">Bank Account Number</label>
                <input type="text" id="bank_account_number" name="bank_account_number"
                  class="form-control @error('bank_account_number') is-invalid @enderror"
                  placeholder="Enter Bank Account Number" value="{{ old('bank_account_number') }}">
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

  #uploadBox.drag-over {
    border: 2px dashed #007bff;
    background: #f0f8ff;
    cursor: pointer;
  }
</style>
<!-- <script>
  // Add new input filed
  document.querySelectorAll('.section').forEach(section => {
    const addBtn = section.querySelector('.plus-icon');
    const container = section.querySelector('.dynamic-inputs');

    addBtn.addEventListener('click', () => {
      // Create input group
      const inputGroup = document.createElement('div');
      inputGroup.className = 'input-group mb-2';
      inputGroup.innerHTML = `
        <input type="text" class="form-control" placeholder="Enter ${section.dataset.section}">
        <span class="input-group-text cursor-pointer remove-btn">
          <i class="fa-solid fa-xmark"></i>
        </span>
      `;

      container.appendChild(inputGroup);

      // Remove functionality
      const removeBtn = inputGroup.querySelector('.remove-btn');
      removeBtn.addEventListener('click', () => {
        inputGroup.remove();
      });
    });
  });
</script>

<script>
  // Handle delete row
  document.addEventListener("click", function (e) {
    if (e.target.classList.contains("remove-row")) {
      e.target.closest(".tier-row").remove();
    }
  });

  // Handle add row
  document.getElementById("addRow").addEventListener("click", function () {
    const container = document.getElementById("tieredCategory");
    const moreThanRow = document.getElementById("moreThanRow");

    const newRow = document.createElement("div");
    newRow.className = "row g-2 align-items-center mb-2 tier-row";
    newRow.innerHTML = `
      // Insert before "More Than" row
      container.insertBefore(newRow, moreThanRow)`;
  });
</script> -->
<script>
  document.getElementById("state_id").addEventListener("change", function () {
    let stateId = this.value;
    let citySelect = document.getElementById("city_id");

    // Clear old options
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
  const fileInput = document.getElementById("brand_logo");
  const uploadBox = document.getElementById("uploadBox");
  const previewBox = document.getElementById("preview");

  // Click on box opens file picker
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
      let fields = @json(\App\Constants\commonConstant::CAPITAL_HUMAN_STAFF);

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
@endpush