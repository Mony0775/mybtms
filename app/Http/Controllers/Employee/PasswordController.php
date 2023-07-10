<?php

namespace App\Http\Controllers\Employee;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class PasswordController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        return view('employee.setting.password')->with('users', auth()->user());
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'old_password' => 'required|min:8|max:255',
            'new_password' => 'required|min:8|max:255',
            'confirm_password' => 'required|same:new_password'
        ]);
        $password = User::find(auth()->user()->id);
        if(Hash::check($request->old_password,$password->password)){
            $password->password = $request->Hash::make('new_password', ['rounds' => 10]);
            $password->save();
            return redirect()->back()->with('success', 'Password updated successfully');
        }else{
            return redirect()->back()->with('error','Old Password is not match!');
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
