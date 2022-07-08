<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Hash;
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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('first_name');
            $table->string('last_name')->nullable();
            $table->string('email')->unique();
            $table->string('password');
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
            $table->integer('is_active')->default(0);
            $table->integer('is_customer')->default(0);
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });


        User::create([
            'title' => 'Admin',
            'first_name' => 'Admin',
            'last_name' => 'Admin',
            'is_active' => 1,
            'description' => 'Admin',
            'email' => 'admin@project.com',
            'password' => Hash::make('123456789'),
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
