@extends('layouts.admin')

@section('content')
<div class="pagetitle">
  <h1>Purchases List</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="/admin/dashboard">Home</a></li>
      <li class="breadcrumb-item"><a href="{{ route('employees.index') }}">Employee List</a></li>
      <li class="breadcrumb-item active">Your Purchase</li>
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
            <a href="{{ route('purchases.create') }}" style="float: right" class="btn btn-dark"><i class="bi bi-plus"></i> Add New purchase</a>
          </div>
          <table class="table datatable table-striped">
            <thead>
              <tr>
                <th scope="col">Purchase ID</th>
                <th scope="col">Customer</th>
                <th scope="col">Supplier</th>
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

              @foreach($purchases as $purchase)
              <tr>
                <td>{{ $purchase->id }}</td>
                <td>{{ $purchase->supplierName }}</td>
                <td>{{ $purchase->shipperName }}</td>
                <td>{{ $purchase->payment_id }}</td>
                <td>${{ $purchase->shipping_cost }} </td>
                <td>${{ $purchase->tax }} </td>
                <td>${{ $purchase->sum_total }}</td>
                <td>{{ $purchase->discount }} %</td>
                <td>${{ $purchase->payment_amount }} </td>
                <td>{{ $purchase->shipping_date }}</td>
                <td>
                  <div class="btn-group">
                    <div class="mx-3">
                      <a href="/admin/purchases/{{ $purchase->id }}" class="btn btn-sm btn-warning"><i class="bi bi-eye"></i> View</a>
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