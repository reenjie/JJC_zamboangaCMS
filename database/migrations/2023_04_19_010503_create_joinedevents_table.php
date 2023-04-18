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
        Schema::create('joinedevents', function (Blueprint $table) {
            $table->id();
            $table->integer('userID');
            $table->text('typeof')->comment('typeoftablejoined');
            $table->integer('TableID');
            $table->dateTime('joinedDate');
            $table->integer('status')->nullable();
            $table->integer('typeofjoin')->comment('null-voluntarree ,1-attendees')->nullable();
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
        Schema::dropIfExists('joinedevents');
    }
};
