<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employees = User::all();
        return view('admin.employee.employee', compact('employees'));
    }
    public function order()
    {
        return view('admin.employee.order');
    }
    public function purchase()
    {
        return view('admin.employee.purchase');
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
        $employees = new User;
        $employees->name = $request->name;
        $employees->password = Hash::make($request->password);
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
            $file = $request->file('image');
            $extension = $file->getClientOriginalName();
            $filename = time().'.'.$extension;
            $file->move('images/employee/',$filename);
            $employees->image = $filename;
        }
        $employees->save();
        if($employees){
            return redirect()->back()->with('Employee create successfully');
        }else{
            return redirect()->back()->with('Employee create failed');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $employee = User::find($id);
        dd($employee);
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
            return redirect()->back()->with('Employee update successfully');
        }else{
            return redirect()->back()->with('Employee update failed');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $employees = User::find($id);
        $destination = 'images/employee/' . $employees->image;
        if(File::exists($destination)){
            File::delete($destination);
        }
        if(!$employees){
            return back()->with('Error','User not found');
        }
        $employees->delete();
        return back()->with('Success','User delete successfully');
    }
}
