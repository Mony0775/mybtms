@extends('layouts.admin')

@section('content')
<div class="pagetitle">
      <h1>Transactions</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/admin/dashboard">Home</a></li>
          <li class="breadcrumb-item active">Order Transaction</li>
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
                    <th scope="col">Txn Code:</th>
                    <th scope="col">Employee Name</th>
                    <th scope="col">Customer Name</th>
                    <th scope="col">Shipper Name</th>
                    <th scope="col">Payment Type</th>
                    <th scope="col">Payment Amount</th>
                    <th scope="col">Transaction type</th>
                    <th scope="col">Shipper Date</th>
                    <th scope="col">Transaction Date</th>
                    <th scope="col">Order Date</th>
                    <th scope="col">Payment Date</th>
                  </tr>
                </thead>
                <tbody>
                @foreach($transactions as $key => $transaction)
                  <tr>
                    <td>{{ $transaction->txnCode }}</td>
                    <td>{{ $transaction-> employeeName }}</td>
                    <td>{{ $transaction-> CustomerName }}</td>
                    <td>{{ $transaction-> ShipperName }}</td>
                    <td>{{ $transaction-> payment_type }}</td>
                    <td>{{ $transaction-> payment_amount }}</td>
                    <td>
                      @if($transaction->type == 'Order')
                       <div class="text-success">{{ $transaction-> type }}</div> 
                      @endif
                    </td>
                    <td>{{ $transaction-> shipping_date }}</td>
                    <td>{{ $transaction-> transaction_date }}</td>
                    <td>{{ $transaction-> order_date }}</td>
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
