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
        Schema::create('qualities', function (Blueprint $table) {
            $table->id();

            $table->boolean('item1'); //Comprobar especificación del producto
            $table->boolean('item2'); //Aspecto, color y olor según muestra tipo
            $table->boolean('item3'); //Control funcional
            $table->boolean('item4'); //Prueba de estanqueidad
            $table->boolean('item5'); //Aspecto: burbuja de expansión, ausencia de particulas, presencia tubo de inmersión
            $table->boolean('item6'); //Limpieza de linea de montaje
            $table->boolean('item7'); //Comprobación de materiales
            $table->boolean('item8'); //Tolva y contenedores cerrados
            $table->boolean('item9'); //Seguridad de la máquina y personal
            $table->boolean('item10'); //Instrumentos de control calibrados
            $table->boolean('item11'); //Comprobar temperatura del bulk
            $table->boolean('item12'); //Control de paletización
            $table->boolean('item13'); //Control de etiquetas de cajas
            $table->string('lote', 30 )->nullable(); //Anotar lote preparado
            $table->boolean('item15'); //Muestra tipo
            $table->date('muestraDate'); //Muestra fecha


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
        Schema::dropIfExists('qualities');
    }
};
