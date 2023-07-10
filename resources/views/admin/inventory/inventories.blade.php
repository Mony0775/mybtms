@extends('layouts.admin')

@section('content')
<div class="pagetitle">
  <h1>Inventories</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="/admin/dashboard">Home</a></li>
      <li class="breadcrumb-item active">Inventories</li>
    </ol>
  </nav>
</div><!-- End Page Title -->
<section class="section dashboard">
  <div class="row">
    <!-- Left side columns -->
    <div class="col-lg-12">
      <div class="row">
        <table class="table datatable table-striped" style="width:100%">
          <thead>
            <tr>
              <th scope="col">Preview</th>
              <th scope="col">Product</th>
              <th scope="col">Available Stock</th>
              <th scope="col">Sale Price</th>
              <th scope="col">Purchase Price</th>
              <th scope="col">Order Amt.</th>
              <th scope="col">Purchase Amt.</th>
            </tr>
          </thead>
          <tbody>
            @for ($i = 1; $i <= count($item); $i++) <tr>
              <td>
                @if(isset($items[$i][0]->image))
                <img src="{{ asset('images/product/'.$items[$i][0]->image)}}" alt="" width="80px" height="80px">
                @endif
              </td>
              <td><b>
                  @if(isset($items[$i][0]->product_name))
                  {{$items[$i][0]->product_name}}
                  @endif
                </b></td>
              <td>
              @if(isset($items[$i][0]->alert_stock))
                    @if ($items[$i][0]->alert_stock <= 30) <span class="badge badge-danger text-danger"> {{$items[$i][0]->alert_stock}} Low Stock</span>
                    @elseif ($items[$i][0]->alert_stock >= 100)
                    <span class="badge badge-success text-warning">{{$items[$i][0]->alert_stock}} High Stock</span>
                    @else
                    <span class="badge badge-success text-success">{{$items[$i][0]->alert_stock}}</span>
                    @endif
              @endif
              </td>
              <td>$ 
              @if(isset($items[$i][0]->sale_price)) 
                {{$items[$i][0]->sale_price}}
              @endif
              </td>
              <td>$ 
              @if(isset($items[$i][0]->standard_price)) 
                {{$items[$i][0]->standard_price}}
              @endif
              </td>
              <td class="fw-bold">
                {{$item[$i]}}
              </td>
              <td>{{$itemS[$i]}}</td>
              </tr>
              @endfor
          </tbody>
        </table>
        <!-- End Table with stripped rows -->
      </div>
    </div><!-- End Left side columns -->
  </div>
</section>

@endsection