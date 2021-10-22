<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMoviesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movies', function (Blueprint $table) {
            $table->id();
            $table->string("movie_name");
            $table->string("language");// language of the
            $table->string("classification");// for family or R
            $table->boolean("is_series")->default(0);// movie(0) or series
            $table->string("type"); //action or romantic...
            $table->float("evaluate"); // movie evalu
            $table->string("released");// the time when the movie released
            $table->time("time_period"); // how log is the movie
            $table->text('description');
            $table->text('img');
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
        Schema::dropIfExists('movies');
    }
}
