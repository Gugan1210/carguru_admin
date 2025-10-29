<?php $page = 'edit-role'; ?>
@extends('layouts.app', [
    'activePage' => 'table',
    'title' => 'Create Make Interior Color - Admin Panel - CarGuru',
    'navName' => 'Table List',
    'activeButton' => 'laravel'
])

@section('content')
<div class="page-wrapper">
    <div class="content">
        <div class="page-header">
            <div class="add-item d-flex">
                <div class="page-title">
                    <h4 class="fw-bold">Create Make Interior Color</h4>
                    <h6>Create Make Interior Color</h6>
                </div>
            </div>
            <ul class="table-top-head">
                <li>
                    <a data-bs-toggle="tooltip" data-bs-placement="top" title="Refresh"><i class="ti ti-refresh"></i></a>
                </li>
                <li>
                    <a data-bs-toggle="tooltip" data-bs-placement="top" title="Collapse" id="collapse-header"><i class="ti ti-chevron-up"></i></a>
                </li>
            </ul>
            <div class="page-btn mt-0">
                <a href="{{ route('interior_color.index') }}" class="btn btn-secondary">
                    <i data-feather="arrow-left" class="me-2"></i>Back
                </a>
            </div>
        </div>

        {{-- Success Message --}}
        @if (session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif

        {{-- Validation Errors --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- Form --}}
        <form method="POST" action="{{ route('interior_color.store') }}" class="add-role-form">
            @csrf
            <div class="add-product">
                <div class="accordions-items-seperate" id="accordionSpacingExample">
                    <div class="accordion-item border mb-4">
                        <div id="SpacingOne" class="accordion-collapse collapse show">
                            <div class="accordion-body border-top">
                                <div class="row">
                                    {{-- Name --}}
                                    <div class="col-sm-6 col-12">
                                        <div class="mb-3">
                                            <label class="form-label">Name <span class="text-danger ms-1">*</span></label>
                                            <input type="text"
                                                   name="name"
                                                   id="name"
                                                   class="form-control @error('name') is-invalid @enderror"
                                                   value="{{ old('name') }}"
                                                   required>
                                            @error('name')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                                                        {{-- Color --}}
                                    <div class="col-sm-6 col-12">
                                        <div class="mb-3">
                                            <label class="form-label">Color <span class="text-danger ms-1">*</span></label>
                                            <input type="text"
                                                   name="color"
                                                   id="color"
                                                   class="form-control @error('color') is-invalid @enderror"
                                                   value="{{ old('color') }}"
                                                   required>
                                            @error('color')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    {{-- Status --}}
                                    <div class="col-sm-6 col-12">
                                        <div class="mb-3">
                                            <label class="form-label">Status <span class="text-danger ms-1">*</span></label>
                                            <select class="form-select @error('status') is-invalid @enderror"
                                                    name="status" id="status" required>
                                                <option value="1" {{ old('status') == '1' ? 'selected' : '' }}>Active</option>
                                                <option value="0" {{ old('status') == '0' ? 'selected' : '' }}>Inactive</option>
                                            </select>
                                            @error('status')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                {{-- Buttons --}}
                                <div class="col-lg-12">
                                    <div class="d-flex align-items-center justify-content-end mb-4">
                                        <a href="{{ route('interior_color.index') }}" class="btn btn-secondary me-2">Cancel</a>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>
                            </div> <!-- accordion-body -->
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
