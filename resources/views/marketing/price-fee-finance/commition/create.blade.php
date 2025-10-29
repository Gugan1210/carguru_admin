

            <div class="">
<form id="commissionFormdata" method="POST">
      @csrf
      <input type="hidden" name="id" id="record_id">
<div class=" pt-2 bg-light">
  <div class="card shadow-sm p-4">
           <div class="page-header">
                <div class="add-item d-flex">
                    <div class="page-title">
                        <h5 class="fw-bold">STAFF DETAILS <i class="fa-solid fa-circle-info pt-1 ms-2"></i></h5>
                        <!-- <h6>Manage your Commission</h6> -->
                    </div>
                </div>
               <div class="d-flex justify-content-end">
            <button type="submit" class="btn btn-light text-dark btn-sm px-4 py-2 edit-btn" disabled>Edit</button>
            <button type="submit" class="btn btn-warning ms-2 text-dark btn-sm px-4 py-2 save-btn">Save</button>
        </div>
            </div>
    
      <div class="row g-3">

        
   <div class="col-md-3 section" data-section="business_unit">
       <div class="d-flex justify-content-between align-items-center">
                  <label class="form-label">Business Unit</label>
                  <!-- <i class="fa-solid fa-plus text-dark bg-warning rounded-circle cursor-pointer d-flex align-items-center justify-content-center p-1 plus-icon"></i> -->
                </div>
                <div class="position-relative mt-2">
                  <select id="business_unit" name="business_unit"
                    class="form-select border border-dark rounded-1 pe-5 custom-select select2-ajax"
                    data-placeholder="Select or Add a Business Unit" data-search-url="{{ route('commition.search') }}"
                    data-add-url="{{ route('commition.add') }}">
                    <!-- <option disabled selected>Select Business Unit</option>
                    <option value="Operations">Operations</option>
                    <option value="sales_&_marketing">Sales & Marketing</option>
                    <option value="customer_service">Customer Service</option>
                    <option value="finance_&_account">Finance & Account</option> -->
                  </select>
                  <!-- <i
                    class="fa-solid fa-caret-down position-absolute top-50 end-0 translate-middle-y me-3 pointer-events-none"></i> -->
        </div>
   </div>

   <div class="col-md-3 section" data-section="department">
       <div class="d-flex justify-content-between align-items-center">
                  <label class="form-label">Department</label>
                  <!-- <i class="fa-solid fa-plus text-dark bg-warning rounded-circle cursor-pointer d-flex align-items-center justify-content-center p-1 plus-icon"></i> -->
                </div>
                <div class="position-relative mt-2">
                  <select id="department" name="department"
                    class="form-select border border-dark rounded-1 pe-5 custom-select select2-ajax"
                    data-placeholder="Select or Add a Department" data-search-url="{{ route('department.search') }}"
                    data-add-url="{{ route('department.add') }}">
                    <!-- <option disabled selected>Select Business Unit</option>
                    <option value="Operations">Operations</option>
                    <option value="sales_&_marketing">Sales & Marketing</option>
                    <option value="customer_service">Customer Service</option>
                    <option value="finance_&_account">Finance & Account</option> -->
                  </select>
                  <!-- <i
                    class="fa-solid fa-caret-down position-absolute top-50 end-0 translate-middle-y me-3 pointer-events-none"></i> -->
        </div>
   </div>
   <!-- Personnel -->
   <div class="col-md-3 section" data-section="personnel">
  <div class="d-flex justify-content-between align-items-center mb-2">
    <label class="form-label">Designated Role</label>
    <!-- <i class="fa-solid fa-plus text-dark bg-warning rounded-circle cursor-pointer d-flex align-items-center justify-content-center p-1 plus-icon"></i> -->
  </div>

  <div class="position-relative">
    <select class="form-select mb-2 border border-dark rounded-1 custom-select pe-5" name="designated_role" id="personnel" required>
      <option disabled selected>Enter Designated Role</option>
      <option value="inspection">Inspection</option>
      <option value="sales">Sales</option>
      <option value="marketing">Marketing</option>
      <option value="others">Others</option>
    </select>
    <i class="fa-solid fa-caret-down position-absolute top-50 end-0 translate-middle-y me-3 text-secondary pointer-events-none"></i>
  </div>

  <div class="dynamic-inputs"></div>
