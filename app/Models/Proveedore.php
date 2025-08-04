<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Proveedore extends Model
{
    use HasFactory;

    // Define the relationship with Persona
    public function persona()
    {
        return $this->belongsTo(Persona::class);//belongsTo porque un proveedor pertenece a una persona
    }

    public function compras()
    {
        return $this->hasMany(Compra::class);//hasmany porque un proveedor puede tener muchas compras
    }

    // Additional methods or properties can be defined here
}
