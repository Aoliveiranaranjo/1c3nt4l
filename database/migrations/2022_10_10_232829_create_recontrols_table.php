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
        Schema::create('recontrols', function (Blueprint $table) {
            $table->id();

            $table->string('codCentral', 20);
            $table->string('reference', 20);
            $table->string('name', 50);
            $table->string('lote', 20)->nullable();
            $table->string('cuba', 20)->nullable();
            $table->date('dateIn')->nullable();
            $table->date('expirationDate')->nullable();
            $table->date('datedelivery')->nullable();
            $table->date('expirationNew')->nullable();
            $table->timestamp('history')->nullable();

            $table->boolean('micro')->nullable();
            $table->boolean('fisico')->nullable();
            $table->boolean('conservantes')->nullable();

            $table->enum('status', ['OKEY', 'NOK', 'SIN RESPUESTA'] );
            $table->string('observation', 200)->nullable();


            $table->unsignedBigInteger('client_id');
            $table->foreign('client_id')->references('id')
            ->on('clients')->onDelete('cascade');

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
        Schema::dropIfExists('recontrols');
    }
};
