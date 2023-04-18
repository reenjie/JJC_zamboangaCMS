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
        Schema::create('pledges', function (Blueprint $table) {
            $table->id();
            $table->text('amount')->nullable();
            $table->text('goods')->nullable();
            $table->text('qty')->nullable();
            $table->text('notes')->nullable();
            $table->integer('status')->nullable();
            $table->text('where')->nullable();
            $table->text('receiver')->nullable();
            $table->text('detail')->nullable();
            $table->date('pledgedate')->nullable();
            $table->integer('received')->comment(' 1 - yes')->nullable();
            $table->text('email');
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
        Schema::dropIfExists('pledges');
    }
};
