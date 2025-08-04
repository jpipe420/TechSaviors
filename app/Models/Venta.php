<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    use HasFactory;

    // Define the relationship with Cliente
    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class); // belongsTo porque una venta pertenece a un usuario
    }

    public function comprobante()
    {
        return $this->belongsTo(Comprobante::class); // belongsTo porque una venta pertenece a un comprobante
    }

    public function productos()
    {
        return $this->belongsToMany(Producto::class)
            ->withTimestamps()
            ->withPivot('cantidad', 'precio_venta', 'descuento'); // belongsToMany porque una venta puede tener muchos productos
    }

}
