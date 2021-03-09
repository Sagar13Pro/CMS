<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComplaintsTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('UserComplaints', function (Blueprint $table) {
            $table->id();
            $table->string('foreignEmail', 40);
            $table->foreign('foreignEmail')->on('users')->references('Email');
            $table->integer('user_id');
            $table->bigInteger('Complaint_ID');
            $table->string('status');
            $table->string('ComplaintType', 30);
            $table->string('ComplaintCategory', 30);
            $table->string('SubCategory', 30);
            $table->string('AuthDept');
            $table->string('ComplaintNature', 30);
            $table->string('District', 30);
            $table->string('City', 30);
            $table->Integer('Pincode');
            $table->string('ReferenceNo', 30);
            $table->string('ComplaintDetails', 100);
            $table->string('Doc1FileName')->nullable();
            $table->string('Doc2FileName')->nullable();
            $table->date('ComplaintDate');
            $table->string("Remarks")->nullable();
            $table->timestampTz('updated_at')->nullable();
            $table->timestamp('created_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('UserComplaints');
    }
}
