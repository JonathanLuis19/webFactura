<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::insert(
            [
                'sucursal_id' => '1',
                'name' => 'Jona72',
                'nombre' => 'Gabby',
                'apellido' => 'Mejia',
                'cedula' => '1700987112',
                'sueldo' => 500,
                'activo' => true,
                'email' => 'gabby@gmail.com',
                'password' => Hash::make('gabby')
            ]
        );
    }
}
