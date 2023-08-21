@extends('customer.layouts.frontend')
@section('content')
    <div class="container mb-60">
        <div class="card">
            <div class="card-body">
                <h4>Information order</h4>
                <form action="{{route('checkout')}}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="fullName">Full name:</label>
                            <input type="text" class="form-control" name="fullName" id="fullName"
                                value="{{ session('customer.fullName') == null ? $customer->firstName . ' ' . $customer->lastName : old('fullName') }}">
                                @error('fullName')
                                    <div class="text-danger mt-2">{{ $message }}</div>
                                @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="phoneNumber">Phone number:</label>
                            <input type="text" class="form-control" name="phoneNumber" id="phoneNumber"
                                value="{{ session('customer.phoneNumber') == null ? $customer->phoneNumber : old('phoneNumber') }}">
                                @error('phoneNumber')
                                    <div class="text-danger mt-2">{{ $message }}</div>
                                @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="address">Address:</label>
                        <input type="text" class="form-control" name="address" id="address"
                            value="{{ session('customer.address') == null ? $customer->address : old('address') }}">
                            @error('address')
                                <div class="text-danger mt-2">{{ $message }}</div>
                            @enderror
                    </div>
                    <div class="form-group">
                        <label for="payment">Payment method:</label>
                        <select class="form-control" name="payment" id="payment">
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
