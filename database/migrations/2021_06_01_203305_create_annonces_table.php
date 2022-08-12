<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnnoncesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('annonces', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('title');
            $table->text('description');
            $table->string('car_model');
            
            $table->string('city');
            $table->string('color');
            $table->integer('price');
            $table->boolean('stat');
          
            $table->string('premium')->default('0');
            $table->integer('premium_duration')->default(0);
            $table->foreign('user_id')->references('id')->on('users');

            $table->string('image1');
            $table->string('image2');
            $table->string('image3');

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
        Schema::dropIfExists('annonces');
    }
}
