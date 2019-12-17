<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->boolean('email_verified');
            $table->string('verification_token')->nullable();
            $table->string('password');
            $table->string('password_reset')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('image', 300)->nullable();
            $table->boolean('admin')->nullable();
            $table->boolean('banned')->nullable();
            $table->boolean('reported')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
