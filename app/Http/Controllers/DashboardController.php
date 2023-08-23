<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Invoice;
use App\Models\SupplierTransaction;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dash()
    {
        $count_usuarios= User::count();
        $count_clientes = Customer::count();
        $count_facturas = Invoice::count();
        $count_transacciones = SupplierTransaction::count();
        return view('Dashboard.index',compact('count_usuarios','count_clientes','count_facturas','count_transacciones'));
    }

}
