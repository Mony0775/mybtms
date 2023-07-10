@extends('layouts.app')

@section('content')
<div class="pagetitle">
    <h1>Orders Details</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/admin/dashboard">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('order.index') }}">Order List</a></li>
            <li class="breadcrumb-item active">{{ $orders[0]->trx_code}}</li>
        </ol>
    </nav>
</div><!-- End Page Title -->
<button class="btn btn-primary text-light my-2" id="printPdf">Export</button>
<div class="printPdf">
    <div class="card">
    <div class="card-header bg-primary text-white" style="text-decoration: bold">
        General Information
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-4">
                <div class="row py-2">
                    <div class="col-md-6">
                        <div class="name">Employee Name</div>
                    </div>
                    <div class="col-md-6">
                        <div class="value">: {{$orders[0]->employeeName}}</div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="row py-2">
                    <div class="col-md-6">
                        <div class="name">Customer Name</div>
                    </div>
                    <div class="col-md-6">
                        <div class="value">: {{$orders[0]->customerName}}</div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="row py-2">
                    <div class="col-md-6">
                        <div class="name">Shipper Name</div>
                    </div>
                    <div class="col-md-6">
                        <div class="value">: {{$orders[0]->shipperName}}</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col md-4">
                <!-- <div class="row py-2">
                    <div class="col-md-6">
                        <div class="name">Tax</div>
                    </div>
                    <div class="col-md-6">
                        <div class="value">: {{$orders[0]->tax}}</div>
                    </div>
                </div> -->
                <div class="row py-2">
                    <div class="col-md-6">

                        <div class="name">Order Date </div>
                    </div>
                    <div class="col-md-6">
                        <div class="value">: {{$orders[0]->order_date}}</div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="row py-2">
                    <div class="col-md-6">
                        <div class="name">Shipper Cost </div>
                    </div>
                    <div class="col-md-6">
                        <div class="value">: {{$orders[0]->shipping_cost}}</div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="row py-2">
                    <div class="col-md-6">
                        <div class="name">Shipper Date</div>
                    </div>
                    <div class="col-md-6">
                        <div class="value">: {{$orders[0]->shipping_date}}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="card">
    <div class="card-header bg-primary text-white">
        Product Order Information
    </div>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Order ID</th>
                <th scope="col">Product Name</th>
                <th scope="col">Price</th>
                <th scope="col">Quantity</th>
                <th scope="col">Total Price</th>
            </tr>
        </thead>
        <tbody>
            @foreach($order_details as $keys => $order_detail)
            <tr>
                <td> {{$keys+1}} </td>
                <td>{{ $order_detail->order_id }}</td>
                <td>{{ $order_detail->productName}}</td>
                <td>{{ $order_detail->price }}</td>
                <td>{{ $order_detail->quantity }}</td>
                <td>{{ $order_detail->total_price }} </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<div class="card flex-end">
    <div class="card-header bg-primary text-white">
        Payment Information
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-9">

            </div>

            <div class="col-md-3">
                <div class="row">
                    <div class="col-md-6">
                        Transaction Code:
                    </div>
                    <div class="col-md-6" style="background-color: #addf">
                        : {{$orders[0]->trx_code}}
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        Total Price
                    </div>
                    <div class="col-md-6">
                        : $ {{$orders[0]->sum_total}}
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        Tax
                    </div>
                    <div class="col-md-6">
                        : $ {{$orders[0]->tax}}
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        Shipping Cost
                    </div>
                    <div class="col-md-6">
                        : $ {{$orders[0]->shipping_cost}}
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        Discount
                    </div>
                    <div class="col-md-6">
                        : {{$orders[0]->discount}} %
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        Payment Type
                    </div>
                    <div class="col-md-6" style="background-color: #1111">
                        :
                        @if($orders[0]->payment_type == 'Credit Card')
                        <i class="bi bi-credit-card text-success"></i> {{$orders[0]->payment_type}}
                        @elseif($orders[0]->payment_type == 'Cash')
                        <i class="bi bi-cash text-success"></i> {{$orders[0]->payment_type}}
                        @else
                        <i class="ri ri-qr-code-line text-success"></i> {{$orders[0]->payment_type}}
                        @endif
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        Payment Date
                    </div>
                    <div class="col-md-6" style="background-color: #1111">
                        :
                        <i class="ri ri-calendar-check-fill text-success"></i> {{$orders[0]->payment_date}}
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        Payment Price
                    </div>
                    <div class="col-md-6" style="background-color: #C3F976">
                        : $ {{$orders[0]->payment_amount}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<style>
    @media print {
        body * {
            visibility: hidden;
        }
        .printPdf, .printPdf * {
            visibility: visible;
        }
    }
</style>

@endsection
@section('scripts')
<script>
    const printPdf = document.getElementById('printPdf');
    printPdf.addEventListener('click', function() {
        print();
    });
</script>
@endsection