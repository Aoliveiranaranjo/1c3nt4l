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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();

            $table->string('pedidoCliente', 20);
            $table->string('pedido', 15);
            $table->string('orden', 15);
            $table->string('amount', 50);
            $table->boolean('material')->default(false);
            $table->date('dateDelivery')->nullable();
            $table->timestamp('dateEnd')->nullable()->default(null);

            $table->unsignedBigInteger('orderstate_id');
            $table->foreign('orderstate_id')->references('id')
            ->on('order_states')->onDelete('cascade');

            $table->unsignedBigInteger('article_id');
            $table->foreign('article_id')->references('id')
            ->on('articles')->onDelete('cascade');

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
        Schema::dropIfExists('orders');
    }
};
