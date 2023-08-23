<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

//categoria
class Category extends Model
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
