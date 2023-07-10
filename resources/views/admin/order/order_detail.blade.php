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
                <th scope="col">Product ID</th>
                <th scope="col">Product Price</th>
                <th scope="col">Product Quantity</th>
                <th scope="col">Product Price</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>

              @foreach($order_details as $order_detail)
              <tr>
                <td>{{ $order_detail->order_id }}</td>
                <td>{{ $order_detail->productName}}</td>
                <td>{{ $order_detail->price }}</td>
                <td>{{ $order_detail->quantity }}</td>
                <td>{{ $order_detail->total_price }}</td>
                <td>
                  <div class="btn-group">
                    <div class="mx-3">
                      <a href="" class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#Vieworder{{ $order_detail->order_id }}"><i class="bi bi-pencil-fill"></i> View</a>
                    </div>
                    <div class="mx-3">
                      <a href="" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#Deleteorder{{ $order_detail->order_id }}"><i class="bi bi-trash"></i> Delete</a>
                    </div>
                  </div>
                </td>
              </tr>
              <!-- View Modal -->
              <div class="modal right fade" id="Vieworder{{ $order_detail->order_id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <iv class="modal-header">
                      <h4 class="modal-title" id="exampleModalLabel">View Order {{$order_detail->order_id}}</h4>
                      <button type="button" class="close btn btn-danger" data-bs-dismiss="modal" aria-bs-label="Close">
                        <span aria-bs-hidden="true">&times;</span>
                      </button>
                    </iv>

                  </div>
                </div>
              </div>
              <!-- Delete Modal -->
              <div class="modal right fade" id="Deleteorder{{ $order_detail->order_id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title" id="exampleModalLabel">Delete Order</h4>
                      <button type="button" class="close" data-bs-dismiss="modal" aria-bs-label="Close">
                        <span aria-bs-hidden="true">&times;</span>
                      </button>

                    </div>
                    <div class="modal-body">
                      <form action="{{ route('order_details.destroy',$order_detail->order_id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <p>Are you sure to delete {{$order_detail->order_id}} ?</p>
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
</section>

@endsection