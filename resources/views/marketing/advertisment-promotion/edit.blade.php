<?php $page = 'create-cardetails'; ?>
@extends('layouts.app', ['activePage' => 'table', 'title' => 'Create Car Details - Admin Panel - CarGuru', 'navName' => 'Table List', 'activeButton' => 'laravel'])
@section('content')
    <div class="page-wrapper">
        <div class="content">


            @if(session('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            @endif

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

            <!-- Banner Header -->
            <div class="container-fluid bg-light py-2">
                <div id="toast" class="toast-hidden">
                    <p id="toast-message"></p>
                </div>
                <div class="d-flex justify-content-between align-items-center">
                    <h6 class="fw-bold mb-0">ADVERTISING & PROMOTION BANNERS</h6>
                    <div class="d-flex justify-content-start gap-2 mt-0 fs-6">
                        <button id="resetBtn" class="btn btn-warning p-2 h-25">Clear All</button>
                        <button class="btn btn-warning p-2 h-25">
                            <P></P>review
                        </button>
                        <button id="saveBanner" class="btn btn-warning p-2 h-25">Save</button>
                        <!-- <button type="button" class="btn btn-warning d-flex align-items-center"
                                                                                                                                                                                                                                                                                                                                                                                                href="{{ route('advertising-promotion.index') }}">
                                                                                                                                                                                                                                                                                                                                                                                                Close
                                                                                                                                                                                                                                                                                                                                                                                                <span class="ms-1" aria-hidden="true">&times;</span>
                                                                                                                                                                                                                                                                                                                                                                                              </button> -->
                    </div>
                </div>
            </div>

            <div class="container mt-3">
                <div class="row g-3">
                    <!-- Ad Placement -->
                    <div class="col-md-5">
                        <label for="adPlacement" class="form-label">Ad Placement</label>
                        <select id="ad_placement" name="ad_placement" class="form-control select2-ajax"
                            data-placeholder="Select or Add Ad Placement"
                            data-search-url="{{ route('Adplacement.search') }}"
                            data-add-url="{{ route('Adplacement.add') }}"
                            data-selected-id="{{ $ads->getAdPlacement->id ?? '' }}"
                            data-selected-text="{{ $ads->getAdPlacement->name ?? '' }}">
                        </select>
                    </div>

                    <!-- Ad Topic -->
                    <div class="col-md-5">
                        <label for="adTopic" class="form-label">Ad Topic</label>
                        <input type="text" id="ad_topic" name="ad_topic" class="form-control" placeholder="Ad Topic">
                        </select>
                    </div>
                </div>
            </div>

            <div class="container mt-3">
<div class="row">
   <div class="col-12">
            <h6 class="mb-0 fw-bold">MASTER - TOP CRAWLER BANNER</h6>
          </div>

          <div class="col-12">
            <div class="card">
              <div class="card-body">
 <!-- Options -->
            <div class="row g-4 mb-3 align-items-center justify-content-between ">
              <div class="col-md-3">
 <button class="btn btn-warning p-2 h-25 adTypeBtn" data-type="1">Animation</button>
                  <button  class="btn p-2 h-25 adTypeBtn" style="background-color: #e0e0e0;" data-type="0">Static Only</button>
               
              </div>
             
              <div class="col-md-5 ">
                                <div class="d-flex justify-content-start gap-2 mt-0 fs-6">
                                    <button id="pushBanner" class="btn btn-warning p-2 h-25">Push</button>
                                    <button id="deleteButton" class="btn btn-warning p-2 h-25">Delete</button>
                                    <button class="btn btn-warning p-2 h-25">Archive</button>
                                    <button class="btn btn-warning p-2 h-25">Preview</button>

                                    <div id="toggleSwitch" class="toggle-switch off">
                                        <span id="toggleText">Deactivated</span>
                                        <div class="toggle-circle"></div>
                                    </div>
                                    <input type="hidden" id="status" name="status">
                                </div>
                            </div>
            </div>
            <div class="row  mb-3  d-flex align-items-center ">
             
             
              <div class="col-md-10">
               <label for="form-label ">Headline Content Text</label>
               <input type="text" class="form-control" id="headline_content_text" name="headline_content_text" placeholder="FREE INSPECTION + INSURANCE CLAIM CHECK & WARRANTY FOR CAR SELLERS FROM NOW TILL 15 AUGUST 2025!" />
            </div>
            <div class="col-2 ">
               <button  class="btn btn-warning p-2 mt-4 h-25">Modify</button>
            </div>
              </div>
            </div>
          </div>
</div>
</div>
</div>

            <div class="container mt-3">
                <div class="row align-items-center">
                    <!-- Left text -->
                    <div class="col">
                        <h6 class="mb-0 fw-bold">HOME - MAIN BANNER</h6>
                    </div>

                    <!-- Right button -->
                    <div class="col-auto">
                        <!-- New Button with Icon -->
                        <a class="btn btn-outline-dark btn-sm d-flex align-items-center"
                            href="{{ route('advertising-promotion.create') }}">
                            <i class="bi bi-plus me-1"></i> New
                            <i class="bi bi-image ms-2"></i>
                        </a>

                    </div>
                </div>
            </div>

            <!-- Card Section -->
            <div class="mt-0">
                <div class="card">
                    <div class="card-body">

                        <!-- Options -->
                        <div class="row g-2 mb-3 align-items-center ">
                            <div class="col-md-2 input-select">

                                <select id="set" name="set" class="form-select">
                                    <option value="">Select or Add Set</option>
                                    <option value="add">+ Add New</option>
                                </select>
                            </div>
                                   <div class="col-md-2 input-select">

                                <select  name="set" class="form-select">
                                    <option value="">Promo ID</option>
                                    <option value="add">+ Add New</option>
                                </select>
                            </div>
                            <div class="col-md-4 d-flex">
                                <p class="ms-1 mt-3">Banner Link</p>
                                <input type="text" id="banner_url" class="form-control w-50 p-2 h-25 mt-2 m-1"
                                    placeholder="Enter Link to redirect to Promo/Discount Page">
                                <button id="disableBtn" class="btn btn-warning p-2 h-25 mt-2">Modify</button>
                            </div>
                            <!-- <div class="col-md-5 ">
                                <div class="d-flex justify-content-start gap-2 mt-0 fs-6">
                                    <button id="pushBanner" class="btn btn-warning p-2 h-25">Push</button>
                                    <button id="deleteButton" class="btn btn-warning p-2 h-25">Delete</button>
                                    <button class="btn btn-warning p-2 h-25">Archive</button>
                                    <button class="btn btn-warning p-2 h-25">Preview</button>

                                    <div id="toggleSwitch" class="toggle-switch off">
                                        <span id="toggleText">Deactivated</span>
                                        <div class="toggle-circle"></div>
                                    </div>
                                    <input type="hidden" id="status" name="status">
                                </div>
                            </div> -->
                        </div>
                    </div>

                    <!-- Upload Section -->
                    <div class="container mt-5">
                        <div class="row g-5">
                            <!-- Web Version -->
                            <input type="hidden" id="ad_topic_hidden" name="ad_topic_hidden" value="">
                            <input type="hidden" id="ad_placement_hidden" name="ad_placement_hidden" value="">
                            <input type="hidden" id="banner_id_hidden" name="banner_id_hidden" value="">
                            <div class="col-md-8 mt-5 ps-5">
                                <label for="webUpload" class="w-100">
                                    <div id="webBox"
                                        class="d-flex flex-column justify-content-center align-items-center  position-relative"
                                        style="border:2px dashed #ccc; cursor:pointer; min-height:200px;">

                                        <!-- Upload Icon + Text -->
                                        <div id="webText" class="text-center">
                                            <i class="fa-solid fa-cloud-arrow-up fs-2"></i>
                                            <p class="mb-1">Browse File (Front Photo)</p>
                                            <small class="text-muted">Drag & drop file here</small>
                                        </div>

                                        <!-- Image Preview -->
                                        <img id="webPreview"
                                            class="img-fluid d-none position-absolute top-0 start-0 w-100 h-100 object-fit-cover p-1 " />
                                    </div>
                                </label>
                                <small class="d-block">WEB VERSION: 1508 X 480 PIXELS </small>
                                <input type="file" id="webUpload" class="d-none" accept="image/*">
                            </div>

                            <!-- Mobile Version -->
                            <div class="col-md-4 mt-3">
                                <label for="mobileUpload" class="w-75">
                                    <div id="mobileBox"
                                        class="d-flex flex-column justify-content-center align-items-center p-5 position-relative"
                                        style="border:2px dashed #ccc; cursor:pointer; min-height:280px;">

                                        <!-- Upload Icon + Text -->
                                        <div id="mobileText" class="text-center">
                                            <i class="fa-solid fa-cloud-arrow-up fs-2"></i>
                                            <p class="mb-1">Browse File (Mobile Photo)</p>
                                            <small class="text-muted">Drag & drop file here</small>
                                        </div>

                                        <!-- Image Preview -->
                                        <img id="mobilePreview"
                                            class="img-fluid d-none position-absolute top-0 start-0 w-100 h-100 object-fit-cover p-1" />
                                    </div>
                                </label>
                                <small class="d-block">MOBILE VERSION: 480 x 600 PIXELS</small>
                                <input type="file" id="mobileUpload" class="d-none" accept="image/*">
                            </div>
                            <!-- Footer -->
                            <div class="mt-3">
                                <span class="text-muted">AD SET 0</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- Preview Script -->
        <script>
            let adType = '';

            $(document).on("click", ".adTypeBtn", function () {
                adType = $(this).data("type"); // 1 or 0
            });
            let url = window.location.href;
            let match = url.match(/advertising-promotion\/(\d+)\/edit/);
            let id = match ? match[1] : null;
            let adsArray = [];
            $.ajax({
                url: "{{ route('getBannerById') }}",
                type: "GET",
                data: { id: id },
                success: function (response) {
                    console.log(response.ad_topic);
                    $('#ad_topic').val(response.ad_topic);
                    $('#headline_content_text').val(response.headline_content_text);
                    var $ad_topic_hidden = $('#ad_topic_hidden').val(response.ad_topic);
                    var $ad_placement_hidden = $('#ad_placement_hidden').val(response.ad_placement);
                    var $banner_id_hidden = $('#banner_id_hidden').val(response.banner_id);
                    // Reset dropdown
                    if (!adsArray[0]) {
                        adsArray[0] = {
                            ad_placement: response.ad_placement,
                            ad_topic: response.ad_topic,
                            banner_id: response.banner_id,
                            status: response.status == 1 ? "1" : "0",
                            set: []
                        };
                    } else {
                        adsArray[0].set = []; // reset sets for fresh load
                    }
                    let $set = $("#set").empty();
                    $set.append(`<option value="">Select or Add Set</option>`);

                    // If sets exist, add them
                    if (response.set && response.set.length > 0) {
                        response.set.forEach((item, index) => {
                            adsArray[0].set.push({
                                banner_web: item.banner_web || "",
                                banner_mob: item.banner_mob || "",
                                banner_url: item.banner_url || ""
                            });

                            $set.append(`<option value="${index}">Set (${index})</option>`);
                        });
                    }
                    $set.append(`<option value="add">+ Add New</option>`);

                    // Auto-select saved set
                    if (response.selected_set !== undefined) {
                        $("#set").val(response.selected_set).trigger("change");
                    }
                    updateToggle(adsArray[0].status);

                },
                error: function (xhr) {
                    $('#result').html('');
                    if (xhr.responseJSON && xhr.responseJSON.errors) {
                        $.each(xhr.responseJSON.errors, function (key, value) {
                            showToast('Error: ', value);
                        });
                    } else {
                        showToast('Error: ', 'Something went wrong');
                    }
                }
            });

            function updateToggle(status) {
                const toggleSwitch = document.getElementById("toggleSwitch");
                const toggleText = document.getElementById("toggleText");
                const statusInput = document.getElementById("status");

                if (status === "1") {
                    toggleSwitch.classList.remove("off");
                    toggleSwitch.classList.add("on");
                    toggleText.textContent = "Activated";
                    statusInput.value = "1";
                } else {
                    toggleSwitch.classList.remove("on");
                    toggleSwitch.classList.add("off");
                    toggleText.textContent = "Deactivated";
                    statusInput.value = "0";
                }
            }

            $(document).ready(function () {
                // Generic preview function
                function previewImage(event, previewId, textId) {
                    const file = event.target.files[0];
                    if (file) {
                        const reader = new FileReader();
                        reader.onload = function (e) {
                            const img = document.getElementById(previewId);
                            img.src = e.target.result;
                            img.classList.remove("d-none");

                            // Hide upload text but keep box
                            document.getElementById(textId).style.display = "none";
                        }
                        reader.readAsDataURL(file);
                    }
                }

                // Web banner preview
                document.getElementById("webUpload").addEventListener("change", function (event) {
                    previewImage(event, "webPreview", "webText");
                });

                // Mobile banner preview
                document.getElementById("mobileUpload").addEventListener("change", function (event) {
                    previewImage(event, "mobilePreview", "mobileText");
                });

                // Generic preview function disable
                function previewImageDisable(previewId, textId) {

                    const img = document.getElementById(previewId);

                    img.classList.add("d-none");

                    // Hide upload text but keep box
                    document.getElementById(textId).style.display = "block";
                }

                // Generic preview function
                // function previewImageArray(file, previewId, textId) {
                //     if (file) {
                //         const reader = new FileReader();
                //         reader.onload = function (e) {
                //             const img = document.getElementById(previewId);

                //             // Use the result of the FileReader, not the file object itself
                //             img.src = e.target.result;

                //             img.classList.remove("d-none");

                //             // Hide upload text but keep box
                //             document.getElementById(textId).style.display = "none";
                //         }
                //         reader.readAsDataURL(file);
                //     }
                // }
                function previewImageArray(file, previewId, textId) {
                    if (!file) return;

                    const img = document.getElementById(previewId);

                    if (file instanceof File || file instanceof Blob) {
                        // Case 1: File/Blob → use FileReader
                        const reader = new FileReader();
                        reader.onload = function (e) {
                            img.src = e.target.result;
                            img.classList.remove("d-none");
                            document.getElementById(textId).style.display = "none";
                        };
                        reader.readAsDataURL(file);
                    } else if (typeof file === "string") {
                        // Case 2: String URL → set directly
                        let imageUrl = file;

                        if (!/^https?:\/\//.test(file) && !file.startsWith("/")) {
                            imageUrl = "{{ url('storage') }}/" + file.replace(/^images\//, 'images/');
                        }
                        img.src = imageUrl;
                        img.classList.remove("d-none");
                        document.getElementById(textId).style.display = "none";
                    }
                }


                function jsDate(format = "Y-m-d") {
                    let d = new Date();

                    let map = {
                        Y: d.getFullYear(),
                        m: String(d.getMonth() + 1).padStart(2, "0"),
                        d: String(d.getDate()).padStart(2, "0"),
                        H: String(d.getHours()).padStart(2, "0"),
                        i: String(d.getMinutes()).padStart(2, "0"),
                        s: String(d.getSeconds()).padStart(2, "0"),
                    };

                    return format.replace(/[YmdHis]/g, match => map[match]);
                }

                //let adsArray = []; // master array

                $("#set").on("change", function () {
                    let selectedVal = $(this).val();
                    adsArray[0].ad_placement = $("#ad_placement").val();
                    adsArray[0].ad_topic = $("#ad_topic").val();
                    adsArray[0].banner_id = $("#banner_id_hidden").val();
                    adsArray[0].status = $('status').val() || '0';
                    //adsArray[0].set = $('#').val();
                    if (selectedVal === "add") {
                        // clear inputs immediately
                        $("#webUpload").val("");
                        $("#mobileUpload").val("");
                        $("#banner_url").val("");

                        previewImageDisable("webPreview", "webText");
                        previewImageDisable("mobilePreview", "mobileText");

                        //if (adsArray.length === 0) {
                        // create first ad object
                        // adsArray.push({
                        //     ad_placement: $("#ad_placement").val(),
                        //     ad_topic: $("#ad_topic").val(),
                        //     banner_id: jsDate('Ymd') + "-{{ rand(1000, 9999) }}",
                        //     status: $('status').val() || '0',
                        //     set: []
                        // });
                        //}

                        // create placeholder set (empty, will be updated later)
                        adsArray[0].set.push({
                            banner_web: $("#webUpload")[0].files[0] ?? '',
                            banner_mob: $('#mobileUpload')[0].files[0] ?? '',
                            banner_url: $('#banner_url').val() ?? '',
                        });

                        // get new set index
                        let setIndex = adsArray[0].set.length - 1;

                        // add option before "Add New"
                        let newOption = $("<option>", {
                            value: setIndex,
                            text: "Set (" + setIndex + ")"
                        });
                        $("#set option[value='add']").before(newOption);

                        // select the new one
                        $("#set").val(setIndex);

                        console.log("adsArray (placeholder added):", adsArray);
                    } else {
                        // existing set selected → load its files/URL if needed
                        console.log("Selected Set:", selectedVal, adsArray[0].set[selectedVal].banner_web);

                        previewImageArray(adsArray[0].set[selectedVal].banner_mob, "mobilePreview", "mobileText");
                        previewImageArray(adsArray[0].set[selectedVal].banner_web, "webPreview", "webText");
                        $("#banner_url").val(adsArray[0].set[selectedVal].banner_url || "");

                    }
                });

                // Save/Update current set with actual file input values
                $("#pushBanner").on('click', function () {
                    let currentIndex = $("#set").val(); // dropdown value (0, 1, 2...)
                    let adIndex = 0; // if you only have one ad for now

                    if (currentIndex === "add" || adsArray.length === 0) {
                        alert("Please select a valid Set to save.");
                        return;
                    }

                    // Ensure "set" array exists for this ad
                    if (!adsArray[adIndex].set) {
                        adsArray[adIndex].set = [];
                    }



                    // Save or update the chosen set index
                    // Assuming you want to update the first element (index 0)
                    const indexToUpdate = 0;

                    // Check if the index is valid
                    if (adsArray[indexToUpdate]) {
                        adsArray[indexToUpdate].status = $('#status').val() || '0';
                        console.log("Updated adsArray:", adsArray);
                    }
                    adsArray[adIndex].set[currentIndex] = {
                        banner_web: $("#webUpload")[0].files[0] || null,
                        banner_mob: $("#mobileUpload")[0].files[0] || null,
                        banner_url: $("#banner_url").val() || "-"
                    };

                    console.log("adsArray (after save):", adsArray);
                    showToast('', 'Push Completed!');
                });

                // Add a click event listener for the delete button
                $("#deleteButton").on('click', function () {
                    let currentIndex = $("#set").val(); // get the current dropdown value (index to be deleted)
                    let adIndex = 0; // Assuming you have one ad for now

                    // Validate that a set is selected and the index is a valid number
                    if (currentIndex === "add" || isNaN(parseInt(currentIndex))) {
                        alert("Please select a valid Set to delete.");
                        return;
                    }

                    // Check if the set exists before attempting to delete
                    if (adsArray[adIndex] && adsArray[adIndex].set && adsArray[adIndex].set[currentIndex]) {
                        // Use the splice() method to remove the element at the specified index
                        adsArray[adIndex].set.splice(currentIndex, 1);

                        console.log("adsArray (after delete):", adsArray);
                        alert('Set ' + currentIndex + ' has been deleted successfully!');
                    } else {
                        alert("The selected Set does not exist.");
                    }
                });

                $("#saveBanner").on("click", function () {
                    // Use FormData for files
                    adsArray[0].ad_topic = $("#ad_topic").val();
                    adsArray[0].ad_placement = $("#ad_placement").val();
                    adsArray[0].banner_id = $("#banner_id_hidden").val();
                    adsArray[0].status = $("#status").val() || '0';
                    adsArray[0].headline_content_text = $("#headline_content_text").val();

                    // Update currently selected set with file inputs
                    let currentSetIndex = $("#set").val();
                    if (currentSetIndex !== "add") {
                        // Make sure the set array exists
                        if (!adsArray[0].set[currentSetIndex]) {
                            adsArray[0].set[currentSetIndex] = {
                                banner_web: '',
                                banner_mob: '',
                                banner_url: ''
                            };
                        }

                        // Now safely update values
                        adsArray[0].set[currentSetIndex] = {
                            banner_web: $("#webUpload")[0].files[0] || adsArray[0].set[currentSetIndex].banner_web,
                            banner_mob: $("#mobileUpload")[0].files[0] || adsArray[0].set[currentSetIndex].banner_mob,
                            banner_url: $("#banner_url").val() || adsArray[0].set[currentSetIndex].banner_url
                        };
                    }
                    let formData = new FormData(); // include all normal inputs from form

                    // append adsArray manually
                    adsArray.forEach((ad, adIndex) => {
                        formData.append(`ad_placement`, ad.ad_placement);
                        formData.append(`ad_topic`, ad.ad_topic);
                        formData.append(`status`, ad.status);
                        formData.append(`banner_id`, ad.banner_id);
                        formData.append(`headline_content_text`, ad.headline_content_text);
                        formData.append('is_marqee', adType);
                        console.log("ads: ", ad);
                        // Loop sets properly instead of JSON stringify
                        ad.set.forEach((set, setIndex) => {
                            if (set.banner_web instanceof File) {
                                formData.append(`set[${setIndex}][banner_web]`, set.banner_web);
                            } else {
                                formData.append(`set[${setIndex}][banner_web_path]`, set.banner_web); // keep old path
                            }

                            if (set.banner_mob instanceof File) {
                                formData.append(`set[${setIndex}][banner_mob]`, set.banner_mob);
                            } else {
                                formData.append(`set[${setIndex}][banner_mob_path]`, set.banner_mob);
                            }

                            formData.append(`set[${setIndex}][banner_url]`, set.banner_url);
                        });
                    });

                    formData.append('_token', '{{ csrf_token() }}');
                    formData.append('_method', 'PUT');
                    let updateUrl = "{{ route('advertising-promotion.update', ':id') }}";
                    updateUrl = updateUrl.replace(':id', adsArray[0].banner_id);
                    $.ajax({
                        url: updateUrl,
                        type: "POST",
                        data: formData,
                        processData: false, // important for FormData
                        contentType: false, // important for FormData
                        success: function (response) {
                            showToast(response.topic, response.message);
                            document.getElementById("banner_web").value = "";
                            document.getElementById("banner_mob").value = "";
                            document.getElementById("banner_url").value = "";
                        },
                        error: function (xhr) {
                            $('#result').html('');
                            if (xhr.responseJSON && xhr.responseJSON.errors) {
                                $.each(xhr.responseJSON.errors, function (key, value) {
                                    $('#result').append('<p style="color:red;">' + value + '</p>');
                                });
                            } else {
                                $('#result').append('<p style="color:red;">Something went wrong</p>');
                            }
                        }
                    });
                });

                // Reset Button
                document.getElementById("resetBtn").addEventListener("click", function () {
                    let fields = @json(\App\Constants\commonConstant::MARKETING_ADVERTISMENT_PROMOTION_FIELDS);

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
                    previewImageDisable('webPreview', 'webText');
                    previewImageDisable('mobilePreview', 'banner_mob');
                    console.log('Before: ', adsArray);
                    adsArray[{
                        ad_placement: '',
                        ad_topic: '',
                        banner_id: '',
                        status: '',
                        set: []
                    }];
                    console.log('After: ', adsArray);
                });
            });
        </script>


        <style>
            .toggle-switch {
                width: 140px;
                height: 40px;
                font-size: 10px;
                border-radius: 30px;
                display: flex;
                align-items: center;
                justify-content: center;
                font-weight: bold;
                cursor: pointer;
                transition: background-color 0.3s ease;
                position: relative;
            }
.input-select{
  width: 12%;
}
            .toggle-circle {
                width: 20%;
                height: 25px;
                border-radius: 50%;
                background: #fff;
                position: absolute;
                top: 6px;
                transition: left 0.3s ease;
            }

            .off {
                background-color: #e0e0e0;
                color: #6c757d;
            }

            .off .toggle-circle {
                left: 5px;
            }

            .on {
                background-color: #ffc107;
                color: #000;
            }

            .on .toggle-circle {
                left: 100px;
            }
        </style>
        <script>
            $(document).ready(function () {
                const toggleSwitch = document.getElementById("toggleSwitch");
                const toggleText = document.getElementById("toggleText");

                toggleSwitch.addEventListener("click", () => {
                    if (toggleSwitch.classList.contains("off")) {
                        toggleSwitch.classList.remove("off");
                        toggleSwitch.classList.add("on");
                        toggleText.textContent = "Activated";
                        document.getElementById("status").value = "1";
                    } else {
                        toggleSwitch.classList.remove("on");
                        toggleSwitch.classList.add("off");
                        toggleText.textContent = "Deactivated";
                        document.getElementById("status").value = "0";

                    }
                });
            });
        </script>
        <script>
            //Select2 Dropdown
            $(document).ready(function () {
                // Initialize all select2-ajax dropdowns
                // Initialize all select2-ajax dropdowns
                $('.select2-ajax').each(function () {
                    let $el = $(this);

                    dropDown(
                        $el.attr('id'),
                        $el.data('placeholder'),
                        $el.data('search-url'),
                        $el.data('selected-id'),
                        $el.data('selected-text')
                    );
                });

                function dropDown(field_id, placeholder, routePathSearch, selectedId, selectedText) {
                    $('#' + field_id).select2({
                        placeholder: placeholder,
                        minimumInputLength: 0, // allow fetching without typing
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
                            processResults: function (data) {
                                return {
                                    results: data.map(item => ({
                                        id: item.id,
                                        text: item.name
                                    }))
                                };
                            },
                            cache: true
                        }
                    });

                    // 👇 Trigger search when opening (load all by default)
                    $('#' + field_id).on('select2:open', function () {
                        if (!$('#' + field_id).data('select2').results.lastParams) {
                            $('#' + field_id).select2('search', '');
                        }
                    });

                    // 👇 Prefill selected value when editing
                    if (selectedId && selectedText) {
                        let option = new Option(selectedText, selectedId, true, true);
                        $('#' + field_id).append(option).trigger('change');
                    }
                }
            });
        </script>

        <!-- Troast -->
        <script>
            function showToast(topic, message) {
                const toast = $('#toast');
                const toastMessage = $('#toast-message');

                // Set the message content
                toastMessage.html(`<p style="color:green;">${topic} ${message}</p>`);

                // Show the toast by adding the 'show' class
                toast.addClass('show').removeClass('toast-hidden');

                // Hide the toast after 2 seconds (2000 milliseconds)
                setTimeout(function () {
                    toast.removeClass('show').addClass('toast-hidden');
                }, 10000);
            }
        </script>

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
        <script>
            document.addEventListener("DOMContentLoaded", function () {
                let fields = ['banner_url'];

                // Disable everything by default
                fields.forEach(id => {
                    let el = document.getElementById(id);
                    if (el) {
                        el.disabled = true;

                        if ($(el).data('select2')) {
                            $(el).prop("disabled", true).trigger("change");
                        }
                    }
                });

                let logoInput = document.getElementById("brand_logo");
                if (logoInput) logoInput.disabled = true;

                let preview = document.getElementById("preview");
                if (preview) preview.classList.add("disabled");

                let logoView = document.getElementById("logoView");
                if (logoView) logoView.classList.add("disabled");

                // On button click → remove disabled
                document.getElementById("disableBtn").addEventListener("click", function () {
                    fields.forEach(id => {
                        let el = document.getElementById(id);
                        if (el) {
                            el.disabled = false;

                            if ($(el).data('select2')) {
                                $(el).prop("disabled", false).trigger("change");
                            }
                        }
                    });

                    if (logoInput) logoInput.disabled = false;
                    if (preview) preview.classList.remove("disabled");
                    if (logoView) logoView.classList.remove("disabled");
                });
            });
        </script>


@endsection