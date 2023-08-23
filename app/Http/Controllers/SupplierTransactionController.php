<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use App\Models\SupplierTransaction;
use Illuminate\Http\Request;

class SupplierTransactionController extends Controller
{
    function __construct(){
        $this->middleware('permission:ver-transacciones-con-el-proveedor|crear-transaccion-con-el-proveedor|editar-transaccion-con-el-proveedor|borrar-transaccion-con-el-proveedor',['only' => 'index']);
        $this->middleware('permission:crear-transaccion-con-el-proveedor',['only' => ['create','store']]);
        $this->middleware('permission:editar-transaccion-con-el-proveedor',['only' => ['edit','update']]);
        $this->middleware('permission:borrar-transaccion-con-el-proveedor',['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transaccion_proveedor = SupplierTransaction::paginate(5);
        return view('transacciones_comerciales.index', compact('transaccion_proveedor'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $proveedores = Supplier::pluck('entidad','id')->all();
        return view('transacciones_comerciales.crear', compact('proveedores'));
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
            'proveedor_id' => 'required',
            'descripcion' => 'required',
            'monto' => 'required',
            'detalles_adicionales' => 'required'
        ]);

        SupplierTransaction::create($request->all());
        return redirect()->route('transacciones_proveedor.index');
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
        $transaccion_comercial= SupplierTransaction::find($id);
        $proveedores = Supplier::pluck('entidad','id')->all();
        $proveedorSelected = $transaccion_comercial->proveedor;
        return view('transacciones_comerciales.editar', compact('transaccion_comercial', 'proveedores','proveedorSelected'));
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
            'proveedor_id' => 'required',
            'descripcion' => 'required',
            'monto' => 'required',
            'detalles_adicionales' => 'required'
        ]);

        $transaccion= SupplierTransaction::find($id);
        $transaccion->update($request->all());
        return redirect()->route('transacciones_proveedor.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        SupplierTransaction::find($id)->delete();
        return redirect()->route('transacciones_proveedor.index');
    }
}
