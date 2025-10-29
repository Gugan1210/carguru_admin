@extends('layouts.app', [
'activePage' => 'table',
'title' => 'Dynamic Drop Down - Inspection - Admin Panel - CarGuru',
'navName' => 'Table List',
'activeButton' => 'laravel'
])

@section('content')
<style>
  #toast {
    visibility: hidden;
    min-width: 250px;
    background-color: #fcdf3dff;
    color: #000000ff;
    text-align: center;
    border-radius: 5px;
    padding: 16px;
    position: fixed;
    z-index: 1;
    bottom: 30px;
    left: 50%;
    transform: translateX(-50%);
    transition: visibility 0s, opacity 0.5s linear;
  }

  #toast.show {
    visibility: visible;
    opacity: 1;
  }

  .toast-hidden {
    opacity: 0;
  }

  .status-container {
    display: flex;
    gap: 8px;
    align-items: center;
    flex-wrap: wrap;
  }

  .status-badge {
    display: flex;
    align-items: center;
    gap: 6px;
    padding: 6px 8px 6px 6px;
    font-size: 13px;
    font-weight: 500;
    color: black;
    position: relative;
    transition: all 0.2s ease;
    background-color: #f9f7f7;
  }

  /* .status-badge:hover {
            transform: translateY(-1px);
            box-shadow: 0 4px 8px rgba(0,0,0,0.15);
        } */

  .status-badge.pass .status-icon {
    background-color: #22c55e;
  }

  .status-badge.fail .status-icon {
    background-color: #f97316;
  }

  .status-badge.not-available .status-icon {
    background-color: #06b6d4;
  }

  .status-badge.repaired .status-icon {
    background-color: #dc2626;
  }

  .status-badge.replaced .status-icon {
    background-color: #be185d;
  }

  .status-icon {
    width: 16px;
    height: 16px;
    border-radius: 50%;
    background-color: rgba(255, 255, 255, 0.2);
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
    position: relative;
  }

  .status-icon svg {
    width: 10px;
    height: 10px;
    fill: white;
  }

  .close-btn {
    width: 14px;
    height: 14px;
    border: none;
    background: rgba(255, 255, 255, 0.3);
    color: white;
    border-radius: 50%;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 10px;
    margin-left: 2px;
    transition: background-color 0.2s ease;
  }

  .close-btn:hover {
    background: rgba(255, 255, 255, 0.5);
  }

  .status-text {
    white-space: nowrap;
  }
</style>
<div class="page-wrapper">
  <div class="content">
    <h5 class="fw-bold mb-2">CAR MASTER DATA / INSPECTION & CERTIFICATION</h5>
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
    <div class="card">
      <div class="card-header d-flex align-items-center justify-content-between flex-wrap row-gap-3">
        <div class="search-set"></div>
        <div class="page-btn">
          <div class="d-flex justify-content-end gap-2">
            <button type="reset" class="btn btn-warning text-black btn-sm">Reset</button>
            <button type="submit" class="btn btn-warning text-black btn-sm edit-btn" disabled>Edit</button>
          </div>
        </div>
      </div>
      <div id="toast" class="toast-hidden">
        <p id="toast-message"></p>
      </div>
      <div class="card-body p-0">
        <form method="POST" action="{{ route('inspections.store') }}" enctype="multipart/form-data" class="add-inspections-form">
          @csrf
          <div class="container py-4">
            <input type="hidden" name="id" id="record_id">
            <!-- Car Category -->
            <div class="mb-4">
              <label class="form-label fw-bold w-75 mb-4">CAR CATEGORY</label>
              <select class="form-select w-25 border border-dark p-2 rounded-1" id="car_category" name="car_category" required>
                <option value="" disabled selected class="text-dark">Select Car Category</option>
                @foreach ($car_category as $category)
                <option value="{{ $category->id }}" class="text-dark">{{ $category->name }}</option>
                @endforeach
              </select>
            </div>
            <!-- Status -->
            <div class="row g-3 mb-5 ">
              <div class="col-md-3 mt-5 me-5 w-25">
                <label class="form-label w-100 d-flex  mb-2">
                  STATE <i class="fa-solid fa-circle-info pt-1 ms-2"></i>

                </label>
                <small class="d-flex justify-content-end mb-2 plus-icon"><i class="fa-solid fa-plus text-dark bg-warning rounded-circle cursor-pointer d-flex align-items-center p-1 " id="addStateBtn"></i></small>

                <input type="text" name="status[0][title][]" class="form-control w-100 border border-dark" placeholder="Enter State" required>
                <div id="statusContainer"></div>
              </div>

              <!-- State Icon -->

              <div class="col-md-3">
                <div class="d-flex justify-content-between w-100">
                  <label class="form-label w-100">State Icon</label>
                  <small class="d-flex mb-2 plus-icon">
                    <i id="addUploadBox" class="fa-solid fa-plus text-dark bg-warning rounded-circle cursor-pointer d-flex align-items-center  px-1 py-0"></i>
                  </small>
                </div>

                <!-- Default upload box -->
                <div class="upload-box position-relative" id="uploadBox">
                  <label for="upload-default" class="w-100">
                    <div id="text-default">
                      <i class="fa-solid fa-cloud-arrow-up fs-4"></i>
                      <p class="mb-1">Upload Graphic File (27x27px)</p>
                      <small>Drag & drop file here (PNG)</small>
                    </div>
                    <!-- Image Preview -->
                    <img id="preview-default"
                      class="img-fluid d-none position-absolute top-0 start-0 w-100 h-100 object-fit-cover p-1 " />
                    <input type="file" id="upload-default" name="status[0][icon][]" accept="image/png, image/jpeg" hidden>
                  </label>
                </div>

                <!-- Container where new ones go -->
                <div id="uploadContainer"></div>
              </div>
            </div>

            <div class="status-container mb-5">
              @foreach($inspection_statuse as $status)
              @php
              switch($status->text) {
              case 'Pass': $class = 'pass'; break;
              case 'Fail': $class = 'fail'; break;
              case 'Not Available': $class = 'not-available'; break;
              case 'Repaired': $class = 'repaired'; break;
              case 'Replaced': $class = 'replaced'; break;
              default: $class = 'pass';
              }
              @endphp
              <div class="status-badge {{ $class }}" data-id="{{ $status->id }}" id="statusList">
                <div class="status-icon">
                  @if($status->icon)
                    <img src="{{ asset('storage/'.$status->icon) }}" width="27" height="27" />
                  @endif
                </div>
                <span class="status-text">{{ $status->text }}</span>
                <button type="button" class="btn-close remove-status"></button>
              </div>
              @endforeach
            </div>

            <!-- <div class="row">
              <div class="mb-5 col">
                <label class="form-label w-100 d-flex  mb-0">
                  TOPIC <i class="fa-solid fa-circle-info pt-1 ms-2"></i>
                </label>
                <small class="d-flex mb-2 plus-icon justify-content-end">
                  <i id="addTopicBtn" class="fa-solid fa-plus text-dark bg-warning rounded-circle cursor-pointer d-flex align-items-center p-1"></i>
                </small>
                <input type="text" name="topic[0][topic][]" class="form-control w-100" placeholder="Enter Headline Topic">
                <div id="topicContainer"></div>
              </div>
              <div class="col">
                <label class="form-label w-100 d-flex  mb-0">
                  AREA <i class="fa-solid fa-circle-info pt-1 ms-2"></i>
                </label>
                <small class="d-flex mb-2 plus-icon justify-content-end">
                  <i id="addAreaBtn" class="fa-solid fa-plus text-dark bg-warning rounded-circle cursor-pointer d-flex align-items-center p-1"></i>
                </small>
                <input type="text" name="area[0][area][]" class="form-control" placeholder="Enter Inspection Area">
                <div id="areaContainer"></div>
              </div>
              <div class="col">
                <label class="form-label w-100 d-flex  mb-0">
                  SPECIFIC AREA
                  <i class="fa-solid fa-circle-info pt-1 ms-1"></i>
                </label>
                <small class="d-flex mb-2 plus-icon justify-content-end">
                  <i id="addSpecificAreaBtn" class="fa-solid fa-plus text-dark bg-warning rounded-circle cursor-pointer d-flex align-items-center p-1"></i>
                </small>
                <input type="text" name="specific_area[0][specific_area][]" class="form-control" placeholder="Enter Specific Area">
                <div id="specificAreaContainer"></div>
              </div>
              <div class="mb-3 col">
                <label class="form-label w-100 d-flex mb-0">
                  REASONS <i class="fa-solid fa-circle-info pt-1 ms-2"></i>

                </label>
                <small class="d-flex mb-2 plus-icon justify-content-end">
                  <i id="addReasonBtn" class="fa-solid fa-plus text-dark bg-warning rounded-circle cursor-pointer d-flex align-items-center p-1"></i>
                </small>
                <input type="text" name="reasons[0][reasons][]" class="form-control w-100" placeholder="Add Reasons">
                <div id="reasonContainer"></div>
              </div>
              <div class="mb-3 col">
                <label class="form-label w-100 d-flex  mb-0">
                  ALLOW CAPTURE <i class="fa-solid fa-circle-info pt-1 ms-2"></i>
                </label>
                <small class="d-flex mb-2 plus-icon justify-content-end">
                  <i id="addAllowCaptureBtn" class="fa-solid fa-plus text-dark bg-warning rounded-circle cursor-pointer d-flex align-items-center p-1"></i>
                </small>
                <select class="form-select w-100 border border-dark p-2 rounded-1 " name="allow_capture[0][allow_capture][]" required>
                  <option value="" disabled selected class="text-dark fw-bold">Select Format</option>
                  @foreach ($car_category as $category)
                  <option value="{{ $category->id }}" class="text-dark">{{ $category->name }}</option>
                  @endforeach
                </select>
                <div id="allowCaptureContainer"></div>
              </div>
            </div> -->
