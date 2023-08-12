@extends('customer.layouts.frontend')

@section('content')
    <div class="container">


        @if (Session::has('success'))
            <div class="alert alert-success" role="alert">
                {{ Session::get('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
            </div>
        @endif
        @if (Session::has('error'))
            <div class="alert alert-danger" role="alert">
                {{ Session::get('error') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
            </div>
        @endif

        <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                    <h4 class="card-header">Edit account</h4>
                    <div class="card-body">
                        <div class="form-group">
                        </div>
                        <div class="row">
                            <div class="col-12 d-flex justify-content-center align-items-center">
                                <img src="{{ asset('customer/images/uploads/faces/' . $customer->photo) }}" alt="avatar"
                                    class="img-avatar rounded-circle" style="width: 200px; height: 200px;">
                            </div>
                            <div class="col-12 d-flex justify-content-center align-items-center">
                                @error('photo')
                                    <div class="text-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-12 d-flex justify-content-center align-items-center mt-1 mb-2">
                                <form action="{{ route('upload-image') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <button type="button"
                                        class="file-upload-browse btn btn-inverse-primary btn-sm">Chose</button>
                                    <button type="submit"
                                        class="btn-save btn btn-inverse-success btn-sm d-none ml-2">Upload</button>
                                    <input type="text" class="form-control form-control-sm" id="customerID"
                                        name="customerID" placeholder="ID" value="{{ $customer->customerID }}" readonly
                                        hidden>
                                    <div class="form-group" hidden>

                                        <input type="file" name="photo" class="file-upload-default">
                                        <div class="input-group col-xs-12">
                                            <input type="text" name="image" class="form-control file-upload-info"
                                                placeholder="Upload photo" value="{{ $customer->photo }}">
                                            <span class="input-group-append">
                                            </span>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <form class="forms-sample" method="POST" action="{{ route('customer-update') }}">
                            @csrf
                            <div class="form-group">
                                <label for="customerID">ID</label>
                                <input type="text" class="form-control form-control-sm" id="customerID" name="customerID"
                                    placeholder="ID" value="{{ $customer->customerID }}" readonly>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="firstName">First name<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control form-control-sm" id="firstName"
                                        name="firstName" placeholder="First name" value="{{ $customer->firstName }}">
                                    @error('firstName')
                                        <div class="text-danger mt-1">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="lastName">Last name</label>
                                    <input type="text" class="form-control form-control-sm" id="lastName"
                                        name="lastName" placeholder="Last name"
                                        value="{{ old('lastName') == '' ? $customer->lastName : old('lastName') }}">
                                    @error('lastName')
                                        <div class="text-danger mt-1">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label for="username">Username</label>
                                    <input type="text" class="form-control form-control-sm" id="username"
                                        name="username" placeholder="Username"value="{{ $customer->username }}" disabled>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="email">Email<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control form-control-sm" id="email"
                                        name="email" placeholder="example@gmail.com" value="{{ $customer->email }}">
                                    @error('email')
                                        <div class="text-danger mt-2">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="phoneNumber">Phone number<span class="text-danger">*</span></label>
                                    <input type="tel" class="form-control form-control-sm" id="phoneNumber"
                                        name="phoneNumber" placeholder="Phone number"
                                        value="{{ $customer->phoneNumber }}">
                                    @error('phoneNumber')
                                        <div class="text-danger mt-2">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="birthday">Birthday</label>
                                    <input type="date" class="form-control form-control-sm" id="birthday"
                                        name="birthday" value="{{ $customer->birthday }}">
                                    @error('birthday')
                                        <div class="text-danger mt-2">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="gender">Gender</label>
                                    <select class="form-control form-control-sm" id="gender" name="gender">
                                        <option value="1" {{ $customer->gender == 1 ? 'selected' : '' }}>Male
                                        </option>
                                        <option value="0" {{ $customer->gender == 0 ? 'selected' : '' }}>Female
                                        </option>
                                    </select>
                                </div>

                            </div>

                            <div class="form-group">
                                <label for="address">Address</label>
                                <input type="text" class="form-control form-control-sm" id="address" name="address"
                                    placeholder="Enter location" value="{{ $customer->address }}">
                            </div>
                            <button type="submit" class="btn btn-inverse-success">Save</button>
                            <a href="{{ route('customer-profile') }}" class="btn btn-inverse-danger">Cancel</a>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                    <h4 class="card-header">Change password</h4>
                    <div class="card-body">
                        <form action="{{ route('change-password') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="old_passord">Old password</label>
                                <input type="password" class="form-control form-control-sm" id="old_password"
                                    name="old_password" placeholder="Old password" value="{{ old('old_password') }}">
                                <span toggle="old_password"></span>
                                @error('old_password')
                                    <div class="text-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="new_password">New password</label>
                                <input type="password" class="form-control form-control-sm" id="new_password"
                                    name="new_password" placeholder="New password" value="{{ old('new_password') }}">
                                @error('new_password')
                                    <div class="text-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="new_password_confirmation">Confirm password</label>
                                <input type="password" class="form-control form-control-sm"
                                    id="new_password_confirmation" name="new_password_confirmation"
                                    placeholder="Confirm password">
                            </div>
                            <button type="submit" class="btn btn-inverse-success">Update</button>
                            <a href="{{ route('customer-profile') }}" class="btn btn-inverse-danger">Cancel</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('custom-js')
    <script src="{{ asset('customer/js/file-upload.js') }}"></script>
@endsection
