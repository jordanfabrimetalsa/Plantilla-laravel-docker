<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table = 'clientes';

    protected $fillable = [
        'nombre',
        'apellido',
        'email',
        'telefono',
        'direccion',
        'activo',
        'rol'
    ];

    public function getNombreAttribute()
    {
        return $this->nombre;
    }

    public function getApellidoAttribute()
    {
        return $this->apellido;
    }

    public function getEmailAttribute()
    {
        return $this->email;
    }

    public function getTelefonoAttribute()
    {
        return $this->telefono;
    }

    public function getDireccionAttribute()
    {
        return $this->direccion;
    }

    public function getActivoAttribute()
    {
        return $this->activo;
    }

    public function getRolAttribute()
    {
        return $this->rol;
    }
}
