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
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description');
            $table->string('disable_info');
            $table->integer('max_vehicle_amount')->default(0);;
            $table->integer('passengers')->default(0);
            $table->integer('luggage')->default(0);
            $table->bigInteger('rate_per_hour')->default(0);
            $table->bigInteger('rate_per_day')->default(0);
            $table->integer('hand_luggage')->default(0);
            $table->integer('child_seats')->default(0);
            $table->integer('baby_seats')->default(0);
            $table->integer('wheel_chairs')->default(0);
            $table->integer('is_default')->default(0);
            $table->integer('is_active')->default(0);
            $table->integer('sort_order')->default(0);
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
        Schema::dropIfExists('vehicles');
    }
};
