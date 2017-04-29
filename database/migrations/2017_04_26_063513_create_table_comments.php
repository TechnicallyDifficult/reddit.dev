<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableComments extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('post_id')->unsigned()->references('id')->on('posts');
            $table->integer('user_id')->unsigned()->references('id')->on('users');
            $table->integer('parent')->unsigned()->nullable()->references('id')->on('comments');
            $table->smallInteger('upvotes')->unsigned()->default('0');
            $table->smallInteger('downvotes')->unsigned()->default('0');
            $table->text('content');
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
        Schema::drop('comments');
    }
}
