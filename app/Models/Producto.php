<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    public function compras()
    {
        return $this->belongsToMany(Compra::class)->withTimestamps()->withPivot('cantidad','precio_compra','precio_venta'); // belongsToMany porque un producto puede estar en muchas compras y una compra puede tener muchos productos
    }

    public function ventas()
    {
        return $this->belongsToMany(Venta::class)->withTimestamps()->withPivot('cantidad','precio_venta','descuento'); // belongsToMany porque un producto puede estar en muchas ventas y una venta puede tener muchos productos
    }

    public function categorias()
    {
        return $this->belongsToMany(Categoria::class)->withTimestamps(); // belongsToMany porque un producto puede pertenecer a muchas categorías y una categoría puede tener muchos productos
    }

    public function marca()
    {
        return $this->belongsTo(Marca::class); // belongsTo porque un producto pertenece a una marca
    }

    public function presentaciones()
    {
        return $this->belongsTo(Presentacione::class)->withTimestamps(); // belongsTo porque un producto puede tener una presentación y una presentación puede tener muchos productos
    }

    protected $fillable =['codigo_pro','nombre_pro','descripcion','marca_id','presentacione_id','imagen_path'];

    public function hanbleUploadImages($image){
        $file = $image;
        $name = time() . $file->getClientOriginalName();
        $file->move(public_path().'/img/productos/', $name);

        return $name;
    }
}
