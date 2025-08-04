<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Marca extends Model
{
    use HasFactory;

    protected $fillable = ['caracteristica_id']; // Propiedad para asignación masiva

    /**
     * Define la relación de uno a muchos con el modelo Producto.
     * Una marca puede tener muchos productos.
     */
    public function productos()
    {
        return $this->hasMany(Producto::class);
    }

    /**
     * Define la relación de muchos a uno con el modelo Caracteristica.
     * Una marca pertenece a una Caracteristica.
     */
    public function caracteristica()
    {
        // Esta es la relación que ya tenías, está correcta.
        return $this->belongsTo(Caracteristica::class, 'caracteristica_id');
    }

    /**
     * Sobrescribe el método de Laravel para resolver el Model Binding en las rutas.
     * Esto asegura que el modelo Marca se recupere junto con su relación Caracteristica.
     * Esto evita el error "Attempt to read property 'caracteristica' on null"
     * en el controlador cuando intentas acceder a $marca->caracteristica.
     *
     * @param  mixed  $value El valor del comodín de la ruta (generalmente el ID).
     * @param  string|null  $field El campo de la base de datos para buscar (por defecto es 'id').
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function resolveRouteBinding($value, $field = null)
    {
        // Usa el query builder del modelo para encontrar el registro
        // con el valor de la ruta y, de paso, carga la relación 'caracteristica'.
        return $this->with('caracteristica')
                    ->where($field ?? $this->getKeyName(), $value)
                    ->first();
    }
}
