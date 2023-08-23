<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

//detalles de la factura con el cliente
class Detail extends Model
{
    use HasFactory;

    protected $fillable = [
        'factura_id',
        'producto_id',
        'cantidad',
        'subtotal',
        'descuento'
    ];

    public function factura(){
        return $this->belongsTo(Invoice::class, 'factura_id');
    }

    public function producto(){
        return $this->belongsTo(Product::class, 'producto_id');
    }
    

}
