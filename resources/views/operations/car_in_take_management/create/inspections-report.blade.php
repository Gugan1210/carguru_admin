<div class="wrapper-container">
    <div class="container-main">

        <!-- CAR DOCUMENTS -->
        <div class="accordion-item mb-2">
            <div class="accordion-header" onclick="toggleAccordion(this)">
                <span class="accordion-header-title">Car Documents</span>
                <!-- <i class="fas fa-chevron-down accordion-icon"></i> -->
                <i class="bi bi-caret-down-fill accordion-icon text-dark"></i>
            </div>
            <div class="accordion-body">
                <div class="document-preview">
                    <div class="document-item" onclick="triggerUpload(this)">
                        <input type="file" class="hidden-input" accept="image/*"
                            onchange="handleDocumentUpload(event, this.parentElement)">
                        <div class="upload-placeholder">
                            <i class="fas fa-image"></i>
                            <p>VRC (Front)</p>
                        </div>
                    </div>
                    <div class="document-item" onclick="triggerUpload(this)">
                        <input type="file" class="hidden-input" accept="image/*"
                            onchange="handleDocumentUpload(event, this.parentElement)">
                        <div class="upload-placeholder">
                            <i class="fas fa-image"></i>
                            <p>VRC (Back)</p>
                        </div>
                    </div>
                    <div class="document-item" onclick="triggerUpload(this)">
                        <input type="file" class="hidden-input" accept="image/*"
                            onchange="handleDocumentUpload(event, this.parentElement)">
                        <div class="upload-placeholder">
                            <i class="fas fa-image"></i>
                            <p>Car Keys</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- CAR DETAILS -->
        <div class="accordion-item mb-2 ">
            <div class="accordion-header" onclick="toggleAccordion(this)">
                <span class="accordion-header-title">Car Details</span>
                <!-- <i class="fas fa-chevron-down accordion-icon"></i> -->
                <i class="bi bi-caret-down-fill accordion-icon text-dark"></i>
            </div>
            <div class="accordion-body">
                <div class="form-group-custom">
                    <label>Car Model</label>
                    <input type="text" class="form-control" placeholder="Enter car model">
                </div>
                <div class="form-group-custom">
                    <label>Year</label>
                    <input type="number" class="form-control" placeholder="Enter year">
                </div>
                <div class="form-group-custom">
                    <label>Mileage</label>
                    <input type="number" class="form-control" placeholder="Enter mileage">
                </div>
                <div class="form-group-custom">
                    <label>Fuel Type</label>
                    <select class="form-control">
                        <option>Select fuel type</option>
                        <option>Petrol</option>
                        <option>Diesel</option>
                        <option>Electric</option>
                        <option>Hybrid</option>
                    </select>
                </div>
            </div>
        </div>

        <!-- CAR EXTERIOR VIEW -->
        <div class="accordion-item mb-2 ">
            <div class="accordion-header" onclick="toggleAccordion(this)">
                <span class="accordion-header-title">Car Exterior View</span>
                <!-- <i class="fas fa-chevron-down accordion-icon"></i> -->
                <i class="bi bi-caret-down-fill accordion-icon text-dark"></i>
            </div>
            <div class="accordion-body">

                <!-- Area 1 Sub-Accordion -->
                <div class="sub-accordion-header" onclick="toggleSubAccordion(this)">
                    <span class="sub-accordion-header-title">Area 1</span>
                    <!-- <i class="fas fa-chevron-down sub-accordion-icon"></i> -->
                    <i class="bi bi-caret-down-fill sub-accordion-icon text-dark"></i>
                </div>
                <div class="sub-accordion-body">
                    <div class="form-group-custom">
                        <label>Area 1 Condition</label>
                        <select class="form-control">
                            <option>Select condition</option>
                            <option>Excellent</option>
                            <option>Good</option>
                            <option>Fair</option>
                            <option>Poor</option>
                        </select>
                    </div>
                    <div class="form-group-custom">
                        <label>Area 1 Description</label>
                        <textarea class="form-control" rows="3" placeholder="Describe the condition..."></textarea>
                    </div>
                    <div class="form-group-custom">
                        <label>Upload Photos</label>
                        <div class="document-preview">
                            <div class="document-item" onclick="triggerUpload(this)">
                                <input type="file" class="hidden-input" accept="image/*"
                                    onchange="handleDocumentUpload(event, this.parentElement)">
                                <div class="upload-placeholder">
                                    <i class="fas fa-camera"></i>
                                    <p>Photo 1</p>
                                </div>
                            </div>
                            <div class="document-item" onclick="triggerUpload(this)">
                                <input type="file" class="hidden-input" accept="image/*"
                                    onchange="handleDocumentUpload(event, this.parentElement)">
                                <div class="upload-placeholder">
                                    <i class="fas fa-camera"></i>
                                    <p>Photo 2</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Area 2 Sub-Accordion -->
                <div class="sub-accordion-header" onclick="toggleSubAccordion(this)">
                    <span class="sub-accordion-header-title">Area 2</span>
                    <!-- <i class="fas fa-chevron-down sub-accordion-icon"></i> -->
                    <i class="bi bi-caret-down-fill sub-accordion-icon text-dark"></i>
                </div>
                <div class="sub-accordion-body">
                    <div class="form-group-custom">
                        <label>Area 2 Condition</label>
                        <select class="form-control">
                            <option>Select condition</option>
                            <option>Excellent</option>
                            <option>Good</option>
                            <option>Fair</option>
                            <option>Poor</option>
                        </select>
                    </div>
                    <div class="form-group-custom">
                        <label>Area 2 Description</label>
                        <textarea class="form-control" rows="3" placeholder="Describe the condition..."></textarea>
                    </div>
                    <div class="form-group-custom">
                        <label>Upload Photos</label>
                        <div class="document-preview">
                            <div class="document-item" onclick="triggerUpload(this)">
                                <input type="file" class="hidden-input" accept="image/*"
                                    onchange="handleDocumentUpload(event, this.parentElement)">
                                <div class="upload-placeholder">
                                    <i class="fas fa-camera"></i>
                                    <p>Photo 1</p>
                                </div>
                            </div>
                            <div class="document-item" onclick="triggerUpload(this)">
                                <input type="file" class="hidden-input" accept="image/*"
                                    onchange="handleDocumentUpload(event, this.parentElement)">
                                <div class="upload-placeholder">
                                    <i class="fas fa-camera"></i>
                                    <p>Photo 2</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Body Parts & Bumpers Sub-Accordion -->
                <div class="sub-accordion-header" onclick="toggleSubAccordion(this)">
                    <span class="sub-accordion-header-title">Body Parts & Bumpers</span>
                    <!-- <i class="fas fa-chevron-down sub-accordion-icon"></i> -->
                    <i class="bi bi-caret-down-fill sub-accordion-icon text-dark"></i>
                </div>
                <div class="sub-accordion-body">
                    <!-- Bumper - Front Right -->
                    <div class="form-group-custom d-flex justify-content-between">
                        <label style="font-weight: 500; margin-bottom: 10px;">Bumper - Front
                            Right</label>
                        <div style="display: flex; gap: 15px; align-items: center; margin-bottom: 20px;">
                            <div style="display: flex; align-items: center; gap: 8px;"
                                class="bg-secondary-subtle px-2 py-1">
                                <span
                                    style="background-color: #dc3545; color: white; width: 30px; height: 30px; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-weight: bold;">N/A</span>
                                <span style="font-weight: 500; color: #333;width: 100px;">Not
                                    Available</span>
                            </div>
                            <i class="bi bi-caret-down-fill text-dark"></i>
                        </div>
                    </div>

                    <!-- Bumper - Front Middle -->
                    <div class="form-group-custom d-flex justify-content-between">
                        <label style="font-weight: 500; margin-bottom: 10px;">Bumper - Front
                            Middle</label>
                        <div style="display: flex; gap: 15px; align-items: center; margin-bottom: 20px;">
                            <div style="display: flex; align-items: center; gap: 8px;"
                                class="bg-secondary-subtle px-2 py-1">
                                <span
                                    style="background-color: #28a745; color: white; width: 30px; height: 30px; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-weight: bold;">✓</span>
                                <span style="font-weight: 500; color: #333;width: 100px;">Pass</span>
                            </div>
                            <i class="bi bi-caret-down-fill text-dark"></i>
                        </div>
                    </div>

                    <!-- Bumper - Front Left 1 -->
                    <div class="form-group-custom d-flex justify-content-between">
                        <label style="font-weight: 500; margin-bottom: 10px;">Bumper - Front
                            Left 1</label>
                        <div style="display: flex; gap: 15px; align-items: center; margin-bottom: 20px;">
                            <div style="display: flex; align-items: center; gap: 8px;"
                                class="bg-secondary-subtle px-2 py-1">
                                <span
                                    style="background-color: #9f1d74; color: white; width: 30px; height: 30px; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-weight: bold;">X</span>
                                <span style="font-weight: 500; color: #333;width: 100px;">Fail</span>
                            </div>
                            <i class="bi bi-caret-down-fill text-dark"></i>
                        </div>
                    </div>

                    <!-- Reason Section -->
                    <div style="border-top: 1px solid #dee2e6; padding-top: 15px; margin-top: 15px;">
                        <label
                            style="font-weight: 600; font-size: 13px; margin-bottom: 12px; display: block;">Reason</label>
                        <div style="display: flex; gap: 10px; flex-wrap: wrap;">
                            <label
                                style="display: flex; align-items: center; gap: 8px; cursor: pointer; font-weight: 500; font-size: 13px;">
                                <input type="checkbox" checked
                                    style="cursor: pointer; width: 18px; height: 18px; accent-color: #28a745;">
                                <span class="text-black">Not Align</span>
                            </label>
                            <label
                                style="display: flex; align-items: center; gap: 8px; cursor: pointer; font-weight: 500; font-size: 13px;">
                                <input type="checkbox" checked
                                    style="cursor: pointer; width: 18px; height: 18px; accent-color: #28a745;">
                                <span class="text-black">Paint Peel Out</span>
                            </label>
                            <label
                                style="display: flex; align-items: center; gap: 8px; cursor: pointer; font-weight: 500; font-size: 13px;">
                                <input type="checkbox" checked
                                    style="cursor: pointer; width: 18px; height: 18px; accent-color: #28a745;">
                                <span class="text-black">Scratches</span>
                            </label>
                            <label
                                style="display: flex; align-items: center; gap: 8px; cursor: pointer; font-weight: 500; font-size: 13px;">
                                <input type="checkbox"
                                    style="cursor: pointer; width: 18px; height: 18px; accent-color: #6c757d;">
                                <span class="text-black">Repaint</span>
                            </label>
                        </div>
                    </div>

                    <!-- Images & Videos Section -->
                    <div style="border-top: 1px solid #dee2e6; padding-top: 15px; margin-top: 15px;">
                        <label style="font-weight: 600; font-size: 13px; margin-bottom: 12px; display: block;">Images
                            & Videos</label>
                        <p style="font-size: 12px; color: #666; margin-bottom: 15px;">
                            Pictures (2), Video (0)</p>

                        <div
                            style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 15px;">
                            <!-- Image 1 -->
                            <div class="document-item" onclick="triggerUpload(this)"
                                style="position: relative; border: none;">
                                <input type="file" class="hidden-input" accept="image/*"
                                    onchange="handleDocumentUpload(event, this.parentElement)">
                                <img src="https://via.placeholder.com/250x180?text=Car+Image+1"
                                    style="width: 100%; height: 100%; object-fit: cover; border-radius: 6px;">
                            </div>

                            <!-- Image 2 with Hide Button -->
                            <div style="position: relative;">
                                <div class="document-item" onclick="triggerUpload(this)"
                                    style="position: relative; border: none;">
                                    <input type="file" class="hidden-input" accept="image/*"
                                        onchange="handleDocumentUpload(event, this.parentElement)">
                                    <img src="https://via.placeholder.com/250x180?text=Car+Image+2"
                                        style="width: 100%; height: 100%; object-fit: cover; border-radius: 6px;">
                                    <button onclick="toggleHideImage(this)"
                                        style="position: absolute; top: 10px; right: 10px; background-color: #ffc107; color: #000; border: none; padding: 6px 12px; border-radius: 4px; font-weight: 500; font-size: 12px; cursor: pointer;">Hide</button>
                                </div>
                                <p style="font-size: 11px; color: #dc3545; margin-top: 8px; text-align: center;">
                                    <strong>Note:</strong> For multiple photos, all except
                                    one, can be hide from showing from website. Single photo
                                    cannot be hide.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <!-- CAR INTERIOR VIEW -->
        <div class="accordion-item mb-2">
            <div class="accordion-header" onclick="toggleAccordion(this)">
                <span class="accordion-header-title">Car Interior View</span>
                <!-- <i class="fas fa-chevron-down accordion-icon"></i> -->
                <i class="bi bi-caret-down-fill accordion-icon text-dark"></i>
            </div>
            <div class="accordion-body">
                <div class="form-group-custom">
                    <label>Interior Condition</label>
                    <select class="form-control">
                        <option>Select condition</option>
                        <option>Excellent</option>
                        <option>Good</option>
                        <option>Fair</option>
                        <option>Poor</option>
                    </select>
                </div>
                <div class="form-group-custom">
                    <label>Interior Description</label>
                    <textarea class="form-control" rows="3" placeholder="Describe interior condition..."></textarea>
                </div>
            </div>
        </div>

        <!-- CAR TEST DRIVE -->
        <div class="accordion-item mb-2 ">
            <div class="accordion-header " onclick="toggleAccordion(this)">
                <span class="accordion-header-title">Car Test Drive</span>
                <!-- <i class="fas fa-chevron-down accordion-icon"></i> -->
                <i class="bi bi-caret-down-fill accordion-icon text-dark"></i>
            </div>
            <div class="accordion-body">
                <div class="form-group-custom">
                    <label>Test Drive Notes</label>
                    <textarea class="form-control" rows="3" placeholder="Enter test drive notes..."></textarea>
                </div>
                <div class="form-group-custom">
                    <label>Performance</label>
                    <select class="form-control">
                        <option>Select</option>
                        <option>Excellent</option>
                        <option>Good</option>
                        <option>Fair</option>
                        <option>Poor</option>
                    </select>
                </div>
            </div>
        </div>

    </div>
</div>