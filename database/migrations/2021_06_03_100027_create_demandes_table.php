<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDemandesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('demandes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('annoncedispo_id');
            $table->unsignedBigInteger('user_id');
            $table->foreign('annoncedispo_id')->references('id')->on('annoncedispos')->onDelete('cascade')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users');
            $table->date('reservation_date');
            $table->string('reservation_day');
            $table->string('state')->default('pending');
            $table->string('feedbackClient')->default('pending');
            $table->string('feedbackArticle')->default('pending');
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
        Schema::dropIfExists('demandes');
    }
}
