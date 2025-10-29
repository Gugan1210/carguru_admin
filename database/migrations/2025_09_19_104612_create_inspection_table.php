<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('inspection', function (Blueprint $table) {
            $table->id();
            $table->string('car_category')->nullable();
            $table->longText('status')->nullable();
            $table->longText('topic')->nullable();
            $table->longText('area')->nullable();
            $table->longText('specific_area')->nullable();
            $table->longText('reasons')->nullable();
            $table->json('allow_capture')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inspection');
    }
};
