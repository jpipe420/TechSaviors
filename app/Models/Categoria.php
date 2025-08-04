<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;

    public function productos()
    {
        return $this->belongsToMany(Producto::class)->withTimestamps(); // Una categoría puede tener muchos productos
    }

    public function caracteristica()
    {
        return $this->belongsTo(Caracteristica::class); // Una categoría pertenece a una característica
    }

    protected $fillable =['caracteristica_id'];
}
