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
        Schema::create('beautify_inspections', function (Blueprint $table) {
            $table->id();
            $table->string('promotion_id');
            $table->string('car_detail_id');
            $table->string('front_45')->nullable();
            $table->string('back_45')->nullable();
            $table->string('front_view')->nullable();
            $table->string('back_view')->nullable();
            $table->string('side')->nullable();
            $table->string('interior_front')->nullable();
            $table->string('interior_back')->nullable();
            $table->string('dashboard')->nullable();
            $table->string('speedometer')->nullable();
            $table->string('gear')->nullable();
            $table->string('engine')->nullable();
            $table->string('tyre')->nullable();
            $table->string('others')->nullable();
            $table->string('car_video')->nullable();
            $table->string('video_360')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('beautify_inspections');
    }
};
