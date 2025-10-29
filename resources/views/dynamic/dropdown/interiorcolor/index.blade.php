@extends('layouts.app', [
    'activePage' => 'table',
    'title' => 'Dynamic Drop Down - Make Interior Color - Admin Panel - CarGuru',
    'navName' => 'Table List',
    'activeButton' => 'laravel'
])

@section('content')
<div class="page-wrapper">
    <div class="content">
        <div class="page-header">
            <div class="add-item d-flex">
                <div class="page-title">
                    <h4 class="fw-bold">Make Interior Color</h4>
                    <h6>Manage your Interior Color</h6>
                </div>
            </div>
            <div class="page-btn">
                <a href="{{ route('interior_color.create') }}" class="btn btn-primary">
                    <i class="ti ti-circle-plus me-1"></i> Add Interior Color
                </a>
            </div>
        </div>

        <!-- List -->
        <div class="card">
            <div class="card-header d-flex align-items-center justify-content-between flex-wrap row-gap-3">
                <div class="search-set">
                    <div class="search-input">
                        <form method="GET" action="{{ route('interior_color.index') }}">
                            <div class="row">
                                <div class="col">
                                    <input type="text" id="user-search" name="user-search"
                                        class="form-control" placeholder="Search Make"
                                        value="{{ request('user-search') }}" />
                                </div>
                                <div class="col">
                                    <button class="btn btn-primary" type="submit">Search</button>
                                </div>
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
                                <th>Name</th>
                                <th>Status</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($data as $index => $color)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $color->name }}</td>
                                    <td>
                                        @if ($color->status)
                                            <span class="badge bg-success">Active</span>
                                        @else
                                            <span class="badge bg-danger">Inactive</span>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <a href="{{ route('interior_color.edit', $color->id) }}"
                                           class="btn btn-sm btn-warning">
                                           Edit
                                        </a>
                                        <form action="{{ route('interior_color.destroy', $color->id) }}"
                                              method="POST"
                                              class="d-inline-block"
                                              onsubmit="return confirm('Are you sure?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">
                                                Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center">No Interior Colors Found</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
