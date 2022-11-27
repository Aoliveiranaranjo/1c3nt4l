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
        Schema::create('articles', function (Blueprint $table) {
            $table->id();

            $table->string('CodeCentral', 20);
            $table->string('name', 50);
            $table->string('CodeClient', 50)->nullable();
            $table->boolean('status')->default(true);
            $table->enum('statusArticle', ['NUEVO', 'AUTORIZADO','DEROGADO', 'PENDIENTE',
            'REPETICION', 'RECHAZADO', 'SUSPENDIDO', ])->nullable();

            $table->unsignedBigInteger('customer_id');
            $table->foreign('customer_id')->references('id')
            ->on('customers')->onDelete('cascade');

            $table->unsignedBigInteger('user_id')->nullable();
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
        Schema::dropIfExists('articles');
    }
};
