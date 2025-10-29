@extends('layouts.app', ['activePage' => 'table', 'title' => 'Users - Admin Panel - CarGuru', 'navName' => 'Table List', 'activeButton' => 'laravel'])
@section('content')
    <div class="page-wrapper">
        <div class="content">
            <div class="page-header">
                <div class="add-item d-flex">
                    <div class="page-title">
                        <h4 class="fw-bold">Make</h4>
                        <h6>Manage your Make</h6>
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
            <div class="card">
                <div class="card-header d-flex align-items-center justify-content-between flex-wrap row-gap-3">
                    <div class="search-set">
                        <div class="search-input">
                        </div>
                    </div>
                    <div class="page-btn d-flex align-items-center gap-2">
                        {{-- Upload Excel --}}
                        <form action="{{ route('car-make-import') }}" method="POST" enctype="multipart/form-data"
                            class="d-inline">
                            @csrf
                            <label for="file" class="btn btn-primary mb-0">
                                <i class="ti ti-upload me-1"></i> Upload File
                            </label>
                            <input type="file" name="upload_file" id="file"
                                class="d-none @error('upload_file') is-invalid @enderror" accept=".xlsx,.xls"
                                onchange="this.form.submit()">
                        </form>

                        {{-- Add --}}
                        <a href="{{ route('carmakes.create') }}" class="btn btn-primary">
                            <i class="ti ti-circle-plus me-1"></i> Add
                        </a>

                        {{-- Filter --}}
                        <a href="#" class="btn btn-primary">
                            <i class="fa-solid fa-filter"></i> Filter
                        </a>
                    </div>
                </div>

                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class="thead-light">
                                <tr>
                                    <th>Car ID</th>
                                    <th>Make</th>
                                    <th>Model</th>
                                    <th>Start Year</th>
                                    <th>Variant</th>
                                    <th>Transmission</th>
                                    <th>Drive Train</th>
                                    <th>Fuel Type</th>
                                    <th>Engine (CC)</th>
                                    <th>Engine Type</th>
                                    <th>MRPs</th>
                                    <th>Action</th>
                                    <!-- <th class="no-sort"></th> -->
                                </tr>
                            </thead>
                            <tbody>

                                @forelse ($data as $carMake)
                                    <tr>
                                        <td>{{ $carMake->car_id ?? '' }}</td>
                                        <td>{{ $carMake->getVariant->model->brand->brand_name ?? '' }}</td>
                                        <td>{{ $carMake->getVariant->model->model_name ?? '' }}</td>
                                        <td>{{ $carMake->start_year ?? '' }}</td>
                                        <td>{{ $carMake->getVariant->variant_name ?? '' }}</td>
                                        <td>{{ $carMake->getTransmission->name ?? '' }}</td>
                                        <td>{{ $carMake->getDriveTrain->name ?? '' }}</td>
                                        <td>{{ $carMake->getFuelType->name ?? '' }}</td>
                                        <td>{{ $carMake->getEngine->getEngineCC->name ?? '' }}</td>
                                        <td>{{ $carMake->getEngine->getEngineType->name ?? '' }}</td>
                                        <td>{{ $carMake->mprs ?? '' }}</td>
                                        <td class="action-table-data">
                                            <div class="edit-delete-action">
                                                <a class="btn me-2 p-2 mb-0" href="{{ route('carmakes.edit', $carMake->id) }}">
                                                    <i class="fa-regular fa-eye"></i>
                                                </a>
                                                <!-- <a class="me-2 p-2 mb-0" href="{{ route('carmakes.show', $carMake->id) }}">
                                                                                                                                                                                                                                                                                                            <i class="fa-solid fa-magnifying-glass"></i>
                                                                                                                                                                                                                                                                                                        </a> -->
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="12" class="text-center">No data available.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        <div class="d-flex justify-content-between align-items-center m-3">
                            <form method="GET" action="{{ route('carmakes.index') }}" class="mb-0">
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
    </div>
    @include('layouts.partials.footer-moden')
@endsection

<style>
    .table thead tr th {
        background: #ffeebf !important;
    }

    .table thead tr th:nth-child(5) {
        background: #FFDCB8 !important;
    }

    .table thead tr th:nth-child(5) {
        background: #FFDCB8 !important;
    }

    .table thead tr th:nth-child(6) {
        background: #FFDCB8 !important;
    }

    .table tbody tr td:nth-child(6) {
        background: #FCF6EB !important;
    }
</style>