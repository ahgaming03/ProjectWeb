@extends('admin.layout.frontend')
@section('content')
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Order details</h4>
                    @if (Session::has('success'))
                        <div class="alert alert-success alert-dismissible" role="alert">
                            {{ Session::get('success') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                        </div>
                    @endif
                    <div><b>Order ID:</b>{{ $information->first()->orderID }}</div>
                    <div><b>Date:</b>{{ $information->first()->created_at }}</div>
                    <div><b>Payment Method:</b>{{ $information->first()->paymentType }}</div>
                    <div><b>Customer Name:</b>{{ $information->first()->firstName . ' ' . $information->first()->lastName }}
                    </div>
                    <div><b>Phone Number:</b>{{ $information->first()->phoneNumber }}</div>
                    <div><b>Address:</b>{{ $information->first()->address }}</div>
                    <!-- Button trigger modal delete -->
                    <button type="button" title="Delete this order" class="btn btn-inverse-danger btn-sm float-right mb-1"
                        data-toggle="modal" data-target="#deleteModal{{ $information->first()->orderID }}"><i
                            class="bi bi-trash-fill"></i>Delete order</button> &nbsp;
                    <!-- Modal delete -->
                    <div class="modal fade" id="deleteModal{{ $information->first()->orderID}}" tabindex="-1"
                        aria-labelledby="deleteLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title" id="delete">Delete product</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                            aria-hidden="true">&times;</span></button>
                                </div>
                                <div class="modal-body">
                                    Are you delete this product?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-inverse-danger btn-rounded"
                                        data-dismiss="modal">Cancel</button>
                                    <a href="{{ url('admin/orders/order-delete/' . $information->first()->orderID) }}"
                                        class="btn btn-inverse-success btn-rounded ">Delete </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered table-striped ">
                            <thead>
                                <tr class="table-info">
                                    <th>Product name</th>
                                    <th>Quantity</th>
                                    <th>Unit price</th>
                                    <th>Ext price</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orderDetails as $order)
                                    <tr>
                                        <td>{{ $order->name }}</td>
                                        <td>{{ $order->quantity }}</td>
                                        <td>${{ $order->price }}</td>
                                        <td>${{ $order->quantity * $order->price }}</td>
                                    </tr>
                                @endforeach
                                <tr>
                                    <td colspan="3">Total</td>
                                    <td>${{ $order->totalPrice }}</td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
