<?php $page = 'edit-role'; ?>
@extends('layouts.app', ['activePage' => 'table', 'title' => 'Create Role - Admin Panel - CarGuru', 'navName' => 'Table List', 'activeButton' => 'laravel'])
@section('content')
    <div class="page-wrapper">
         <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
       <div class="content">
             <div class="page-header">
                <div class="add-item d-flex">
                    <div class="page-title">
                        <h4 class="fw-bold">CAR MASTER DATA / PRICING FEE & FINANCE / FEE & TAX</h4>
                        <!-- <h6>Manage your Fee & Tax</h6> -->
                        <!-- Submit -->
        
                    </div>
                </div><div class="d-flex justify-content-end">
            <!-- <button type="submit" class="btn btn-warning">Reset</button>
            <button type="reset" class="btn btn-warning ms-2">Submit</button> -->
        </div>
            </div>  
            <div class="">
    <!-- A&P MECHANICS -->
   <div class="mt-4">
    <form id="fee_tax_form" action="{{ route('fee_tax.store') }}" method="POST">
        @csrf
        <input type="hidden" name="id" id="record_id">
        <!-- Booking Fee -->
        <div class="card mb-3">
            <div class="card-header fw-bold ">
                <div class="d-flex justify-content-end">
                      <button type="submit" class="btn btn-light edit-btn" disabled>Edit</button>
            <button type="submit" class="btn btn-warning ms-2 save-btn">Save</button>
                </div>
            <p class="titles">BOOKING FEE <span><i class="bi bi-info-circle-fill"></i></span></p>
            <label class="form-label">Amount</label>
                <div class="input-group mb-3 w-25">
  <span class="input-group-text">RM</span>
  <input type="number" class="form-control" placeholder="Enter Amount" name="booking_amount">
</div>
        
      

        <!-- Handling Fee -->
    
           <p class="titles d-flex ">HANDLING FEE</p>
     <div id="handlingFeeContainer">
           <div  class=" row g-3 form-row">
                <div class="col-md-3">
                    <label class="form-label"> Payment Type</label>
                   <!-- <input type="text" name="handling_fee[0][payment_type][]" class="form-control" placeholder="Payment Type"> -->
                    <select id="handlingfeeType" name="handling_fee[0][payment_type][]"
                    class="form-select border border-dark rounded-1 pe-5 custom-select select2-ajax"
                    data-placeholder="Select or Add a Handling Type" data-search-url="{{ route('fee_tax.search') }}"
                    data-add-url="{{ route('fee_tax.add') }}">
                    </select>
                   
                </div>
                <div class="col-md-3">
                    <label class="form-label d-flex justify-content-between">Amount  <i class="fa-solid fa-plus ms-2 text-dark bg-warning rounded-circle cursor-pointer d-flex align-items-center justify-content-center p-1 plus-icon" ></i></label>
                    <div class="input-group ">
                  <span class="input-group-text">RM</span>
                <input type="number" class="form-control" placeholder="Enter Amount" name="handling_fee[0][amount][]">
</div>
            </div>
        </div></div>

        <!-- Inspection Fee -->
      <p class="titles mt-5">INSPECTION FEE <span class="ms-2"><i class="bi bi-info-circle-fill"></i></span> </p>
      <div id="inspectionFeeContainer">    
      <div class="row g-3">
                <div class="col-md-3">
                        <label class="form-label d-flex">Inspection Type  </label>
                    <!-- <input type="text" name="inspection_fee[0][payment_type][]" class="form-control" placeholder=" Add Inspection Type"> -->
                     <select id="inspectionfeeType" name="inspection_fee[0][payment_type][]"
                    class="form-select border border-dark rounded-1 pe-5 custom-select select2-ajax"
                    data-placeholder="Select or Add a Inspection Type" data-search-url="{{ route('fee_tax.searchins') }}"
                    data-add-url="{{ route('fee_tax.addins') }}">
                    </select>
                </div>
                <div class="col-md-3">
                        <label class="form-label d-flex justify-content-between">Amount  <i class="fa-solid fa-plus ms-2 text-dark bg-warning rounded-circle cursor-pointer d-flex align-items-center justify-content-center p-1 plus-icon" ></i></label>
                     <div class="input-group ">
  <span class="input-group-text">RM</span>
  <input type="number" class="form-control" placeholder="Enter Amount" name="inspection_fee[0][amount][]">
</div> 
            </div>
        </div>
