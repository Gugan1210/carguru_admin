<h5>ENGINE</h5>
<hr />
<div class="row">
    <div class="col-lg-2 col-md-6 col-sm-12">
        <div class="mb-3">
            <label class="form-label">Engine (CC)</label>
            <select id="engine_cc" name="engine_cc" class="form-control select2-ajax"
                data-placeholder="Select or Add a Engine CC" data-search-url="{{ route('engineCC.search') }}"
                data-add-url="{{ route('engineCC.add') }}"></select>
        </div>
    </div>
    <div class="col-lg-2 col-md-6 col-sm-12">
        <div class="mb-3">
            <label class="form-label">Engine Type</label>
            <select id="engine_type" name="engine_type" class="form-control select2-ajax"
                data-placeholder="Select or Add a Engine Type" data-search-url="{{ route('engineType.search') }}"
                data-add-url="{{ route('engineType.add') }}"></select>
        </div>
    </div>
    <div class="col-lg-2 col-md-6 col-sm-12">
        <div class="mb-3">
            <label class="form-label">Compression Ratio</label>
            <input type="text" id="compression_ratio" name="compression_ratio" class="form-control"
                placeholder="Compression Ratio">
        </div>
    </div>
    <div class="col-lg-2 col-md-6 col-sm-12">
        <div class="mb-3">
            <label class="form-label">Peak Power (KW)</label>
            <input type="text" id="peak_power_kw" name="peak_power_kw" class="form-control" placeholder="Peak Power">
        </div>
    </div>
    <div class="col-lg-2 col-md-6 col-sm-12">
        <div class="mb-3">
            <label class="form-label">Peak Torque (NM)</label>
            <input type="input" id="peak_torque_nm" name="peak_torque_nm" class="form-control"
                placeholder="Peak Torque">
        </div>
    </div>
</div>