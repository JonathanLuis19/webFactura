<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use Illuminate\Http\Request;
 
class BranchController extends Controller
{
    function __construct(){
        $this->middleware('permission:ver-sucursales|crear-sucursal|editar-sucursal|borrar-sucursal',['only' => 'index']);
        $this->middleware('permission:crear-sucursal',['only' => ['create','store']]);
        $this->middleware('permission:editar-sucursal',['only' => ['edit','update']]);
        $this->middleware('permission:borrar-sucursal',['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sucursales = Branch::paginate(5);
        return view('sucursales.index',compact('sucursales'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sucursales.crear');
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
            'sucursal' => 'required',
            'detalle' => 'required'
        ]);
        
        Branch::create($request->all());
        return redirect()->route('sucursales.index');
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
        $sucursal = Branch::find($id);
        return view('sucursales.editar',compact('sucursal'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Branch $sucursal)
    {
        request()->validate([
            'sucursal' => 'required',
            'detalle' => 'required'
        ]);
        $sucursal->update($request->all());
        return redirect()->route('sucursales.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Branch::find($id)->delete();
        return redirect()->route('sucursales.index');
    }

    public function getSucursalCount()
    {
        $count = Branch::count();
        return $count;
    }

}
