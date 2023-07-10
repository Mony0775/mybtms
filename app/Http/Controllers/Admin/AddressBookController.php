<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Customer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Shipper;
use App\Models\Supplier;

class AddressBookController extends Controller
{
    public function customerAddressBook(){
        $customers = Customer::all();
        return view('admin.address.customer', compact('customers'));
    }
    public function shipperAddressBook(){
        $shippers = Shipper::all();
        return view('admin.address.shipper', compact('shippers'));
    }
    public function supplierAddressBook(){
        $suppliers = Supplier::all();
        return view('admin.address.supplier', compact('suppliers'));
    }
    public function employeeAddressBook(){
        $employees = User::all();
        return view('admin.address.employee', compact('employees'));
    }
    public function login1(){
        return view('admin.address.login1');
    }
}
