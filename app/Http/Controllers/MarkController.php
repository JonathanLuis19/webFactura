<?php

namespace App\Http\Controllers;

use App\Models\Mark;
use Illuminate\Http\Request;

class MarkController extends Controller
{
    function __construct(){
        $this->middleware('permission:ver-marcas|crear-marca|editar-marca|borrar-marca',['only' => 'index']);
        $this->middleware('permission:crear-marca',['only' => ['create','store']]);
        $this->middleware('permission:editar-marca',['only' => ['edit','update']]);
        $this->middleware('permission:borrar-marca',['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $marcas = Mark::paginate(5);
        return view('marcas.index', compact('marcas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('marcas.crear');
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
            'nombre' => 'required',
            'detalle' => 'required',
            'activo' => 'required',
        ]);

        Mark::create($request->all());
        return redirect()->route('marcas.index');
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
        $marca = Mark::find($id);
        return view('marcas.editar',compact('marca'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mark $marca)
    {
        request()->validate([
            'nombre' => 'required',
            'detalle' => 'required',
            'activo' => 'required'
        ]);

        $marca->update($request->all());
        return redirect()->route('marcas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Mark::find($id)->delete();
        return redirect()->route('marcas.index');
    }
}
