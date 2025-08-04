<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('ventas', function (Blueprint $table) {
            $table->id();
            $table->dateTime('fecha_hora');
            $table->decimal('impuesto', 8, 2)->unsigned(); // unsigned para evitar valores negativos
            $table->decimal('total', 10, 2)->unsigned();
            $table->tinyInteger('estado')->default(1); // 1: activo, 0: inactivo
            $table->string('numero_comprobante', 255);
            $table->foreignId('cliente_id')->nullable()->constrained('clientes')->onDelete('set null'); // Relación con clientes, el set null permite que si el cliente se elimina, la venta no se elimina, pero el campo cliente_id se pone a null
            $table->foreignId('user_id')->nullable()->constrained('users')->onDelete('set null'); // Relación con la tabla users, el set null permite que si el usuario se elimina, la venta no se elimina, pero el campo user_id se pone a null
            $table->foreignId('comprobante_id')->nullable()->constrained('comprobantes')->onDelete('set null'); // Relación con comprobantes, el set null permite que si el comprobante se elimina, la venta no se elimina, pero el campo comprobante_id se pone a null
            



            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ventas');
    }
};