<!-- ========== Start Topics  ========== -->

<!--
  <div id="topicRowsContainer" class="mt-3">

    <div class="row g-2 align-items-start mb-3 topic-row  p-2 rounded">

      <div class="col">
        <div class="d-flex justify-content-between">
               <label class="form-label w-100 d-flex mb-0">
          TOPIC <i class="fa-solid fa-circle-info pt-1 ms-2"></i>
        </label>
        <small class="mb-2 plus-icon ">

          <i class="fa-solid fa-plus text-dark bg-warning rounded-circle cursor-pointer d-flex align-items-center justify-content-center p-1 add-topic-row"></i>
        </small>
        </div>

        <input type="text" name="topic[0][topic][]" class="form-control border border-dark" placeholder="Enter Headline Topic">
      </div>


      <div class="col">
        <div class="d-flex justify-content-between">
                <label class="form-label w-100 d-flex mb-0">
          AREA <i class="fa-solid fa-circle-info pt-1 ms-2"></i>
        </label>
        <small class="mb-2 plus-icon ">
          <i class="fa-solid fa-plus text-dark bg-warning rounded-circle cursor-pointer d-flex align-items-center justify-content-center p-1 add-field" data-target="area"></i>
        </small>
        </div>

        <div class="field-wrapper">
          <div class="input-group mb-1">
            <input type="text" name="area[0][area][]" class="form-control border border-dark" placeholder="Enter Inspection Area">

          </div>
        </div>
      </div>


      <div class="col">
        <div class="d-flex justify-content-between">
                <label class="form-label w-100 d-flex mb-0">
          SPECIFIC AREA <i class="fa-solid fa-circle-info pt-1 ms-2"></i>
        </label>
        <small class="mb-2 plus-icon ">
          <i class="fa-solid fa-plus text-dark bg-warning rounded-circle cursor-pointer d-flex align-items-center justify-content-center p-1 add-field" data-target="specific_area"></i>
        </small>
        </div>

        <div class="field-wrapper">
          <div class="input-group mb-1">
            <input type="text" name="specific_area[0][specific_area][]" class="form-control border border-dark" placeholder="Enter Specific Area">

      </div>


      <div class="col">
        <div class="d-flex justify-content-between">
              <label class="form-label w-100 d-flex mb-0">
          REASONS <i class="fa-solid fa-circle-info pt-1 ms-2"></i>
        </label>
        <small class="mb-2 plus-icon ">
          <i class="fa-solid fa-plus text-dark bg-warning rounded-circle cursor-pointer d-flex align-items-center justify-content-center p-1 add-field" data-target="reasons"></i>
        </small>
        </div>

        <div class="field-wrapper">
          <div class="input-group mb-1">
            <input type="text" name="reasons[0][reasons][]" class="form-control border border-dark" placeholder="Add Reasons">
          </div>
        </div>
      </div>

      <div class="col">
        <div class="d-flex justify-content-between">
                <label class="form-label w-100 d-flex mb-0">
          ALLOW CAPTURE <i class="fa-solid fa-circle-info pt-1 ms-2"></i>
        </label>
        <small class="mb-2 plus-icon ">
          <i class="fa-solid fa-plus text-dark bg-warning rounded-circle cursor-pointer d-flex align-items-center justify-content-center p-1 add-field" data-target="allow_capture"></i>
        </small>
        </div>

        <div class="field-wrapper">
          <div class="input-group mb-1">
            <select class="form-select border border-dark p-2 rounded-1" name="allow_capture[0][allow_capture][]" required>
              <option value="" disabled selected>Select Format</option>
              @foreach ($car_category as $category)
              <option value="{{ $category->id }}">{{ $category->name }}</option>
              @endforeach
            </select>
          </div>
        </div>
      </div>
    </div>
  </div> -->



