<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Exception;
use Illuminate\Http\Request;

class SupplierController extends Controller
{

    function __construct(){
        $this->middleware('permission:ver-proveedores|crear-proveedor|editar-proveedor|borrar-proveedor',['only' => 'index']);
        $this->middleware('permission:crear-proveedor',['only' => ['create','store']]);
        $this->middleware('permission:editar-proveedor',['only' => ['edit','update']]);
        $this->middleware('permission:borrar-proveedor',['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $proveedores = Supplier::paginate(5);
        return view('proveedores.index', compact('proveedores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('proveedores.crear');
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
            'n_identidad' => 'required',
            'entidad' => 'required',
            'descripcion' => 'required',
            'direccion' => 'required',
            'telefono' => 'required',
        ]);

        Supplier::create($request->all());
        return redirect()->route('proveedores.index');
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
        $proveedor = Supplier::find($id);
        return view('proveedores.editar', compact('proveedor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        request()->validate([
            'n_identidad' => 'required',
            'entidad' => 'required',
            'descripcion' => 'required',
            'direccion' => 'required',
            'telefono' => 'required',
        ]);
        $proveedor = Supplier::find($id);
        $proveedor->update($request->all());
        return redirect()->route('proveedores.index');    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Supplier::find($id)->delete();
        return redirect()->route('proveedores.index');
    }
}
