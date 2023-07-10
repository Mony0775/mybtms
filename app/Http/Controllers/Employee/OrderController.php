<?php

namespace App\Http\Controllers\Employee;

use App\Models\Order;
use App\Helpers\Helper;
use App\Models\Payment;
use App\Models\Product;
use App\Models\Shipper;
use App\Models\Customer;
use App\Models\OrderDetail;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = DB::table('orders')
                    ->select('orders.*', 'users.name as employeeName', 'customers.customer_name as customerName', 'shippers.shipper_name as shipperName')
                    ->leftJoin('users', 'users.id', 'orders.employee_id')
                    ->leftJoin('customers', 'customers.id', 'orders.customer_id')
                    ->leftJoin('shippers', 'shippers.id', 'orders.shipper_id')
                    ->where('orders.employee_id', Auth()->user()->id)
                    ->get();
        return view('employee.order.list', ['orders' => $orders]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $customers = Customer::all();
        $shippers = Shipper::all();
        $products = Product::all();
        $orders = Order::all();
        return view('employee.order.order', compact('products', 'orders', 'customers', 'shippers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        DB::transaction(function() use ($request){   
        //payment: payment_amount, payment_method, payment_date, payment_noted
            $payments = new Payment;
            $payments->payment_amount = $request->final_price;
            $payments->payment_type = $request->payment_method;
            $payments->payment_date = $request->payment_date;
            $payments->payment_note = $request->noted;
            $payments->save();
            $payment_id = $payments->id;
        // Order model: employee name, customer_name, shipper_id, payment_id, shipping_cost, shipping_date, tax, payment_amount
            $trx_code = Helper::IDGenerator(new Order, 'trx_code', 10, 'FT');
            $orders = new Order;
            $orders->employee_id = auth()->user()->id;
            $orders->customer_id = $request->customer_id;
            $orders->shipper_id = $request->shipper_id;
            $orders->order_date = $request->order_date;
            $orders->shipping_cost = $request->shipping_cost;
            $orders->shipping_date = $request->shipping_date;
            $orders->payment_id = $payment_id;
            $orders->sum_total = $request->total;
            $orders->tax = $request->tax;
            $orders->discount = $request->discount;
            $orders->payment_amount = $request->final_price;
            $orders->trx_code = $trx_code;
            $orders->save();
            $txn_code = $orders->trx_code;
            $order_id = $orders->id;
        // Order detail: product_id, price, quantity,total_price
            for($product_id = 0; $product_id < count($request->product_id); $product_id++){
                $order_details = new OrderDetail;
                $order_details->order_id = $order_id;
                $order_details->product_id = $request->product_id[$product_id];
                $order_details->price = $request->price[$product_id];
                $order_details->quantity = $request->quantity[$product_id];
                $order_details->total_price = $request->total_price[$product_id];
                $order_details->save();
                if($request->quantity[$product_id] < $request->alert_stock[$product_id]){
                    $products = Product::where('id',$request->product_id[$product_id])->decrement('alert_stock', $request->quantity[$product_id]);
                }else  {
                    $products = Product::where('id',$request->product_id[$product_id])->decrement('alert_stock', $request->alert_stock[$product_id]);
                } 
            }    
        //transaction: 
            $transactions = new Transaction();
            $transactions->employee_id = auth()->user()->id;
            $transactions->customer_id = $request->customer_id;
            $transactions->shipper_id = $request->shipper_id;
            $transactions->order_date = $request->order_date;
            $transactions->shipping_cost = $request->shipping_cost;
            $transactions->shipping_date = $request->shipping_date;
            $transactions->payment_id = $payment_id;
            $transactions->tax = $request->tax;
            $transactions->trx_code = $txn_code;
            $transactions->discount = $request->discount;
            $transactions->total_price = $request->final_price;
            $transactions->transaction_date = date('Y-m-d');
            $type = "Order";
            $transactions->type = $type;
            $transactions->save();
            $products = Product::all();
            $order_details = OrderDetail::where('order_id', $order_id)->get();
            $orderedBy = Order::where('id', $order_id)->get();

            return view('employee.order.list', [
                'products' => $products,
                'order_details' => $order_details,
                'orderedBy' => $orderedBy
                    ]);
            
        });
        return redirect('/employee/order')->with('status', 'Order Successful');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $orders = Order::find($id);
        $orders = DB::table('orders')
            ->select('orders.*', 'users.name as employeeName', 'customers.customer_name as customerName', 'shippers.shipper_name as shipperName', 'payments.*')
            ->leftJoin('users', 'users.id', 'orders.employee_id')
            ->leftJoin('customers', 'customers.id', 'orders.customer_id')
            ->leftJoin('shippers', 'shippers.id', 'orders.shipper_id')
            ->leftJoin('payments', 'payments.id', 'orders.payment_id')
            ->where('orders.id',$id)
            ->get();
        $order_details = DB::table('order_details')
                ->select('order_details.*', 'products.product_name as productName')
                ->join('products','products.id', 'order_details.product_id')
                ->join('orders', 'orders.id', 'order_details.order_id')
                ->where('order_details.order_id', $id)->get();
        // dd([$orders, $order_details]);
        return view('employee.order.detail', ['orders' => $orders,'order_details' => $order_details]);
    }

    public function list(){
        $orders = Order::all();
        return view('employee.order.list', compact('orders'));
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
