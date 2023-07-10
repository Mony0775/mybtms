<?php

namespace App\Http\Controllers\Admin;

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
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $order_count = Order::all()->count();
        $customer_count = Customer::all()->count();
        $purchase_count = Purchase::all()->count();
        $employee_count = User::all()->count();
        $shipper_count = Shipper::all()->count();
        $supplier_count = Supplier::all()->count();
        $product_count = Product::all()->count();
        $order_price = Order::all()->sum('payment_amount');
        $purchase_price = Purchase::all()->sum('payment_amount');
        $customer_today = Customer::select("*")
                ->whereBetween('created_at', 
                        [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()]
                    )->count();
        $order_date = Order::select('created_at')
                ->whereBetween('created_at', [Carbon::now()->subDays(7), Carbon::now()])->get();
        $order_recently = DB::table('orders')
                            ->select('orders.*', 'customers.customer_name as CustomerName', 'order_details.*')
                            ->leftJoin('order_details', 'order_details.order_id', 'orders.id')
                            ->leftJoin('customers', 'customers.id', 'orders.customer_id')
                            ->whereBetween('orders.updated_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
                            ->orderByDesc('orders.id')->get();
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
            // dd($itemS, $item);
        }
        // dd($items);
        

        $product = DB::table('order_details')->leftJoin('orders', 'orders.id', 'order_details.order_id')->get();
        $products = DB::table('order_details')->leftJoin('products', 'products.id', 'order_details.product_id')->get();
        // dd($product, $products);
        // dd($order_count, $purchase_count, $order_price, $purchase_price, $customer_count);
        return view('admin.dashboard', compact([
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
            'order_recently',
            'items',
            'item',
            'itemS'
        ]));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
