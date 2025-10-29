<?php $page = 'edit-role'; ?>
@extends('layouts.app', ['activePage' => 'table', 'title' => 'Update Vehicle Variant - Admin Panel - CarGuru', 'navName' => 'Table List', 'activeButton' => 'laravel'])
@section('content')
    <div class="page-wrapper">
        <div class="content">
            <div class="page-header">
                <div class="add-item d-flex">
                    <div class="page-title">
                        <h4 class="fw-bold">Update Variant</h4>
                        <h6>Update Variant</h6>
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
                    <a href="{{route('variants.index')}}" class="btn btn-secondary"><i data-feather="arrow-left"
                            class="me-2"></i>Back</a>
                </div>
            </div>
            <form method="POST" action="{{ route('variants.update', $variant->id) }}" class="add-role-form">
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
                                                <label class="form-label">Brand<span
                                                        class="text-danger ms-1">*</span></label>
                                                <select name="brand_id" id="brand_id" class="form-control">
                                                    <option>Select Brand</option>
                                                    @foreach($makes as $make)
                                                        <option value="{{ $make->id }}" {{ $make->id == $variant->brand_id ? 'selected' : '' }}>{{ $make->brand_name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class=" col-sm-6 col-12">
                                            <div class="mb-3">
                                                <label class="form-label">Model<span
                                                        class="text-danger ms-1">*</span></label>
                                                <select name="model_id" id="model_id" class="form-control">
                                                    <option value="">Select Model</option>
                                                    @foreach($makes as $make)
                                                        @foreach($models->where('brand_id', $make->id) as $model)
                                                            <option value="{{ $model->id }}" data-brand="{{ $make->id }}" {{ $model->id == $variant->model_id ? 'selected' : '' }}>
                                                                {{ $model->model_name }}
                                                            </option>
                                                        @endforeach
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-12">
                                            <div class="mb-3">
                                                <label class="form-label">Variant Name<span
                                                        class="text-danger ms-1">*</span></label>
                                                <input type="text" name="variant_name" id="variant_name"
                                                    class="form-control" value="{{ $variant->variant_name }}">
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

@push('scripts')
    <script>
        document.getElementById('brand_id').addEventListener('change', function () {
            let brandId = this.value;
            let options = document.querySelectorAll('#model_id option');

            options.forEach(option => {
                if (!option.value || option.dataset.brand === brandId) {
                    option.style.display = '';
                } else {
                    option.style.display = 'none';
                }
            });
            document.getElementById('model_id').value = '';
        });
    </script>
@endpush