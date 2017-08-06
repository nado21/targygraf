<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('course_block_id')->unsigned();
            $table->foreign('course_block_id')->references('id')->on('course_blocks');

            $table->string('code', 20);
            $table->string('name');
            $table->tinyInteger('ordering')->unsigned()->default(0);

            $table->tinyInteger('credits')->unsigned()->default(0);
            $table->tinyInteger('required_prerequisites')->unsigned()->nullable();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('courses');
    }
}
