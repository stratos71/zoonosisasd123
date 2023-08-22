<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vacuna extends Model
{
    use HasFactory;

    protected $table = 'vacunas'; // Esto es opcional, porque Laravel asume que el nombre de la tabla es el plural del nombre del modelo.

    protected $fillable = [
        'medicamento',
        'campaña',
        'usuario_id',
        'animal_id',
        'estado',
        'fecha_vacuna',
    ];

    public function usuario()
    {
        return $this->belongsTo(User::class, 'usuario_id');
    }

    public function animal()
    {
        return $this->belongsTo(Animal::class, 'animal_id');
    }

}
