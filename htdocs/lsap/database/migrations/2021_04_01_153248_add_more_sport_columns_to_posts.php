<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMoreSportColumnsToPosts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->string('sport_name');
            $table->string('provinance');
            $table->string('city');
            $table->string('street');
            $table->integer('day_of_meeting');
            $table->integer('month_of_meeting');
            $table->integer('year_of_meeting');
            $table->integer('hour_of_meeting');
            $table->integer('minute_of_meeting');
            $table->integer('cost_of_meeting');
            $table->string('player_level');
            $table->integer('max_player_count');
            $table->integer('current_player_count');
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
            $table->dropColumn('sport_name');
            $table->dropColumn('provinance');
            $table->dropColumn('city');
            $table->dropColumn('street');
            $table->dropColumn('day_of_meeting');
            $table->dropColumn('month_of_meeting');
            $table->dropColumn('year_of_meeting');
            $table->dropColumn('hour_of_meeting');
            $table->dropColumn('minute_of_meeting');
            $table->dropColumn('player_level');
            $table->dropColumn('max_player_count');
            $table->dropColumn('current_player_count');
        });
    }
}
