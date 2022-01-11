<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticulosecosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articulosecos', function (Blueprint $table) {
            $table->string('iev');
            $table->string('partida');
            $table->string('descripcionpartida');
            $table->string('linea');
            $table->string('descripcionlinea');
            $table->string('sublinea');
            $table->string('descripcionsublinea');
            $table->string('consecutivo');
            $table->string('numeroinventario')->primary();
            $table->string('concepto');
            $table->string('marca')->nullable();
            $table->string('importe');
            $table->string('colores')->nullable();
            $table->string('fechacompra');
            $table->string('idarea');
            $table->string('nombrearea');
            $table->string('numeroempleado');
            $table->string('nombreempleado');
            $table->string('numeroserie')->nullable();
            $table->string('medidas')->nullable();
            $table->string('modelo')->nullable();
            $table->string('material')->nullable();
            $table->string('claveestado');
            $table->string('estado');
            $table->string('factura');
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
        Schema::dropIfExists('articulosecos');
    }
}
