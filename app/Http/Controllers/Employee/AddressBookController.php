<?php

namespace App\Http\Controllers\Employee;

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
        return view('employee.address.customer', compact('customers'));
    }
    public function shipperAddressBook(){
        $shippers = Shipper::all();
        return view('employee.address.shipper', compact('shippers'));
    }
    public function supplierAddressBook(){
        $suppliers = Supplier::all();
        return view('employee.address.supplier', compact('suppliers'));
    }
    public function employeeAddressBook(){
        $employees = User::all();
        return view('employee.address.employee', compact('employees'));
    }
}
