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
        Schema::create('faults', function (Blueprint $table) {
            $table->id();

            $table->string('description', 144);
            $table->timestamp('dateEnd')->nullable();
            $table->boolean('status')->default(true);

            $table->unsignedBigInteger('mechanic_asig')->nullable();
            $table->foreign('mechanic_asig')->references('id')
            ->on('mechanics')->onDelete('cascade');

            $table->unsignedBigInteger('mechanic_id')->nullable();
            $table->foreign('mechanic_id')->references('id')
            ->on('mechanics')->onDelete('cascade');

            $table->unsignedBigInteger('fault_type_id');
            $table->foreign('fault_type_id')->references('id')
            ->on('fault_types')->onDelete('cascade');

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
        Schema::dropIfExists('faults');
    }
};
