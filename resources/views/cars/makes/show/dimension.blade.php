<h5>DIAMENSIONS & WEIGHT</h5>
<hr />
<div class="row">
    <div class="col-lg-2 col-md-6 col-sm-12">
        <div class="mb-3">
            <label class="form-label">Length (mm): </label>
            <span>{{ $data->getDiamension->length_mm ?? '' }}</span>
        </div>
    </div>
    <div class="col-lg-2 col-md-6 col-sm-12">
        <div class="mb-3">
            <label class="form-label">Weight (mm): </label>
            <span>{{ $data->getDiamension->weight_mm ?? '' }}</span>
        </div>
    </div>
    <div class="col-lg-2 col-md-6 col-sm-12">
        <div class="mb-3">
            <label class="form-label">Height (mm): </label>
            <span>{{ $data->getDiamension->height_mm ?? '' }}</span>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-2 col-md-6 col-sm-12">
        <div class="mb-3">
            <label class="form-label">Wheel Base (mm): </label>
            <span>{{ $data->getDiamension->wheel_base_mm ?? '' }}</span>
        </div>
    </div>
    <div class="col-lg-2 col-md-6 col-sm-12">
        <div class="mb-3">
            <label class="form-label">Kerb Weight (Kg): </label>
            <span>{{ $data->getDiamension->kerb_weight_kg ?? '' }}</span>
        </div>
    </div>
    <div class="col-lg-2 col-md-6 col-sm-12">
        <div class="mb-3">
            <label class="form-label">Fuel Tank (liters): </label>
            <span>{{ $data->getDiamension->fuel_tank_ltr ?? '' }}</span>
        </div>
    </div>
</div>