</div>
        <!-- Platform Fee (example repeating inputs) -->
  <!-- Platform Fee -->
<div class="">
  <div class="fw-bold d-flex justify-content-between align-items-center mt-5">
      <p class="titles">PLATFORM FEE <span><i class="bi bi-info-circle-fill"></i></span></p>
  </div>

  <div class="mt-4">
      <p class="form-label d-flex">Car Reserve Price
          <i class="fa-solid fa-plus ms-2 text-dark bg-warning rounded-circle cursor-pointer d-flex align-items-center justify-content-center p-1 plus-icon"

             id="addPlatformRow" style="cursor:pointer;"></i>
      </p>

      <!-- ✅ Static Labels -->
      <div class="row g-3 mb-1">
          <div class="col-md-3"><label class="form-label">From</label></div>
          <div class="col-md-3"><label class="form-label">To</label></div>
          <div class="col-md-3"><label class="form-label">Chargeable Fee</label></div>
          <div class="col-md-1"></div>
      </div>

      <!-- ✅ Dynamic Rows -->
      <div id="platformFeeContainer">
          <div class="row g-3 mb-2 platform-row">
              <div class="col-md-3">
                  <div class="input-group">
                      <span class="input-group-text">RM</span>
                      <input type="text" name="platform_fee[0][from]" class="form-control" placeholder="1000">
                  </div>
              </div>
              <div class="col-md-3">
                  <div class="input-group">
                      <span class="input-group-text">RM</span>
                      <input type="text" name="platform_fee[0][to]" class="form-control" placeholder="1000">
                  </div>
              </div>
              <div class="col-md-3">
                  <div class="input-group">
                      <span class="input-group-text">RM</span>
                      <input type="text" name="platform_fee[0][chargeable_fee]" class="form-control" placeholder="1000">
                  </div>
              </div>
              <!-- <div class="col-md-1 d-flex align-items-center">
                  <button type="button" class="btn  removeRow">&times;</button>
              </div> -->
          </div>
      </div>

      <!-- Static "More Than" Row -->
      <div class="row g-3 mt-2 d-flex align-items-center">
          <div class="col-md-3">
              <label class="form-label">More Than</label>
              <div class="input-group">
                  <span class="input-group-text">RM</span>
                  <input type="text" name="platform_fee_more_than" class="form-control" placeholder="Enter Amount">
              </div>
          </div>
          <div class="col-md-3">
             
          </div>
          <div class="col-md-3">
              <label class="form-label">Chargeable Fee</label>
              <div class="input-group ">
                  <span class="input-group-text">RM</span>
                  <input type="text" name="platform_fee_chargeable_fee" class="form-control" placeholder="Enter Amount">
              </div>
          </div>
      </div>
  </div>
</div>




       <p class="titles mt-4">DEALER'S FEE  </p> <!-- Dealer Fee -->
       
       <div id="dealerFeeContainer">
       <div class="row mb-3 ">
    <!-- Select Fee Type -->    
    <div class="col-md-3">
           <label class="form-label">Type of Dealer Fee  </label>
       <!-- <input type="text" name="dealers_fee[0][payment_type]" class="form-control" placeholder=" Add Type of Dealer Fee"> -->
        <select id="dealersfeeType" name="dealers_fee[0][payment_type][]"
                    class="form-select border border-dark rounded-1 pe-5 custom-select select2-ajax"
                    data-placeholder="Select or Add a Dealers Type" data-search-url="{{ route('fee_tax.searchdealer') }}"
                    data-add-url="{{ route('fee_tax.adddealer') }}">
                    </select>
  
      
    </div>
 <!-- Amount with RM prefix -->
    <div class="col-md-3 mb-2">
            <label class="form-label d-flex justify-content-between">Amount  <i class="fa-solid fa-plus ms-2 text-dark bg-warning rounded-circle cursor-pointer d-flex align-items-center justify-content-center p-1 plus-icon" ></i></label>
        <div class="input-group">
            <span class="input-group-text">RM</span>
            <input type="number" id="feeAmount" name="dealers_fee[0][amount]" class="form-control" placeholder="Enter Amount">
        </div>
    </div>
