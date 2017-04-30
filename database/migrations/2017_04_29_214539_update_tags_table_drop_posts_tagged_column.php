<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateTagsTableDropPostsTaggedColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tags', function($table) {
            $table->dropColumn('posts_tagged');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tags', function($table) {
            $table->integer('posts_tagged')->unsigned()->default('0');
        });
    }
}
