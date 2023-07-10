@extends('layouts.admin')

@section('content')
<div class="pagetitle">
  <h1>Search List</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="/admin/dashboard">Home</a></li>
      <li class="breadcrumb-item active">Transaction</li>
    </ol>
  </nav>
</div><!-- End Page Title -->
<section class="section dashboard">
  <div class="row">
    <!-- Left side columns -->
    <div class="col-lg-12">
      <div class="row">
        <div class="card">
          <table class="table table-sm small overflow-x-auto table-striped">
            <thead>
              <tr>
                <th scope="col">O/P ID</th>
                <th scope="col">Txn Code</th>
                <th scope="col">Employee</th>
                <th scope="col">Vendor</th>
                <th scope="col">Shipper</th>
                <th scope="col">Payment ID</th>
                <th scope="col">Shipping Cost</th>
                <th scope="col">Tax</th>
                <th scope="col">Total</th>
                <th scope="col">Discount</th>
                <th scope="col">Payment Amount</th>
                <th scope="col">Txn Date</th>
                <th scope="col">Action</th>

              </tr>
            </thead>
            <tbody>
              @if(count($searches) != 0)
              @foreach($searches as $search)
              <tr>
                <td>
                  @if($search->type == 'Order')
                    {{ $search->order_id }}
                  @else
                    {{ $search->purchase_id }}
                  @endif
                </td>
                <td>{{ $search->trx_code }}</td>
                <td>{{ $search->employeeName}}</td>
                <td>
                  @if($search->type == 'Order')
                  {{ $search->customerName }}
                  @else
                  {{ $search->supplierName }}
                  @endif
                </td>
                <td>{{ $search->shipperName }}</td>
                <td>{{ $search->payment_id }}</td>
                <td>${{ $search->shipping_cost }} </td>
                <td>${{ $search->tax }} </td>
                <td>${{ $search->total_price }}</td>
                <td>{{ $search->discount }} %</td>
                <td>${{ $search->total_price }}</td>
                <td>{{ $search->transaction_date }}</td>
                <td>
                  @if($search->type == 'Order')
                  <div class="row btn-group mx-2">
                    <div class="mx-3">
                      <a href="/admin/orders/{{ $search->order_id }}" class="btn btn-sm btn-warning"><i class="bi bi-eye"></i></a>
                    </div>
                  </div>
                  @else
                  <div class="row btn-group mx-2">
                    <div class="mx-3">
                      <a href="/admin/purchases/{{ $search->purchase_id }}" class="btn btn-sm btn-warning"><i class="bi bi-eye"></i></a>
                    </div>
                  </div>
                  @endif
                </td>
              </tr>
              @endforeach
              @else
              <tr>
                <td colspan="13" align="center" class="text-danger">Not found</td>
              </tr>
              
              @endif
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