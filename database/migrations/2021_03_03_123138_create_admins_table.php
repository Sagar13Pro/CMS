<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->id();
            $table->string('firstName', 50);
            $table->string('lastName', 50);
            $table->string('email', 70)->unique();
            $table->bigInteger('mobileNo')->nullable();
            $table->string('state', 50)->nullable();
            $table->string('city', 50)->nullable();
            $table->string('gender', 10)->nullable();
            $table->boolean('email_verified')->nullable();
            $table->string('password')->nullable();
            $table->string('avatar')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('admins');
    }
}
