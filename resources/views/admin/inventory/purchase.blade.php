@extends('layouts.admin')

@section('content')
<div class="pagetitle">
      <h1>Purchase History</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/admin/dashboard">Home</a></li>
          <li class="breadcrumb-item active">Purchase History</li>
        </ol>
      </nav>
</div><!-- End Page Title -->
<section class="section dashboard">
      <div class="row">
        <!-- Left side columns -->
        <div class="col-lg-12">
          <div class="row">
          <table class="table datatable table-striped table-bordered">
                <thead>
                  <tr>
                    <th scope="col d-flex">#</th>
                    <th scope="col d-flex">Employee</th>
                    <th scope="col d-flex">Supplier</th>
                    <th scope="col">Shipper</th>
                    <th scope="col">Payment</th>
                    <th scope="col">Amount</th>
                    <th scope="col">Type</th>
                    <th scope="col">Shipper Date</th>
                    <th scope="col">Transaction Date</th>
                    <th scope="col">Order Date</th>
                    <th scope="col">Payment Date</th>
                  </tr>
                </thead>
                <tbody>
                @foreach($transactions as $key => $transaction)
                  <tr>
                    <td>{{ $key+1 }}</td>
                    <td>{{ $transaction-> employeeName }}</td>
                    <td>{{ $transaction-> supplierName }}</td>
                    <td>{{ $transaction-> ShipperName}}</td>
                    <td>{{ $transaction-> payment_type }}</td>
                    <td>{{ $transaction-> payment_amount }}</td>
                    <td>
                      @if($transaction->type == 'Purchase')
                       <div class="text-danger">{{ $transaction-> type }}</div> 
                      @endif
                    </td>
                    <td>{{ $transaction-> shipping_date }}</td>
                    <td>{{ $transaction-> transaction_date }}</td>
                    <td>{{ $transaction-> purchase_date }}</td>
                    <td>{{ $transaction-> payment_date }}</td>
                  </tr>
                @endforeach
                </tbody>
              </table>
              <!-- End Table with stripped rows -->
          </div>
        </div><!-- End Left side columns -->
      </div>
    </section>

@endsection
