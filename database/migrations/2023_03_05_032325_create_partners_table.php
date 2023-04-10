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
            $table->text('firstname');
            $table->text('middlename');
            $table->text('lastname');
            $table->date('dateofbirth');
            $table->text('gender');
            $table->text('status');
            $table->text('religion');
            $table->string('age');
            $table->text('placeofbirth');
            $table->text('address');
            $table->integer('members');
            $table->integer('pledges');
            $table->integer('volunteer');
            $table->integer('partnership');
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
