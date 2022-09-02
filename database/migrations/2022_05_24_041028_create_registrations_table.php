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
        Schema::create('registrations', function (Blueprint $table) {
            $table->id();
            $table->string('reg_id');
            $table->string('f_name');
            $table->string('l_name');
            $table->string('email');
            $table->string('password');
            $table->string('education')->nullable();
            $table->string('address');
            $table->string('role');
            $table->string('skillset')->nullable();
            $table->string('aboutyou');
            $table->string('user_image');

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
        Schema::dropIfExists('registrations');
    }
};
