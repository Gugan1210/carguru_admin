<div class="container ms-4">
    <h5>ENGINE</h5>
    <hr />
    <div class="row">
        <div class="col-lg-2 col-md-6 col-sm-12">
            <div class="mb-3">
                <label class="form-label">Engine Number</label>
                <input type="text" id="engine_number" name="engine_number" class="form-control">
                </select>
            </div>
        </div>
        <div class="col-lg-2 col-md-6 col-sm-12">
            <div class="mb-3">
                <label class="form-label">Chassis Number</label>
                <input type="text" id="chassis_number" name="chassis_number" class="form-control">
            </div>
        </div>

    </div>
</div>

<!-- ACCIDENT & HISTORY-->
<div class="container mt-4 ms-4">
    <h6 class="fw-bold">ACCIDENT & HISTORY</h6>
    <div class="row">
        <!-- Owner -->
        <div class="col-lg-2 col-md-6 col-sm-12">
            <div class="mb-3 mt-3">
                <label class="form-label">Owner</label>
                <input type="number" id="owner" name="owner" class="form-control" placeholder="1" min="0">
            </div>
        </div>

        <!-- Usage -->
        <div class="col-lg-2 col-md-6 col-sm-12">
            <div class="mb-3 mt-3">
                <label class="form-label">Usage</label>
                <select id="usage" name="usage" class="form-control select2-ajax select2-url"
                    data-placeholder="Select or Add Usage" data-search-url="{{ route('usage.search') }}"
                    data-add-url="{{ route('usage.add') }}">
                </select>
            </div>
        </div>

        <!-- Car Accident -->
        <div class="col-lg-2 col-md-6 col-sm-12">
            <div class="mb-3 mt-3">
                <label class="form-label">Car Accident</label>
                <select id="car_accident" name="car_accident" class="form-control">
                    <option>No</option>
                    <option>Yes</option>
                </select>
            </div>
        </div>

        <!-- Flood Car -->
        <div class="col-lg-2 col-md-6 col-sm-12">
            <div class="mb-3 mt-3">
                <label class="form-label">Flood Car</label>
                <select id="flood_car" name="flood_car" class="form-control">
                    <option>No</option>
                    <option>Yes</option>
                </select>
            </div>
        </div>
    </div>
</div>
<div class="container mt-4 ms-4">
    <div class="row">
        <!-- Warranties -->
        <div class="col-lg-4 col-md-12">
            <h6 class="fw-bold">
                WARRANTIES <i class="bi bi-info-circle"></i>
            </h6>
            <div class="row">
                <!-- Manufacturer's Warranty -->
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="mb-3 mt-3">
                        <label class="form-label">Manufacturer's Warranty</label>
                        <select id="manufacturers_warranty" name="manufacturers_warranty"
                            class="form-control select2-ajax select2-url"
                            data-placeholder="Select or Add Manufacturers Warranty"
                            data-search-url="{{ route('manufacturersWarranty.search') }}"
                            data-add-url="{{ route('manufacturersWarranty.add') }}">
                        </select>
                    </div>
                </div>
                <!-- CARGURU's Warranty -->
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="mb-3 mt-3">
                        <label class="form-label">CARGURU's Warranty</label>
                        <select id="cargurus_warranty" name="cargurus_warranty"
                            class="form-control select2-ajax select2-url"
                            data-placeholder="Select or Add Cargurus Warranty"
                            data-search-url="{{ route('cargurusWarranty.search') }}"
                            data-add-url="{{ route('cargurusWarranty.add') }}">
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Car Description (Optional) -->

<div class="container ms-3 mt-4">
    <h6 class="text-uppercase small fw-bold mb-3">Car Description (Optional)</h6>

    <div class="row g-3">
        <!-- Left: Inspector Feedback -->
        <div class="col-12 col-lg-4">
            <label for="carDescription" class="form-label">Inspector Feedback/Comment</label>
            <textarea id="inspector_feedback_comment" name="inspector_feedback_comment" class="form-control" rows="6"
                placeholder="Enter Car Description"></textarea>
        </div>

        <!-- Right: CARGURU Spotlight -->
        <div class="col-12 col-lg-4">
            <div class="mb-2 small fw-bold">CARGURU Spotlight</div>

            <div class="mb-2">
                <input id="carguru_spotlight_header_copy" name="carguru_spotlight_header_copy" type="text"
                    class="form-control" placeholder="Enter Header Copy">
            </div>

            <div class="mb-3">
                <textarea id="carguru_spotlight_body_copy" name="carguru_spotlight_body_copy" class="form-control"
                    rows="4" placeholder="Enter Body Copy"></textarea>
            </div>
        </div>
    </div>
