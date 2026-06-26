<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('material_unidads', function (Blueprint $table) {
            $table->id('idMaterialUnidad');
            $table->integer('cantidad');

            $table->foreignId('material_id')
                ->constrained('materials', 'codigo')
                ->cascadeOnDelete();

            $table->foreignId('unidad_id')
                ->constrained('unidads', 'idUnidad')
                ->cascadeOnDelete();

            $table->foreignId('presupuesto_id')
                ->constrained('presupuestos', 'codigoPresupuesto')
                ->cascadeOnDelete();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('material_unidads');
    }
};