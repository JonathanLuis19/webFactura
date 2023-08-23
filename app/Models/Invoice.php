<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

//factura
class Invoice extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'cliente_id',
        'pago_id',
        'n_factura',
        'iva',
        'total',
        'idtransaccion',
    ];

    public function usuario(){
        return $this->belongsTo(User::class, 'user_id');
    }
    public function cliente(){
        return $this->belongsTo(Customer::class, 'cliente_id');
    }

    public function metodoPago(){
        return $this->belongsTo(PaymentMethod::class, 'pago_id');
    }

    public function detalles_factura(){
        return $this->hasMany(Detail::class, 'factura_id');
    }

}
