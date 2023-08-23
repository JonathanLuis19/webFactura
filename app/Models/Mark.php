<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

//Marca de productos
class Mark extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'detalle',
        'activo'
    ];

    public function productos(){
        return $this->hasMany(Product::class);
    }

}
