<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlbumTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('albums', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cover_content_id')->unsigned()->nullable();
            $table->string('name');
            $table->text('description');
            $table->timestamps();

            $table->foreign('cover_content_id')->references('id')->on('content')
                ->onUpdate('cascade')->onDelete('cascade');
        });

        Schema::create('album_content', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('album_id')->unsigned()->nullable();
            $table->integer('content_id')->unsigned()->nullable();

            $table->foreign('album_id')->references('id')->on('albums')
                ->onUpdate('cascade')->onDelete('cascade');
            
            $table->foreign('content_id')->references('id')->on('content')
                ->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('album_content');
        Schema::dropIfExists('albums');
    }
}