<!-- ========== End Topics  ========== -->
<!-- ========== Start New Topics ========== -->
  <div class="container mt-4">
        <div id="topicRowsContainer" class="mt-3">
                <div class="topic-section d-flex gap-2 mb-5" data-topic-index="0">
                <div class="form-row ">
                    <div class="row g-2 align-items-end">
                        <!-- TOPIC -->
                        <div class="col">
                            <div class="field-label">
                                TOPIC
                                <i class="fa-solid fa-circle-info info-icon d-inline-flex align-items-center justify-content-center"></i>
                                <i class="fa-solid fa-plus plus-btn cursor-pointer d-inline-flex align-items-center justify-content-center float-end add-topic-row"></i>
                            </div>
                            <input type="text" name="topic[0][topic]" class="form-control topic-input" placeholder="Enter Headline Topic">
                        </div>
                    </div>
                </div>

                <!-- Areas Container -->
                <div class="areas-container">
                    <div class="area-section nested-row d-flex gap-2 mb-4" data-area-index="0">
                        <div class="form-row ">
                            <div class="row g-2 align-items-end">
                                <!-- AREA -->
                                <div class="col">
                                    <div class="field-label">
                                        AREA
                                        <span class="topic-indicator"></span>
                                        <i class="fa-solid fa-circle-info info-icon d-inline-flex align-items-center justify-content-center"></i>
                                        <i class="fa-solid fa-plus plus-btn cursor-pointer d-inline-flex align-items-center justify-content-center float-end add-area-btn"></i>
                                    </div>
                                    <input type="text" name="area[0][0][area]" class="form-control area-input" placeholder="Enter Inspection Area">
                                </div>
                            </div>
                        </div>

                        <!-- Specific Areas Container -->
                        <div class="specific-areas-container">
                            <div class="specific-area-section level-2 d-flex gap-2 mb-3" data-specific-area-index="0">
                                <div class="form-row">
                                    <div class="row g-2 align-items-end">
                                        <!-- SPECIFIC AREA -->
                                        <div class="col">
                                            <div class="field-label">
                                                SPECIFIC AREA
                                                <span class="area-indicator"></span>
                                                <i class="fa-solid fa-circle-info info-icon d-inline-flex align-items-center justify-content-center"></i>
                                                <i class="fa-solid fa-plus plus-btn cursor-pointer d-inline-flex align-items-center justify-content-center float-end add-specific-area-btn"></i>
                                            </div>
                                            <input type="text" name="specific_area[0][0][0][specific_area]" class="form-control specific-area-input" placeholder="Enter Specific Area">
                                        </div>
                                    </div>
                                </div>

                                <!-- Reasons Container -->
                                <div class="reasons-container">
                                    <div class="reason-section level-3 d-flex gap-2" data-reason-index="0">
                                        <div class="form-row">
                                            <div class="row g-2 align-items-end">
                                                <!-- REASONS -->
                                                <div class="col">
                                                    <div class="field-label">
                                                        REASONS
                                                        <span class="specific-area-indicator"></span>
                                                        <i class="fa-solid fa-circle-info info-icon d-inline-flex align-items-center justify-content-center"></i>
                                                        <i class="fa-solid fa-plus plus-btn cursor-pointer d-inline-flex align-items-center justify-content-center float-end add-reason-btn"></i>
                                                    </div>
                                                    <input type="text" name="reasons[0][0][0][0][reasons]" class="form-control reason-input" placeholder="Add Reasons">
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Allow Capture Container -->
                                        <div class="allow-captures-container">
                                            <div class="allow-capture-section level-4" data-allow-capture-index="0">
                                                <div class="form-row">
                                                    <div class="row g-2 align-items-end">
                                                        <!-- ALLOW CAPTURE -->
                                                        <div class="col">
                                                            <div class="field-label">
                                                                ALLOW CAPTURE
                                                                <span class="reason-indicator"></span>
                                                                <i class="fa-solid fa-circle-info info-icon d-inline-flex align-items-center justify-content-center"></i>
                                                                <i class="fa-solid fa-plus plus-btn cursor-pointer d-inline-flex align-items-center justify-content-center float-end add-allow-capture-btn"></i>
                                                            </div>
                                                            <select class="form-select h-100" name="allow_capture[0][0][0][0][0][allow_capture]" required>
                                                                <option value="" disabled selected>Select Format</option>
                                                                <option value="Single photo">Single photo</option>
                                                                <option value="Multiple photo">Multiple photo</option>
                                                                <option value="Single Video">Single Video</option>
                                                                <option value="Multiple Video">Multiple Video</option>
                                                                <option value="Notes Entry">Notes Entry</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Default First Topic Row -->

        </div>

        <!-- Button to show all form data -->
        <div class="mt-4">
            <!-- <button type="button" class="btn btn-primary" onclick="showFormData()">Show Form Data</button> -->
        </div>
        <div id="formDataDisplay" class="mt-3"></div>
    </div>
  <script>
        const container1 = document.getElementById("topicRowsContainer");
        let topicCounter = 0;

        // Update indicators when inputs change
        container1.addEventListener("input", function(e) {
            if (e.target.classList.contains("topic-input")) {
                const topicSection = e.target.closest(".topic-section");
                const topicName = e.target.value || "Unnamed Topic";
                // topicSection.querySelectorAll(".topic-indicator").forEach(indicator => {
                //     indicator.textContent = `(Topic: ${topicName})`;
                // });
            }

            if (e.target.classList.contains("area-input")) {
                const areaSection = e.target.closest(".area-section");
                const areaName = e.target.value || "Unnamed Area";
                // areaSection.querySelectorAll(".area-indicator").forEach(indicator => {
                //     indicator.textContent = `(Area: ${areaName})`;
                // });
            }

            if (e.target.classList.contains("specific-area-input")) {
                const specificAreaSection = e.target.closest(".specific-area-section");
                const specificAreaName = e.target.value || "Unnamed Specific Area";
                // specificAreaSection.querySelectorAll(".specific-area-indicator").forEach(indicator => {
                //     indicator.textContent = `(Specific Area: ${specificAreaName})`;
                // });
            }

            if (e.target.classList.contains("reason-input")) {
                const reasonSection = e.target.closest(".reason-section");
                const reasonName = e.target.value || "Unnamed Reason";
                // reasonSection.querySelectorAll(".reason-indicator").forEach(indicator => {
                //     indicator.textContent = `(Reason: ${reasonName})`;
                // });
            }
        });

        // Add new topic
        container1.addEventListener("click", function (e) {
            if (e.target.classList.contains("add-topic-row")) {
                topicCounter++;
                const newTopic = container1.querySelector(".topic-section").cloneNode(true);
                newTopic.setAttribute("data-topic-index", topicCounter);

                // Reset and update names
                resetTopicSection(newTopic, topicCounter);

                // Add close button for cloned topics
                const fieldLabel = newTopic.querySelector(".field-label");
                if (!newTopic.querySelector(".remove-topic")) {
                    const closeBtn = document.createElement("i");
                    closeBtn.className = "fa-solid fa-xmark remove-btn cursor-pointer d-inline-flex align-items-center justify-content-center remove-topic";
                    fieldLabel.appendChild(closeBtn);
                }

                container1.appendChild(newTopic);
            }
        });

        // Add new area
        container1.addEventListener("click", function (e) {
            if (e.target.classList.contains("add-area-btn")) {
                const topicSection = e.target.closest(".topic-section");
                const topicIndex = topicSection.getAttribute("data-topic-index");
                const areasContainer = topicSection.querySelector(".areas-container");
                const areaCount = areasContainer.children.length;

                const newArea = areasContainer.querySelector(".area-section").cloneNode(true);
                newArea.setAttribute("data-area-index", areaCount);

                resetAreaSection(newArea, topicIndex, areaCount);
                addRemoveButton(newArea, "remove-area");

                areasContainer.appendChild(newArea);
            }
        });

        // Add new specific area
        container1.addEventListener("click", function (e) {
            if (e.target.classList.contains("add-specific-area-btn")) {
                const areaSection = e.target.closest(".area-section");
                const topicSection = e.target.closest(".topic-section");
                const topicIndex = topicSection.getAttribute("data-topic-index");
                const areaIndex = areaSection.getAttribute("data-area-index");
                const specificAreasContainer = areaSection.querySelector(".specific-areas-container");
                const specificAreaCount = specificAreasContainer.children.length;

                const newSpecificArea = specificAreasContainer.querySelector(".specific-area-section").cloneNode(true);
                newSpecificArea.setAttribute("data-specific-area-index", specificAreaCount);

                resetSpecificAreaSection(newSpecificArea, topicIndex, areaIndex, specificAreaCount);
                addRemoveButton(newSpecificArea, "remove-specific-area");

                specificAreasContainer.appendChild(newSpecificArea);
            }
        });

        // Add new reason
        container1.addEventListener("click", function (e) {
            if (e.target.classList.contains("add-reason-btn")) {
                const specificAreaSection = e.target.closest(".specific-area-section");
                const areaSection = e.target.closest(".area-section");
                const topicSection = e.target.closest(".topic-section");
                const topicIndex = topicSection.getAttribute("data-topic-index");
                const areaIndex = areaSection.getAttribute("data-area-index");
                const specificAreaIndex = specificAreaSection.getAttribute("data-specific-area-index");
                const reasonsContainer = specificAreaSection.querySelector(".reasons-container");
                const reasonCount = reasonsContainer.children.length;

                const newReason = reasonsContainer.querySelector(".reason-section").cloneNode(true);
                newReason.setAttribute("data-reason-index", reasonCount);

                resetReasonSection(newReason, topicIndex, areaIndex, specificAreaIndex, reasonCount);
                addRemoveButton(newReason, "remove-reason");

                reasonsContainer.appendChild(newReason);
            }
        });

        // Add new allow capture
        container1.addEventListener("click", function (e) {
            if (e.target.classList.contains("add-allow-capture-btn")) {
                const reasonSection = e.target.closest(".reason-section");
                const specificAreaSection = e.target.closest(".specific-area-section");
                const areaSection = e.target.closest(".area-section");
                const topicSection = e.target.closest(".topic-section");
                const topicIndex = topicSection.getAttribute("data-topic-index");
                const areaIndex = areaSection.getAttribute("data-area-index");
                const specificAreaIndex = specificAreaSection.getAttribute("data-specific-area-index");
                const reasonIndex = reasonSection.getAttribute("data-reason-index");
                const allowCapturesContainer = reasonSection.querySelector(".allow-captures-container");
                const allowCaptureCount = allowCapturesContainer.children.length;

                const newAllowCapture = allowCapturesContainer.querySelector(".allow-capture-section").cloneNode(true);
                newAllowCapture.setAttribute("data-allow-capture-index", allowCaptureCount);

                resetAllowCaptureSection(newAllowCapture, topicIndex, areaIndex, specificAreaIndex, reasonIndex, allowCaptureCount);
                addRemoveButton(newAllowCapture, "remove-allow-capture");

                allowCapturesContainer.appendChild(newAllowCapture);
            }
        });

        // Remove handlers
        container1.addEventListener("click", function (e) {
            if (e.target.classList.contains("remove-topic")) {
                const topicSection = e.target.closest(".topic-section");
                if (container.children.length > 1) {
                    topicSection.remove();
                } else {
                    alert("At least one topic is required.");
                }
            }

            if (e.target.classList.contains("remove-area")) {
                const areaSection = e.target.closest(".area-section");
                const areasContainer = e.target.closest(".areas-container");
                if (areasContainer.children.length > 1) {
                    areaSection.remove();
                } else {
                    alert("At least one area is required.");
                }
            }

            if (e.target.classList.contains("remove-specific-area")) {
                const specificAreaSection = e.target.closest(".specific-area-section");
                const specificAreasContainer = e.target.closest(".specific-areas-container");
                if (specificAreasContainer.children.length > 1) {
                    specificAreaSection.remove();
                } else {
                    alert("At least one specific area is required.");
                }
            }

            if (e.target.classList.contains("remove-reason")) {
                const reasonSection = e.target.closest(".reason-section");
                const reasonsContainer = e.target.closest(".reasons-container");
                if (reasonsContainer.children.length > 1) {
                    reasonSection.remove();
                } else {
                    alert("At least one reason is required.");
                }
            }

            if (e.target.classList.contains("remove-allow-capture")) {
                const allowCaptureSection = e.target.closest(".allow-capture-section");
                const allowCapturesContainer = e.target.closest(".allow-captures-container");
                if (allowCapturesContainer.children.length > 1) {
                    allowCaptureSection.remove();
                } else {
                    alert("At least one allow capture is required.");
                }
            }
        });

        // Helper functions
        function resetTopicSection(section, topicIndex) {
            const topicInput = section.querySelector('input[name*="topic"]');
            topicInput.name = `topic[${topicIndex}][topic]`;
            topicInput.value = "";

            // Reset areas
            const areas = section.querySelectorAll(".area-section");
            areas.forEach((area, areaIndex) => {
                if (areaIndex > 0) area.remove();
            });

            resetAreaSection(section.querySelector(".area-section"), topicIndex, 0);
        }

        function resetAreaSection(section, topicIndex, areaIndex) {
            const areaInput = section.querySelector('input[name*="area"]');
            areaInput.name = `area[${topicIndex}][${areaIndex}][area]`;
            areaInput.value = "";

            // Reset specific areas
            const specificAreas = section.querySelectorAll(".specific-area-section");
            specificAreas.forEach((specificArea, index) => {
                if (index > 0) specificArea.remove();
            });

            resetSpecificAreaSection(section.querySelector(".specific-area-section"), topicIndex, areaIndex, 0);
        }

        function resetSpecificAreaSection(section, topicIndex, areaIndex, specificAreaIndex) {
            const specificAreaInput = section.querySelector('input[name*="specific_area"]');
            specificAreaInput.name = `specific_area[${topicIndex}][${areaIndex}][${specificAreaIndex}][specific_area]`;
            specificAreaInput.value = "";

            // Reset reasons
            const reasons = section.querySelectorAll(".reason-section");
            reasons.forEach((reason, index) => {
                if (index > 0) reason.remove();
            });

            resetReasonSection(section.querySelector(".reason-section"), topicIndex, areaIndex, specificAreaIndex, 0);
        }

        function resetReasonSection(section, topicIndex, areaIndex, specificAreaIndex, reasonIndex) {
            const reasonInput = section.querySelector('input[name*="reasons"]');
            reasonInput.name = `reasons[${topicIndex}][${areaIndex}][${specificAreaIndex}][${reasonIndex}][reasons]`;
            reasonInput.value = "";

            // Reset allow captures
            const allowCaptures = section.querySelectorAll(".allow-capture-section");
            allowCaptures.forEach((allowCapture, index) => {
                if (index > 0) allowCapture.remove();
            });

            resetAllowCaptureSection(section.querySelector(".allow-capture-section"), topicIndex, areaIndex, specificAreaIndex, reasonIndex, 0);
        }

        function resetAllowCaptureSection(section, topicIndex, areaIndex, specificAreaIndex, reasonIndex, allowCaptureIndex) {
            const allowCaptureSelect = section.querySelector('select[name*="allow_capture"]');
            allowCaptureSelect.name = `allow_capture[${topicIndex}][${areaIndex}][${specificAreaIndex}][${reasonIndex}][${allowCaptureIndex}][allow_capture]`;
            allowCaptureSelect.selectedIndex = 0;
        }

        function addRemoveButton(section, className) {
            const fieldLabel = section.querySelector(".field-label");
            if (!section.querySelector(`.${className}`)) {
                const closeBtn = document.createElement("i");
                closeBtn.className = `fa-solid fa-xmark remove-btn cursor-pointer d-inline-flex align-items-center justify-content-center ${className}`;
                fieldLabel.appendChild(closeBtn);
            }
        }

        // Function to display form data
        function showFormData() {
            const formData = new FormData();
            const inputs = container.querySelectorAll('input, select');

            inputs.forEach(input => {
                if (input.name && input.value) {
                    formData.append(input.name, input.value);
                }
            });

            let output = '<h5>Form Data:</h5><pre>';
            for (let [key, value] of formData.entries()) {
                output += `${key}: ${value}\n`;
            }
            output += '</pre>';

            document.getElementById('formDataDisplay').innerHTML = output;
        }
    </script>
     <style>
        .cursor-pointer { cursor: pointer; }
        .plus-btn {
            background-color: #ffc107;
            color: #000;
            border-radius: 50%;
            width: 24px;
            height: 24px;
            font-size: 12px;
            font-weight: bold;
        }
        /* .info-icon {
            background-color: #6c757d;
            color: white;
            border-radius: 50%;
            width: 20px;
            height: 20px;
            font-size: 10px;
        } */
        .remove-btn {
            background-color: #dc3545;
            color: white;
            border-radius: 50%;
            width: 20px;
            height: 20px;
            font-size: 10px;
            margin-left: 5px;
        }
        /* .form-row {
            display: flex;
            flex-direction: row;
            margin-bottom: 10px;
            padding: 15px;
        } */

        .field-label {
            font-weight: 600;
            font-size: 14px;
            margin-bottom: 5px;
            color: #495057;
        }
        .topic-indicator {
            font-size: 11px;
            color: #6c757d;
            font-style: italic;
        }


    </style>
