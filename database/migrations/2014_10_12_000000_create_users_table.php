<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->string('email')->unique();
            $table->string('username',200)->index()->primary();
            $table->string('nom');
            $table->string('prenom');
            $table->enum("status",["0","1"])->default('1');
            $table->string('password');
            $table->string('image')->nullable()->default('admin/6n9f4RUFHJi0MyNwxqhV2Fhr8MqNr9tQaBA7zrG1.png"');
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
};
