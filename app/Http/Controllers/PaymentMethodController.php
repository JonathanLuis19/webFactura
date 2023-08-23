<?php

namespace App\Http\Controllers;

use App\Models\PaymentMethod;
use Illuminate\Http\Request;

class PaymentMethodController extends Controller
{
    function __construct(){
        $this->middleware('permission:ver-metodos-de-pago|crear-metodo-de-pago|editar-metodo-de-pago|borrar-metodo-de-pago',['only' => 'index']);
        $this->middleware('permission:crear-metodo-de-pago',['only' => ['create','store']]);
        $this->middleware('permission:editar-metodo-de-pago',['only' => ['edit','update']]);
        $this->middleware('permission:borrar-metodo-de-pago',['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $metodos_pago = PaymentMethod::paginate(5);
        return view('metodos_de_pago.index', compact('metodos_pago'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('metodos_de_pago.crear');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'metodo_pago' => 'required',
            'descripcion' => 'required',
            'activo' => 'required',
        ]);

        PaymentMethod::create($request->all());
        return redirect()->route('metodo_pago.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $metodo_pago = PaymentMethod::find($id);
        return view('metodos_de_pago.editar',compact('metodo_pago'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PaymentMethod $metodo_pago)
    {
        request()->validate([
            'metodo_pago' => 'required',
            'descripcion' => 'required',
            'activo' => 'required',
        ]);

        $metodo_pago->update($request->all());
        return redirect()->route('metodo_pago.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        PaymentMethod::find($id)->delete();
        return redirect()->route('metodo_pago.index');
    }
}
