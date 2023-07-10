@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <form action="{{ route('purchases.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="col-lg-12">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header bg-primary text-white text-center">
                            <h4 style="float: left">General Information</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="floatingName">Supplier Name <span style="color:red">*</span></label>
                                    <select name="supplier_id" id="supplier_id" class="form-control form-select supplier_id">
                                        <option value="">--- Please Select Supplier ---</option>
                                        @foreach($suppliers as $supplier)
                                        <option value="{{$supplier->id}}">{{$supplier->supplier_name}}</option>
                                        @endforeach
                                    </select>
                                    <div class="form-floating my-2">
                                        <input type="float" value="0.5" readonly class="form-control tax" name="tax" id="floatingName" placeholder="Tax" style="background-color: rgb(200, 200, 200);" />
                                        <label for="floatingName">Tax</label>
                                    </div>

                                    <div class="row">
                                        <div class="form-floating">
                                            <input type="date" class="form-control" placeholder="dd-mm-yyyy" name="purchase_date">
                                            <label for="inputDate" class="mx-2 col-form-label">Purchase Date</label>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-md-6">
                                    <label for="floatingName">Shipper Name <span style="color:red">*</span></label>
                                    <select name="shipper_id" id="shipper_id" class="form-control form-select shipper_id">
                                        <option value="">--- Please Select Shipper ---</option>
                                        @foreach($shippers as $shipper)
                                        <option value="{{$shipper->id}}">{{$shipper->shipper_name}}</option>
                                        @endforeach
                                    </select>
                                    <div class="form-floating my-2">
                                        <input type="float" class="form-control shipping_cost" value="0" name="shipping_cost" id="floatingName" placeholder="Shipping Cost">
                                        <label for="floatingName">Shipping Cost</label>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="form-floating">
                                            <input type="date" class="form-control" name="shipping_date" placeholder="dd-mm-yyyy">
                                            <label for="inputDate" class="mx-2 col-form-label">Shipping Date</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header bg-primary text-white text-center">
                            <h4 style="float: left">Products Purchasing</h4>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered table-left">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th col>Product Name</th>
                                        <th col>Quantity</th>
                                        <th col>Price</th>
                                        <th col>Alert Stock</th>
                                        <th col>Total</th>
                                        <th><a href="" class="btn btn-sm btn-success add_more"><i class="bi bi-patch-plus"></i></a></th>
                                    </tr>
                                </thead>
                                <tbody class="addMoreProduct">
                                    <tr>
                                        <td>1</td>
                                        <td>
                                            <select name="product_id[]" id="product_id" class="form-control form-select product_id">
                                                <option value="">--- Please Select Customer ---</option>
                                                @foreach($products as $product)
                                                <option data-price="{{ $product->standard_price }}" data-alert-stock="{{ $product->alert_stock }}" value="{{$product->id}}">{{$product->product_name}}</option>
                                                @endforeach
                                            </select>

                                        </td>
                                        <td>
                                            <input type="number" name="quantity[]" id="quantity" class="form-control quantity" />
                                        </td>
                                        <td>
                                            <input type="number" name="price[]" id="price" readonly class="form-control price" style="background-color: rgb(200, 200, 200);" />
                                        </td>
                                        <td>
                                            <input type="number" name="alert_stock[]" id="alert_stock" value="" readonly class="form-control alert_stock" style="background-color: rgb(200, 200, 200);" />
                                        </td>
                                        <td>
                                            <input type="number" name="total_price[]" id="total_price" readonly class="form-control total_price" style="background-color: rgb(200, 200, 200);" />
                                        </td>
                                        <td>
                                            <a href="#" class="btn btn-danger delete"><i class="bi bi-patch-minus"></i></a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header bg-primary text-white text-center">
                            <h4 style="float: left">Payment Information</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-header">
                                            <div class="my-2">
                                                <h4>Total Price: $ <b class="total"></b></h4>
                                                <input type="number" class="form-control total" readonly name="total" id="floatingName" style="background-color: rgb(200, 200, 200);" hidden="true">
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="panel">
                                                <div class="my-2">
                                                    <label for="floatingName mt-3">Discount (%) <span style="color:red">*</span> </label>
                                                    <select class="form-select discount" name="discount">
                                                        <option value="0" selected>0%</option>
                                                        <option value="10">10%</option>
                                                        <option value="50">50%</option>
                                                        <option value="75">75%</option>
                                                    </select>
                                                </div>
                                                <div class="my-2">
                                                    <label for="floatingName">Tax <b class="tax"></b></label>
                                                    <input type="number" value="0.5" class="form-control tax" readonly name="tax" id="floatingName" placeholder="Tax" style="background-color: rgb(200, 200, 200);">
                                                </div>
                                                <div class="my-2">
                                                    <label for="floatingName">Shipping Cost <b class="shipping_cost"></b></label>
                                                    <input type="number" class="form-control shipping" readonly name="shipping" id="floatingName" placeholder="Shipping" style="background-color: rgb(200, 200, 200);">
                                                </div>
                                                <div class="my-2">
                                                    <label for="floatingName">Discounted Amount <b class="payment_amount"></b></label>
                                                    <input type="number" class="form-control payment_amount" readonly name="payment_amount" id="floatingName" placeholder="Payment Amount" style="background-color: rgb(200, 200, 200);">
                                                </div>

                                            </div>
                                        </div>
                                    </div>


                                </div>
                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-header">
                                            <div class="my-2">
                                                <h4>Payment Price: $ <b id="final_price" class="final_price"></b></h4>
                                                <div>
                                                    <input type="number" class="form-control final_price" readonly name="final_price" id="floatingName" placeholder="Final Amount" style="background-color: rgb(200, 200, 200);" hidden="true">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="panel">
                                                <div class="row">
                                                    <div class="col-md-12 my-3">
                                                        <h6> Payment Method: </h6>
                                                        <span class="radio-item mx-2">
                                                            <input type="radio" name="payment_method" id="payment_method" class="true" value="Cash" checked="checked" />
                                                            <label for="payment_method"><i class="bi bi-cash text-success"></i> Cash</label>
                                                        </span>
                                                        <span class="radio-item mx-2">
                                                            <input type="radio" name="payment_method" id="payment_method" class="true" value="QR Code" checked="checked" />
                                                            <label for="payment_method"><i class="ri ri-qr-code-line text-success"></i> QR Code</label>
                                                        </span>
                                                        <span class="radio-item mx-2">
                                                            <input type="radio" name="payment_method" id="payment_method" class="true" value="Credit Card" checked="checked" />
                                                            <label for="payment_method"><i class="bi bi-credit-card text-success"></i> Credit Card</label>
                                                        </span>
                                                    </div>
                                                    <div class="row mb-3">
                                                        <div class="form-floating">
                                                            <input type="date" class="form-control" name="payment_date" placeholder="dd-mm-yyyy">
                                                            <label for="inputDate" class="mx-2 col-form-label">Payment Date</label>
                                                        </div>
                                                    </div>

                                                    <div class="row my-3">
                                                        <div class="form-floating">
                                                            <input type="text" class="form-control noted" placeholder="Noted" name="noted">
                                                            <label for="noted" class="mx-2 col-form-label">Noted</label>
                                                        </div>
                                                    </div>
                                                    <div class="save">
                                                        <button type="submit" class="w-100 btn btn-primary btn-lg btn-block mt-3">Save</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

