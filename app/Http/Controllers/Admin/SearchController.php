<?php

namespace App\Http\Controllers\Admin;

use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        if ($request->search) {
            $searches = DB::table('transactions')
            ->select('transactions.*', 'orders.id as order_id','purchases.id as purchase_id', 'users.name as employeeName', 'customers.customer_name as customerName','shippers.shipper_name as shipperName','suppliers.supplier_name as supplierName')
            ->leftJoin('orders', 'orders.trx_code', 'transactions.trx_code')
            ->leftJoin('purchases', 'purchases.payment_id', 'transactions.payment_id')
            ->leftJoin('users', 'users.id', 'transactions.employee_id')
            ->leftJoin('customers', 'customers.id', 'transactions.customer_id')
            ->leftJoin('shippers', 'shippers.id', 'transactions.shipper_id')
            ->leftJoin('suppliers', 'suppliers.id', 'transactions.supplier_id')
            ->where('transactions.trx_code', $request->search)
            ->get();
            // dd($searches);
            // $search = Transaction::where('trx_code', '=', $request->search)->latest()->get();
            return view('admin.search.search', compact('searches'));
        }
    }
}
