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
        Schema::create('staffs', function (Blueprint $table) {
            $table->id();
            $table->string("staff_id");
            $table->string("business_unit");
            $table->string("department");
            $table->string("status");
            $table->string("designated_role");
            $table->string("designated_location");
            $table->string("specific_function")->nullable();
            $table->string("name");
            $table->string("i_c_number");
            $table->string("gender");
            $table->string("race");
            $table->string("contact_number");
            $table->string("email");
            $table->string("address_line_1");
            $table->string("address_line_2");
            $table->string("postcode");
            $table->string("state_id");
            $table->string("city_id");
            $table->string("emergency_name");
            $table->string("emergency_contact");
            $table->string("relationship");
            $table->string("bank_name");
            $table->string("bank_account_number");
            $table->string("profile_image");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('staffs');
    }
};
