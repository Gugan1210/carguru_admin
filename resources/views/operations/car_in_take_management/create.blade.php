<div class="">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <div class="content p-1">
        <div class="page-header">
            <div class="add-item d-flex">
                <div class="page-title">
                </div>
            </div>
            <div class="d-flex justify-content-end">
            </div>
        </div>
        <div class="">
            <!-- A&P MECHANICS -->
            <div class="mt-4">
                <form action="">
                    @csrf
                    <!-- Booking Fee -->
                    <div class="card mb-3">
                        <div class="card-header border-bottom-0 fw-bold ">
                            <div class="row heading-content d-flex align-items-center ">
                                <div class="col-8 d-flex justify-content-end ">
                                    <ul class="nav nav-tabs custom-nav" id="myNav">
                                        <li class="nav-item">
                                            <a href="#" class="nav-link active text-black" id="car_info">CAR INFO &
                                                DOCUMENTS</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#" class="nav-link text-black" id="inspection">INSPECTION
                                                REPORT</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#" class="nav-link text-black" id="images">IMAGES & VIDEOS</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-4 d-flex justify-content-end ">
                                    <button type="button" class="btn btn-warning">Edit</button>
                                    <button type="button" class="btn btn-light ms-2">Save</button>
                                    <!-- <button type="button" class="btn  ms-2">Close <span> &times; </span> </button> -->
                                </div>
                            </div>
                        </div>
                        <!-- ========== Start car info container ========== -->
                        <div id="car-info-container">
                            @include('operations.car_in_take_management.create.car_info_document.info')
                            @include('operations.car_in_take_management.create.car_info_document.accident')
                        </div>
                        <!-- ========== End car info container ========== -->
                        <!-- ========== Start Inspection container ========== -->
                        <div id="inspection-container" class="d-none">
                            @include('operations.car-in-take-management.create.inspections-report')
                        </div>
                        <!-- ========== End Inspection container ========== -->
                        <!-- ========== Start Inmage&Video container ========== -->
                        <div id="image-container" class="d-none">
                            @include('operations.car-in-take-management.create.image-video-contains')
                        </div>
                        <!-- ========== End Inmage&Video container ========== -->
                </form>
            </div>
        </div>
    </div>

    <!-- ========== Start Image and Video ========== -->
    <style>
        .gallery-container {
            padding: 30px;
            /* background-color: #f8f9fa; */
        }

        .section-title {
            font-weight: bold;
            margin-top: 30px;
            margin-bottom: 20px;
            font-size: 14px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .image-box {
            background-color: white;
            border: 2px dashed #ddd;
            border-radius: 8px;
            aspect-ratio: 4/3;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .image-box:hover {
            border-color: #999;
            background-color: #f0f0f0;
        }

        .image-box img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 6px;
        }

        .image-box.has-image:hover {
            opacity: 0.8;
        }

        .image-label {
            font-size: 12px;
            color: #666;
            text-align: center;
            font-weight: 500;
        }

        .hidden-input {
            display: none;
        }
    </style>

    <script>
        function triggerUpload(element, type) {
            const fileInput = element.querySelector('.hidden-input');
            fileInput.click();
        }

        function handleMediaUpload(event, container) {
            const file = event.target.files[0];
            if (!file) return;

            const reader = new FileReader();
            reader.onload = function (e) {
                // Determine if it's a video or image
                const isVideo = file.type.startsWith('video/');

                // Remove existing content
                container.innerHTML = '';

                if (isVideo) {
                    // Create and add video
                    const video = document.createElement('video');
                    video.src = e.target.result;
                    video.controls = true;
                    container.appendChild(video);
                } else {
                    // Create and add image
                    const img = document.createElement('img');
                    img.src = e.target.result;
                    container.appendChild(img);
                }

                // Add play icon for videos
                if (isVideo) {
                    const playIcon = document.createElement('i');
                    playIcon.className = 'fas fa-play-circle video-play-icon';
                    container.appendChild(playIcon);
                }

                // Add hidden input back for potential re-upload
                const input = document.createElement('input');
                input.type = 'file';
                input.className = 'hidden-input';
                input.accept = isVideo ? 'video/*' : 'image/*';
                input.onchange = function (event) {
                    handleMediaUpload(event, container);
                };

                container.appendChild(input);
                container.classList.add('has-media');
            };
            reader.readAsDataURL(file);
        }

        function triggerUpload(element) {
            const fileInput = element.querySelector('.hidden-input');
            fileInput.click();
        }

        function handleImageUpload(event, container) {
            const file = event.target.files[0];
            if (!file) return;

            const reader = new FileReader();
            reader.onload = function (e) {
                // Remove existing content
                container.innerHTML = '';

                // Create and add image
                const img = document.createElement('img');
                img.src = e.target.result;

                // Add hidden input back for potential re-upload
                const input = document.createElement('input');
                input.type = 'file';
                input.className = 'hidden-input';
                input.accept = 'image/*';
                input.onchange = function (event) {
                    handleImageUpload(event, container);
                };

                container.appendChild(img);
                container.appendChild(input);
                container.classList.add('has-image');
            };
            reader.readAsDataURL(file);
        }
    </script>
    <!-- ========== End Image and Video ========== -->
    <!-- ========== Start inspection report container ========== -->
    <script>
        function toggleAccordion(header) {
            header.classList.toggle('active');
            const body = header.nextElementSibling;
            body.classList.toggle('show');
        }

        function toggleSubAccordion(header) {
            header.classList.toggle('active');
            const body = header.nextElementSibling;
            body.classList.toggle('show');
        }

        function triggerUpload(element) {
            const fileInput = element.querySelector('.hidden-input');
            fileInput.click();
        }

        function handleDocumentUpload(event, container) {
            const file = event.target.files[0];
            if (!file) return;

            const reader = new FileReader();
            reader.onload = function (e) {
                // Clear placeholder
                const placeholder = container.querySelector('.upload-placeholder');
                if (placeholder) {
                    placeholder.remove();
                }

                // Remove existing image if any
                const existingImg = container.querySelector('img');
                if (existingImg) {
                    existingImg.remove();
                }

                // Create and add new image
                const img = document.createElement('img');
                img.src = e.target.result;
                container.appendChild(img);

                // Add hidden input back
                const input = document.createElement('input');
                input.type = 'file';
                input.className = 'hidden-input';
                input.accept = 'image/*';
                input.onchange = function (event) {
                    handleDocumentUpload(event, container);
                };
                container.appendChild(input);
            };
            reader.readAsDataURL(file);
        }
    </script>
    <style>
        .container-main {
            background-color: white;
            /* border-radius: 8px; */
            /* box-shadow: 0 2px 4px rgba(0,0,0,0.1); */
        }

        .accordion-header {
            /* background-color: #f8f9fa; */
            /* border: 1px solid #dee2e6; */
            border-bottom: 1px solid #dee2e6;
            border-top: 1px solid #dee2e6;
            padding: 15px 20px;
            cursor: pointer;
            display: flex;
            justify-content: space-between;
            align-items: center;
            transition: all 0.3s ease;
            user-select: none;
            /* margin-bottom: 10px; */
        }

        .accordion-header:hover {
            background-color: #e9ecef;
        }

        .accordion-header.active {
            background-color: #e7f3ff;
            border-color: #0d6efd;
        }

        .accordion-header-title {
            font-weight: 600;
            color: #333;
            font-size: 14px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .accordion-icon {
            transition: transform 0.3s ease;
            color: #666;
        }

        .accordion-header.active .accordion-icon {
            transform: rotate(180deg);
        }

        .accordion-body {
            display: none;
            background-color: white;
            border: 1px solid #dee2e6;
            border-top: none;
            padding: 20px;
            animation: slideDown 0.3s ease;
        }

        .accordion-body.show {
            display: block;
        }

        @keyframes slideDown {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .sub-accordion-header {
            /* background-color: #f8f9fa; */
            /* border: 1px solid #dee2e6; */
            border-top: 1px solid #dee2e6;
            border-bottom: 1px solid #dee2e6;
            padding: 12px 15px;
            cursor: pointer;
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 10px;
            /* border-radius: 4px; */
            transition: all 0.3s ease;
            user-select: none;
        }

        .sub-accordion-header:hover {
            background-color: #e9ecef;
        }

        .sub-accordion-header.active {
            background-color: #e7f3ff;
            border-color: #0d6efd;
        }

        .sub-accordion-header-title {
            font-weight: 500;
            color: #555;
            font-size: 13px;
        }

        .sub-accordion-icon {
            transition: transform 0.3s ease;
            color: #999;
            font-size: 12px;
        }

        .sub-accordion-header.active .sub-accordion-icon {
            transform: rotate(180deg);
        }

        .sub-accordion-body {
            display: none;
            /* background-color: #fafbfc; */
            /* border: 1px solid #dee2e6; */
            padding: 15px;
            border-radius: 4px;
            margin-bottom: 10px;
            animation: slideDown 0.3s ease;
        }

        .sub-accordion-body.show {
            display: block;
        }

        .form-group-custom {
            margin-bottom: 15px;
        }

        .form-group-custom label {
            font-weight: 500;
            font-size: 13px;
            color: #333;
            margin-bottom: 5px;
            display: block;
        }

        .form-group-custom input,
        .form-group-custom select,
        .form-group-custom textarea {
            font-size: 13px;
            border-radius: 4px;
            border: 1px solid #dee2e6;
            padding: 8px 10px;
        }

        .form-group-custom input:focus,
        .form-group-custom select:focus,
        .form-group-custom textarea:focus {
            border-color: #0d6efd;
            outline: none;
            box-shadow: 0 0 0 0.2rem rgba(13, 110, 253, 0.25);
        }

        .document-preview {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
            gap: 15px;
            margin-bottom: 15px;
        }

        .document-item {
            position: relative;
            cursor: pointer;
            border-radius: 6px;
            overflow: hidden;
            background-color: #f8f9fa;
            aspect-ratio: 4/3;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 2px dashed #dee2e6;
            transition: all 0.3s ease;
        }

        .document-item:hover {
            border-color: #0d6efd;
            background-color: #e7f3ff;
        }

        .document-item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .upload-placeholder {
            text-align: center;
            color: #999;
        }

        .upload-placeholder i {
            font-size: 24px;
            margin-bottom: 5px;
        }

        .upload-placeholder p {
            font-size: 11px;
            margin: 0;
        }

        .badge-status {
            display: inline-block;
            padding: 4px 8px;
            border-radius: 4px;
            font-size: 11px;
            font-weight: 500;
            margin-right: 5px;
        }

        .badge-available {
            background-color: #d4edda;
            color: #155724;
        }

        .badge-not-available {
            background-color: #f8d7da;
            color: #721c24;
        }

        .badge-fair {
            background-color: #fff3cd;
            color: #856404;
        }

        .hidden-input {
            display: none;
        }

        .wrapper-container {
            /* max-width: 900px; */
            margin: 10px;
        }
    </style>
    <!-- ========== End inspection report container ========== -->
    <!-- ========== Start Car info container  and balance style and script========== -->

    <style>
        .pagination-length button {
            border: 1px solid #ccc;
            background: #fff;
            margin-right: 4px;
            padding: 4px 10px;
            border-radius: 4px;
            cursor: pointer;
        }

        .pagination-length button.active {
            background: #f0ad4e;
            /* yellow */
            color: #fff;
            border-color: #eea236;
        }

        .table-custom th {
            font-weight: 600;

        }

        .table-custom thead th {

            background: #fff !important;

        }

        .active-table .table thead tr th {
            background: #fff !important;
            font-size: 12px;
            font-weight: 600;
        }

        .active-table .table tbody tr td {
            color: #000;
            font-size: 12px;
            border: none;
        }

        .active-table .table-left td {
            background-color: #f6f7f8 !important;
            /* light grey */
        }

        .active-table .table-right td {
            background-color: #f9efc9 !important;
            /* light yellow */
        }

        .titles {
            color: #000;
        }

        .plus-icon {
            font-size: 9px !important;
        }

        /* wrapper for absolute icon */
        .custom-nav .nav-link {
            color: #444;
            font-weight: 600;
            padding: 8px 16px;
            position: relative;
        }

        .custom-nav .nav-link.active {
            color: red !important;
            font-weight: 700;
            border: none;
        }

        .custom-nav .nav-link.active::after {
            content: "";
            position: absolute;
            bottom: 3px;
            left: 0;
            right: 0;
            height: 3px;
            background-color: orange;
            border-radius: 2px;
            border: none;
        }

        /* wrapper for absolute icon */
        .custom-select-wrapper {
            position: relative;
        }

        /* remove native arrow (all browsers) and remove bootstrap background-image */
        .custom-select-wrapper .form-select,
        .custom-select-wrapper select {
            -webkit-appearance: none !important;
            -moz-appearance: none !important;
            appearance: none !important;

            /* Bootstrap sets a background-image for its .form-select caret — remove it */
            background-image: none !important;
            background-repeat: no-repeat !important;
            background-position: right center !important;

            /* room for your custom icon */
            padding-right: 2.4rem !important;
        }

        /* hide the MS dropdown arrow (IE/Edge) */
        .custom-select-wrapper .form-select::-ms-expand {
            display: none;
        }

        /* firefox focus hack (prevents weird arrow on some FF versions) */
        .custom-select-wrapper .form-select:-moz-focusring {
            color: transparent;
            text-shadow: 0 0 0 #000;
        }

        .form-control {
            font-size: 0.7rem;
            color: #000;
        }

        /* the caret icon position */
        .custom-select-wrapper .bi-caret-down-fill {
            position: absolute;
            right: 0.75rem;
            top: 50%;
            transform: translateY(-50%);
            pointer-events: none;
            color: #000;
            font-size: 1rem;
        }

        .upload-box {
            border: 2px dashed #bbb;
            border-radius: 8px;
            text-align: center;
            width: 100%;
            padding: 25px 8px;
            cursor: pointer;
            transition: border-color 0.3s;
        }

        .upload-box:hover {
            border-color: #666;
        }

        .upload-box i {
            font-size: 25px;
            color: #999;
            margin-bottom: 10px;
        }

        .form-section-title {
            font-weight: 600;
            font-size: 14px;
            margin-bottom: 15px;
            text-transform: uppercase;
        }

        input::placeholder {
            color: #000 !important;
        }

        .lifecycle-container {
            max-width: 1000px;
            margin: 0 auto;
            /* Initially hidden */
        }

        .lifecycle-title {
            font-weight: bold;
            margin-bottom: 20px;
            font-size: 14px;
            text-transform: uppercase;
            color: #333;
        }

        .lifecycle-steps {
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: relative;
        }

        /* Yellow connector line behind the circles */
        .lifecycle-steps::before {
            content: '';
            position: absolute;
            top: 40px;
            left: calc(1 / 10 * 100%);
            right: calc(1 / 10 * 100%);
            height: 2px;
            background: #f9b400;
            z-index: 0;
        }

        .step {
            position: relative;
            text-align: center;
            flex: 1;
            z-index: 1;
        }

        .step-label {
            font-size: 12px;
            color: #555;
            margin-bottom: 8px;
        }

        .step-circle {
            width: 24px;
            height: 24px;
            line-height: 24px;
            border-radius: 50%;
            background: #f9b400;
            color: #fff;
            display: inline-block;
            font-size: 12px;
            font-weight: bold;
        }

        .activity .tables thead tr th,
        .tables thead tr td {
            font-size: 12px;
        }

        .activity .tables thead tr th:nth-child(1),
        .activity .tables thead tr th:nth-child(2),
        .activity .tables thead tr th:nth-child(3),
        .activity .tables thead tr th:nth-child(4),
        .activity .tables thead tr th:nth-child(5) {
            background: #ffeebf !important;
        }

        .activity .tables thead tr th:nth-child(6),
        .activity .tables thead tr th:nth-child(7),
        .activity .tables thead tr th:nth-child(8),
        .activity .tables thead tr th:nth-child(9) .activity .tables thead tr th:nth-child(10) {
            background: #ffdbb8 !important;
        }

        .activity .tables thead tr th:nth-child(11),
        .activity .tables thead tr th:nth-child(12),
        .activity .tables thead tr th:nth-child(13) {
            background: #fae1a0 !important;
        }

        .activity .tables thead tr th:nth-child(14) {
            background: #ffeebf !important;
        }

        .activity .tables tbody tr td:nth-child(6),
        .activity .tables tbody tr td:nth-child(7),
        .activity .tables tbody tr td:nth-child(8),
        .activity .tables tbody tr td:nth-child(9) {
            background: #ffecf6 !important;
        }

        .activity .tables tbody tr td:nth-child(10),
        .activity .tables tbody tr td:nth-child(11) {
            background: #faedd0 !important;
        }

        /* Left tabs (All Bid Cars, Certified Cars) */
        .main-tab {
            border: 1px solid #ccc;
            border-radius: 6px;
            padding: 6px 10px;
            font-size: 10px;
            font-weight: 500;
            display: flex;
            align-items: center;
            margin-right: 8px;
            background: #fff;
            cursor: pointer;
            height: 35px;
            position: relative
        }

        .main-tab.active {
            background: #ffc107;
            border-color: #ffc107;
            color: #000;
        }

        .main-tab .count {
            background: #000;
            position: absolute;
            color: #fff;
            right: -7%;
            top: -21%;

            border-radius: 50%;
            padding: 2px 6px;
            font-size: 9px;
            font-weight: bold;
            margin-left: 6px;
        }

        /* Status tabs (Won, Sold, etc.) */
        .status-tab {
            border: 1px solid #ccc;
            border-radius: 6px;
            position: relative;
            /* padding: 6px 15px; */
            text-align: center;
            font-size: 9px;
            font-weight: 500;
            display: flex;
            align-items: center;
            justify-content: center;
            min-width: 65px !important;
            height: 35px;
            margin-right: 8px;
            background: #fff;
            cursor: pointer;
        }

        .status-tab .count {
            background: #ffc107;
            border-radius: 50%;
            position: absolute;
            padding: 2px 6px;
            font-size: 9px;
            right: -7%;
            top: -21%;
            font-weight: bold;
            margin-left: 6px;
            color: #000;
        }

        /* Dropdown button */
        .filter-dropdown .btn {
            border-radius: 6px;
            font-size: 14px;
            padding: 6px 15px;
        }

        .rig {
            margin-top: 16%;
        }

        .acc {
            width: 19%;
        }

        .his {
            width: 21%;
        }

        .top {
            width: 20%;
        }

        .right {
            margin-top: 40px;
        }

        .bottom {
            width: 42%;
        }

        .form-range {
            margin-top: 220px;
            width: 200px;
            margin-left: 500px;
        }

        .doc-upload-box {
            border: 2px dashed #bbb;
            border-radius: 10px;
            background-color: #f8f9fa;
            height: 150px;
            text-align: center;
            position: relative;
            overflow: hidden;
            cursor: pointer;
            transition: border-color 0.3s, background-color 0.3s;
            font-size: 10px;
        }

        .doc-upload-box:hover {
            border-color: #0d6efd;
            background-color: #eef6ff;
        }

        .doc-upload-placeholder {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: #6c757d;
            pointer-events: none;
        }

        .doc-upload-placeholder i {
            font-size: 2rem;
            margin-bottom: 0.5rem;
        }

        .doc-upload-box img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: none;
            border-radius: 10px;
        }

        .upload-title {
            font-weight: 600;
            font-size: 0.9rem;
            margin-bottom: 8px;
        }

        /* ---------- UPLOAD BOX ---------- */
        .upload-box {
            border: 2px dashed #bbb;
            border-radius: 10px;
            background-color: #f8f9fa;
            position: relative;
            width: 800px;
            height: 540px;
            text-align: center;
            overflow: hidden;
            transition: 0.3s;
            cursor: pointer;
        }

        .upload-box:hover {
            border-color: #0d6efd;
            background-color: #eef6ff;
        }

        .upload-content {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: #6c757d;
            pointer-events: none;
        }

        .upload-box img {
            width: 100%;
            height: 100%;
            object-fit: contain;
            transition: transform 0.3s ease;
            display: none;
            cursor: zoom-in;
        }

        .zoom-range {
            position: absolute;
            display: none;
            cursor: pointer;
            left: 20%;
            transform: translateX(-50%);
            bottom: 15px;
            width: 30%;
            appearance: none;
            height: 6px;
            border-radius: 5px;
            background: linear-gradient(to right, #ffc107 0%, #e0e0e0 0%);
            outline: none;
            transition: background 0.2s;
        }

        /* Thumb Style */
        .zoom-range::-webkit-slider-thumb {
            appearance: none;
            width: 18px;
            height: 18px;
            background: #ffc107;
            border: 2px solid #fff;
            border-radius: 50%;
            box-shadow: 0 0 3px rgba(0, 0, 0, 0.3);
            cursor: pointer;
            transition: transform 0.2s;
        }

        .zoom-range::-webkit-slider-thumb:hover {
            transform: scale(1.1);
        }

        /* Firefox */
        .zoom-range::-moz-range-thumb {
            width: 18px;
            height: 18px;
            background: #ffc107;
            border: 2px solid #fff;
            border-radius: 50%;
            cursor: pointer;
        }

        .zoom-range::-moz-range-track {
            height: 6px;
            border-radius: 5px;
            background: linear-gradient(to right, #ffc107 0%, #e0e0e0 0%);
        }

        .image-upload-box {
            border: 2px dashed #bbb;
            border-radius: 10px;
            padding: 0px;
            text-align: center;
            background-color: #f9f9f9;
            position: relative;
            cursor: pointer;
            transition: 0.3s;
            width: 100%;
            height: 180px;
            overflow: hidden;
        }

        .image-upload-box img {
            width: 100%;
            height: 100%;
            object-fit: contain;
            transition: transform 0.3s ease;
            display: none;
            cursor: zoom-in;
        }

        .image-upload-box:hover {
            border-color: #007bff;
            background-color: #eef6ff;
        }

        .upload-placeholder {
            color: #666;
        }

        .zoom-slider {
            position: absolute;
            bottom: 10px;
            left: 50%;
            width: 40%;
            display: none;
            border-radius: 50px;
            cursor: pointer;
        }

        .addon-services {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
        }

        .addon-box {
            background-color: #f8f9fa;
            border-radius: 6px;
            padding: 10px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            min-width: 180px;
            font-size: 14px;
            transition: all 0.2s ease;
        }

        .addon-box:hover {
            background-color: #e9ecef;
            transform: translateY(-2px);
            cursor: pointer;
        }

        .addon-box strong {
            color: #000;
            font-weight: 600;
            margin-left: 8px;
        }
    </style>

    <script>
        const uploadBox = document.getElementById("uploadBoxRC");
        const fileInput = document.getElementById("fileRC");
        const img = document.getElementById("imgRC");
        const uploadContent = document.getElementById("uploadContentRC");
        const zoomSlider = document.getElementById("zoomRC");
        let zoomLevel = 1;
        let isDragging = false;
        let startX, startY, currentX = 0,
            currentY = 0;

        // Open file selector
        uploadBox.addEventListener("click", (e) => {
            if (e.target === zoomSlider || e.target === img) return;
            fileInput.click();
        });

        // Handle file upload
        fileInput.addEventListener("change", (e) => {
            const file = e.target.files[0];
            if (!file) return;

            const reader = new FileReader();
            reader.onload = (ev) => {
                img.src = ev.target.result;
                img.style.display = "block";
                uploadContent.style.display = "none";
                zoomSlider.style.display = "block";
            };
            reader.readAsDataURL(file);
        });

        // Zoom using range
        zoomSlider.addEventListener("input", (e) => {
            zoomLevel = parseFloat(e.target.value);
            applyTransform();
        });

        // Click image to zoom stepwise (1x → 2x → 3x → 1x)
        img.addEventListener("click", () => {
            zoomLevel += 0.5;
            if (zoomLevel > 3) zoomLevel = 1;
            zoomSlider.value = zoomLevel;
            applyTransform();
        });

        // Drag to pan
        img.addEventListener("mousedown", (e) => {
            isDragging = true;
            img.style.cursor = "grabbing";
            startX = e.clientX - currentX;
            startY = e.clientY - currentY;
        });

        document.addEventListener("mouseup", () => {
            isDragging = false;
            img.style.cursor = "grab";
        });

        document.addEventListener("mousemove", (e) => {
            if (!isDragging) return;
            currentX = e.clientX - startX;
            currentY = e.clientY - startY;
            applyTransform();
        });

        function applyTransform() {
            img.style.transform = `translate(${currentX}px, ${currentY}px) scale(${zoomLevel})`;
        }
        // Reusable upload function with drag + zoom
        function setupUpload(boxId, fileId, imgId, zoomId) {
            const box = document.getElementById(boxId);
            const file = document.getElementById(fileId);
            const img = document.getElementById(imgId);
            const zoom = document.getElementById(zoomId);
            const placeholder = box.querySelector(".upload-placeholder");

            let zoomLevel = 1;
            let isDragging = false;
            let startX, startY, currentX = 0,
                currentY = 0;

            // Open file selector
            box.addEventListener("click", (e) => {
                if (e.target === zoom || e.target === img) return;
                file.click();
            });

            // Load image
            file.addEventListener("change", (e) => {
                const fileData = e.target.files[0];
                if (!fileData) return;
                const reader = new FileReader();
                reader.onload = (event) => {
                    img.src = event.target.result;
                    img.style.display = "block";
                    placeholder.style.display = "none";
                    zoom.style.display = "block";
                };
                reader.readAsDataURL(fileData);
            });

            // Range zoom
            zoom.addEventListener("input", (e) => {
                zoomLevel = parseFloat(e.target.value);
                applyTransform();
            });

            // Click zoom (step zoom)
            img.addEventListener("click", () => {
                zoomLevel += 0.5;
                if (zoomLevel > 3) zoomLevel = 1;
                zoom.value = zoomLevel;
                applyTransform();
            });

            // Drag to pan
            img.addEventListener("mousedown", (e) => {
                isDragging = true;
                img.style.cursor = "grabbing";
                startX = e.clientX - currentX;
                startY = e.clientY - currentY;
            });

            document.addEventListener("mouseup", () => {
                isDragging = false;
                img.style.cursor = "grab";
            });

            document.addEventListener("mousemove", (e) => {
                if (!isDragging) return;
                currentX = e.clientX - startX;
                currentY = e.clientY - startY;
                applyTransform();
            });

            // Apply zoom and drag transform
            function applyTransform() {
                img.style.transform = `translate(${currentX}px, ${currentY}px) scale(${zoomLevel})`;
            }
        }

        // Initialize both boxes
        setupUpload("chassisBox", "chassisInput", "chassisImg", "chassisZoom");
        setupUpload("engineBox", "engineInput", "engineImg", "engineZoom");
        // Reusable upload function
        function setupDocUpload(boxId, inputId, imgId) {
            const box = document.getElementById(boxId);
            const input = document.getElementById(inputId);
            const img = document.getElementById(imgId);
            const placeholder = box.querySelector(".doc-upload-placeholder");

            // Open file selector on click
            box.addEventListener("click", () => input.click());

            // File input change
            input.addEventListener("change", (e) => {
                const file = e.target.files[0];
                if (!file) return;
                const reader = new FileReader();
                reader.onload = (event) => {
                    img.src = event.target.result;
                    img.style.display = "block";
                    placeholder.style.display = "none";
                };
                reader.readAsDataURL(file);
            });

            // Drag & drop support
            box.addEventListener("dragover", (e) => {
                e.preventDefault();
                box.style.borderColor = "#0d6efd";
            });

            box.addEventListener("dragleave", () => {
                box.style.borderColor = "#bbb";
            });

            box.addEventListener("drop", (e) => {
                e.preventDefault();
                box.style.borderColor = "#bbb";
                const file = e.dataTransfer.files[0];
                if (!file) return;
                const reader = new FileReader();
                reader.onload = (event) => {
                    img.src = event.target.result;
                    img.style.display = "block";
                    placeholder.style.display = "none";
                };
                reader.readAsDataURL(file);
            });
        }

        // Initialize upload boxes
        setupDocUpload("vocBox", "vocInput", "vocPreview");
        setupDocUpload("roadBox", "roadInput", "roadPreview");
        setupDocUpload("keysBox", "keysInput", "keysPreview");
        setupDocUpload("otherBox", "otherInput", "otherPreview");

        // NAV AND ACTIVIYS WORKING

        document.addEventListener("DOMContentLoaded", function () {
            // Get containers
            const infoContainer = document.getElementById("car-info-container");
            const cardBodys = document.getElementById("inspection-container");
            const historyContainer = document.getElementById("image-container");

            // Get buttons
            const showInfoBtn = document.getElementById("car_info");
            const showActivityBtn = document.getElementById("inspection");
            const showHistoryBtn = document.getElementById("images");

            // Show Info
            showInfoBtn.addEventListener("click", function () {
                infoContainer.classList.remove("d-none");
                cardBodys.classList.add("d-none");
                historyContainer.classList.add("d-none");
            });

            // Show Activity
            showActivityBtn.addEventListener("click", function () {
                infoContainer.classList.add("d-none");
                cardBodys.classList.remove("d-none");
                historyContainer.classList.add("d-none");
            });

            // Show History
            showHistoryBtn.addEventListener("click", function () {
                infoContainer.classList.add("d-none");
                cardBodys.classList.add("d-none");
                historyContainer.classList.remove("d-none");
            });
        });




        const navLinks = document.querySelectorAll('#myNav .nav-link');
        navLinks.forEach(link => {
            link.addEventListener('click', function () {
                navLinks.forEach(l => l.classList.remove('active'));
                this.classList.add('active');
            });
        });

        document.addEventListener("DOMContentLoaded", function () {
            const paymentMode = document.getElementById("paymentMode");
            const receiptBox = document.getElementById("receiptBox");
            const uploadContent = document.getElementById("uploadContent");
            const receiptInput = document.getElementById("receiptInput");
            const receiptPreview = document.getElementById("receiptPreview");

            const loanStatus = document.getElementById("loanStatus");
            const loanURL = document.getElementById("loanURL");
            const copyBtn = document.getElementById("copyBtn");

            // Toggle by Payment Mode
            paymentMode.addEventListener("change", function () {
                if (this.value === "cash") {
                    receiptBox.classList.remove("d-none");;
                    loanStatus.classList.add("d-none");
                    loanURL.classList.add("d-none");
                } else if (this.value === "loan") {
                    receiptBox.classList.add("d-none");

                    loanStatus.classList.remove("d-none");
                    loanURL.classList.remove("d-none");

                    // Auto-hide URL after 2 seconds
                    setTimeout(() => {
                        loanURL.classList.add("d-none");
                    }, 2000);
                }
            });

            // Copy URL button
            copyBtn.addEventListener("click", function () {
                const input = loanURL.querySelector("input");
                input.select();
                document.execCommand("copy");
                this.innerText = "Copied!";
                setTimeout(() => (this.innerText = "Copy"), 1500);
            });

            // Click receipt box to open file dialog
            receiptBox.addEventListener("click", () => {
                receiptInput.click();
            });

            // Show file preview
            receiptInput.addEventListener("change", function () {
                const file = this.files[0];
                if (!file) return;

                // Hide browse/drag text
                uploadContent.querySelector("p").style.display = "none";
                uploadContent.querySelector("small").style.display = "none";

                // Clear previous preview
                receiptPreview.innerHTML = "";

                if (file.type.startsWith("image/")) {
                    const img = document.createElement("img");
                    img.src = URL.createObjectURL(file);
                    img.classList.add("img-fluid", "mt-2", "border", "rounded");
                    img.style.maxHeight = "150px";
                    receiptPreview.appendChild(img);
                } else if (file.type === "application/pdf") {
                    const pdfName = document.createElement("p");
                    pdfName.classList.add("mt-2", "fw-bold", "text-primary");
                    pdfName.textContent = "📄 " + file.name;
                    receiptPreview.appendChild(pdfName);
                } else {
                    alert("Only images and PDFs are allowed!");
                }
            });
        });

        // Clicking the upload box opens file dialog
        uploadBox.addEventListener("click", () => {
            profileInput.click();
        });

        // Preview selected file
        profileInput.addEventListener("change", function () {
            const file = this.files[0];
            if (!file) return;

            // hide text
            uploadBox.querySelector("p").style.display = "none";
            uploadBox.querySelector("i").style.display = "none";
            uploadBox.querySelector("small").style.display = "none";

            // clear old preview
            profilePreview.innerHTML = "";

            if (file.type.startsWith("image/")) {
                const img = document.createElement("img");
                img.src = URL.createObjectURL(file);
                img.classList.add("img-fluid", "border", "rounded", "mt-2");
                img.style.maxHeight = "150px";
                profilePreview.appendChild(img);
            } else if (file.type === "application/pdf") {
                const pdf = document.createElement("p");
                pdf.textContent = "📄 " + file.name;
                pdf.classList.add("mt-2", "fw-bold", "text-primary");
                profilePreview.appendChild(pdf);
            } else {
                alert("Only images and PDFs allowed!");
            }
        });
        document.addEventListener("DOMContentLoaded", function () {
            const documentsBox = document.getElementById("documentsBox");
            const documentsInput = document.getElementById("documentsInput");
            const documentsPreview = document.getElementById("documentsPreview");
            const documentContent = document.getElementById("documentContent");

            // 1️⃣ Click the visible box to open file dialog
            documentContent.addEventListener("click", () => {
                documentsInput.click();
            });

            // 2️⃣ Preview selected file
            documentsInput.addEventListener("change", function () {
                const file = this.files[0];
                if (!file) return;

                // Hide upload text/icons
                const icon = documentContent.querySelector("i");
                const text = documentContent.querySelector("p");
                const smallText = documentContent.querySelector("small");

                if (icon) icon.style.display = "none";
                if (text) text.style.display = "none";
                if (smallText) smallText.style.display = "none";

                // Clear previous preview
                documentsPreview.innerHTML = "";

                if (file.type.startsWith("image/")) {
                    const img = document.createElement("img");
                    img.src = URL.createObjectURL(file);
                    img.classList.add("img-fluid", "mt-2", "border", "rounded");
                    img.style.maxHeight = "150px";
                    documentsPreview.appendChild(img);
                } else if (file.type === "application/pdf") {
                    const pdfName = document.createElement("p");
                    pdfName.classList.add("mt-2", "fw-bold", "text-primary");
                    pdfName.textContent = "📄 " + file.name;
                    documentsPreview.appendChild(pdfName);
                } else {
                    alert("Only images and PDFs are allowed!");
                }
            });
        });
    </script>
    <!-- ========== End Car info container and balance style and script ========== -->
    <script>
        //Select2 Dropdown
        $(document).ready(function () {
            // Initialize all select2-ajax dropdowns
            $('.select2-ajax').each(function () {
                let $el = $(this);

                dropDown(
                    $el.attr('id'),
                    $el.data('placeholder'),
                    $el.data('search-url'),
                    $el.data('add-url')
                );
            });

            function dropDown(field_id, placeholder, routePathSearch, routePathAdd) {
                $('#' + field_id).select2({
                    placeholder: placeholder,
                    minimumInputLength: 0, // 👈 allow fetching without typing
                    ajax: {
                        url: routePathSearch,
                        dataType: 'json',
                        delay: 250,
                        data: function (params) {
                            return {
                                q: params.term || '',  // empty string means "all"
                                field_id: field_id
                            };
                        },
                        processResults: function (data, params) {
                            let results = data.map(item => ({
                                id: item.id,
                                text: item.name
                            }));

                            // If no results, show option to add
                            if (results.length === 0 && params.term) {
                                results.push({
                                    id: 'new_' + params.term,
                                    text: '➕ Add "' + params.term + '"',
                                    is_new: true
                                });
                            }

                            return { results: results };
                        },
                        cache: true
                    }
                });

                // 👇 Trigger search when clicking (to load all records by default)
                $('#' + field_id).on('select2:open', function () {
                    if (!$('#' + field_id).data('select2').results.lastParams) {
                        $('#' + field_id).select2('search', '');
                    }
                });

                // Handle "Add New" option
                $('#' + field_id).on('select2:select', function (e) {
                    let data = e.params.data;
                    if (data.is_new) {
                        $.post(routePathAdd, {
                            _token: '{{ csrf_token() }}',
                            name: data.text.replace('➕ Add "', '').replace('"', ''),
                            field_id: field_id
                        }, function (response) {
                            // Add and select the newly created option
                            let newOption = new Option(response.name, response.id, true, true);
                            $('#' + field_id).append(newOption).trigger('change');
                        });
                    }
                });
            }

        });
        // Reset Button
        document.getElementById("resetBtn").addEventListener("click", function () {
            let fields = @json(\App\Constants\commonConstant::CAR_DETAIL_RESET_FIELDS);

            fields.forEach(id => {
                let el = document.getElementById(id);
                if (el) {
                    if (el.type === "checkbox" || el.type === "radio") {
                        el.checked = false;
                    } else if (el.tagName === "SELECT") {
                        // Reset normal select
                        el.selectedIndex = 0;

                        // Reset all Select2 (with or without .select2-ajax class)
                        if ($(el).data('select2')) {
                            $(el).val(null).trigger("change");
                        }
                    } else {
                        el.value = "";
                    }
                }
            });

            // Reset file upload preview
            document.getElementById("brand_logo").value = "";
            document.getElementById("preview").innerHTML = "";
            document.getElementById("logoView").innerHTML = "";
        });
    </script>