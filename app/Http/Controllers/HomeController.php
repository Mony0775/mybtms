<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use App\Models\Shipper;
use App\Models\Customer;
use App\Models\Purchase;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $order_count = Order::where('employee_id', Auth()->user()->id)->get()->count();
        $customer_count = Customer::all()->count();
        $purchase_count = Purchase::where('employee_id', Auth()->user()->id)->get()->count();
        $employee_count = User::all()->count();
        $shipper_count = Shipper::all()->count();
        $supplier_count = Supplier::all()->count();
        $product_count = Product::all()->count();
        $order_price = Order::where('employee_id', Auth()->user()->id)->get()->sum('payment_amount');
        $purchase_price = Purchase::where('employee_id', Auth()->user()->id)->get()->sum('payment_amount');
        $customer_today = Customer::select("*")
            ->whereBetween(
                'created_at',
                [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()]
            )->count();
        $orders_recently = DB::table('orders')
            ->select('orders.*', 'customers.customer_name as CustomerName')
            ->leftJoin('customers', 'customers.id', 'orders.customer_id')
            ->where('orders.employee_id', Auth()->user()->id)
            ->get();
        $purchases_recently = DB::table('purchases')
            ->select('purchases.*', 'suppliers.supplier_name as SupplierName')
            ->leftJoin('suppliers', 'suppliers.id', 'purchases.supplier_id')
            ->where('purchases.employee_id', Auth()->user()->id)
            ->get();
        // dd($orders_recently);
        // dd($order_count, $purchase_count, $order_price, $purchase_price, $customer_count);
        return view('employee.dashboard', compact([
            'customer_count',
            'order_price',
            'order_count',
            'purchase_count',
            'purchase_price',
            'customer_today',
            'shipper_count',
            'supplier_count',
            'product_count',
            'employee_count',
            'orders_recently',
            'purchases_recently'
        ]));
    }
}
