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
        Schema::create('incidents', function (Blueprint $table) {
            $table->id();

            $table->string('description', 144)->nullable();

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')
            ->on('users')->onDelete('cascade');

            $table->unsignedBigInteger('incident_type_id');
            $table->foreign('incident_type_id')->references('id')
            ->on('incident_types')->onDelete('cascade');

            $table->unsignedBigInteger('production_id');
            $table->foreign('production_id')->references('id')
            ->on('productions')->onDelete('cascade');

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
        Schema::dropIfExists('incidents');
    }
};
