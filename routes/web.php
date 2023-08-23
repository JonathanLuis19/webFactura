<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

//controllers
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\MarkController;
use App\Http\Controllers\PaymentMethodController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\SupplierTransactionController;
use App\Http\Controllers\BusquedaController;
use App\Models\Branch;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', function () {
    return view('auth.login');
});


require __DIR__.'/auth.php';

Route::group(['middleware' => ['auth']], function(){
    
    Route::get('/dashboard', [DashboardController::class,'dash'])->name('dashboard');
    
    Route::resource('roles', RolController::class);
    Route::resource('usuarios', UserController::class);
    Route::resource('sucursales', BranchController::class);
    Route::resource('categorias', CategoryController::class);
    Route::resource('marcas', MarkController::class);
    Route::resource('clientes', CustomerController::class);
    Route::resource('metodo_pago', PaymentMethodController::class);
    Route::resource('productos', ProductController::class);
    Route::resource('proveedores', SupplierController::class);
    Route::resource('transacciones_proveedor', SupplierTransactionController::class);
    Route::resource('facturas', InvoiceController::class);
    
    route::get('factura/registrada/{id}', [InvoiceController::class,'show_factura'])->name('factura.registrada');
    //search cedula
    Route::get('search/cedulas',[BusquedaController::class, 'cedulas'])->name('search.cedulas');
    //search product
    Route::get('search/productos',[BusquedaController::class, 'searchProduct_Nombre'])->name('search.products_name');
    
});
