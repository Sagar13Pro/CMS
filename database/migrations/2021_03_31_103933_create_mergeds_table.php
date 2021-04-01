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
            $table->string('status', 30);
            $table->json('Complaint_ID');
            $table->json('user_id');
            $table->string('ComplaintType', 30);
            $table->string('ComplaintCategory', 40);
            $table->string('SubCategory', 70);
            $table->string('AuthDept', 70);
            $table->string('Remarks')->nullable();
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
