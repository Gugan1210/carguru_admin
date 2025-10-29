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
        Schema::create('fee_tax', function (Blueprint $table) {
            $table->id();
            $table->string('booking_amount')->nullable();
            $table->json('handling_fee')->nullable();
            $table->json('inspection_fee')->nullable();
            $table->json('platform_fee')->nullable();
            $table->string('platform_fee_more_than')->nullable();
            $table->string('platform_fee_chargeable_fee')->nullable();
            $table->json('dealers_fee')->nullable();
            $table->string('other_type_fee')->nullable();
            $table->string('other_type_amount')->nullable();
            $table->json('tax_fee')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fee_tax');
    }
};
