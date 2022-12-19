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
        Schema::create('machines', function (Blueprint $table) {
            $table->id();

            $table->string('codMachine', 10);
            $table->string('name', 50)->nullable();
            $table->string('abbreviated', 25)->nullable();
            $table->string('cadence', 20)->nullable();
            $table->boolean('status')->default(true); //1 activo


            $table->unsignedBigInteger('room_id');
            $table->foreign('room_id')->references('id')
            ->on('rooms')->onDelete('cascade');

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
        Schema::dropIfExists('machines');
    }
};
