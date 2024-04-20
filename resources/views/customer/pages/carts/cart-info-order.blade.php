@extends('customer.layouts.frontend')
@section('content')
    <div class="container mb-60">
        <div class="card">
            <div class="card-body">
                <h4>Information order</h4>
                <form action="{{ route('checkout') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="fullName">Full name:</label>
                            @php
                                if (session('customer.fullName')) {
                                    $fullName = session('customer.fullName');
                                } else {
                                    $fullName = session('customer.firstName') . ' ' . session('customer.lastName');
                                }
                            @endphp
                            <input type="text" class="form-control" name="fullName" id="fullName"
                                value="{{ $fullName }}">
                            @error('fullName')
                                <div class="text-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="phoneNumber">Phone number:</label>
                            @php
                                if (session('customer.phoneNumber')) {
                                    $phoneNumber = session('customer.phoneNumber');
                                } else {
                                    $phoneNumber = $customer->phoneNumber;
                                }
                            @endphp
                            <input type="text" class="form-control" name="phoneNumber" id="phoneNumber"
                                value="{{ $phoneNumber }}">
                            @error('phoneNumber')
                                <div class="text-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="address">Address:</label>
                        @php
                            if (session('customer.address')) {
                                $address = session('customer.address');
                            } else {
                                $address = $customer->address;
                            }
                        @endphp
                        <input type="text" class="form-control" name="address" id="address"
                            value="{{ $address }}">
                        @error('address')
                            <div class="text-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="paymentMethod">Payment method:</label>
                        <select class="form-control" name="paymentMethod" id="paymentMethod">
                            @foreach ($paymentMethods as $paymentMethod)
                                <option value="{{ $paymentMethod->paymentMethodID }}">
                                    {{ $paymentMethod->paymentType }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="row">
                        <div class="col-md-5 ml-auto">
                            <div class="cart-page-total mb-2">
                                <h2>Cart totals</h2>
                                <ul>
                                    <li>Subtotal <span>${{ $total }}</span></li>
                                </ul>
                            </div>
                            <button type="submit" class="btn btn-success">Checkout</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
