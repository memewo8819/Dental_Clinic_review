<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFavoritesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('favorites', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('clinic_id');
            $table->unsignedInteger('comment_id');
            $table->timestamps();

            $table->foreign('clinic_id')
                  ->references('id')
                  ->on('clinics')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');

            $table->foreign('comment_id')
                  ->references('id')
                  ->on('comments')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('favorites');
    }
}
