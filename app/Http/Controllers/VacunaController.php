<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\animal;
use Illuminate\Http\Request;
use App\Models\Vacuna;
use App\Models\Especie;
use App\Models\Propietario;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;

class VacunaController extends Controller
{
    //Redirección a la vista de registro de vacunación
    public function index()
    {
        $especies = Especie::all();
        $user = Auth::user();
        return view('vacunas.index', compact('especies', 'user'));
    }
    //Redirección a la vista de vacunaciones completadas
    public function registro_vacunas()
    {
        $vacunas = Vacuna::all();
        return view('vacunas.registros', compact('vacunas'));
    }
    //Función para generar el PDF
    public function carnet_vacuna_pdf($id)
    {
        $vacuna = Vacuna::findOrFail($id);
        $pdf = PDF::loadView('pdf.carnet_vacuna', compact('vacuna'));
        $pdf->set_paper(array(0, 0, 450, 850));
        return $pdf->stream('reporte_vacuna_' . $id . '.pdf');
    }
    //Función para registrar una nueva vacunación
    public function crear_vacuna(Request $request)
    {
        try {
            $data_propietario = $request->validate([
                //datos del propietario
                'nombres' => 'required|string|max:100',
                'apellido_paterno' => 'required|string|max:100',
                'apellido_materno'  => 'nullable|string|max:100',
                'fecha_nacimiento' => 'required|string|max:100',
                'ci' => 'required|string|max:10',
                'complemento' => 'required|string|max:10',
                'exp' => 'required|string|max:3',
                'direccion' => 'required|string|max:100',
                'distrito' => 'required|string|max:100',
                'nro_domicilio' => 'required|string|max:100',
                'correo' => 'nullable|string|max:100',
                'celular' => 'required|string|max:10',
            ]);

            $data_animal = $request->validate([
                //datos del animal
                'nombre' => 'required|string|max:100',
                'raza' => 'required|string|max:100',
                'edad' => 'required|numeric|min:0|max:100',
                'color' => 'required|string|max:100',
                'tamaño' => 'nullable|string|max:100',
                'genero' => 'required|string|max:100',
                'esterilizado' => 'required|string|max:100',
                'fecha_vacuna' => 'required|string|max:100',
                'especie_id' => 'required',
            ]);
            $propietario = Propietario::create($data_propietario);
            $data_animal['propietario_id'] = $propietario->id;
            $animal = animal::create($data_animal);
            $data_vacuna = [
                'medicamento' => 'Sin asignar',
                'campaña' => 'Sin asignar',
                'usuario_id' => Auth::user()->id,
                'animal_id' => $animal->id,
                'estado' => 'Completado',
                'fecha_vacuna' => date('d-m-Y'),
            ];
            $vacuna = Vacuna::create($data_vacuna);
            $vacuna->update(['nro_carnet' => $vacuna->id + 4999]);
            return redirect()->route('vacunas')
                ->with('success', 'Vacuna registrada correctamente.');
        } catch (\Exception $e) {
            return back()->withInput()
                ->with('error', 'Error al registrar la vacuna' . $e->getMessage());
        }
    }
}
