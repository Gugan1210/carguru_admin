<?php $page = 'edit-role'; ?>
@extends('layouts.app', ['activePage' => 'table', 'title' => 'Create Role - Admin Panel - CarGuru', 'navName' => 'Table List', 'activeButton' => 'laravel'])
@section('content')
    
    <div class="page-wrapper">
         <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
       <div class="content">
             <div class="page-header">
                <div class="add-item d-flex">
                    <div class="page-title">
                       
        
                    </div>
                </div><div class="d-flex justify-content-end">
            <!-- <button type="submit" class="btn btn-warning">Reset</button>
            <button type="reset" class="btn btn-warning ms-2">Submit</button> -->
        </div>
            </div>  
            <div class="">
    <!-- A&P MECHANICS -->
   <div class="mt-4">
    <form action="" >
        @csrf

        <!-- Booking Fee -->
        <div class="card mb-3">
            <div class="card-header border-bottom-0 fw-bold ">
              <div class="row heading-content d-flex align-items-center ">
              <div class="col-8 d-flex justify-content-end ">
         <ul class="nav nav-tabs custom-nav" id="myNav">
          <li class="nav-item">
            <a href="" class="nav-link  text-black">CUSTOMER INFORMATION</a>
          </li>
          <li class="nav-item">
            <a href="" class="nav-link text-black active">ACTIVITIES</a>
          </li>
          <li class="nav-item">
            <a href="" class="nav-link text-black">HISTORY</a>
          </li>
         </ul>
              </div>
                <div class="col-4 d-flex justify-content-end ">
                      <button type="button" class="btn btn-warning">Edit</button>
            <button type="button" class="btn btn-light ms-2">Save</button>
            <button type="button" class="btn  ms-2">Close <span> &times; </span> </button>
  </div>
     </div>
         </div>
      
<div class="card-body">
        <!-- Handling Fee -->
    
  
<div class="">
  <div class="fw-bold d-flex justify-content-between align-items-center mt-5">
      <p class="titles">ACTIVITY</p>
  </div>
<div class="row">
   

    <!-- Left Tabs -->
    <div class="col-3 d-flex">
      <div class="main-tab active">All Bid Cars <span class="count">9</span></div>
      <div class="main-tab">All Certified / As-It-Is Cars <span class="count">4</span></div>
    </div>

    <!-- Status Tabs -->
    <div class="col-6 d-flex  ">
      <div class="status-tab">Won <span class="count">3</span></div>
      <div class="status-tab">Sold <span class="count">2</span></div>
      <div class="status-tab">In-Verification <span class="count">0</span></div>
      <div class="status-tab">Confirmed <span class="count">0</span></div>
      <div class="status-tab">Ready <span class="count">0</span></div>
      <div class="status-tab">Delivered <span class="count">1</span></div>
      <div class="status-tab">Rejected <span class="count">0</span></div>
    </div>

    <!-- Dropdown -->
    <div class="col-3 ">
    <div class="custom-select-wrapper">
                <select id="documentsNeeded" class="form-select " >
                    <option value="">Select Range To View </option>
                    <option value="IC (front & Back)">IC (front & Back)</option>
                    <option value="Driver’s Licence (Front & Back)">Driver’s Licence (Front & Back)</option>
                    <option value="Bank Statement (3 months)">Bank Statement (3 months)</option>
                    <option value="Pay Slip (3 Months)">IC/passport of person</option>
                   
                    <option value="Others (can add manually)"> Others (can add manually)</option>
                </select>
                 <i class="bi bi-caret-down-fill"></i>
            </div>
    </div>
  

</div>

<div class="row mt-2">
      <div class="table-responsive">
                        <table class="table tables">
                            <thead class="thead-light my-2">
                                <tr>
                                    <th class="text-black">Car ID <span></span></th>
                                    <th class="text-black">Make</th>
                                    <th class="text-black">Model  </th>
                                    <th class="text-black">Variant</th>
                                    <th class="text-black">Car Reg. No.</th>
                              
                                    <th class="text-black">Activity</th>

                                    <th class="text-black">Date & Time </th>
                                    <th class="text-black">Role</th>
                                    <th class="text-black">Status</th>
                                  
                                    <th class="text-black">Body Price (RM)</th>
                                    <th class="text-black">OTR Price (RM)</th>
                                    <th class="text-black">Action</th>
                                </tr>
                            </thead>
                            <tbody>
 
 <tr>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td>No Activity</td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td> <span id="showCycleBtn"><i class="bi bi-search"></i></span> </td>
 </tr>
                            </tbody>
                        </table>
                    </div>
