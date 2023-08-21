@extends('customer.layouts.frontend')
@section('custom-js')
    <script>
        $(document).ready(function() {
            $('.cart_update').on('change', function() {
                var productId = $(this).data('product-id');
                var newQuantity = $(this).val();
                $.ajax({
                    url: "{{ route('cart-update') }}",
                    method: "POST",
                    data: {
                        _token: '{{ csrf_token() }}',
                        productId: productId,
                        quantity: newQuantity
                    },
                    success: function(response) {
                        location.reload();
                    }
                });
            });
        });
    </script>
@endsection
@section('content')
    <!--Shopping Cart Area Strat-->
    <div class="Shopping-cart-area pt-60 pb-60">
        <div class="container">
            <div class="card card-body">
                <h3>Your cart</h3>
                <div class="row">
                    <div class="col-12">
                        @if (session('cart'))
                            <div class="table-content table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th class="li-product-remove">remove</th>
                                            <th class="li-product-thumbnail">images</th>
                                            <th class="cart-product-name">Product</th>
                                            <th class="li-product-price">Unit Price</th>
                                            <th class="li-product-quantity">Quantity</th>
                                            <th class="li-product-subtotal">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $total = 0 @endphp

                                        @foreach (session('cart') as $item => $details)
                                            @php $total += $details['price'] * $details['quantity'] @endphp
                                            <tr>
                                                <td>
                                                    <!-- Button trigger modal -->
                                                    <button type="button" class="btn btn-danger" data-toggle="modal"
                                                        data-target="#deleteModal-{{ $item }}">
                                                        <i class="fa-solid fa-trash-can"></i>
                                                    </button>

                                                    <!-- Modal -->
                                                    <div class="modal fade" id="deleteModal-{{ $item }}"
                                                        tabindex="-1" role="dialog" aria-labelledby="deleteLabel"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h4 class="modal-title" id="deleteLabel">Modal
                                                                        title</h4>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    Do you want to remove this product?
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-danger"
                                                                        data-dismiss="modal">Close</button>
                                                                    <a href="{{ route('remove-from-cart', $item) }}"
                                                                        class="btn btn-success">Remove</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="li-product-thumbnail"><a
                                                        href="{{ route('product-detail', $item) }}"><img
                                                            src="{{ asset('admjn/images/uploads/products/' . $details['cover']) }}"
                                                            alt="Product Image" width="100" height="100"></a>
                                                </td>
                                                <td class="li-product-name"><a
                                                        href="{{ route('product-detail', $item) }}">{{ $details['name'] }}</a>
                                                </td>
                                                <td class="li-product-price"><span
                                                        class="amount">${{ $details['price'] }}</span>
                                                </td>
                                                <td class="quantity">
                                                    <input data-product-id="{{ $item }}" class="cart_update"
                                                        value="{{ $details['quantity'] }}" type="number" min="1"
                                                        style="width: 75px;">
                                                </td>
                                                <td class="product-subtotal"><span
                                                        class="amount">${{ $details['price'] * $details['quantity'] }}</span>
                                                </td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                            <div class="row">
                                <div class="col-md-5 ml-auto">
                                    <div class="cart-page-total mb-2">
                                        <h2>Cart totals</h2>
                                        <ul>
                                            <li>Subtotal <span>${{ $total }}</span></li>
                                        </ul>
                                    </div>
                                    <a href="{{ route('product-index') }}" class="btn btn-danger"><i
                                            class="fa fa-arrow-left"></i>
                                        Continue to shopping</a>
                                    <!-- Button trigger modal -->
                                    <a href="{{route('cart-info-order')}}" class="btn btn-success">Checkout</a>
                                </div>
                            </div>
                        @else
                            <h4>Your cart is empty</h4>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Shopping Cart Area End-->
@endsection
