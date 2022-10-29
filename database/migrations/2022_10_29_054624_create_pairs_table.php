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
        Schema::create('pairs', function (Blueprint $table) {
            $table->id();
            $table->integer('number');
            $table->foreignId('group_id')->nullable();
            $table->foreign('group_id')->references('id')->on('groups');
            $table->foreignId('subject_id')->nullable();
            $table->foreign('subject_id')->references('id')->on('subjects');
            $table->foreignId('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreignId('cabinet_id')->nullable();
            $table->foreign('cabinet_id')->references('id')->on('cabinets');
            $table->foreignId('date_id')->nullable();
            $table->foreign('date_id')->references('id')->on('days');
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
        Schema::dropIfExists('pairs');
    }
};
