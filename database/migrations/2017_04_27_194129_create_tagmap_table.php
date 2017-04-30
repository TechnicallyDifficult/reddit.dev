<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTagmapTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tagmap', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('post_id')->unsigned()->references('posts')->on('id');
            $table->integer('tag_id')->unsigned()->references('tags')->on('id');
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
        Schema::drop('tagmap');
    }
}
