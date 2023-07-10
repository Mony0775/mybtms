<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class TransactionController extends Controller
{
    public function index()
    {
        // $transactions = Transaction::latest()->get();
        $transactions = DB::table('transactions')
                        ->select('transactions.*','orders.trx_code as txnCodeOrder','purchases.trx_code as txnCodePurchase','users.name as employeeName', 'customers.customer_name as CustomerName', 'shippers.shipper_name as ShipperName','suppliers.supplier_name as supplierName','payments.*')
                        ->leftJoin('users', 'users.id', 'transactions.employee_id')
                        ->leftJoin('customers', 'customers.id', 'transactions.customer_id')
                        ->leftJoin('shippers', 'shippers.id', 'transactions.shipper_id')
                        ->leftJoin('suppliers', 'suppliers.id', 'transactions.supplier_id')
                        ->leftJoin('payments', 'payments.id', 'transactions.payment_id')
                        ->leftJoin('orders', 'orders.payment_id', 'transactions.payment_id')
                        ->leftJoin('purchases', 'purchases.payment_id', 'transactions.payment_id')
                        ->get();
        // dd($transactions);
        return view('admin.transaction.all_transaction', compact('transactions'));
    }
    public function order()
    {
        // $transactions = Transaction::latest()->get();
        $transactions = DB::table('transactions')
                        ->select('transactions.*', 'orders.trx_code as txnCode','users.name as employeeName', 'customers.customer_name as CustomerName', 'shippers.shipper_name as ShipperName', 'payments.*')
                        ->leftJoin('users', 'users.id', 'transactions.employee_id')
                        ->leftJoin('customers', 'customers.id', 'transactions.customer_id')
                        ->leftJoin('shippers', 'shippers.id', 'transactions.shipper_id')
                        ->leftJoin('payments', 'payments.id', 'transactions.payment_id')
                        ->leftJoin('orders', 'orders.payment_id', 'transactions.payment_id')
                        ->where('transactions.type', 'order')
                        ->get();
        // dd($transactions);
        return view('admin.transaction.order_transaction', compact('transactions'));
    }
    public function purchasing()
    {
        $transactions = DB::table('transactions')
                        ->select('transactions.*','purchases.trx_code as txnCode','users.name as employeeName', 'shippers.shipper_name as ShipperName','suppliers.supplier_name as supplierName', 'payments.*')
                        ->leftJoin('users', 'users.id', 'transactions.employee_id')
                        ->leftJoin('shippers', 'shippers.id', 'transactions.shipper_id')
                        ->leftJoin('suppliers', 'suppliers.id', 'transactions.supplier_id')
                        ->leftJoin('payments', 'payments.id', 'transactions.payment_id')
                        ->leftJoin('purchases', 'purchases.payment_id', 'transactions.payment_id')
                        ->where('transactions.type', 'purchase')
                        ->get();
        return view('admin.transaction.purchase_transaction', compact('transactions'));
    }
}
