@extends('admin.layout.frontend')
@section('content')
    <div class="row">
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
@endsection
