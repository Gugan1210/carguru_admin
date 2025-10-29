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
              <select class="form-select w-25 border border-dark p-2 rounded-1" name="car_category" required>
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
                  STATUS <i class="fa-solid fa-circle-info pt-1 ms-2"></i>

                </label>
                <small class="d-flex justify-content-end mb-2 plus-icon"><i class="fa-solid fa-plus text-dark bg-warning rounded-circle cursor-pointer d-flex align-items-center p-1 " id="addStateBtn"></i></small>
                  <select class="form-select w-100 border border-dark p-2 rounded-1 " name="status[0][title][]" required>
                <option value="" disabled selected class="text-dark">Add status</option>
                @foreach ($car_category as $category)
                  <option value="{{ $category->id }}" class="text-dark">{{ $category->name }}</option>
                @endforeach
              </select>
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
<div class="row">
  <div class="mb-5 col">
              <label class="form-label w-100 d-flex  mb-0">
                TOPIC <i class="fa-solid fa-circle-info pt-1 ms-2"></i>
              </label>
                     <small class="d-flex mb-2 plus-icon justify-content-end">
      <i  id="addTopicBtn" class="fa-solid fa-plus text-dark bg-warning rounded-circle cursor-pointer d-flex align-items-center p-1"></i>
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
</div>

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
  let statusindex = 1;
document.addEventListener("DOMContentLoaded", function () {
  let counters = {status: 1,topic: 1,area: 1,specific_area: 1,reasons: 1,allow_capture: 1};
  function enableDynamicAdd(containerId, btnId, inputName, placeholder, mt="",isTextarea = false) {
    const container = document.getElementById(containerId);
    const addBtn = document.getElementById(btnId);
    const uniqueindex = statusindex++;

    if (!addBtn) return;

    addBtn.addEventListener("click", function () {
      const index = counters[inputName]++;
      const newField = document.createElement("div");
      newField.classList.add("d-flex", "gap-2", "mb-2", "position-relative","mt-4");
      let fieldName;
      if (inputName === "status") {
        fieldName = `${inputName}[${index}][title][]`; // special case
      } else {
        fieldName = `${inputName}[${index}][${inputName}][]`; // default
      }

      if (isTextarea) {
        newField.innerHTML = `
          <input name="${fieldName}" class="form-control ${mt}"  placeholder="${placeholder}"></input>
          <button type="button" class="btn-close removeBtn  position-absolute ${mt}"></button>
        `;
      } else {
       newField.innerHTML =
       `
  <select class="form-select  border border-dark p-2 rounded-1 ${mt}" name="${fieldName}" required>
    <option value="">${placeholder}</option>
    @foreach ($car_category as $category)
      <option value="{{ $category->id }}">{{ $category->name }}</option>
    @endforeach
  </select>
  <button type="button" class="btn-close removeBtn ${mt} position-absolute"></button>
`;
      }

      container.appendChild(newField);

      // Remove handler
      newField.querySelector(".removeBtn").addEventListener("click", function () {
        newField.remove();
      });
    });
  }

  // 🔹 For file/image upload with preview
  let textindex = 1;
  function enableDynamicAddFile(containerId, btnId, inputName) {
    const container = document.getElementById(containerId);
    const addBtn = document.getElementById(btnId);

    if (!addBtn) return;

    addBtn.addEventListener("click", function () {
      const currentIndex = textindex++;
      const newBox = document.createElement("div");
      newBox.classList.add("upload-box", "position-relative", "mb-2");

      newBox.innerHTML = `
        <div class="preview mb-1"></div>
        <label>
          <div class="upload-content border p-2 rounded text-center">
            <i class="fa-solid fa-cloud-arrow-up"></i>
            <p class="m-0">Upload Graphic File (30x30px)</p>
            <small>PNG/JPG</small>
          </div>
          <input type="file" name="${inputName}[]" accept="image/png, image/jpeg" hidden>
        </label>
        <button type="button" class="btn btn-sm btn-outline-danger position-absolute top-0 end-0 m-1 removeBtn">-</button>
      `;

      container.appendChild(newBox);

      // remove handler
      newBox.querySelector(".removeBtn").addEventListener("click", function () {
        newBox.remove();
      });

      // preview handler
      const fileInput = newBox.querySelector("input[type='file']");
      const preview = newBox.querySelector(".preview");
      fileInput.addEventListener("change", function () {
        const file = this.files[0];
        if (file) {
          const reader = new FileReader();
          reader.onload = e => {
            preview.innerHTML = `<img src="${e.target.result}" class="img-thumbnail" width="40" height="40">`;
          };
          reader.readAsDataURL(file);
        }
      });
    });
  }

  // old text areas
  enableDynamicAdd("statusContainer", "addStateBtn", "status", "Enter Status","mt-5");
  enableDynamicAdd("topicContainer", "addTopicBtn", "topic", "Enter Topic", "mt-3",true);
  enableDynamicAdd("areaContainer", "addAreaBtn", "area", "Enter Inspection Area","mt-3",true);
  enableDynamicAdd("specificAreaContainer", "addSpecificAreaBtn", "specific_area", "Enter Specific Area", "mt-3",true);
  enableDynamicAdd("reasonContainer", "addReasonBtn", "reasons", "Add Reason","mt-3", true);
  enableDynamicAdd("allowCaptureContainer", "addAllowCaptureBtn", "allow_capture", "Select Format", "mt-3");

  // 🔹 new file/image upload (STATE ICON)
  enableDynamicAddFile("stateIconContainer", "addStateIconBtn", "status_icon");
});
  let uploadCounter = 1;
  let index = 1;
  // Preview helper
  function attachPreview(input, previewId, textId) {
    input.addEventListener("change", function (event) {
      const file = event.target.files[0];
      if (file) {
        const reader = new FileReader();
        reader.onload = function (e) {
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
        $form.on("submit", function (e) {
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

        $(".edit-btn").on("click", function (e) {
            e.preventDefault();

            setFormReadonly(false);

            $(".save-btn").text("Update").prop("disabled", false);

            $(this).prop("disabled", true);
        });

        function setFormReadonly(isReadonly) {
            $form.find("input, select, textarea, button[type='file']").each(function () {
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
    .plus-icon{
        font-size: 10px !important;
    }
    .removeBtn{
        top:-20px !important;
        right:0 !important;
         font-size: 10px !important;
}
label{
    font-size: 13px !important;
}
</style>
@endsection
