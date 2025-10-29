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
        Schema::create('advertisements', function (Blueprint $table) {
            $table->id();
            $table->string('ad_placement');
            $table->string('ad_topic');
            $table->string('banner_id')->nullable();
            $table->json('set')->nullable();
            $table->string('headline_content_text')->nullable();
            $table->boolean('is_marqee')->default('0');
            $table->string('promotion_id')->nullable();
            $table->boolean('status')->default('0');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('advertisments');
    }
};
