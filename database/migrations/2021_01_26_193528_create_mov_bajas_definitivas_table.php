<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMovBajasDefinitivasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mov_bajas_definitivas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('movimiento')->nullable();
            $table->string('usuarioBaja')->nullable();
            $table->string('fechaBaja')->nullable();
            $table->string('concilFelix')->nullable();
            $table->string('iev')->nullable();
            $table->string('partida')->nullable();
            $table->string('descpartida')->nullable();
            $table->string('linea')->nullable();
            $table->string('desclinea')->nullable();
            $table->string('sublinea')->nullable();
            $table->string('descsublinea')->nullable();
            $table->string('consecutivo')->nullable();
            $table->string('numeroinv')->nullable();
            $table->string('concepto')->nullable();
            $table->string('marca')->nullable();
            $table->string('importe')->nullable();
            $table->string('colores')->nullable();
            $table->string('fechacomp')->nullable();
            $table->string('idarea')->nullable();
            $table->string('nombrearea')->nullable();
            $table->string('numemple')->nullable();
            $table->string('nombreemple')->nullable();
            $table->string('numserie')->nullable();
            $table->string('medidas')->nullable();
            $table->string('modelo')->nullable();
            $table->string('material')->nullable();
            $table->string('clvestado')->nullable();
            $table->string('estado')->nullable();
            $table->string('factura')->nullable();
            $table->integer('bienEco')->unsigned()->nullable();
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
        Schema::dropIfExists('mov_bajas_definitivas');
    }
}
