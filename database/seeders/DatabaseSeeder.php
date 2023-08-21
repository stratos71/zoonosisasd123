<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Carbon\Carbon;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        Schema::disableForeignKeyConstraints();


        $permissions = ['ver usuarios', 'crear usuarios', 'editar usuarios','eliminar usuarios',
                        'ver especies','crear especies','editar especies','eliminar especies',
                        'ver registros','crear registros','editar registros','eliminar registros',
                        'ver roles','crear roles','editar roles','eliminar roles',];

        foreach ($permissions as $permName) {
            Permission::create(['name' => $permName, 'guard_name' => 'web']);
        }

        $adminRole = Role::create(['name' => 'admin', 'guard_name' => 'web']);

        $adminRole->givePermissionTo($permissions);

        $userData = [
            'nombre_completo' => 'Administrador',
            'nombre_usuario' => 'admin',
            'ci' => 5000000,
            'exp' => 'LP',
            'foto' => null,
            'estado' => 'Activo',
            'password' => Hash::make('admin'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];

        $user = User::create($userData);
        $user->assignRole('admin');
        Schema::enableForeignKeyConstraints();
    }
}
