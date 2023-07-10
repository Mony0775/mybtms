@extends('layouts.admin')

@section('content')
<div class="pagetitle">
  <h1>Sale Report</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="/admin/dashboard">Home</a></li>
      <li class="breadcrumb-item active">Sale report</li>
    </ol>
  </nav>
</div><!-- End Page Title -->
<section class="section dashboard">

  <div class="row">
    <!-- Left side columns -->
    <!-- Revenue Card -->
    <div class="col-xxl-3 col-md-6">
      <div class="card info-card revenue-card">

        <div class="filter">
          <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
            <li class="dropdown-header text-start">
              <h6>Filter</h6>
            </li>

            <li><a class="dropdown-item" href="#">Today</a></li>
            <li><a class="dropdown-item" href="#">This Month</a></li>
            <li><a class="dropdown-item" href="#">This Year</a></li>
          </ul>
        </div>

        <div class="card-body">
          <h5 class="card-title">{{ $employee->employeeName }} sale</h5>

          <div class="d-flex align-items-center">
            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
              <i class="bi bi-currency-dollar"></i>
            </div>
            <div class="ps-3">
              <h6>{{ $amountReport }} sales</h6>
              <span class="text-success small pt-1 fw-bold">{{ $saleReport }}</span> <span class="text-success small pt-2 ps-1">$</span>

            </div>
          </div>
        </div>

      </div>
    </div><!-- End Revenue Card -->
    <!-- Sales Card with this week-->
    <div class="col-xxl-3 col-md-6">
      <div class="card info-card sales-card">

        <div class="filter">
          <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
            <li class="dropdown-header text-start">
              <h6>Filter</h6>
            </li>

            <li><a class="dropdown-item" href="#">Today</a></li>
            <li><a class="dropdown-item" href="#">This Month</a></li>
            <li><a class="dropdown-item" href="#">This Year</a></li>
          </ul>
        </div>

        <div class="card-body">
          <h5 class="card-title">This Month</h5>

          <div class="d-flex align-items-center">
            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
              <i class="bi bi-cart"></i>
            </div>
            <div class="ps-3">
              <h6>{{ $thisMonth }} sales</h6>

              <span class="text-success small pt-1 fw-bold">{{ $saleInMonth }}</span> <span class="text-success small pt-2 ps-1">$</span>

            </div>
          </div>
        </div>

      </div>
    </div><!-- End Sales Card -->

    <!-- Revenue Card -->
    <div class="col-xxl-3 col-md-6">
      <div class="card info-card revenue-card">

        <div class="filter">
          <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
            <li class="dropdown-header text-start">
              <h6>Filter</h6>
            </li>

            <li><a class="dropdown-item" href="#">Today</a></li>
            <li><a class="dropdown-item" href="#">This Month</a></li>
            <li><a class="dropdown-item" href="#">This Year</a></li>
          </ul>
        </div>

        <div class="card-body">
          <h5 class="card-title">This week</h5>

          <div class="d-flex align-items-center">
            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
              <i class="bi bi-currency-dollar"></i>
            </div>
            <div class="ps-3">
              <h6>{{ $thisWeek }} sales</h6>
              <span class="text-success small pt-1 fw-bold">{{ $saleInWeek }}</span> <span class="text-success small pt-2 ps-1">$</span>

            </div>
          </div>
        </div>

      </div>
    </div><!-- End Revenue Card -->

    <!-- Customers Card -->
    <div class="col-xxl-3 col-xl-12">

      <div class="card info-card customers-card">

        <div class="filter">
          <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
            <li class="dropdown-header text-start">
              <h6>Filter</h6>
            </li>

            <li><a class="dropdown-item" href="#">Today</a></li>
            <li><a class="dropdown-item" href="#">This Month</a></li>
            <li><a class="dropdown-item" href="#">This Year</a></li>
          </ul>
        </div>

        <div class="card-body">
          <h5 class="card-title">Today</h5>

          <div class="d-flex align-items-center">
            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
              <i class="bi bi-people"></i>
            </div>
            <div class="ps-3">
              <h6>{{ $toDay }} sales</h6>
              <span class="text-success small pt-1 fw-bold">{{ $saleInToday }}</span> <span class="text-success small pt-2 ps-1">$</span>

            </div>
          </div>

        </div>
      </div>

    </div><!-- End Customers Card -->

    <div class="col-lg-12">
      <div class="row">
        <table class="table datatable table-bordered table-striped">
          <thead>
            <tr>
              <th scope="col">#</th>
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
              <td>{{ $key+1 }}</td>
              <td>{{ $transaction-> employeeName }}</td>
              <td>{{ $transaction-> CustomerName }}</td>
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