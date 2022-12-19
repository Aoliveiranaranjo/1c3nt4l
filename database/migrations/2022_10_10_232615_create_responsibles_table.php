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
        Schema::create('responsibles', function (Blueprint $table) {
            $table->id();

            $table->boolean('item1'); //Comprobación de preparación de OF, Registro de limpieza, Especificación de Producto e Imputación
            $table->boolean('item2'); //Verificación despeje de linea del producto anterior
            $table->boolean('item3'); //Verificación orden y limpieza en máquina y sala
            $table->boolean('item4'); //Informar  y aplicar la seguridad en la producción, al grupo de trabajo
            $table->boolean('item5'); //Verificar protocolo de trabajo

            $table->string('observation')->nullable();
            $table->boolean('status')->default(false);

            $table->unsignedBigInteger('start_id');
            $table->foreign('start_id')->references('id')
            ->on('starts')->onDelete('cascade');

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
        Schema::dropIfExists('responsibles');
    }
};
