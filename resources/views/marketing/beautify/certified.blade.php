<?php 
if ($carSeleted->getCarDiscount->discount_format == 'percentage_discount') {
    $offer = $carSeleted->getCarDiscount->percentage_discount;
    $discountAmount = ((float) $carSeleted->carDetail->car_info_price * (float) $offer) / 100;
    if ($carSeleted->getCarDiscount->discount == 'bump_discount_type') {
        $stricPrice = (float) $carSeleted->carDetail->car_info_price + $discountAmount;
        $finalPrice = $stricPrice - $discountAmount;
    }
    if ($carSeleted->getCarDiscount->discount == 'straight_discount_type') {
        $stricPrice = (float) $carSeleted->carDetail->car_info_price;
        $finalPrice = (float) $carSeleted->carDetail->car_info_price - $discountAmount;
    }
}
if ($carSeleted->getCarDiscount->discount_format == 'amount_discount') {
    // Remove any non-numeric characters (like RM, commas, etc.)
    $amount = $carSeleted->getCarDiscount->amount_discount;
    if ($carSeleted->getCarDiscount->discount == 'bump_discount_type') {
        $stricPrice = (float) $carSeleted->carDetail->car_info_price + (float) $amount;
        $finalPrice = $stricPrice - (float) $amount;
    }
    if ($carSeleted->getCarDiscount->discount == 'straight_discount_type') {
        $stricPrice = (float) $carSeleted->carDetail->car_info_price;
        $finalPrice = (float) $carSeleted->carDetail->car_info_price - (float) $amount;
    }
}
?>
<div class="card-body pt-0 px-2">
    <!-- Promo Banner -->
    <div class="row mb-3 promo-details">
        <div class="col-6 deal bg-danger text-white small fw-light px-1 py-0">
            <p class="best fw-bold text-center">{{ $carSeleted->getCarDiscount->promotion_name ?? '' }}</p>
            <p class="Promo text-center">Promo till
                {{ \Carbon\Carbon::parse($carSeleted->getCarDiscount->end_date)->format('d F Y') ?? '' }}
            </p>
        </div>
        <div class="col-6 details bg-warning text-dark fw-bold">
            <?php $parts = explode(' ', $carSeleted->getCarDiscount->promotion_detail, 3);?>
            <span>{{ $parts[0] ?? '' }}</span><span style="font-size: 22px;"><b> {{ $parts[1] ?? '' }}
                </b></span><span><b>{{ $parts[2] ?? '' }}</b></span>
        </div>
    </div>

    <!-- <p class="text-black small mb-0">RM450 p.m. 8-year Loan</p> -->
    <div class="row">
        <div class="col-9">
            <?php $loan = $common->minimumLoan($carSeleted->carDetail->car_info_price); ?>
            <p class="mb-0"><small class="text-danger">RM</small> <b
                    class="text-danger fs-4">{{ $loan['monthly_payment'] }}</b><small class="text-danger"> /
                    mth </small><small>({{ $loan['tenure_years'] }} Year Loan)</small>
            </p>
        </div>
        <div class="col-3 d-flex justify-content-end align-items-center gap-2">
            <img src="{{ url('build/img/social_share.png') }}" class="img-fluid" style="width: 20px;">
            <img src="{{ url('build/img/social_like.png') }}" class="img-fluid" style="width: 20px;">
        </div>
    </div>
    <!-- Price -->
    <h5 class="small mb-1">
        <span>Car Price: </span>
        <?php
if ($carSeleted->getCarDiscount->display != 'discounted_price_only') {
        ?>
        <span>RM</span>
        <small class="strike-red">
            {{ $stricPrice ?? '-' }}
        </small>
        <?php
}
        ?>
        <small> RM {{ !empty($finalPrice) ? $finalPrice : '' }}</small>
    </h5>

    <!-- Certification Badge -->
    <img src="{{ asset('storage/' . $carSeleted->carDetail->getCarDetailCategory->image) }}" class="img w-75">

    <h6 class="fw-bold mb-1">
        {{ $carSeleted->carDetail->car_info_car_make_year ?? '-' }}
        {{ $carSeleted->carDetail->getVariant->model->model_name ?? '-' }}
    </h6>


    <p class="text-black small mb-1">{{ $carSeleted->carDetail->getVariant->variant_name ?? '-' }}</p>
    <p class="text-black small mb-2">{{ $carSeleted->carDetail->mileage ?? '-' }} km <small
            class="text-danger">|</small>
        {{ $carSeleted->transmission ?? '-' }} <small class="text-danger">|</small>
        {{ $carSeleted->carDetail->getBranchCenter->name ?? '-'}}
    </p>
</div>

<style>
    .strike-red {
        position: relative;
        color: #000;
        /* keep text black */
    }

    .strike-red::after {
        content: "";
        position: absolute;
        left: 0;
        right: 0;
        top: 50%;
        border-top: 2px solid red;
        /* red strikethrough line */
        transform: translateY(-45%);
    }
</style>