</div>
</div>
<div class=" mt-5">
   <p class="titles d-flex">OTHER TYPE OF FEES </p>
   <div id="otherFeeContainer">
        <div class="row g-3 mb-3">
            <!-- Fee Type Input -->
            <div class="col-md-3">
                <label for="otherFeeType" class="form-label">Type of Fee</label>
                <!-- <input type="text" name="others_fee[0][payment_type]" id="otherFeeType" class="form-control" placeholder="Add Type of Fee"> -->
                 <select id="othersfeeType" name="others_fee[0][payment_type][]"
                    class="form-select border border-dark rounded-1 pe-5 custom-select select2-ajax"
                    data-placeholder="Select or Add a Others Type" data-search-url="{{ route('fee_tax.searchothertype') }}"
                    data-add-url="{{ route('fee_tax.addothertype') }}">
                    </select>
            </div>

            <!-- Amount Input -->
            <div class="col-md-3 mb-2">
                <label class="form-label d-flex justify-content-between" for="otherFeeAmount" class="form-label">Amount  <i class="fa-solid fa-plus ms-2 text-dark bg-warning rounded-circle cursor-pointer d-flex align-items-center justify-content-center p-1 plus-icon" ></i></label>
                <div class="input-group">
                    <span class="input-group-text">RM</span>
                    <input type="number" name="others_fee[0][amount]" id="otherFeeAmount" class="form-control" placeholder="Enter Amount">
                </div>
            </div>
      <!-- Fees List -->
        <!-- <div id="otherFeesList" class="d-flex flex-wrap gap-2"></div> -->
    </div></div>
</div>


<div>
 <p class="titles d-flex">TAX FEE <span class="ms-2"><i class="bi bi-info-circle-fill"></i></span> </p>
             
 <div id="feeTaxContainer">
 <div class="row g-3 mb-3">
            <!-- Fee Type Input -->
            <div class="col-md-3">
                <label for="otherFeeType" class="form-label">Type of Tax</label>
                <!-- <input type="text" name="tax_fee[0][payment_type]"  class="form-control" placeholder="Add Type of Tax"> -->
                  <select id="taxfeeType" name="tax_fee[0][payment_type][]"
                    class="form-select border border-dark rounded-1 pe-5 custom-select select2-ajax"
                    data-placeholder="Select or Add a Tax Type" data-search-url="{{ route('fee_tax.searchtaxtype') }}"
                    data-add-url="{{ route('fee_tax.addtaxtype') }}">
                    </select>
            </div>

            <!-- Amount Input -->
            <div class="col-md-3">
                   <label class="form-label d-flex justify-content-between">Percentage  <i class="fa-solid fa-plus ms-2 text-dark bg-warning rounded-circle cursor-pointer d-flex align-items-center justify-content-center p-1 plus-icon" ></i></label>
                <div class="input-group">
                    <input type="text" id="discount" name="tax_fee[0][amount]" class="form-control" placeholder="Enter Number">
                    <span class="input-group-text ">%</span>
                </div>
            </div>
      
        
    </div></div>
</div>
        
    </form>
</div>
</div>  </div>

<div id="toast" class="toast-hidden">
    <p id="toast-message"></p>
