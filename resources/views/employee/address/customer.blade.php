@extends('layouts.app')

@section('content')
<div class="pagetitle">
  <h1>Address Book</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="/employee/dashboard">Home</a></li>
      <li class="breadcrumb-item active">Customer Address Book</li>
    </ol>
  </nav>
</div><!-- End Page Title -->
<section class="section dashboard">
  <div class="row">
    <!-- Left side columns -->
    <div class="col-lg-12">
      <div class="row">
        <table class="table datatable table-sm small table-striped" style="width:100%">
          <thead>
            <tr>
              <th>#</th>
              <th>Name</th>
              <th>Email</th>
              <th>Company</th>
              <th>First Name</th>
              <th>Last Name</th>
              <th>Job</th>
              <th>Street</th>
              <th>District</th>
              <th>Province</th>
              <th>Country</th>
              <th>Zip Code</th>
              <th>Webpage</th>
              <th>Note</th>
            </tr>
          </thead>
          <tbody>
            @foreach($customers as $key => $customer)
            <tr>
              <td>{{ $key+1 }}</td>
              <td>{{ $customer-> customer_name }}</td>
              <td>{{ $customer-> email }}</td>
              <td>{{ $customer-> company}}</td>
              <td>{{ $customer-> first_name }}</td>
              <td>{{ $customer-> last_name }}</td>
              <td>{{ $customer-> job_title }}</td>
              <td>{{ $customer-> street }}</td>
              <td>{{ $customer-> city }}</td>
              <td>{{ $customer-> province }}</td>
              <td>{{ $customer-> country }}</td>
              <td>{{ $customer-> zip_code }}</td>
              <td>{{ $customer-> webpage }}</td>
              <td>{{ $customer-> note }}</td>
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