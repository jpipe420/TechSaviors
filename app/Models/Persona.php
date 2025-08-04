<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    use HasFactory;

    // Define the relationship with Documento
    public function documento()
    {
        return $this->belongsTo(Documento::class);
    }

    public function proveedore()
    {
        return $this->hasOne(Proveedore::class);
    }

    public function cliente()
    {
        return $this->hasOne(Cliente::class);
    }
}