</div>
<style>
    .titles{
        color:#000;
    }
      .plus-icon{
        font-size: 9px !important;
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
    /* wrapper for absolute icon */

</style>

<script>
// document.addEventListener("DOMContentLoaded", function() {
//     const container = document.getElementById("platformFeeContainer");
//     const addBtn = document.getElementById("addPlatformRow");

//     // Add new row (only inputs, no labels)
//     addBtn.addEventListener("click", function() {
//         const row = document.createElement("div");
//         row.classList.add("row", "g-3", "mb-2", "platform-row");
//         row.innerHTML = `
//             <div class="col-md-3">
//                 <div class="input-group">
//                     <span class="input-group-text">RM</span>
//                     <input type="text" name="platform_fee_from[]" class="form-control" placeholder="1000">
//                 </div>
//             </div>
//             <div class="col-md-3">
//                 <div class="input-group">
//                     <span class="input-group-text">RM</span>
//                     <input type="text" name="platform_fee_to[]" class="form-control" placeholder="1000">
//                 </div>
//             </div>
//             <div class="col-md-3">
//                 <div class="input-group">
//                     <span class="input-group-text">RM</span>
//                     <input type="text" name="chargeable_fee[]" class="form-control" placeholder="1000">
//                 </div>
//             </div>
//             <div class="col-md-1 d-flex align-items-center">
//                 <button type="button" class="btn  removeRow">&times;</button>
//             </div>
//         `;
//         container.appendChild(row);

//         // Remove event
//         row.querySelector(".removeRow").addEventListener("click", function() {
//             row.remove();
//         });
//     });

//     // Existing remove button(s)
//     document.querySelectorAll(".removeRow").forEach(btn => {
//         btn.addEventListener("click", function() {
//             btn.closest(".platform-row").remove();
//         });
//     });
// });
document.addEventListener("DOMContentLoaded", function () {
    const container = document.getElementById("platformFeeContainer");
    const addBtn = document.getElementById("addPlatformRow");
    const moreThanInput = document.querySelector("input[name='platform_fee_more_than']");
    
    function getMoreThanValue() {
        return parseInt(moreThanInput.value) || Infinity; // If empty, allow any number
    }

    // Restrict input values against "More Than"
    function enforceMoreThanLimit(input) {
        input.addEventListener("input", function () {
            const moreThan = getMoreThanValue();
            let val = parseInt(this.value);
            if (!isNaN(val) && val >= moreThan) {
                alert(`Value cannot be ${moreThan} or higher (because of More Than = ${moreThan})`);
                this.value = moreThan - 1; // auto-correct
            }
        });
    }

    // Apply rule to all existing inputs
    // function applyValidationToRow(row) {
    //     row.querySelectorAll("input[type='text']").forEach(enforceMoreThanLimit);
    // }
function applyValidationToRow(row) {
    const fromInput = row.querySelector('input[name="platform_fee[0][from]"]');
    const toInput = row.querySelector('input[name="platform_fee[0][to]"]');

    // Validate only when leaving the "To" field
    toInput.addEventListener("blur", function () {
        const fromValue = parseInt(fromInput.value || fromInput.placeholder);
        const toValue = parseInt(toInput.value);

        if (!isNaN(fromValue) && !isNaN(toValue)) {
            if (toValue < fromValue) {
                alert(`"To" value (${toValue}) cannot be less than "From" value (${fromValue})`);
                toInput.value = ""; // clear invalid value
            }
        }
    });

    // Keep your old validation against "More Than"
    enforceMoreThanLimit(toInput);
}



    // Initial row
    applyValidationToRow(container.querySelector(".platform-row"));

    // Add new row
    // addBtn.addEventListener("click", function () {
    //     let nextFromValue = "";

    //     const lastRow = container.querySelector(".platform-row:last-child");
    //     if (lastRow) {
    //         const lastToInput = lastRow.querySelector('input[name="platform_fee_to[]"]');
    //         const lastToValue = parseInt(lastToInput.value || lastToInput.placeholder);

    //         if (!isNaN(lastToValue)) {
    //             nextFromValue = lastToValue + 1;
    //         }
    //     }

    //     const row = document.createElement("div");
    //     row.classList.add("row", "g-3", "mb-2", "platform-row");
    //     row.innerHTML = `
    //         <div class="col-md-3">
    //             <div class="input-group">
    //                 <span class="input-group-text">RM</span>
    //                 <input type="text" name="platform_fee_from[]" class="form-control" 
    //                        placeholder="1000" value="${nextFromValue}">
    //             </div>
    //         </div>
    //         <div class="col-md-3">
    //             <div class="input-group">
    //                 <span class="input-group-text">RM</span>
    //                 <input type="text" name="platform_fee_to[]" class="form-control" placeholder="1000">
    //             </div>
    //         </div>
    //         <div class="col-md-3">
    //             <div class="input-group">
    //                 <span class="input-group-text">RM</span>
    //                 <input type="text" name="chargeable_fee[]" class="form-control" placeholder="1000">
    //             </div>
    //         </div>
    //         <div class="col-md-1 d-flex align-items-center">
    //             <button type="button" class="btn removeRow">&times;</button>
    //         </div>
    //     `;
    //     container.appendChild(row);

    //     // Attach validation
    //     applyValidationToRow(row);

    //     // Remove event
    //     row.querySelector(".removeRow").addEventListener("click", function () {
    //         row.remove();
    //     });
    // });
    // Add new row
    let index = 1;
addBtn.addEventListener("click", function () {
    const moreThan = getMoreThanValue();
    let nextFromValue = "";
    const idx = index ++ ;

    const lastRow = container.querySelector(".platform-row:last-child");
    if (lastRow) {
        const lastToInput = lastRow.querySelector(`input[name="platform_fee[${idx - 1}][to]"]`);
        const lastToValue = parseInt(lastToInput.value || lastToInput.placeholder);

        if (!isNaN(lastToValue)) {
            nextFromValue = lastToValue + 1;

            // 🚫 Stop if new From >= More Than
            if (nextFromValue >= moreThan) {
                alert(`You cannot create a new row because "More Than" is ${moreThan}`);
                return;
            }
           
        }
        
    }
   
    
    const row = document.createElement("div");
    row.classList.add("row", "g-3", "mb-2", "platform-row");
    row.innerHTML = `
        <div class="col-md-3">
            <div class="input-group">
                <span class="input-group-text">RM</span>
                <input type="text" name="platform_fee[${idx}][from]" class="form-control" 
                       placeholder="1000" value="${nextFromValue}">
            </div>
        </div>
        <div class="col-md-3">
            <div class="input-group">
                <span class="input-group-text">RM</span>
                <input type="text" name="platform_fee[${idx}][to]" class="form-control" placeholder="1000">
            </div>
        </div>
        <div class="col-md-3">
            <div class="input-group">
                <span class="input-group-text">RM</span>
                <input type="text" name="platform_fee[${idx}][chargeable_fee]" class="form-control" placeholder="1000">
            </div>
        </div>
        <div class="col-md-1 d-flex align-items-center">
            <button type="button" class="btn removeRow">&times;</button>
        </div>
    `;
    container.appendChild(row);

    // Attach validation
    applyValidationToRow(row);

    // Remove event
    row.querySelector(".removeRow").addEventListener("click", function () {
        row.remove();
    });
});


    // Re-apply validation when More Than value changes
// Validate only after user finishes typing (blur) or presses Enter
moreThanInput.addEventListener("blur", function () {
    const moreThan = getMoreThanValue();
    let rows = container.querySelectorAll(".platform-row");
    let conflict = false;

    rows.forEach(row => {
        const fromInput = row.querySelector('input[name="platform_fee_from[]"]');
        const toInput = row.querySelector('input[name="platform_fee_to[]"]');

        const fromVal = parseInt(fromInput.value || fromInput.placeholder);
        const toVal = parseInt(toInput.value || toInput.placeholder);

        // Case 1: MoreThan is less than a FROM value → conflict
        if (!isNaN(fromVal) && moreThan <= fromVal) {
            conflict = true;
        }
    });

    if (conflict) {
        alert(`"More Than" (${moreThan}) cannot be less than or equal to an existing FROM value`);
        moreThanInput.value = ""; // reset input
    }
});


});


document.addEventListener("DOMContentLoaded", function () {
    document.querySelectorAll(".plus-icon").forEach(icon => {
           // ✅ Skip Car Reserve Price (handled separately by #addPlatformRow)
        if (icon.id === "addPlatformRow") return;
        icon.addEventListener("click", function () {
            // find the parent row or wrapper after the form-label
            let label = icon.closest(".form-label");
            let container = label ? label.parentElement.nextElementSibling : null;

            // if not found, fallback: create one
            if (!container || !container.classList.contains("dynamic-container")) {
                container = document.createElement("div");
                container.classList.add("dynamic-container");
                label.parentElement.after(container);
            }

            // create new row
            const row = document.createElement("div");
            row.classList.add("row", "g-3", "mb-2");

             // 🔹 detect which section (handling, inspection, dealer, tax)
            let wrapper = icon.closest("div[id]");
            let type = "";
            if (wrapper && wrapper.id.includes("handlingFee")) type = "handling_fee";
            if (wrapper && wrapper.id.includes("inspectionFee")) type = "inspection_fee";
            if (wrapper && wrapper.id.includes("dealerFee")) type = "dealers_fee";
            if (wrapper && wrapper.id.includes("feeTax")) type = "tax_fee";
            if (wrapper && wrapper.id.includes("otherFee")) type = "others_fee";

            const feeRoutes = {
                    handling_fee: {search: "{{ route('fee_tax.search') }}",add: "{{ route('fee_tax.add') }}"},
                    inspection_fee: {search: "{{ route('fee_tax.searchins') }}",add: "{{ route('fee_tax.addins') }}"},
                    dealers_fee: {search: "{{ route('fee_tax.searchdealer') }}",add: "{{ route('fee_tax.adddealer') }}"},
                    tax_fee: {search: "{{ route('fee_tax.searchothertype') }}",add: "{{ route('fee_tax.addothertype') }}"},
                    others_fee: {search: "{{ route('fee_tax.searchtaxtype') }}",add: "{{ route('fee_tax.addtaxtype') }}"}
            };

            let routes = feeRoutes[type] || {};
            // count existing rows to set next index
            let index = container.querySelectorAll(".row").length + 1;
            let baseId = "";
            if (type === "handling_fee") baseId = "handlingfeeType";
            if (type === "inspection_fee") baseId = "inspectionfeeType";
            if (type === "dealers_fee") baseId = "dealersfeeType";
            if (type === "tax_fee") baseId = "taxfeeType";
            if (type === "others_fee") baseId = "othersfeeType";

            // generate unique id (handlingfeeType_1, handlingfeeType_2, ...)
            let uniqueId = baseId;
            let counter = 1;
            while (document.getElementById(uniqueId)) {
                uniqueId = baseId + "_" + counter++;
            }

            row.innerHTML = `
                <div class="col-md-3">
                    <select id="${uniqueId}" name="${type}[${index}][payment_type][]" 
                            class="form-select border border-dark rounded-1 pe-5 custom-select select2-ajax"
                            data-placeholder="Select or Add"
                            data-search-url="${routes.search || ''}"
                            data-add-url="${routes.add || ''}">
                    </select>
                </div>
                <div class="col-md-3">
                    <div class="input-group">
                        <span class="input-group-text">RM</span>
                        <input type="number" name="${type}[${index}][amount][]" class="form-control" placeholder="Enter Amount">
                    </div>
                </div>
                <div class="col-md-1 d-flex align-items-center">
                    <button type="button" class="btn btn-sm text-danger removeRow">&times;</button>
                </div>
            `;

            container.appendChild(row);
            if (typeof window.dropDown === "function") {
                let el = document.getElementById(uniqueId);
                window.dropDown(
                    uniqueId,
                    el.dataset.placeholder,
                    el.dataset.searchUrl,
                    el.dataset.addUrl
                );
            }

            // remove row event
            row.querySelector(".removeRow").addEventListener("click", () => row.remove());
        });
    });
});

 $(document).ready(function() {
$("#fee_tax_form").on("submit", function (e) {
        e.preventDefault();

        let formData = new FormData(this);
        // if you want to manually add CSRF (optional if @csrf is in form)
        formData.append('_token', '{{ csrf_token() }}');
        let recordId = $("#record_id").val();
        let type = recordId ? "POST" : "POST";
        if (recordId) {
          formData.append('_method', 'PUT');
        }
        let url = recordId ? "{{ route('fee_tax.update', ':id') }}".replace(':id', recordId) : "{{ route('fee_tax.store') }}";

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
                    // setTimeout(() => {
                    //     location.reload();
                    // }, 2000);
                    $(".save-btn").prop("disabled", true);
                    $(".edit-btn").prop("disabled", false);
                    $("#record_id").val(response.id);

                    fillFormWithData(response.data);
                    setFormReadonly(true);
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

$(".edit-btn").on("click", function(e) {
      e.preventDefault();

      setFormReadonly(false);

      $(".save-btn").text("Update").prop("disabled", false);

      $(this).prop("disabled", true);
  });

function setFormReadonly(isReadonly) {
      const $form = $("#fee_tax_form");
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
      if (data.commissionCategory)
        //$("#record_id").val(data.id);
        $("[name='booking_amount']").val(data.booking_amount);
        $("[name='platform_fee_more_than']").val(data.platform_fee_more_than);
        $("[name='platform_fee_chargeable_fee']").val(data.platform_fee_chargeable_fee);
        $("[name='other_type_fee']").val(data.other_type_fee);
        $("[name='other_type_amount']").val(data.other_type_amount);

      console.log("Platform Fee:", data.platform_fee);
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
                let baseFieldId = field_id.replace(/_\d+$/, '');
                $('#' + field_id).select2({
                    placeholder: placeholder,
                    minimumInputLength: 0, // 👈 allow fetching without typing
                    ajax: {
                        url: routePathSearch,
                        dataType: 'json',
                        delay: 250,
                        // data: function (params) {
                        //     return {
                        //         q: params.term || '',  // empty string means "all"
                        //         field_id: field_id
                        //     };
                        // },
                        data: function (params) {
                            return {
                                q: params.term || '',
                                field_id: baseFieldId
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
                            field_id: baseFieldId
                        }, function (response) {
                            // Add and select the newly created option
                            let newOption = new Option(response.name, response.id, true, true);
                            $('#' + field_id).append(newOption).trigger('change');
                        });
                    }
                });
            }
            window.dropDown = dropDown;
        });
</script> 


@endsection