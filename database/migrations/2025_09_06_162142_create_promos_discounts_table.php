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
        Schema::create('promos_discounts', function (Blueprint $table) {
            $table->id();
            $table->string('promotion_id')->unique();
            $table->string('promotion_name')->unique();
            $table->string('promotion_detail');
            $table->date('start_date');
            $table->date('end_date');
            $table->time('start_time');
            $table->time('end_time');
            $table->integer('car_category');
            $table->json('shortlist_car_promo_input');
            $table->json('car_detail_id_promo');
            $table->json('registration_number')->nullable();
            $table->string('discount')->nullable();
            $table->string('display')->nullable();
            $table->string('discount_format')->nullable();
            $table->float('percentage_discount')->nullable();
            $table->float('amount_discount')->nullable();
            $table->boolean('is_expired')->default(0);
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('promos_discounts');
    }
};
