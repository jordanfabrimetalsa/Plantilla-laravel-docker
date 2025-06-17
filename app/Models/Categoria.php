<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $table = 'categorias';

    protected $fillable = [
        'nombre',
        'descripcion',
        'activo',
        'rol'
    ];

    public function productos()
    {
        return $this->hasMany(Producto::class, 'categoria_id', 'id');
    }

    public function getStockAttribute()
    {
        return $this->stock;
    }

    public function getActivoAttribute()
    {
        return $this->activo;
    }

    public function getRolAttribute()
    {
        return $this->rol;
    }

    public function getNombreAttribute()
    {
        return $this->nombre;
    }

    public function getDescripcionAttribute()
    {
        return $this->descripcion;
    }

}
