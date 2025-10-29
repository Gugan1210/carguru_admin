<h5>ENGINE</h5>
<hr />
<div class="row">
    <div class="col-lg-2 col-md-6 col-sm-12">
        <div class="mb-3">
            <label class="form-label">Engine (CC): </label>
            <span>{{ $data->getEngine->getEngineCC->name ?? '' }}</span>
        </div>
    </div>
    <div class="col-lg-2 col-md-6 col-sm-12">
        <div class="mb-3">
            <label class="form-label">Engine Type: </label>
            <span>{{ $data->getEngine->getEngineType->name ?? '' }}</span>
        </div>
    </div>
    <div class="col-lg-2 col-md-6 col-sm-12">
        <div class="mb-3">
            <label class="form-label">Compression Ratio: </label>
            <span>{{ $data->getEngine->compression_ratio ?? '' }}</span>
        </div>
    </div>
    <div class="col-lg-2 col-md-6 col-sm-12">
        <div class="mb-3">
            <label class="form-label">Peak Power (KW): </label>
            <span>{{ $data->getEngine->peak_power_kw ?? '' }}</span>
        </div>
    </div>
    <div class="col-lg-2 col-md-6 col-sm-12">
        <div class="mb-3">
            <label class="form-label">Peak Torque (NM): </label>
            <span>{{ $data->getEngine->peak_power_kw ?? '' }}</span>
        </div>
    </div>
</div>