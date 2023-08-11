@extends('customer.layouts.frontend')

@section('content')
    <!-- Begin Register Content Area -->
    <div class="page-section mb-60">
        <div class="container">
            <div class="row">
                <div class="d-flex justify-content-center align-items-center">
                    <div class="col-sm-12 col-md-12 col-lg-6 col-xs-12">
                        <form action="{{ route('customer-register-process')}}" method="POST">
                            @csrf
                            <div class="login-form">
                                @if(session('error'))
                                <div class="alert alert-danger">
                                    {{ session('error') }}
                                </div>
                              @endif
                                <h4 class="login-title">Register</h4>
                                <div class="row">
                                    <div class="col-md-6 col-12 mb-20">
                                        <label>First Name</label>
                                        <input class="mb-0" type="text" name="firstName" placeholder="First Name" >                                   
                                        @error('firstName')
                                        <div class="text-danger mt-1">{{ $message }}</div>
                                    @enderror
                                    </div>
                                    <div class="col-md-6 col-12 mb-20">
                                        <label>Last Name</label>
                                        <input class="mb-0" type="text" name="lastName" placeholder="Last Name" >                         
                                        @error('lastName')
                                        <div class="text-danger mt-1">{{ $message }}</div>
                                    @enderror
                                    </div>
                                    <div class="col-md-12 mb-20">
                                        <label>Username</label>
                                        <input class="mb-0" type="text" name="username" placeholder="Username">
                                        @error('username')
                                        <div class="text-danger mt-1">{{ $message }}</div>
                                    @enderror
                                    </div>
                                    <div class="col-md-12 mb-20">
                                        <label>Email Address*</label>
                                        <input class="mb-0" type="email" name="email" placeholder="Email Address">
                                        @error('email')
                                        <div class="text-danger mt-1">{{ $message }}</div>
                                    @enderror
                                    </div>
                                    <div class="col-md-6 mb-20">
                                        <label>Password</label>
                                        <input class="mb-0" type="password" name="password" placeholder="Password">
                                        @error('password')
                                        <div class="text-danger mt-1">{{ $message }}</div>
                                    @enderror
                                    </div>
                                    <div class="col-md-6 mb-20">
                                        <label>Confirm Password</label>
                                        <input class="mb-0" type="password" name="password_confirmation" placeholder="Confirm Password">
                                        @error('password_confirmation')
                                        <div class="text-danger mt-1">{{ $message }}</div>
                                    @enderror
                                    </div>
                                    <div class="col-12">
                                        <button class="register-button mt-0">Register</button>
                                    </div>
                                </div>
                            </div>
                        
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Register Content Area End Here -->
@endsection
