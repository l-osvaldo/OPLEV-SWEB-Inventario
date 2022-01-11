<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSublineasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sublineas', function (Blueprint $table) {
            $table->string('partida',15);
            $table->string('descpartida',150);
            $table->string('linea',5);
            $table->string('desclinea',150);
            $table->string('sublinea',5);
            $table->string('descsub',150);
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
        Schema::dropIfExists('sublineas');
    }
}
