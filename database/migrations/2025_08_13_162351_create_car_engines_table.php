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
        Schema::create('car_engines', function (Blueprint $table) {
            $table->id();
            $table->string('engine_cc')->nullable();
            $table->string('engine_type')->nullable();
            $table->string('compression_ratio')->nullable();
            $table->string('peak_power_kw')->nullable();
            $table->string('peak_torque_nm')->nullable();
            $table->string('car_make_id')->unique();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('car_engines');
    }
};
