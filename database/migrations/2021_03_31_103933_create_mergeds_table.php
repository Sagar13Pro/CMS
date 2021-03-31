<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMergedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mergeds', function (Blueprint $table) {
            $table->id();
            $table->string('Merged_ID');
            $table->bigInteger('Complaint_ID');
            $table->string('user_id');
            // $table->foreign('Complaint_ID')->on('UserComplaints')->references('Complaint_ID');
            $table->string('ComplaintType', 30);
            $table->string('ComplaintCategory', 30);
            $table->string('SubCategory', 30);
            $table->string('AuthDept');
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
        Schema::dropIfExists('mergeds');
    }
}
