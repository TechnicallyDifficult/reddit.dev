<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateCommentsTableDropVotesColumns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('comments', function($table) {
            $table->dropColumn(['upvotes', 'downvotes']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $table->smallInteger('upvotes')->unsigned()->default('0');
        $table->smallInteger('downvotes')->unsigned()->default('0');
    }
}
