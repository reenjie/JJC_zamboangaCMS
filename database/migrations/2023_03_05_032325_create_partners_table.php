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
        Schema::create('partners', function (Blueprint $table) {
            $table->id();
            $table->string('email');
            $table->text('firstname')->nullable();
            $table->text('middlename')->nullable();
            $table->text('lastname')->nullable();
            $table->date('dateofbirth');
            $table->text('gender')->nullable();
            $table->text('status')->nullable();
            $table->text('religion')->nullable();
            $table->text('placeofbirth')->nullable();
            $table->text('address')->nullable();
            $table->integer('members')->nullable();
            $table->integer('pledges')->nullable();
            $table->integer('volunteer')->nullable();
            $table->integer('partnership')->nullable();
            $table->integer('userID')->nullable();
            $table->text('message')->nullable();
            $table->string('contact')->nullable();
            $table->text('contactadd')->nullable();
            $table->text('facebook')->nullable();
            $table->text('twitter')->nullable();
            $table->text('instagram')->nullable();
            $table->text('linkedin')->nullable();
            $table->integer('approvedstate')->nullable()->comment('1-approved,2-declined');
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
        Schema::dropIfExists('partners');
    }
};
