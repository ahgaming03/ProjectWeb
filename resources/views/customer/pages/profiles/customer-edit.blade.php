@extends('customer.layouts.frontend')

@section('content')
    <!-- ... -->
    <div class="row">
        <div class="col-md-6 grid-margin stretch-card">
            <div class="card">
                <h4 class="card-header">Edit Account</h4>
                <div class="card-body">
                    <form class="forms-sample" method="POST" action="{{ route('customer-edit') }}">
                        @csrf
                        <input type="hidden" name="customerID" value="{{ $customer->customerID }}">
                        <div class="form-group">
                            <label for="firstName">First Name<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="firstName" name="firstName"
                                placeholder="First Name" value="{{ old('firstName', $customer->firstName) }}">
                            @error('firstName')
                                <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="lastName">Last Name</label>
                            <input type="text" class="form-control" id="lastName" name="lastName"
                                placeholder="Last Name" value="{{ old('lastName', $customer->lastName) }}">
                        </div>
                        <div class="form-group">
                            <label for="gender">Gender</label>
                            <select class="form-control" id="gender" name="gender">
                                <option value="1" {{ $customer->gender == 1 ? 'selected' : '' }}>Male</option>
                                <option value="0" {{ $customer->gender == 0 ? 'selected' : '' }}>Female</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="birthday">Birthday<span class="text-danger">*</span></label>
                            <input type="date" class="form-control" id="birthday" name="birthday"
                                value="{{ old('birthday', $customer->birthday) }}">
                            @error('birthday')
                                <div class="text-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="phoneNumber">Phone number<span class="text-danger">*</span></label>
                            <input type="tel" class="form-control" id="phoneNumber" name="phoneNumber"
                                placeholder="Phone number" value="{{ old('phoneNumber', $customer->phoneNumber) }}">
                            @error('phoneNumber')
                                <div class="text-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="email">Email<span class="text-danger">*</span></label>
                            <input type="email" class="form-control" id="email" name="email"
                                placeholder="example@gmail.com" value="{{ old('email', $customer->email) }}">
                            @error('email')
                                <div class="text-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="address">Address</label>
                            <input type="text" class="form-control" id="address" name="address"
                                placeholder="Enter Location" value="{{ old('address', $customer->address) }}">
                        </div>
                        <button type="submit" class="btn btn-inverse-success">Save</button>
                        <a href="{{ route('customer-profile') }}" class="btn btn-inverse-danger">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- ... -->
@endsection
