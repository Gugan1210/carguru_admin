<div class="offcanvas offcanvas-end" tabindex="-1" id="filterOffcanvas" style="max-width: 400px">
  <div class="offcanvas-header border-bottom  bg-light ">
    <h6 class="offcanvas-title w-100 text-center ms-3">ALL FILTERS</h6>
    <button type="button" class="btn-close" data-bs-dismiss="offcanvas"></button>
  </div>

  <div class="offcanvas-body d-flex flex-column p-0">
    <div class="d-flex flex-grow-1">
      <!-- Left Menu -->

      <div class="border-0 bg-light  py-3" style="width: 175px !important;">
        <ul class="nav flex-column" id="custom-tab-nav">

          <li class="nav-items"><a class="nav-link text-dark " href="#tab-brand">Brand & Model</a></li>
          <li class="nav-items"><a class="nav-link text-dark" href="#tab-body">Body Type</a></li>
          <li class="nav-items"><a class="nav-link text-dark active" href="#tab-fuel">Fuel Type</a></li>
          <li class="nav-items"><a class="nav-link text-dark" href="#tab-price">Car Price</a></li>
          <li class="nav-items"><a class="nav-link text-dark" href="#tab-year">Year</a></li>
          <li class="nav-items"><a class="nav-link text-dark" href="#tab-transmission">Transmission</a></li>
          <li class="nav-items"><a class="nav-link text-dark" href="#tab-mileage">Mileage</a></li>
          <li class="nav-items"><a class="nav-link text-dark" href="#tab-color">Color</a></li>
          <li class="nav-items"><a class="nav-link text-dark" href="#tab-centre">Centre</a></li>
        </ul>
      </div>

      <!-- Right Filter Options -->
      <div class="flex-grow-0 px-2 py-4 bg-white fuel-items" id="tab-content-wrapper">
        <!-- ========== Start fuel container ========== -->
        <div class="tab-pane active" id="tab-fuel">
          <h6 class="mb-3 text-center ">Select Fuel Type</h6>
          <div class="row g-3 ">
            @if (isset($fuelTypes))
              @foreach ($fuelTypes as $fuelType)
                <div class="col-6"><button class="btn btn-outline-light border-secondary w-100 text-dark fuel-type-btn"
                    data-id="{{ $fuelType->id }}">{{ $fuelType->name }}</button>
                </div>
              @endforeach
            @endif

          </div>
        </div>
        <!-- ========== End fuel container ========== -->
        <!-- ========== Start body ========== -->

        <div class=" bg-white body-type-items  tab-pane d-none" id="tab-body">
          <h6 class="mb-3 text-center">Select Body Type</h6>
          <div class="row g-3 text-center">
            <!-- Example item -->
            @if(isset($bodyTypes))
              @foreach ($bodyTypes as $bodyType)
                <div class="col-4">
                  <div class="body-type-card" data-id="{{ $bodyType->id }}">
                    @if(!empty($bodyType->image) && Storage::disk('public')->exists($bodyType->image))
                      <img src="{{ asset('storage/' . $bodyType->image) }}" class="img w-100">
                    @else
                      <img src="{{ asset('storage/' . '/images/no-image.webp') }}" class="img w-100">
                    @endif
                    <div class="body-type-label"><strong>{{ $bodyType->name }}</strong></div>
                  </div>
                </div>
              @endforeach
            @endif
            <input type="hidden" name="body_type_id" id="selected_body_type">
          </div>

        </div>
        <!-- ========== End body ========== -->

        <!-- ========== Start Brand Name ========== -->
        <div class="tab-pane d-none" id="tab-brand">
          <h6 class="text-center mb-3">Select Car Brand & Model</h6>
          <div class="brand-row">
            <div class="row row-cols-3 row-cols-md-9 g-3 my-2">
              @if ($brands)
                @foreach ($brands as $brand)
                  @if ($brand->model_count != 0)
                    <a class="col brand-item btn" onclick="selectBrand({{ $brand->id }}, this)" data-id="{{ $brand->id }}"
                      data-name="{{ $brand->brand_name }}">
                      <img src="{{ asset('storage/' . $brand->logo) }}" class="img w-100">
                      <div class="brand-label">{{ $brand->brand_name }}({{ $brand->model_count }})</div>
                    </a>
                  @endif
                @endforeach
              @endif
            </div>
          </div>
          <!-- Template for model section (injected dynamically) -->
          <template id="model-template" class="bg-light">
            <div class="model-section bg-light  ">
              <div class="model-buttons  d-flex flex-wrap gap-3 mt-3 py-lg-2 px-lg-1 ps-4 py-3"></div>
            </div>
          </template>



        </div>
        <!-- ========== End Brand Name ========== -->
        <!-- ========== Start brand ========== -->
        <div class="tab-pane d-none" id="tab-brand">
          <h6 class="mb-3 text-center">Select Brand & Model</h6>
          <div class="row g-3">
            <div class="col-6"><button class="btn btn-outline-dark w-100">Toyota</button></div>
            <div class="col-6"><button class="btn btn-outline-dark w-100">BMW</button></div>
            <div class="col-6 "><button class="btn btn-outline-light border-secondary w-100 text-dark">Electric</button>
            </div>
            <div class="col-6 "><button class="btn btn-warning w-100 text-dark">Petrol</button></div>
            <div class="col-6 "><button class="btn btn-outline-light border-secondary w-100 text-dark">Hybrid</button>
            </div>
          </div>
        </div>
        <!-- ========== End brand ========== -->
        <!-- ========== Start color ========== -->
        <div class="tab-pane d-none " id="tab-color">
          <h6 class="mb-3 text-center ">Select Car Color</h6>
          <div class="d-flex flex-wrap justify-content-start " id="colorBoxGroup">
            @foreach ($colors as $color)
              <div class="color-container" onclick="toggleCheck(this)" data-id="{{ $color->color }}">
                <div class="color-box" style="background-color:{!! $color->color !!};"></div>
                <div class="color-label">{{ $color->name }}</div>
                <div class="checkmark">
                  <span>&#10003;</span>
                </div>
              </div>
            @endforeach
            <div class="color-container" onclick="toggleCheck(this)">
              <div class="color-box rainbow-gradient"></div>
              <div class="color-label">Other</div>
              <div class="checkmark">
                <span>&#10003;</span>
              </div>
            </div>
            <!-- Add more as needed -->
          </div>

        </div>

        <!-- ========== End color ========== -->

        <!-- ========== Start Milege ========== -->
        <div class="tab-pane d-none" id="tab-mileage" style="max-width: 500px;">
          <h6 class="mb-3 text-center ">Select Car Mileage</h6>
          <div class="mb-3 position-relative" style="height: 30px;">
            <!-- Track background -->
            <div class="range-track  w-100"
              style="height: 6px; position: absolute; top: 28%; transform: translateY(-29%); border-radius: 4px;z-index:340">
              <div id="mileageActive" class="range-active"
                style="position: absolute; height: 6px; background: #f4b000; border-radius: 4px;"></div>
            </div>

            <!-- Two sliders -->
            <input type="range" min="0" max="260000" step="1000" value="0" id="minMileageRange" class="mileage-slider"
              style="top:6" />
            <input type="range" min="0" max="260000" step="1000" value="0" id="maxMileageRange"
              class="mileage-slider" />
          </div>


          <!-- Min/Max Mileage Inputs -->
          <div class="row g-3 mb-3">
            <div class="col-6">
              <label for="minMileage" class="form-label">Minimum Mileage</label>
              <input type="text" class="form-control" id="minMileage" value="0" min="0">
            </div>
            <div class="col-6">
              <label for="maxMileage" class="form-label">Maximum Mileage</label>
              <input type="text" class="form-control" id="maxMileage" value="0" readonly>
            </div>
          </div>

          <!-- Mileage Options -->
          <div class="row g-2">
            <div class="col-6"><button class="mileage-btn active" data-value="30000">Under 30,000</button></div>
            <div class="col-6"><button class="mileage-btn" data-value="50000">Under 50,000</button>
            </div>
            <div class="col-6"><button class="mileage-btn" data-value="7000">Under 7,000</button></div>
            <div class="col-6"><button class="mileage-btn" data-value="120000">Under 120,000</button></div>
          </div>
        </div>

        <!-- ========== End Milege ========== -->
        <!-- ========== Start Trasmission ========== -->
        <div class="tab-pane d-none" id="tab-transmission">
          <h6 class="mb-3 text-center">Select Transmission</h6>
          <div class="row g-3 ">
            @if (isset($transmissions))
              @foreach ($transmissions as $transmission)
                <div class="col-6"><button data-id="{{ $transmission->id }}"
                    class="btn btn-outline-light border-secondary w-100 text-dark transmission-btn"
                    onclick="selectTransmission(this)">{{ $transmission->name }}</button></div>
              @endforeach
            @endif
          </div>
        </div>
        <!-- ========== End Trasmission ========== -->


        <!-- ========== Start Car Years ========== -->
        <!-- Year Range Filter -->
        <div class="tab-pane d-none" id="tab-year" style="max-width: 500px;">
          <h6 class="mb-3 text-center">Select Car Year Range</h6>

          <div class="year-slider-wrapper position-relative mb-4 px-2">
            <!-- Track background -->
            <div class="range-track w-100"
              style="height: 6px; position: absolute; top: 19%; transform: translateY(-50%); z-index: 320;">
              <div id="rangeActive" class="range-active"></div>
            </div>

            <!-- Actual range sliders -->
            <input type="range" min="1990" max="2024" value="1990" id="yearMin" class="year-slider" style="top: 12%;" />
            <input type="range" min="1990" max="2024" value="2024" id="yearMax" class="year-slider" />
          </div>

          <!-- Inputs -->
          <div class="row g-3 mb-3">
            <div class="col-6">
              <label class="form-label">Minimum Year</label>
              <input type="text" class="form-control text-center" id="minYear" value="" readonly />
            </div>
            <div class="col-6">
              <label class="form-label">Maximum Year</label>
              <input type="text" class="form-control text-center" id="maxYear" value="" readonly />
            </div>
          </div>

          <!-- Year Buttons -->
          <div class="row g-2">
            <div class="col-6"><button class="year-btn" data-min="1990" data-max="1999">1990 - 1999</button></div>
            <div class="col-6"><button class="year-btn" data-min="2000" data-max="2006">2000 - 2006</button></div>
            <div class="col-6"><button class="year-btn" data-min="2007" data-max="2012">2007 - 2012</button></div>
            <div class="col-6"><button class="year-btn" data-min="2013" data-max="2017">2013 - 2017</button></div>
            <div class="col-6"><button class="year-btn" data-min="2018" data-max="2021">2018 - 2021</button></div>
            <div class="col-6"><button class="year-btn" data-min="2022" data-max="2024">2022 - 2024</button></div>
          </div>

        </div>


        <!-- ========== End Car Years ========== -->

        <!-- ========== Start Centre ========== -->

        <div class="tab-pane d-none" id="tab-centre">
          <h6 class="mb-3 text-center ">Select Carguru Centre</h6>
          <div class="row g-3 ">
            @foreach ($centers as $center)
              <div class="col-12 "><button class="btn btn-warning  w-100 text-dark fw-bold"
                  onclick="selectedFilterCount()" value="{{ $center->id }}">{{ $center->name }}</button></div>
            @endforeach
          </div>
        </div>
        <!-- ========== End Centre ========== -->

        <!-- ========== Start Car Price ========== -->
        <!-- Year Range Filter -->
        <div class="tab-pane d-none" id="tab-price" style="max-width: 500px;">
          <h6 class="mb-4 text-center">Select Car Price</h6>

          <!-- Range Visual -->
          <div class="d-flex align-items-center justify-content-between mb-5 px-2 position-relative">
            <div class="w-100 position-relative">
              <!-- Active Range Bar -->
              <div class="range-track  w-100"
                style="height: 6px; position: absolute; top: 50%; transform: translateY(-50%);z-index:340">
                <div id="priceActive" class="range-active"></div>
              </div>


              <!-- Sliders using mileage style -->
              <input type="range" id="minPriceRange" class="carprice-slider" min="0" max="200000" step="1000" value="0">
              <input type="range" id="maxPriceRange" class="carprice-slider" min="0" max="200000" step="1000" value="0">
            </div>
          </div>


          <!-- Min/Max Inputs -->
          <div class="row g-3 mb-3">
            <div class="col-6">
              <label class="form-label">Minimum Price</label>
              <input type="text" class="form-control text-center" id="minPrice" value="0" />
            </div>
            <div class="col-6">
              <label class="form-label">Maximum Price</label>
              <input type="text" class="form-control text-center" id="maxPrice" value="0" />
            </div>
          </div>

          <!-- Price Buttons -->
          <div class="row g-2">
            <div class="col-6"><button class="price-btn" data-min="0" data-max="30000">Under 30,000</button></div>
            <div class="col-6"><button class="price-btn" data-min="30000" data-max="50000">30,000 - 50,000</button>
            </div>
            <div class="col-6"><button class="price-btn" data-min="50000" data-max="100000">50,000 - 100,000</button>
            </div>
            <div class="col-6"><button class="price-btn" data-min="100000" data-max="9999999">Above 100,000</button>
            </div>
          </div>
        </div>
        <!-- ========== End Car Years ========== -->
      </div>
    </div>

    <!-- ========== Start Bottom for Fuel ========== -->
    <div class="border-0 px-3 py-3 bg-light badge-block" id="badge-fuel">
      <div class="mb-3 bottom-badge d-flex justify-content-end">
        <div class="row ms-5">
          <div id="selected-filters" class="mt-3 d-flex flex-wrap gap-2"></div>
        </div>
      </div>

      <div class="d-flex justify-content-between bottom-btn mx-1">
        <button class="btn btn-dark w-50 me-2 rouded-5 ">Clear All</button>
        <button class="btn btn-warning w-50" onclick="submitFilter()">Apply<span id="filter-count"></span></button>
      </div>
    </div>
    <!-- ========== End Bottom for Fuel ========== -->
  </div>


  <style>
    /***** Navigation *****/

    html,
    body {
      overflow-x: hidden;
    }

    #filterOffcanvas {
      font-family: 'RobotoFlex' !important;
      overflow-y: hidden !important;
    }

    #filterOffcanvas ::-webkit-scrollbar {
      width: 0px;
    }

    #filterOffcanvas .nav-link {
      font-size: 12px !important;
      font-family: 'RobotoFlex' !important;
      margin-bottom: 10% !important;
    }

    /* .nav-item .nav-link:active{
    color: black !important;
     background-color: #fac000;
     border-radius: 10px !important;  
}
 .nav-link:hover{
    color: black !important;
    background-color: lightgray;
} */
    .nav-items .nav-link:hover,
    .nav-items .nav-link:focus {
      background-color: #fac000 !important;
      color: #000 !important;
      font-weight: bold !important;
      margin-left: 2px !important;
      margin-right: 2px !important;
      border-radius: 5px;
    }

    .nav-items .nav-link.active {
      background-color: #fac000 !important;
      color: #000 !important;
      font-weight: bold !important;
      margin-left: 4px !important;
      margin-right: 4px !important;
      border-radius: 5px;
    }

    .fuel-items {
      font-family: 'RobotoFlex' !important;
    }

    .fuel-items h6 {
      font-size: 13px;
      font-weight: 500;
    }

    .fuel-items button {
      font-size: 12px;
      font-weight: 500;
    }

    .fuel-type-btn:hover {
      background-color: #f8f9fa;
      border-color: #ccc;
    }

    .fuel-type-btn.selected {
      background-color: #fac000;
      font-weight: bold;

      color: #000;
    }

    .offcanvas-header {
      padding: 2.5% !important;
    }

    .offcanvas-title {
      font-size: 10px !important;
      font-weight: bold;
    }

    .btn-close {
      font-size: 10px !important;
      font-weight: 1000 !important;
      color: black !important;
      border: none !important;
    }

    .badge {
      font-size: 8px !important;
      border: 1px solid #ffe592 !important;
      width: 65px !important;
    }

    .bottom-btn button {
      font-size: 12px !important;
    }

    /***** Body Container *****/
    .body-type-items h6 {
      font-size: 13px;
      font-weight: 500;
      font-family: 'RobotoFlex';
    }

    .body-type-card {
      padding: 4px;
      border-radius: 4px;
      border: 1px solid transparent;
      cursor: pointer;
      transition: all 0.2s ease-in-out;
    }

    .body-type-card:hover {
      background-color: #f8f9fa;
      border-color: #ccc;
    }

    .body-type-card.selected {
      background-color: #fac000;
      font-weight: bold;

      color: #000;
    }

    .body-type-label {
      font-size: 9px !important;
      font-family: 'RobotoFlex';
    }

    /***** End Body Container *****/
    /* brand and model */

    .brand-logo {
      width: 30px;
      height: 30px;
      object-fit: contain;
      margin-bottom: 0px;
    }

    .brand-item {
      text-align: center;
      font-size: 5px;
      color: #000;
    }

    .brand-item.active {
      background-color: #f4b000;
      border-radius: 5%;
      /* height: 7vh !important; */


    }

    .brand-model-container {
      margin-top: 10px !important;
      width: 110% !important;
      height: 21vh !important;
      padding: 10px 5px !important;
    }

    .brand-label {
      font-size: 8px;
    }


    .model-button {
      font-size: 8px !important;
      border: 1px solid #ffe592 !important;
      width: 55px !important;
      padding: 5px 2px !important;
      border-radius: 5px;

    }

    .model-button.selected {
      background: #f4b000;
      color: black;

    }

    @media (min-width: 768px) {
      .row-cols-8>* {
        flex: 0 0 auto;
        width: 12.5%;
      }

    }

    /* brand and model */
    /***** color container *****/
    .color-container {
      width: 70px;
      border-radius: 10% !important;
      box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
      background-color: #f9f9f9;
      /* font-family: 'Lexend Deca'; */
      overflow: visible;
      display: block;
      line-height: 0;
      position: relative;
      text-align: center;
      margin: 8px;
      cursor: pointer;
      transition: transform 0.2s ease;
    }

    .color-container:hover {
      transform: scale(1.05);
    }

    .color-box {
      height: 40px;
      width: 100%;
    }

    .checkmark {
      position: absolute;
      top: -8px;
      /* move upward outside */
      right: -8px;
      /* move right outside */
      background-color: #f4b000;
      color: #000;
      font-weight: bold;
      border-radius: 2px;
      width: 20px;
      height: 20px;
      font-size: 12px;
      display: none;
      align-items: center;
      justify-content: center;
      z-index: 100;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.15);
    }

    .color-container.selected .checkmark {
      display: flex;
    }

    .color-label {
      background-color: #f9f9f9;
      font-size: 10px;
      padding: 6px 0;
      font-weight: 500;
      color: #333;
    }

    .rainbow-gradient {
      background: linear-gradient(135deg,
          red,
          yellow,
          lime,
          cyan,
          blue,
          magenta,
          red);
    }

    /***** End color container *****/
    /***** milege container *****/
    /* Range Slider Styling */



    .range-active {
      position: absolute;
      height: 6px;
      background: #f4b000;
      top: 0;
      border-radius: 4px;
    }



    .form-label {
      font-size: 10px !important;
      margin-left: 10px;
    }

    /* Mileage Buttons */
    .mileage-btn {
      width: 100%;
      padding: 8px;
      border: 1px solid #ccc;
      background-color: white;
      color: #000;
      font-weight: 500;
      border-radius: 6px;
      transition: all 0.2s ease;
    }

    .mileage-btn.active {
      background-color: #f9b21c;
      border-color: #f9b21c;
      color: #000;
    }

    .mileage-btn:hover {
      background-color: #ffe199;
    }

    input[type="number"] {
      font-weight: 600;
    }

    /***** End milege container *****/
    /***** Transmission *****/
    .transmission-btn.active {
      background-color: #f4c43b !important;
      /* Yellow when active */
      border-color: #f4c43b !important;
      color: black !important;
    }

    /***** End Transmission *****/
    /***** Car year *****/

    .year-slider-wrapper {
      height: 50px;
      /* or more if needed */
      position: relative;
      background: #fff;
    }

    .year-slider::-webkit-slider-runnable-track {
      background: transparent;
      height: 6px;
    }

    /* Hide the track (for Firefox) */
    .year-slider::-moz-range-track {
      background: transparent;
      height: 6px;
    }

    .year-slider::-webkit-slider-thumb {
      pointer-events: auto;
      width: 16px;
      height: 16px;
      background: #f4b000;
      border-radius: 50%;
      border: none;
      -webkit-appearance: none;
      cursor: pointer;
      z-index: 340;
      position: relative;
    }

    .year-slider::-moz-range-thumb {
      pointer-events: auto;
      width: 16px;
      height: 16px;
      background: #f4b000;
      border-radius: 50%;
      border: none;
      cursor: pointer;
    }

    .range-active {
      position: absolute;
      height: 6px;
      background: #f4b000;
      top: 50%;
      transform: translateY(-50%);
      pointer-events: none;
      border-radius: 2px;
      z-index: 6;
    }



    .year-btn {
      width: 100%;
      padding: 10px;
      border: 1px solid #ccc;
      background-color: white;
      color: #000;
      font-weight: 500;
      border-radius: 6px;
      transition: all 0.2s ease;
      font-size: 13px;
    }

    .year-btn.active {
      background-color: #f4b000;
      border-color: #f4b000;
      color: #000;
    }

    #yearMin {
      z-index: 5;
      pointer-events: auto;
    }

    #yearMax {
      z-index: 5;
      pointer-events: auto;
    }

    .year-btn:hover {
      background-color: #ffe199;
    }

    input[value] {
      font-size: 13px;
      font-weight: 600 !important;
    }

    input[type="range"] {

      z-index: 2 !important;
    }

    /***** End Car year *****/
    #tab-price .carprice-slider {
      position: absolute;
      width: 100%;
      height: 30px;
      top: 0;
      left: 0;
      background: transparent;
      transform: translateY(-50%);
      pointer-events: none;
      -webkit-appearance: none;
      z-index: 3;
    }

    #tab-price .carprice-slider::-webkit-slider-thumb {
      pointer-events: auto;
      width: 16px;
      height: 16px;
      background: #f4b000;
      border-radius: 50%;
      border: none;
      -webkit-appearance: none;
      cursor: pointer;
      z-index: 340;
    }

    #tab-price .range-active {
      position: absolute;
      height: 6px;
      background: #f4b000;
      top: 50%;
      transform: translateY(-50%);
      border-radius: 4px;

      z-index: 2;
      pointer-events: none;
    }


    /***** End Car year *****/
    /* ================= MOBILE VIEW STYLES ================= */
    @media (max-width: 767px) {

      html,
      body {
        font-size: 14px;
        overflow-x: hidden;
      }

      #filterOffcanvas {
        padding: 10px !important;
      }

      .nav-link {
        font-size: 11px !important;
        padding: 10px 10px !important;
        border: none !important;
        /* margin-bottom: 10px !important; */
      }

      .nav-items .nav-link.active,
      .nav-items .nav-link:hover {
        margin-left: 0 !important;
        margin-right: 0 !important;
      }

      .offcanvas-header {
        padding: 10px !important;
      }

      .offcanvas-title,
      .btn-close {
        font-size: 12px !important;
      }

      .badge {
        font-size: 9px !important;
        width: auto !important;
        padding: 4px 6px;
      }

      .bottom-btn button {
        font-size: 13px !important;
        padding: 8px;
      }

      .body-type-card {
        width: 100%;
        margin-bottom: 10px;
      }

      .body-type-label {
        font-size: 10px !important;
      }

      .brand-item {
        font-size: 16px;
        /* width: 100% !important; */
      }

      .brand-item.active {
        /* width: 80px !important; */
        height: 60px;
        /* margin-left: 26px !important; */
        /* width: 60px !important; */
        padding-bottom: 4.5rem;

      }

      .brand-logo {
        width: 40px !important;
        height: 40px !important;
      }

      .brand-model-container {
        width: 100% !important;
        height: auto !important;
        padding: 8px !important;
      }

      .brand-models-list button {
        font-size: 9px !important;
        width: auto !important;
        padding: 4px 8px !important;
      }

      .color-container {
        width: 100px !important;
        /* margin: 5px; */
      }

      .color-box {
        height: 50px !important;
      }

      .color-row {
        margin-left: 23px !important;
      }

      .checkmark {
        width: 18px;
        height: 18px;
        font-size: 11px;
        top: -6px;
        right: -6px;
      }

      .color-label {
        font-size: 9px;
      }

      .mileage-btn,
      .year-btn {
        font-size: 12px !important;
        padding: 6px !important;
      }

      input[type="number"],
      input[value] {
        font-size: 12px !important;
      }

      .price-slider {
        height: 5px;
      }


      .transmission-btn {
        font-size: 11px;
        padding: 4px;
      }

      .badge-block {
        padding: 10px !important;
      }

    }

    /* mobile car price */
    .price-slider-thumb {
      position: absolute;
      top: -6px;
      left: 0;
      width: 100%;
      height: 16px;
      background: none;
      pointer-events: none;
      -webkit-appearance: none;
      appearance: none;
      z-index: 2;
    }

    .price-slider-thumb::-webkit-slider-thumb {
      -webkit-appearance: none;
      height: 16px;
      width: 16px;
      background: #f4b000;
      border-radius: 50%;
      cursor: pointer;
      pointer-events: all;
      position: relative;
      z-index: 3;
    }

    .price-slider-thumb::-moz-range-thumb {
      height: 16px;
      width: 16px;
      background: #f4b000;
      border: none;
      border-radius: 50%;
      cursor: pointer;
    }

    .price-range-bar {
      position: absolute;
      top: 0;
      height: 5px;
      background-color: #f4b000;
      z-index: 1;
    }

    .price-btn {
      width: 100%;
      padding: 10px;
      border: 1px solid #ccc;
      background-color: white;
      color: #000;
      font-weight: 500;
      border-radius: 6px;
      transition: all 0.2s ease;
      font-size: 13px;
    }

    .price-btn.active {
      background-color: #f4b000;
      border-color: #f4b000;
      color: #000;
    }

    /* ============ Range Sliders Reset & Custom ============ */

    /* Reset & base style for range sliders */
    .mileage-slider,
    .year-slider,
    .carprice-slider {
      -webkit-appearance: none;
      -moz-appearance: none;
      appearance: none;
      background: transparent;
      width: 100%;
      /* height: 16px; */
      position: relative;
      z-index: 8;
      pointer-events: auto;
      /* opacity: 0; */
    }

    /* Track: Remove default layer */
    .mileage-slider::-webkit-slider-runnable-track,
    .year-slider::-webkit-slider-runnable-track,
    .carprice-slider::-webkit-slider-runnable-track {
      background: transparent;
      height: 6px;
      border: none;
    }

    .mileage-slider::-moz-range-track,
    .year-slider::-moz-range-track,
    .carprice-slider::-moz-range-track {
      background: transparent;
      height: 6px;
      border: none;
    }

    /* Thumb styling */
    .mileage-slider::-webkit-slider-thumb,
    .year-slider::-webkit-slider-thumb,
    .carprice-slider::-webkit-slider-thumb {
      -webkit-appearance: none;
      height: 16px;
      width: 16px;
      border-radius: 50%;
      background-color: #f4b000;
      margin-top: -5px;
      /* aligns thumb vertically with custom track */
      border: none;
      cursor: pointer;
      position: relative;
      z-index: 3;
    }

    .mileage-slider::-moz-range-thumb,
    .year-slider::-moz-range-thumb,
    .carprice-slider::-moz-range-thumb {
      height: 16px;
      width: 16px;
      border-radius: 50%;
      background-color: #f4b000;
      border: none;
      cursor: pointer;
      position: relative;
      z-index: 3;
    }

    /* Remove outline on focus */
    input[type=range]:focus {
      outline: none;
    }

    .selected {
      border: 2px solid #000;
      /* Example style, you can customize */
      background-color: #ffc107 !important;
    }
  </style>