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
        Schema::create('commission', function (Blueprint $table) {
            $table->id();
            $table->string('commission_id')->unique(); // CM250209-000001
            $table->string('designated_role')->nullable();
            $table->string('business_unit')->nullable();
            $table->string('department')->nullable();
            $table->string('commission_type')->nullable();
            $table->string('duration')->nullable();
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->string('commission_category')->nullable();
            $table->string('commission_duration')->nullable();
            $table->date('commission_start_date')->nullable();
            $table->date('commission_end_date')->nullable();
            $table->string('commission_description')->nullable();
            $table->json('tiered_category')->nullable();
            $table->boolean('status')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('commission');
    }
};
