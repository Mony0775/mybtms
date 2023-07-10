@extends('layouts.admin')

@section('content')
<div class="pagetitle">
  <h1>Address Book</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="/admin/dashboard">Home</a></li>
      <li class="breadcrumb-item active">Employee Address Book</li>
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
            @foreach($employees as $key => $employee)
            <tr>
              <td>{{ $key+1 }}</td>
              <td>{{ $employee-> name }}</td>
              <td>{{ $employee-> email }}</td>
              <td>{{ $employee-> company}}</td>
              <td>{{ $employee-> first_name }}</td>
              <td>{{ $employee-> last_name }}</td>
              <td>{{ $employee-> job_title }}</td>
              <td>{{ $employee-> street }}</td>
              <td>{{ $employee-> city }}</td>
              <td>{{ $employee-> province }}</td>
              <td>{{ $employee-> country }}</td>
              <td>{{ $employee-> zip_code }}</td>
              <td>{{ $employee-> webpage }}</td>
              <td>{{ $employee-> note }}</td>
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