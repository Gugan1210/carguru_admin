<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdPlacementController;
use App\Http\Controllers\AdTopicController;
use App\Http\Controllers\AdvertismentController;
use App\Http\Controllers\BeautifyController;
use App\Http\Controllers\ImagesController;

use App\Http\Controllers\UserController;

Route::prefix('adplacements')->group(function () {
    Route::get('/', [AdPlacementController::class, 'index']);     // List all
    Route::post('/', [AdPlacementController::class, 'store']);    // Create
    Route::get('/{id}', [AdPlacementController::class, 'show']);  // Show single
    Route::put('/{id}', [AdPlacementController::class, 'update']); // Update
    Route::delete('/{id}', [AdPlacementController::class, 'destroy']); // Delete
});

Route::prefix('adtopics')->group(function () {
    Route::get('/', [AdTopicController::class, 'index']);
    Route::post('/', [AdTopicController::class, 'store']);
    Route::get('/{id}', [AdTopicController::class, 'show']);
    Route::put('/{id}', [AdTopicController::class, 'update']);
    Route::delete('/{id}', [AdTopicController::class, 'destroy']);
});

Route::prefix('advertisements')->group(function () {
    Route::get('/', [AdvertismentController::class, 'index']);       // List all ads
    Route::get('/{id}', [AdvertismentController::class, 'getBannerById']); // Get single ad
    Route::post('/', [AdvertismentController::class, 'store']);      // Create ad
    Route::put('/{id}', [AdvertismentController::class, 'update']);  // Update ad
    Route::delete('/{id}', [AdvertismentController::class, 'destroy']); // Delete ad
});

Route::get('beautify-inspections', [BeautifyController::class, 'index']);
Route::get('beautify-inspections/{id}', [BeautifyController::class, 'show']);
Route::post('beautify-inspections', [BeautifyController::class, 'store']);
Route::post('beautify-inspections/{id}', [BeautifyController::class, 'update']);
Route::delete('beautify-inspections/{id}', [BeautifyController::class, 'destroy']);


Route::post('/get-otp', [UserController::class, 'getOtp']);
Route::post('/verify-otp', [UserController::class, 'verifyOtp']);