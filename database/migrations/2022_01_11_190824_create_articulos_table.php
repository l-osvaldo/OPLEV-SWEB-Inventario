<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticulosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articulos', function (Blueprint $table) {
            $table->string('iev');
            $table->string('partida');
            $table->string('descpartida');
            $table->string('linea');
            $table->string('desclinea');
            $table->string('sublinea');
            $table->string('descsublinea');
            $table->string('consecutivo');
            $table->string('numeroinv')->primary();
            $table->string('concepto');
            $table->string('marca')->nullable();
            $table->string('importe');
            $table->string('colores')->nullable();
            $table->string('fechacomp');
            $table->string('idarea');
            $table->string('nombrearea');
            $table->string('numemple');
            $table->string('nombreemple');
            $table->string('numserie')->nullable();
            $table->string('medidas')->nullable();
            $table->string('modelo')->nullable();
            $table->string('material')->nullable();
            $table->string('clvestado');
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
        Schema::dropIfExists('articulos');
    }
}
