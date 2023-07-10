@extends('layouts.admin')

@section('content')

<section style="background-color: #eee;">

  <div class="container">
      <h2> User Profile</h2>
    <div class="row">
      <div class="col">
        <nav aria-label="breadcrumb" class="bg-light rounded-3 p-3 mb-4">
          <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="/admin/dashboard">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{Auth()->user()->name}}</li>
          </ol>
        </nav>
      </div>
    </div>

    <div class="row">
      <div class="col-lg-4">
        <div class="card mb-4">
          <div class="card-body text-center">
            <img src="{{ asset('images/employee/'.Auth()->user()->image) }}" alt="avatar" class="rounded-circle img-fluid" style="width: 150px;">
            <h5 class="my-3"><b>{{Auth()->user()->name}}</b></h5>
            <p class="text-muted mb-1">{{Auth()->user()->job_title}}</p>
            <p class="text-muted mb-4">{{Auth()->user()->street}}, {{Auth()->user()->city}}, {{Auth()->user()->province}}</p>
            <div class="d-flex justify-content-center mb-2">
              <a href="{{ route('settings.edit',auth()->user()->id) }}" class="btn btn-primary"><i class="bi bi-pencil"></i> Edit Profile</a>
            </div>
          </div>
        </div>
        <div class="card mb-4 mb-lg-0">
          <div class="card-body p-0">
          </div>
        </div>
      </div>
      <div class="col-lg-8">
        <div class="card mb-4">
          <div class="card-body">
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">First Name</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">{{Auth()->user()->first_name}}</p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Last Name</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">{{Auth()->user()->last_name}}</p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Email</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">{{Auth()->user()->email}}</p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Phone</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">{{Auth()->user()->phone_number}}</p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Webpage</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">{{Auth()->user()->webpage}}</p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Address</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">{{Auth()->user()->street}},{{Auth()->user()->city}},{{Auth()->user()->province}},{{Auth()->user()->country}}</p>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="card mb-4 mb-md-0">
              <div class="card-body">
                <p class="mb-4"><span class="text-primary font-italic me-1">Order</span> {{$ordersCount}} Transactions
                </p>
                <table class="table w-auto small">
                  <thead>
                    <tr>
                      <th scope="col">Order ID</th>
                      <th scope="col">Customer Name</th>
                      <th scope="col">Shipper Name</th>
                      <th scope="col">Payment ID</th>
                      <th scope="col">Payment Amount</th>
                    </tr>
                  </thead>
                  <tbody>

                    @foreach($orders as $order)
                    <tr>
                      <td>{{ $order->id }}</td>
                      <td>{{ $order->customerName }}</td>
                      <td>{{ $order->shipperName }}</td>
                      <td>{{ $order->payment_id }}</td>
                      <td>${{ $order->payment_amount }} </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="card mb-4 mb-md-0">
              <div class="card-body">
                <p class="mb-4"><span class="text-primary font-italic me-1">Purchase</span> {{$purchasesCount}} Transactions
                </p>
                <table class="table w-auto small">
                  <thead>
                    <tr>
                      <th scope="col">Order ID</th>
                      <th scope="col">Supplier Name</th>
                      <th scope="col">Shipper Name</th>
                      <th scope="col">Payment ID</th>
                      <th scope="col">Payment Amount</th>
                    </tr>
                  </thead>
                  <tbody>

                    @foreach($purchases as $purchase)
                    <tr>
                      <td>{{ $purchase->id }}</td>
                      <td>{{ $purchase->supplierName }}</td>
                      <td>{{ $purchase->shipperName }}</td>
                      <td>{{ $purchase->payment_id }}</td>
                      <td>${{ $purchase->payment_amount }} </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

@endsection