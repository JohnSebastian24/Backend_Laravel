<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

//DEFINE LA ESTRUCTURA DE LA TABLA APRENDIZ EN LA BASE DE DATOS

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
{
    Schema::create('aprendiz', function (Blueprint $table) {

        $table->id();

        $table->string('apellido')->nullable();
        $table->string('direccion')->nullable();
        $table->string('email')->unique()->nullable();
        $table->string('nombre')->nullable();
        $table->string('telefono')->nullable();

        $table->string('rh')->nullable();
        $table->string('estado')->nullable();
        $table->string('ficha')->nullable();
        $table->string('programa')->nullable();
        $table->string('regional')->nullable();

        $table->timestamps();

    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('aprendiz');
    }
};
