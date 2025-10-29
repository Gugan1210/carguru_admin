@extends('layouts.app', ['activePage' => 'table', 'title' => 'Users - Admin Panel - CarGuru', 'navName' => 'Table List', 'activeButton' => 'laravel'])
@section('content')
    <div class="page-wrapper">
        <div class="content">
            <div class="page-header d-none">
                <!-- <div class="add-item d-flex">
                    <div class="page-title">
                        <h4 class="fw-bold">OPERATIONS / CUSTOMER MANAGEMENT</h4>
                        <h6>Manage your commission</h6>
                    </div>
                </div> -->
            </div>
 
 
            <!-- /product list -->
            <div class="">
 
                <div class="card-body p-0 mt-5">
                    <div class="row my-2">
                        <div class="col-8">
                            <h5 class="">OPERATIONS / CUSTOMER MANAGEMENT</h5>
                        </div>
                      
                        <div class="col-4 d-flex align-items-center">
                         <div class="custom-select-wrapper">
                <select id="akpkSelect" name="car_make" class="form-select">
                    <option value="">Select Range To View</option>
                    <option value="Employment Pass,">Employment Pass,</option>
                    <option value="MM2H,">MM2H</option>
                    <option value="Student Pass">Student Pass</option>
                </select>
                 <i class="bi bi-caret-down-fill"></i>
            </div>
                        
                        <a id="createBtn" class="btn btn-warning float-end text-black btn-sm ms-2">+Add New Profile </a>
                        </div>
                    </div>
 
                    <div class="page-btn">
 
                    </div>
                    <div class="table-responsive">
                        <table class="table tables">
                            <thead class="thead-light my-2">
                                <tr>
                                    <th class="text-black">Customer ID <span></span></th>
                                    <th class="text-black">Name</th>
                                    <th class="text-black">Location  </th>
                                    <th class="text-black">Date Joined</th>
                                    <th class="text-black">Contact</th>
                              
                                    <th class="text-black">Email</th>
                                    <th class="text-black">Last Activity Date</th>
                                    <th class="text-black">Last Activity Type</th>
                                    <th class="text-black">Status</th>
                                    <th class="text-black">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($customer as $key => $cust)
                                <tr>
                                    <td>{{ $cust->customer_id }}</td>
                                    <td>{{ $cust->name }}</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>{{ $cust->email }}</td>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        <!-- <div class="toggle-switch {{ $cust->status ? 'on' : 'off' }}" 
                                            data-id="{{ $cust->id }}">
                                            <span class="toggleText">{{ $cust->status ? 'Activated' : 'Deactivated' }}</span>
                                            <div class="toggle-circle"></div>
                                        </div> -->
                                        <div class="toggle-switch {{ $cust->customer_status === 'Active' ? 'on' : 'off' }}" 
                                            data-id="{{ $cust->id }}">
                                            <span class="toggleText">{{ $cust->customer_status === 'Active' ? 'Activated' : 'Deactivated' }}</span>
                                            <div class="toggle-circle"></div>
                                        </div>
                                    </td>
                                    <td><a><i class="fas fa-search search-icon cursor-pointer" data-id="{{ $cust->id }}"></i></a></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                 <div class=" d-none create-page my-3 w-100">
               @include('operations.management.create')
            </div>
            </div>
            <!-- /product list -->
        </div>
        @include('layouts.partials.footer-moden')
    </div>
@endsection
 
<style>
    .tables thead tr th:nth-child(1),
    .tables thead tr th:nth-child(5),
    .tables thead tr th:nth-child(6),
    .tables thead tr th:nth-child(10){
        background: #ffeeba !important;
    }
    .tables thead tr th:nth-child(2),
    .tables thead tr th:nth-child(3),
    .tables thead tr th:nth-child(4){
       background: #ffdcb8 !important;
    }
 
    .tables thead tr th:nth-child(7),
    .tables thead tr th:nth-child(8){
       background: #ffdcb8 !important;
    }
    .tables thead tr th:nth-child(9){
       background: #ffdbc9 !important;
    }
 
    .tables tbody tr td:nth-child(2) {
        background: #fcedf5 !important;
    }
 
    .tables tbody tr td:nth-child(3) {
        background: #fcedf5 !important;
    }
 
    .tables tbody tr td:nth-child(4) {
        background: #fcedf5 !important;
    }
 
    .tables tbody tr td:nth-child(6) {
        background: #f7edd2 !important;
    }
 
    .tables tbody tr td:nth-child(10) {
        background: #fcedf5 !important;
    }
 
    .tables tbody tr td:nth-child(11) {
        background: #fcedf5 !important;
    }
 
    .tables tbody tr td:nth-child(12) {
        background: #f7edd2 !important;
    }
 
    .card-body p small {
        font-size: 12px;
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

.toggle-switch {
        width: 90px;
        height: 40px;
        font-size: 10px;
        border-radius: 30px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: bold;
        cursor: pointer;
        transition: background-color 0.3s ease;
        position: relative;
      }

      .toggle-circle {
        width: 20%;
        height: 30px;
        border-radius: 50%;
        background: #fff;
        position: absolute;
        top: 5px;
        transition: left 0.3s ease;
      }

      .off {
        background-color: #e0e0e0;
        color: #6c757d;
      }

      .off .toggle-circle {
        left: 5px;
      }

      .on {
        background-color: #ffc107;
        color: #000;
      }

      .on .toggle-circle {
        right: 5px;
      }

    
</style>
<script>
    document.addEventListener("DOMContentLoaded", () => {
        const createBtn = document.getElementById("createBtn");
        const contentDiv = document.querySelector(".create-page");
 
        createBtn.addEventListener("click", () => {
            contentDiv.classList.toggle("d-none"); // toggles visibility
        });
    });

    document.addEventListener("DOMContentLoaded", () => {

        $(document).on("click", ".toggle-switch", function () {
            let toggle = $(this);
            let customerId = toggle.data("id");
            let currentStatus = toggle.hasClass("on") ? 1 : 0;
            let newStatus = currentStatus ? 0 : 1;

            toggle.toggleClass("on off");
            toggle.find(".toggleText").text(newStatus ? "Activated" : "Deactivated");

            $.ajax({
                url: "{{ route('customermanagement.togglestatus') }}",
                type: "POST",
                data: {
                    _token: "{{ csrf_token() }}",
                    id: customerId,
                    status: newStatus,
                    customer_status: newStatus ? "Active" : $("#statusDropdown").val()
                },
                success: function (response) {
                    console.log("AJAX success:", response);
                },
                error: function (xhr, status, error) {
                    console.error("AJAX error:", error, xhr.responseText);
                    toggle.toggleClass("on off");
                    toggle.find(".toggleText").text(currentStatus ? "Activated" : "Deactivated");
                }
            });
        });

    });
</script>