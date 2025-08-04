<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    // Define the relationship with Persona
    public function persona()
    {
        return $this->belongsTo(Persona::class);
    }

    public function ventas()
    {
        return $this->hasMany(Venta::class);
    }
}
