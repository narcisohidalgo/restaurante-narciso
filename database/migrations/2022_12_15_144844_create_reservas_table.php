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
        Schema::create('reservas', function (Blueprint $table) {
            $table->bigIncrements("id");
            $table->unsignedBigInteger("id_cliente")->nullable();
            $table->unsignedBigInteger("id_invitados")->nullable();
            $table->unsignedBigInteger("id_menus");
            $table->unsignedBigInteger("id_mesas");
            $table->unsignedBigInteger("fecha_reservas");
            $table->string("num_tarjetas");
            $table->string("num_personas");
            $table->timestamps();

            $table->foreign('id_cliente')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('id_invitados')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('id_menus')->references('id')->on('menus')->onDelete('cascade');
            $table->foreign('id_mesas')->references('id')->on('mesas')->onDelete('cascade');
            $table->foreign('fecha_reservas')->references('id')->on('horarios')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reservas');
    }
};
