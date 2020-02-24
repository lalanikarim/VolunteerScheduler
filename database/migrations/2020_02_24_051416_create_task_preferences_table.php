<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTaskPreferencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('task_preferences', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('volunteer_id');
            $table->unsignedBigInteger('task_id');
            $table->timestamps();

            $table->foreign('volunteer_id')->on('volunteers')->references('id');
            $table->foreign('task_id')->on('tasks')->references('id');

            $table->unique(['volunteer_id','task_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('task_preferences');
    }
}
