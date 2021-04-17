<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemoveTitleAndMeetingColumnsFromPosts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->dropColumn('title');
            $table->dropColumn('day_of_meeting');
            $table->dropColumn('month_of_meeting');
            $table->dropColumn('year_of_meeting');
            $table->dropColumn('hour_of_meeting');
            $table->dropColumn('minute_of_meeting');
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
            $table->integer('day_of_meeting');
            $table->integer('month_of_meeting');
            $table->integer('year_of_meeting');
            $table->integer('hour_of_meeting');
            $table->integer('minute_of_meeting');
            $table->string('title');
        });
    }
}
