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
        Schema::create('personas', function (Blueprint $table) {
            $table->id();

            $table->string('nombre',60);
            $table->string('direccion',80);
            $table->string('correo',80);
            $table->string('telefono',15)->nullable();
            $table->string('tipo_per',20);
            $table->TinyInteger('estado')->default(1); // 'estado' es un TinyInteger para el estado activo/inactivo
            $table->foreignId('documento_id')->unique()->constrained('documentos')->onDelete('cascade'); // Relación con la tabla 'documentos',ondelete cascade para eliminar en cascada,unique para evitar duplicados
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('personas');
    }
};
