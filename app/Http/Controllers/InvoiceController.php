<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\Detail;
use App\Models\Invoice;
use App\Models\PaymentMethod;
use App\Models\Product;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $facturas = Invoice::paginate(15);
        return view('facturas.index', compact('facturas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $metodos_pago = PaymentMethod::where('activo', true)->pluck('metodo_pago', 'id');
        $user = auth()->user();
        $ultimaFactura = Invoice::latest()->first();
        $ultimoId = $ultimaFactura->id + 1;
        
        return view('facturas.crear', compact('user','metodos_pago', 'ultimoId'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Obtener los detalles del formulario y convertir el JSON a un array
        $detallesArray = json_decode($request->input('detalles'), true);

        //validacion del stock
        $validStock = true;
        foreach ($detallesArray as $detalle) {
            $producto = Product::find($detalle['producto_id']);
            if ($producto->stock < $detalle['cantidad']) {
                $validStock = false;
                break; // Romper el bucle si se encuentra un producto con stock insuficiente
            }
        }
    
        if (!$validStock) {
            return redirect()->back()->with('error', 'Stock insuficiente para completar la operación.');
        }


        //factura
        $facturaData = $request->only(['user_id', 'cliente_id', 'pago_id', 'n_factura', 'iva', 'total']);
        $facturaData['idtransaccion'] = 'Id11111100kdkd';
        $factura = Invoice::create($facturaData);

        //////detalles
        foreach ($detallesArray as $detalle) {
            $factura->detalles_factura()->create([
                'factura_id' =>  $factura->id,
                'producto_id' => $detalle['producto_id'],
                'cantidad' => $detalle['cantidad'],
                'subtotal' => $detalle['subtotal'],
                'descuento' => $detalle['descuento']
            ]);
        }

        // Reducción de la cantidad de productos en el inventario
        $producto = Product::find($detalle['producto_id']);
        $producto->stock -= $detalle['cantidad'];
        $producto->save();
        
        //dd($detallesArray);
        return redirect()->route('facturas.index');
    }



    public function show_factura($id)
    {
        $factura = Invoice::with('detalles_factura')->find($id); //para poder obtener, tanto los datos de la factura como los productos
        return view('facturas.factura_registrada', compact('factura'));
    }



}
