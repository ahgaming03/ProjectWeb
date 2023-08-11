@extends('admin.layout.frontend')

@section('content')
    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Add new admin account</h4>
                    @if (Session::has('success')) 
                        <div class="alert alert-success" role="alert">
                            {{ Session::get('success') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                        </div>
                    @endif
                    <form class="forms-sample" method="POST" action="{{ route('admin-save') }}">
                        @csrf
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="firstName">First name<span class="text-danger">*</span></label>
                                <input type="text" class="form-control form-control-sm" id="firstName" name="firstName"
                                    placeholder="First name" value="{{ old('firstName') }}">
                                @error('firstName')
                                    <div class="text-danger mt-1">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="lastName">Last name</label>
                                <input type="text" class="form-control form-control-sm" id="lastName" name="lastName"
                                    placeholder="Last name" value="{{ old('lastName') }}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-4">
                                <label for="username">Username<span class="text-danger">*</span></label>
                                <input type="text" class="form-control form-control-sm" id="username" name="username"
                                    placeholder="Username" value="{{ old('username') }}">
                                @error('username')
                                    <div class="text-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group col-md-4">
                                <label for="email">Email<span class="text-danger">*</span></label>
                                <input type="text" class="form-control form-control-sm" id="email" name="email"
                                    placeholder="example@gmail.com" value="{{ old('email') }}">
                                @error('email')
                                    <div class="text-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group col-md-4">
                                <label for="phoneNumber">Phone number<span class="text-danger">*</span></label>
                                <input type="tel" class="form-control form-control-sm" id="phoneNumber"
                                    name="phoneNumber" placeholder="098-xxx-xxxx" value="{{ old('phoneNumber') }}">
                                @error('phoneNumber')
                                    <div class="text-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group col-md-4">
                                <label for="birthday">Birthday<span class="text-danger">*</span></label>
                                <input type="date" class="form-control form-control-sm" id="birthday" name="birthday"
                                    value="{{ old('birthday') }}">
                                @error('birthday')
                                    <div class="text-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group col-md-4">
                                <label for="gender">Gender</label>
                                <select class="form-control form-control-sm" id="gender" name="gender">
                                    <option value="1">Male</option>
                                    <option value="0">Female</option>
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="role">Role<span class="text-danger">*</span></label>
                                <select class="form-control form-control-sm" id="role" name="role">
                                    <option></option>
                                    @foreach ($roles as $role)
                                        <option value="{{ $role->roleID }}">{{ $role->name }}</option>
                                    @endforeach
                                </select>
                                @error('role')
                                    <div class="text-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="address">Address</label>
                            <input type="text" class="form-control form-control-sm" id="address" name="address"
                                placeholder="Enter location" value="{{ old('address') }}">
                        </div>
                        <button type="submit" class="btn btn-inverse-success me-2">Add</button>
                        <a href="{{ route('admin-list') }}" class="btn btn-inverse-danger">Cancel</a>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
