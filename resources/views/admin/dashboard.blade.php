@extends('admin.layout.frontend')

@section('plugin-css')
    <link rel="stylesheet" href="{{ asset('admjn/vendors/datatables.net-bs4/dataTables.bootstrap4.css') }}">
    <link rel="stylesheet" href="{{ asset('admjn/vendors/ti-icons/css/themify-icons.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admjn/js/select.dataTables.min.css') }}">
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12 grid-margin">
            <h3 class="font-weight-bold mb-0">Hello, {{ session('adminName') }}</h3>
        </div>
    </div>
    <div class="row">
        {{-- left --}}
        <div class="col-md-12 col-lg-6">
            <div class="row">
                {{-- Order status --}}
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <h3>Order status</h3>
                            <div class="table-responsive">
                                <table class="table table-hover table-striped">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>Order ID</th>
                                            <th>Customer name</th>
                                            <th>Total price</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($orders as $order)
                                            <tr>
                                                <td>{{ $order->orderID }}</td>
                                                <td>{{ $order->firstName . ' ' . $order->lastName }}</td>
                                                <td>{{ $order->totalPrice }}</td>
                                                <td>{{ $order->orderStatus }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- End order status --}}
                <div class="col-md-12 mt-4">
                    <div class="card">
                        <div class="card-body">
                            <h3>New customers</h3>
                            <div class="table-responsive">
                                <table class="table table-hover table-striped">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>Customer ID</th>
                                            <th>Customer name</th>
                                            <th>Phone</th>
                                            <th>Email</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($customers as $customer)
                                            <tr>
                                                <td>{{ $customer->customerID }}</td>
                                                <td>{{ $customer->firstName . ' ' . $customer->lastName }}</td>
                                                <td>{{ $customer->birthday }}</td>
                                                <td>{{ $customer->phoneNumber }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('plugin-js')
    <script src="{{ asset('admjn/vendors/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('admjn/vendors/datatables.net/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('admjn/vendors/datatables.net-bs4/dataTables.bootstrap4.js') }}"></script>
    <script src="{{ asset('admjn/js/dataTables.select.min.js') }}"></script>
@endsection

@section('custom-js')
    <script src="{{ asset('admjn/js/dashboard.js') }}"></script>
    <script src="{{ asset('admjn/js/Chart.roundedBarCharts.js') }}"></script>
@endsection
