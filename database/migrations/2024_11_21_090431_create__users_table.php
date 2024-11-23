<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('address')->nullable();
            $table->string('phone', 15)->nullable();
            $table->enum('gender', ['male', 'female'])->nullable();
            $table->date('date_of_birth')->nullable();
            $table->text('bio')->nullable();
            $table->string('profile_picture')->nullable();
            $table->foreignId('role_id')
            ->default(2) // Default to a standard 'user' role
            ->constrained('roles')
            ->onDelete('cascade');
            $table->timestamps();
        });
    }   

    public function down()
    {
        Schema::dropIfExists('users');
    }
}