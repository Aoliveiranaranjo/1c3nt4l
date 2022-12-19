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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();

            $table->string('codigo', 15);
            $table->string('name', 50);
            $table->string('dni', 20);
            $table->date('antiquity')->nullable();
            $table->string('email', 144)->nullable();
            $table->string('phone', 14)->nullable();
            $table->string('emergencyPhone', 14)->nullable();
            $table->boolean('status')->default(true);


            $table->unsignedBigInteger('sex_id');
            $table->foreign('sex_id')->references('id')
            ->on('sexes')->onDelete('cascade');

            $table->unsignedBigInteger('charge_id');
            $table->foreign('charge_id')->references('id')
            ->on('charges')->onDelete('cascade');

            $table->unsignedBigInteger('group_id');
            $table->foreign('group_id')->references('id')
            ->on('groups')->onDelete('cascade');


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
        Schema::dropIfExists('employees');
    }
};
