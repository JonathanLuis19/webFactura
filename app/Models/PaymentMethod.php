<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

//metodo de pago
class PaymentMethod extends Model
{
    use HasFactory;


    protected $fillable = [
        'metodo_pago',
        'descripcion',
        'activo'
    ];

    public function facturas(){
        return $this->hasMany(Invoice::class);
    }


}
