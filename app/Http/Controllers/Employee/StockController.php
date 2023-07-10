<?php

namespace App\Http\Controllers\Employee;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\OrderDetail;

class StockController extends Controller
{
    public function inventories()
    {
        $product = DB::table('products')->select('products.id')->get()->count();

        foreach(range(1, $product) as $product_id){
            $item[$product_id] = DB::table('products')
            ->leftJoin('order_details', 'order_details.product_id', 'products.id')
            ->where('products.id', $product_id)->sum('quantity');

            $itemS[$product_id] = DB::table('products')
            ->leftJoin('purchase_details', 'purchase_details.product_id', 'products.id')
            ->where('products.id', $product_id)->sum('quantity');

            $items[$product_id] = DB::table('products')
            ->leftJoin('order_details', 'order_details.product_id', 'products.id')
            ->where('products.id', $product_id)->get();
            // dd($items, $item);
        }
        return view('employee.inventory.inventories', compact('product', 'items', 'item', 'itemS'));
    }
    public function order()
    {
        // $transactions = Transaction::latest()->get();
        $transactions = DB::table('transactions')
                        ->select('transactions.*', 'users.name as employeeName', 'customers.customer_name as CustomerName', 'shippers.shipper_name as ShipperName', 'payments.*')
                        ->leftJoin('users', 'users.id', 'transactions.employee_id')
                        ->leftJoin('customers', 'customers.id', 'transactions.customer_id')
                        ->leftJoin('shippers', 'shippers.id', 'transactions.shipper_id')
                        ->leftJoin('payments', 'payments.id', 'transactions.payment_id')
                        ->where('transactions.type', 'order')
                        ->get();
        // dd($transactions);
        return view('employee.inventory.order', compact('transactions'));
    }
    public function purchasing()
    {
        $transactions = DB::table('transactions')
                        ->select('transactions.*', 'users.name as employeeName', 'shippers.shipper_name as ShipperName','suppliers.supplier_name as supplierName', 'payments.*')
                        ->leftJoin('users', 'users.id', 'transactions.employee_id')
                        ->leftJoin('shippers', 'shippers.id', 'transactions.shipper_id')
                        ->leftJoin('suppliers', 'suppliers.id', 'transactions.supplier_id')
                        ->leftJoin('payments', 'payments.id', 'transactions.payment_id')
                        ->where('transactions.type', 'purchase')
                        ->get();
        return view('employee.inventory.purchase', compact('transactions'));
    }

}
