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
        Schema::create('tarjetas', function (Blueprint $table) {
            $table->string('num_tarjeta')->primary();
            $table->string('mes_caducidad');
            $table->string('anyo_caducidad');
            $table->string('cvv');
            $table->unsignedBigInteger('id_cliente');
            $table->timestamps();
            $table->foreign("id_cliente")->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tarjetas');
    }
};
