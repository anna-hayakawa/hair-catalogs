<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHairTagTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hair_tag', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('style_id')->unsigned();
            $table->bigInteger('tag_id')->unsigned();
            $table->foreign('style_id')->references('id')->on('hair_styles')->OnDelete('cascade');
            $table->foreign('tag_id')->references('id')->on('tags')->OnDelete('cascade');
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
        Schema::dropIfExists('hair_tag');
    }
}