</div>
<div class="row mt-4">
  <div class="lifecycle-container" id="lifecycleContainer">
  <div class="lifecycle-title d-flex justify-content-between">LIFECYCLE VIEW    <button type="button" class="btn  ms-2" id="closeCycleBtn">Close <span> &times; </span> </button></div>
  <div class="lifecycle-steps">
    <div class="step">
      <div class="step-label">TEST DRIVE CAR</div>
      <div class="step-circle">1</div>
    </div>
    <div class="step">
      <div class="step-label">BOOKING FEE PAID</div>
      <div class="step-circle">2</div>
    </div>
    <div class="step">
      <div class="step-label">PUSPAKOM QC</div>
      <div class="step-circle">3</div>
    </div>
    <div class="step">
      <div class="step-label">CASH PAYMENT COMPLETED</div>
      <div class="step-circle">4</div>
    </div>
    <div class="step">
      <div class="step-label">CAR HANDOVER</div>
      <div class="step-circle">5</div>
    </div>
  </div>
</div>
</div>
<!-- Car Registration Number -->
 <div class="row mt-4"> 
    <h6 class="fw-bold">CAR DETAILS</h6>
    <div class="col-md-6 my-3">
    <label class="form-label">Car Registration Number</label>
    <div class="input-group">
      <span class="input-group-text bg-white"><i class="bi bi-search"></i></span>
      <input type="search" class="form-control" placeholder="Search Car Registration Number">
    </div>
    <!-- <small class="text-muted">e.g. JDV5817 Proton Saga Aeroback Year 2000</small> -->
  </div></div>
 

  <!-- Payment Category + Mode -->
  <div class="row mt-4">
    <h6 class="fw-bold mb-3">PAYMENT INFO</h6>
   
    <div class="col-md-3">
      <label class="form-label">Payment Mode</label>
      <div class="custom-select-wrapper">
      <select id="paymentMode" class="form-select">
        <option selected disabled>Select Payment Mode</option>
        <option value="cash">By Cash</option>
        <option value="loan">By Loan</option>
      </select>
      <i class="bi bi-caret-down-fill"></i>
    </div>
    </div>
     <div class="col-md-3">
      <label class="form-label">Payment Category</label>
      <input type="text" class="form-control" placeholder="Enter Payment Category">
    </div>
     <div class="col-md-3" >
      <label class="form-label">Confirmation</label>
<div class="custom-select-wrapper">
         <select class="form-select">
        <option selected disabled>Select Confirmation</option>
        <option>Receipt Not Verified Yet</option>
        <option>Receipt Verified</option>
      </select>
        <i class="bi bi-caret-down-fill"></i>
</div>
 
    </div>
  </div>

  <!-- Receipt + Confirmation -->
  <div class="row mb-3">
    <div class="col-md-4 d-none" id="receiptBox">
      <label class="form-label">Attach Receipt</label>
      <div   class="upload-box">
        <i class="bi bi-cloud-upload"></i>
        <p class="mb-1">Browse File (PDF, PNG, JPG)</p>
        <small class="text-muted">Drag & drop file here</small>
        <input type="file"id="receiptInput" class="form-control mt-2" hidden >
         <div id="receiptPreview" class="mt-2"></div>
      </div>
    </div>
   
  </div>

  <!-- Status Row -->
  <div class="row mb-3">
    <div class="col-md-6">
      <label class="form-label">Status</label>

      <!-- Loan Submitted -->
      <div class="status-box d-none" id="loanStatus">
        Loan Submitted
      </div>

      <!-- Loan URL -->
      <div class="input-group d-none" id="loanURL">
        <input type="text" class="form-control" value="https://URL..." readonly>
        <button class="btn btn-outline-secondary" type="button" id="copyBtn">Copy</button>
        <button class="btn btn-warning" type="button">GO</button>
      </div>
    </div>
  </div>