<!-- ========== End New Topics ========== -->





            <!-- Notes -->
            <!-- <div class="mb-3">
              <label class="form-label w-100 d-flex justify-content-between">
                ADD NOTES OPTION
                <button type="button" id="addNoteBtn" class="btn btn-outline-secondary">
                Add</i>
                </button>
              </label>
              <textarea name="notes[]" class="form-control" rows="3" placeholder="Enter additional notes"></textarea>
              <div id="noteContainer"></div>
            </div> -->

            <!-- Buttons -->
            <div class="col-lg-12">
              <div class="d-flex align-items-center justify-content-end mb-4">
                <a href="{{ route('inspections.index') }}" class="btn btn-secondary me-2">Cancel</a>
                <button type="submit" class="btn btn-primary save-btn">Submit</button>
              </div>
            </div>

          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- ✅ Dynamic Add/Remove JS -->
<script>
  //   let statusindex = 1;
  // document.addEventListener("DOMContentLoaded", function () {
  //   let counters = {status: 1,topic: 1,area: 1,specific_area: 1,reasons: 1,allow_capture: 1};
  //   function enableDynamicAdd(containerId, btnId, inputName, placeholder, mt="",isTextarea = false) {
  //     const container = document.getElementById(containerId);
  //     const addBtn = document.getElementById(btnId);
  //     const uniqueindex = statusindex++;

  //     if (!addBtn) return;

  //     addBtn.addEventListener("click", function () {
  //       const index = counters[inputName]++;
  //       const newField = document.createElement("div");
  //       newField.classList.add("d-flex", "gap-2", "mb-2", "position-relative","mt-4");
  //       let fieldName;
  //       if (inputName === "status") {
  //         fieldName = `${inputName}[${index}][title][]`; // special case
  //       } else {
  //         fieldName = `${inputName}[${index}][${inputName}][]`; // default
  //       }

  //       if (isTextarea) {
  //         newField.innerHTML = `
  //           <input name="${fieldName}" class="form-control ${mt}"  placeholder="${placeholder}"></input>
  //           <button type="button" class="btn-close removeBtn  position-absolute ${mt}"></button>
  //         `;
  //       } else {
  //        newField.innerHTML =
  //        `
  //   <select class="form-select  border border-dark p-2 rounded-1 ${mt}" name="${fieldName}" required>
  //     <option value="">${placeholder}</option>
  //     @foreach ($car_category as $category)
  //       <option value="{{ $category->id }}">{{ $category->name }}</option>
  //     @endforeach
  //   </select>
  //   <button type="button" class="btn-close removeBtn ${mt} position-absolute"></button>
  // `;
  //       }

  //       container.appendChild(newField);

  //       // Remove handler
  //       newField.querySelector(".removeBtn").addEventListener("click", function () {
  //         newField.remove();
  //       });
  //     });
  //   }

  //   // 🔹 For file/image upload with preview
  //   let textindex = 1;
  //   function enableDynamicAddFile(containerId, btnId, inputName) {
  //     const container = document.getElementById(containerId);
  //     const addBtn = document.getElementById(btnId);

  //     if (!addBtn) return;

  //     addBtn.addEventListener("click", function () {
  //       const currentIndex = textindex++;
  //       const newBox = document.createElement("div");
  //       newBox.classList.add("upload-box", "position-relative", "mb-2");

  //       newBox.innerHTML = `
  //         <div class="preview mb-1"></div>
  //         <label>
  //           <div class="upload-content border p-2 rounded text-center">
  //             <i class="fa-solid fa-cloud-arrow-up"></i>
  //             <p class="m-0">Upload Graphic File (30x30px)</p>
  //             <small>PNG/JPG</small>
  //           </div>
  //           <input type="file" name="${inputName}[]" accept="image/png, image/jpeg" hidden>
  //         </label>
  //         <button type="button" class="btn btn-sm btn-outline-danger position-absolute top-0 end-0 m-1 removeBtn">-</button>
  //       `;

  //       container.appendChild(newBox);

  //       // remove handler
  //       newBox.querySelector(".removeBtn").addEventListener("click", function () {
  //         newBox.remove();
  //       });

  //       // preview handler
  //       const fileInput = newBox.querySelector("input[type='file']");
  //       const preview = newBox.querySelector(".preview");
  //       fileInput.addEventListener("change", function () {
  //         const file = this.files[0];
  //         if (file) {
  //           const reader = new FileReader();
  //           reader.onload = e => {
  //             preview.innerHTML = `<img src="${e.target.result}" class="img-thumbnail" width="40" height="40">`;
  //           };
  //           reader.readAsDataURL(file);
  //         }
  //       });
  //     });
  //   }

  //   // old text areas
  //   enableDynamicAdd("statusContainer", "addStateBtn", "status", "Enter Status","mt-5");
  //   enableDynamicAdd("topicContainer", "addTopicBtn", "topic", "Enter Topic", "mt-3",true);
  //   enableDynamicAdd("areaContainer", "addAreaBtn", "area", "Enter Inspection Area","mt-3",true);
  //   enableDynamicAdd("specificAreaContainer", "addSpecificAreaBtn", "specific_area", "Enter Specific Area", "mt-3",true);
  //   enableDynamicAdd("reasonContainer", "addReasonBtn", "reasons", "Add Reason","mt-3", true);
  //   enableDynamicAdd("allowCaptureContainer", "addAllowCaptureBtn", "allow_capture", "Select Format", "mt-3");

  //   // 🔹 new file/image upload (STATE ICON)
  //   enableDynamicAddFile("stateIconContainer", "addStateIconBtn", "status_icon");
  // });

