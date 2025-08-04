<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Caracteristica extends Model
{
    use HasFactory;

    public function categoria()
    {
        return $this->hasOne(Categoria::class); // Una característica pertenece a una categoría

    }

    public function marca()
    {
        return $this->hasOne(Marca::class); // Una característica pertenece a una marca
    }

    public function presentacione()
    {
        return $this->hasOne(Presentacione::class); // Una característica pertenece a una presentación
    }

    protected $fillable= ['nombre', 'descripcion']; // Atributos que se pueden asignar masivamente
}
