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
        Schema::create('car_warranties', function (Blueprint $table) {
            $table->id();
            $table->string('manufacturers_warranty')->nullable();
            $table->string('cargurus_warranty')->nullable();
            $table->string('road_tax_amount_rm')->nullable();
            $table->string('road_tax_year')->nullable();
            $table->string('car_make_id')->unique();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('car_warranties');
    }
};
