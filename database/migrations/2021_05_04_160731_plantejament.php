<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Plantejament extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('creador_id')->references('id')->on('users')->onDelete('cascade')->change();
            $table->string('preu');
            $table->string('name');
            $table->string('text');
            $table->timestamps();
        });
        echo("Taula plans creada\n");
        

        Schema::create('users_plans',function(Blueprint $table) {
            $table->id();
            $table->foreignId('plan_id')->references('id')->on('plans')->onDelete('cascade')->change();
            $table->foreignId('user_id')->references('id')->on('users')->onDelete('cascade')->change();
            $table->datetime('caducitat');
            $table->timestamps();
        });
        echo("Taula users_plans creada\n");


        Schema::create('articles',function(Blueprint $table) {
            $table->id();
            $table->foreignId('creador_id')->references('id')->on('users')->onDelete('cascade')->change();
            $table->integer('likes')->default(0);
            $table->string('text');
            $table->timestamps();
        });
        echo("Taula articles creada\n");


        Schema::create('articles_plans',function(Blueprint $table) {
            $table->id();
            $table->foreignId('plan_id')->references('id')->on('plans')->onDelete('cascade')->change();
            $table->foreignId('article_id')->references('id')->on('articles')->onDelete('cascade')->change();
            $table->timestamps();
        });
        echo("Taula articles_plans creada\n");


        Schema::create('comentaris',function(Blueprint $table) {
            $table->id();
            $table->string('text');
            $table->foreignId('user_id')->references('id')->on('users')->onDelete('cascade')->change();
            $table->foreignId('article_id')->references('id')->on('users')->onDelete('cascade')->change();
            $table->timestamps();
        });
        echo("Taula comentaris creada\n");


        Schema::create('likes',function(Blueprint $table) {
            $table->id();
            $table->foreignId('article_id')->references('id')->on('articles')->onDelete('cascade')->change();
            $table->foreignId('user_id')->references('id')->on('users')->onDelete('cascade')->change();
            $table->timestamps();
        });
        echo("Taula likes creada\n");

        
        Schema::create('cesta',function(Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->references('id')->on('users')->onDelete('cascade')->change();
            $table->timestamps();
        });
        echo("Taula cesta creada\n");

    
        Schema::create('cesta_line',function(Blueprint $table) {
            $table->id();
            $table->foreignId('cesta_id')->references('id')->on('cesta')->onDelete('cascade')->change();
            $table->foreignId('plan_id')->references('id')->on('plans')->onDelete('cascade')->change();
            $table->string('quantitat_mesos');
            $table->timestamps();
        });
        echo("Taula cesta_line creada\n");


        Schema::create('comanda',function(Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->references('id')->on('users')->onDelete('cascade')->change();
            $table->timestamps();
        });
        echo("Taula comanda creada\n");


        Schema::create('comanda_line',function(Blueprint $table) {
            $table->id();
            $table->foreignId('comanda_id')->references('id')->on('comanda')->onDelete('cascade')->change();
            $table->string('plan_nom');
            $table->string('plan_preu');
            $table->string('plan_text');
            $table->string('plan_creador');
            $table->timestamps();
        });
        echo("Taula comanda_line creada\n");


        DB::unprepared('
        CREATE TRIGGER `like` AFTER INSERT ON `likes` FOR EACH ROW begin
        UPDATE articles set likes = likes+1 where articles.id = NEW.article_id;
        END');

        echo("Trigger likes creat\n");

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
