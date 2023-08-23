<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

//sucursal
class Branch extends Model
{
    use HasFactory;


    protected $fillable = [
        'sucursal',
        'detalle',
    ];



    public function usuarios(){
        return $this->hasMany(User::class);
    }

    
}

