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
        Schema::create('productions', function (Blueprint $table) {
            $table->id();

            $table->string('pry', 2)->nullable();
            $table->string('cleaning', 2)->nullable()->default('4');
            $table->string('changeH', 2)->nullable()->default('4');
            $table->string('multiUnid', 4)->nullable()->default('1');
            $table->timestamp('dateEnd')->nullable(); //fin de la produccion o cierre pendiente verificar
            $table->timestamp('dateClosed')->nullable(); //Terminar la producción  despues de verificar todo
            $table->string('observation')->nullable();

            $table->unsignedBigInteger('typeorder_id');
            $table->foreign('typeorder_id')->references('id')
            ->on('type_orders')->onDelete('cascade');

            $table->unsignedBigInteger('order_id');
            $table->foreign('order_id')->references('id')
            ->on('orders')->onDelete('cascade');

            $table->unsignedBigInteger('state_production_id');
            $table->foreign('state_production_id')->references('id')
            ->on('state_productions')->onDelete('cascade');

            $table->unsignedBigInteger('machine_id')->nullable();
            $table->foreign('machine_id')->references('id')
            ->on('machines')->onDelete('cascade');

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
        Schema::dropIfExists('productions');
    }
};