</div>

<div class="col-md-3">
          <label for="specific_role" class="form-label">Specific Role</label>
          <input type="text" class="form-control border border-dark rounded-1" name="specific_role" id="specific_role"  placeholder="Enter Specific Role">

        </div>
 <!-- Commission Type -->
  <div class="add-item d-flex">
                    <div class="page-title">
                        <h5 class="fw-bold">COMMISSION <i class="fa-solid fa-circle-info pt-1 ms-2"></i></h5>
                        <!-- <h6>Manage your Commission</h6> -->
                    </div>
                </div>
<div class="col-md-5 section" data-section="commissionType">
  <div class="d-flex justify-content-between align-items-center mb-2">
    <label class="form-label">Commision Type</label>
    <!-- <i class="fa-solid fa-plus text-dark bg-warning rounded-circle cursor-pointer d-flex align-items-center justify-content-center p-1 plus-icon"></i> -->
  </div>

  <div class="position-relative">
    <select class="form-select mb-2 border border-dark rounded-1 custom-select pe-5 select2-ajax" name="commissionType" id="commissionType" required
    data-placeholder="Select or Add a Commision Type" data-search-url="{{ route('commition.searchtype') }}"
                    data-add-url="{{ route('commition.addtype') }}">
      <!-- <option selected disabled>Enter Commission Type</option>
      <option>No. of Cars Sold</option>
            <option>Appointments</option>
            <option>Car Inspections</option>
            <option>Loan Submitted</option> -->
    </select>
    <!-- Font Awesome caret-down -->
    <!-- <i class="fa-solid fa-caret-down position-absolute top-50 end-0 translate-middle-y me-3 text-secondary pointer-events-none"></i> -->
  </div>

  <div class="dynamic-inputs"></div>
</div>
<div class="col-md-3 section" data-section="commissionCategory">

                               <div class="d-flex justify-content-between align-items-center mb-2 ">
<label for="commissionCategory" class="form-label">Commission Category</label>
  <!-- <i class="fa-solid fa-plus text-dark bg-warning rounded-circle cursor-pointer d-flex align-items-center justify-content-center p-1 plus-icon" ></i> -->
</div>
               <div class="position-relative">
    <select class="form-select mb-2 border border-dark rounded-1 custom-select pe-5" name="commissionCategory" id="commissionCategory" required>
      <option selected disabled>Select Commission Category</option>
              <option value="tier">Tier Category</option>
            <option value="single">Single Category</option>
    </select>
    <!-- Font Awesome caret-down -->
    <i class="fa-solid fa-caret-down position-absolute top-50 end-0 translate-middle-y me-3 text-secondary pointer-events-none"></i>
  </div>
          <div class="dynamic-inputs"></div>
        </div>
  <div class="col-md-3"></div>
  
        <!-- Duration -->
        <div class="col-md-3">
          <label for="duration" class="form-label">Duration</label>
             <div class="position-relative">
    <select class="form-select mb-2 border border-dark rounded-1 custom-select pe-5" name="duration" id="duration" required>
      <option selected disabled>Select Duration</option>
            <option value="Monthly">Monthly</option>
            <option value="Quarterly">Quarterly</option>
            <option value="Bi-Weekly">Bi-Weekly</option>
            <option value="Yearly">Yearly</option>
    </select>
    <!-- Font Awesome caret-down -->
    <i class="fa-solid fa-caret-down position-absolute top-50 end-0 translate-middle-y me-3 text-secondary pointer-events-none"></i>
  </div>


        </div>

        <!-- Start Date -->

<div class="col-md-3">
  <label for="startDate" class="form-label">Start Date</label>
  <div class="position-relative">
    <input type="date" class="form-control border border-dark rounded-1 pe-5" name="startDate" id="startDate" required>
    <i class="fa-solid fa-calendar-days position-absolute top-50 end-0 translate-middle-y me-3 text-secondary"
       id="calendarStartIcon"></i>
  </div>
