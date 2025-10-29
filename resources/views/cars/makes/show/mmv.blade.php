<h5>CAR MAKES</h5>
<hr />
<div class="row">
    <div class="col-lg-2 col-md-6 col-sm-12">
        <div class="mb-3">
            <label class="form-label">Country of Make: </label>
            <span>{{ $data->getCountry->country_name ?? '' }}</span>
        </div>
    </div>
    <div class="col-lg-2 col-md-6 col-sm-12">
        <div class="mb-3">
            <label class="form-label">Brand: </label>
            <span>{{ $data->getVariant->model->brand->brand_name ?? '' }}</span>
        </div>
    </div>
    <div class="col-lg-2 col-md-6 col-sm-12">
        <div class="mb-3">
            <label class="form-label">Model: </label>
            <span>{{ $data->getVariant->model->model_name ?? '' }}</span>
        </div>
    </div>
    <div class="col-lg-2 col-md-6 col-sm-12">
        <div class="mb-3">
            <label class="form-label">Variant<span class="text-danger ms-1">*</span></label>
            <span>{{ $data->getVariant->variant_name ?? '' }}</span>
        </div>
    </div>
    <div class="col-lg-4 col-md-6 col-sm-12">
        <label class="form-label">Brand Emblem<span class="text-danger ms-1">*</span></label>
        <div class="upload-box" id="uploadBox">
            <img src="/storage/{{ $data->getVariant->model->brand->logo ?? '' }}" width="90px" height="auto">
        </div>
    </div>
    <div class="col-lg-2 col-md-6 col-sm-12">
        <div class="mb-3">
            <label class="form-label">Transmission: </label>
            <span>{{ $data->getTransmission->name ?? 'N/A' }}</span>
        </div>
    </div>
    <div class="col-lg-2 col-md-6 col-sm-12">
        <div class="mb-3">
            <label class="form-label">Fuel Type: </label>
            <span>{{ $data->getFuelType->name ?? '' }}</span>
        </div>
    </div>
    <div class="col-lg-2 col-md-6 col-sm-12">
        <div class="mb-3">
            <label class="form-label">Drive Train: </label>
            <span>{{ $data->getDriveTrain->name ?? '' }}</span>
        </div>
    </div>
    <div class="col-lg-2 col-md-6 col-sm-12">
        <div class="mb-3">
            <label class="form-label">Start Year: </label>
            <span>{{ $data->getStartYear->name ?? '' }}</span>
        </div>
    </div>
    <div class="col-lg-2 col-md-6 col-sm-12"></div>
    <div class="col-lg-2 col-md-6 col-sm-12"></div>
    <div class="col-lg-2 col-md-6 col-sm-12">
        <div class="mb-3">
            <label class="form-label">Discontinue Year: </label>
            <span>{{ $data->getEndYear->name ?? '' }}</span>
        </div>
    </div>
    <div class="col-lg-2 col-md-6 col-sm-12">
        <div class="mb-3">
            <label class="form-label">Seat (person): </label>
            <span>{{ $data->getSeat->name ?? '' }}</span>
        </div>
    </div>
    <div class=" col-lg-2 col-md-6 col-sm-12">
        <div class="mb-3">
            <label class="form-label">Exterior Color: </label>
            <span>{{ $data->exterior_color ?? '' }}</span>
        </div>
    </div>
    <div class=" col-lg-2 col-md-6 col-sm-12">
        <div class="mb-3">
            <label class="form-label">Interior Color: </label>
            <span>{{ $data->interior_color ?? '' }}</span>
        </div>
    </div>
    <div class="col-lg-2 col-md-6 col-sm-12"></div>
    <div class="col-lg-2 col-md-6 col-sm-12"></div>
    <div class="col-lg-2 col-md-6 col-sm-12">
        <div class="mb-3">
            <label class="form-label">Consumption: </label>
            <span>{{ $data->consumption ?? '' }}</span>
        </div>
    </div>
    <div class="col-lg-2 col-md-6 col-sm-12">
        <div class="mb-3">
            <label class="form-label">Doors: </label>
            <span>{{ $data->no_of_door ?? '' }}</span>
        </div>
    </div>
</div>