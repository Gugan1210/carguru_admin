@extends('layouts.app', [
    'activePage' => 'table',
    'title' => 'Dynamic Drop Down - Country - Admin Panel - CarGuru',
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
                    <h4 class="fw-bold">Manage Countries</h4>
                    <h6>Manage your country list</h6>
                </div>
            </div>
            <div class="page-btn">
                <a href="{{ route('country.create') }}" class="btn btn-primary">
                    <i class="ti ti-circle-plus me-1"></i>
                    Add Country
                </a>
            </div>
        </div>

        <!-- Search -->
        <div class="card">
            <div class="card-header d-flex align-items-center justify-content-between flex-wrap row-gap-3">
                <div class="search-set">
                    <div class="search-input">
                        <form method="GET" action="{{ route('country.index') }}">
                            @csrf
                            <div class="row">
                                <div class="col">
                                    <input type="text" id="country-search" name="country-search"
                                        class="form-control" placeholder="Search Country" />
                                </div>
                                <div class="col">
                                    <button class="btn btn-primary" type="submit">Search</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Country Table -->
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table">
                        <thead class="thead-light">
                            <tr>
                                <th>No</th>
                                <th>Country Name</th>
                                <th>ISO2</th>
                                <th>ISO3</th>
                                <th>Phone Code</th>
                                <th>Continent</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $i = ($data->currentPage() - 1) * $data->perPage(); @endphp
                            @forelse ($data as $key => $country)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $country->country_name }}</td>
                                    <td>{{ $country->iso2 }}</td>
                                    <td>{{ $country->iso3 }}</td>
                                    <td>{{ $country->phone_code }}</td>
                                    <td>{{ $country->continent }}</td>
                                    <td>{{ $country->status ? 'Active' : 'Inactive' }}</td>
                                    <td class="action-table-data">
                                        <div class="edit-delete-action">
                                            <a class="me-2 p-2 mb-0" href="{{ route('country.edit', $country->id) }}">
                                                <i data-feather="edit" class="feather-edit"></i>
                                            </a>
                                            <form method="POST" action="{{ route('country.destroy', $country->id) }}" style="display:inline;">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-sm ml-1"
        onclick="return confirm('Are you sure to delete this country?')">
        <i data-feather="trash-2" class="feather-trash-2"></i>
    </button>
</form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8" class="text-center">No countries found</td>
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