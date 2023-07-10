<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/', function () {
    return redirect()->route('login');
});

Auth::routes();

Route::prefix('admin')->middleware(['auth','isAdmin'])->group(function () {
    Route::get('dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index']);
    Route::resource('/employees', 'App\Http\Controllers\Admin\EmployeeController');
    Route::get('/employee/order', [App\Http\Controllers\Admin\EmployeeHisController::class, 'order'])->name('inventories');
    Route::get('/employee/purchase', [App\Http\Controllers\Admin\EmployeeHisController::class, 'purchase'])->name('inventories');
    Route::resource('/customers', 'App\Http\Controllers\Admin\CustomerController');
    Route::resource('/suppliers', 'App\Http\Controllers\Admin\SupplierController');
    Route::resource('/shippers', 'App\Http\Controllers\Admin\ShipperController');
    Route::resource('/products', 'App\Http\Controllers\Admin\ProductController');
    Route::resource('/orders', 'App\Http\Controllers\Admin\OrderController');
    Route::resource('/purchases', 'App\Http\Controllers\Admin\PurchaseController');
    Route::resource('/order_details', 'App\Http\Controllers\Admin\OrderDetailController');
    Route::resource('/settings', 'App\Http\Controllers\Admin\SettingController');
    Route::resource('/passwords', 'App\Http\Controllers\Admin\PasswordController');

    Route::get('/sale_report', [App\Http\Controllers\Admin\HistoryController::class, 'index'])->name('sale');
    Route::get('/stockIn', [App\Http\Controllers\Admin\HistoryController::class, 'purchasing'])->name('stock');
    Route::get('/stockOut', [App\Http\Controllers\Admin\HistoryController::class, 'order'])->name('stock');

    Route::get('/inventories', [App\Http\Controllers\Admin\StockController::class, 'inventories'])->name('inventories');
    Route::get('/transactions', [App\Http\Controllers\Admin\TransactionController::class, 'index'])->name('transactions');
    Route::get('/transactions/order', [App\Http\Controllers\Admin\TransactionController::class, 'order'])->name('transactions');
    Route::get('/transactions/purchasing', [App\Http\Controllers\Admin\TransactionController::class, 'purchasing'])->name('transactions');
    Route::get('/stock/order', [App\Http\Controllers\Admin\StockController::class, 'order'])->name('stock');
    Route::get('/stock/purchase', [App\Http\Controllers\Admin\StockController::class, 'purchasing'])->name('stock');
    Route::get('/sale_report', [App\Http\Controllers\Admin\HistoryController::class, 'index'])->name('sale');
    Route::get('/address/customers', [App\Http\Controllers\Admin\AddressBookController::class, 'customerAddressBook'])->name('customer-address-book');
    Route::get('/address/shippers', [App\Http\Controllers\Admin\AddressBookController::class, 'shipperAddressBook'])->name('shipper-address-book');
    Route::get('/address/suppliers', [App\Http\Controllers\Admin\AddressBookController::class, 'supplierAddressBook'])->name('supplier-address-book');
    Route::get('/address/employees', [App\Http\Controllers\Admin\AddressBookController::class, 'employeeAddressBook'])->name('employee-address-book');
    Route::get('/employee_order', [App\Http\Controllers\Admin\EmployeeActionController::class, 'employeeOrder'])->name('Employee-Orders');

    Route::get('/login1', [App\Http\Controllers\Admin\AddressBookController::class, 'login1'])->name('login01');

    Route::get('searches', [App\Http\Controllers\Admin\SearchController::class, 'search'])->name('searches.index');

    Route::get('pdfs/{id}', [App\Http\Controllers\Admin\PdfController::class, 'orderPdf'])->name('pdfs.order');
    
});
Route::prefix('employee')->middleware(['auth'])->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::resource('/customer', 'App\Http\Controllers\Employee\CustomerController');
    Route::resource('/order', 'App\Http\Controllers\Employee\OrderController');
    Route::resource('/purchase', 'App\Http\Controllers\Employee\PurchaseController');
    Route::resource('/shipper', 'App\Http\Controllers\Employee\ShipperController');
    Route::resource('/supplier', 'App\Http\Controllers\Employee\SupplierController');
    Route::resource('/product', 'App\Http\Controllers\Employee\ProductController');
    Route::resource('/setting', 'App\Http\Controllers\Employee\SettingController');

    Route::get('/transaction', [App\Http\Controllers\Employee\TransactionController::class, 'index'])->name('transactions');
    Route::get('/transaction/order', [App\Http\Controllers\Employee\TransactionController::class, 'order'])->name('transactions');
    Route::get('/transaction/purchasing', [App\Http\Controllers\Employee\TransactionController::class, 'purchasing'])->name('transactions');

    Route::get('/inventory', [App\Http\Controllers\Employee\StockController::class, 'inventories'])->name('inventories');

    Route::get('/sale_report', [App\Http\Controllers\Employee\HistoryController::class, 'index'])->name('sale');
    Route::get('/stockIn', [App\Http\Controllers\Employee\HistoryController::class, 'purchasing'])->name('stock');
    Route::get('/stockOut', [App\Http\Controllers\Employee\HistoryController::class, 'order'])->name('stock');

    Route::get('/address/customer', [App\Http\Controllers\Employee\AddressBookController::class, 'customerAddressBook'])->name('customer-address-book');
    Route::get('/address/shipper', [App\Http\Controllers\Employee\AddressBookController::class, 'shipperAddressBook'])->name('shipper-address-book');
    Route::get('/address/supplier', [App\Http\Controllers\Employee\AddressBookController::class, 'supplierAddressBook'])->name('supplier-address-book');
    Route::get('/address/employee', [App\Http\Controllers\Employee\AddressBookController::class, 'employeeAddressBook'])->name('employee-address-book');

    Route::resource('/setting', 'App\Http\Controllers\Employee\SettingController');
    Route::resource('/em_password', 'App\Http\Controllers\Employee\PasswordController');

    Route::get('search', [App\Http\Controllers\Employee\SearchController::class, 'search'])->name('search.index');
});