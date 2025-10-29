<div class="row g-4 ms-3 me-2 mt-2">
    <div class="row mt-4">
        <div class="col-10">
            <h6 class="fw-bold text-uppercase mb-1">ACCIDENT & HISTORY</h6>
        </div>
        <div class="col-2">
            <h6 class="fw-bold text-uppercase mb-1">Warranties </h6>
        </div>
    </div>

    <div class="his col-3">
        <div class="mt-0"><label>Owner</label>
            <input type="number" class="form-control border border-dark rounded-1" value="1">
        </div>
    </div>

    <div class="his col-2 ms-1">
        <div class=" mt-0"><label>Usage</label>
            <select id="usage" name="usage" class="form-control border border-dark rounded- select2-ajax select2-url"
                data-placeholder="Select or Add Usage" data-search-url="{{ route('usage.search') }}"
                data-add-url="{{ route('usage.add') }}">
            </select>
        </div>
    </div>
    <div class="acc col-2">
        <div class="mt-0"><label>Car Accident</label>
            <select id="car_accident" name="car_accident" class="form-control border border-dark rounded-1">
                <option value="no">No</option>
                <option value="yes">Yes</option>
            </select>
        </div>
    </div>
    <div class=" acc col-2">
        <div class="mt-0"><label>Flood Car</label>
            <select id="flood_car" name="flood_car" class="form-control border border-dark rounded-1">
                <option>No</option>
                <option>Yes</option>
            </select>
        </div>
    </div>
    <div class="acc col-2">
        <div class="mt-0"><label>CARGURU’s Warranty</label>
            <select id="cargurus_warranty" name="cargurus_warranty"
                class="form-control border border-dark rounded-1 select2-ajax select2-url"
                data-placeholder="Select or Add Cargurus Warranty"
                data-search-url="{{ route('cargurusWarranty.search') }}"
                data-add-url="{{ route('cargurusWarranty.add') }}">
            </select>
        </div>
    </div>
</div>


<div class="row g-4 ms-3 me-2 mt-2">
    <div class="row mt-4">
        <div class="col-5">
            <h6 class="fw-bold text-uppercase mb-1">REGISTERED OWNER</h6>
        </div>
        <div class="col-7 ">
            <h6 class="fw-bold text-uppercase mb-1 ms-3">PERSON WHOM BROUGHT IN CAR </h6>
        </div>
    </div>

    <div class="his col-3">
        <div class="mt-0"><label>Name</label>
            <input type="text" class="form-control border border-dark rounded-1" placeholder="FOO KEE TIAN">
        </div>
    </div>

    <div class="his col-2 ms-1">
        <div class=" mt-0"><label>I.C. No</label>
            <input type="number" class="form-control border border-dark rounded-1" placeholder="831013055551">
        </div>
    </div>
    <div class="acc col-2">
        <div class="mt-0"><label>Name</label>
            <input type="text" class="form-control border border-dark rounded-1" placeholder="FOO AH LIAN">
        </div>
    </div>
    <div class=" acc col-2">
        <div class="mt-0"><label>I.C. No</label>
            <input type="number" class="form-control border border-dark rounded-1" placeholder="951013052352">
        </div>
    </div>
    <div class="acc col-2">

    </div>
</div>
<hr>
<div class="container ms-3 mt-2">
    <h6 class="fw-bold text-uppercase small mb-3">Recommended Add-On Services</h6>
    <div class="addon-services d-flex flex-wrap gap-3">
        <div class="addon-box">
            <span>Car Paint</span>
            <strong>RM 2,500</strong>
        </div>
        <div class="addon-box">
            <span>Service 2</span>
            <strong>RM 1,500</strong>
        </div>
        <div class="addon-box">
            <span>Service 3</span>
            <strong>RM 1,200</strong>
        </div>
        <div class="addon-box">
            <span>Service 4</span>
            <strong>RM 1,800</strong>
        </div>
        <div class="addon-box bg-white">

        </div>
        <div class="addon-box">
            <span>Service 5</span>
            <strong>RM 500</strong>
        </div>
    </div>
