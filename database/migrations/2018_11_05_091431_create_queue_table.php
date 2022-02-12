<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQueueTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('queu', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('function');
            $table->string('type');
            $table->string('frequency');
            $table->string('status');
            $table->string('task_started');
            $table->string('task_ended');
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
        Schema::dropIfExists('queu');
    }
}