// Topics
const container = document.getElementById("topicRowsContainer");

// Add new full row
container.addEventListener("click", function (e) {
  if (e.target.classList.contains("add-topic-row")) {
    const newRow = container.querySelector(".topic-row").cloneNode(true);

    // Reset inputs/selects
    newRow.querySelectorAll("input").forEach(input => input.value = "");
    newRow.querySelectorAll("select").forEach(select => select.selectedIndex = 0);

    // Reset fields wrapper (keep only the first input group)
    newRow.querySelectorAll(".field-wrapper").forEach(wrapper => {
      wrapper.innerHTML = wrapper.firstElementChild.outerHTML;
    });


// Add close btn only for cloned rows
const label = newRow.querySelector("label");
const infoIcon = label.querySelector(".fa-circle-info");

if (!newRow.querySelector(".remove-row")) {
  const closeBtn = document.createElement("i");
  closeBtn.className = "fa-solid fa-xmark text-danger ms-3 mb-2 cursor-pointer remove-row btn btn-sm btn-outline-danger";

  // insert close AFTER info icon
  infoIcon.insertAdjacentElement("afterend", closeBtn);
}

    container.appendChild(newRow);
  }
});

// Remove entire row (only cloned rows have close button)
container.addEventListener("click", function (e) {
  if (e.target.classList.contains("remove-row")) {
    const row = e.target.closest(".topic-row");
    row.remove();
  }
});

