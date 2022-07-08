<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('drivers', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('first_name');
            $table->string('last_name')->nullable();
            $table->string('email');
            $table->string('description')->nullable();
            $table->string('mobile_num')->nullable();
            $table->string('telephone_num')->nullable();
            $table->string('emergency_num')->nullable();
            $table->string('company_name')->nullable();
            $table->string('address')->nullable();
            $table->string('city')->nullable();
            $table->string('post_code')->nullable();
            $table->string('county')->nullable();
            $table->string('country')->nullable();
            $table->string('unique_id')->nullable();
            $table->integer('commission')->nullable();
            $table->string('vehicle_make')->nullable();
            $table->string('vehicle_model')->nullable();
            $table->string('vehicle_body_type')->nullable();
            $table->string('vehicle_color')->nullable();
            $table->string('vehicle_plates')->nullable();
            $table->string('driving_license')->nullable();
            $table->string('driving_license_expiry_date')->nullable();
            $table->string('pco_license')->nullable();
            $table->string('pco_license_expiry_date')->nullable();
            $table->string('phv_license')->nullable();
            $table->string('phv_license_expiry_date')->nullable();
            $table->string('mot_license')->nullable();
            $table->string('mot_license_expiry_date')->nullable();
            $table->string('mot_license_expiry_time')->nullable();
            $table->string('insurance')->nullable();
            $table->string('insurance_expiry_date')->nullable();
            $table->string('insurance_expiry_time')->nullable();
            $table->string('national_insurance_num')->nullable();
            $table->string('bank_account')->nullable();
            $table->integer('is_active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('drivers');
    }
};
