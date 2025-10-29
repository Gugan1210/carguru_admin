@extends('layouts.app', [
    'activePage' => 'table',
    'title' => 'Dynamic Drop Down - Branch Center - Admin Panel - CarGuru',
    'navName' => 'Table List',
    'activeButton' => 'laravel'
])

@section('content')
    <div class="page-wrapper">
        <div class="content">
            <!-- Page Header -->
            <div class="page-header">
                <div class="add-item d-flex">
                    <div class="page-title">
                        <h4 class="fw-bold">Make Branch Center</h4>
                        <h6>Manage your Branch Center</h6>
                    </div>
                </div>
                <div class="page-btn">
                    <a href="{{ route('branch_center.create') }}" class="btn btn-primary">
                        <i class="ti ti-circle-plus me-1"></i>
                        Add Branch Center
                    </a>
                </div>
            </div>

            <!-- Search -->
            <div class="card">
                <div class="card-header d-flex align-items-center justify-content-between flex-wrap row-gap-3">
                    <div class="search-set">
                        <div class="search-input">
                            <form method="GET" action="{{ route('branch_center.index') }}">
                                @csrf
                                <div class="row">
                                    <div class="col">
                                        <input type="text" id="user-search" name="user-search"
                                            class="form-control" placeholder="Search Units" />
                                    </div>
                                    <div class="col">
                                        <button class="btn btn-primary" type="submit">Search</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Units Table -->
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class="thead-light">
                                <tr>
                                    <th>No</th>
                                    <th>Country</th>
                                    <th>State</th>
                                    <th>City</th>
                                    <th>Branch Type</th>
                                    <th>Branch Name</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                              
                                @forelse ($data as $key => $branch_center)
                                    <tr>
                                        <td>{{ ++$i }}</td>
                                        <td>{{ ($branch_center->country)->country_name ?? '' }}</td>
                                        <td>{{ ($branch_center->states)->state_name ?? '' }}</td>
                                        <td>{{ $branch_center->city->city_name ?? '' }}</td>
                                        <td>{{ $branch_center->branch_type ?? '' }}</td>
                                        <td>{{ $branch_center->name ?? '' }}</td>
                                        <td>{{ $branch_center->status == '1' ? 'Active':'In-Active' }}</td>
                                        <td class="action-table-data">
                                            <div class="edit-delete-action">
                                                {{-- Uncomment @can once permissions are confirmed --}}
                                                {{-- @can('unots-edit') --}}
                                                    <a class="me-2 p-2 mb-0" href="{{ route('branch_center.edit', $branch_center->id) }}">
                                                        <i data-feather="edit" class="feather-edit"></i>
                                                    </a>
                                                {{-- @endcan --}}

                                                {{-- @can('units-delete') --}}
                                                    <form method="POST" action="{{ route('branch_center.destroy', $branch_center->id) }}"
                                                        style="display:inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm ml-1"
                                                            onclick="return confirm('Are you sure to delete?')">
                                                            <i data-feather="trash-2" class="feather-trash-2"></i>
                                                        </button>
                                                    </form>
                                                {{-- @endcan --}}
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="text-center">No More Data</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>

                        <!-- Pagination -->
                        {!! $data->links('pagination::bootstrap-5') !!}
                    </div>
                </div>
            </div>
        </div>

        @include('layouts.partials.footer-moden')
    </div>
@endsection