// Add new field for that column
container.addEventListener("click", function (e) {
  if (e.target.classList.contains("add-field")) {
    const fieldWrapper = e.target.closest(".col").querySelector(".field-wrapper");
    const clone = fieldWrapper.firstElementChild.cloneNode(true);

    // Reset input/select
    const input = clone.querySelector("input, select");
    if (input) {
      if (input.tagName === "INPUT") input.value = "";
      if (input.tagName === "SELECT") input.selectedIndex = 0;
    }

    // Add remove button ONLY for cloned fields
    if (!clone.querySelector(".remove-field")) {
      const removeBtn = document.createElement("button");
      removeBtn.type = "button";
      removeBtn.className = "btn btn-sm btn-outline-danger remove-field";
      removeBtn.innerHTML = "&times;";
      clone.appendChild(removeBtn);
    }

    fieldWrapper.appendChild(clone);
  }
});

// Remove individual field (but keep at least one default)
container.addEventListener("click", function (e) {
  if (e.target.classList.contains("remove-field")) {
    const fieldGroup = e.target.closest(".input-group");
    const wrapper = e.target.closest(".field-wrapper");
    if (wrapper.children.length > 1) {
      fieldGroup.remove();
    } else {
      alert("At least one field is required in this section.");
    }
  }
});

