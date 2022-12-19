<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('starts', function (Blueprint $table) {
            $table->id();

            $table->boolean('item1'); //Registro de limpieza
            $table->boolean('item2'); //Verificación tolva y contenedor cerrado
            $table->boolean('item3'); //Producto terminado cumple con la especificación
            $table->boolean('item4'); //Lote correcto
            $table->string('lote', 15 )->nullable(); //Anotar lote
            $table->boolean('item5'); //Loteado o marcaje correcto. Color y forma
            $table->boolean('item6'); //Comprobación seguridad máquina
            $table->boolean('item7'); //Comprobación protecciones de máquina
            $table->boolean('item8'); //Verificación de que no hay piezas sueltas o herramientas en el interior de la máquina
            $table->string('cadence', 20); //Velocidad de la máquina o cadencia.

            $table->string('observation')->nullable();

            $table->unsignedBigInteger('production_id');
            $table->foreign('production_id')->references('id')
            ->on('productions')->onDelete('cascade');

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')
            ->on('users')->onDelete('cascade');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('starts');
    }
};
