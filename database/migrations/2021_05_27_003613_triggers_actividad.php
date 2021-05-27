<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TriggersActividad extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared(
            'Create trigger suscribir AFTER INSERT ON users_plans FOR EACH ROW
            BEGIN
                INSERT INTO activitat_subs (user_id,plan_id,creador_id,text,time) VALUES (new.user_id, new.plan_id ,(select user_id from plans where id = new.plan_id), "suscrito", now());
            END'
        );

        DB::unprepared(
            'Create trigger desuscribir AFTER DELETE ON users_plans FOR EACH ROW
            BEGIN
                INSERT INTO activitat_subs (user_id,plan_id,creador_id,text,time) VALUES (old.user_id, old.plan_id ,(select user_id from plans where id = old.plan_id), "borrado", now());
            END'
        );

        DB::unprepared(
            'Create trigger addtoplan AFTER INSERT ON articles_plans FOR EACH ROW
            BEGIN
                INSERT INTO activitat_plans (user_id,article_id,plan_id,text,time) VALUES ((select user_id from plans where id = new.plan_id), new.article_id, new.plan_id , "añadido", now());
            END'
        );

        DB::unprepared(
            'Create trigger delfromplan AFTER DELETE ON articles_plans FOR EACH ROW
            BEGIN
                INSERT INTO activitat_plans (user_id,article_id,plan_id,text,time) VALUES ((select user_id from plans where id = old.plan_id), old.article_id, old.plan_id , "quitado", now());
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
