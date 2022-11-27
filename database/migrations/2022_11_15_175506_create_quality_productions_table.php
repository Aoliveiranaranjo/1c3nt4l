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
        Schema::create('quality_productions', function (Blueprint $table) {
            $table->id();
            $table->string('lote_pt', 20);
            $table->string('sp', 20)->nullable();
            $table->string('lote_conte', 20)->nullable();
            $table->string('cuba', 20)->nullable();
            $table->string('palet', 3);
            $table->string('box', 5);
            $table->string('unid', 20);

            $table->timestamp('delivery')->nullable();


            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')
            ->on('users')->onDelete('cascade');

            $table->unsignedBigInteger('user_almacen')->nullable();
            $table->foreign('user_almacen')->references('id')
            ->on('users')->onDelete('cascade');

            $table->unsignedBigInteger('order_id');
            $table->foreign('order_id')->references('id')
            ->on('orders')->onDelete('cascade');

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
        Schema::dropIfExists('quality_productions');
    }
};
