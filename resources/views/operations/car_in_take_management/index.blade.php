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
                        <div class="col-6">
                            <h5 class="">OPERATIONS / CAR INTAKE & DETAILS MANAGEMENT</h5>
                        </div>

                        <div class="col-6 d-flex justify-content-end column-gap-2 align-items-center">
                            <div>
                                <a id="createBtn" class="btn btn-outline-secondary float-end text-black btn-sm ms-2">+Add
                                    Car Detail</a>
                            </div>

                            <div>
                                <button class=" btn btn-outline-secondary btn-sm">
                                    <i class="bi bi-sliders"></i>
                                    Filters
                                </button>
                            </div>
                        </div>

                    </div>
                    <div class="table-responsive">
                        <table class="table">
                            <thead class="thead-light my-2">
                                <tr>
                                    <th class="text-black">Car ID</th>
                                    <th class="text-black"> Category</th>
                                    <th class="text-black"> Make</th>
                                    <th class="text-black">Modal</th>
                                    <th class="text-black">Variant</th>
                                    <th class="text-black">Reg.Number</th>
                                    <th class="text-black">Reg.Date</th>
                                    <th class="text-black">Mileage</th>
                                    <th class="text-black">Engine Number</th>
                                    <th class="text-black">Classic Number</th>
                                    <th class="text-black">Location</th>
                                    <th class="text-black">Car Price (RM)</th>
                                    <th class="text-black">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($data as $carDetail)
                                    <tr>
                                        <td>{{ $carDetail->car_detail_id ?? '' }}</td>
                                        <td>{{ $carDetail->getCarDetailCategory->name ?? '' }}</td>
                                        <td>{{ $carDetail->getVariant->model->brand->brand_name ?? '' }}</td>
                                        <td>{{ $carDetail->getVariant->model->model_name ?? '' }}</td>
                                        <td>{{ $carDetail->getVariant->variant_name ?? '' }}</td>
                                        <td>{{ $carDetail->car_info_registration_number ?? '' }}</td>
                                        <td>{{ $carDetail->car_info_registration_date ?? '' }}</td>
                                        <td>{{ $carDetail->mileage ?? '' }}</td>
                                        <td>{{ $carDetail->engine_number ?? '' }}</td>
                                        <td>{{ $carDetail->chassis_number ?? '' }}</td>
                                        <td>{{ $carDetail->getBranchCenter->name ?? '' }}</td>
                                        <td>{{ $carDetail->car_info_price ?? '' }}</td>
                                        <td class="action-table-data">
                                            <div class="edit-delete-action">
                                                <a class="btn me-2 p-2 mb-0"
                                                    href="{{ route('car-details.edit', $carDetail->id) }}">
                                                    <i class="fa-regular fa-eye"></i>
                                                </a>
                                                <!-- <a class="me-2 p-2 mb-0" href="{{ route('car-details.show', $carDetail->id) }}">
                                                                                                                                                    <i class="fa-solid fa-magnifying-glass"></i>
                                                                                                                                                </a> -->
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4">There are no data.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        <div class="d-flex justify-content-between align-items-center m-3">
                            <form method="GET" action="{{ route('car-details.index') }}" class="mb-0">
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
                    <div class=" d-none create-page my-3 w-100">
                        @include('operations.car_in_take_management.create')
                    </div>
                </div>
                <!-- /product list -->
            </div>
            @include('layouts.partials.footer-moden')
        </div>
@endsection

    <style>
        .table thead tr th:nth-child(1),
        .table thead tr th:nth-child(2),
        .table thead tr th:nth-child(6),
        .table thead tr th:nth-child(7),
        .table thead tr th:nth-child(8),
        .table thead tr th:nth-child(9),
        .table thead tr th:nth-child(10),
        .table thead tr th:nth-child(11),
        .table thead tr th:nth-child(12),
        .table thead tr th:nth-child(13) {
            background: #ffeebf !important;
        }

        .table thead tr th:nth-child(3),
        .table thead tr th:nth-child(4),
        .table thead tr th:nth-child(5) {
            background: #ffdbb8 !important;
        }


        .card-body p small {
            font-size: 12px;
        }

        /* wrapper for absolute icon */

        /* wrapper for absolute icon */
        .custom-select-wrapper {
            position: relative;
        }

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

        .form-control {
            font-size: 0.7rem;
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
    </style>
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const createBtn = document.getElementById("createBtn");
            const contentDiv = document.querySelector(".create-page");

            createBtn.addEventListener("click", () => {
                contentDiv.classList.toggle("d-none"); // toggles visibility
            });
        });
    </script>