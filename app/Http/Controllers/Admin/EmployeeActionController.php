<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class EmployeeActionController extends Controller
{
    public function employeeOrder()
    {
        // $transactions = Transaction::latest()->get();
        $orders = DB::table('orders')
            ->select('orders.*', 'customers.customer_name as CustomerName','shippers.shipper_name as ShipperName', 'payments.*')
            ->leftJoin('customers', 'customers.id', 'orders.customer_id')
            ->leftJoin('shippers', 'shippers.id', 'orders.shipper_id')
            ->leftJoin('payments', 'payments.id', 'orders.payment_id')
            ->get();
        // dd($orders);
        return view('admin.employee.order', compact('orders'));
    }
    public function employeePurchase()
    {
        
    }
}
