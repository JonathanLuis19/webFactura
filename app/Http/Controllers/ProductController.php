<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Mark;
use App\Models\Product;
use App\Models\Supplier;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    function __construct(){
        $this->middleware('permission:ver-productos|crear-producto|editar-producto|borrar-producto',['only' => 'index']);
        $this->middleware('permission:crear-producto',['only' => ['create','store']]);
        $this->middleware('permission:editar-producto',['only' => ['edit','update']]);
        $this->middleware('permission:borrar-producto',['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productos = Product::paginate(10);
        return view('productos.index', compact('productos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias = Category::where('activo', true)->pluck('nombre', 'id');
        $marcas = Mark::where('activo', true)->pluck('nombre', 'id');
        $proveedores = Supplier::pluck('entidad','id');
        return view('productos.crear', compact('categorias','marcas','proveedores'));
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
            'categoria_id' => 'required',
            'marca_id' => 'required',
            'proveedor_id' => 'required',
            'nombre' => 'required',
            'codigo' => 'required',
            'detalle' => 'required',
            'precio' => 'required',
            'stock' => 'required'
        ]);

        Product::create($request->all());
        return redirect()->route('productos.index');
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
        $producto= Product::find($id);
        $categorias = Category::where('activo', true)->pluck('nombre', 'id');
        $marcas = Mark::where('activo', true)->pluck('nombre', 'id');
        $proveedores = Supplier::pluck('entidad','id')->all();
        return view('productos.editar', compact('producto', 'categorias','marcas','proveedores'));
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
            'categoria_id' => 'required',
            'marca_id' => 'required',
            'proveedor_id' => 'required',
            'nombre' => 'required',
            'codigo' => 'required',
            'detalle' => 'required',
            'precio' => 'required',
            'stock' => 'required'
        ]);
        $producto = Product::find($id);
        $producto->update($request->all());
        return redirect()->route('productos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::find($id)->delete();
        return redirect()->route('productos.index');
    }
}
