<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRolesTable extends Migration
{
    public function up()
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->enum('role_type', ['admin', 'super_admin', 'user']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('roles');
    }
}