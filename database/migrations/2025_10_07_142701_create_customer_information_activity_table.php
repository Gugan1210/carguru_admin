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
        Schema::create('customer_information_activity', function (Blueprint $table) {
            $table->id();
            $table->string('car_register_number')->nullable();
            $table->string('payment_mode')->nullable();
            $table->string('payment_category')->nullable();
            $table->string('confirmation')->nullable();
            $table->string('attach_receipt')->nullable();
            $table->string('loanurl')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customer_information_activity');
    }
};
