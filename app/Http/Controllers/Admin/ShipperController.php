<?php

namespace App\Http\Controllers\Admin;

use App\Models\Shipper;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ShipperController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $shippers = Shipper::all();
        return view('admin.shipper.shipper', compact('shippers'));
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
        $shippers = new Shipper;
        $shippers->shipper_name = $request->name;
        $shippers->email = $request->email;
        $shippers->company = $request->company;
        $shippers->first_name = $request->first_name;
        $shippers->last_name = $request->last_name;
        $shippers->job_title = $request->job_title;
        $shippers->street = $request->street;
        $shippers->city = $request->city;
        $shippers->province = $request->province;
        $shippers->country = $request->country;
        $shippers->email = $request->email;
        $shippers->phone_number = $request->phone_number;
        $shippers->webpage = $request->webpage;
        $shippers->zip_code = $request->zip_code;
        $shippers->note = $request->note;
        $shippers->save();
        if($shippers){
            return redirect()->back()->with('shipper create successfully');
        }else{
            return redirect()->back()->with('shipper create failed');
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
        $shippers = Shipper::find($id);
        // $users->name = $request->name;
        // $users->password = md5($request->password);
        // $users->email = $request->email;
        // $users->is_admin = $request->is_admin;
        // $users->save();
        if(!$shippers){
            return back()->with('Error','shipper not found');
        }
        $shippers->update($request->all());
        return back()->with('Success','shipper update successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $shippers = Shipper::find($id);
        if(!$shippers){
            return back()->with('Error','shipper not found');
        }
        $shippers->delete();
        return back()->with('Success','shipper delete successfully');
    }
}
