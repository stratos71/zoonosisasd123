<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class animal extends Model
{
    use HasFactory;

    protected $table = 'animales';

    protected $fillable = [
        'nombre',
        'raza',
        'edad',
        'color',
        'tamaño',
        'genero',
        'esterilizado',
        'propietario_id',
        'especie_id',
        'vacuna_id',
    ];
    //Relación animal->propietario
    public function propietario()
    {
        return $this->belongsTo(Propietario::class);
    }
    //Relación animal->especie
    public function especie()
    {
        return $this->belongsTo(Especie::class);
    }
}
