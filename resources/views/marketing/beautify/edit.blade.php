<?php 
$fields = [
    'front_45',
    'back_45',
    'front_view',
    'back_view',
    'side',
    'interior_front',
    'interior_back',
    'dashboard',
    'speedometer',
    'gear',
    'engine',
    'tyre',
    'others',
    'car_video',
    'video_360'
];

use App\Traits\commonTrait;

$common = new class {
    use commonTrait;
};
?>

@extends('layouts.app', ['activePage' => 'table', 'title' => 'Users - Admin Panel - CarGuru', 'navName' => 'Table List', 'activeButton' => 'laravel'])
@section('content')
    <div class="page-wrapper">
        <div class="content">
            <div class="page-header">
                <div class="add-item d-flex">
                    <div class="page-title">
                        <h4 class="fw-bold">MARKETING / CAR BEAUTIFICATION</h4>
                        <h6>Manage your MARKETING / CAR BEAUTIFICATION</h6>
                    </div>
                </div>
            </div>
            @session('success')
                <div class="alert alert-success" role="alert">
                    {{ $value }}
                </div>
            @endsession
            @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="container-fluid py-4 bg-white">

                <!-- Car ID -->
                <div class="row mb-3 ">
                    <div class="col d-flex justify-content-end gap-2 h-25">
                        <button type="button" class="btn btn-warning top-btns" id="closeBtn">Clear All</button>
                        <button type="button" class="btn btn-warning  top-btns">Preview</button>
                        <!-- <button type="button" class="btn bg-light  top-btns" disabled>save</button>
                                                                                                      <button type="button" class="btn border-0 text-black" >close   &#x2715;</button> -->
                    </div>
                </div>
                <div class="row mb-3 d-flex">
                    <div class="col-10">
                        <label class="form-label small fw-bold">CAR ID</label>
                        <input type="text" class="form-control w-auto" value="{{ $carSeleted->carDetail->car_detail_id }}"
                            readonly>
                    </div>

                </div>

                <div class="row g-2">

                    <!-- Left: Ad Tile -->
                    <div class="col-md-3 mb-4">
                        <div class="card">
                            <div class="card-header p-0 border-0">
                                <div class=" shadow-sm border-0 rounded-0 overflow-hidden mb-0">
                                    <span class="plus-con"><i
                                            class="fa-solid fa-plus ms-2 text-dark bg-warning rounded-circle cursor-pointer d-flex align-items-center justify-content-center p-1 plus-icon"></i></span>
                                    {{-- Car Image --}}
                                    <div id="carCarousel" class="carousel slide position-relative" data-bs-ride="carousel">
                                        {{-- Carousel Indicators (dots) --}}
                                        <div class="carousel-indicators">
                                            <?php $i=0;?>
                                            @foreach ($fields as $field)
                                            @if (!empty($carbeautify->$field))
                                            @php $slideCount = $i++; @endphp
                                                <button type="button" data-bs-target="#carCarousel" data-bs-slide-to="{{ $slideCount }}"
                                                    class="active" aria-current="true" aria-label="{{ "Slide ".$slideCount }}"></button>
                                            @endif
                                            @endforeach
                                        </div>

                                        {{-- Carousel Items --}}
                                        <div class="carousel-inner">
@foreach ($fields as $field)
    @if (!empty($carbeautify->$field))
        <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
            <img src="{{ asset('storage/' . $carbeautify->$field) }}"
                class="d-block w-100"
                alt="Certified"
                style="height:200px; object-fit:cover;">
        </div>
    @endif
@endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- Card Body --}}
                            @if ($carSeleted->carDetail->getCarDetailCategory->key == 'A')
                            @include('marketing.beautify.as-it-is')
                            @elseif ($carSeleted->carDetail->getCarDetailCategory->key == 'B')
                            @include('marketing.beautify.bidding')
                            @elseif($carSeleted->carDetail->getCarDetailCategory->key == 'C')
                            @include('marketing.beautify.certified')
                            @else
                            @include('marketing.beautify.original')
                            @endif
                        </div>
                        <p class="paras">OVERALL AD TILE VIEW</p>
                    </div>


                    <!-- Middle: Product Page -->
                    <div class="col-lg-4">
                        <div class="card p-0 " style="height: 250px;">
                            {{-- Main Image --}}
                            <div class="position-relative">
                                 <div class="img-container d-flex align-items-end position-relative"
                                    style="height: 250px; ">
 
 
 
                                    @if (isset($carbeautify->front_45))
                                        <img src="{{ asset('storage/' . $carbeautify->front_45) }}" alt="Certified"
                                            class="Certified w-100 top-0 rounded" style="height: 250px; background-size: contain; background-position: center;    border-radius: 8px; ">
                                    @else
                                        <img src="{{ asset('storage/' . '/images/no-image.webp') }}" alt=" Certified"
                                            class="Certified w-100 top-0" style="height: 250px;  background-size: contain; background-position: center;    border-radius: 8px;">
                                    @endif
 
 
                                </div>
 
                                <span class="plus-con"><i
                                        class="fa-solid fa-plus ms-2 text-dark bg-warning rounded-circle cursor-pointer d-flex align-items-center justify-content-center p-1 plus-icon"></i></span>
                                {{-- Certified Badge --}}

                                <div class="position-absolute top-0 end-0 w-100">
                                    <div class="row d-flex justify-content-center gap-1 mb-3">
                                        <div class="col-4 d-flex p-0 w-25">
                                            <button class="btn-1 btn-dark btn-sm">Photos</button>

                                        </div>
                                        <div class="col-5 d-flex p-0 w-25 me-5">
                                            <button class="btn-1 btn-dark btn-sm">View Videos</button>
                                        </div>
                                        <div class="col-3 p-0">

                                            <button class="btn-1 btn-dark btn-sm w-100">View 360</button>
                                        </div>
                                    </div>
                                </div>
                            </div>



                            <div class="d-flex justify-content-center gap-2">

                                <div
                                    style="width: 100px; height: 70px; border-radius: 6px; 
                                                                                                                                        background: url('build/img/car-1.png')  
                                                                                                                                        center/cover no-repeat;">
                                </div>
                            </div>
                        </div>

                        <div class=" my-0">
                            <div class="row g-1">

                                <div class="col-md-4">
                                    <div class="center-img position-relative text-center">
                                        <span class="plus-con2"><i
                                                class="fa-solid fa-plus ms-2 text-dark bg-warning rounded-circle cursor-pointer d-flex align-items-center justify-content-center p-1 plus-icon"></i></span>
                                        @if (isset($carbeautify->back_45))
                                            <img src="{{ asset('storage/' . $carbeautify->back_45)}}" class="img w-100 h-100">
                                        @else
                                            <img src="{{ asset('storage/' . '/images/no-image.webp') }}"
                                                class="img w-100 h-100">
                                        @endif
                                        <div class="position-absolute top-50 start-50 translate-middle">
                                            <!-- <img src="{{ url('build/img/buy-subim.png') }}" class="img w-75">-->
                                        </div>
                                    </div>

                                </div>

                                <!-- Image 2 -->
                                <div class="col-md-4">
                                    <div class="center-img position-relative text-center">
                                        <span class="plus-con2"><i
                                                class="fa-solid fa-plus ms-2 text-dark bg-warning rounded-circle cursor-pointer d-flex align-items-center justify-content-center p-1 plus-icon"></i></span>
                                        @if (isset($carbeautify->front_view))
                                            <img src="{{ asset('storage/' . $carbeautify->front_view)}}"
                                                class="img w-100 h-100">
                                        @else
                                            <img src="{{ asset('storage/' . '/images/no-image.webp') }}"
                                                class="img w-100 h-100">
                                        @endif
                                        <div class="position-absolute top-50 start-50 translate-middle">
                                            <!-- <img src="{{ url('build/img/buy-subim.png') }}" class="img w-75">-->
                                        </div>
                                    </div>
                                </div>

                                <!-- Image 3 -->
                                <div class="col-md-4 ">
                                    <div class="center-img position-relative text-center">
                                        <span class="plus-con2"><i
                                                class="fa-solid fa-plus ms-2 text-dark bg-warning rounded-circle cursor-pointer d-flex align-items-center justify-content-center p-1 plus-icon"></i></span>
                                        @if (isset($carbeautify->back_view))
                                            <img src="{{ asset('storage/' . $carbeautify->back_view)}}" class="img w-100 h-100">
                                        @else
                                            <img src="{{ asset('storage/' . '/images/no-image.webp') }}"
                                                class="img w-100 h-100">
                                        @endif
                                        <div class="position-absolute top-50 start-50 translate-middle">
                                            <!-- <img src="{{ url('build/img/buy-subim.png') }}" class="img w-75">-->
                                        </div>
                                    </div>
                                </div>
                                <p class="mt-3 paras ">PRODUCT PAGE VIEW</p>
                            </div>
                        </div>


                    </div>

                    <!-- Right: Beautified Photos -->
                    <div class="col-lg-5">


                        <div class="card-body">
                            <form method="POST" action="{{ route('beautify.update', $carSeleted->id) }}"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row g-2 text-center">
                                    <input type="hidden" name="promotion_id" value="{{ $carSeleted->promotion_id }}">
                                    <input type="hidden" name="car_detail_id"
                                        value="{{ $carSeleted->carDetail->car_detail_id }}">
                                    <!-- Upload boxes with Bootstrap icons -->
                                    <div class="col-lg-3 col-md-4 col-sm-6">
                                        <div class="upload-box" id="uploadBox">
                                            <div class="preview" id="preview">
                                                @if(isset($carbeautify->front_45))
                                                    <img src="{{ asset('storage/' . $carbeautify->front_45) }}" alt="Front 45°"
                                                        style="width:70px; height:36px; object-fit:contain;">
                                                @endif
                                            </div>
                                            <label for="front_45">
                                                <div class="upload-content">
                                                    <i id="frt-45"
                                                        class="fa-solid fa-car {{ !empty($carbeautify->front_45) ? 'd-none' : '' }}"></i>
                                                    <small>Right Front 45°</small>
                                                </div>
                                            </label>
                                            <input type="file" id="front_45" name="front_45" accept="image/png, image/jpeg"
                                                hidden>
                                        </div>
                                    </div>

                                    <div class="col-lg-3 col-md-4 col-sm-6">
                                        <div class="upload-box" id="uploadBox">
                                            <div class="preview" id="preview-bck-45">
                                                @if(isset($carbeautify->back_45))
                                                    <img src="{{ asset('storage/' . $carbeautify->back_45) }}" alt="Front 45°"
                                                        style="width:70px; height:36px; object-fit:contain;">
                                                @endif
                                            </div>
                                            <label for="back_45">
                                                <div class="upload-content">
                                                    <i id="bck-45"
                                                        class="fa-solid fa-car {{ !empty($carbeautify->back_45) ? 'd-none' : '' }}"></i>
                                                    <small>Right Rear 45°</small>
                                                </div>
                                            </label>
                                            <input type="file" id="back_45" name="back_45" accept="image/png, image/jpeg"
                                                hidden>
                                        </div>
                                    </div>

                                    <div class="col-lg-3 col-md-4 col-sm-6">
                                        <div class="upload-box" id="uploadBox">
                                            <div class="preview" id="preview-frnt-view">
                                                @if(isset($carbeautify->front_view))
                                                    <img src="{{ asset('storage/' . $carbeautify->front_view) }}"
                                                        alt="Front 45°" style="width:70px; height:36px; object-fit:contain;">
                                                @endif
                                            </div>
                                            <label for="front_view">
                                                <div class="upload-content">
                                                    <i id="frnt-view"
                                                        class="fa-solid fa-car {{ !empty($carbeautify->front_view) ? 'd-none' : '' }}"></i>
                                                    <small>Exterior Front</small>
                                                </div>
                                            </label>
                                            <input type="file" id="front_view" name="front_view"
                                                accept="image/png, image/jpeg" hidden>
                                        </div>
                                    </div>

                                    <div class="col-lg-3 col-md-4 col-sm-6">
                                        <div class="upload-box" id="uploadBox">
                                            <div class="preview" id="preview-bck-view">
                                                @if(isset($carbeautify->back_view))
                                                    <img src="{{ asset('storage/' . $carbeautify->back_view) }}" alt="Front 45°"
                                                        style="width:70px; height:36px; object-fit:contain;">
                                                @endif
                                            </div>
                                            <label for="back_view">
                                                <div class="upload-content">
                                                    <i id="bck-view"
                                                        class="fa-solid fa-car {{ !empty($carbeautify->back_view) ? 'd-none' : '' }}"></i>
                                                    <small>Exterior Rear</small>
                                                </div>
                                            </label>
                                            <input type="file" id="back_view" name="back_view"
                                                accept="image/png, image/jpeg" hidden>
                                        </div>
                                    </div>

                                    <div class="col-lg-3 col-md-4 col-sm-6">
                                        <div class="upload-box" id="uploadBox">
                                            <div class="preview" id="preview-side">
                                                @if(isset($carbeautify->side))
                                                    <img src="{{ asset('storage/' . $carbeautify->side) }}" alt="Front 45°"
                                                        style="width:70px; height:36px; object-fit:contain;">
                                                @endif
                                            </div>
                                            <label for="side">
                                                <div class="upload-content">
                                                    <i id="icon-side"
                                                        class="fa-solid fa-car {{ !empty($carbeautify->side) ? 'd-none' : '' }}"></i>
                                                    <small>Exterior Right Side</small>
                                                </div>
                                            </label>
                                            <input type="file" id="side" name="side" accept="image/png, image/jpeg" hidden>

                                        </div>

                                    </div>

                                    <div class="col-lg-3 col-md-4 col-sm-6">

                                        <div class="upload-box" id="uploadBox">
                                            <div class="preview" id="preview-interior_front">
                                                @if(isset($carbeautify->interior_front))
                                                    <img src="{{ asset('storage/' . $carbeautify->interior_front) }}"
                                                        alt="Front 45°" style="width:70px; height:36px; object-fit:contain;">
                                                @endif
                                            </div>
                                            <label for="interior_front">
                                                <div class="upload-content">
                                                    <i id="icon-interior_front"
                                                        class="fa-solid fa-car {{ !empty($carbeautify->interior_front) ? 'd-none' : '' }}"></i>
                                                    <small>Interior Front</small>
                                                </div>
                                            </label>
                                            <input type="file" id="interior_front" name="interior_front"
                                                accept="image/png, image/jpeg" hidden>

                                        </div>

                                    </div>


                                    <div class="col-lg-3 col-md-4 col-sm-6">

                                        <div class="upload-box" id="uploadBox">
                                            <div class="preview" id="preview-interior_back">
                                                @if(isset($carbeautify->interior_back))
                                                    <img src="{{ asset('storage/' . $carbeautify->interior_back) }}"
                                                        alt="Front 45°" style="width:70px; height:36px; object-fit:contain;">
                                                @endif
                                            </div>
                                            <label for="interior_back">
                                                <div class="upload-content">
                                                    <i id="icon-interior_back"
                                                        class="fa-solid fa-car {{ !empty($carbeautify->interior_back) ? 'd-none' : '' }}"></i>
                                                    <small>Interior Rear</small>
                                                </div>
                                            </label>
                                            <input type="file" id="interior_back" name="interior_back"
                                                accept="image/png, image/jpeg" hidden>

                                        </div>

                                    </div>


                                    <div class="col-lg-3 col-md-4 col-sm-6">

                                        <div class="upload-box" id="uploadBox">
                                            <div class="preview" id="preview-dashboard">
                                                @if(isset($carbeautify->dashboard))
                                                    <img src="{{ asset('storage/' . $carbeautify->dashboard) }}" alt="Front 45°"
                                                        style="width:70px; height:36px; object-fit:contain;">
                                                @endif
                                            </div>
                                            <label for="dashboard-img">
                                                <div class="upload-content">
                                                    <i id="icon-dashboard"
                                                        class="fa-solid fa-car {{ !empty($carbeautify->dashboard) ? 'd-none' : '' }}"></i>
                                                    <small>Dashboard</small>
                                                </div>
                                            </label>
                                            <input type="file" id="dashboard-img" name="dashboard-img"
                                                accept="image/png, image/jpeg" hidden>

                                        </div>

                                    </div>



                                    <div class="col-lg-3 col-md-4 col-sm-6">

                                        <div class="upload-box" id="uploadBox">
                                            <div class="preview" id="preview-speedometer">
                                                @if(isset($carbeautify->speedometer))
                                                    <img src="{{ asset('storage/' . $carbeautify->speedometer) }}"
                                                        alt="Front 45°" style="width:70px; height:36px; object-fit:contain;">
                                                @endif
                                            </div>
                                            <label for="speedometer">
                                                <div class="upload-content">
                                                    <i id="icon-speedometer"
                                                        class="fa-solid fa-car {{ !empty($carbeautify->speedometer) ? 'd-none' : '' }}"></i>
                                                    <small>Odometer</small>
                                                </div>
                                            </label>
                                            <input type="file" id="speedometer" name="speedometer"
                                                accept="image/png, image/jpeg" hidden>

                                        </div>

                                    </div>


                                    <div class="col-lg-3 col-md-4 col-sm-6">

                                        <div class="upload-box" id="uploadBox">
                                            <div class="preview" id="preview-gear">
                                                @if(isset($carbeautify->gear))
                                                    <img src="{{ asset('storage/' . $carbeautify->gear) }}" alt="Front 45°"
                                                        style="width:70px; height:36px; object-fit:contain;">
                                                @endif
                                            </div>
                                            <label for="gear">
                                                <div class="upload-content">
                                                    <i id="icon-gear"
                                                        class="fa-solid fa-car {{ !empty($carbeautify->gear) ? 'd-none' : '' }}"></i>
                                                    <small>Gear</small>
                                                </div>
                                            </label>
                                            <input type="file" id="gear" name="gear" accept="image/png, image/jpeg" hidden>

                                        </div>

                                    </div>


                                    <div class="col-lg-3 col-md-4 col-sm-6">

                                        <div class="upload-box" id="uploadBox">
                                            <div class="preview" id="preview-engine">
                                                @if(isset($carbeautify->engine))
                                                    <img src="{{ asset('storage/' . $carbeautify->engine) }}" alt="Front 45°"
                                                        style="width:70px; height:36px; object-fit:contain;">
                                                @endif
                                            </div>
                                            <label for="engine">
                                                <div class="upload-content">
                                                    <i id="icon-engine"
                                                        class="fa-solid fa-car {{ !empty($carbeautify->engine) ? 'd-none' : '' }}"></i>
                                                    <small>Engine</small>
                                                </div>
                                            </label>
                                            <input type="file" id="engine" name="engine" accept="image/png, image/jpeg"
                                                hidden>

                                        </div>

                                    </div>


                                    <div class="col-lg-3 col-md-4 col-sm-6">

                                        <div class="upload-box" id="uploadBox">
                                            <div class="preview" id="preview-tyre">
                                                @if(isset($carbeautify->tyre))
                                                    <img src="{{ asset('storage/' . $carbeautify->tyre) }}" alt="Front 45°"
                                                        style="width:70px; height:36px; object-fit:contain;">
                                                @endif
                                            </div>
                                            <label for="tyre">
                                                <div class="upload-content">
                                                    <i id="icon-tyre"
                                                        class="fa-solid fa-car {{ !empty($carbeautify->tyre) ? 'd-none' : '' }}"></i>
                                                    <small>Tyre</small>
                                                </div>
                                            </label>
                                            <input type="file" id="tyre" name="tyre" accept="image/png, image/jpeg" hidden>

                                        </div>

                                    </div>


                                    <div class="col-lg-3 col-md-4 col-sm-6">

                                        <div class="upload-box" id="uploadBox">
                                            <div class="preview" id="preview-others">
                                                @if(isset($carbeautify->others))
                                                    <img src="{{ asset('storage/' . $carbeautify->others) }}" alt="Front 45°"
                                                        style="width:70px; height:36px; object-fit:contain;">
                                                @endif
                                            </div>
                                            <label for="others">
                                                <div class="upload-content">
                                                    <i id="icon-others"
                                                        class="fa-solid fa-car {{ !empty($carbeautify->others) ? 'd-none' : '' }}"></i>
                                                    <small>Others</small>
                                                </div>
                                            </label>
                                            <input type="file" id="others" name="others" accept="image/png, image/jpeg"
                                                hidden>

                                        </div>

                                    </div>

                                    <div class="col-lg-3 col-md-4 col-sm-6">

                                        <div class="upload-box" id="uploadBox">
                                            <div class="preview" id="preview-car_video">
                                                @if(isset($carbeautify->car_video))
                                                    <img src="{{ asset('storage/' . $carbeautify->car_video) }}" alt="Front 45°"
                                                        style="width:70px; height:36px; object-fit:contain;">
                                                @endif
                                            </div>
                                            <label for="car_video">
                                                <div class="upload-content">
                                                    <i id="icon-car_video"
                                                        class="fa-solid fa-car {{ !empty($carbeautify->car_video) ? 'd-none' : '' }}"></i>
                                                    <small>Car Video</small>
                                                </div>
                                            </label>
                                            <input type="file" id="car_video" name="car_video"
                                                accept="image/png, image/jpeg" hidden>

                                        </div>

                                    </div>

                                    <div class="col-lg-3 col-md-4 col-sm-6">

                                        <div class="upload-box" id="uploadBox">
                                            <div class="preview" id="preview-360_video">
                                                @if(isset($carbeautify->video_360))
                                                    <img src="{{ asset('storage/' . $carbeautify->video_360) }}" alt="Front 45°"
                                                        style="width:70px; height:36px; object-fit:contain;">
                                                @endif
                                            </div>
                                            <label for="360_video">
                                                <div class="upload-content">
                                                    <i id="icon-360_video"
                                                        class="fa-solid fa-car {{ !empty($carbeautify->video_360) ? 'd-none' : '' }}"></i>
                                                    <small>360° Video</small>
                                                </div>
                                            </label>
                                            <input type="file" id="360_video" name="360_video"
                                                accept="image/png, image/jpeg" hidden>

                                        </div>

                                    </div>


                                </div>
                                <div class="row mt-3">
                                    <div class="col-5 p-1">
                                        <p class="paras ms-1">ADD BEAUTIFIED PHOTOS</p>
                                    </div>
                                    <div class="col-7 p-0">
                                        <small class="drag">Simply drag & drop file OR Click photo to select your image. You
                                            can add Multiple Images within same box.</small>
                                    </div>
                                </div>
                                <div class="col-lg-12 mt-4">
                                    <div class="d-flex align-items-center justify-content-end mb-4">
                                        <!-- <button type="button" class="btn btn-secondary me-2">Cancel</button> -->
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    <style>
        .carousel-indicators [data-bs-target] {
            width: 10px;
            height: 10px;
            border-radius: 50%;
            background-color: #fff;
            opacity: 0.5;
            transition: opacity 0.3s;
            border: none;
            margin: 0 4px;
        }

        .carousel-indicators .active {
            opacity: 1;
            background-color: #ffbd00;
        }

        .top-btns {
            background-color: #e8e8e8;
            border: none;

        }

        .paras {
            font-size: 0.7rem !important;
            color: #000;
        }

        /* Upload CarMake */
        .Promo {
            font-size: 9px;
            margin-left: 4px;
        }

        .drag {
            font-size: 9px;
        }

        .carousel-item img {
            height: 220px;
            object-fit: cover;
        }

        .center-img {
            height: 140px;
        }

        .best {
            margin-bottom: 3px;
            font-size: 10px;
            margin-top: 6px;
        }

        .promo-details {
            margin: 0 -8px;
        }

        .plus-con {
            /* width: 25px; */
            height: auto;
            position: absolute;
            top: 6px;
            z-index: 30;
            right: 4%;
        }

        .plus-con2 {
            /* width: 25px; */
            height: auto;
            position: absolute;
            top: 45%;
            z-index: 30;
            right: 43%;
        }

        .plus-icon {
            font-size: 9px !important;
        }

        .deal {
            font-size: 8px;
            height: 38px;
        }

        .details {

            height: 38px;
        }

        .img-1 {
            width: 100%;
            height: 150px;
        }

        .upload-box {
            border: 2px dashed #ccc;
            border-radius: 6px;
            width: 105px;
            height: 80px;
            padding: 10px;
            text-align: center;
            cursor: pointer;
            transition: border-color 0.3s;
            background: #ffffff;
        }

        .Certified {
            max-height: 250px;
        }

        .upload-box:hover {
            border-color: #777;
        }

        .upload-content i {
            font-size: 25px;
            display: block;
            margin: 8px 8px;
            color: gray;
        }

        .upload-content p {
            font-weight: bold;
            margin: 0;
            font-size: 12px;
            color: gray;
        }

        .upload-content small {
            color: #666;
            font-size: 9px;
        }

        .upload-box-sm {
            width: 186px;
        }

        .upload-content-sm p {
            font-size: 12px;
        }

        .upload-content-sm small {
            font-size: 10px;
        }

        .preview img {
            width: 70px;
            height: 36px;
            object-fit: contain;
            border-radius: 0px !important;
            border: 0px !important;
            background: #fff;
            padding: 2px;
        }

        .btn-1 {
            margin-top: 220px;
            background: none;
            color: white;
            font-size: 10px;
            border-radius: 5px;
        }
    </style>
    <script>
        // Attach once after DOM is ready
        document.addEventListener("DOMContentLoaded", function () {
            previewImage("front_45", "preview", "frt-45");
        });

        document.addEventListener("DOMContentLoaded", function () {
            previewImage("back_45", "preview-bck-45", "bck-45");
        });

        document.addEventListener("DOMContentLoaded", function () {
            previewImage("front_view", "preview-frnt-view", "frnt-view");
        });

        document.addEventListener("DOMContentLoaded", function () {
            previewImage("back_view", "preview-bck-view", "bck-view");
        });

        document.addEventListener("DOMContentLoaded", function () {
            previewImage("side", "preview-side", "icon-side");
        });

        document.addEventListener("DOMContentLoaded", function () {
            previewImage("interior_front", "preview-interior_front", "icon-interior_front");
        });

        document.addEventListener("DOMContentLoaded", function () {
            previewImage("interior_back", "preview-interior_back", "icon-interior_back");
        });

        document.addEventListener("DOMContentLoaded", function () {
            previewImage("dashboard-img", "preview-dashboard", "icon-dashboard");
        });

        document.addEventListener("DOMContentLoaded", function () {
            previewImage("speedometer", "preview-speedometer", "icon-speedometer");
        });

        document.addEventListener("DOMContentLoaded", function () {
            previewImage("gear", "preview-gear", "icon-gear");
        });

        document.addEventListener("DOMContentLoaded", function () {
            previewImage("engine", "preview-engine", "icon-engine");
        });

        document.addEventListener("DOMContentLoaded", function () {
            previewImage("tyre", "preview-tyre", "icon-tyre");
        });

        document.addEventListener("DOMContentLoaded", function () {
            previewImage("others", "preview-others", "icon-others");
        });

        document.addEventListener("DOMContentLoaded", function () {
            previewImage("car_video", "preview-car_video", "icon-car_video");
        });

        document.addEventListener("DOMContentLoaded", function () {
            previewImage("360_video", "preview-360_video", "icon-360_video");
        });


        function previewImage(field_id, preview_id, label_id) {
            const input = document.getElementById(field_id);
            const preview = document.getElementById(preview_id);
            const labelIcon = document.getElementById(label_id);

            input.addEventListener("change", function (event) {
                preview.innerHTML = ""; // Clear old preview
                const file = event.target.files[0];

                if (file && file.type.match("image.*")) {
                    const reader = new FileReader();
                    reader.onload = function (e) {
                        let img = document.createElement("img");
                        img.src = e.target.result;
                        img.style.maxWidth = "100%";
                        img.style.borderRadius = "8px";
                        preview.appendChild(img);
                        labelIcon.classList.add("d-none");
                    };
                    reader.readAsDataURL(file);
                } else {
                    input.value = "";
                    preview.innerHTML = "";
                    labelIcon.classList.remove("d-none");
                }
            });
        }

        document.getElementById("closeBtn").addEventListener("click", function () {
            const fileInputs = document.querySelectorAll('input[type="file"]');
            fileInputs.forEach((input) => {
                input.value = ""; // Clear the file input
            });

            const previewContainers = document.querySelectorAll('[id^="preview"]');
            previewContainers.forEach((preview) => {
                preview.innerHTML = ""; // Clear the image preview
            });

            // Restore the label icons
            const icons = document.querySelectorAll('[id^="icon-"], [id^="frt-"], [id^="bck-"]');
            icons.forEach((icon) => icon.classList.remove("d-none"));
        });

    </script>

@endsection