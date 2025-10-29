<?php $page = 'edit-role'; ?>
@extends('layouts.app', ['activePage' => 'table', 'title' => 'Update Role - Admin Panel - CarGuru', 'navName' => 'Table List', 'activeButton' => 'laravel'])
@section('content')
    <div class="page-wrapper">
        <div class="content">
            <div class="page-header">
                <div class="add-item d-flex">
                    <div class="page-title">
                        <h4 class="fw-bold">Create Make</h4>
                        <h6>Create Make</h6>
                    </div>
                </div>
                <ul class="table-top-head">
                    <li>
                        <a data-bs-toggle="tooltip" data-bs-placement="top" title="Refresh"><i
                                class="ti ti-refresh"></i></a>
                    </li>
                    <li>
                        <a data-bs-toggle="tooltip" data-bs-placement="top" title="Collapse" id="collapse-header"><i
                                class="ti ti-chevron-up"></i></a>
                    </li>
                </ul>
                <div class="page-btn mt-0">
                    <a href="{{route('makes.index')}}" class="btn btn-secondary"><i data-feather="arrow-left"
                            class="me-2"></i>Back</a>
                </div>
            </div>
            <form method="POST" action="{{ route('makes.update', $make->id) }}" class="add-role-form"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="add-product">
                    <div class="accordions-items-seperate" id="accordionSpacingExample">
                        <div class="accordion-item border mb-4">
                            <div id="SpacingOne" class="accordion-collapse collapse show"
                                aria-labelledby="headingSpacingOne">
                                <div class="accordion-body border-top">
                                    <div class="row">
                                        <div class="col-sm-6 col-12">
                                            <div class="mb-3">
                                                <label class="form-label">Brand Name<span
                                                        class="text-danger ms-1">*</span></label>
                                                <input type="text" name="brand_name" id="brand_name" class="form-control"
                                                    value="{{ $make->brand_name }}">
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-12">
                                            <div class="mb-3">
                                                <label class="form-label">Logo<span
                                                        class="text-danger ms-1">*</span></label>
                                                <input type="hidden" name="logo" accept="image/*" value="{{ $make->logo }}">
                                                <input type="file" name="logo" accept="image/*"
                                                    value="{{ asset('storage/' . $make->logo) }}">
                                                @if(!empty($make->logo) && Storage::disk('public')->exists($make->logo))
                                                    <img src="{{ asset('storage/' . $make->logo) }}" alt="Logo" width="50px"
                                                        height="50px">
                                                @else
                                                    <img src="{{ asset('storage/' . '/images/no-image.webp') }}"
                                                        alt="default logo" width="50px" height="50px">
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-12">
                                            <div class="mb-3">
                                                <label class="form-label">Brand Name<span
                                                        class="text-danger ms-1">*</span></label>
                                                <select id="country_id" name="country_id" class="form-control">
                                                    @foreach($countries as $country)
                                                        <option value="{{ $country->id }}" {{ $country->id == $make->country_id ? 'selected' : '' }}>{{ $country->country_name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-12">
                                            <div class="mb-3">
                                                <label class="form-label">Status<span
                                                        class="text-danger ms-1">*</span></label>
                                                <select class="select" name="status" id="status">
                                                    <option value="1" {{ $make->status == 1 ? 'selected' : '' }}>Active
                                                    </option>
                                                    <option value="0" {{ $make->status == 0 ? 'selected' : '' }}>In-Active
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="d-flex align-items-center justify-content-end mb-4">
                                                <button type="button" class="btn btn-secondary me-2">Cancel</button>
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </form>
        </div>
    </div>
@endsection