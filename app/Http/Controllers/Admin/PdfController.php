<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class PdfController extends Controller
{
    public function orderPdf(string $id){
        $orders = Order::find($id);
        $orders = DB::table('orders')
            ->select('orders.*', 'users.name as employeeName', 'users.street as emStreet', 'users.city as emCity','users.province as emProvince','users.country as emCountry','users.webpage as emWeb', 'users.phone_number as emPhone','customers.street as cuStreet', 'customers.city as cuCity','customers.province as cuProvince','customers.country as cuCountry','customers.webpage as cuWeb', 'customers.phone_number as cuPhone', 'customers.customer_name as customerName', 'shippers.shipper_name as shipperName', 'payments.*')
            ->leftJoin('users', 'users.id', 'orders.employee_id')
            ->leftJoin('customers', 'customers.id', 'orders.customer_id')
            ->leftJoin('shippers', 'shippers.id', 'orders.shipper_id')
            ->leftJoin('payments', 'payments.id', 'orders.payment_id')
            ->where('orders.id', $id)
            ->get();
        $order_details = DB::table('order_details')
            ->select('order_details.*', 'products.product_name as productName')
            ->join('products', 'products.id', 'order_details.product_id')
            ->join('orders', 'orders.id', 'order_details.order_id')
            ->where('order_details.order_id', $id)->get();
        // dd([$orders, $order_details]);
        return view('admin.order.pdf', ['orders' => $orders, 'order_details' => $order_details]);
    }
}