</div>

<!--Brand Emblem-->
<div class="container mt-5 ms-4">
    <h6 class="fw-bold"> DOCUMENTS UPLOAD</h6>
    <div class="row">
        <!--VOC Document-->
        <div class="col-lg-2 col-md-6 col-sm-12">
            <label class="form-label mt-3"> VOC Document</label>
            <div class="upload-box">
                <div class="preview"></div>
                <div class="upload-content">
                    <i class="fa-solid fa-cloud-arrow-up"></i>
                    <p>Upload Graphic File (30x30px)</p>
                    <small>Drag & drop file here (PNG/JPG)</small>
                </div>
                <input type="file" class="upload-input" name="voc_document" accept="image/png, image/jpeg" hidden>
            </div>
        </div>

        <!--Roadtax Document-->
        <div class="col-lg-2 col-md-6 col-sm-12">
            <label class="form-label mt-3"> Roadtax Document</label>
            <div class="upload-box">
                <div class="preview"></div>
                <div class="upload-content">
                    <i class="fa-solid fa-cloud-arrow-up"></i>
                    <p>Upload Graphic File (30x30px)</p>
                    <small>Drag & drop file here (PNG/JPG)</small>
                </div>
                <input type="file" class="upload-input" name="roadtax_document" accept="image/png, image/jpeg" hidden>
            </div>
        </div>

        <!--Picture of Keys-->
        <div class="col-lg-2 col-md-6 col-sm-12">
            <label class="form-label mt-3"> Picture of Keys</label>
            <div class="upload-box">
                <div class="preview"></div>
                <div class="upload-content">
                    <i class="fa-solid fa-cloud-arrow-up"></i>
                    <p>Upload Graphic File (30x30px)</p>
                    <small>Drag & drop file here (PNG/JPG)</small>
                </div>
                <input type="file" class="upload-input" name="picture_of_keys" accept="image/png, image/jpeg" hidden>
            </div>
        </div>

        <!--Others-->
        <div class="col-lg-2 col-md-6 col-sm-12">
            <label class="form-label mt-3"> Others</label>
            <div class="upload-box">
                <div class="preview"></div>
                <div class="upload-content">
                    <i class="fa-solid fa-cloud-arrow-up"></i>
                    <p>Upload Graphic File (30x30px)</p>
                    <small>Drag & drop file here (PNG/JPG)</small>
                </div>
                <input type="file" class="upload-input" name="others" accept="image/png, image/jpeg" hidden>
            </div>
        </div>
    </div>
</div>
<style>
    .upload-box {
        border: 2px dashed #ccc;
        border-radius: 6px;
        width: 160px;
        padding: 20px;
        text-align: center;
        cursor: pointer;
        transition: border-color 0.3s;
        background: #ffffff;
        display: block !important;
    }

    .upload-box:hover {
        border-color: #777;
    }

    .upload-content i {
        font-size: 26px;
        display: block;
        margin-bottom: 8px;
        color: gray;
    }

    .upload-content p {
        font-weight: bold;
        margin: 0;
        font-size: 12px;
        color: gray;
    }

    .upload-content small {
        color: #666;
        font-size: 10px;
    }

    .upload-box-sm {
        width: 186px;
    }

    .upload-content-sm p {
        font-size: 12px;
    }

    .upload-content-sm small {
        font-size: 10px;
    }

    .preview img {
        width: 60px;
        height: 60px;
        object-fit: contain;
        border-radius: 4px;
        border: 1px solid #ddd;
        background: #fff;
        padding: 2px;
    }
</style>

<script>
    $(document).ready(function () {
        $(".upload-box").each(function () {
            let $box = $(this);
            let $input = $box.find(".upload-input");
            let $preview = $box.find(".preview");
            let $uploadContent = $box.find(".upload-content");

            // Click anywhere in the box opens file picker
            $box.on("click", function (e) {
                if (!$(e.target).is(".upload-input")) {
                    $input.trigger("click");
                }
            });

            // Handle file change
            $input.on("change", function () {
                if (this.files && this.files[0]) {
                    const file = this.files[0];

                    if (!file.type.startsWith("image/")) {
                        alert("Please select a valid image file (PNG/JPG).");
                        this.value = "";
                        return;
                    }

                    const reader = new FileReader();
                    reader.onload = function (e) {
                        $preview.html(`<img src="${e.target.result}" alt="Preview" style="max-width:100%;max-height:100px;">`);
                        $uploadContent.hide();
                    };
                    reader.readAsDataURL(file);
                }
            });
        });
    });


</script>