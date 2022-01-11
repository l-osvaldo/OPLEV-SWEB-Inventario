<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBitacoramovimientosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bitacoramovimientos', function (Blueprint $table) {
            $table->string('numeroinventario',50)->primary();
            $table->string('numeroempleado',10);
            $table->string('nombreempleado',100);
            $table->string('idarea',10);
            $table->string('nombrearea',150);
            $table->string('anterior',10)->nullable();
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
        Schema::dropIfExists('bitacoramovimientos');
    }
}