@endsection


@section('scripts')
<script>
    $('.add_more').on('click', function(e) {
        e.preventDefault();
        var product = $('.product_id').html();
        var number_row = ($('.addMoreProduct tr').length - 0) + 1;
        var tr = '<tr><td class="no">' + number_row + '</td>' +
            '<td><select class="form-control form-select product_id" name="product_id[]" id="product_id">' + product + '</select></td>' +
            '<td><input type="number" name="quantity[]" class="form-control quantity" ></td>' +
            '<td><input type="number" readonly name="price[]" class="form-control price" style="background-color: rgb(200, 200, 200);"></td>' +
            '<td><input type="number" readonly name="alert_stock[]" class="form-control alert_stock" style="background-color: rgb(200, 200, 200);"></td>' +
            '<td><input type="number" readonly name="total_price[]" class="form-control total_price" style="background-color: rgb(200, 200, 200);"></td>' +
            '<td><a href="#" class="btn btn-danger delete"><i class="bi bi-patch-minus"></i></a></td></tr>';
        $('.addMoreProduct').append(tr);
    });
    $('.addMoreProduct').delegate('.delete', 'click', function() {
        $(this).parent().parent().remove();
    });

    function TotalPrice() {
        var total = 0;
        $('.total_price').each(function(i, e) {
            var amount = $(this).val() - 0;
            total += amount;
        });

        $('.total').html(total);
        $('.total').val(total);
    }

    $('.addMoreProduct').delegate('.product_id', 'change', function() {
        var tr = $(this).parent().parent();
        var price = tr.find('.product_id option:selected').attr('data-price');
        tr.find('.price').val(price);
        var alert_stock = tr.find('.product_id option:selected').attr('data-alert-stock');
        tr.find('.alert_stock').val(alert_stock);
        var qty = tr.find('.quantity').val() - 0;
        var price = tr.find('.price').val() - 0;
        var alert_stock = tr.find('.alert_stock').val() - 0;
        var total_price = (qty * price);
        tr.find('.total_price').val(total_price);
        TotalPrice();
        var total = $('.total').html();
        var payment = total;
        $('.payment_amount').val(payment);
    });

    $('.addMoreProduct').delegate('.quantity', 'change', function() {
        var tr = $(this).parent().parent();
        var price = tr.find('.product_id option:selected').attr('data-price');
        tr.find('.price').val(price);
        var alert_stock = tr.find('.product_id option:selected').attr('data-alert-stock');
        tr.find('.alert_stock').val(alert_stock);
        var qty = tr.find('.quantity').val() - 0;
        var price = tr.find('.price').val() - 0;
        var alert_stock = tr.find('.alert_stock').val() - 0;
        var total_price = (qty * price);
        tr.find('.total_price').val(total_price);
        TotalPrice();
        var total = $('.total').html();
        var payment = total;
        $('.payment_amount').val(payment);
    });

    $('.discount').on('click', function() {
        var total = $('.total').html();
        var discount = $(this).val();
        var payment = total - (total * (discount / 100));
        $('.payment_amount').val(payment);
        var tax = $('.tax').val();
        var shipping = $('.shipping').val();
        var total_amount = $('.payment_amount').val();
        var final_price = parseFloat(tax) + parseFloat(shipping) + parseFloat(total_amount);
        $('.final_price').html(final_price);
        $('.final_price').val(final_price);
        $('#final_price').val(final_price);
        console.log(final_price);
    });
    $('.shipping_cost').on('click', function() {
        var shipping = $(this).val();
        $('.shipping').val(shipping);
    });
</script>
@endsection