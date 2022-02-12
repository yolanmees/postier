<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Requests extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('request', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('int_id');
            $table->string('ext_id');
            $table->integer('collection_id');
            $table->integer('collection_item_id');
            $table->string('name');
            $table->string('methode');
            $table->string('url_raw');
            $table->string('url_protocol');
            $table->string('description');
        });

        Schema::create('request_body', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('request_id');
            $table->string('type');
        });

        Schema::create('request_body_file', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('request_id');
            $table->integer('request_body_id');
            $table->string('file');
        });

        Schema::create('request_body_formdata', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('request_id');
            $table->integer('request_body_id');
            $table->string('key');
            $table->string('value');
            $table->string('type');
        });

        Schema::create('request_body_raw', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('request_id');
            $table->integer('request_body_id');
            $table->longText('raw');
        });

        Schema::create('request_header', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('collection_id');
            $table->integer('request_id');
            $table->string('key');
            $table->string('value');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('requests');
    }
}
