<?php

namespace Database\Seeders;

use App\Models\Branch;
use Illuminate\Database\Seeder;

class SucursalesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Branch::insert(
            [
                'sucursal' => 'Quito',
                'detalle' => 'Matriz'
            ],
            [
                'sucursal' => 'Cuenca',
                'detalle' => 'Derivacion de la matriz'  
            ]
        );
        
    }
}
