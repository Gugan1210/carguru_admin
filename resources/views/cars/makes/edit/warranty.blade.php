<div class="row">
    <div class="col-sm-4">
        <h5>CAR WARRANTIES</h5>
        <hr />
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="mb-3">
                    <label class="form-label">Manufacturer’s Warranty<span class="text-danger ms-1">*</span></label>
                    <select id="manufacturers_warranty" name="manufacturers_warranty" class="form-control select2-ajax"
                        data-placeholder="Select or Add Manufacturers Warranty"
                        data-search-url="{{ route('manufacturersWarranty.search') }}"
                        data-selected-id="{{ $carMake->getWarranty->getManufacturersWarranty->id ?? '' }}"
                        data-selected-text="{{ $carMake->getWarranty->getManufacturersWarranty->name ?? '' }}">
                    </select>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="mb-3">
                    <label class="form-label">CARGURU’s Warranty<span class="text-danger ms-1">*</span></label>
                    <select id="cargurus_warranty" name="cargurus_warranty" class="form-control select2-ajax"
                        data-placeholder="Select or Add Cargurus Warranty"
                        data-search-url="{{ route('cargurusWarranty.search') }}"
                        data-selected-id="{{ $carMake->getWarranty->getCargurusWarranty->id ?? '' }}"
                        data-selected-text="{{ $carMake->getWarranty->getCargurusWarranty->name ?? '' }}">
                    </select>
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
                    <label class="form-label">Amount<span class="text-danger ms-1">*</span></label>
                    <input type="text" id="road_tax_amount_rm" name="road_tax_amount_rm" class="form-control"
                        placeholder="Enter Amount" value="{{ $carMake->getWarranty->road_tax_amount_rm ?? '' }}">
                </div>
            </div>

        </div>
    </div>
    <div class="col-sm-4"></div>
</div>