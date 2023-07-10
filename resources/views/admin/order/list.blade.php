@extends('layouts.admin')

@section('content')
<div class="pagetitle">
  <h1>Orders List</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="/admin/dashboard">Home</a></li>
      <li class="breadcrumb-item active">Order List</li>
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
                <th scope="col">Txn Code</th>
                <th scope="col">Employee</th>
                <th scope="col">Customer</th>
                <th scope="col">Shipper</th>
                <th scope="col">Payment ID</th>
                <th scope="col">shipping Cost</th>
                <th scope="col">Total</th>
                <th scope="col">Tax</th>
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
                <td>{{ $order->trx_code }}</td>
                <td>{{ $order->employeeName}}</td>
                <td>{{ $order->customerName }}</td>
                <td>{{ $order->shipperName }}</td>
                <td>{{ $order->payment_id }}</td>
                <td>${{ $order->shipping_cost }} </td>
                <td>${{ $order->sum_total }}</td>
                <td>${{ $order->tax }} </td>
                <td>{{ $order->discount }} %</td>
                <td>${{ $order->payment_amount }} </td>
                <td>{{ $order->shipping_date }}</td>
                <td>
                  <div class="btn-group mx-2">
                      <a href="/admin/orders/{{ $order->id }}" class="btn btn-sm btn-warning px-2"><i class="bi bi-eye"></i></a>
                      <a href="" class="btn btn-sm btn-danger mx-2" data-bs-toggle="modal" data-bs-target="#Deleteorder{{ $order->id }}"><i class="bi bi-trash"></i></a>
                  </div>
                </td>
              </tr>
              <!-- Delete Modal -->
              <div class="modal right fade" id="Deleteorder{{ $order->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title" id="exampleModalLabel">Delete Order</h4>
                      <button type="button" class="close" data-bs-dismiss="modal" aria-bs-label="Close">
                        <span aria-bs-hidden="true">&times;</span>
                      </button>

                    </div>
                    <div class="modal-body">
                      <form action="{{ route('orders.destroy',$order->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <p>Are you sure to delete {{$order->id}} ?</p>
                        <div class="modal-footer">
                          <button class="btn btn-default" data-bs-dismiss="modal">Cancel</button>
                          <button type="submit" class="btn btn-danger">Delete</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
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