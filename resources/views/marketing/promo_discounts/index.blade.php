@extends('layouts.app', ['activePage' => 'table', 'title' => 'Users - Admin Panel - CarGuru', 'navName' => 'Table List', 'activeButton' => 'laravel'])
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


            <!-- /product list -->
            <div class="card">
                <div class="card-header d-flex align-items-center justify-content-between flex-wrap row-gap-3">
                    <div class="search-set">
                        <div class="search-input">
                            <div class="container mt-4">
                                <div class="row g-3">
                                    <!-- Card 1 -->
                                    <div class="col-md-3">
                                        <div class="card h-75 shadow-sm border-0">
                                            <div class="card-header text-center text-black fw-bold h-25"
                                                style="background:#EABDD8; font-size:12px;">
                                                CARS DISCOUNTS & REBATES
                                            </div>
                                            <div class="card-body text-center d-flex h-50" style="background:#ECE4E8;">
                                                <p class="m-2"><span class="fw-light fs-3 text-danger">5</span>
                                                    <br><small>BID
                                                        CARS</small>
                                                </p>
                                                <p class="m-2"><span class="fw-light fs-3 text-primary">12</span>
                                                    <br><small>CERTIFIED CARS</small>
                                                </p>
                                                <p class="m-2"><span class="fw-light fs-3 text-dark">8</span><br>
                                                    <small>AS-IT-IS CARS</small>
                                                </p>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Card 2 -->
                                    <div class="col-md-3">
                                        <div class="card h-75 shadow-sm border-0">
                                            <div class="card-header text-center text-black fw-bold h-25"
                                                style="background:#FABE8E;font-size:12px;">
                                                ADVERTISING CAMPAIGN
                                            </div>
                                            <div class="card-body text-center d-flex h-50" style="background:#FBF3E2;">
                                                <p class="m-3"><span class="fw-light fs-3 text-danger">0</span>
                                                    <br><small>INACTIVE</small>
                                                </p>
                                                <p class="m-3"><span class="fw-light fs-3 text-primary">25</span>
                                                    <br><small>ACTIVE</small>
                                                </p>
                                                <p class="m-3"><span class="fw-light fs-3 text-dark">3</span><br>
                                                    <small>TO START</small>
                                                </p>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Card 3 -->
                                    <div class="col-md-3">
                                        <div class="card h-75 shadow-sm border-0">
                                            <div class="card-header text-center text-black fw-bold h-25"
                                                style="background:#A7CDF0;font-size:12px;">
                                                DESIGN CAR ASSETS
                                            </div>
                                            <div class="card-body text-center d-flex h-50" style="background:#e1effb;">
                                                <p class="m-2"><span class="fw-light fs-3 text-primary">2</span><br>
                                                    <small>BIDCARS</small>
                                                </p>
                                                <p class="m-2"><span class="fw-light fs-3 text-info">11</span><br>
                                                    <small>CERTIFIED</small>
                                                    CARS
                                                </p>
                                                <p class="m-2"><span class="fw-light fs-3 text-secondary">7</span><br>
                                                    <small>AS-IT-IS CAR</small>
                                                </p>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Card 4 -->
                                    <div class="col-md-3">
                                        <div class="card h-75 shadow-sm border-0">
                                            <div class="card-header text-center text-black fw-bold h-25"
                                                style="background:#388e3c;font-size:12px;">
                                                CUSTOMERS ENROLMENT
                                            </div>
                                            <div class="card-body h-50 text-center d-flex" style="background:#d6f4df;">
                                                <p class="m-2"><span class="fw-light fs-3 text-primary">10</span><br>
                                                    <small>IN PROGRESS</small>
                                                </p>
                                                <p class="m-2"><span class="fw-light fs-3 text-info">124</span><br>
                                                    <small>SUCCESS</small>
                                                    CARS
                                                </p>
                                                <p class="m-2"><span class="fw-light fs-3 text-secondary">4</span><br>
                                                    <small>DROP-OFF</small>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body p-0 mt-5">
                    <div class="row m-2">
                        <div class="col-10">
                            <h5 class="m-2">MARKETING / PROMOS & DISCOUNTS / OVERVIEW</h5>
                        </div>
                        <div class="col-2">
                            <a href="{{ route('promo_discounts.create') }}" class="btn btn-primary float-end">+New
                                Promotion </a>
                        </div>
                    </div>

                    <div class="page-btn">

                    </div>
                    <div class="table-responsive">
                        <table class="table">
                            <thead class="thead-light">
                                <tr>
                                    <th>Promotion ID</th>
                                    <th>Date & Time</th>
                                    <th>Promotion Type</th>
                                    <th>Discount</th>
                                    <th>Total CarsAdded</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($data as $promos)
                                    <tr>
                                        <td>{{ $promos->promotion_id ?? '-' }}<input type="hidden" name="promotion_id"
                                                id="promotion_id" value="{{ $promos->promotion_id }}"></td>
                                        <td>Start: {{ $promos->start_date }} {{ $promos->start_time }} End:
                                            {{ $promos->start_date }} {{ $promos->end_time }}
                                        </td>
                                        <td>{{ $promos->promotion_name ?? '-' }}</td>
                                        <td>{{ $promos->promotion_detail ?? '-' }}</td>
                                        <td>{{ $promos->count ?? '-' }}</td>
                                        <td>
                                            <div class="toggle-switch {{ $promos->status ? 'on' : 'off' }}"
                                                data-promotion-id="{{ $promos->promotion_id }}">
                                                <span
                                                    class="toggle-text">{{ $promos->status ? 'Activated' : 'Deactivated' }}</span>
                                                <div class="toggle-circle"></div>
                                            </div>
                                            <input type="hidden" name="status" value="{{ $promos->status }}">
                                        </td>

                                        <td>
                                            <a class="btn btn-light me-2 p-2 mb-0"
                                                href="{{ route('promo_discounts.edit', $promos->id) }}">
                                                Modify</i>
                                            </a>
