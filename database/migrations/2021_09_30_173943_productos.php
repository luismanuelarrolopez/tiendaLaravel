<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Productos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('Nombre', 150);
            $table->string('Imagen', 500);
            $table->enum('Cantidad',['Bulto','Libra','Arroba','Kilo']);
            $table->enum('Categoria',['Granos','Frutas','Tuberculos']);
            $table->string('Descripcion', 600);
            $table->float('Precio');
            $table->float('Descuento');
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
        Schema::dropIfExists('productos');
    }
}
