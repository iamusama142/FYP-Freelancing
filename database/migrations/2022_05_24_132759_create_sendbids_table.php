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
        Schema::create('sendbids', function (Blueprint $table) {
            $table->id();
            $table->string('sender_id');
            $table->string('reciever_id');
            $table->string('bid_job_name');
            $table->string('bid_job_budget');
            $table->string('bid_job_duration');
            $table->string('bid_job_service');
            $table->string('worj_with');
            $table->boolean('status')->default(0);
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
        Schema::dropIfExists('sendbids');
    }
};
