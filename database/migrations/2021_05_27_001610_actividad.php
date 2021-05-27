<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Actividad extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    public function up() {
        Schema::create('activitat_likes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->references('id')->on('users')->onDelete('cascade')->change();
            $table->foreignId('article_id')->references('id')->on('articles')->onDelete('cascade')->change();
            $table->foreignId('creador_id')->references('id')->on('users')->onDelete('cascade')->change();
            $table->string('text');
            $table->timestamp('time');
        });

        Schema::create('activitat_subs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->references('id')->on('users')->onDelete('cascade')->change();
            $table->foreignId('plan_id')->references('id')->on('plans')->onDelete('cascade')->change();
            $table->foreignId('creador_id')->references('id')->on('users')->onDelete('cascade')->change();
            $table->string('text');
            $table->timestamp('time');
        });

        Schema::create('activitat_plans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->references('id')->on('users')->onDelete('cascade')->change();
            $table->foreignId('article_id')->references('id')->on('articles')->onDelete('cascade')->change();
            $table->foreignId('plan_id')->references('id')->on('plans')->onDelete('cascade')->change();
            $table->string('text');
            $table->timestamp('time');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
