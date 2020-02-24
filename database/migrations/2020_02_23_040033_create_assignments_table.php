<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssignmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assignments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->dateTime('date');
            $table->unsignedBigInteger('task_id');
            $table->unsignedBigInteger('volunteer_id');
            $table->dateTime('signin')->nullable();
            $table->dateTime('signout')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('task_id')->on('tasks')->references('id');
            $table->foreign('volunteer_id')->on('volunteers')->references('id');

            $table->unique(['date','volunteer_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('assignments');
    }
}
