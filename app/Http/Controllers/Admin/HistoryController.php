<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class HistoryController extends Controller
{
    public function index()
    {
        $employee = DB::table('orders')
            ->select('users.name as employeeName')
            ->leftJoin('users', 'users.id', 'orders.employee_id')
            ->where('orders.employee_id', auth()->user()->id)->first();
        // dd($employee);
        $amountReport = DB::table('orders')
            ->select('users.name as employeeName')
            ->leftJoin('users', 'users.id', 'orders.employee_id')
            ->where('orders.employee_id', auth()->user()->id)->count();
        $saleReport = DB::table('orders')
            ->select('users.name as employeeName')
            ->leftJoin('users', 'users.id', 'orders.employee_id')
            ->where('orders.employee_id', auth()->user()->id)->sum('payment_amount');
        // dd($amountReport, $saleReport);

        $thisMonth = DB::table('orders')
            ->whereBetween('orders.created_at', [Carbon::now()->startOfMonth(), Carbon::now()->endOfMonth()])
            ->orderByDesc('orders.id')->count();
        $saleInMonth = DB::table('orders')
            ->whereBetween('orders.created_at', [Carbon::now()->startOfMonth(), Carbon::now()->endOfMonth()])
            ->sum('payment_amount');
        $thisWeek = DB::table('orders')
            ->whereBetween('orders.created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
            ->orderByDesc('orders.id')->count();
        $saleInWeek = DB::table('orders')
            ->whereBetween('orders.created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
            ->sum('payment_amount');
        $toDay = DB::table('orders')
            ->whereBetween('orders.created_at', [Carbon::now()->startOfDay(), Carbon::now()->endOfDay()])
            ->orderByDesc('orders.id')->count();
        $saleInToday = DB::table('orders')
            ->whereBetween('orders.created_at', [Carbon::now()->startOfDay(), Carbon::now()->endOfDay()])
            ->orderByDesc('orders.id')->sum('payment_amount');
            // dd($thisMonth, $saleInMonth, $thisWeek, $toDay);


        $transactions = DB::table('transactions')
            ->select('transactions.*', 'users.name as employeeName', 'customers.customer_name as CustomerName', 'shippers.shipper_name as ShipperName', 'payments.*')
            ->leftJoin('users', 'users.id', 'transactions.employee_id')
            ->leftJoin('customers', 'customers.id', 'transactions.customer_id')
            ->leftJoin('shippers', 'shippers.id', 'transactions.shipper_id')
            ->leftJoin('payments', 'payments.id', 'transactions.payment_id')
            ->where('transactions.type', 'Order')->where('transactions.employee_id', auth()->user()->id)
            ->get();
        // dd($transactions);
        return view('admin.history.sale_report', compact('employee','transactions', 'thisMonth', 'saleInMonth', 'thisWeek', 'saleInWeek', 'toDay', 'saleInToday', 'amountReport', 'saleReport'));
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
            ->where('transactions.employee_id', Auth()->user()->id)
            ->get();
        // dd($transactions);
        return view('admin.history.stockOut', compact('transactions'));
    }
    public function purchasing()
    {
        $transactions = DB::table('transactions')
            ->select('transactions.*', 'users.name as employeeName', 'shippers.shipper_name as ShipperName', 'suppliers.supplier_name as supplierName', 'payments.*')
            ->leftJoin('users', 'users.id', 'transactions.employee_id')
            ->leftJoin('shippers', 'shippers.id', 'transactions.shipper_id')
            ->leftJoin('suppliers', 'suppliers.id', 'transactions.supplier_id')
            ->leftJoin('payments', 'payments.id', 'transactions.payment_id')
            ->where('transactions.employee_id', Auth()->user()->id)
            ->where('transactions.type', 'purchase')
            ->get();
        return view('admin.history.stockIn', compact('transactions'));
    }
}
