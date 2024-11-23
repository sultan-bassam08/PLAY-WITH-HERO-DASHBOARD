<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class CreateVenueDescriptionTable extends Migration
{
    public function up()
    {
        Schema::create('venue_description', function (Blueprint $table) {
            $table->id();
            $table->text('playground_description');
            $table->integer('max_spot');
            $table->foreignId('category_id')->constrained('categories')->onDelete('cascade');
            $table->foreignId('venue_info_id')->constrained('venue_info')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('venue_description');
    }
}