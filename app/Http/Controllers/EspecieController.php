<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Especie;

class EspecieController extends Controller
{
    //Redirección a la ruta para ver las especies
    public function index()
    {
        $especies = Especie::orderBy('updated_at', 'desc')->get();
        return view('especies.index', compact('especies'));
    }
    //Función para agregar una nueva especie
    public function crear_especie(Request $request)
    {
        try {
            $data = $request->validate([
                'nombre' => 'required|string|max:100',
                'descripcion' => 'required|string|max:100',
            ]);
            $data['estado'] = 'Activo';
            Especie::create($data);
            return redirect()->route('especies')
                ->with('success', 'Especie creada correctamente.');
        } catch (\Exception $e) {
            return back()->withInput()
                ->with('error', 'Error al crear la especie');
        }
    }
    //Función para editar una especie
    public function editar_especie($id, Request $request)
    {
        try {
            $especie = Especie::find($id);
            if (!$especie) {
                return redirect()->route('especies')->with('warning', 'Especie no encontrada.');
            }
            $data = $request->validate([
                'nombre' => 'required|string|max:100',
                'descripcion' => 'required|string|max:100',
                'estado' => 'required|string|max:100'
            ]);
            $especie->update($data);
            return redirect()->route('especies')
                ->with('success', 'Especie actualizada correctamente.');
        } catch (\Exception $e) {
            $errorMessage = $e->getMessage();
            return back()->withInput()
                ->with('error', 'Error al actualizar la especie.');
        }
    }
    //Función para eliminar una especie
    public function eliminar_especie($id)
    {
        try {
            $especie = Especie::find($id);
            if (!$especie) {
                return redirect()->route('especies')->with('warning', 'Especie no encontrada.');
            }
            $especie->delete();
            return redirect()->route('especies')->with('success', 'Especie eliminada correctamente.');
        } catch (\Exception $e) {
            return redirect()->route('especies')->with('error', 'Hubo un problema al eliminar la especie.');
        }
    }
}
