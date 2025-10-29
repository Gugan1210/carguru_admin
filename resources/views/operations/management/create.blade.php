
    <div class="">
         <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
       <div class="content p-1">
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
    
       

        <!-- Booking Fee -->
        <div class="card mb-3">
            <div class="card-header border-bottom-0 fw-bold ">
              <div class="row heading-content d-flex align-items-center ">
              <div class="col-8 d-flex justify-content-end ">
         <ul class="nav nav-tabs custom-nav" id="myNav">
          <li class="nav-item">
            <a href="#" class="nav-link active text-black" id="showInfoBtn">CUSTOMER INFORMATION</a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link text-black" id="showActivityBtn">ACTIVITIES</a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link text-black" id="showHistoryBtn">HISTORY</a>
          </li>
         </ul>
              </div>
                <div class="col-4 d-flex justify-content-end ">
                      <button type="submit" class="btn btn-warning" id="editBtn" disabled>Edit</button>
            <button type="submit" class="btn btn-light ms-2" id="saveBtn">Save</button>
            <button type="button" class="btn  ms-2">Close <span> &times; </span> </button>
  </div>
     </div>
         </div>
      
<div class="card-body">
        <!-- Handling Fee -->
    <div class="info-container " id="info-container">
      <form id="customerFormdata" method="POST" enctype="multipart/form-data">
      @csrf 
      <input type="hidden" name="id" id="record_id">
          <h6 class="fw-bold text-black mb-3">CUSTOMER INFORMATION</h6>
     <div id="handlingFeeContainer">
           <div  class=" row g-3 form-row">
                <div class="col-md-3">
                    <label class="form-label">Customer ID</label>
                   <input type="text" name="customer_id" class="form-control border-0 btn-secondary bg-light" value="{{ $customerid }}" readonly>
                   
                </div>
                <div class="col-md-3">
                    <label class="form-label">Status</label>
                    <div class="custom-select-wrapper">
                <select id="akpkSelect" name="customer_status" class="form-select">
                    <option value="">Select Status</option>
                    <option value="Active">Active</option>
                    <option value="Inactive">Inactive</option>
                    <option value="Suspended">Suspended</option>
                    <option value="Account Close">Account Close</option>
                </select>
                 <i class="bi bi-caret-down-fill"></i>
            </div>
            </div>
        </div></div>

        <div class=" mt-3">
    <div class="row d-flex justify-content-between">
      <!-- Form Section -->
      <div class="col-md-8">
        <div class="form-section-title titles fw-bold">Personal Details</div>
        
          <div class="row mb-3">
            <div class="col-md-4">
              <label class="form-label">Name</label>
              <input type="text" name="name" class="form-control" placeholder="Enter Name">
            </div>
            <div class="col-md-4">
              <label class="form-label">I.C. Number</label>
              <input type="text" name="ic_number" class="form-control" placeholder="Enter I.C. Number">
            </div>
            <div class="col-md-4">
              <label class="form-label">Sex</label>
              <!-- <select class="form-select">
                <option selected disabled></option>
                <option>Male</option>
                <option>Female</option>
                <option>Other</option>
              </select> -->
               <div class="custom-select-wrapper">
                <select  name="gender" class="form-select">
                    <option value="">Select Sex</option>
                    <option value="Male">Male</option>
                    <option value="Female,">Female</option>
                    <option value="Other">Other</option>
                </select>
                 <i class="bi bi-caret-down-fill"></i>
            </div>
            </div>
          </div>

          <div class="row mb-3">
            <div class="col-md-4">
              <label class="form-label">Mobile</label>
              <input type="text" name="mobile" class="form-control" placeholder="Enter Mobile Number">
            </div>
            <div class="col-md-4">
              <label class="form-label">Email</label>
              <input type="email" name="email" class="form-control" placeholder="Enter Email">
            </div>
          </div>

          <div class="mb-3">
            <label class="form-label">Address</label>
            <input type="text" name="address1" class="form-control mb-2" placeholder="Enter Address Line 1">
            <input type="text" name="address2" class="form-control" placeholder="Enter Address Line 2">
          </div>

          <div class="mb-3 col-md-4">
            <label class="form-label">Postcode</label>
            <input type="text" name="postcode" class="form-control" placeholder="Enter Postcode">
          </div>
        
      </div>

      <!-- Upload Section -->
      <div class="col-md-3" id="profileBox">
        <label class="form-label">Profile Image</label>
        <div id="uploadContentt" class="upload-box">
          <i class="bi bi-cloud-upload"></i>
          <p class="mb-1">Upload here</p>
          <small class="text-muted">Drag & drop file here</small>
          <input type="file" name="profile_image" id="profileInput" class="form-control mt-3" hidden>

            <div id="profilePreview" class="mt-2"></div>
        </div>
      </div>
    </div>
  </div>

        <!-- Inspection Fee -->
      <h6 class="fw-bold my-4 text-black">CUSTOMER’S BANK ACCOUNT </h6>
      <div id="inspectionFeeContainer">    
      <div class="row g-3">
                <div class="col-md-3">
                        <label class="form-label d-flex">Bank Name  </label>
                    <input type="text" name="bankname" class="form-control" placeholder=" Select Bank">
                </div>
                <div class="col-md-3">
                        <label class="form-label ">Bank Account Number </label>
                     <div class="input-group ">

  <input type="text" class="form-control" placeholder="Enter Account Number" name="banke_account_number">
