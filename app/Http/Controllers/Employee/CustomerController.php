<?php

namespace App\Http\Controllers\Employee;

use App\Models\Customer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CustomerController extends Controller
{
    public function index()
    {
       $customers = Customer::all();
       return view('employee.customer.customer', compact('customers'));
    }
    public function list()
    {
       return view('employee.customer.customer_list');
    }
    public function order()
    {
       return view('employee.customer.customer_order');
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
        $customers = new Customer;
        $customers->customer_name = $request->customer_name;
        $customers->email = $request->email;
        $customers->company = $request->company;
        $customers->first_name = $request->first_name;
        $customers->last_name = $request->last_name;
        $customers->job_title = $request->job_title;
        $customers->street = $request->street;
        $customers->city = $request->city;
        $customers->province = $request->province;
        $customers->country = $request->country;
        $customers->email = $request->email;
        $customers->phone_number = $request->phone_number;
        $customers->webpage = $request->webpage;
        $customers->zip_code = $request->zip_code;
        $customers->note = $request->note;
        $customers->save();
        if($customers){
            return redirect()->back()->with('success','customer create successfully');
        }else{
            return redirect()->back()->with('error','customer create failed');
        }
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
        $customers = Customer::find($id);
        // $users->name = $request->name;
        // $users->password = md5($request->password);
        // $users->email = $request->email;
        // $users->is_admin = $request->is_admin;
        // $users->save();
        if(!$customers){
            return back()->with('Error','customer not found');
        }
        $customers->update($request->all());
        return back()->with('Success','customer update successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $customers = Customer::find($id);
        if(!$customers){
            return back()->with('Error','Customer not found');
        }
        $customers->delete();
        return back()->with('Success','Customer delete successfully');
    }
}
