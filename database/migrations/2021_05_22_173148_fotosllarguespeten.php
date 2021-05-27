<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Fotosllarguespeten extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::table('articles', function(Blueprint $t) {
            $t->string('foto', 5000)->nullable()->change();
        });  
        Schema::table('plans', function(Blueprint $t) {
            $t->string('foto', 5000)->nullable()->change();
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
