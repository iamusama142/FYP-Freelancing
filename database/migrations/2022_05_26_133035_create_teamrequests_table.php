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
        Schema::create('teamrequests', function (Blueprint $table) {
            $table->id();
            $table->string('sender_id')->nullable();
            $table->string('reciever_id')->nullable();
            $table->string('project_name')->nullable();
            $table->string('project_desscription')->nullable();
            $table->string('deadline')->nullable();
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
        Schema::dropIfExists('teamrequests');
    }
};
