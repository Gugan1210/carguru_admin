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

            @session('success')
                <div class="alert alert-success" role="alert">
                    {{ $value }}
                </div>
            @endsession
            @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <!-- /product list -->
            <div class="">

                <div class="card-body p-0 mt-5">
                    <div class="row my-2">
                        <div class="col-10">
                            <h5 class="">CAR MASTER DATA / CAR VALUATION</h5>
                        </div>
                        <div class="col-2">
                            <a href="{{ route('car_valuation.create') }}"
                                class="btn btn-warning float-end text-black btn-sm">+New
                                Car Valuation </a>
                        </div>
                    </div>

                    <div class="page-btn">

                    </div>
                    <div class="table-responsive">
                        <table class="table">
                            <thead class="thead-light my-2">
                                <tr>
                                    <th>No</th>
                                    <th class="text-black">Make <span></span></th>
                                    <th class="text-black">Model</th>
                                    <th class="text-black">Manufactured Year</th>
                                    <th class="text-black">MSRP (RM)</th>
                                    <th class="text-black">PLATFORM DISCOUNT (%)</th>

                                    <th class="text-black">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($data as $validation)
                                    <tr>
                                        <td>{{ ++$i }}</td>
                                        <td>{{ $validation->getModel->brand->brand_name ?? '-' }}</td>
                                        <td>{{ $validation->getModel->model_name ?? '-' }}</td>
                                        <td>{{ $validation->manufactur ?? '-' }}</td>
                                        <td>{{ $validation->msrp ?? '-' }}</td>
                                        <td>{{ $validation->platform_discount ?? '-' }}</td>
                                        <td class="action-table-data">
                                            <div class="edit-delete-action">

                                                <a class="me-2 p-2 mb-0"
                                                    href="{{ route('car_valuation.edit', $validation->id) }}">
                                                    <i data-feather="edit" class="feather-edit"></i>
                                                </a>

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
    .table thead tr th:nth-child(6),
    .table thead tr th:nth-child(5) {
        background: #f7edd2 !important;
    }

    .table tbody tr td:nth-child(6) {
        background: #f7edd2 !important;
    }

    .table tbody tr td:nth-child(5) {
        background: #f7edd2 !important;
    }

    .card-body p small {
        font-size: 12px;
    }
</style>