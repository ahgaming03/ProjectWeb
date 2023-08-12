@extends('admin.layout.frontend')
@section('content')
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Order list</h4>
                    @if (Session::has('success'))
                        <div class="alert alert-success alert-dismissible" role="alert">
                            {{ Session::get('success') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                        </div>
                    @endif
                    <div class="table-responsive text-center">
                        <table class="table table-hover table-striped table-bordered ">
                            <thead>
                                <tr class="table-info">
                                    <th>Order ID</th>
                                    <th>Cutomer ID</th>
                                    <th>Total Price</th>
                                    <th>Order Status</th>
                                    <th>Create</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $order)
                                    <tr>
                                        <td>{{ $order->orderID }}</td>
                                        <td>{{ $order->customerID }}</td>
                                        <td>{{ $order->totalPrice }}</td>
                                        <td>{{ $order->orderStatus }}</td>
                                        <td>{{ $order->created_at }}</td>
                                        <td>
                                            <a href="{{ url('admin/orders/order-detail/' . $order->orderID) }}"
                                                title="View order detail" class="btn btn-inverse-primary btn-sm ">Detail</a>
                                            &nbsp;
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
