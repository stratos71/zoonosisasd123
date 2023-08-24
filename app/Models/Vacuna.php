<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vacuna extends Model
{
    use HasFactory;

    protected $table = 'vacunas';

    protected $fillable = [
        'medicamento',
        'campaña',
        'usuario_id',
        'animal_id',
        'estado',
        'fecha_vacuna',
        'nro_carnet'
    ];
    //Relación vacuna->usuario
    public function usuario()
    {
        return $this->belongsTo(User::class, 'usuario_id');
    }
    //Relación vacuna->animal
    public function animal()
    {
        return $this->belongsTo(Animal::class, 'animal_id');
    }
}
