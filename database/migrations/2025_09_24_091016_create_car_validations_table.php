<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('car_validations', function (Blueprint $table) {
            $table->id();
            $table->string('brand_id');
            $table->string('model_id');
            $table->string('msrp');
            $table->string('platform_discount');
            $table->string('base_mileage_per_year');
            $table->json('car_depreciation');
            $table->json('other_aging_depreciation');
            $table->string('no_accident');
            $table->string('minor_accidend');
            $table->string('major_accident');
            $table->string('severe_flooding');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('car_validations');
    }
};
