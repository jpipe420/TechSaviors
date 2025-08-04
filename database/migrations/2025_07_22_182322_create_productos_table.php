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
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->string('codigo_pro', 50);
            $table->string('nombre_pro', 80);
            $table->integer('stock')->unsigned()->default(0);// Cantidad de productos en stock, unsigned es para evitar números negativos, default es para iniciar en 0
            $table->string('descripcion',255)->nullable(); // Descripción del producto, nullable permite que este campo pueda estar vacío
            $table->string('imagen_path',255)->nullable(); // Imagen del producto, nullable permite que este campo pueda estar vacío
            $table->tinyInteger('estado')->default(1); // Estado del producto, 1 para activo, 0 para inactivo
            $table->foreignId('marca_id')
                ->constrained('marcas')
                ->onDelete('cascade'); // Relación con marcas, elimina los productos si la marca se elimina
            $table->foreignId('presentacione_id')
                ->constrained('presentaciones')
                ->onDelete('cascade'); // Relación con presentaciones, elimina los productos si la presentación se elimina
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('productos');
    }
};
