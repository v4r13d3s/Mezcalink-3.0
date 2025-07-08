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
            $table->string('nombre');
            $table->string('certificado_dom')->nullable();
            $table->string('logo');
            $table->text('descripcion');
            $table->text('historia')->nullable();
            $table->string('eslogan');
            $table->integer('anio_fundacion');
            $table->string('telefono')->nullable();
            $table->string('correo')->nullable();
            $table->string('redes_sociales')->nullable();
            $table->string('sitio_web');
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
