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
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('iv')->nullable();
            $table->string('enc_key')->nullable();
            $table->string('department')->nullable();
            $table->integer('phone')->nullable();
            $table->string('image')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('security_question')->nullable();
            $table->string('otp')->nullable();
            $table->string('remote_token')->nullable();
            $table->integer('type');
            $table->integer('approval_status')->nullable();
            $table->integer('security_state')->nullable();
            $table->integer('security_check')->nullable();
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
