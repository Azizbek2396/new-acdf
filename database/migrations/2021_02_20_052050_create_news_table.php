<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->integer('subject_id')->nullable();
            $table->integer('albums_id')->unsigned()->nullable();
            $table->json('title');
            $table->json('description')->nullable();
            $table->string('name')->json();
            $table->json('content');
            $table->string('image')->nullable();
            $table->integer('status')->default(0);
            $table->date('date')->nullable();
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
        Schema::dropIfExists('news');
    }
}
