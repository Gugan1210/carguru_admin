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
                <div class="page-btn">
                    @can('make-create')
                        <a href="{{ route('makes.create') }}" class="btn btn-primary"><i class="ti ti-circle-plus me-1"></i>Add
                            Make</a>
                    @endcan
                </div>
            </div>


            <!-- /product list -->
            <div class="card">
                <div class="card-header d-flex align-items-center justify-content-between flex-wrap row-gap-3">
                    <div class="search-set">
                        <div class="search-input">
                            <form method="GET" action="{{ route('makes.index') }}">
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
                                    <th>Logo</th>
                                    <th>Make Name</th>
                                    <th>Country</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @forelse ($data as $key => $make)
                                    <tr>
                                        <td>{{ ++$i }}</td>
                                        <td>
                                            @if(!empty($make->logo) && Storage::disk('public')->exists($make->logo))
                                                <img src="{{ asset('storage/' . $make->logo) }}" alt="Logo" width="50px"
                                                    height="50px">
                                            @else
                                                <img src="{{ asset('storage/' . '/images/no-image.webp') }}" alt="default logo"
                                                    width="50px" height="50px">
                                            @endif
                                        </td>
                                        <td>
                                            <div class=" d-flex align-items-center">
                                                <a href="javascript:void(0);">{{ $make->brand_name }}</a>
                                            </div>
                                        </td>
                                        <td>{{ $make->country->country_name ?? 'N/A' }}</td>
                                        <td><span
                                                class="d-inline-flex align-items-center p-1 pe-2 rounded-1 text-white {{ $make->status == 1 ? 'bg-success' : 'bg-danger'}} fs-10"><i
                                                    class="ti ti-point-filled me-1 fs-11"></i>{{ $make->status == 1 ? 'Active' : 'In-Active'}}</span>
                                        </td>
                                        <td class="action-table-data">
                                            <div class="edit-delete-action">
                                                @can('make-edit')
                                                    <a class="me-2 p-2 mb-0" href="{{ route('makes.edit', $make->id) }}">
                                                        <i data-feather="edit" class="feather-edit"></i>
                                                    </a>
                                                @endcan

                                                @can('make-delete')
                                                    <form method="POST" action="{{ route('makes.destroy', $make->id) }}"
                                                        style="display:inline">
                                                        @csrf
                                                        @method('DELETE')

                                                        <button type="submit" class="btn btn-sm ml-1"><i data-feather="trash-2"
                                                                class="feather-trash-2"
                                                                onclick="return confirm('Are you sure to delete?')"></i></button>
                                                    </form>
                                                @endcan
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        No More Data
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