</div>
<!-- End Date -->
<div class="col-md-3">
  <label for="endDate" class="form-label">End Date</label>
  <div class="position-relative">
    <input type="date" class="form-control border border-dark rounded-1 pe-5" name="endDate" id="endDate" required>
    <i class="fa-solid fa-calendar-days position-absolute top-50 end-0 translate-middle-y me-3 text-secondary"
       id="calendarEndIcon"></i>
  </div>
</div>


  <div class="col-md-3"></div>
        <!-- Commission Category -->
        <!-- <div class="col-md-3 section" data-section="commissionCategory">

                               <div class="d-flex justify-content-between align-items-center mb-2 ">
<label for="commissionCategory" class="form-label">Commission Category</label>

</div>
               <div class="position-relative">
    <select class="form-select mb-2 border border-dark rounded-1 custom-select pe-5" name="commissionCategory" id="commissionCategory" required>
      <option selected disabled>Select Commission Category</option>
              <option value="tier">Tier Category</option>
            <option value="single">Single Category</option>
    </select>
    
    <i class="fa-solid fa-caret-down position-absolute top-50 end-0 translate-middle-y me-3 text-secondary pointer-events-none"></i>
  </div>
          <div class="dynamic-inputs"></div>
        </div> -->

      </div>
    <!-- </form> -->

<div class="d-none " id="commissionForm">
    <hr class="my-4">
   <!-- <form > -->
      <div class="row g-3">
 <div class="col-md-3">
      <label class="form-label">Commission ID</label>
      <input type="text" class="form-control bg-light text-dark fw-bold" name="commission_id" value="{{ $commissionid }}" readonly>
    </div>
    <div class="col-md-3">
      <label class="form-label">Personnel</label>
      <input type="text" class="form-control bg-light text-dark fw-bold" value="" id="personnel_output" readonly>
    </div>
<div class="col-md-3">
      <label class="form-label">Commission Category</label>
      <input type="text" class="form-control bg-light text-dark fw-bold" value=""  id="formTitleInput" readonly>
    </div>
  <div class="col-md-3"></div>
    <!-- Personnel -->



 <!-- Commission Category -->
        <div class="col-md-6">
          <label for="commissionCategory" class="form-label">Commission Description</label>
          <input type="text" class="form-control border border-dark rounded-1" name="commission_description"  placeholder="Commission Description">

        </div>
        <div class="col-md-3"></div>
  <div class="col-md-3"></div>






        <!-- Duration -->
        <div class="col-md-3">
          <label for="duration" class="form-label">Duration</label>
       <input type="text" class="form-control border border-dark rounded-1" name="commission_duration" value=""  id="duration_output" readonly>
       
        </div>

        <!-- Start Date -->
        <div class="col-md-3">
          <label for="commission_start_date" class="form-label">Start Date</label>
          <input type="date" class="form-control border border-dark rounded-1" name="commission_start_date" id="startDate_output" value="" readonly>
        </div>

        <!-- End Date -->
        <div class="col-md-3">
          <label for="commission_end_date" class="form-label">End Date</label>
          <input type="date" class="form-control border border-dark rounded-1" name="commission_end_date" id="endDate_output" value="" readonly>
        </div>
  <div class="col-md-3"></div>
      </div>
  <div class=" my-4">
  <h6 class="fw-bold  mb-3" id="formTitle">Tiered Category</h6>

  <div id="tieredCategory" class="tieredCategory">
    <!-- First Row -->
    <div class="row g-2 align-items-center mb-2 tier-row">
      <div class="col-md-3">
        <label class="pb-1">From</label>
        <input type="number" class="form-control from border border-dark rounded-1" name="tiered_category[0][from][]" placeholder="From" value="1">
      </div>
      <div class="col-md-3">
        <label class="pb-1">To</label>
        <input type="number" class="form-control to border border-dark rounded-1" name="tiered_category[0][to][]" placeholder="To" value="24">
      </div>
      <div class="col-md-3">