</div>

 <div class="mt-5">
    <div class="row d-flex justify-content-between">
        <div class="col-md-4">
             <h6 class="fw-bold mb-3">HISTORY</h6>
        </div>
      <div class="col-md-4">
        <div class="custom-select-wrapper">
        <select class="form-select">
          <option>Select Range To View</option>
          <option>Last 7 Days</option>
          <option>Last 30 Days</option>
          <option>All</option>
        </select>
      <i class="bi bi-caret-down-fill"></i>
    </div>
      </div>
    </div>
  </div>
 
    <div class="row mt-3">
    <!-- Left Table -->
    <div class="col-md-6 active-table">
      <table class="table  table-custom">
        <thead >
          <tr>
            <th>Date</th>
            <th>Activity By Customer</th>
          </tr>
        </thead>
        <tbody>
          <tr class="table-left">
            <td>No Activity</td>
            <td>No activity yet</td>
          </tr>
        </tbody>
      </table>
    </div>

    <!-- Right Table -->
    <div class="col-md-6 active-table">
      <table class="table  table-custom">
        <thead>
          <tr>
            <th>Date</th>
            <th>Activity By CARGURU Personnel</th>
            <th>Status</th>
          </tr>
        </thead>
        <tbody class="">
          <tr class="table-right">
            <td>No Activity</td>
            <td>No activity yet</td>
            <td>Na</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>

  <!-- Pagination Length -->
  <div class="pagination-length mt-3">
    <button class="active">10</button>
    <button>25</button>
    <button>50</button>
    <button>100</button>
    <button>500</button>
  </div>
       



        </div>
 
             


        
    </div></form>
</div>
</div>  </div>


<style>
   .lifecycle-container {
      max-width: 1000px;
      margin: 0 auto;
       display: none; /* Initially hidden */
    }

    .lifecycle-title {
      font-weight: bold;
      margin-bottom: 20px;
      font-size: 14px;
      text-transform: uppercase;
      color: #333;
    }

    .lifecycle-steps {
      display: flex;
      justify-content: space-between;
      align-items: center;
      position: relative;
    }

    /* Yellow connector line behind the circles */
    .lifecycle-steps::before {
      content: '';
      position: absolute;
      top: 40px; /* vertically aligns with center of circles (24px + margin-top) */
      left: 12px;  /* Start at left edge of first circle (circle radius) */
      right: 12px; /* End at right edge of last circle */
      height: 2px;
      background: #f9b400;
      z-index: 0;
    }

    .step {
      position: relative;
      text-align: center;
      flex: 1;
      z-index: 1;
    }

    .step-label {
      font-size: 12px;
      color: #555;
      margin-bottom: 8px;
    }

    .step-circle {
      width: 24px;
      height: 24px;
      line-height: 24px;
      border-radius: 50%;
      background: #f9b400;
      color: #fff;
      display: inline-block;
      font-size: 12px;
      font-weight: bold;
    }
  /* wrapper for absolute icon */
    .custom-nav .nav-link {
      color: #444;
      font-weight: 600;
      padding: 8px 16px;
      position: relative;
    }
    .custom-nav .nav-link.active {
      color: red !important;
      font-weight: 700;
      border: none;
    }
    .custom-nav .nav-link.active::after {
      content: "";
      position: absolute;
      bottom: 3px;
      left: 0;
      right: 0;
      height: 3px;
      background-color: orange;
      border-radius: 2px;
    }
