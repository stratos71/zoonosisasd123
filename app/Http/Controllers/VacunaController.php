<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Vacuna;
use App\Models\Especie;

use Illuminate\Support\Facades\Auth;

class VacunaController extends Controller
{
    public function index()
    {
        $especies = Especie::all();
        $user = Auth::user();
        return view('vacunas.index', compact('especies', 'user'));
    }
}