<div class="d-flex justify-content-between align-items-center ">
 <label class="pb-1">Commission</label>
  <i class="fa-solid fa-plus text-dark bg-warning rounded-circle cursor-pointer d-flex align-items-center justify-content-center p-1 plus-icon" id="addRow"></i>
</div>

     <div class="input-group border border-dark rounded-1">
  <span class="input-group-text border-0 bg-white py-2 pe-1"><small>RM</small></span>
  <input type="text" class="form-control commission border-0 rounded-1 px-0 py-2" name="tiered_category[0][commission][]" placeholder="Commission" value="150">
</div>

    </div>

    </div>


    <!-- More Than Row (fixed) -->
    <div class="row g-2 align-items-center mb-2 d-none" id="moreThanRow">
      <div class="col-md-2">
        <input type="number" class="form-control" placeholder="More Than" value="100" >
      </div>
      <div class="col-md-3">
        <input type="text" class="form-control" placeholder="Commission" value="RM 600">
      </div>
    </div>
  <div class="row g-2 align-items-center mb-2 tier-row">
      <div class="col-md-3">
        <label class="pb-1">More Than</label>
        <input type="number" class="form-control from border border-dark rounded-1" name="tiered_category[0][more_than][]" placeholder="More Than"  id="moreThan" >
      </div>
      <div class="col-md-3">

      </div>
      <div class="col-md-3">

<div class="d-flex justify-content-between align-items-center ">
 <label class="pb-1">Commission</label>
</div>
   <div class="input-group border border-dark rounded-1">
  <span class="input-group-text border-0 bg-white py-2 pe-1"><small>RM</small></span>
  <input type="text" name="tiered_category[0][morethan_commission][]"
         class="form-control border-0 px-0 py-2"
         placeholder="Commission"
         id="moreThanCommission">
</div>

      </div>
    </div>
</form>
  <!-- Add Row Button -->
  <button type="button" class="btn btn-primary btn-sm mt-3 d-none" id="addRow">+ Add Row</button>
</div>
</div>
</div>

</div>
<div id="toast" class="toast-hidden">
        <p id="toast-message"></p>
      </div>
<style>
      .plus-icon{
        font-size: 10px !important;
    }

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
                                field_id: field_id,
                                business_unit_id: $('#business_unit').val() || ''
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
                                field_id: field_id,
                                business_unit_id: $('#business_unit').val() || ''         
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


    const personnel=document.getElementById('personnel');
    const personnel_output=document.getElementById('personnel_output');
    const duration=document.getElementById('duration');
    const duration_output=document.getElementById('duration_output');
    const startDate=document.getElementById('startDate');
    const startDate_output=document.getElementById('startDate_output');
    const endDate=document.getElementById('endDate');
    const endDate_output=document.getElementById('endDate_output');
   const select = document.getElementById('commissionCategory');
const formDiv = document.getElementById('commissionForm');
const formTitle = document.getElementById('formTitle');
const formTitleInput = document.getElementById('formTitleInput');
const formContent = document.getElementById('addRow');

