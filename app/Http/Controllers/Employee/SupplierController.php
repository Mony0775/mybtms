<?php

namespace App\Http\Controllers\Employee;

use App\Models\Supplier;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $suppliers = Supplier::all();
        return view('employee.supplier.supplier', compact('suppliers'));
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
        $suppliers = new Supplier;
        $suppliers->supplier_name = $request->name;
        $suppliers->email = $request->email;
        $suppliers->company = $request->company;
        $suppliers->first_name = $request->first_name;
        $suppliers->last_name = $request->last_name;
        $suppliers->job_title = $request->job_title;
        $suppliers->street = $request->street;
        $suppliers->city = $request->city;
        $suppliers->province = $request->province;
        $suppliers->country = $request->country;
        $suppliers->email = $request->email;
        $suppliers->phone_number = $request->phone_number;
        $suppliers->webpage = $request->webpage;
        $suppliers->zip_code = $request->zip_code;
        $suppliers->note = $request->note;
        $suppliers->save();
        if($suppliers){
            return redirect()->back()->with('supplier create successfully');
        }else{
            return redirect()->back()->with('supplier create failed');
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
        $suppliers = Supplier::find($id);
        // $users->name = $request->name;
        // $users->password = md5($request->password);
        // $users->email = $request->email;
        // $users->is_employee = $request->is_employee;
        // $users->save();
        if(!$suppliers){
            return back()->with('Error','supplier not found');
        }
        $suppliers->update($request->all());
        return back()->with('Success','supplier update successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $suppliers = Supplier::find($id);
        if(!$suppliers){
            return back()->with('Error','Supplier not found');
        }
        $suppliers->delete();
        return back()->with('Success','Supplier delete successfully');
    }
}
