@extends('layouts.admin')

@section('content')
<div class="pagetitle">
  <h1>Product</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="/admin/dashboard">Home</a></li>
      <li class="breadcrumb-item"><a href="{{ route('suppliers.index') }}">Supplier</a></li>
      <li class="breadcrumb-item active">Product</li>
    </ol>
  </nav>
</div><!-- End Page Title -->
<section class="section dashboard">
  <div class="row">
    <!-- Left side columns -->
    <div class="col-lg-12">
      <div class="row">
        <table class="table datatable table-bordered table-striped">
          <div class="row">
            <div class="col-9">
              <h4 class="col-md-6" style="float: left ; font-size: 40px;"><i class="bx bxs-business"></i></h4>
            </div>
            <div class="col-3">
              <a href="" style="float: right" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#Addproduct"><i class="bi bi-plus-square-dotted"></i> Add New Product</a>
            </div>
          </div>
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Product</th>
              <th scope="col">Image</th>
              <th scope="col">Description</th>
              <th scope="col">Supplier</th>
              <th scope="col">Purchase Price</th>
              <th scope="col">Order Price</th>
              <th scope="col">Stock</th>
              <th scope="col">
                Action
              </th>
            </tr>
          </thead>
          <tbody>
            @foreach($products as $key => $product)
            <tr>
              <td>{{ $key+1 }}</td>
              <td>{{ $product->product_name}}</td>
              <td>
                <img src="{{ asset('images/product/'.$product->image) }}" width="100px">
              </td>
              <td>{{ $product->product_description }}</td>
              <td>{{ $product->supplier_id }}</td>
              <td>$ {{ $product->standard_price }}</td>
              <td>$ {{ $product->sale_price }}</td>
              <td>
                @if ($product->alert_stock <= 30) <span class="badge badge-danger text-danger"> {{ $product->alert_stock }} Low Stock</span>
                  @elseif ($product->alert_stock >= 100)
                  <span class="badge badge-success text-warning">{{ $product->alert_stock }} High Stock</span>
                  @else
                  <span class="badge badge-success text-success">{{ $product->alert_stock }}</span>
                  @endif
              </td>
              <td>
                <div class="btn-group">
                  <div class="row mx-2">
                    <div class="mx-2">
                      <a href="" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#Editproduct{{ $product->id }}"><i class="bi bi-pencil"></i></a>
                      <a href="" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#Deleteproduct{{ $product->id }}"><i class="bi bi-trash"></i> <span></span></a>
                    </div>
                  </div>
                </div>
              </td>
            </tr>
            <!-- Edit Modal -->
            <div class="modal right fade" id="Editproduct{{ $product->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title text-warning" id="exampleModalLabel">Edit product</h4>
                    <button type="button" class="close btn btn-danger" data-bs-dismiss="modal" aria-bs-label="Close">
                      <span aria-bs-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <form class="row g-3 d-flex" action="{{ route('products.update',$product->id) }}" method="post" enctype="multipart/form-data">
                      @csrf
                      @method('PUT')
                      <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                          <strong>Image:</strong>
                          <input type="file" name="image" class="form-control" placeholder="image">
                          <img src="{{ asset('images/product/'.$product->image) }}" alt="image" width="100px" height="100px">
                        </div>
                      </div>
                      <div class="row py-2">
                        <div class="col-md-6">
                          <div class="form-floating">
                            <input type="text" class="form-control" value="{{ $product->product_name }}" id="floatingName" name="product_name" placeholder="Product Name">
                            <label for="floatingName">Product Name</label>
                          </div>
                        </div>
                      </div>
                      <div class="row py-2">
                        <div class="col-md-4">
                          <div class="form-floating mb-3">
                            <select name="supplier_id" id="supplier_id floatingSelect" value="{{ $product->supplier_id }}" class="form-select supplier_id">
                              <option value="">----Select Item</option>
                              @foreach ($suppliers as $supplier)
                              <option value="{{ $supplier->id }}">{{ $supplier->supplier_name }}</option>
                              @endforeach
                            </select>
                            <label for="floatingSelect">Supplier</label>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-floating">
                            <input type="text" class="form-control" value="{{ $product->standard_price }}" name="standard_price" id="floatingZip" placeholder="Standard price">
                            <label for="floatingZip">Standard Price</label>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-floating">
                            <input type="text" class="form-control" value="{{ $product->sale_price }}" name="sale_price" id="floatingZip" placeholder="Sale price">
                            <label for="floatingZip">Sale Price</label>
                          </div>
                        </div>
                      </div>
                      <div class="col-12">
                        <div class="form-floating">
                          <textarea class="form-control" value="{{ $product->product_description }}" name="product_description" placeholder="Note" id="floatingTextarea" style="height: 100px;"></textarea>
                          <label for="floatingTextarea">Description</label>
                        </div>
                      </div>
                  </div>
                  <div class="text-center py-2">
                    <button type="submit" class="btn btn-warning">Update</button>
                    <button type="reset" class="btn btn-secondary">Reset</button>
                  </div>
                  </form>
                </div>
              </div>
            </div>
      </div>
      <!-- Delete Modal -->
      <div class="modal right fade" id="Deleteproduct{{ $product->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title" id="exampleModalLabel">Delete product</h4>
              <button type="button" class="close btn btn-danger" data-bs-dismiss="modal" aria-bs-label="Close">
                <span aria-bs-hidden="true">&times;</span>
              </button>

            </div>
            <div class="modal-body">
              <form action="{{ route('products.destroy',$product->id) }}" method="post">
                @csrf
                @method('DELETE')
                <p>Are you sure to delete {{$product->name}} ?</p>
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
      <!-- End Table with stripped rows -->
    </div>
  </div><!-- End Left side columns -->
  </div>
