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
        Schema::create('car_accidents', function (Blueprint $table) {
            $table->id();
            $table->integer('car_detail_id');
            $table->string('owner');
            $table->string('usage');
            $table->string('car_accident');
            $table->string('flood_car');
            $table->string('manufacturers_warranty');
            $table->string('cargurus_warranty');
            $table->string('road_tax_amount');
            $table->string('road_tax_year');
            $table->string('inspector_feedback_comment')->nullable();
            $table->string('carguru_spotlight_header_copy')->nullable();
            $table->string('carguru_spotlight_body_copy')->nullable();
            $table->string('voc_document');
            $table->string('roadtax_document');
            $table->string('picture_of_keys');
            $table->string('others');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('car_accidents');
    }
};
