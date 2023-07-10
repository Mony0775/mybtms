@extends('layouts.admin')

@section('content')
<div class="pagetitle">
  <h1>Transactions</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="/admin/dashboard">Home</a></li>
      <li class="breadcrumb-item active">All Transactions</li>
    </ol>
  </nav>
</div><!-- End Page Title -->
<section class="section dashboard">
  <div class="row">
    <!-- Left side columns -->
    <div class="col-lg-12">
      <div class="row">
        <table class="table datatable table-striped" style="width:100%">
          <thead>
            <tr>
              <th>Txn ID</th>
              <th>Employee</th>
              <th>Customer</th>
              <th>Supplier</th>
              <th>Shipper</th>
              <th>Payment</th>
              <th>Amount</th>
              <th>Type</th>
              <th>Shipper Date</th>
              <th>Transaction Date</th>
              <th>Stock Date</th>
              <th>Payment Date</th>
            </tr>
          </thead>
          <tbody>
            @foreach($transactions as $key => $transaction)
            <tr>
              <td>
                @if ($transaction->type == 'Purchase')
                <span class="badge badge-danger text-danger">{{ $transaction->txnCodePurchase }}</span>
                @else <span class="badge badge-success text-success">{{ $transaction->txnCodeOrder }}</span>
                @endif
              </td>
              <td>{{ $transaction-> employeeName }}</td>
              <td>
                @if($transaction->CustomerName != '') {{ $transaction-> CustomerName }}
                @else <span class="text-danger">NULL</span>
                @endif
              </td>
              <td>
                @if($transaction->supplierName != '') {{ $transaction-> supplierName}}
                @else <span class="text-danger">NULL</span>
                @endif
              </td>
              <td>{{ $transaction-> ShipperName }}</td>
              <td>{{ $transaction-> payment_type }}</td>
              <td>{{ $transaction-> payment_amount }}</td>
              <td>
                @if ($transaction->type == 'Purchase')
                <span class="badge badge-danger text-danger">{{ $transaction-> type }}</span>
                @else <span class="badge badge-success text-success">{{ $transaction-> type }}</span>
                @endif
              </td>
              <td>{{ $transaction-> shipping_date }}</td>
              <td>{{ $transaction-> transaction_date }}</td>
              <td>
                @if ($transaction->type == 'Order')
                {{ $transaction->order_date }}
                @else
                {{ $transaction->purchase_date }}
                @endif
              </td>
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