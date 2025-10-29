<h5>DIAMENSIONS & WEIGHT</h5>
<hr />
<div class="row">
    <div class="col-lg-2 col-md-6 col-sm-12">
        <div class="mb-3">
            <label class="form-label">Length (mm)<span class="text-danger ms-1">*</span></label>
            <input type="number" id="length_mm" name="length_mm" class="form-control" placeholder="Length"
                value="{{ $carMake->getDiamension->length_mm ?? '' }}">
        </div>
    </div>
    <div class="col-lg-2 col-md-6 col-sm-12">
        <div class="mb-3">
            <label class="form-label">Weight (mm)<span class="text-danger ms-1">*</span></label>
            <input type="number" id="weight_mm" name="weight_mm" class="form-control" placeholder="Weight"
                value="{{ $carMake->getDiamension->weight_mm ?? '' }}">
        </div>
    </div>
    <div class="col-lg-2 col-md-6 col-sm-12">
        <div class="mb-3">
            <label class="form-label">Height (mm)<span class="text-danger ms-1">*</span></label>
            <input type="number" id="height_mm" name="height_mm" class="form-control" placeholder="Height"
                value="{{ $carMake->getDiamension->height_mm ?? '' }}">
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-2 col-md-6 col-sm-12">
        <div class="mb-3">
            <label class="form-label">Wheel Base (mm)<span class="text-danger ms-1">*</span></label>
            <input type="number" id="wheel_base_mm" name="wheel_base_mm" class="form-control" placeholder="Wheel Base"
                value="{{ $carMake->getDiamension->wheel_base_mm ?? '' }}">
        </div>
    </div>
    <div class="col-lg-2 col-md-6 col-sm-12">
        <div class="mb-3">
            <label class="form-label">Kerb Weight (Kg)<span class="text-danger ms-1">*</span></label>
            <input type="number" id="kerb_weight_kg" name="kerb_weight_kg" class="form-control"
                placeholder="Kerb Weight" value="{{ $carMake->getDiamension->kerb_weight_kg ?? '' }}">
        </div>
    </div>
    <div class="col-lg-2 col-md-6 col-sm-12">
        <div class="mb-3">
            <label class="form-label">Fuel Tank (liters)<span class="text-danger ms-1">*</span></label>
            <input type="number" id="fuel_tank_ltr" name="fuel_tank_ltr" class="form-control" placeholder="Fuel Tank"
                value="{{ $carMake->getDiamension->fuel_tank_ltr ?? '' }}">
        </div>
    </div>
</div>