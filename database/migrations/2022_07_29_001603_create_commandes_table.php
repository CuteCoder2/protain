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
        Schema::create('commandes', function (Blueprint $table) {
            $table->string('id_commande',200)->index()->primary();
            $table->date('start');
            $table->date('end');
            $table->string('cout');
            $table->string('reste')->nullable();
            $table->enum('status',['0','1','2']);
            $table->enum('type_comd',['0','1']);
            $table->string('username',200);
            $table->string('id_client',200);
            $table->string('id_service',200);
            $table->foreign('username')->references('username')->on('users');
            $table->foreign('id_service')->references('id_service')->on('services');
            $table->foreign('id_client')->references('id_client')->on('clients');
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
        Schema::dropIfExists('commandes');
    }
};
