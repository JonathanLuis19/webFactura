<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

//productos
class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'categoria_id',
        'marca_id',
        'proveedor_id',
        'nombre',
        'codigo',
        'detalle',
        'precio',
        'stock'
    ];

    public function categoria(){
        return $this->belongsTo(Category::class,'categoria_id');
    }

    public function marca(){
        return $this->belongsTo(Mark::class,'marca_id');
    }

    public function proveedor (){
        return $this->belongsTo(Supplier::class,'proveedor_id');
    }

    public function detalles(){
        return $this->hasMany(Detail::class);
    }

}
