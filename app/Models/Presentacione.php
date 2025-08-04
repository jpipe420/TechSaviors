<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Presentacione extends Model
{
    use HasFactory;
    public function productos()
    {
        return $this->belongsToMany(Producto::class)->withTimestamps(); // Una presentación puede tener muchos productos

    }

    public function caracteristica()
    {
        return $this->belongsTo(Caracteristica::class); // Una presentación pertenece a una característica
    }

    protected $fillable = ['caracteristica_id'];
}
