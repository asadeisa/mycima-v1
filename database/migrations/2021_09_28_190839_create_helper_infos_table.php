<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHelperInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('helper_infos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')
            ->constrained()
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->boolean("sex")->default(10);// man(10) or woman
            $table->integer("f_type")->default(0);//favorite type of movie(action...)
            $table->boolean("have_family")->default(10);//if he dont(10)
            $table->integer('avg_movie_time')->default(0);//the average of time that he prefer in movie
            $table->integer("f_lang")->default(0);//favorite languegs
            $table->integer('age')->default(0);//under-18(0),under-50(1),morethan-50(2)
            $table->integer("old")->default(10);//how he love the olde things (0,1,2,3)
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
        Schema::dropIfExists('helper_infos');
    }
}