</div>
<hr>

<div class="container ms-3">
    <!-- Section Title -->
    <h6 class="fw-bold text-uppercase small mb-3">Car Description (Optional)</h6>

    <div class="row g-4">
        <!-- Left Column -->
        <div class="col-lg-5">
            <div class="mb-3">
                <label class="form-label fw-semibold small">Inspector Original
                    Feedback/Comment</label>
                <textarea id="inspector_feedback_comment" name="inspector_feedback_comment"
                    class="form-control border border-dark rounded-1" rows="6"
                    placeholder="Enter Car Description"></textarea>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid ms-3">

    <div class="row g-4">
        <!-- LEFT SIDE -->
        <div class="col-lg-5">
            <div class="mb-3">
                <label class="form-label">Edited Feedback/Comment By Approver</label>
                <textarea class="form-control border border-dark rounded-1" rows="5"
                    placeholder="Enter Car Description"></textarea>
            </div>
        </div>

        <!-- RIGHT SIDE -->
        <div class="col-lg-5">
            <label class="form-label">CARGURU Spotlight</label>
            <input id="carguru_spotlight_header_copy" name="carguru_spotlight_header_copy" type="text"
                class="form-control mb-1 border border-dark rounded-1" placeholder="Enter Header Copy">
            <textarea id="carguru_spotlight_body_copy" name="carguru_spotlight_body_copy"
                class="form-control border border-dark rounded-1" rows="4" placeholder="Enter Body Copy"></textarea>
        </div>
    </div>
</div>

<hr>

<div class="container mt-4 mb-3 ms-3">
    <h6 class="fw-bold mb-3">DOCUMENTS UPLOAD</h6>
    <div class="row g-3">
        <!-- VOC Document -->
        <div class="col-lg-2 col-md-4 col-sm-6">
            <div class="upload-title">VOC Document</div>
            <div class="doc-upload-box" id="vocBox">
                <div class="doc-upload-placeholder">
                    <i class="fa-solid fa-cloud-arrow-up"></i>
                    <p class="fw-semibold mb-0">Upload Document</p>
                    <small>Drag & drop file here</small>
                </div>
                <img id="vocPreview" alt="VOC Preview">
                <input type="file" id="vocInput" accept="image/*" hidden>
            </div>
        </div>

        <!-- Roadtax Document -->
        <div class="col-lg-2 col-md-4 col-sm-6">
            <div class="upload-title">Roadtax Document</div>
            <div class="doc-upload-box" id="roadBox">
                <div class="doc-upload-placeholder">
                    <i class="fa-solid fa-cloud-arrow-up"></i>
                    <p class="fw-semibold mb-0">Upload Document</p>
                    <small>Drag & drop file here</small>
                </div>
                <img id="roadPreview" alt="Roadtax Preview">
                <input type="file" id="roadInput" accept="image/*" hidden>
            </div>
        </div>

        <!-- Picture of Keys -->
        <div class="col-lg-2 col-md-4 col-sm-6">
            <div class="upload-title">Picture of Keys</div>
            <div class="doc-upload-box" id="keysBox">
                <div class="doc-upload-placeholder">
                    <i class="fa-solid fa-cloud-arrow-up"></i>
                    <p class="fw-semibold mb-0">Upload Document</p>
                    <small>Drag & drop file here</small>
                </div>
                <img id="keysPreview" alt="Keys Preview">
                <input type="file" id="keysInput" accept="image/*" hidden>
            </div>
        </div>

        <!-- Others -->
        <div class="col-lg-2 col-md-4 col-sm-6">
            <div class="upload-title">Others</div>
            <div class="doc-upload-box" id="otherBox">
                <div class="doc-upload-placeholder">
                    <i class="fa-solid fa-cloud-arrow-up"></i>
                    <p class="fw-semibold mb-0">Upload Document</p>
                    <small>Drag & drop file here</small>
                </div>
                <img id="otherPreview" alt="Other Preview">
                <input type="file" id="otherInput" accept="image/*" hidden>
            </div>
        </div>
    </div>
</div>