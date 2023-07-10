<?php

namespace App\Http\Controllers\Employee;

use App\Helpers\Helper;
use App\Models\Payment;
use App\Models\Product;
use App\Models\Shipper;
use App\Models\Purchase;
use App\Models\Supplier;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Models\PurchaseDetail;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class PurchaseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $purchases = DB::table('purchases')
                    ->select('purchases.*', 'users.name as employeeName', 'suppliers.supplier_name as supplierName', 'shippers.shipper_name as shipperName')
                    ->leftJoin('users', 'users.id', 'purchases.employee_id')
                    ->leftJoin('suppliers', 'suppliers.id', 'purchases.supplier_id')
                    ->leftJoin('shippers', 'shippers.id', 'purchases.shipper_id')
                    ->where('purchases.employee_id', Auth()->user()->id)
                    ->get();
                    // dd($purchases);
        return view('employee.purchase.list', ['purchases' => $purchases]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $suppliers = Supplier::all();
        $shippers = Shipper::all();
        $products = Product::all();
        $purchases = Purchase::all();
        return view('employee.purchase.purchase', compact('products', 'purchases', 'suppliers', 'shippers'));
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
            // purchase model: employee name, customer_name, shipper_id, payment_id, shipping_cost, shipping_date, tax, payment_amount
            $trx_code = Helper::IDGenerator(new Purchase, 'trx_code', 10, 'FT');
                $purchases = new Purchase;
                $purchases->employee_id = auth()->user()->id;
                $purchases->supplier_id = $request->supplier_id;
                $purchases->shipper_id = $request->shipper_id;
                $purchases->purchase_date = $request->purchase_date;
                $purchases->shipping_cost = $request->shipping_cost;
                $purchases->shipping_date = $request->shipping_date;
                $purchases->payment_id = $payment_id;
                $purchases->sum_total = $request->total;
                $purchases->tax = $request->tax;
                $purchases->discount = $request->discount;
                $purchases->payment_amount = $request->final_price;
                $purchases->trx_code = $trx_code;
                $purchases->save();
                $purchase_id = $purchases->id;
                $txn_code = $purchases->trx_code;
            // purchase detail: product_id, price, quantity,total_price
                for($product_id = 0; $product_id < count($request->product_id); $product_id++){
                    $purchase_details = new PurchaseDetail;
                    $purchase_details->purchase_id = $purchase_id;
                    $purchase_details->product_id = $request->product_id[$product_id];
                    $purchase_details->price = $request->price[$product_id];
                    $purchase_details->quantity = $request->quantity[$product_id];
                    $purchase_details->total_price = $request->total_price[$product_id];
                    $purchase_details->save();
                    if($request->alert_stock[$product_id] <= 100){
                        $products = Product::where('id',$request->product_id[$product_id])->increment('alert_stock', $request->quantity[$product_id]);
                    }else  {
                        $products = Product::where('id',$request->product_id[$product_id])->increment('alert_stock', $request->alert_stock[$product_id]);
                    }            
                }    
            //transaction: 
                $transactions = new Transaction();
                $transactions->employee_id = auth()->user()->id;
                $transactions->supplier_id = $request->supplier_id;
                $transactions->shipper_id = $request->shipper_id;
                $transactions->purchase_date = $request->purchase_date;
                $transactions->shipping_cost = $request->shipping;
                $transactions->shipping_date = $request->shipping_date;
                $transactions->payment_id = $payment_id;
                $transactions->tax = $request->tax;
                $transactions->discount = $request->discount;
                $transactions->total_price = $request->final_price;
                $transactions->transaction_date = date('Y-m-d');
                $transactions->trx_code = $txn_code;
                $type = "Purchase";
                $transactions->type = $type;
                $transactions->save();
                $products = Product::all();
                $purchase_details = PurchaseDetail::where('purchase_id', $purchase_id)->get();
                $purchasedBy = Purchase::where('purchases.id', $purchase_id)->get();
    
                return view('employee.purchase.list', [
                    'products' => $products,
                    'purchase_details' => $purchase_details,
                    'purchasedBy' => $purchasedBy
                ]);
                
            });
            return redirect('/employee/purchase')->with('status', 'purchase Successful');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $purchases = Purchase::find($id);
        $purchases = DB::table('purchases')
            ->select('purchases.*', 'users.name as employeeName', 'suppliers.supplier_name as supplierName', 'shippers.shipper_name as shipperName', 'payments.*')
            ->leftJoin('users', 'users.id', 'purchases.employee_id')
            ->leftJoin('suppliers', 'suppliers.id', 'purchases.supplier_id')
            ->leftJoin('shippers', 'shippers.id', 'purchases.shipper_id')
            ->leftJoin('payments', 'payments.id', 'purchases.payment_id')
            ->where('purchases.id',$id)
            ->get();
        $purchase_details = DB::table('purchase_details')
                ->select('purchase_details.*', 'products.product_name as productName')
                ->join('products','products.id', 'purchase_details.product_id')
                ->join('purchases', 'purchases.id', 'purchase_details.purchase_id')
                ->where('purchase_details.purchase_id', $id)->get();
        // dd([$orders, $order_details]);
        return view('employee.purchase.detail', ['purchases' => $purchases,'purchase_details' => $purchase_details]);
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