.tables thead tr th, .tables thead tr td{
    font-size: 12px;
}
 .tables thead tr th:nth-child(1),
    .tables thead tr th:nth-child(2),
    .tables thead tr th:nth-child(3),
    .tables thead tr th:nth-child(4),
    .tables thead tr th:nth-child(5) {
        background: #ffeebf !important;
    }
    .tables thead tr th:nth-child(6),
    .tables thead tr th:nth-child(7),
    .tables thead tr th:nth-child(8),
    .tables thead tr th:nth-child(9) {
       background: #ffdbb8 !important;
    }
 
    .tables thead tr th:nth-child(10),
    .tables thead tr th:nth-child(11) {
        background: #fae1a0 !important;
    }
 
    .tables thead tr th:nth-child(12) {
        background: #ffeebf !important;
    }
 
    .tables tbody tr td:nth-child(6),
    .tables tbody tr td:nth-child(7),
    .tables tbody tr td:nth-child(8),
    .tables tbody tr td:nth-child(9){
       background: #ffecf6 !important;
    }
    .tables tbody tr td:nth-child(10),
    .tables tbody tr td:nth-child(11)
   {
       background: #faedd0 !important;
    }
 
      .pagination-length button {
      border: 1px solid #ccc;
      background: #fff;
      margin-right: 4px;
      padding: 4px 10px;
      border-radius: 4px;
      cursor: pointer;
    }
    .pagination-length button.active {
      background: #f0ad4e; /* yellow */
      color: #fff;
      border-color: #eea236;
    }

          .table-custom th {
      font-weight: 600;
     
      
    }
      .table-custom thead th {
      
     background: #fff !important;
      
    }
 .active-table .table thead tr th{
background: #fff !important;
font-size: 12px;
 font-weight: 600;
    }
   .active-table .table tbody tr td{
        color: #000;
        font-size: 12px;
        border: none;
    }
   .active-table .table-left td {
      background-color: #f6f7f8 !important; /* light grey */
    }
    .active-table .table-right td {
      background-color: #f9efc9 !important; /* light yellow */
    }
   /* Left tabs (All Bid Cars, Certified Cars) */
    .main-tab {
      border: 1px solid #ccc;
      border-radius: 6px;
      padding: 6px 10px;
      font-size: 10px;
      font-weight: 500;
      display: flex;
      align-items: center;
      margin-right: 8px;
      background: #fff;
      cursor: pointer;
       height: 35px;
      position: relative
    }
    .main-tab.active {
      background: #ffc107;
      border-color: #ffc107;
      color: #000;
    }
    .main-tab .count {
      background: #000;
      position: absolute;
      color: #fff;
      right: -7%;
      top: -21%;
     
      border-radius: 50%;
      padding: 2px 6px;
      font-size: 9px;
      font-weight: bold;
      margin-left: 6px;
    }

    /* Status tabs (Won, Sold, etc.) */
    .status-tab {
      border: 1px solid #ccc;
      border-radius: 6px;
      position: relative;
      /* padding: 6px 15px; */
      text-align: center;
      font-size: 9px;
      font-weight: 500;
      display: flex;
      align-items: center;
      justify-content: center;
      min-width:65px !important;
       height: 35px;
      margin-right: 8px;
      background: #fff;
      cursor: pointer;
    }
    .status-tab .count {
      background: #ffc107;
      border-radius: 50%;
      position: absolute;
      padding: 2px 6px;
      font-size: 9px;
       right: -7%;
      top: -21%;
      font-weight: bold;
      margin-left: 6px;
      color: #000;
    }

    /* Dropdown button */
    .filter-dropdown .btn {
      border-radius: 6px;
      font-size: 14px;
      padding: 6px 15px;
    }



    .titles{
        color:#000;
    }
      .plus-icon{
        font-size: 9px !important;
    }
  
       /* wrapper for absolute icon */

