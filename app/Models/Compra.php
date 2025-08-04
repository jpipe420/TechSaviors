<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Compra extends Model
{
    use HasFactory;

    // Define the relationship with Proveedore
    public function proveedore()
    {
        return $this->belongsTo(Proveedore::class); // belongsTo porque una compra pertenece a un proveedor
    }

    public function comprobante()
    {
        return $this->belongsTo(Comprobante::class); // belongsTo porque una compra pertenece a un comprobante
    }
    public function productos()
    {
        return $this->belongsToMany(Producto::class)->withTimestamps()->withPivot('cantidad','precio_compra','precio_venta');// belongsToMany porque una compra puede tener muchos productos y un producto puede estar en muchas compras, el método withTimestamps() permite que se guarden las marcas de tiempo de creación y actualización, y withPivot() permite acceder a los campos adicionales de la tabla pivote
    }

}
