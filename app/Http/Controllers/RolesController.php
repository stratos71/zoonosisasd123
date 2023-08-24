<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\DB;

class RolesController extends Controller
{
    //Redirección a la vista de roles
    public function index()
    {
        $permisos = Permission::all();
        $roles = Role::with('users')->get();
        $rolePermissions = DB::table("role_has_permissions")
            ->pluck('role_has_permissions.permission_id', 'role_has_permissions.permission_id')
            ->all();
        return view('roles.index', compact('roles', 'permisos', 'rolePermissions'));
    }
    //Función para crear un nuevo rol con permisos
    public function crear_rol(Request $request)
    {
        try {
            $this->validate($request, [
                'nombre' => 'required|max:100|unique:roles,name',
                'permisos' => 'required',
            ]);
            $role = Role::create(['name' => $request->input('nombre')]);
            $role->syncPermissions($request->input('permisos'));
            return redirect()->route('roles')->with('success', 'Rol creado correctamente.');
        } catch (\Exception $e) {
            return redirect()->route('roles')->with('error', 'Hubo un problema al crear el rol, revise si el nombre del rol esta disponible y asegurese de seleccionar al menos un permiso');
        }
    }
    //Función para editar un rol
    public function editar_rol(Request $request, $id)
    {
        try {
            $this->validate($request, [
                'nombre' => 'required|max:100|unique:roles,name,' . $id,
                'permisos' => 'required',
            ]);
            $role = Role::find($id);
            $role->name = $request->input('nombre');
            $role->save();
            $role->syncPermissions($request->input('permisos'));

            return redirect()->route('roles')->with('success', 'Rol actualizado correctamente.');
        } catch (\Exception $e) {
            return redirect()->route('roles')->with('error', 'Hubo un problema al actualizar el rol, revise si el nombre del rol esta disponible y asegurese de seleccionar al menos un permiso');
        }
    }
    //Función para eliminar un rol
    public function eliminar_rol(Request $request)
    {
        try {
            DB::table("roles")->where('id', $request->id)->delete();
            return redirect()->route('roles')->with('success', 'Rol eliminado correctamente.');
        } catch (\Exception $e) {
            return redirect()->route('roles')->with('error', 'Hubo un problema al eliminar el rol');
        }
    }
}
