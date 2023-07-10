<?php

namespace App\Http\Controllers\Employee;

use App\Models\User;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = DB::table('orders')->select('orders.*', 'customers.customer_name as customerName', 'shippers.shipper_name as shipperName')
                    ->leftJoin('customers', 'customers.id', 'orders.customer_id')
                    ->leftJoin('shippers', 'shippers.id', 'orders.shipper_id')
                    ->where('orders.employee_id', auth::user()->id)
                    ->get();
        $purchases = DB::table('purchases')->select('purchases.*', 'suppliers.supplier_name as supplierName', 'shippers.shipper_name as shipperName')
                    ->leftJoin('suppliers', 'suppliers.id', 'purchases.supplier_id')
                    ->leftJoin('shippers', 'shippers.id', 'purchases.shipper_id')
                    ->where('purchases.employee_id', auth::user()->id)
                    ->get();
        $ordersCount = count($orders);
        $purchasesCount = count($purchases);
        // dd($orders);
        // dd($purchasesCount);
        return view('employee.setting.profile', compact('orders', 'purchases', 'ordersCount', 'purchasesCount'));
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
        $id = Auth::user()->id;
        $users = User::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('employee.setting.update')->with('users', auth()->user());
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $id = Auth::user()->id;
        $employees = User::find($id);
        $employees->name = $request->name;
        $employees->email = $request->email;
        $employees->company = $request->company;
        $employees->first_name = $request->first_name;
        $employees->last_name = $request->last_name;
        $employees->job_title = $request->job_title;
        $employees->street = $request->street;
        $employees->city = $request->city;
        $employees->province = $request->province;
        $employees->country = $request->country;
        $employees->email = $request->email;
        $employees->phone_number = $request->phone_number;
        $employees->webpage = $request->webpage;
        $employees->zip_code = $request->zip_code;
        $employees->note = $request->note;
        $employees->role_as = $request->role_as;
        if($request->hasFile('image')){
            $destination = 'images/employee/' . $employees->image;
            if(File::exists($destination)){
                File::delete($destination);
            }
            $file = $request->file('image');
            $extension = $file->getClientOriginalName();
            $filename = time().'.'.$extension;
            $file->move('images/employee/',$filename);
            $employees->image = $filename;
        }
        $employees->save();
        if($employees){
            return redirect(route('settings.index'))->with('Employee update successfully');
        }else{
            return redirect()->back()->with('Employee update failed');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
