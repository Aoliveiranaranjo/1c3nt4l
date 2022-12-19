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
        Schema::create('changes', function (Blueprint $table) {
            $table->id();

            $table->string('pry', 2)->nullable();
            $table->string('description', 144)->nullable();
            $table->string('observation', 144)->nullable();
            $table->timestamp('dateEnd')->nullable();
            $table->boolean('status')->default(true);

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')
            ->on('users')->onDelete('cascade');

            $table->unsignedBigInteger('statechange_id');
            $table->foreign('statechange_id')->references('id')
            ->on('state_changes')->onDelete('cascade');

            $table->unsignedBigInteger('typechange_id');
            $table->foreign('typechange_id')->references('id')
            ->on('type_changes')->onDelete('cascade');

            $table->unsignedBigInteger('production_id');
            $table->foreign('production_id')->references('id')
            ->on('productions')->onDelete('cascade');

            $table->unsignedBigInteger('mechanic_id')->default(1);
            $table->foreign('mechanic_id')->references('id')
            ->on('mechanics')->onDelete('cascade');

            $table->unsignedBigInteger('mechanic_asig')->nullable();
            $table->foreign('mechanic_asig')->references('id')
            ->on('mechanics')->onDelete('cascade');


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
        Schema::dropIfExists('changes');
    }
};