select.addEventListener('change', function() {
  // Show the hidden div
  formDiv.classList.remove('d-none');
personnel_output.value=personnel.value;
 duration_output.value=duration.value;
startDate_output.value=startDate.value;
endDate_output.value=endDate.value;



  // Perform actions based on selection
  if (this.value === 'single') {
    formTitle.textContent = "Single Category";
     formTitleInput.value = "Single Category";
    formContent.classList.add('d-none');
  } else if (this.value === 'tier') {
    formTitle.textContent = "Tiered Category";
    formTitleInput.value = "Tiered Category";
    formContent.classList.remove('d-none');
  }
});
document.addEventListener("DOMContentLoaded", () => {
    const container = document.getElementById("tieredCategory");
    const addBtn = document.getElementById("addRow");
    const moreThanInput = document.getElementById("moreThan");
    let index = 1;
    function addRow() {
         const toInputs = document.querySelectorAll(".tier-row .to");

    // Check if any To field is empty
    for (const input of toInputs) {
        if (!input.value || input.value.trim() === "") {
            alert(`Please fill all "To" fields before adding a new row.`);
            return; // stop adding a row
        }
    }

        const rows = container.querySelectorAll(".tier-row");
        const lastRow = rows[rows.length - 2]; // exclude MoreThan row
    const lastToInput = lastRow.querySelector(".to");
const lastToValue = parseInt(lastToInput.value) || 0;
const moreThanValue = parseInt(moreThanInput.value) || 0;

if (moreThanValue && moreThanValue <= lastToValue) {
    // MoreThan is less than or equal to last To
    alert(`MoreThan value (${moreThanValue}) must be greater than last To value (${lastToValue}).`);
    addBtn.disabled = true;
    return;
} else if (moreThanInput.value && parseInt(moreThanInput.value) <= lastToValue+1) {
    // last To reached maximum limit
    alert(`Limit reached ${lastToValue+1}. Cannot add more rows.`);
    addBtn.disabled = true;
    return;
} else {
    addBtn.disabled = false;
    // proceed to add new row
    const nextFrom = Math.max(lastToValue + 1, moreThanValue || 1);
    // ... your row creation code here ...
}



        const nextFrom = lastToValue + 1;
        const idx = index ++ ;
        const row = document.createElement("div");
        row.className = "row g-2 align-items-center mb-2 tier-row";

        row.innerHTML = `
            <div class="col-md-3">
                <label class="pb-1">From</label>
                <input type="number" class="form-control from border border-dark rounded-1" name="tiered_category[${idx}][from]" value="${nextFrom}" readonly>
            </div>
            <div class="col-md-3">
                <label class="pb-1">To</label>
                <input type="number" class="form-control to border border-dark rounded-1" name="tiered_category[${idx}][to]" placeholder="To">
            </div>
            <div class="col-md-3">
                <label class="pb-1">Commission</label>
                <div class="input-group border border-dark rounded-1">
                    <span class="input-group-text border-0 bg-white py-2 pe-1"><small>RM</small></span>
                    <input type="text" class="form-control commission border-0 rounded-1 px-0 py-2" name="tiered_category[${idx}][commssion]" placeholder="Commission">
                </div>
            </div>
             <div class="col-md-1">
        <button type="button" class="btn btn-outline-danger btn-sm mt-4 remove-row">×</button>
      </div>
        `;
  // Handle delete row
  document.addEventListener("click", function(e) {
    if (e.target.classList.contains("remove-row")) {
      e.target.closest(".tier-row").remove();
    }
  });
        // Insert before MoreThan row
       container.insertBefore(row, container.querySelector("#moreThanRow"));

        // Attach input events
        row.querySelector(".to").addEventListener("input", updateMoreThan);
        row.querySelector(".commission").addEventListener("input", updateMoreThan);

        updateMoreThan();
    }

    function updateMoreThan() {
        const toInputs = document.querySelectorAll(".to");
        const commissionInputs = document.querySelectorAll(".commission");

        let lastTo = 0;
        let totalCommission = 0;

        toInputs.forEach(input => {
            const val = parseInt(input.value) || 0;
            if (val > lastTo) lastTo = val;
        });

        commissionInputs.forEach(input => {
            const val = parseFloat(input.value) || 0;
            totalCommission += val;
        });

        // moreThanInput.value = lastTo + 1 > 100 ? 100 : lastTo + 1;
        // if (lastTo >= 100) {
        //     addBtn.disabled = true;
        // }
    }

    // Attach event listeners for first row
    document.querySelectorAll(".to, .commission").forEach(input => {
        input.addEventListener("input", updateMoreThan);
    });

    addBtn.addEventListener("click", addRow);
});
// Function to validate "To" after user enters a value
// Validate "To" after user enters a value, without emptying it
function validateToRangeBlur(toInput) {
    const row = toInput.closest(".tier-row");
    const fromInput = row.querySelector(".from");
    const fromValue = parseInt(fromInput.value) || 0;
    let toValue = parseInt(toInput.value);

    if (!isNaN(toValue)) {
        // If To < From, reset to minimum allowed
        if (toValue < fromValue) {
            alert(`"To" value (${toValue}) cannot be less than "From" value (${fromValue}). It will be set to ${fromValue}.`);
            toInput.value = fromValue; // reset to minimum allowed
            toValue = fromValue;
        }

        // Prevent overlap with previous ranges
        const rows = document.querySelectorAll(".tier-row");
        for (const r of rows) {
            if (r === row) continue;
            const rFrom = parseInt(r.querySelector(".from").value) || 0;
            const rTo = parseInt(r.querySelector(".to").value) || 0;

            if (toValue >= rFrom && toValue <= rTo) {
                alert(`This value overlaps with existing range ${rFrom} - ${rTo}. It will be set to ${fromValue}.`);
                toInput.value = fromValue; // reset to minimum
                break;
            }
        }
    }

    updateMoreThan();
}

