@extends('layouts.admin')

@section('content')
<div class="pagetitle">
  <h1>Address Book</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="/admin/dashboard">Home</a></li>
      <li class="breadcrumb-item active">Supplier Address Book</li>
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
            @foreach($suppliers as $key => $supplier)
            <tr>
              <td>{{ $key+1 }}</td>
              <td>{{ $supplier-> supplier_name }}</td>
              <td>{{ $supplier-> email }}</td>
              <td>{{ $supplier-> company}}</td>
              <td>{{ $supplier-> first_name }}</td>
              <td>{{ $supplier-> last_name }}</td>
              <td>{{ $supplier-> job_title }}</td>
              <td>{{ $supplier-> street }}</td>
              <td>{{ $supplier-> city }}</td>
              <td>{{ $supplier-> province }}</td>
              <td>{{ $supplier-> country }}</td>
              <td>{{ $supplier-> zip_code }}</td>
              <td>{{ $supplier-> webpage }}</td>
              <td>{{ $supplier-> note }}</td>
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