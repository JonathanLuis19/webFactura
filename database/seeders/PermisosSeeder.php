<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermisosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permisos=[

            //usuarios
            'ver-usuarios',
            'crear-usuario',
            'editar-usuario',
            'borrar-usuario',

            //tabla rol
            'ver-roles',
            'crear-rol',
            'editar-rol',
            'borrar-rol',

            //tabla sucursales
            'ver-sucursales',
            'crear-sucursal',
            'editar-sucursal',
            'borrar-sucursal',

            //tabla Marcas
            'ver-marcas',
            'crear-marca',
            'editar-marca',
            'borrar-marca',
            
            //tabla Categorias
            'ver-categorias',
            'crear-categoria',
            'editar-categoria',
            'borrar-categoria',
            
            //tabla Metodos de pago
            'ver-metodos-de-pago',
            'crear-metodo-de-pago',
            'editar-metodo-de-pago',
            'borrar-metodo-de-pago',
            
            //tabla transacciones
            'ver-transacciones-con-el-proveedor',
            'crear-transaccion-con-el-proveedor',
            'editar-transaccion-con-el-proveedor',
            'borrar-transaccion-con-el-proveedor',
            
            //tabla Productos
            'ver-productos',
            'crear-producto',
            'editar-producto',
            'borrar-producto',
            
            //tabla Clientes
            'ver-clientes',
            'crear-cliente',
            'editar-cliente',
            'borrar-cliente',
            
            //tabla Facturas
            'ver-facturas',
            'crear-factura',
            'editar-factura',
            'borrar-factura',
            

        ];
/*
        $guardName = 'web'; // Cambia esto según el guard que estés usando

        foreach ($permisos as $permiso) {
            if (!Permission::where('name', $permiso)->where('guard_name', $guardName)->exists()) {
                Permission::create([
                    'name' => $permiso,
                    'guard_name' => $guardName,
                ]);
            }
        }
        */
        foreach($permisos as $permiso){
            Permission::create(['name' => $permiso]);
        }
    }
}
