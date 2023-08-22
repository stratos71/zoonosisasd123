<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class animal extends Model
{
    use HasFactory;

    public function propietario()
    { return $this->belongsTo(Propietario ::class);}

    public function especie()
    { return $this->belongsTo(Especie ::class);}

    public function vacuna()
    { return $this->belongsTo(Vacuna ::class);}
    


}
