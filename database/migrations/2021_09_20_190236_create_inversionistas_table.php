<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInversionistasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inversionistas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('Nombre', 150);
            $table->string('Cargo', 150)->is_null;
            $table->string('Imagen', 500);
            $table->string('Descripcion', 600);
            $table->string('Correo', 200);
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
        Schema::dropIfExists('inversionistas');
    }
}
