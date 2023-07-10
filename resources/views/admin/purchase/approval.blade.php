@extends('layouts.admin')

@section('content')
<div class="pagetitle">
  <h1>purchases List</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="/admin/dashboard">Home</a></li>
      <li class="breadcrumb-item active">purchase List</li>
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
          <table class="table datatable table-sm small overflow-x-auto table-striped">
            <thead>
              <tr>
                <th scope="col">Purchase ID</th>
                <th scope="col">Employee</th>
                <th scope="col">Supplier</th>
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

              @foreach($purchases as $purchase)
              <tr>
                <td>{{ $purchase->id }}</td>
                <td>{{ $purchase->employeeName}}</td>
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
                      <a href="/admin/purchases/{{ $purchase->id }}" class="btn btn-sm btn-warning"><i class="bi bi-pencil-fill"></i> View</a>
                    </div>
                    <div class="mx-3">
                      <a href="" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#Deletepurchase{{ $purchase->id }}"><i class="bi bi-trash"></i> Delete</a>
                    </div>
                  </div>
                </td>
              </tr>
              <!-- Delete Modal -->
              <div class="modal right fade" id="Deletepurchase{{ $purchase->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title" id="exampleModalLabel">Delete purchase</h4>
                      <button type="button" class="close" data-bs-dismiss="modal" aria-bs-label="Close">
                        <span aria-bs-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <form action="{{ route('purchases.destroy',$purchase->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <p>Are you sure to delete {{$purchase->id}} ?</p>
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