</div> 
            </div>
                <div class="col-md-3">
                        <label class="form-label ">Balance in Account</label>
                     <div class="input-group ">

  <input type="text" class="form-control" placeholder="Enter Account Number" name="balance_in_account">
</div> 
            </div>
        </div>
</div>
        <!-- Platform Fee (example repeating inputs) -->
 
       
 <div class="row my-3">
  <h6 class="fw-bold text-black">DOCUMENTS UPLOADED</h6>
    <div class="col-md-4 my-3" id="documentsBox">
      <!-- <label class="form-label">Attach Receipt</label> -->
      <div   class="upload-box" id="documentContent" style="width: 160px;">
        <i class="bi bi-cloud-upload"></i>
        <p class="mb-1">Browse File (PDF, PNG, JPG)</p>
        <small class="text-muted">Drag & drop file here</small>
        <input type="file" name="document" id="documentsInput" class="form-control mt-2" hidden >
         <div id="documentsPreview" class="mt-2"></div>
      </div>
    </div>
   
  </div>
  </form>
    </div>


<div class="card-bodys d-none">
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
      <div class="table-responsive activity">
                        <table class="table tables">
                            <thead class="thead-light my-2">
                                <tr>
                                    <th class="text-black">Car ID <span></span></th>
                                    <th class="text-black">Make</th>
                                    <th class="text-black">Model  </th>
                                    <th class="text-black">Variant</th>
                                    <th class="text-black">Ref. Car Reg. No./Car Reg. No.</th>
                              
                                    <th class="text-black">Activity</th>

                                    <th class="text-black">Date & Time </th>
                                    <th class="text-black">Role</th>
                                    <th class="text-black">Status</th>
                                    <th class="text-black">Reserved
Price (RM)</th>
                                  
                                    <th class="text-black">Bidder
