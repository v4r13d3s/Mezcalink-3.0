<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        
        // Tablas que usan 'nombre' para generar slug
        $tablesWithNombre = ['marcas', 'mezcals', 'maestros', 'palenques', 'agaves'];
        
        foreach ($tablesWithNombre as $table) {
            Schema::table($table, function (Blueprint $table) {
                $table->string('slug')->unique()->after('nombre');
            });
            
            $this->generateSlugsForTable($table, 'nombre');
        }
        
        /* // Tablas que usan 'title' para generar slug
        $tablesWithTitle = ['news', 'events'];
        
        foreach ($tablesWithTitle as $table) {
            Schema::table($table, function (Blueprint $table) {
                $table->string('slug')->unique()->after('title');
            });
            
            $this->generateSlugsForTable($table, 'title');
        } */
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        $tables = ['marcas', 'mezcals', 'maestros', 'palenques', 'agaves'];
        
        foreach ($tables as $table) {
            Schema::table($table, function (Blueprint $table) {
                $table->dropColumn('slug');
            });
        }
    }

    private function generateSlugsForTable($tableName, $sourceField)
    {
        $records = DB::table($tableName)->get();
        
        foreach ($records as $record) {
            // Obtener el valor del campo fuente
            $sourceValue = $record->$sourceField;
            
            // Generar slug base
            $slug = Str::slug($sourceValue);
            $originalSlug = $slug;
            $count = 1;
            
            // Verificar si el slug ya existe y generar uno único
            while (DB::table($tableName)->where('slug', $slug)->exists()) {
                $slug = $originalSlug . '-' . $count;
                $count++;
            }
            
            // Actualizar el registro con el slug generado
            DB::table($tableName)->where('id', $record->id)->update(['slug' => $slug]);
        }
    }
};
