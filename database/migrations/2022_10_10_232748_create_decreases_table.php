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
        Schema::create('decreases', function (Blueprint $table) {
            $table->id();

            $table->string('code', 10);
            $table->string('observation')->nullable();
            $table->string('amount', 8);

            $table->unsignedBigInteger('decrease_type_id');
            $table->foreign('decrease_type_id')->references('id')
            ->on('decrease_types')->onDelete('cascade');

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
        Schema::dropIfExists('decreases');
    }
};