Price (RM)</th>
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
    <td>  </td>
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
 <form id="activityForm" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="activity_id" id="activity_id">
    <input type="hidden" name="activity_customer_id" id="activity_customer_id">
 <div class="row mt-4"> 
    <h6 class="fw-bold">CAR DETAILS</h6>
    <div class="col-md-6 my-3">
    <label class="form-label">Car Registration Number</label>
    <div class="input-group">
      <span class="input-group-text bg-white"><i class="bi bi-search"></i></span>
      <input type="search" name="car_register_number" id="carSearch" class="form-control" placeholder="Search Car Registration Number">
      <ul id="carList" class="list-group position-absolute w-100" style="z-index: 1000;margin-top:35px;"></ul>
    </div>
    <!-- <small class="text-muted">e.g. JDV5817 Proton Saga Aeroback Year 2000</small> -->
  </div></div>
 

  <!-- Payment Category + Mode -->
  <!-- <div class="row mt-4">
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

  
  <div class="row mb-3">
    <div class="col-md-6">
      <label class="form-label">Status</label>

      
      <div class="status-box d-none" id="loanStatus">
        Loan Submitted
      </div>

      
      <div class="input-group d-none" id="loanURL">
        <input type="text" class="form-control" value="https://URL..." readonly>
        <button class="btn btn-outline-secondary" type="button" id="copyBtn">Copy</button>
        <button class="btn btn-warning" type="button">GO</button>
      </div>
    </div>
  </div> -->
  <div>
  <!-- Payment Category + Mode -->
  <div class="row mt-4">
    <h6 class="fw-bold mb-3">PAYMENT INFO</h6>
   
    <div class="col-md-3">
      <label class="form-label">Payment Mode</label>
      <div class="custom-select-wrapper">
        <select id="paymentMode" name="payment_mode" class="form-select">
          <option selected disabled>Select Payment Mode</option>
          <option value="by cash">By Cash</option>
          <option value="by loan">By Loan</option>
        </select>
        <i class="bi bi-caret-down-fill"></i>
      </div>
    </div>

    <div class="col-md-3">
      <label class="form-label">Payment Category</label>
      <input type="text" name="payment_category" class="form-control" placeholder="Enter Payment Category">
    </div>

    <div class="col-md-3 " id="confirmationBox">
      <label class="form-label">Confirmation</label>
      <div class="custom-select-wrapper">
        <select class="form-select" name="confirmation">
          <option selected disabled>Select Confirmation</option>
          <option value="Receipt Not Verified Yet">Receipt Not Verified Yet</option>
          <option value="Receipt Verified">Receipt Verified</option>
        </select>
        <i class="bi bi-caret-down-fill"></i>
      </div>
    </div>
  </div>

  <!-- Receipt Upload -->
  <div class="row mb-3">
    <div class="col-md-4 d-none" id="receiptBox">
      <label class="form-label">Attach Receipt</label>
      <div class="upload-box" id="uploadContent">
        <i class="bi bi-cloud-upload"></i>
        <p class="mb-1">Browse File (PDF, PNG, JPG)</p>
        <small class="text-muted">Drag & drop file here</small>
        <input type="file" name="attach_receipt" id="receiptInput" class="form-control mt-2" hidden>
        <div id="receiptPreview" class="mt-2"></div>
      </div>
    </div>
  </div>

  <!-- Loan Status + URL -->
  <div class="row mb-3">
    <div class="col-md-6">
      <label class="form-label">Status</label>

      <!-- Loan Submitted -->
      <div class="status-box d-none" id="loanStatus">
        Loan Submitted
      </div>

      <!-- Loan URL -->
      <div class="input-group d-none" id="loanURL">
        <input type="text" name="loanurl" class="form-control" placeholder="https://URL..." readonly>
        <button class="btn btn-outline-secondary ms-2" type="button" id="copyBtn">Copy</button>
        <button class="btn btn-warning ms-2" type="button">GO</button>
      </div>
    </div>
  </div>
</div>

</form>
</div>
<form id="historyForm" method="POST" enctype="multipart/form-data">
    @csrf
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

        <div class="history-container d-none" id="history-container">
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
        </form>
        </div>

             


        
    </div>
</div>
</div>  </div>

