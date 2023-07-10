<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css" integrity="sha256-2XFplPlrFClt0bIdPgpz8H7ojnk10H69xRqd9+uTShA=" crossorigin="anonymous" />
<link href="{{ asset('admin/assets/css/style.css') }}" rel="stylesheet">
<link href="{{ asset('admin/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('admin/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
<link href="{{ asset('admin/assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
<link href="{{ asset('admin/assets/vendor/quill/quill.snow.css') }}" rel="stylesheet">
<link href="{{ asset('admin/assets/vendor/quill/quill.bubble.css') }}" rel="stylesheet">
<link href="{{ asset('admin/assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
<link href="{{ asset('admin/assets/vendor/simple-datatables/style.css') }}" rel="stylesheet">
<link href="{{ asset('admin/assets/css/jquery.dataTables.min.css') }}" rel="stylesheet">
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="invoice-title">
                        <h4 class="float-end font-size-15">Transaction {{$orders[0]->trx_code}} <span class="badge bg-success font-size-12 ms-2"></span></h4>
                        <div class="mb-4">
                            <h2 class="mb-1 text-muted"><img src="{{asset('admin/assets/img/logo-color.png')}}" width="5%" height="5%" alt=""> SBTMS</h2>
                        </div>
                        <div class="text-muted">
                            <p class="mb-1">{{$orders[0]->emStreet}}, {{$orders[0]->emCity}} {{$orders[0]->emProvince}} {{$orders[0]->emCountry}}</p>
                            <p class="mb-1"><i class="uil uil-envelope-alt me-1"></i> {{$orders[0]->emWeb}}</p>
                            <p><i class="uil uil-phone me-1"></i> {{$orders[0]->emPhone}} </p>
                        </div>
                    </div>

                    <hr class="my-4">

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="text-muted">
                                <h5 class="font-size-16 mb-3">Billed To:</h5>
                                <h5 class="font-size-15 mb-2"> {{$orders[0]->customerName}}</h5>
                                <p class="mb-1">{{$orders[0]->cuStreet}}, {{$orders[0]->cuCity}} {{$orders[0]->cuProvince}} {{$orders[0]->cuCountry}}</p>
                                <p class="mb-1">{{$orders[0]->cuWeb}}</p>
                                <p>{{$orders[0]->cuPhone}}</p>
                            </div>
                        </div>
                        <!-- end col -->
                        <div class="col-sm-6">
                            <div class="text-muted text-sm-end">
                                <div>
                                    <h5 class="font-size-15 mb-1">Transaction No:</h5>
                                    <p> {{$orders[0]->trx_code}}</p>
                                </div>
                                <div class="mt-4">
                                    <h5 class="font-size-15 mb-1">Transaction Date:</h5>
                                    <p>{{$orders[0]->order_date}}</p>
                                </div>
                                <div class="mt-4">
                                    <h5 class="font-size-15 mb-1">Order No:</h5>
                                    <p>{{$orders[0]->id}}</p>
                                </div>
                            </div>
                        </div>
                        <!-- end col -->
                    </div>
                    <!-- end row -->

                    <div class="py-2">
                        <h5 class="font-size-15">Order Summary</h5>

                        <div class="table-responsive">
                            <table class="table align-middle table-nowrap table-centered mb-0">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Product Name</th>
                                        <th scope="col">Price</th>
                                        <th scope="col">Quantity</th>
                                        <th scope="col">Total Price</th>
                                    </tr>
                                </thead><!-- end thead -->
                                <tbody>
                                    @foreach($order_details as $keys => $order_detail)
                                    <tr>
                                        <td> {{$keys+1}} </td>
                                        <td>{{ $order_detail->productName}}</td>
                                        <td>{{ $order_detail->price }}</td>
                                        <td>{{ $order_detail->quantity }}</td>
                                        <td>{{ $order_detail->total_price }} </td>
                                    </tr>
                                    @endforeach
                                    <!-- end tr -->
                                </tbody><!-- end tbody -->
                            </table><!-- end table -->
                        </div><!-- end table responsive -->
                        <div class="row">
                            <div class="col-sm-6">
                            </div>
                            <!-- end col -->
                            <div class="col-sm-6 text-sm-end">
                                <div class="row">
                                    <div class="col-md-9">
                                        Txn Code :
                                    </div>
                                    <div class="col-md-3" style="background-color: #addf">
                                    {{$orders[0]->trx_code}}
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-9">
                                        Total Price :
                                    </div>
                                    <div class="col-md-3">
                                    $ {{$orders[0]->sum_total}}
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-9">
                                        Tax :
                                    </div>
                                    <div class="col-md-3">
                                    $ {{$orders[0]->tax}}
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-9">
                                        Shipping Cost :
                                    </div>
                                    <div class="col-md-3">
                                    $ {{$orders[0]->shipping_cost}}
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-9">
                                        Discount :
                                    </div>
                                    <div class="col-md-3">
                                    {{$orders[0]->discount}} %
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-9">
                                        Payment Type :
                                    </div>
                                    <div class="col-md-3" style="background-color: #1111">
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
                                    <div class="col-md-9">
                                        Payment Date :
                                    </div>
                                    <div class="col-md-3" style="background-color: #1111">
                                        <i class="ri ri-calendar-check-fill text-success"></i> {{$orders[0]->payment_date}}
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-9">
                                        Payment Price :
                                    </div>
                                    <div class="col-md-3" style="background-color: #C3F976">
                                    $ {{$orders[0]->payment_amount}}
                                    </div>
                                </div>
                                <!-- end col -->
                            </div>
                            <div class="d-print-none mt-4">
                                <div class="float-end">
                                    <a href="javascript:window.print()" class="btn btn-success me-1"><i class="fa fa-print"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- end col -->
        </div>
    </div>
    <style>
        body {
            margin-top: 20px;
            background-color: #eee;
        }

        .card {
            box-shadow: 0 20px 27px 0 rgb(0 0 0 / 5%);
        }

        .card {
            position: relative;
            display: flex;
            flex-direction: column;
            min-width: 0;
            word-wrap: break-word;
            background-color: #fff;
            background-clip: border-box;
            border: 0 solid rgba(0, 0, 0, .125);
            border-radius: 1rem;
        }
    </style>
    <script src="{{ asset('admin/assets/vendor/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('admin/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('admin/assets/vendor/chart.js/chart.umd.js') }}"></script>
    <script src="{{ asset('admin/assets/vendor/echarts/echarts.min.js') }}"></script>
    <script src="{{ asset('admin/assets/vendor/quill/quill.min.js') }}"></script>
    <script src="{{ asset('admin/assets/vendor/simple-datatables/simple-datatables.js') }}"></script>
    <script src="{{ asset('admin/assets/vendor/tinymce/tinymce.min.js') }}"></script>
    <script src="{{ asset('admin/assets/vendor/php-email-form/validate.js') }}"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('admin/assets/js/main.js') }}"></script>
    <script src="{{ asset('admin/assets/js/jquery-3.6.4.min.js') }}"></script>