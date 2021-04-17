<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemoveDateTimeDateOfMeetingFromPosts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->dropColumn('date_of_meeting');
            $table->date('date_of_the_meeting')->nullable();
            $table->time('time_of_the_meeting')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->dateTime('date_of_meeting');
            $table->dropColumn('date_of_the_meeting');
            $table->dropColumn('time_of_the_meeting');
        });
    }
}
