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
            @if(session('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            @endif

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
                <div class="card-body p-0 mt-5 mb-5 ms-2 me-2">
                    <div class="row mt-2">
                        <div class="col-6">
                            <h5 class="">HUMAN CAPITAL / STAFF</h5>
                        </div>
                        <div class="col-6 d-flex justify-content-end column-gap-2 align-items-center mb-4">
                            <div>
                                <div class="input-group border border-dark rounded-1">
                                    <span class="input-group-text bg-white border-end-0">
                                        <i class="fa-solid fa-magnifying-glass"></i>
                                    </span>
                                    <input type="text" class="form-control border-start-0 py-1 "
                                        placeholder="Search Profile">
                                </div>
                            </div>
                            <div class="position-relative">
                                <select id="department_filter" name="department_filter"
                                    class="form-select  border border-dark rounded-1 custom-select pe-5">
                                    <option selected disabled>View Department</option>
                                    @foreach ($departments as $department)
                                        <option value="{{ $department->id }}">{{ $department->name }}</option>
                                    @endforeach
                                </select>
                                <!-- Font Awesome caret-down -->
                                <i
                                    class="fa-solid fa-caret-down position-absolute top-50 end-0 translate-middle-y me-3 text-secondary pointer-events-none"></i>
                            </div>
                            <div>
                                <a class="btn btn-warning text-black" onclick="createStaff();">+ NewStaff</a>
                            </div>
                        </div>
                    </div>
                    <div class="page-btn">
                    </div>
                    <div class="table-responsive">
                        <table class="table">
                            <thead class="thead-light my-2">
                                <tr>
                                    <th class="text-black">Staff ID</th>
                                    <th class="text-black">Name</th>
                                    <th class="text-black">Role</th>
                                    <th class="text-black">Department</th>
                                    <th class="text-black">Contact</th>
                                    <th class="text-black">Email</th>
                                    <th class="text-black">Status</th>
                                    <th class="text-black">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($data as $staff)
                                    <tr>
                                        <td>{{ $staff->staff_id ?? '-' }}</td>
                                        <td>{{ $staff->name ?? '-' }}</td>
                                        <td>{{ $staff->designated_role ?? '-' }}</td>
                                        <td>{{ $staff->getDepartment->name ?? '-' }}</td>
                                        <td>{{ $staff->contact_number ?? '-' }}</td>
                                        <td>{{ $staff->email ?? '-' }}</td>
                                        <td>{{ $staff->status }}</td>
                                        <td> <a class="btn btn-light me-2 p-2 mb-0"
                                                href="{{ route('staff.edit', $staff->id) }}">
                                                <i data-feather="edit" class="feather-edit"></i>
                                            </a>
                                    </tr>
                                    </td>
                                    </tr>
                                @empty
                                    <tr>
                                        No Data
                                    </tr>
                                @endforelse

                            </tbody>
                        </table>
                        <div class="d-flex justify-content-between align-items-center m-3">
                            <form method="GET" action="{{ route('staff.index') }}" class="mb-0">
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
                <!-- /product list -->
                <div id="createStaff" class="d-none">
                    @include('humancapital.staff.create')
                </div>
            </div>
            @include('layouts.partials.footer-moden')
        </div>
@endsection

    <style>
        .table thead tr th:nth-child(1),
        .table thead tr th:nth-child(2),
        .table thead tr th:nth-child(5),
        .table thead tr th:nth-child(6),
        .table thead tr th:nth-child(7),
        .table thead tr th:nth-child(8) {
            background: #ffeebf !important;
        }

        .table thead tr th:nth-child(3),
        .table thead tr th:nth-child(4) {
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
    </style>

    <script>

        function createStaff() {
            let createStaff = document.getElementById('createStaff');
            createStaff.classList.remove('d-none');
            generateStaffId();
        }

        function generateStaffId() {
            fetch("{{ route('staff.lastId') }}")
                .then(res => res.json())
                .then(data => {
                    let nextId = data.last_id + 1;
                    let formatted = String(nextId).padStart(5, '0');
                    console.log(formatted);
                    document.getElementById("staff_id").value = formatted;
                })
                .catch(err => console.error("Error fetching staff_id:", err));
        }

    </script>