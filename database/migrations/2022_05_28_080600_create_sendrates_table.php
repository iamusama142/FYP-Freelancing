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
        Schema::create('sendrates', function (Blueprint $table) {
            $table->id();
            $table->string('sender_id');
            $table->string('reciever_id');
            $table->string('review');
            $table->string('rating');
            $table->string('payment');
            $table->string('tid');
            $table->string('amount');

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
        Schema::dropIfExists('sendrates');
    }
};
