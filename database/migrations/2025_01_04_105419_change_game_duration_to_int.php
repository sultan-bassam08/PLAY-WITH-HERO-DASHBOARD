<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
        */
        public function up()
    {
        Schema::table('matches', function (Blueprint $table) {
            $table->integer('game_duration')->change(); // Change to INT
        });
    }

         public function down()
    {
        Schema::table('matches', function (Blueprint $table) {
            $table->time('game_duration')->change(); // Revert to TIME if needed
        });
    }
};