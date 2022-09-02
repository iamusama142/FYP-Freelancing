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
        Schema::create('ratings', function (Blueprint $table) {
            $table->id();
            $table->string('sendprojectname');
            $table->string('sender_id');
            $table->string('reciever_id');
            $table->string('sendprojectduration');
            $table->string('sendwork');
            $table->string('sendprojectbudget')->nullable();
            $table->string('projectdeadline')->nullable();
            $table->string('projectsubmitdate');
            $table->string('completetaskimage');
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
        Schema::dropIfExists('ratings');
    }
};
