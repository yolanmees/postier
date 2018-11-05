<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Collection extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('collection', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('description');
        });

        Schema::create('collection_env', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('collection_id');
            $table->string('key');
            $table->string('value');
        });

        Schema::create('collection_item', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('int_id');
            $table->string('ext_id');
            $table->integer('collection_id');
            $table->integer('parrent_id');
            $table->string('name');
            $table->string('description');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('collection');
    }
}
