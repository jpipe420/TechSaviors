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
        Schema::create('compras', function (Blueprint $table) {
            $table->id();
            $table->dateTime('fecha_hora');
            $table->decimal('impuesto', 8, 2,)->unsigned();// unsigned para evitar valores negativos
            $table->tinyInteger('estado')->default(1); // 1: activo, 0: inactivo
            $table->string('numero_comprobante', 255);
            $table->decimal('total', 10, 2)->unsigned(); // Total de la compra
            $table->foreignId('comprobante_id')->nullable()->constrained('comprobantes')->onDelete('set null');//el set null permite que si el comprobante se elimina, la compra no se elimina, pero el campo comprobante_id se pone a null, el nullable permite que este campo pueda ser nulo
            $table->foreignId('proveedore_id')->nullable()->constrained('proveedores')->onDelete('set null'); // Relación con proveedores, nullable para permitir que una compra no tenga proveedor asignado
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('compras');
    }
};
