<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Branch;
use App\Models\User;
use App\Notifications\notificacionCreacionCuenta;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Arr;

class UserController extends Controller
{
    
    function __construct(){
        $this->middleware('permission:ver-usuarios|crear-usuario|editar-usuario|borrar-usuario',['only' => 'index']);
        $this->middleware('permission:crear-usuario',['only' => ['create','store']]);
        $this->middleware('permission:editar-usuario',['only' => ['edit','update']]);
        $this->middleware('permission:borrar-usuario',['only' => ['destroy']]);
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuarios = User::paginate(20);
        $ultimoUsuario = User::latest()->first();
        return view('usuarios.index',compact('usuarios','ultimoUsuario'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::pluck('name','name')->all();
        $sucursales = Branch::pluck('sucursal','id')->all();
        return view('usuarios.crear',compact('roles','sucursales'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request,[
            'sucursal_id' => 'required',
            'nombre' => 'required',
            'apellido' => 'required',
            'cedula' => 'required',
            'sueldo' => 'required',
            'activo' => 'required',
            'email' => 'required|email|unique:users,email',
            'roles' => 'required',
        ]);
        $longitud = 6;
        $password_temporal = substr(uniqid(),0,$longitud);
        $email = $request->input('email');
        
        $input = $request->all();       
        $input['password'] = Hash::make($password_temporal);
        $input['name'] = $request->input('nombre')."_".$request->input('apellido');

        $user = User::create($input);
        $user->notify(new notificacionCreacionCuenta($password_temporal, $email));
        $user->assignRole($request->input('roles'));

        return redirect()->route('usuarios.index');

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
        $user = User::find($id);
        $roles = Role::pluck('name','name')->all();
        $userRole = $user->roles->pluck('name','name')->all();
        $sucursales = Branch::pluck('sucursal','id')->all();
        $userSucursal = $user->sucursal->sucursal;
        return view('usuarios.editar', compact('user', 'roles', 'userRole', 'sucursales', 'userSucursal'));
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
        $this->validate($request,[
            'sucursal_id' => 'required',
            'name' =>'required',
            'nombre' => 'required',
            'apellido' => 'required',
            'cedula' => 'required',
            'sueldo' => 'required',
            'activo' => 'required',
            'email' => 'required|email|unique:users,email,'.$id,
            'roles' => 'required',
        ]);

        $input = $request->all();       
        $input = Arr::except($input,array('password'));
        
        $user = User::find($id);
        $user->update($input);
        DB::table('model_has_roles')->where('model_id',$id)->delete();

        $user->assignRole($request->input('roles'));
        session()->flash('success', 'El registro ha sido actualizado con éxito.');
        return redirect()->route('usuarios.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();
        return redirect()->route('usuarios.index');
    }
}