//   TOPICS


  document.addEventListener("DOMContentLoaded", function() {
    const counters = {status: 1,topic: 1,area: 1,specific_area: 1,reasons: 1,allow_capture: 1};

    const containerMap = {status: "statusContainer",topic: "topicContainer",area: "areaContainer",specific_area: "specificAreaContainer",reasons: "reasonContainer",allow_capture: "allowCaptureContainer"};

    const placeholderMap = {status: "Enter State",topic: "Enter Topic",area: "Enter Inspection Area",specific_area: "Enter Specific Area",reasons: "Add Reason",allow_capture: "Select Format"};

    const mtMap = {status: "mt-5",topic: "mt-4",area: "mt-4",specific_area: "mt-4",reasons: "mt-4",allow_capture: "mt-4"};

    // -- create input field --
    // function createField(name, placeholder, mt = "") {
    //   const idx = counters[name]++;
    //   const wrapper = document.createElement("div");
    //   wrapper.classList.add("d-flex", "gap-2", "mb-2", "position-relative", mt);

    //   const fieldName = `${name}[${idx}][title][]`;

    //   wrapper.innerHTML = `
    //         <input type="text" name="${fieldName}" class="form-control" placeholder="${placeholder}" required>
    //         <button type="button" class="btn-close removeBtn position-absolute top-0 end-0 m-1"></button>
    //     `;

    //   wrapper.querySelector(".removeBtn").addEventListener("click", function() {
    //     wrapper.remove();
    //     const iconWrapper = document.getElementById(`${name}_icon_${idx}`);
    //     if (iconWrapper) iconWrapper.remove();
    //   });

    //   return wrapper;
    // }

    // // --create icon upload field --
    // function createIconField(name) {
    //   const idx = counters[name] - 1;
    //   const wrapper = document.createElement("div");
    //   wrapper.id = `${name}_icon_${idx}`;
    //   wrapper.classList.add("upload-box", "position-relative", "mt-2");

    //   wrapper.innerHTML = `
    //         <button type="button" class="btn-close position-absolute top-0 end-0 m-2"></button>
    //         <label for="upload-${idx}" class="w-100">
    //             <div id="text-${idx}">
    //                 <i class="fa-solid fa-cloud-arrow-up fs-4"></i>
    //                 <p class="mb-1">Upload Graphic File (27x27px)</p>
    //                 <small>Drag & drop file here (PNG)</small>
    //             </div>
    //             <img id="preview-${idx}" class="img-fluid d-none position-absolute top-0 start-0 w-100 h-100 object-fit-cover p-1" />
    //             <input type="file" id="upload-${idx}" name="status[${idx}][icon][]" accept="image/png, image/jpeg" hidden>
    //         </label>
    //     `;
    //   wrapper.querySelector(".btn-close").addEventListener("click", () => wrapper.remove());
    //   const input = wrapper.querySelector(`#upload-${idx}`);
    //   attachPreview(input, `preview-${idx}`, `text-${idx}`);
    //   return wrapper;
    // }

    function createField(name, placeholder, mt = "") {
    const idx = counters[name]++;
    const wrapper = document.createElement("div");
    wrapper.classList.add("d-flex", "gap-2", "mb-2", "position-relative", mt);

    const fieldName = `${name}[${idx}][title][]`;

    wrapper.innerHTML = `
        <input type="text" name="${fieldName}" class="form-control" placeholder="${placeholder}" required>
        <button type="button" class="btn-close removeBtn position-absolute top-0 end-0 m-1"></button>
    `;

    const inputField = wrapper.querySelector("input");

    wrapper.querySelector(".removeBtn").addEventListener("click", function() {
        wrapper.remove();
        const iconWrapper = document.getElementById(`${name}_icon_${idx}`);
        if (iconWrapper) iconWrapper.remove();
    });

    return { wrapper, inputField, idx };
}

function createIconField(name, linkedInput, idx) {
    //const idx = counters[name] - 1;
    const wrapper = document.createElement("div");
    wrapper.id = `${name}_icon_${idx}`;
    wrapper.classList.add("upload-box", "position-relative", "mt-2");

    wrapper.innerHTML = `
        <button type="button" class="btn-close position-absolute top-0 end-0 m-2"></button>
        <label for="upload-${idx}" class="w-100">
            <div id="text-${idx}">
                <i class="fa-solid fa-cloud-arrow-up fs-4"></i>
                <p class="mb-1">Upload Graphic File (27x27px)</p>
                <small>Drag & drop file here (PNG)</small>
            </div>
            <img id="preview-${idx}" class="img-fluid d-none position-absolute top-0 start-0 w-100 h-100 object-fit-cover p-1" />
            <input type="file" id="upload-${idx}" name="status[${idx}][icon][]" accept="image/png, image/jpeg" hidden>
        </label>
    `;

    const inputFile = wrapper.querySelector(`#upload-${idx}`);
    wrapper.querySelector(".btn-close").addEventListener("click", () => wrapper.remove());

    attachPreview(inputFile, `preview-${idx}`, `text-${idx}`);

    // Directly bind change event to the linked text input
    inputFile.addEventListener("change", function() {
        const title = (linkedInput.value || "").trim();
        if (!title) {
            alert("Please enter a state title before uploading the icon.");
            inputFile.value = "";
            return;
        }
        let idx = 0;
        const wrapper = inputFile.closest(".upload-box");
        if (wrapper && wrapper.id && wrapper.id.includes("status_icon_")) {
            idx = wrapper.id.split("_").pop(); // e.g., "status_icon_1" -> 1
        }
        // prepare FormData and AJAX call here
        const formData = new FormData();
        formData.append("_token", "{{ csrf_token() }}");
        formData.append(`status[${idx}][title][]`, title);
        formData.append(`status[${idx}][icon][]`, inputFile.files[0]);

        // AJAX call...
        $.ajax({
        url: "{{ route('inspections.storestatus') }}",
        type: "POST",
        data: formData,
        processData: false,
        contentType: false,
        success: function(res) {
            if (res.success) {
                const $container = $(".status-container");
                $container.empty();

                res.statuses.forEach(function(status) {
                    const iconHtml = status.icon ? `<img src="/storage/${status.icon}" width="27" height="27" />` : '';
                    const html = `
                        <div class="status-badge" data-id="${status.id}">
                            <div class="status-icon">${iconHtml}</div>
                            <span class="status-text">${status.text}</span>
                            <button type="button" class="btn-close remove-status"></button>
                        </div>
                    `;
                    $container.append(html);
                });

                //$titleInput.val("");
                //$fileInput.val("");
            }
        },
        error: function(xhr) {
            console.error(xhr.responseText);
            alert("Failed to save status");
        }
    });
    });

    return wrapper;
}


    // --Add State + Icon together --
    // document.getElementById("addStateBtn")?.addEventListener("click", function() {
    //   const statusContainer = document.getElementById(containerMap.status);
    //   const uploadContainer = document.getElementById("uploadContainer");

    //   const field = createField("status", placeholderMap.status, mtMap.status);
    //   statusContainer.appendChild(field);

    //   const iconField = createIconField("status");
    //   uploadContainer.appendChild(iconField);
    // });

    document.getElementById("addStateBtn")?.addEventListener("click", function() {
    const statusContainer = document.getElementById(containerMap.status);
    const uploadContainer = document.getElementById("uploadContainer");

    const { wrapper: fieldWrapper, inputField, idx } = createField("status", placeholderMap.status, mtMap.status);
    statusContainer.appendChild(fieldWrapper);

    const iconWrapper = createIconField("status", inputField, idx);
    uploadContainer.appendChild(iconWrapper);
});



    // --Groups --
    const groups = {
      topic: ["topic", "area", "specific_area", "reasons", "allow_capture"],
      area: ["area", "specific_area", "reasons", "allow_capture"],
      specific_area: ["specific_area", "reasons", "allow_capture"],
      reasons: ["reasons", "allow_capture"],
      allow_capture: ["allow_capture"]
    };

    function createGroupField(name, placeholder, mt = "", asSelect = false) {
      const idx = counters[name]++;
      const wrapper = document.createElement("div");
      wrapper.classList.add("d-flex", "gap-2", "mb-2", "position-relative", mt);

      const fieldName = `${name}[${idx}][${name}][]`;

      if (asSelect) {
        wrapper.innerHTML = `
                <select class="form-select border border-dark p-2 rounded-1" name="${fieldName}" required>
                    <option value="">${placeholder}</option>
                    @foreach ($car_category as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
                <button type="button" class="btn-close removeBtn position-absolute top-0 end-0 m-1"></button>
                <small class="d-flex mb-2 plus-icon justify-content-end">
                  <i class="fa-solid fa-plus text-dark bg-warning rounded-circle cursor-pointer position-absolute d-flex align-items-center p-1 addBtn"></i>
                </small>
            `;
      } else {
        wrapper.innerHTML = `

                <input type="text" name="${fieldName}" class="form-control" placeholder="${placeholder}">
                <button type="button" class="btn-close removeBtn position-absolute top-0 end-0 m-1"></button>
                <small class="d-flex mb-2 plus-icon justify-content-end">
                  <i class="fa-solid fa-plus text-dark bg-warning rounded-circle cursor-pointer position-absolute d-flex align-items-center p-1 addBtn"></i>
                </small>
            `;
      }

      wrapper.querySelector(".addBtn").addEventListener("click", function () {
          const container = document.getElementById(containerMap[name]);
          const newField = createGroupField(name, placeholder, mt, asSelect);
          container.appendChild(newField);
      });


      wrapper.querySelector(".removeBtn").addEventListener("click", function() {
        wrapper.remove();
      });

      return wrapper;
    }

    // -- addGroup --
    function addGroup(fromKey) {
      const list = groups[fromKey] || [];

      list.forEach(key => {
        const container = document.getElementById(containerMap[key]);
        if (!container) return;

        // STEP 1: Count divs inside allowCaptureContainer
        const allowCaptureContainer = document.getElementById(containerMap.allow_capture);
        const allowCount = allowCaptureContainer ? allowCaptureContainer.querySelectorAll("div").length : 0;

        // STEP 2: Count divs already in this container
        const containerCount = container.querySelectorAll("div").length;
        const remaining = allowCount - containerCount;

        // STEP 3: Create missing empty wrappers (with height:38px)
        if (remaining > 0) {
          for (let i = 0; i < remaining; i++) {
            const hiddenWrapper = document.createElement("div");
            hiddenWrapper.classList.add("d-flex", "gap-2", "mb-2", "position-relative", "mt-4");
            hiddenWrapper.style.height = "38px";

            hiddenWrapper.innerHTML = `
                    <input type="hidden" name="${key}[${counters[key]}][${key}][]"
                           class="form-control" placeholder="${placeholderMap[key]}">

                `;

            // remove handler
            // hiddenWrapper.querySelector(".removeBtn").addEventListener("click", function () {
            //     hiddenWrapper.remove();
            // });

            container.appendChild(hiddenWrapper);
            counters[key]++;
          }
        }

        // STEP 4: Add actual visible field
        const asSelect = key === "allow_capture";
        const field = createGroupField(key, placeholderMap[key], mtMap[key], asSelect);
        container.appendChild(field);
      });
    }


    document.getElementById("addTopicBtn")?.addEventListener("click", () => addGroup("topic"));
    document.getElementById("addAreaBtn")?.addEventListener("click", () => addGroup("area"));
    document.getElementById("addSpecificAreaBtn")?.addEventListener("click", () => addGroup("specific_area"));
    document.getElementById("addReasonBtn")?.addEventListener("click", () => addGroup("reasons"));
    document.getElementById("addAllowCaptureBtn")?.addEventListener("click", () => addGroup("allow_capture"));
  });





  let uploadCounter = 1;
  let index = 1;
  // Preview helper
  function attachPreview(input, previewId, textId) {
    input.addEventListener("change", function(event) {
      const file = event.target.files[0];
      if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
          const img = document.getElementById(previewId);
          img.src = e.target.result;
          img.classList.remove("d-none");
          document.getElementById(textId).style.display = "none";
        };
        reader.readAsDataURL(file);
      }
    });
  }

  // Attach preview to default box
  attachPreview(
    document.getElementById("upload-default"),
    "preview-default",
    "text-default"
  );
  document.getElementById("addUploadBox").addEventListener("click", function() {
    const newBox = document.createElement("div");
    newBox.className = "upload-box mt-4 position-relative";
    const uniqueId = uploadCounter++;
    const uniqueindex = index++;
    newBox.innerHTML = `
      <button type="button" class="btn-close position-absolute top-0 end-0 m-2"></button>
      <label for="upload-${uniqueId}" class="w-100">
        <div id="text-${uniqueId}">
          <i class="fa-solid fa-cloud-arrow-up fs-4"></i>
          <p class="mb-1">Upload Graphic File (27x27px)</p>
          <small>Drag & drop file here (PNG)</small>
        </div>
        <img id="preview-${uniqueId}"
          class="img-fluid d-none position-absolute top-0 start-0 w-100 h-100 object-fit-cover p-1 " />
        <input type="file" id="upload-${uniqueId}" name="status[${uniqueindex}][icon][]" accept="image/png, image/jpeg" hidden>
      </label>
    `;

    document.getElementById("uploadContainer").appendChild(newBox);

    // Close button removes the box
    newBox.querySelector(".btn-close").addEventListener("click", () => newBox.remove());

    // Attach preview to this new input
    const input = newBox.querySelector(`#upload-${uniqueId}`);
    attachPreview(input, `preview-${uniqueId}`, `text-${uniqueId}`);
  });

  $(document).ready(function() {
    //$(".add-bidding-form").on("submit", function(e) {
    const $form = $(".add-inspections-form");
    $form.on("submit", function(e) {
      e.preventDefault();

      let form = this;
      let formData = new FormData(form);

      // Append CSRF token manually
      formData.append('_token', '{{ csrf_token() }}');
      let recordId = $("#record_id").val();
      let type = recordId ? "POST" : "POST";
      if (recordId) {
        formData.append('_method', 'PUT');
      }
      let url = recordId ? "{{ route('inspections.update', ':id') }}".replace(':id', recordId) : "{{ route('inspections.store') }}";

      $.ajax({
        url: url,
        type: "POST",
        data: formData,
        processData: false,
        contentType: false,
        success: function(response) {
          if (response.success) {

            showToast("", response.message ?? "(ID: " + response.id + ")");
            $(".save-btn").prop("disabled", true);
            $(".edit-btn").prop("disabled", false);
            $("#record_id").val(response.id);

            // refill form with saved values
            fillFormWithData(response.data);
            setFormReadonly(true);
          } else {
            alert("Something went wrong!");
            console.error(response);
          }
        },
        error: function(xhr, status, error) {
          console.error("AJAX Error:", error);
          alert("Error occurred while saving!");
        }
      });
    });

    $(".edit-btn").on("click", function(e) {
      e.preventDefault();

      setFormReadonly(false);

      $(".save-btn").text("Update").prop("disabled", false);

      $(this).prop("disabled", true);
    });

    function setFormReadonly(isReadonly) {
      $form.find("input, select, textarea, button[type='file']").each(function() {
        if ($(this).attr("type") === "hidden") return;
        if (isReadonly) {
          $(this).attr("readonly", true);
          $(this).attr("disabled", true);
        } else {
          $(this).removeAttr("readonly");
          $(this).removeAttr("disabled");
        }
      });

      $("#record_id, input[name='_token']").prop("disabled", false);
    }

    // Function to refill form with saved data
    function fillFormWithData(data) {
      if (data.bid_session_duration)
        $("[name='car_category']").val(data.car_category);
      // Fill + preview status icons
      if (data.status_icon) {
        $("#uploadContainer").empty();
        Object.values(data.status_icon).forEach(group => {
          (group.icon || []).forEach(path => {
            let img = `<img src="/storage/${path}" class="img-thumbnail" width="40">`;
            $("#uploadContainer").append(img);
          });
        });
      }

      console.log("Load status:", data.status);
      console.log("Load topic:", data.topic);
    }
  });

  // Default input and upload
