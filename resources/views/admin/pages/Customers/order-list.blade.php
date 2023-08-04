@extends('admin.layout.frontend')
@section('content')
    <!-- partial:admin/partials/_navbar.blade.php -->
    @include('admin.partials._navbar')
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
        <!-- partial:admin/partials/_sidebar.blade.php -->
        @include('admin.partials._sidebar')
        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Order list</h4>
                            <div class="table-responsive">
                                <table class="table table-hover table-striped table-bordered table-info">
                                    <thead>
                                        <tr>
                                            <th>Order ID</th>
                                            <th>Cutomer ID</th>
                                            <th>Total Price</th>
                                            <th>Order Status</th>
                                            <th>Payment Method ID</th>
                                            <th>Update</th>
                                            <th>Create</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($orders as $order)
                                            <td>{{ $order->orderID }}</td>
                                            <td>{{ $order->customerID }}</td>
                                            <td>{{ $order->totalPrice }}</td>
                                            <td>{{ $order->orderStatus }}</td>
                                            <td>{{ $order->paymentMethodID }}</td>
                                            <td>{{ $order->updated_at }}</td>
                                            <td>{{ $order->created_at }}</td>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- content-wrapper ends -->
            <!-- partial:admin.partials._footer.blade.php -->
            @include('admin.partials._footer')
            <!-- partial -->
        </div>
        <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
@endsection
