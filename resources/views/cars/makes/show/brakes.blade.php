<div class="row">
    <div class="col">
        <h5>BRAKES</h5>
        <hr />
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="mb-3">
                    <label class="form-label">Front: </label>
                    <span>{{ $data->getBrake->getBrakeFront->name ?? '-' }}</span>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="mb-3">
                    <label class="form-label">Rear: </label>
                    <span>{{ $data->getBrake->getBrakeRear->name ?? '-' }}</span>
                </div>
            </div>
        </div>
    </div>
    <div class="col">
        <h5>SUSPENSION</h5>
        <hr />
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="mb-3">
                    <label class="form-label">Front: </label>
                    <span>{{ $data->getBrake->getSuspensionFront->name ?? '-' }}</span>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="mb-3">
                    <label class="form-label">Back: </label>
                    <span>{{ $data->getBrake->getSuspensionBack->name ?? '-' }}</span>
                </div>
            </div>
        </div>
    </div>
    <div class="col">
        <h5>STEERING</h5>
        <hr />
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="mb-3">
                    <label class="form-label">Steering: </label>
                    <span>{{ $data->getBrake->getSuspensionBack->name ?? '-' }}</span>
                </div>
            </div>
        </div>
    </div>
</div>
<h5>TYPE OF WHEELS</h5>
<hr />
<div class="row">
    <div class="col-lg-2 col-md-6 col-sm-12">
        <div class="mb-3">
            <label class="form-label">Front: </label>
            <span>{{ $data->getBrake->wheel_type_front ?? '-' }}</span>
        </div>
    </div>
    <div class="col-lg-2 col-md-6 col-sm-12">
        <div class="mb-3">
            <label class="form-label">Rear: </label>
            <span>{{ $data->getBrake->wheel_type_rear ?? '-' }}</span>
        </div>
    </div>
    <div class="col-lg-2 col-md-6 col-sm-12">
        <div class="mb-3">
            <label class="form-label">Front Rims: </label>
            <span>{{ $data->getBrake->wheel_type_front_rims ?? '-' }}</span>
        </div>
    </div>
    <div class="col-lg-2 col-md-6 col-sm-12">
        <div class="mb-3">
            <label class="form-label">Rear Rims: </label>
            <span>{{ $data->getBrake->wheel_type_rear_rims ?? '-' }}</span>
        </div>
    </div>
</div>
<h5>STANDARD FEATURES / EQUIPMENTS</h5>
<hr />
<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-12">
        <div class="mb-3">
            @foreach($data->getBrake->features_equipments_list as $feature)
                <span> {{ $feature->feature_name ?? '' }} </span>
            @endforeach
        </div>
    </div>
</div>
<!-- Start Feature & Equipments -->