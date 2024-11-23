<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class CreateMatchesTable extends Migration
{
    public function up()
    {
        Schema::create('matches', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->constrained('categories')->onDelete('cascade');
            $table->dateTime('match_date_time');
            $table->enum('status', ['pending', 'available', 'booked', 'completed'])->default('available');
            $table->time('game_duration');
            $table->text('description')->nullable();
            $table->foreignId('venue_description_id')->constrained('venue_description')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('matches');
    }
}