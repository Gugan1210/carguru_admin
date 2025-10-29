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
        Schema::create('car_makes', function (Blueprint $table) {
            $table->id();
            $table->string('car_id')->unique();
            $table->string('brand_id');
            $table->string('brand_country');
            $table->string('model_id');
            $table->string('variant_id');
            $table->string('body_type');
            $table->string('brand_emblem');
            $table->string('transmission');
            $table->string('fuel_type');
            $table->string('drive_train');
            $table->string('start_year');
            $table->string('end_year');
            $table->string('seat');
            $table->string('no_of_door');
            $table->string('exterior_color');
            $table->string('interior_color');
            $table->string('consumption');
            $table->string('mprs');
            $table->string('consumption_value_km_l');
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('car_makes');
    }
};
