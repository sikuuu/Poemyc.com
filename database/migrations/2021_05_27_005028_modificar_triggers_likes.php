<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModificarTriggersLikes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared(
            'Drop trigger if exists `like`'
        );

        DB::unprepared(
            'Drop trigger if exists dislike'
        );

        DB::unprepared('
        CREATE TRIGGER `like` AFTER INSERT ON `likes` FOR EACH ROW begin
        UPDATE articles set likes = likes+1 where articles.id = NEW.article_id;
        INSERT INTO activitat_likes (user_id,article_id,creador_id,text,time) VALUES (new.user_id, new.article_id, (select user_id from articles where id = new.article_id), "like", now());
        END'
        );

        DB::unprepared('
        CREATE TRIGGER `dislike` AFTER DELETE ON `likes` FOR EACH ROW begin
        UPDATE articles set likes = likes-1 where articles.id = OLD.article_id;
        INSERT INTO activitat_likes (user_id,article_id,creador_id,text,time) VALUES (OLD.user_id, OLD.article_id, (select user_id from articles where id = old.article_id), "dislike", now());
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