// Attach blur event for all "To" inputs dynamically
document.addEventListener("blur", function(e) {
    if (e.target.classList.contains("to")) {
        validateToRangeBlur(e.target);
    }
}, true); // use capture to catch dynamically added rows

// Attach this to all "To" inputs dynamically
document.addEventListener("input", function(e) {
    if (e.target.classList.contains("to")) {
        validateToRange(e);
    }
});


// Run once on load
calculateMoreThanCommission();



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
  // Handle delete row
  document.addEventListener("click", function(e) {
    if (e.target.classList.contains("remove-row")) {
      e.target.closest(".tier-row").remove();
    }
  });

  // Handle add row
  document.getElementById("addRow").addEventListener("click", function() {
    const container = document.getElementById("tieredCategory");
    const moreThanRow = document.getElementById("moreThanRow");

    // Find last "To" value
    const lastToInput = container.querySelector(".tier-row:last-child .to");
    let nextFrom = 1;
    if (lastToInput && lastToInput.value) {
      nextFrom = parseInt(lastToInput.value) + 1;
    }
    // value="${nextFrom}"
    const newRow = document.createElement("div");
    newRow.className = "row g-2 align-items-center mb-2 tier-row";
    newRow.innerHTML = `
      <div class="col-md-3">
        <input type="number" class="form-control from border border-dark rounded-1" placeholder="From" >
      </div>
      <div class="col-md-3">
        <input type="number" class="form-control to border border-dark rounded-1" placeholder="To">
      </div>
      <div class="col-md-3">
            <div class="input-group border border-dark rounded-1">
  <span class="input-group-text border-0 bg-white py-2 pe-1"><small>RM</small></span>
  <input type="text" class="form-control commission border-0 rounded-1 px-0 py-2" placeholder="Commission" >
</div>
      </div>
      <div class="col-md-1">
        <button type="button" class="btn btn-outline-danger btn-sm remove-row">×</button>
      </div>
    `;

    container.insertBefore(newRow, moreThanRow);
  });
</script>

<script>
  // Handle delete row
  document.addEventListener("click", function(e) {
    if (e.target.classList.contains("remove-row")) {
      e.target.closest(".tier-row").remove();
    }
  });

  // Handle add row
  document.getElementById("addRow").addEventListener("click", function() {
    const container = document.getElementById("tieredCategory");
    const moreThanRow = document.getElementById("moreThanRow");

    const newRow = document.createElement("div");
    newRow.className = "row g-2 align-items-center mb-2 tier-row";
    newRow.innerHTML = `
    // Insert before "More Than" row
    container.insertBefore(newRow, moreThanRow)`;
  });
   // Make the FA icon open the datepicker
 // Start date icon
document.getElementById("calendarStartIcon").addEventListener("click", () => {
  document.getElementById("startDate").showPicker?.();
  document.getElementById("startDate").focus();
});

