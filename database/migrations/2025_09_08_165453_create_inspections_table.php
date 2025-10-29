<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('inspections', function (Blueprint $table) {
            $table->id();
            $table->string('car_category')->nullable();
            $table->string('status')->nullable();        
            $table->string('status_icon')->nullable();
            $table->string('topic')->nullable();        
            $table->string('area')->nullable();      
            $table->string('specific_area')->nullable(); 
            $table->string('reasons')->nullable();       
            $table->string('notes')->nullable();       
            $table->timestamps();   
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('inspections');
    }
};