<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class BusquedaController extends Controller
{
    //search cedulas
    public function cedulas (Request $request)
    {
        $term = $request->get('term');
        $querys = Customer::where('cedula','LIKE' ,'%'.$term.'%' )->get();
        $data = [];
        foreach($querys as $query){
            $data[]= [
                'label' => $query->cedula.' - '.$query->nombre,
                'value' => $query->id,
            ];
        }
        return $data;   
    }

    //search products
    public function searchProduct_Nombre (Request $request)
    {
        $term = $request->get('term');
        $querys = Product::where('nombre','LIKE' ,'%'.$term.'%' )->get();
        $data = [];
        foreach($querys as $query){
            $data[]= [
                'label' => $query->nombre,
                'value' => $query->id,
                'precio' => $query->precio,
                'stock' => $query->stock,
            ];
        }
        return $data;   
    }

}
