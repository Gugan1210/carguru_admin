@extends('layouts.app', ['activePage' => 'table', 'title' => 'Dynamic Drop Down - Made year  - Admin Panel - CarGuru', 'navName' => 'Table List', 'activeButton' => 'laravel'])
@section('content')
    <div class="page-wrapper">
        <div class="content">
            <div class="page-header">
                <div class="add-item d-flex">
                    <div class="page-title">
                        <h4 class="fw-bold">Made Year</h4>
                        <h6>Manage your Made Year</h6>
                    </div>
                </div>
                <div class="page-btn">
                        <a href="{{ route('made_year.create') }}" class="btn btn-primary"><i
                                class="ti ti-circle-plus me-1"></i>Add
                            Made Year</a>
                </div>
            </div>


            <!-- /product list -->
            <div class="card">
                <div class="card-header d-flex align-items-center justify-content-between flex-wrap row-gap-3">
                    <div class="search-set">
                        <div class="search-input">
                            <form method="GET" action="{{ route('made_year.index') }}">
                                @csrf
                                <div class="row">
                                    <div class="col"><input type="text" id="user-search" name="user-search"
                                            class="form-control" placeholder="Search Make" /></div>
                                    <div class="col"><button class="btn btn-primary" type="submit">Search</button></div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class="thead-light">
                                <tr>
                                    <th>No</th>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @forelse ($data as $key => $made_year)
                                    <tr>
                                       <td>{{ $loop->iteration }}</td>
                                       <td>{{ $made_year->id }}</td>
                                        <td>
                                            <div class=" d-flex align-items-center">
                                                <a href="javascript:void(0);">{{ $made_year->name }}</a>
                                            </div>
                                        </td>

                                        <td><span
                                                class="d-inline-flex align-items-center p-1 pe-2 rounded-1 text-white {{ $made_year->status == 1 ? 'bg-success' : 'bg-danger'}} fs-10"><i
                                                    class="ti ti-point-filled me-1 fs-11"></i>{{ $made_year->status == 1 ? 'Active' : 'In-Active'}}</span>
                                        </td>
                                        <td class="action-table-data">
                                            <div class="edit-delete-action">
                                                <a class="me-2 p-2 mb-0"
                                                    href="{{ route('made_year.edit', $made_year->id) }}">
                                                    <i data-feather="edit" class="feather-edit"></i>
                                                </a>

                                                <form method="POST"
                                                    action="{{ route('made_year.destroy', $made_year->id) }}" method="POST" style="display:inline;">
                                                    
                                                    @csrf
                                                    @method('DELETE')

                                                    <button type="submit" class="btn btn-sm ml-1"><i data-feather="trash-2"
                                                            class="feather-trash-2"
                                                            onclick="return confirm('Are you sure to delete?')"></i></button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
<td >
                                        No More Data</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        {!! $data->links('pagination::bootstrap-5') !!}
                    </div>
                </div>
            </div>
            <!-- /product list -->
        </div>
        @include('layouts.partials.footer-moden')
    </div>
@endsection
