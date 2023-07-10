@extends('layouts.admin')

@section('content')
<div class="pagetitle">
  <h1>Address Book</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="/admin/dashboard">Home</a></li>
      <li class="breadcrumb-item active">Shipper Address Book</li>
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
            @foreach($shippers as $key => $shipper)
            <tr>
              <td>{{ $key+1 }}</td>
              <td>{{ $shipper-> shipper_name }}</td>
              <td>{{ $shipper-> email }}</td>
              <td>{{ $shipper-> company}}</td>
              <td>{{ $shipper-> first_name }}</td>
              <td>{{ $shipper-> last_name }}</td>
              <td>{{ $shipper-> job_title }}</td>
              <td>{{ $shipper-> street }}</td>
              <td>{{ $shipper-> city }}</td>
              <td>{{ $shipper-> province }}</td>
              <td>{{ $shipper-> country }}</td>
              <td>{{ $shipper-> zip_code }}</td>
              <td>{{ $shipper-> webpage }}</td>
              <td>{{ $shipper-> note }}</td>
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