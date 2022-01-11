<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCancelacionresguardosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cancelacionresguardos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('numempleado',10);
            $table->string('nombreempleado',100);
            $table->string('idarea',10);
            $table->string('nombrearea',150);
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
        Schema::dropIfExists('cancelacionresguardos');
    }
}
