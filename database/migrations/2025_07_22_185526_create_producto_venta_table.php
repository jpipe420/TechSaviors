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
        Schema::create('producto_venta', function (Blueprint $table) {
            $table->id();
            $table->foreignId('venta_id')
                ->constrained('ventas')
                ->onDelete('cascade');
            $table->foreignId('producto_id')
                ->constrained('productos')
                ->onDelete('cascade');
            $table->integer('cantidad')->unsigned(); // unsigned asegura que el valor sea positivo
            $table->decimal('precio_venta', 10, 2);
            $table->decimal('descuento', 10, 2)->nullable(); // Descuento opcional, puede ser nulo
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('producto_venta');
    }
};
