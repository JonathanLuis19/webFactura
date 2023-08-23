<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

//proveedores
class Supplier extends Model
{
    use HasFactory;

    protected $fillable = [
        'n_identidad',
        'entidad',
        'descripcion',
        'direccion',
        'telefono'
    ];

    public function productos(){
        return $this->hasMany(Product::class);
    }
    
    public function transaccionProveedores(){
        return $this->hasMany(SupplierTransaction::class);
    }

}
