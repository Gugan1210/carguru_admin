<?php $page = 'edit-product'; ?>
@extends('layouts.app', ['activePage' => 'table', 'title' => 'Update User - Admin Panel - CarGuru', 'navName' => 'Table List', 'activeButton' => 'laravel'])
@section('content')
    <div class="page-wrapper">
        <div class="content">
            <div class="page-header">
                <div class="add-item d-flex">
                    <div class="page-title">
                        <h4 class="fw-bold">Update User</h4>
                        <h6>Update User</h6>
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
                    <a href="{{route('users.index')}}" class="btn btn-secondary"><i data-feather="arrow-left"
                            class="me-2"></i>Back</a>
                </div>
            </div>
            <form method="POST" action="{{ route('users.update', $user->id) }}" class="add-product-form">
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
                                                <label class="form-label">Name<span
                                                        class="text-danger ms-1">*</span></label>
                                                <input type="text" name="name" id="name" class="form-control"
                                                    value="{{ $user->name }}">
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-12">
                                            <div class="mb-3">
                                                <label class="form-label">Phone Number<span
                                                        class="text-danger ms-1">*</span></label>
                                                <input type="text" name="phone" id="phone" class="form-control"
                                                    value="{{ $user->phone }}">
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-12">
                                            <div class="mb-3">
                                                <label class="form-label">Email<span
                                                        class="text-danger ms-1">*</span></label>
                                                <input type="text" name="email" id="email" class="form-control" value="{{ $user->email }}">
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-12">
                                            <div class="mb-3">
                                                <label class="form-label">Password<span
                                                        class="text-danger ms-1">*</span></label>
                                                <input type="password" name="password" id="password" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-12">
                                            <div class="mb-3">
                                                <label class="form-label">Confirm Password<span
                                                        class="text-danger ms-1">*</span></label>
                                                <input type="password" name="confirm-password" id="confirm-password"
                                                    class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-12">
                                            <div class="mb-3">
                                                <label class="form-label">Status<span
                                                        class="text-danger ms-1">*</span></label>
                                                <select class="select" name="status" id="status">
                                                    <option value="1" {{ $user->status == 1 ? 'selected' : '' }}>Active
                                                    </option>
                                                    <option value="0" {{ $user->status == 0 ? 'selected' : '' }}>In-Active
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-12">
                                            <div class="mb-3">
                                                <label class="form-label">Role<span
                                                        class="text-danger ms-1">*</span></label>
                                                <select name="roles[]" class="form-control select">
                                                    @foreach ($roles as $value => $label)
                                                        <option value="{{ $value }}" {{ isset($userRole[$value]) ? 'selected' : ''}}>
                                                            {{ $label }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
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