// End date icon
document.getElementById("calendarEndIcon").addEventListener("click", () => {
  document.getElementById("endDate").showPicker?.();
  document.getElementById("endDate").focus();
});

 $(document).ready(function() {
        $("#commissionFormdata").on("submit", function (e) {
        e.preventDefault();

        let formData = new FormData(this);
        // if you want to manually add CSRF (optional if @csrf is in form)
        formData.append('_token', '{{ csrf_token() }}');
        let recordId = $("#record_id").val();
        let type = recordId ? "POST" : "POST";
        if (recordId) {
          formData.append('_method', 'PUT');
        }
        let url = recordId ? "{{ route('commition.update', ':id') }}".replace(':id', recordId) : "{{ route('commition.store') }}";

        $.ajax({
            url: url,
            type: "POST",
            data: formData,
            processData: false,
            contentType: false,
            success: function (response) {
                if (response.success) {
                    //alert("Commission saved successfully!");
                    showToast("", response.message ?? "(ID: " + response.id + ")");
                    //$("#commissionFormdata")[0].reset();
                    setTimeout(() => {
                        location.reload();
                    }, 2000);
                    //$(".save-btn").prop("disabled", true);
                    //$(".edit-btn").prop("disabled", false);
                    //$("#record_id").val(response.id);

                    //fillFormWithData(response.data);
                    //setFormReadonly(true);
                } else {
                    alert("Something went wrong.");
                    console.log(response);
                }
            },
            error: function (xhr) {
                console.error(xhr.responseText);
                alert("Server error, please try again later.");
            }
        });
    });

    $(document).on("click", ".search-icon", function () {
        let id = $(this).data("id");

        $.ajax({
            url: "{{ route('commition.show', ':id') }}".replace(':id', id),
            type: "GET",
            success: function (response) {
                if (response.success) {
                    fillFormWithData(response.data);
                    setFormReadonly(true);

                    // Show the form section if hidden
                    $("#commissionFormdata").removeClass("d-none");
                    $(".create-page").removeClass("d-none");
                    $("#commissionForm").removeClass("d-none");
                    // Set buttons
                    $(".save-btn").prop("disabled", true).text("Save");
                    $(".edit-btn").prop("disabled", false);
                    
                } else {
                    alert("Record not found.");
                }
            },
            error: function () {
                alert("Error fetching commission data.");
            }
        });
    });

    $(".edit-btn").on("click", function(e) {
      e.preventDefault();

      setFormReadonly(false);

      $(".save-btn").text("Update").prop("disabled", false);

      $(this).prop("disabled", true);
  });

  function setFormReadonly(isReadonly) {
      const $form = $("#commissionFormdata");
      $form.find("input, select, textarea").each(function () {
        const type = $(this).attr("type");

        if (type === "hidden") return; // skip hidden inputs

        if (isReadonly) {
            if (type === "text" || type === "number" ||type === "date" || $(this).is("textarea")) {
                $(this).attr("readonly", true).addClass("bg-light");
            } else if ($(this).is("select") || type === "file") {
                $(this).prop("disabled", true).addClass("bg-light");
            }
        } else {
            $(this).removeAttr("readonly").prop("disabled", false).removeClass("bg-light");
        }
    });

      $("#record_id, input[name='_token']").prop("disabled", false);
  }

  function fillFormWithData(data) {
      //if (data.commissionCategory)
        $("#record_id").val(data.id);
        $("[name='commission_id']").val(data.commission_id);
        $("[name='commissionCategory']").val(data.commission_category);
        $("#formTitleInput").val(data.commission_category);
        $("[name='designated_role']").val(data.designated_role);
        $("[name='business_unit']").val(data.business_unit);
        $("[name='specific_role']").val(data.specific_role);
        $("#personnel_output").val(data.designated_role);
        $("[name='commissionType']").val(data.commission_type);
        $("[name='duration']").val(data.duration);
        $("#startDate").val(data.start_date);
        $("#endDate").val(data.end_date);
        $("[name='commission_description']").val(data.commission_description);
        $("[name='commission_duration']").val(data.duration);
        $("#startDate_output").val(data.start_date);
        $("#endDate_output").val(data.end_date);

        if (data.commission_type_id && data.commission_type_name) {
            let $select = $("#business_unit");
            $select.empty();
            let option = new Option(data.commission_unit_name, data.commission_unit_id, true, true);
            $select.append(option).trigger("change");
        }
        if (data.commission_unit_id && data.commission_unit_name) {
            let $select = $("#commissionType");
            $select.empty();
            let option = new Option(data.commission_type_name, data.commission_type_id, true, true);
            $select.append(option).trigger("change");
        }
        if (data.commission_department_id && data.commission_department_name) {
            let $select = $("#department");
            $select.empty();
            let option = new Option(data.commission_department_name, data.commission_department_id, true, true);
            $select.append(option).trigger("change");
        }

      console.log("Tiered_Category:", data.tiered_category);
      let container = $("#tieredCategory");
      container.empty(); // clear old rows

      if (Array.isArray(data.tiered_category) && data.tiered_category.length > 0) {
        // 1️⃣ Loop normal "From - To - Commission" rows
        data.tiered_category.forEach((item, idx) => {
            if (item.from !== undefined && item.to !== undefined) {
                let row = `
                <div class="row g-2 align-items-center mb-2 tier-row">
                    <div class="col-md-3">
                        <label class="pb-1">From</label>
                        <input type="number" class="form-control from border border-dark rounded-1"
                               name="tiered_category[${idx}][from]" value="${item.from}" readonly>
                    </div>
                    <div class="col-md-3">
                        <label class="pb-1">To</label>
                        <input type="number" class="form-control to border border-dark rounded-1"
                               name="tiered_category[${idx}][to]" value="${item.to}">
                    </div>
                    <div class="col-md-3">
                        <label class="pb-1">Commission</label>
                        <div class="input-group border border-dark rounded-1">
                            <span class="input-group-text border-0 bg-white py-2 pe-1"><small>RM</small></span>
                            <input type="text" class="form-control commission border-0 rounded-1 px-0 py-2"
                                   name="tiered_category[${idx}][commission]" value="${item.commission ?? ''}">
                        </div>
                    </div>
                    <div class="col-md-1">
                        <button type="button" class="btn btn-outline-danger btn-sm mt-4 remove-row">×</button>
                    </div>
                </div>`;
                container.append(row);
            }
        });

        // 2️⃣ Loop "More Than - Commission" rows
        data.tiered_category.forEach((item, idx) => {
            if (item.more_than !== undefined) {
                let moreRow = `
                <div class="row g-2 align-items-center mb-2 tier-row">
                    <div class="col-md-3">
                        <label class="pb-1">More Than</label>
                        <input type="number" class="form-control border border-dark rounded-1"
                               name="tiered_category[${idx}][more_than]" value="${item.more_than}">
                    </div>
                    <div class="col-md-3"></div>
                    <div class="col-md-3">
                        <label class="pb-1">Commission</label>
                        <div class="input-group border border-dark rounded-1">
                            <span class="input-group-text border-0 bg-white py-2 pe-1"><small>RM</small></span>
                            <input type="text" class="form-control border-0 px-0 py-2"
                                   name="tiered_category[${idx}][morethan_commission]" value="${item.morethan_commission ?? ''}">
                        </div>
                    </div>
                    <div class="col-md-1">
                        <button type="button" class="btn btn-outline-danger btn-sm mt-4 remove-row">×</button>
                    </div>
                </div>`;
                container.append(moreRow);
            }
        });

    } else {
          container.append(`<p class="text-muted">No tiered categories available</p>`);
      }
    }

  });


  function showToast(topic, message) {
    const toast = $('#toast');
    const toastMessage = $('#toast-message');

    // Set the message content
    toastMessage.html(`<p style="color:green;">${topic} ${message}</p>`);

    // Show the toast by adding the 'show' class
    toast.addClass('show').removeClass('toast-hidden');

    // Hide the toast after 2 seconds (2000 milliseconds)
    setTimeout(function() {
      toast.removeClass('show').addClass('toast-hidden');
    }, 10000);
  }

</script>
<style>
/* Hide default calendar icon */
  input[type="date"]::-webkit-calendar-picker-indicator {
    display: none;
    -webkit-appearance: none;
  }
  input[type="date"] {
    -moz-appearance: textfield; /* Firefox */
  }
    .custom-select {
    appearance: none;
    -webkit-appearance: none;
    -moz-appearance: none;
    background: none;
  }
</style>


