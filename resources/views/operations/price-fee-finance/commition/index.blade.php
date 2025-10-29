@extends('layouts.app', ['activePage' => 'table', 'title' => 'Users - Admin Panel - CarGuru', 'navName' => 'Table List', 'activeButton' => 'laravel'])
@section('content')
    <div class="page-wrapper">
        <div class="content">
            <div class="page-header d-none">
                <div class="add-item d-flex">
                    <div class="page-title">
                        <h4 class="fw-bold">COMMISSION</h4>
                        <h6>Manage your commission</h6>
                    </div>
                </div>
            </div>


            <!-- /product list -->
            <div class="">

                <div class="card-body p-0 mt-5">
                    <div class="row my-2">
                        <div class="col-10">
                            <h5 class="">CAR MASTER DATA / PRICING FEE & FINANCE / COMMISSION</h5>
                        </div>
                        <div class="col-2">
                            <a  id="createBtn" class="btn btn-warning float-end text-black btn-sm">+New
                               Commission </a>
                        </div>
                    </div>

                    <div class="page-btn">

                    </div>
                    <div class="table-responsive">
                        <table class="table">
                            <thead class="thead-light my-2">
                                <tr>
                                    <th class="text-black">Commission ID</th>
                                    <th class="text-black">Commission Type</th>
                                    <th class="text-black">Commission Description</th>
                                    <th class="text-black">Commission Category</th>
                                    <th class="text-black">Designated Role</th>
                                    <th class="text-black">Duration</th>
                                    <th class="text-black">Date & Time</th>
                                    <th class="text-black">Status</th>
                                    <th class="text-black">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($commissions as $key => $commission)
                                <tr>
                                    <td>{{ $commission->commission_id }}</td>
                                    <td>{{ $commission->getCommissionType->name ?? '' }}</td>
                                    <td>{{ $commission->commission_description }}</td>
                                    <td>{{ $commission->commission_category }}</td>
                                    <td>{{ $commission->designated_role }}</td>
                                    <td>{{ $commission->duration }}</td>
                                    <td>{{ $commission->start_date->format('Y-m-d') }}</td>
                                    <td><div class="toggle-switch {{ $commission->status ? 'on' : 'off' }}" 
                                            data-id="{{ $commission->id }}">
                                            <span class="toggleText">{{ $commission->status ? 'Activated' : 'Deactivated' }}</span>
                                            <div class="toggle-circle"></div>
                                        </div>
                                    </td>
                                    <td><a><i class="fas fa-search search-icon cursor-pointer" data-id="{{ $commission->id }}"></i></a></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>

                </div>
                                         <div class=" d-none create-page my-3">
             @include('marketing.price-fee-finance.commition.create')
         </div>
            </div>
            <!-- /product list -->

        </div>


        @include('layouts.partials.footer-moden')
    </div>

@endsection

<!-- Content will appear here -->
<div id="contentArea" class="mt-3"></div>
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
        let commissionId = toggle.data("id");
        let currentStatus = toggle.hasClass("on") ? 1 : 0;
        let newStatus = currentStatus ? 0 : 1;

        console.log("Clicked commission ID:", commissionId, "New status:", newStatus);

        toggle.toggleClass("on off");
        toggle.find(".toggleText").text(newStatus ? "Activated" : "Deactivated");

        $.ajax({
            url: "{{ route('commition.togglestatus') }}",
            type: "POST",
            data: {
                _token: "{{ csrf_token() }}",
                id: commissionId,
                status: newStatus
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
<style>
    .table thead tr th:nth-child(1),
    .table thead tr th:nth-child(2),
    .table thead tr th:nth-child(6),
    .table thead tr th:nth-child(7),
    .table thead tr th:nth-child(8){
        background: #ffeebf !important;
    }
    .table thead tr th:nth-child(3),
    .table thead tr th:nth-child(4),
    .table thead tr th:nth-child(5){
       background: #ffdbb8 !important;
    }

    .table tbody tr td:nth-child(2) {
        background: #fcedf5 !important;
    }

    .table tbody tr td:nth-child(3) {
        background: #fcedf5 !important;
    }

    .table tbody tr td:nth-child(4) {
        background: #fcedf5 !important;
    }

    .table tbody tr td:nth-child(6) {
        background: #f7edd2 !important;
    }

    .table tbody tr td:nth-child(10) {
        background: #fcedf5 !important;
    }

    .table tbody tr td:nth-child(11) {
        background: #fcedf5 !important;
    }

    .table tbody tr td:nth-child(12) {
        background: #f7edd2 !important;
    }

    .card-body p small {
        font-size: 12px;
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