<div id="toast" class="toast-hidden">
        <p id="toast-message"></p>
      </div>
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
    .titles{
        color:#000;
    }
      .plus-icon{
        font-size: 9px !important;
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
       border: none;
    }
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

      .lifecycle-container {
      max-width: 1000px;
      margin: 0 auto;
 /* Initially hidden */
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
      /* left: 12px;  Start at left edge of first circle (circle radius) */
      /* right: 12px; End at right edge of last circle */
          left: calc(1 / 10 * 100%);
            right: calc(1 / 10 * 100%);
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

  .activity .tables thead tr th, .tables thead tr td{
    font-size: 12px;
  }
   .activity .tables thead tr th:nth-child(1),
   .activity .tables thead tr th:nth-child(2),
   .activity .tables thead tr th:nth-child(3),
   .activity .tables thead tr th:nth-child(4),
   .activity .tables thead tr th:nth-child(5) {
      background: #ffeebf !important;
    }
    .activity .tables thead tr th:nth-child(6),
    .activity .tables thead tr th:nth-child(7),
    .activity .tables thead tr th:nth-child(8),
    .activity .tables thead tr th:nth-child(9)
    .activity .tables thead tr th:nth-child(10) {
       background: #ffdbb8 !important;
    }
 
    .activity .tables thead tr th:nth-child(11),
    .activity .tables thead tr th:nth-child(12),
    .activity .tables thead tr th:nth-child(13) {
        background: #fae1a0 !important;
    }
 
   .activity .tables thead tr th:nth-child(14) {
        background: #ffeebf !important;
    }
 
   .activity .tables tbody tr td:nth-child(6),
   .activity .tables tbody tr td:nth-child(7),
   .activity .tables tbody tr td:nth-child(8),
   .activity .tables tbody tr td:nth-child(9){
       background: #ffecf6 !important;
    }
  .activity .tables tbody tr td:nth-child(10),
  .activity .tables tbody tr td:nth-child(11)
   {
       background: #faedd0 !important;
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

</style>


<script>
// NAV AND ACTIVIYS WORKING 
 
  document.addEventListener("DOMContentLoaded", function () {
    // Get containers
    const infoContainer = document.getElementById("info-container");
    const cardBodys = document.querySelector(".card-bodys");
    const historyContainer = document.getElementById("history-container");

    // Get buttons
    const showInfoBtn = document.getElementById("showInfoBtn");
    const showActivityBtn = document.getElementById("showActivityBtn");
    const showHistoryBtn = document.getElementById("showHistoryBtn");

    // Show Info
    showInfoBtn.addEventListener("click", function () {
      infoContainer.classList.remove("d-none");
      cardBodys.classList.add("d-none");
      historyContainer.classList.add("d-none");
    });

    // Show Activity
    showActivityBtn.addEventListener("click", function () {
      infoContainer.classList.add("d-none");
      cardBodys.classList.remove("d-none");
      historyContainer.classList.add("d-none");
    });

    // Show History
    showHistoryBtn.addEventListener("click", function () {
      infoContainer.classList.add("d-none");
      cardBodys.classList.add("d-none");
      historyContainer.classList.remove("d-none");
    });
  });




  const navLinks = document.querySelectorAll('#myNav .nav-link');
    navLinks.forEach(link => {
      link.addEventListener('click', function () {
        navLinks.forEach(l => l.classList.remove('active'));
        this.classList.add('active');
      });
    });

document.addEventListener("DOMContentLoaded", function() {
  const paymentMode = document.getElementById("paymentMode");
  const receiptBox = document.getElementById("receiptBox");
  const uploadContent = document.getElementById("uploadContent");
  const receiptInput = document.getElementById("receiptInput");
  const receiptPreview = document.getElementById("receiptPreview");
  
  const loanStatus = document.getElementById("loanStatus");
  const loanURL = document.getElementById("loanURL");
  const copyBtn = document.getElementById("copyBtn");

  // Toggle by Payment Mode
  paymentMode.addEventListener("change", function () {
    if (this.value === "by cash") {
      receiptBox.classList.remove("d-none");
     ;
      loanStatus.classList.add("d-none");
      loanURL.classList.add("d-none");
    } else if (this.value === "by loan") {
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
  copyBtn.addEventListener("click", function () {
    const input = loanURL.querySelector("input");
    input.select();
    document.execCommand("copy");
    this.innerText = "Copied!";
    setTimeout(() => (this.innerText = "Copy"), 1500);
  });

  // Click receipt box to open file dialog
  receiptBox.addEventListener("click", () => {
    receiptInput.click();
  });

  // Show file preview
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
});

const uploadBox = document.getElementById("uploadContentt");
const profileInput = document.getElementById("profileInput");
const profilePreview = document.getElementById("profilePreview");

// Clicking the upload box opens file dialog
uploadBox.addEventListener("click", () => {
  profileInput.click();
});

// Preview selected file
profileInput.addEventListener("change", function () {
  const file = this.files[0];
  if (!file) return;

  // hide text
  uploadBox.querySelector("p").style.display = "none";
  uploadBox.querySelector("i").style.display = "none";
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
document.addEventListener("DOMContentLoaded", function() {
  const documentsBox = document.getElementById("documentsBox");
  const documentsInput = document.getElementById("documentsInput");
  const documentsPreview = document.getElementById("documentsPreview");
  const documentContent = document.getElementById("documentContent");

  // 1️⃣ Click the visible box to open file dialog
  documentContent.addEventListener("click", () => {
    documentsInput.click();
  });

  // 2️⃣ Preview selected file
  documentsInput.addEventListener("change", function() {
    const file = this.files[0];
    if (!file) return;

    // Hide upload text/icons
    const icon = documentContent.querySelector("i");
    const text = documentContent.querySelector("p");
    const smallText = documentContent.querySelector("small");

    if (icon) icon.style.display = "none";
    if (text) text.style.display = "none";
    if (smallText) smallText.style.display = "none";

    // Clear previous preview
    documentsPreview.innerHTML = "";

    if (file.type.startsWith("image/")) {
      const img = document.createElement("img");
      img.src = URL.createObjectURL(file);
      img.classList.add("img-fluid", "mt-2", "border", "rounded");
      img.style.maxHeight = "150px";
      documentsPreview.appendChild(img);
    } else if (file.type === "application/pdf") {
      const pdfName = document.createElement("p");
      pdfName.classList.add("mt-2", "fw-bold", "text-primary");
      pdfName.textContent = "📄 " + file.name;
      documentsPreview.appendChild(pdfName);
    } else {
      alert("Only images and PDFs are allowed!");
    }
  });
});

$(document).ready(function () {

    function handleFormSubmit(formId, routeStore, routeUpdate) {
        $(formId).on("submit", function (e) {
            e.preventDefault();

            let formData = new FormData(this);
            formData.append('_token', '{{ csrf_token() }}');

            let recordId = $("#record_id").val();
            // if (recordId) {
            //     formData.append('_method', 'PUT');
            // }

            // let url = recordId
            //     ? routeUpdate.replace(':id', recordId)
            //     : routeStore;
            let activityId = $("#activity_id").val();

            let url;
            if (formId === "#activityForm" && activityId) {
                formData.append('_method', 'PUT');
                url = routeUpdate.replace(':id', activityId);
            } else if (recordId) {
                formData.append('_method', 'PUT');
                url = routeUpdate.replace(':id', recordId);
            } else {
                url = routeStore;
            }

            $.ajax({
                url: url,
                type: "POST",
                data: formData,
                processData: false,
                contentType: false,
                success: function (response) {
                    if (response.success) {
                      $("#activity_customer_id").val(response.customer_id);
                        
                        showToast("", response.message ?? "(ID: " + response.id + ")");
                        //setTimeout(() => location.reload(), 2000);
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
    }

    // Bind each form to same store/update routes
    handleFormSubmit("#customerFormdata", "{{ route('customermanagement.store') }}", "{{ route('customermanagement.update', ':id') }}");
    handleFormSubmit("#activityForm", "{{ route('customermanagement.activitystore') }}", "{{ route('customermanagement.activityupdate', ':id') }}");
    handleFormSubmit("#historyForm", "{{ route('customermanagement.store') }}", "{{ route('customermanagement.update', ':id') }}");

    // Save button should only submit active tab’s form
    $("#saveBtn").on("click", function () {
      const visibleContainer = document.querySelector("#info-container:not(.d-none), .card-bodys:not(.d-none), #history-container:not(.d-none)");
      if (visibleContainer) {
          //  Find form inside the visible container only
          const form = visibleContainer.querySelector("form");
          if (form) {
              $(form).trigger("submit"); // use jQuery so it works with your ajax bind
          } else {
              alert("No form found in the active tab!");
          }
      } else {
          alert("No active tab found!");
      }
});

});

$(document).on("click", ".search-icon", function () {
        let id = $(this).data("id");

        $.ajax({
            url: "{{ route('customermanagement.show', ':id') }}".replace(':id', id),
            type: "GET",
            success: function (response) {
                if (response.success) {
                    fillFormWithData(response.data);
                    setFormReadonly(true);

                    // Show the form section if hidden
                    $(".create-page").removeClass("d-none");
                    $("#customerFormdata").removeClass("d-none");
                    // Set buttons
                    $("#saveBtn").prop("disabled", true).text("Save");
                    $("#editBtn").prop("disabled", false);
                    let customerId = response.data.customer_id;
                    if (customerId) {
                        $.ajax({
                            url: "{{ route('customermanagement.activityshow', ':customer_id') }}".replace(':customer_id', customerId),
                            type: "GET",
                            success: function (activityRes) {
                                if (activityRes.success && activityRes.data) {
                                    fillActivityForm(activityRes.data);
                                    setFormReadonly(true);
                                } else {
                                    console.log("No activity record found for this customer.");
                                }
                            },
                            error: function () {
                                console.error("Error fetching activity data.");
                            }
                        });
                    }
                    
                } else {
                    alert("Record not found.");
                }
            },
            error: function () {
                alert("Error fetching commission data.");
            }
        });
    });

    $("#editBtn").on("click", function(e) {
      e.preventDefault();

      setFormReadonly(false);

      $("#saveBtn").text("Update").prop("disabled", false);

      $(this).prop("disabled", true);
  });

  function setFormReadonly(isReadonly) {
      const $form = $("#customerFormdata, #activityForm, #historyForm");
      $form.find("input, select, textarea").each(function () {
        const type = $(this).attr("type");

        if (type === "hidden") return; // skip hidden inputs

        if (isReadonly) {
            if (type === "text" || type === "email" || type === "number" ||type === "date" || type === "search"  || $(this).is("textarea")) {
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
        $("[name='customer_id']").val(data.customer_id);
        $("[name='customer_status']").val(data.customer_status);
        $("[name='name']").val(data.name);
        $("[name='ic_number']").val(data.ic_number);
        $("[name='gender']").val(data.gender);
        $("[name='mobile']").val(data.mobile);
        $("[name='email']").val(data.email);
        $("[name='address1']").val(data.address1);
        $("[name='address2']").val(data.address2);
        $("[name='postcode']").val(data.postcode);
        $("[name='bankname']").val(data.bankname);
        $("[name='banke_account_number']").val(data.banke_account_number);
        $("[name='balance_in_account']").val(data.balance_in_account);
        
        // Single image: profile_image
        if (data.profile_image) {
            $("#profilePreview").empty(); // clear old
            let img = `<img src="${data.profile_image}" class="img-fluid border rounded mt-2">`;
            $("#profilePreview").append(img);

            // hide placeholder text
            $("#uploadContentt").find("p, small").hide();
        } else {
            $("#profilePreview").empty();
            $("#uploadContentt").find("p, small").show(); // show placeholder if no image
        }

        if (data.document) {
            $("#receiptPreview").empty(); // clear old
            let img = `<img src="${data.document}" class="img-fluid border rounded mt-2">`;
            $("#receiptPreview").append(img);

            // hide placeholder text
            $("#receiptcontent").find("p, small").hide();
        } else {
            $("#receiptPreview").empty();
            $("#receiptcontent").find("p, small").show(); // show placeholder if no image
        }


      console.log("Tiered_Category:", data.tiered_category);
      
    }

    function fillActivityForm(data) {
        $("#activity_id").val(data.id);
        $("#activity_customer_id").val(data.customer_id);
        $("[name='car_register_number']").val(data.car_register_number);
        $("[name='payment_mode']").val(data.payment_mode);
        $("[name='payment_category']").val(data.payment_category);
        $("[name='confirmation']").val(data.confirmation);
        $("[name='loanurl']").val(data.loanurl);

        if (data.attach_receipt) {
            $("#receiptPreview").empty();
            let img = `<img src="${data.attach_receipt}" class="img-fluid border rounded mt-2">`;
            $("#receiptPreview").append(img);
            $("#uploadContent").find("p, small").hide();
        } else {
            $("#receiptPreview").empty();
            $("#uploadContent").find("p, small").show();
        }
        setTimeout(() => {
            const paymentMode = document.querySelector("[name='payment_mode']");
            if (paymentMode) {
                // force the "change" event to fire so UI updates automatically
                paymentMode.dispatchEvent(new Event("change"));
            }
        }, 200);
        
    }


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
    $('#carSearch').on('keyup', function () {
        let query = $(this).val();

        if (query.length > 1) {
            $.ajax({
                url: "{{ route('search.car') }}",
                type: "GET",
                data: { query: query },
                success: function (data) {
                    $('#carList').empty();
                    if (data.length > 0) {
                        $.each(data, function (index, value) {
                            $('#carList').append('<li class="list-group-item list-group-item-action">' + value + '</li>');
                        });
                    } else {
                        $('#carList').append('<li class="list-group-item text-muted">No results found</li>');
                    }
                }
            });
        } else {
            $('#carList').empty();
        }
    });

    // When user clicks on a suggestion
    $(document).on('click', '#carList li', function () {
        $('#carSearch').val($(this).text());
        $('#carList').empty();
    });
});
</script>
</script>