const defaultInput = document.querySelector("input[name='status[0][title][]']");
const defaultUpload = document.getElementById("upload-default");

defaultUpload.addEventListener("change", function() {
    const title = (defaultInput.value || "").trim();
    if (!title) {
        alert("Please enter a state title before uploading the icon.");
        defaultUpload.value = "";
        return;
    }

    const idx = 0; // default input index is 0

    // Prepare FormData
    const formData = new FormData();
    formData.append("_token", "{{ csrf_token() }}");
    formData.append(`status[${idx}][title][]`, title);
    formData.append(`status[${idx}][icon][]`, defaultUpload.files[0]);

    // AJAX call
    $.ajax({
        url: "{{ route('inspections.storestatus') }}",
        type: "POST",
        data: formData,
        processData: false,
        contentType: false,
        success: function(res) {
            if (res.success) {
                const $container = $(".status-container");
                $container.empty();

                res.statuses.forEach(function(status) {
                    const iconHtml = status.icon ? `<img src="/storage/${status.icon}" width="27" height="27" />` : '';
                    const html = `
                        <div class="status-badge" data-id="${status.id}">
                            <div class="status-icon">${iconHtml}</div>
                            <span class="status-text">${status.text}</span>
                            <button type="button" class="btn-close remove-status"></button>
                        </div>
                    `;
                    $container.append(html);
                });

                // Optionally clear default inputs if you want
                // defaultInput.value = "";
                // defaultUpload.value = "";
            }
        },
        error: function(xhr) {
            console.error(xhr.responseText);
            alert("Failed to save status");
        }
    });
});



  $(document).ready(function() {
    $(".remove-status").on("click", function() {
      const badge = $(this).closest(".status-badge");
      const statusId = badge.data("id");

      if (confirm("Are you sure you want to mark this status as 1?")) {
        $.ajax({
          url: "{{ route('inspections.updatestatus') }}",
          type: "POST",
          data: {
            id: statusId,
            _token: "{{ csrf_token() }}"
          },
          success: function(response) {
            if (response.success) {
              badge.remove(); // remove badge from UI
              alert("Status updated successfully!");
            } else {
              alert("Failed to update status.");
            }
          },
          error: function(xhr, status, error) {
            console.error(xhr.responseText);
            alert("An error occurred: " + error);
          }
        });
      }
    });
  });


  function showToast(topic, message) {
    const toast = $('#toast');
    const toastMessage = $('#toast-message');

    // Set the message content
    toastMessage.html(`<p style="color:green;">${topic} ${message}</p>`);

    // Show the toast by adding the 'show' class
    toast.addClass('show').removeClass('toast-hidden');

    // Hide the toast after 2 seconds (2000 milliseconds)
    setTimeout(function() {
      toast.removeClass('show').addClass('toast-hidden');
    }, 10000);
  }
</script>
<style>
  .upload-box {
    max-height: 100px !important;
    padding: 10px;
    width: 100% !important;
    min-height: 100px;
  }

  .plus-icon {
    font-size: 10px !important;
  }

  .removeBtn {
    top: -20px !important;
    right: 0 !important;
    font-size: 10px !important;
  }

  label {
    font-size: 13px !important;
  }
</style>

<script>
document.getElementById('car_category').addEventListener('change', function (e) {
  let category_id = e.target.id;
});
</script>
@endsection
