<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comprobante extends Model
{
    use HasFactory;

    public function compras()
    {
        return $this->hasMany(Compra::class); // Un comprobante puede tener muchas compras
    }

    public function ventas()
    {
        return $this->hasMany(Venta::class); // Un comprobante puede tener muchas ventas
    }
}
