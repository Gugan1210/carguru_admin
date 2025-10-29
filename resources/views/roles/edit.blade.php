<?php $page = 'edit-role'; ?>
@extends('layouts.app', ['activePage' => 'table', 'title' => 'Update Role - Admin Panel - CarGuru', 'navName' => 'Table List', 'activeButton' => 'laravel'])
@section('content')
    <div class="page-wrapper">
        <div class="content">
            <div class="page-header">
                <div class="add-item d-flex">
                    <div class="page-title">
                        <h4 class="fw-bold">Update Role</h4>
                        <h6>Update Role</h6>
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
                    <a href="{{route('roles.index')}}" class="btn btn-secondary"><i data-feather="arrow-left"
                            class="me-2"></i>Back</a>
                </div>
            </div>
            <form method="POST" action="{{ route('roles.update', $role->id) }}" class="edit-product-form">
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
                                                    value="{{ $role->name }}">
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-12">
                                            <div class="mb-3">
                                                <label class="form-label">Status<span
                                                        class="text-danger ms-1">*</span></label>
                                                <select class="select" name="status" id="status">
                                                    <option value="1" {{ $role->status == 1 ? 'selected' : '' }}>Active
                                                    </option>
                                                    <option value="0" {{ $role->status == 0 ? 'selected' : '' }}>In-Active
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <div class="form-group">
                                                <strong>Permission:</strong>
                                                <br />
                                                @php $oldName = ''; @endphp

                                                <div class="row">
                                                    @foreach($permission as $value)
                                                        @php
                                                            $newRoleName = explode("-", $value->name)[0];
                                                        @endphp

                                                        @if ($newRoleName != $oldName)
                                                            @php $oldName = $newRoleName; @endphp
                                                            <div class="col-12 ml-2">
                                                                <h6>{{ ucwords($newRoleName) }}</h6>
                                                            </div>
                                                        @endif

                                                        <div class="col-md-2 col-sm-2 col-12 ml-2">
                                                            @php $option = explode('-', $value->name);@endphp
                                                            <label>
                                                                <input type="checkbox" name="permission[{{ $value->id }}]"
                                                                    value="{{ $value->id }}" {{ in_array($value->id, $rolePermissions) ? 'checked' : ''}}>
                                                                {{ ucwords(string: $option[1]) }}
                                                            </label>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="d-flex align-items-center justify-content-end mb-4">
                                            <button type="button" class="btn btn-secondary me-2"
                                                href="{{ route('roles.index') }}">Cancel</button>
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