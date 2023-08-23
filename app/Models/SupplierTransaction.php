<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

//transacciones realizadas entre el proveedor y la empresa
class SupplierTransaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'proveedor_id',
        'descripcion',
        'monto',
        'detalles_adicionales'
    ];

    public function proveedor()
    {
        return $this->belongsTo(Supplier::class, 'proveedor_id');
    }
    

}
