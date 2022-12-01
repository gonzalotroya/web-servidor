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
        Schema::create('videojuegos', function (Blueprint $table) {
            $table->id();
            $table->string('titulo')->unique();
            $table->double('precio');
            $table->integer('pegi');
            $table->string('descripcion');
            $table->unsignedBigInteger('consolas_id')->nullable();
            $table->foreign('consolas_id')->references('id')->on('consolas');
            $table->unsignedBigInteger('companias_id')->nullable();
            $table->foreign('companias_id')->references('id')->on('companias');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('videojuegos');
    }
};
