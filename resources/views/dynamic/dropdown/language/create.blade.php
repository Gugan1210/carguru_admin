@extends('layouts.app', ['activePage' => 'table', 'title' => 'Create Language - Admin Panel - CarGuru', 'navName' => 'Table List', 'activeButton' => 'laravel'])
@section('content')
    <div class="page-wrapper">
        <div class="content">
            <div class="page-header">
                <div class="add-item d-flex">
                    <div class="page-title">
                        <h4 class="fw-bold">Create Language</h4>
                        <h6>Add a new language</h6>
                    </div>
                </div>
                <div class="page-btn">
                    <a href="{{ route('language.index') }}" class="btn btn-secondary">
                        <i data-feather="arrow-left" class="me-2"></i>Back
                    </a>
                </div>
            </div>

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

            <form method="POST" action="{{ route('language.store') }}">
                @csrf
                <div class="card p-4">
                    <div class="row">
                        <!-- Country Dropdown -->
                        <div class="col-sm-6 mb-3">
                            <label for="country_id" class="form-label">Country<span class="text-danger">*</span></label>
                            <select name="country_id" id="country_id" class="form-select" required>
                                <option value="">Select Country</option>
                                @foreach ($countries as $country)
                                    <option value="{{ $country->id }}" {{ old('country_id') == $country->id ? 'selected' : '' }}>
                                        {{ $country->country_name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Name -->
                        <div class="col-sm-6 mb-3">
                            <label for="name" class="form-label">Language Name<span class="text-danger">*</span></label>
                            <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}"
                                required>
                        </div>

                        <!-- Code -->
                        <div class="col-sm-6 mb-3">
                            <label for="code" class="form-label">Code<span class="text-danger">*</span></label>
                            <input type="text" name="code" id="code" class="form-control" value="{{ old('code') }}"
                                required>
                        </div>

                        <!-- Is Default -->
                        <div class="col-sm-6 mb-3 d-flex align-items-center">
                            <div class="form-check mt-4">
                                <input type="checkbox" name="is_default" id="is_default" class="form-check-input" value="1"
                                    {{ old('is_default') ? 'checked' : '' }}>
                                <label for="is_default" class="form-check-label">Set as Default Language</label>
                            </div>
                        </div>

                        <!-- Status -->
                        <div class="col-sm-6 mb-3">
                            <label for="status" class="form-label">Status<span class="text-danger">*</span></label>
                            <select name="status" id="status" class="form-select" required>
                                <option value="1" {{ old('status') == 1 ? 'selected' : '' }}>Active</option>
                                <option value="0" {{ old('status') == 0 ? 'selected' : '' }}>In-Active</option>
                            </select>
                        </div>
                    </div>

                    <div class="d-flex justify-content-end mt-3">
                        <a href="{{ route('language.index') }}" class="btn btn-secondary me-2">Cancel</a>
                        <button type="submit" class="btn btn-primary">submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection