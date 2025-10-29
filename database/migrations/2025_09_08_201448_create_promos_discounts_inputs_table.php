<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Validation\Rules\Unique;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('promos_discounts_inputs', function (Blueprint $table) {
            $table->id();
            $table->string(column: 'promotion_id')->Unique();
            $table->string('country_id');
            $table->string('brand_id');
            $table->string('model_id');
            $table->string('body_type_id')->nullable();
            $table->string('fuel_type_id')->nullable();
            $table->json('price')->nullable();
            $table->json('year')->nullable();
            $table->string('transmission')->nullable();
            $table->json('mileage')->nullable();
            $table->string('color')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('promos_discounts_inputs');
    }
};
