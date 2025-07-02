<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('marcas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('maestro_id'); // 1. Columna para la relación
            $table->unsignedBigInteger('palenque_id');
            $table->unsignedBigInteger('agave_id');
            $table->string('nombre');
            $table->string('certificado_dom');
            $table->string('logo');
            $table->text('descripcion');
            $table->text('historia');
            $table->string('eslogan');
            $table->date('anio_fundacion');
            $table->string('telefono');
            $table->string('correo');
            $table->string('redes_sociales');
            $table->string('sitio_web');
            $table->string('pais_origen');
            $table->foreign('maestro_id')->nullable()->references('id')->on('maestros')->onDelete('cascade');
            $table->foreign('palenque_id')->nullable()->references('id')->on('palenques')->onDelete('cascade');
            $table->foreign('agave_id')->nullable()->references('id')->on('agaves')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('marcas');
    }
};