/* wrapper for absolute icon */
.custom-select-wrapper { position: relative; }

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
.form-control{
    font-size:0.7rem;
    color: #000;
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

 .upload-box {
      border: 2px dashed #bbb;
      border-radius: 8px;
      text-align: center;
      width: 100%;
      padding: 25px 8px;
      cursor: pointer;
      transition: border-color 0.3s;
    }
    .upload-box:hover {
      border-color: #666;
    }
    .upload-box i {
      font-size: 25px;
      color: #999;
      margin-bottom: 10px;
    }
    .form-section-title {
      font-weight: 600;
      font-size: 14px;
      margin-bottom: 15px;
      text-transform: uppercase;
    }
    input::placeholder{
        color: #000 !important;
    }
     /* .status-box {
      background: #f8f9fa;
      border: 1px solid #ddd;
      padding: 15px;
      border-radius: 6px;
      font-weight: 600;
      text-align: center;
    } */
</style>




<script>

// CYCLE SHOW AND HIDE

  const showCycleBtn = document.getElementById('showCycleBtn');
  const closeCycleBtn = document.getElementById('closeCycleBtn');
  const lifeContainer = document.getElementById('lifecycleContainer');

  showCycleBtn.addEventListener('click', () => {
    lifeContainer.style.display = 'block';
    showCycleBtn.style.display = 'none';
  });

  closeCycleBtn.addEventListener('click', () => {
    lifeContainer.style.display = 'none';
    showCycleBtn.style.display = 'inline-block';
  });
// CYCLE SHOW AND HIDE
    const navLinks = document.querySelectorAll('#myNav .nav-link');
    navLinks.forEach(link => {
      link.addEventListener('click', function () {
        navLinks.forEach(l => l.classList.remove('active'));
        this.classList.add('active');
      });
    });

  const paymentMode = document.getElementById("paymentMode");
  const receiptBox = document.getElementById("receiptBox");
   const uploadContent = document.getElementById('uploadContent');
  const receiptInput = document.getElementById("receiptInput");
  const receiptPreview = document.getElementById("receiptPreview");
  const loanStatus = document.getElementById("loanStatus");
  const loanURL = document.getElementById("loanURL");

  paymentMode.addEventListener("change", function () {
    if (this.value === "cash") {
      receiptBox.classList.remove("d-none");
      confirmationBox.classList.remove("d-none");
      loanStatus.classList.add("d-none");
      loanURL.classList.add("d-none");
    } else if (this.value === "loan") {
      receiptBox.classList.add("d-none");
     
      loanStatus.classList.remove("d-none");
      loanURL.classList.remove("d-none");

      // Auto-hide URL after 2 seconds
      setTimeout(() => {
        loanURL.classList.add("d-none");
      }, 2000);
    }
  });

  // Copy URL button
  document.getElementById("copyBtn").addEventListener("click", function () {
    const input = loanURL.querySelector("input");
    input.select();
    document.execCommand("copy");
    this.innerText = "Copied!";
    setTimeout(() => (this.innerText = "Copy"), 1500);
  });

  
// Click box to trigger input
receiptBox.addEventListener("click", () => {
  receiptInput.click();
});

// Show preview and hide text
receiptInput.addEventListener("change", function () {
  const file = this.files[0];
  if (!file) return;

  // Hide browse/drag text
  uploadContent.querySelector("p").style.display = "none";
  uploadContent.querySelector("small").style.display = "none";

  // Clear previous preview
  receiptPreview.innerHTML = "";

  if (file.type.startsWith("image/")) {
    const img = document.createElement("img");
    img.src = URL.createObjectURL(file);
    img.classList.add("img-fluid", "mt-2", "border", "rounded");
    img.style.maxHeight = "150px";
    receiptPreview.appendChild(img);
  } else if (file.type === "application/pdf") {
    const pdfName = document.createElement("p");
    pdfName.classList.add("mt-2", "fw-bold", "text-primary");
    pdfName.textContent = "📄 " + file.name;
    receiptPreview.appendChild(pdfName);
  } else {
    alert("Only images and PDFs are allowed!");
  }
});



const uploadBox = document.getElementById("uploadContentt");
const profileInput = document.getElementById("profileInput");
const profilePreview = document.getElementById("profilePreview");

// ✅ clicking the upload box opens file dialog
uploadBox.addEventListener("click", () => {
  profileInput.click();
});

// ✅ preview
profileInput.addEventListener("change", function () {
  const file = this.files[0];
  if (!file) return;

  // hide text
  uploadBox.querySelector("p").style.display = "none";
  uploadBox.querySelector("small").style.display = "none";

  // clear old preview
  profilePreview.innerHTML = "";

  if (file.type.startsWith("image/")) {
    const img = document.createElement("img");
    img.src = URL.createObjectURL(file);
    img.classList.add("img-fluid", "border", "rounded", "mt-2");
    img.style.maxHeight = "150px";
    profilePreview.appendChild(img);
  } else if (file.type === "application/pdf") {
    const pdf = document.createElement("p");
    pdf.textContent = "📄 " + file.name;
    pdf.classList.add("mt-2", "fw-bold", "text-primary");
    profilePreview.appendChild(pdf);
  } else {
    alert("Only images and PDFs allowed!");
  }
});

</script>
</script>


@endsection