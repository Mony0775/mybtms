<?php

namespace App\Http\Controllers\Admin;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class EmployeeHisController extends Controller
{
    public function order(){
        $orders = DB::table('orders')->select('orders.*', 'customers.customer_name as CustomerName', 'shippers.shipper_name as ShipperName')
        ->leftJoin('customers', 'customers.id', 'orders.customer_id')
        ->leftJoin('shippers', 'shippers.id', 'orders.shipper_id')
        ->where('orders.employee_id', Auth::user()->id)
        ->get();

        return view('admin.employee.order', compact('orders'));
    }
    public function purchase(){
        $purchases = DB::table('purchases')->select('purchases.*', 'suppliers.supplier_name as supplierName', 'shippers.shipper_name as shipperName')
        ->leftJoin('suppliers', 'suppliers.id', 'purchases.supplier_id')
        ->leftJoin('shippers', 'shippers.id', 'purchases.shipper_id')
        ->where('purchases.employee_id', Auth::user()->id)
        ->get();
        return view('admin.employee.purchase', compact('purchases'));
    }
}
