<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ActivitatComentaris extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activitat_coments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->references('id')->on('users')->onDelete('cascade')->change();
            $table->foreignId('comentari_id')->references('id')->on('comentaris')->onDelete('cascade')->change();
            $table->foreignId('article_id')->references('id')->on('articles')->onDelete('cascade')->change();
            $table->foreignId('creador_id')->references('id')->on('users')->onDelete('cascade')->change();
            $table->string('text');
            $table->timestamp('time');
        });

        DB::unprepared('
        CREATE TRIGGER `comentar` AFTER INSERT ON `comentaris` FOR EACH ROW begin
        INSERT INTO activitat_coments (user_id,comentari_id,article_id,creador_id,text,time) VALUES (new.user_id,new.id, new.article_id, (select user_id from articles where id = new.article_id), "comentar", now());
        END'
        );
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