</section>

<!-- modal create new customer -->
<!-- Add Modal -->
<div class="modal right fade" id="Addproduct" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel">Add product</h4>
        <button type="button" class="close ntn btn-danger" data-bs-dismiss="modal" aria-bs-label="Close">
          <span aria-bs-hidden="true"><i class="bi bi-file-x-fill"></i></span>
        </button>
      </div>
      <div class="modal-body">
        <form class="row g-3" action="{{ route('products.store') }}" method="post" enctype="multipart/form-data">
          @csrf
          <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
              <strong>Image:</strong>
              <input type="file" name="image" class="form-control" placeholder="image">
            </div>
          </div>
          <div class="col-md-12">
            <div class="form-floating">
              <input type="text" class="form-control" id="floatingName" name="product_name" placeholder="Product Name">
              <label for="floatingName">Product Name</label>
            </div>
          </div>
          <div class="col-md-12">
            <div class="form-floating mb-3">
              <select name="supplier_id" id="supplier_id floatingSelect" class="form-select supplier_id">
                <option value="">----Select Item----</option>
                @foreach ($suppliers as $supplier)
                <option value="{{ $supplier->id }}">{{ $supplier->supplier_name }}</option>
                @endforeach
              </select>
              <label for="floatingSelect">Supplier</label>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-floating">
              <input type="float" class="form-control" name="standard_price" id="floatingZip" placeholder="Standard price">
              <label for="floatingZip">Standard Price</label>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-floating">
              <input type="float" class="form-control" name="sale_price" id="floatingZip" placeholder="Sale price">
              <label for="floatingZip">Sale Price</label>
            </div>
          </div>
          <div class="col-12">
            <div class="form-floating">
              <textarea class="form-control" name="product_description" placeholder="Description" id="floatingTextarea" style="height: 100px;"></textarea>
              <label for="floatingTextarea">Description</label>
            </div>
          </div>
          <div class="col-12">
            <div class="form-floating">
              <input class="form-control" type="number" name="alert_stock" placeholder="Amount" id="floatingText"></input>
              <label for="floatingText">Amount</label>
            </div>
          </div>
          <div class="text-center py-4">
            <button type="submit" class="btn btn-primary">Submit</button>
            <button type="reset" class="btn btn-secondary">Reset</button>
          </div>
        </form><!-- End floating Labels Form -->
      </div>
    </div>
  </div>
</div>

<style>
  .modal.right .modal-dialog {
    top: 0;
    right: 0;
    margin-right: 20vh;
    /* position: absolute; */

  }

  .modal.fade:not(.in).right .modal-dialog {
    -webkit-transform: translate3d(25%, 0, 0);
    transform: translate3d(25%, 0, 0);
  }

  select {
    appearance: auto;
    border-radius: 0;
  }

  select::-ms-expand {
    display: block;
  }
</style>

@endsection