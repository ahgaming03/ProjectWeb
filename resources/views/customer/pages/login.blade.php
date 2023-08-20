@extends('customer.layouts.frontend')

@section('content')
    <!-- Begin Login Content Area -->
    <div class="page-section mb-60">
        <div class="container">
            <div class="row">
                <div class="d-flex justify-content-center align-items-center">
                    <div class="col-sm-12 col-md-12 col-xs-12 col-lg-6 mb-30">
                        <form action="{{ route('customer-login-process') }}" method="POST">
                            @csrf
                            <div class="login-form">
                                <h4 class="login-title">Login</h4>
                                @if (session()->has('error'))
                                    <div class="text-danger">{{ session()->get('error') }}</div>
                                @endif
                                @if (session('success'))
                                    <div class="alert alert-success">
                                        {{ session('success') }}
                                    </div>
                                @endif
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <a href="/login/github/redirect" class="btn btn-secondary btn-block">
                                            <i class="fa-brands fa-github"></i> Login with Github
                                        </a>
                                        <a href="/login/google/redirect" class="btn btn-danger btn-block">
                                            <i class="fa-brands fa-google"></i> Login with Google
                                        </a>
                                    </div>
                                </div>
                                <p class="mt-2" style="text-align: center">OR</p>
                                <div class="row">
                                    <div class="col-md-12 col-12 mb-20">
                                        <label>Username</label>
                                        <input class="mb-0" type="text" name="username" value="{{ old('username') }}"
                                            placeholder="Email Address">
                                        @error('username')
                                            <div class="text-danger mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-12 mb-20">
                                        <label>Password</label>
                                        <input class="mb-0" type="password" name="password" value="{{ old('password') }}"
                                            placeholder="Password">
                                        @error('password')
                                            <div class="text-danger mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-12 mt-10 mb-20 text-right">
                                        <a href="#"> Forgotten password?</a>
                                    </div>
                                    <div class="col-md-12">
                                        <button type="submit" class="register-button mt-0">Login</button>
                                    </div>
                                </div>
                                <div class="mt-2">
                                    Don't have an account? Click
                                    <span class="font-weight-bold">
                                        <u style="cursor: pointer">
                                            <a href="{{ route('customer-register') }}">here</a>
                                        </u>
                                    </span>
                                    to register.
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
