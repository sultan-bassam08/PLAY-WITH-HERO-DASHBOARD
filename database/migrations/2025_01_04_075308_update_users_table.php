<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('name', 15)->change(); // Update name length
            $table->string('phone', 10)->unique()->nullable(false)->change(); // Update phone column
        });
    }
    
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('name')->change(); // Revert name length
            $table->string('phone', 15)->nullable()->change(); // Revert phone column
        });
    }
};