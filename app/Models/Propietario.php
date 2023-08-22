<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Propietario extends Model
{
    use HasFactory;


    protected $fillable = [
        'nombres',
        'apellido_paterno',
        'apellido_materno',
        'fecha_nacimiento',
        'ci',
        'complemento',
        'exp',
        'direccion',
        'distrito',
        'nro_domicilio',
        'correo',
        'celular',
    ];

    public function animal()
    {
        return $this->hasOne(Animal::class);
    }
}
