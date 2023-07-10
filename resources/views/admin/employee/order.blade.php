@extends('layouts.admin')

@section('content')
<div class="pagetitle">
  <h1>Your Orders</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="/admin/dashboard">Home</a></li>
      <li class="breadcrumb-item"><a href="{{ route('employees.index') }}">Employee List</a></li>
      <li class="breadcrumb-item active">Your Order</li>
    </ol>
  </nav>
</div><!-- End Page Title -->
<section class="section dashboard">
  <div class="row">
    <!-- Left side columns -->
    <div class="col-lg-12">
      <div class="row">
        <div class="card">
          <div class="card-header">
            <a href="{{ route('orders.create') }}" style="float: right" class="btn btn-dark"><i class="bi bi-plus"></i> Add New Order</a>
          </div>
          <table class="table datatable table-striped">
            <thead>
              <tr>
                <th scope="col">Order ID</th>
                <th scope="col">Customer</th>
                <th scope="col">Shipper</th>
                <th scope="col">Payment ID</th>
                <th scope="col">shipping Cost</th>
                <th scope="col">Tax</th>
                <th scope="col">Total</th>
                <th scope="col">Discount</th>
                <th scope="col">Payment Amount</th>
                <th scope="col">Shipping Date</th>
                <th scope="col">Action</th>

              </tr>
            </thead>
            <tbody>

              @foreach($orders as $order)
              <tr>
                <td>{{ $order->id }}</td>
                <td>{{ $order->CustomerName }}</td>
                <td>{{ $order->ShipperName }}</td>
                <td>{{ $order->payment_id }}</td>
                <td>${{ $order->shipping_cost }} </td>
                <td>${{ $order->tax }}</td>
                <td>${{ $order->sum_total }} </td>
                <td>{{ $order->discount }} %</td>
                <td>${{ $order->payment_amount }} </td>
                <td>{{ $order->shipping_date }}</td>
                <td>
                  <div class="btn-group">
                    <div class="mx-3">
                      <a href="/admin/orders/{{ $order->id }}" class="btn btn-sm btn-primary"><i class="bi bi-eye"></i> View</a>
                    </div>
                  </div>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        <!-- End Table with stripped rows -->
      </div>
    </div><!-- End Left side columns -->
  </div>

  </div>
</section>

@endsection