<button id="approve-btn-{{ $promos->promotion_id }}"
    type="button"
    class="btn btn-light me-2 p-2 mb-0 {{ $promos->is_approved == 1 ? 'disabled' : '' }}"
    onclick="setApprove('{{ $promos->promotion_id }}', 1)">
    {{ $promos->is_approved == 0 ? 'To Approve' : 'Approved' }}
</button>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>No Data</tr>
                                @endforelse
                            </tbody>
                        </table>
                        <div class="d-flex justify-content-between align-items-center m-3">
    <form method="GET" action="{{ route('promo_discounts.index') }}" class="mb-0">
        <div class="btn-group" role="group" aria-label="Per page">
            <button type="submit" name="per_page" value="10"
                class="btn btn-outline-primary {{ request('per_page', 10) == 10 ? 'active' : '' }}">
                10
            </button>
            <button type="submit" name="per_page" value="25"
                class="btn btn-outline-primary {{ request('per_page') == 25 ? 'active' : '' }}">
                25
            </button>
            <button type="submit" name="per_page" value="50"
                class="btn btn-outline-primary {{ request('per_page') == 50 ? 'active' : '' }}">
                50
            </button>
        </div>
    </form>

    {{-- Pagination --}}
    <div class="paginate">
        {!! $data->links('pagination::bootstrap-5') !!}
    </div>
</div>

                    </div>
                </div>
            </div>
            <!-- /product list -->
        </div>
        @include('layouts.partials.footer-moden')
    </div>
@endsection

<style>
    .table thead tr th {
        background: #ffeebf !important;
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
</style>
<style>
    .toggle-switch {
        width: 140px;
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
        left: 105px;
    }
</style>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        document.querySelectorAll(".toggle-switch").forEach(function (toggleSwitch) {
            const toggleText = toggleSwitch.querySelector(".toggle-text");
            const hiddenInput = toggleSwitch.parentElement.querySelector("input[name='status']");
            const promotionId = toggleSwitch.dataset.promotionId;

            toggleSwitch.addEventListener("click", function () {
                let status;

                if (toggleSwitch.classList.contains("off")) {
                    toggleSwitch.classList.remove("off");
                    toggleSwitch.classList.add("on");
                    toggleText.textContent = "Activated";
                    hiddenInput.value = "1";
                    status = 1;
                } else {
                    toggleSwitch.classList.remove("on");
                    toggleSwitch.classList.add("off");
                    toggleText.textContent = "Deactivated";
                    hiddenInput.value = "0";
                    status = 0;
                }

                // update this row’s status
                statusUpdate(promotionId, status);
            });
        });
    });

    function statusUpdate(promotionId, status) {
        $.ajax({
            url: "{{ route('promotion-update-status') }}",
            type: "POST",
            data: {
                _token: document.querySelector('meta[name="csrf-token"]').getAttribute("content"),
                promotion_id: promotionId,
                status: status
            },
            success: function (response) {
                console.log(response.message);
            },
            error: function (xhr) {
                if (xhr.responseJSON && xhr.responseJSON.errors) {
                    $.each(xhr.responseJSON.errors, function (key, value) {
                        alert(value);
                    });
                } else {
                    alert("Something went wrong");
                }
            }
        });
    }

    function setApprove(promotionId, is_approved) {
    $.ajax({
        url: "{{ route('promotion-update-approve') }}",
        type: "POST",
        data: {
            _token: document.querySelector('meta[name="csrf-token"]').getAttribute("content"),
            promotion_id: promotionId,
            is_approved: is_approved
        },
        success: function (response) {
            console.log(response.message);

            if (response.status == 200) {
                // disable the button for this promo only
                let btn = document.getElementById('approve-btn-' + promotionId);
                if (btn) {
                    btn.classList.add("disabled");
                    btn.textContent = "Approved";
                }
            }
        },
        error: function (xhr) {
            if (xhr.responseJSON && xhr.responseJSON.errors) {
                $.each(xhr.responseJSON.errors, function (key, value) {
                    alert(value);
                });
            } else {
                alert("Something went wrong");
            }
        }
    });
}
</script>
<style>
    .paginate p{
        margin: 2%;
    }
</style>