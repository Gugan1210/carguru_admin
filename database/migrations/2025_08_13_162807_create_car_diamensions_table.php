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
        Schema::create('car_diamensions', function (Blueprint $table) {
            $table->id();
            $table->float('length_mm')->nullable();
            $table->float('weight_mm')->nullable();
            $table->float('height_mm')->nullable();
            $table->float('wheel_base_mm')->nullable();
            $table->float('kerb_weight_kg')->nullable();
            $table->float('fuel_tank_ltr')->nullable();
            $table->string('car_make_id')->unique();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('car_diamensions');
    }
};
