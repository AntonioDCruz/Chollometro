<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChollosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chollos', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            
            $table->string("titulo");
            $table->longText("descripcion");
            $table->string("url");
            //$table->integer("categoria");
            $table->integer("puntuacion");
            $table->float("precio");
            $table->float("precio_descuento");
            $table->boolean("disponible");
            $table->bigInteger("user_id")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chollos');
    }
}
