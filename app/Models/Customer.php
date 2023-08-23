<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

//Cliente
class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'cedula',
        'nombre',
        'direccion',
        'telefono',
        'email'
    ];


    
    public function facturas(){
        return $this->hasMany(Invoice::class);
    }
}
