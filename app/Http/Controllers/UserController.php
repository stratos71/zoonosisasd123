<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function usuarios()
    {
        $roles      = Role::all();
        $usuarios = User::orderBy('updated_at', 'desc')->get();
        return view('usuarios.index', compact('usuarios', 'roles'));
    }

    public function crear_usuario(Request $request)
    {
        try {
            $data = $request->validate([
                'nombre_completo' => 'required|string|max:100',
                'nombre_usuario' => 'required|string|max:100|unique:users',
                'password' => 'required|string|min:4|max:100',
                'ci' => 'required|numeric|min:100000|max:999999999',
                'exp' => 'required|string|max:3',
                'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,bmp,webp'
            ]);
            $data['estado'] = 'Activo';
            $data['password'] = bcrypt($data['password']);


            if ($request->hasFile('foto')) {
                $extension = $request->file('foto')->getClientOriginalExtension();
                $filename = uniqid() . '.' . $extension;
                $request->file('foto')->move(public_path('img/fotos/'), $filename);
                $data['foto'] = "img/fotos/" . $filename;
            }
            User::create($data)->assignRole($request->input('rol'));

            return redirect()->route('usuarios')
                ->with('success', 'Usuario creado correctamente.');
        } catch (\Exception $e) {
            return back()->withInput()
                ->with('error', 'Error al crear al usuario, revise si el nombre de usuario esta disponible');
        }
    }

    public function editar_usuario($id, Request $request)
    {
        try {

            $user = User::find($id);
            if (!$user) {
                return redirect()->route('usuarios')->with('warning', 'Usuario no encontrado.');
            }

            $data = $request->validate([
                'nombre_completo' => 'required|string|max:100',
                'nombre_usuario' => 'required|string|max:100|unique:users,nombre_usuario,' . $id,
                'ci' => 'required|numeric|min:100000|max:999999999',
                'exp' => 'required|string|max:3',
                'estado' => 'required|string|max:100',
                'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,bmp,webp'
            ]);

            if ($request->password)
                $data['password'] = bcrypt($request->password);

            if ($request->hasFile('foto')) {
                if ($user->foto && file_exists(public_path($user->foto))) {
                    unlink(public_path($user->foto));
                }
                $extension = $request->file('foto')->getClientOriginalExtension();
                $filename = uniqid() . '.' . $extension;
                $request->file('foto')->move(public_path('img/fotos/'), $filename);
                $data['foto'] = "img/fotos/" . $filename;
            }
            $user->update($data);
            $user->syncRoles($request->input('rol'));

            return redirect()->route('usuarios')
                ->with('success', 'Usuario actualizado correctamente.');
        } catch (\Exception $e) {
            $errorMessage = $e->getMessage();
            return back()->withInput()
                ->with('error', 'Error al actualizar al usuario. Revise si el nombre de usuario está disponible.');
        }
    }

    public function cambiar_contraseña($id, Request $request)
    {
        try {

            $user = User::find($id);
            if (!$user) {
                return back()->with('warning', 'Usuario no encontrado.');
            }

            $data = $request->validate([
                'old_password' => 'required|string|min:4|max:100',
                'new_password' => 'required|string|min:4|max:100',
            ]);

            if (Hash::check($data['old_password'], $user->password)) {
                $user->password = Hash::make($data['new_password']);
                $user->save();
                return back()
                    ->with('success', 'Contraseña actualizada correctamente.');
            } else {
                return back()
                    ->with('error', 'Contraseña incorrecta.');
            }
        } catch (\Exception $e) {
            $errorMessage = $e->getMessage();
            return back()->withInput()
                ->with('error', 'Ocurrio un error');
        }
    }


    public function cambiar_foto($id, Request $request)
    {
        try {

            $user = User::find($id);
            if (!$user) {
                return redirect()->route('usuarios')->with('warning', 'Usuario no encontrado.');
            }
            $data = $request->validate([
                'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg,bmp,webp'
            ]);


            if ($request->hasFile('foto')) {
                if ($user->foto && file_exists(public_path($user->foto))) {
                    unlink(public_path($user->foto));
                }
                $extension = $request->file('foto')->getClientOriginalExtension();
                $filename = uniqid() . '.' . $extension;
                $request->file('foto')->move(public_path('img/fotos/'), $filename);
                $data['foto'] = "img/fotos/" . $filename;
            }
            $user->update($data);
            return back()
                ->with('success', 'Usuario actualizado correctamente.');
        } catch (\Exception $e) {
            $errorMessage = $e->getMessage();
            return back()->withInput()
                ->with('error', 'Error al actualizar al usuario. Revise el tipo de archivo enviado.');
        }
    }



    public function eliminar_usuario($id)
    {
        try {
            $user = User::find($id);
            if (!$user) {
                return redirect()->route('usuarios')->with('warning', 'Usuario no encontrado.');
            }
            if ($user->foto && file_exists(public_path($user->foto))) {
                unlink(public_path($user->foto));
            }
            $user->delete();
            return redirect()->route('usuarios')->with('success', 'Usuario eliminado correctamente.');
        } catch (\Exception $e) {
            return redirect()->route('usuarios')->with('error', 'Hubo un problema al eliminar al usuario.');
        }
    }
}
