<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $table = 'productos';

    protected $fillable = [
        'nombre',
        'descripcion',
        'precio',
        'cantidad',
        'categoria_id'
    ];

    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'categoria_id', 'id');
    }

    public function ventas()
    {
        return $this->hasMany(Venta::class, 'producto_id', 'id');
    }

    public function detalleVentas()
    {
        return $this->hasMany(DetalleVenta::class, 'producto_id', 'id');
    }

}
