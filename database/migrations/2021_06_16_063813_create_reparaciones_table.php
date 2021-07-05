<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReparacionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reparaciones', function (Blueprint $table) {
            $table->id();
            $table->string('tipo_reparacion')->nullable();
            $table->dateTime('quedo_lista')->nullable();
            $table->unsignedBigInteger('bitacora_id');
            $table->unsignedBigInteger('solicitud_id');
            $table->unsignedBigInteger('mecanico_id');
            $table->foreign('bitacora_id')->references('id')->on('bitacoras');
            $table->foreign('mecanico_id')->references('id')->on('users');
            $table->foreign('solicitud_id')->references('id')->on('solicitudes');
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
        Schema::dropIfExists('reparaciones');
    }
}
