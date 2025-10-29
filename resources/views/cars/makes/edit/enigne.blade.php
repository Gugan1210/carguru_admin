<h5>ENGINE</h5>
<hr />
<div class="row">
    <div class="col-lg-2 col-md-6 col-sm-12">
        <div class="mb-3">
            <label class="form-label">Engine (CC)<span class="text-danger ms-1">*</span></label>
            <select id="engine_cc" name="engine_cc" class="form-control select2-ajax"
                data-placeholder="Select or Add a Year" data-search-url="{{ route('madeYear.search') }}"
                data-selected-id="{{ $carMake->getEngine->getEngineCC->id ?? '' }}"
                data-selected-text="{{ $carMake->getEngine->getEngineCC->name ?? '' }}"></select>
        </div>
    </div>
    <div class="col-lg-2 col-md-6 col-sm-12">
        <div class="mb-3">
            <label class="form-label">Engine Type<span class="text-danger ms-1">*</span></label>
            <select id="engine_type" name="engine_type" class="form-control select2-ajax"
                data-placeholder="Select or Add a Engine Type" data-search-url="{{ route('engineType.search') }}"
                data-selected-id="{{ $carMake->getEngine->getEngineType->id ?? '' }}"
                data-selected-text="{{ $carMake->getEngine->getEngineType->name ?? '' }}"></select>
        </div>
    </div>
    <div class="col-lg-2 col-md-6 col-sm-12">
        <div class="mb-3">
            <label class="form-label">Compression Ratio<span class="text-danger ms-1">*</span></label>
            <input type="text" id="compression_ratio" name="compression_ratio" class="form-control"
                placeholder="Compression Ratio" value="{{ $carMake->getEngine->compression_ratio ?? '' }}">
        </div>
    </div>
    <div class="col-lg-2 col-md-6 col-sm-12">
        <div class="mb-3">
            <label class="form-label">Peak Power (KW)<span class="text-danger ms-1">*</span></label>
            <input type="text" id="peak_power_kw" name="peak_power_kw" class="form-control" placeholder="Peak Power"
                value="{{ $carMake->getEngine->peak_power_kw ?? '' }}">
        </div>
    </div>
    <div class="col-lg-2 col-md-6 col-sm-12">
        <div class="mb-3">
            <label class="form-label">Peak Torque (NM)<span class="text-danger ms-1">*</span></label>
            <input type="input" id="peak_torque_nm" name="peak_torque_nm" class="form-control" placeholder="Peak Torque"
                value="{{ $carMake->getEngine->peak_torque_nm ?? '' }}">
        </div>
    </div>
</div>