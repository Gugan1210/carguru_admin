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
        Schema::create('car_selected_promos', function (Blueprint $table) {
            $table->id();
            $table->string('promotion_id');
            $table->string('car_detail_id');
            $table->string('transmission');
            $table->boolean('is_expired')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('car_selected_promos');
    }
};
