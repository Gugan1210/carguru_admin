<?php $page = 'edit-role'; ?>
@extends('layouts.app', ['activePage' => 'table', 'title' => 'Create Detail Category- Admin Panel - CarGuru', 'navName' => 'Table List', 'activeButton' => 'laravel'])
@section('content')
    <div class="page-wrapper">
        <div class="content">
            <div class="page-header">
                <div class="add-item d-flex">
                    <div class="page-title">
                        <h4 class="fw-bold">Create Car Sales Category</h4>
                        <h6>Create Car Sales Category</h6>
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
            @session('success')
                <div class="alert alert-success" role="alert">
                    {{ $value }}
                </div>
            @endsession
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
            <form method="POST" action="{{ route('detail_category.store') }}" class="add-role-form"
                enctype="multipart/form-data">
                @csrf
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
                                                <input type="text" name="key" id="key" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-12">
                                            <div class="mb-3">
                                                <label class="form-label">Title<span
                                                        class="text-danger ms-1">*</span></label>
                                                <input type="text" name="name" id="name" class="form-control">
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
                                                        <img id="previewImage" class="preview-image"
                                                            style="display:none;" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-12">
                                            <div class="mb-3">
                                                <label class="form-label">Status<span
                                                        class="text-danger ms-1">*</span></label>
                                                <select class="select" name="status" id="status">
                                                    <option value="1">Active
                                                    </option>
                                                    <option value="0">In-Active
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
            /* show full image, not zoomed */
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

        // Click event — trigger file dialog safely (once)
        uploadBox.addEventListener('click', (e) => {
            if (e.target !== fileInput) fileInput.click();
        });

        // File input change — handle upload
        fileInput.addEventListener('change', function () {
            if (this.files && this.files[0]) handleFile(this.files[0]);
        });

        // Drag over effect
        uploadBox.addEventListener('dragover', (e) => {
            e.preventDefault();
            uploadBox.style.borderColor = '#007bff';
        });

        // Remove drag effect
        uploadBox.addEventListener('dragleave', (e) => {
            e.preventDefault();
            uploadBox.style.borderColor = '#ccc';
        });

        // Handle file drop
        uploadBox.addEventListener('drop', (e) => {
            e.preventDefault();
            uploadBox.style.borderColor = '#ccc';
            const file = e.dataTransfer.files[0];
            if (file) handleFile(file);
        });

        // Helper function for preview
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