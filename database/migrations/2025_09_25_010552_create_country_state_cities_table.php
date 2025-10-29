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
        Schema::create('country_state_cities', function (Blueprint $table) {
            $table->id();
            $table->string('country_id');
            $table->string('state_id');
            $table->string('city_name');
            $table->string('lat');
            $table->string('lng');
            $table->boolean('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('country_state_cities');
    }
};
