<?php $page = 'edit-role'; ?>
@extends('layouts.app', ['activePage' => 'table', 'title' => 'Update Detail Category - Admin Panel - CarGuru', 'navName' => 'Table List', 'activeButton' => 'laravel'])
@section('content')
    <div class="page-wrapper">
        <div class="content">
            <div class="page-header">
                <div class="add-item d-flex">
                    <div class="page-title">
                        <h4 class="fw-bold">Update Car Sales Category</h4>
                        <h6>Update Car Sales Category</h6>
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
                    <a href="{{route('detail_category.index')}}" class="btn btn-secondary"><i data-feather="arrow-left"
                            class="me-2"></i>Back</a>
                </div>
            </div>
            <form method="POST" action="{{ route('detail_category.update', $detail_category->id) }}"
                class="edit-transmission-form" enctype="multipart/form-data">
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
                                                <label class="form-label">Prefix<span
                                                        class="text-danger ms-1">*</span></label>
                                                <input type="text" name="key" id="key" class="form-control"
                                                    value="{{ $detail_category->key }}">
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-12">
                                            <div class="mb-3">
                                                <label class="form-label">Title<span
                                                        class="text-danger ms-1">*</span></label>
                                                <input type="text" name="name" id="name" class="form-control"
                                                    value="{{ $detail_category->name }}">
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-12">
                                            <div class="mb-3">
                                                <label class="form-label">Icon<span class="text-danger ms-1"></span></label>
                                                <div class="upload-container">
                                                    <div class="upload-box" id="uploadBox">
                                                        <input type="file" id="image" name="image" accept="image/*" hidden>
                                                        <div id="uploadContent">
                                                            <i class="cloud-icon">☁️</i>
                                                            <p class="upload-text">Upload here</p>
                                                            <small>Drag & drop file here</small>
                                                        </div>

                                                        {{-- Show existing image if available --}}
                                                        @if (!empty($detail_category->image))
                                                            <img id="previewImage" class="preview-image"
                                                                src="{{ asset('storage/' . $detail_category->image) }}"
                                                                alt="Preview Image" />
                                                        @else
                                                            <img id="previewImage" class="preview-image"
                                                                src="{{ asset('storage/' . '/images/no-image.webp') }}"
                                                                style="display:none;" />
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-12">
                                            <div class="mb-3">
                                                <label class="form-label">Status<span
                                                        class="text-danger ms-1">*</span></label>
                                                <select class="select" name="status" id="status">
                                                    <option value="1" {{ $detail_category->status == 1 ? 'selected' : '' }}>
                                                        Active
                                                    </option>
                                                    <option value="0" {{ $detail_category->status == 0 ? 'selected' : '' }}>
                                                        In-Active
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
    <style>
        .upload-container {
            width: 250px;
        }

        .upload-box {
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            width: 100%;
            height: 150px;
            border: 2px dashed #ccc;
            border-radius: 8px;
            cursor: pointer;
            transition: 0.3s;
            position: relative;
            overflow: hidden;
            background-color: #fff;
        }

        .upload-box:hover {
            border-color: #999;
            background-color: #fafafa;
        }

        .cloud-icon {
            font-size: 30px;
            color: #aaa;
        }

        .upload-text {
            font-size: 14px;
            color: #555;
            margin: 4px 0 0;
        }

        .upload-box small {
            color: #999;
            font-size: 12px;
        }

        .preview-image {
            width: 100%;
            height: 100%;
            object-fit: contain;
            /* full fit (no zoom) */
            position: absolute;
            top: 0;
            left: 0;
            background-color: #fff;
        }
    </style>
    <script>
        const fileInput = document.getElementById('image');
        const uploadBox = document.getElementById('uploadBox');
        const previewImage = document.getElementById('previewImage');
        const uploadContent = document.getElementById('uploadContent');

        // Hide upload content if image already exists
        if (previewImage.src && !previewImage.src.includes('data:image')) {
            uploadContent.style.display = 'none';
        }

        // Click to upload
        uploadBox.addEventListener('click', (e) => {
            if (e.target !== fileInput) fileInput.click();
        });

        // File input change
        fileInput.addEventListener('change', function () {
            if (this.files && this.files[0]) handleFile(this.files[0]);
        });

        // Drag/drop handlers
        uploadBox.addEventListener('dragover', e => {
            e.preventDefault();
            uploadBox.style.borderColor = '#007bff';
        });
        uploadBox.addEventListener('dragleave', e => {
            e.preventDefault();
            uploadBox.style.borderColor = '#ccc';
        });
        uploadBox.addEventListener('drop', e => {
            e.preventDefault();
            uploadBox.style.borderColor = '#ccc';
            const file = e.dataTransfer.files[0];
            if (file) handleFile(file);
        });

        // Preview logic
        function handleFile(file) {
            const reader = new FileReader();
            reader.onload = function (e) {
                previewImage.src = e.target.result;
                previewImage.style.display = 'block';
                uploadContent.style.display = 'none';
            };
            reader.readAsDataURL(file);
        }
    </script>
@endsection