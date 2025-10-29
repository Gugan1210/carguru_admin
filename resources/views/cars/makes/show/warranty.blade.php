<div class="row">
    <div class="col-sm-4">
        <h5>CAR WARRANTIES</h5>
        <hr />
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="mb-3">
                    <label class="form-label">Manufacturer’s Warranty: </label>
                    <span>{{ $data->getWarranty->getManufacturersWarranty->name ?? '' }}</span>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="mb-3">
                    <label class="form-label">CARGURU’s Warranty: </label>
                    <span>{{ $data->getWarranty->getCargurusWarranty->name ?? '' }}</span>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-4">
        <h5>ROAD TAX</h5>
        <hr />
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="mb-3">
                    <label class="form-label">Amount: </label>
                    <span>{{ $data->getWarranty->road_tax_amount_rm ?? '' }}</span>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="mb-3">
                    <label class="form-label">Year: </label>
                    <span>{{ $data->getWarranty->road_tax_year ?? '' }} Years</span>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-4"></div>
</div>