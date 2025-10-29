<?php $page = 'edit-role'; ?>
@extends('layouts.app', ['activePage' => 'table', 'title' => 'Create Role - Admin Panel - CarGuru', 'navName' => 'Table List', 'activeButton' => 'laravel'])
@section('content')
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap');

        :root {
            --bg-color: #f6f7f9;
            --card-bg: #ffffff;
            --border-color: #e0e0e0;
            --text-color: #555;
            --label-color: #999;
            --button-bg: #eee;
            --primary-color: #3f51b5;
            --green-circle: #55a55a;
            --orange-circle: #ffa500;
            --red-circle: #ef5350;
        }

        * {
            box-sizing: border-box;
            font-family: 'Roboto', sans-serif;
        }

        .main-container {
            max-width: 1000px;
            margin: auto;
            background-color: var(--card-bg);
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
        }

        h2 {
            font-size: 16px;
            font-weight: 500;
            margin-top: 0;
            margin-bottom: 20px;
            color: #333;
        }

        .header-buttons {
            display: flex;
            justify-content: flex-end;
            gap: 10px;
            margin-bottom: 20px;
        }

        .header-buttons button {
            padding: 8px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-weight: 500;
            font-size: 14px;
        }

        .save-btn {
            background-color: #f0f0f0;
        }

        .next-btn {
            background-color: var(--primary-color);
            color: white;
        }

        .section-container {
            border-bottom: 1px solid var(--border-color);
            padding: 20px 0;
        }

        .section-container:last-of-type {
            border-bottom: none;
        }

        .info-icon {
            font-size: 12px;
            vertical-align: top;
            color: var(--label-color);
            cursor: pointer;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-size: 12px;
            color: var(--label-color);
        }

        input[type="text"],
        input[type="time"],
        select {
            width: 125px;
            padding: 8px;
            border: 1px solid var(--border-color);
            border-radius: 4px;
            font-size: 14px;
            color: var(--text-color);
        }

        .input-units {
            display: flex;
            align-items: center;
            gap: 5px;
            position: relative;
            width: 180px;
        }

        .input-units input,
        .input-units select {
            flex: 1;
        }

        .input-units span {
            font-size: 12px;
            color: var(--label-color);
            white-space: nowrap;
        }

        .remove-btn-sm {
            background: transparent;
            border: none;
            font-size: 20px;
            color: var(--text-color);
            cursor: pointer;
            position: absolute;
            right: -25px;
            top: 50%;
            transform: translateY(-50%);
        }

        .two-column-grid {
            display: flex;
            grid-template-columns: 1fr 1fr;
            gap: 30px;
        }

        .bid-increment-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 30px;
        }

        .section-heading label {
            font-size: 14px;
            font-weight: bold;
            color: #333;
            margin-bottom: 10px;
        }

        .bid-range .section-heading label,
        .bid-amount .section-heading label {
            display: inline-block;
            font-size: 14px;
            color: #333;
        }

        .input-row-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 15px;
            margin-bottom: 15px;
        }

        .amount-grid {
            display: flex;
            grid-template-columns: repeat(2, 1fr);
            gap: 10px;
        }

        .amount-btn {
            padding: 12px 10px;
            border: 1px solid var(--border-color);
            border-radius: 4px;
            background-color: var(--button-bg);
            cursor: pointer;
            font-weight: 500;
        }

        .note {
            font-size: 10px;
            color: var(--label-color);
            margin-top: 15px;
            text-align: end;
        }

        .timing-grid {
            display: flex;
            grid-template-columns: 1fr 1fr;
            gap: 30px;
        }

        .countdown-grid {
            display: flex;
            grid-template-columns: 1fr 1fr 1fr;
            gap: 30px;
        }

        .circle-progress {
            width: 60px;
            height: 60px !important;
            border-radius: 50%;
            margin-top: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 500;
            color: white;
            background-color: var(--bg-color);
            background-position: center;
            background-size: cover;
        }

        .green-circle {
            background-image: conic-gradient(var(--green-circle) 100%, var(--border-color) 0%);
        }

        .orange-circle {
            background-image: conic-gradient(var(--orange-circle) 100%, var(--border-color) 0%);
        }

        .red-circle {
            background-image: conic-gradient(var(--red-circle) 100%, var(--border-color) 0%);
        }

        .bid-schedule-row-grid {
            display: flex;
            grid-template-columns: repeat(4, 1fr);
            gap: 25px;
            margin-bottom: 20px;
        }

        .add-session-btn {
            padding: 10px 15px;
            border: 1px solid var(--border-color);
            border-radius: 4px;
            background-color: var(--card-bg);
            cursor: pointer;
            font-weight: 500;
            color: var(--primary-color);
            margin-top: 10px;
        }

        .circle-icon {
            position: relative;
            display: inline-block;
        }

        .circle-text {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            font-size: 10px;
            color: white;
        }

        .input-wrapper {
            position: relative;
            /*width: 150px; */
        }

        .input-wrapper input {
            width: 100%;
            padding-right: 50px;
            box-sizing: border-box;
        }

        .input-wrapper .unit {
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
            color: #555;
            font-size: 14px;
            pointer-events: none;
        }

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

        .select2-container--default .select2-selection--multiple .select2-selection__choice {
            background-color: #fe9f43 !important;
            border-color: #fe9f43 !important;

        }

        .select2-container--default .select2-selection--multiple .select2-selection__choice__remove {
            background-color: #fe9f43 !important;
            border-color: #fe9f43 !important;
        }
    </style>
    <style>
        .upload-box {
            border: 2px dashed #ccc;
            border-radius: 8px;
            text-align: center;
            padding: 25px 10px;
            cursor: pointer;
            color: #888;
            transition: border-color 0.3s, color 0.3s;
        }

        .upload-box:hover {
            border-color: #007bff;
            color: #007bff;
        }

        .upload-box input[type="file"] {
            display: none;
        }

        .upload-icon {
            font-size: 28px;
            color: #ccc;
        }

        .upload-box img {
            max-height: 60px;
            margin-top: 5px;
            display: none;
            border-radius: 5px;
        }
    </style>
    <div class="page-wrapper">
        <div class="content">
            <div class="page-header">
                <div class="add-item d-flex">
                    <div class="page-title">
                        <h4 class="fw-bold">CAR MASTER DATA / BIDDING</h4>
                        <h6>Create Bidding</h6>

                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-center">
                <img src="{{URL::asset('build/img/bidding-banner.png')}}" alt="Img">
            </div>
            @session('success')
                <div class="alert alert-success" role="alert" id="success-alert">
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
            <div id="toast" class="toast-hidden">
                <p id="toast-message"></p>
            </div>
            <form method="POST" action="{{ route('bidding.store') }}" class="add-bidding-form"
                enctype="multipart/form-data">
                @csrf
                <div class="add-product">
                    <div class="accordions-items-seperate" id="accordionSpacingExample">
                        <div class="accordion-item border mb-4">
                            <div id="SpacingOne" class="accordion-collapse collapse show"
                                aria-labelledby="headingSpacingOne">
                                <div class="accordion-body border-top">

                                    <div class="header-buttons">
                                        <button type="submit" class="btn btn-warning h-25 edit-btn" disabled>Edit</button>
                                        <button type="submit" class="btn btn-warning h-25 save-btn">Save</button>
                                    </div>
                                    <input type="hidden" name="id" id="record_id">

                                    <div class="section-container">
                                        <h2>Bid Increment <span class="info-icon"><span class="circle-icon">
                                                    <i class="fa-solid fa-circle text-dark"></i>
                                                    <span class="circle-text">i</span>
                                                </span>
                                            </span></h2>
                                        <div class="bid-increment-grid">
                                            <div class="bid-range">
                                                <div class="section-heading">
                                                    <label>Range of Reserved Price<span class="circle-icon add-row">
                                                            <i class="fa-solid fa-circle text-warning"></i>
                                                            <span class="circle-text text-dark">+</span></label>
                                                </div>
                                                <div class="range-container">
                                                    <div class="input-row-grid" data-pair-id="0">
                                                        <div class="input-group" style="display: grid">
                                                            <label>From</label>
                                                            <input type="text" name="bid_increment[0][from]"
                                                                placeholder="Enter From" style="width: 100%;">
                                                        </div>
                                                        <div class="input-group" style="display: grid">
                                                            <label>To</label>
                                                            <input type="text" id="range_to" name="bid_increment[0][to]"
                                                                placeholder="Enter To" style="width: 100%;">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="morethen-range-container">
                                                    <div class="input-row-grid" data-pair-id="0">
                                                        <div class="input-group" style="display: grid">
                                                            <label>More Than</label>
                                                            <input type="text" id="moreThan"
                                                                name="bid_increment[0][more_than]" placeholder="Enter From"
                                                                style="width: 100%;">
                                                        </div>
                                                        <div class="input-group" style="display: grid"></div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="bid-amount">
                                                <div class="section-heading">
                                                    <label>Increment Amount</label>
                                                </div>
                                                <label for="">Amount</label>
                                                <div class="amount-container">
                                                    <div class="amount-grid">

                                                        <input type="text" name="bid_increment[0][amount][]"
                                                            placeholder="Enter Amount">
                                                        <input type="text" name="bid_increment[0][amount][]"
                                                            placeholder="Enter Amount">
                                                        <input type="text" name="bid_increment[0][amount][]"
                                                            placeholder="Enter Amount">
                                                        <input type="text" name="bid_increment[0][amount][]"
                                                            placeholder="Enter Amount">
                                                    </div>
                                                </div>
                                                <div class="amount-container mt-4">
                                                    <div class="amount-grid">
                                                        <input type="text" name="bid_increment[0][more_than_amount][]"
                                                            placeholder="Enter Amount">
                                                        <input type="text" name="bid_increment[0][more_than_amount][]"
                                                            placeholder="Enter Amount">
                                                        <input type="text" name="bid_increment[0][more_than_amount][]"
                                                            placeholder="Enter Amount">
                                                        <input type="text" name="bid_increment[0][more_than_amount][]"
                                                            placeholder="Enter Amount">
                                                    </div>
                                                </div>
                                                <p class="note">Note: Leave blank for amount if not applicable.<br>Decrease
                                                    button appears based on visible amounts.</p>

                                            </div>
                                        </div>
                                    </div>

                                    <div class="section-container">
                                        <h2>Timing <span class="info-icon"><span class="circle-icon">
                                                    <i class="fa-solid fa-circle" style="color: black;"></i>
                                                    <span class="circle-text">i</span></span></h2>
                                        <div class="timing-grid">
                                            <div>
                                                <label>Bid Session Duration</label>
                                                <div class="input-wrapper">
                                                    <input type="text" name="bid_session_duration"
                                                        placeholder="Enter minutes">
                                                    <span class="unit">minutes</span>
                                                </div>
                                            </div>
                                            <div>
                                                <label>Timing After Each Bid</label>
                                                <div class="input-wrapper">
                                                    <input type="text" name="timing_each_bid" placeholder="Enter seconds">
                                                    <span class="unit">seconds</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="section-container">
                                        <h2>Countdown Activation
                                        </h2>
                                        <div class="countdown-grid" id="countdownGrid">
                                            <div class="countdown-row" data-interval="First">
                                                <label>First Interval</label>
                                                <div class="input-wrapper">
                                                    <input type="text" name="countdown_first_interval"
                                                        placeholder="Enter seconds">
                                                    <span class="unit">seconds</span>
                                                </div>
                                                <div class="circle-progress green-circle">1m</div>
                                            </div>
                                            <div class="countdown-row" data-interval="Second">
                                                <label>Second Interval</label>
                                                <div class="input-wrapper">
                                                    <input type="text" name="countdown_second_interval"
                                                        placeholder="Enter seconds">
                                                    <span class="unit">seconds</span>
                                                </div>
                                                <div class="circle-progress orange-circle">30s</div>
                                            </div>
                                            <div class="countdown-row" data-interval="Third">
                                                <label>Third Interval</label>
                                                <div class="input-wrapper">
                                                    <input type="text" name="countdown_third_interval"
                                                        placeholder="Enter seconds">
                                                    <span class="unit">seconds</span>
                                                </div>
                                                <div class="circle-progress red-circle">10s</div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="section-container">
                                        <div class="two-column-grid">
                                            <div class="column-left">
                                                <h2>Preview Before Bid <span class="info-icon"><span class="circle-icon">
                                                            <i class="fa-solid fa-circle" style="color: black;"></i>
                                                            <span class="circle-text">i</span></span></h2>
                                                <label>Length of time after Bid is approved</label>
                                                <div class="input-units">
                                                    <select name="preview_before_bid">
                                                        <option value="24 Hours">24 Hours</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="column-right">
                                                <h2>Cooling Period for Bid <span class="info-icon"><span
                                                            class="circle-icon">
                                                            <i class="fa-solid fa-circle" style="color: black;"></i>
                                                            <span class="circle-text">i</span></span></h2>
                                                <label>Only Bid After</label>
                                                <div class="input-units">
                                                    <select name="cooling_period">
                                                        <option value="12 Hours">12 Hours</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="section-container">
                                        <div class="two-column-grid">
                                            <div class="column-left">
                                                <h2>Resbid Scheduling <span class="info-icon"><span class="circle-icon">
                                                            <i class="fa-solid fa-circle" style="color: black;"></i>
                                                            <span class="circle-text">i</span></span></h2>
                                                <label>After Number of Bid Sessions</label>
                                                <div class="input-wrapper">
                                                    <input type="text" name="resbid_bid_session" placeholder="Enter Number">
                                                </div>
                                            </div>
                                            <div class="column-left" style="margin-top: 39px;">
                                                <label>Rebids Attempts Allowed</label>
                                                <div class="input-wrapper">
                                                    <input type="text" name="resbid_attempts" placeholder="Enter Number">
                                                </div>
                                            </div>
                                            <div class="column-right">
                                                <h2>Resbid Value <span class="info-icon"><span class="circle-icon">
                                                            <i class="fa-solid fa-circle" style="color: black;"></i>
                                                            <span class="circle-text">i</span></span></h2>
                                                <label>Reserved Price Reduction</label>
                                                <div class="input-wrapper">
                                                    <input type="text" name="resbid_price_reduction"
                                                        placeholder="Enter Value">
                                                    <span class="unit">%</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="section-container">
                                        <h2>Bid Schedule <span class="info-icon"><span class="circle-icon">
                                                    <i class="fa-solid fa-circle" style="color: black;"></i>
                                                    <span class="circle-text">i</span></span>
                                                <span>Add Session<span class="circle-icon add-schedule-btn">
                                                        <i class="fa-solid fa-circle text-warning"></i>
                                                        <span class="circle-text text-dark">+</span></span></h2>
                                        <div id="bid-schedule-container" class="p-2 overflow-auto"
                                            style="white-space:nowrap;">
                                            <div class="bid-schedule-row-grid" data-index="0">
                                                <div class="schedule-item">
                                                    <label>From (day)</label>
                                                    <div class="input-units">
                                                        <select name="bid_schedule[0][from_day]">
                                                            <option value="Monday">Monday</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="schedule-item">
                                                    <label>To (day)</label>
                                                    <div class="input-units">
                                                        <select name="bid_schedule[0][to_day]">
                                                            <option value="Friday">Friday</option>
                                                        </select>
                                                        <button class="remove-btn-sm remove-row">&times;</button>
                                                    </div>
                                                </div>
                                                <div class="schedule-item sessions-container">
                                                    <label>Start Session<span class="circle-icon add-startsession-btn">
                                                            <i class="fa-solid fa-circle text-warning"></i>
                                                            <span class="circle-text text-dark">+</span></label>
                                                    <div class="input-units">
                                                        <input type="time" name="bid_schedule[0][sessions][]">
                                                        <button class="remove-btn-sm remove-session-btn">&times;</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="container mt-4">
                                        <h6 class="mb-3 d-flex align-items-center">
                                            <b>BID STATUS STATEMENT</b>
                                            <span id="add-bid-row" class="badge bg-warning text-dark ms-2"
                                                style="cursor:pointer;">+</span>
                                        </h6>

                                        <div id="bid-status-wrapper">
                                            <div class="row mb-3 bid-row align-items-center">
                                                <div class="col-md-2">
                                                    <select class="form-select status" name="status[]">
                                                        <option value="">Select Status</option>
                                                        @foreach ($statusData as $status)
                                                            <option value="{{ $status->id }}">{{ $status->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-md-2">
                                                    <select class="form-select statement" name="statement[]">
                                                        <option value="">Select Statement</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-2"></div>
                                                <div class="col-md-2"></div>
                                                <div class="col-md-3">
                                                    <label class="upload-box">
                                                        <div class="upload-icon">☁️</div>
                                                        <div>Upload Icon<br><small>Drag & drop to here</small></div>
                                                        <input type="file" class="upload-input" name="upload[]"
                                                            accept="image/*">
                                                        <img class="preview" alt="">
                                                    </label>
                                                </div>
                                                <div class="col-md-1 d-flex align-items-center">
                                                    <button type="button" class="btn remove-row d-none">X</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="section-container">
                                        <h2>CAR DEPOSIT <span class="info-icon"><span class="circle-icon">
                                                    <i class="fa-solid fa-circle" style="color: black;"></i>
                                                    <span class="circle-text">i</span></span></h2>
                                        <div class="timing-grid">
                                            <div>
                                                <label>High Rish Car</label>
                                                <div class="input-wrapper" style="width: 200px;">
                                                    <select id="carmake" name="carmake[]"
                                                        class="form-select border border-dark rounded-1 pe-5 custom-select select2-ajax"
                                                        data-placeholder="Select Car Make"
                                                        data-search-url="{{ route('bidding.search') }}" multiple>
                                                    </select>
                                                </div>
                                            </div>
                                            <div>
                                                <label>Deposit Upfront Required</label>
                                                <div class="input-wrapper">
                                                    <input type="text" name="deposite_value" placeholder="Enter Value">
                                                    <span class="unit">%</span>
                                                </div>
                                            </div>
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
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const addBtn = document.querySelector(".add-row");
            const rangeContainer = document.querySelector(".range-container");
            const amountContainer = document.querySelector(".amount-container");
            const rangeTo = document.querySelector(".input-group");

            let index = 1;

            function parseNumber(val) {
                return parseInt(val.replace(/,/g, ""), 10);
            }
            // Helper: format number with commas "10000" → "10,000"
            function formatNumber(num) {
                return num.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
            }

            document.addEventListener("DOMContentLoaded", function () {
                const rangeTo = document.getElementById("range_to");
                const moreThan = document.getElementById("moreThan");

                if (!rangeTo || !moreThan) return;

                rangeTo.addEventListener("input", function () {
                    // remove commas and extra spaces
                    const raw = rangeTo.value.replace(/,/g, "").trim();
                    const num = parseInt(raw, 10);

                    if (!isNaN(num)) {
                        // update instantly
                        const next = num + 1;
                        moreThan.value = next.toLocaleString("en-MY"); // format with commas
                    } else {
                        moreThan.value = "";
                    }
                });
            });

            addBtn.addEventListener("click", function () {
                const lastToInput = rangeContainer.querySelector(".input-row-grid:last-child input[name*='[to]']");
                let nextFromValue = "";
                if (lastToInput && lastToInput.value !== "") {
                    //nextFromValue = parseInt(lastToInput.value) + 1;
                    const parsed = parseNumber(lastToInput.value);
                    if (!isNaN(parsed)) {
                        nextFromValue = formatNumber(parsed + 1);
                        $('#moreThan').val(formatNumber(parsed + 1));
                    }
                }
                // Create Range Row (NO remove button here)
                const rangeRow = document.createElement("div");
                rangeRow.classList.add("input-row-grid");
                rangeRow.innerHTML = `
                                                                                                                                                                                                                                                                                                                                <div class="input-group" style="display: grid">
                                                                                                                                                                                                                                                                                                                                    <input type="text" name="bid_increment[${index}][from]" value="${nextFromValue}" placeholder="Enter From" style="width: 100%;">
                                                                                                                                                                                                                                                                                                                                </div>
                                                                                                                                                                                                                                                                                                                                <div class="input-group" style="display: grid">
                                                                                                                                                                                                                                                                                                                                    <input type="text" name="bid_increment[${index}][to]" placeholder="Enter To" style="width: 100%;">
                                                                                                                                                                                                                                                                                                                                </div>
                                                                                                                                                                                                                                                                                                                                `;
                rangeContainer.appendChild(rangeRow);

                // Create Amount Row (remove button goes here after inputs)
                const amountRow = document.createElement("div");
                amountRow.classList.add("amount-grid");
                amountRow.style.marginTop = "15px";
                amountRow.innerHTML = `
                                                                                                                                                                                                                                                                                                                                <input type="text" name="bid_increment[${index}][amount][]" placeholder="Enter Amount">
                                                                                                                                                                                                                                                                                                                                <input type="text" name="bid_increment[${index}][amount][]" placeholder="Enter Amount">
                                                                                                                                                                                                                                                                                                                                <input type="text" name="bid_increment[${index}][amount][]" placeholder="Enter Amount">
                                                                                                                                                                                                                                                                                                                                <input type="text" name="bid_increment[${index}][amount][]" placeholder="Enter Amount">
                                                                                                                                                                                                                                                                                                                                <span class="remove-row">x</span>
                                                                                                                                                                                                                                                                                                                                `;
                amountContainer.appendChild(amountRow);
                index++;
                // Link rows together with same pairId
                rangeRow.dataset.pairId = Date.now();
                amountRow.dataset.pairId = rangeRow.dataset.pairId;
            });

            // Remove both rows when "x" is clicked
            document.addEventListener("click", function (e) {
                if (e.target.classList.contains("remove-row")) {
                    const pairId = e.target.parentElement.dataset.pairId;
                    // remove amount row
                    e.target.parentElement.remove();
                    // remove matching range row
                    const rangeRow = document.querySelector(
                        `.input-row-grid[data-pair-id="${pairId}"]`
                    );
                    if (rangeRow) rangeRow.remove();
                }
            });
        });



        document.addEventListener('DOMContentLoaded', () => {
            const scheduleContainer = document.getElementById('bid-schedule-container');
            const addRowBtn = document.querySelector('.add-schedule-btn');
            let index = 1;
            // Create a full new schedule row
            const createScheduleRow = () => {
                const newRow = document.createElement('div');
                newRow.className = 'bid-schedule-row-grid';
                newRow.dataset.index = index;
                newRow.innerHTML = `
                                                                                                                                                                                                                                                                                                                                <div class="schedule-item">
                                                                                                                                                                                                                                                                                                                                    <label>From (day)</label>
                                                                                                                                                                                                                                                                                                                                    <div class="input-units">
                                                                                                                                                                                                                                                                                                                                    <select name="bid_schedule[${index}][from_day]">
                                                                                                                                                                                                                                                                                                                                        <option value="Sunday">Sunday</option>
                                                                                                                                                                                                                                                                                                                                        <option value="Monday">Monday</option>
                                                                                                                                                                                                                                                                                                                                        <option value="Tuesday">Tuesday</option>
                                                                                                                                                                                                                                                                                                                                        <option value="Wednesday">Wednesday</option>
                                                                                                                                                                                                                                                                                                                                        <option value="Thursday">Thursday</option>
                                                                                                                                                                                                                                                                                                                                        <option value="Friday">Friday</option>
                                                                                                                                                                                                                                                                                                                                        <option value="Saturday">Saturday</option>
                                                                                                                                                                                                                                                                                                                                    </select>
                                                                                                                                                                                                                                                                                                                                    </div>
                                                                                                                                                                                                                                                                                                                                </div>

                                                                                                                                                                                                                                                                                                                                <div class="schedule-item">
                                                                                                                                                                                                                                                                                                                                    <label>To (day)</label>
                                                                                                                                                                                                                                                                                                                                    <div class="input-units">
                                                                                                                                                                                                                                                                                                                                    <select name="bid_schedule[${index}][to_day]">
                                                                                                                                                                                                                                                                                                                                        <option value="Sunday">Sunday</option>
                                                                                                                                                                                                                                                                                                                                        <option value="Monday">Monday</option>
                                                                                                                                                                                                                                                                                                                                        <option value="Tuesday">Tuesday</option>
                                                                                                                                                                                                                                                                                                                                        <option value="Wednesday">Wednesday</option>
                                                                                                                                                                                                                                                                                                                                        <option value="Thursday">Thursday</option>
                                                                                                                                                                                                                                                                                                                                        <option value="Friday">Friday</option>
                                                                                                                                                                                                                                                                                                                                        <option value="Saturday">Saturday</option>
                                                                                                                                                                                                                                                                                                                                    </select>
                                                                                                                                                                                                                                                                                                                                    <button class="remove-btn-sm remove-row-btn">&times;</button>
                                                                                                                                                                                                                                                                                                                                    </div>
                                                                                                                                                                                                                                                                                                                                </div>

                                                                                                                                                                                                                                                                                                                                <div class="schedule-item sessions-container">
                                                                                                                                                                                                                                                                                                                                    <label>
                                                                                                                                                                                                                                                                                                                                    Start Session
                                                                                                                                                                                                                                                                                                                                    <span class="circle-icon add-startsession-btn">
                                                                                                                                                                                                                                                                                                                                        <i class="fa-solid fa-circle text-warning"></i>
                                                                                                                                                                                                                                                                                                                                        <span class="circle-text text-dark">+</span>
                                                                                                                                                                                                                                                                                                                                    </span>
                                                                                                                                                                                                                                                                                                                                    </label>
                                                                                                                                                                                                                                                                                                                                    <div class="input-units">
                                                                                                                                                                                                                                                                                                                                    <input type="time" name="bid_schedule[${index}][sessions][]" placeholder="Enter Time">
                                                                                                                                                                                                                                                                                                                                    <button class="remove-btn-sm remove-session-btn">&times;</button>
                                                                                                                                                                                                                                                                                                                                    </div>
                                                                                                                                                                                                                                                                                                                                </div>
                                                                                                                                                                                                                                                                                                                                `;
                scheduleContainer.appendChild(newRow);
                index++;
            };

            // Add new "Start Session" field after the current one
            const addStartSessionField = (btn) => {
                const parentSession = btn.closest('.sessions-container');
                const row = btn.closest('.bid-schedule-row-grid');
                if (parentSession && row) {
                    const rowIndex = row.dataset.index;

                    // remove + icon from current session
                    const label = parentSession.querySelector('label');
                    if (label) {
                        const plusIcon = label.querySelector('.add-startsession-btn');
                        if (plusIcon) plusIcon.remove();
                    }

                    // create new session with + icon
                    const newSession = document.createElement('div');
                    newSession.className = 'schedule-item sessions-container';
                    newSession.innerHTML = `
                                                                                                                                                                                                                                                                                                                                        <label>
                                                                                                                                                                                                                                                                                                                                            Start Session
                                                                                                                                                                                                                                                                                                                                            <span class="circle-icon add-startsession-btn">
                                                                                                                                                                                                                                                                                                                                                <i class="fa-solid fa-circle text-warning"></i>
                                                                                                                                                                                                                                                                                                                                                <span class="circle-text text-dark">+</span>
                                                                                                                                                                                                                                                                                                                                            </span>
                                                                                                                                                                                                                                                                                                                                        </label>
                                                                                                                                                                                                                                                                                                                                        <div class="input-units">
                                                                                                                                                                                                                                                                                                                                            <input type="time" name="bid_schedule[${rowIndex}][sessions][]" placeholder="Enter Time">
                                                                                                                                                                                                                                                                                                                                            <button class="remove-btn-sm remove-session-btn">&times;</button>
                                                                                                                                                                                                                                                                                                                                        </div>
                                                                                                                                                                                                                                                                                                                                    `;

                    // insert AFTER the current session field
                    parentSession.insertAdjacentElement('afterend', newSession);
                }
            };



            // Remove full schedule row
            const removeScheduleRow = (event) => {
                if (event.target.classList.contains('remove-row-btn')) {
                    const row = event.target.closest('.bid-schedule-row-grid');
                    if (row) row.remove();
                }
            };

            // Remove individual Start Session field
            const removeSessionField = (event) => {
                if (event.target.classList.contains('remove-session-btn')) {
                    const session = event.target.closest('.sessions-container');
                    if (session) session.remove();
                }
            };

            // Event Listeners
            addRowBtn.addEventListener('click', createScheduleRow);

            scheduleContainer.addEventListener('click', (event) => {
                if (event.target.closest('.add-startsession-btn')) {
                    addStartSessionField(event.target.closest('.add-startsession-btn'));
                }
                removeScheduleRow(event);
                removeSessionField(event);
            });
        });

        $(document).ready(function () {
            //$(".add-bidding-form").on("submit", function(e) {
            const $form = $(".add-bidding-form");
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
                let url = recordId ? "{{ route('bidding.update', ':id') }}".replace(':id', recordId) : "{{ route('bidding.store') }}";

                $.ajax({
                    url: url,
                    type: "POST",
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function (response) {
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
                    error: function (xhr, status, error) {
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
                $form.find("input, select, textarea").each(function () {
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
                    $("[name='bid_session_duration']").val(data.bid_session_duration);

                if (data.timing_each_bid)
                    $("[name='timing_each_bid']").val(data.timing_each_bid);

                if (data.preview_before_bid)
                    $("[name='preview_before_bid']").val(data.preview_before_bid);

                if (data.cooling_period)
                    $("[name='cooling_period']").val(data.cooling_period);

                console.log("Load bid_increment:", data.bid_increment);
                console.log("Load bid_schedule:", data.bid_schedule);
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
            setTimeout(function () {
                toast.removeClass('show').addClass('toast-hidden');
            }, 10000);
        }


        document.addEventListener("DOMContentLoaded", function () {
            let alertBox = document.getElementById("success-alert");
            if (alertBox) {
                setTimeout(() => {
                    alertBox.style.transition = "opacity 0.5s ease";
                    alertBox.style.opacity = "0";
                    setTimeout(() => alertBox.remove(), 500);
                }, 3000);
            }
        });

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
                            // if (results.length === 0 && params.term) {
                            //     results.push({
                            //         id: 'new_' + params.term,
                            //         text: '➕ Add "' + params.term + '"',
                            //         is_new: true
                            //     });
                            // }

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

        $(document).on("click", "#add-bid-row", function () {
            const firstRow = $(".bid-row:first");
            const newRow = firstRow.clone();

            newRow.find("input, select").val(""); // clear values
            newRow.find(".preview").attr("src", "").hide();
            newRow.find(".remove-row").removeClass("d-none");

            $("#bid-status-wrapper").append(newRow);
        });

        // Remove row
        $(document).on("click", ".remove-row", function () {
            $(this).closest(".bid-row").remove();
        });

        // Upload image preview
        $(document).on("change", ".upload-input", function (event) {
            const file = event.target.files[0];
            const preview = $(this).siblings(".preview");

            if (file) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    preview.attr("src", e.target.result).show();
                };
                reader.readAsDataURL(file);
            } else {
                preview.hide();
            }
        });

        const statementOptions = {
            1: [
                { value: "notify", text: "Notify Me" },
            ],
            2: [
                { value: "in_progress", text: "Bid In Progress" },
            ],
            3: [
                { value: "bid_ended", text: "Bid Ended" },
            ],
            4: [
                { value: "view_bid", text: "View Bid" },
            ],
            5: [
                { value: "lose_statement", text: "Better Luck Next Time" },
            ],
            6: [
                { value: "view_details", text: "View Bid Details" },
            ]
        };

        // When status changes
        $(document).on("change", ".status", function () {
            const selectedStatus = $(this).val();
            const statementDropdown = $(this).closest(".bid-row").find(".statement");

            statementDropdown.empty().append('<option value="">Select Statement</option>');

            if (statementOptions[selectedStatus]) {
                statementOptions[selectedStatus].forEach(opt => {
                    statementDropdown.append(
                        `<option value="${opt.value}">${opt.text}</option>`
                    );
                });
            }
        });

    </script>
@endsection