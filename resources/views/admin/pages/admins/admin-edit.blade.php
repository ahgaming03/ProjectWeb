@extends('admin.layout.frontend')

@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Add new admin account</h4>
                            @if (Session::has('success'))
                                <div class="alert alert-success" role="alert">
                                    {{ Session::get('success') }}
                                </div>
                            @endif
                            <div class="form-group">
                                <span>
                                    <b>ID: </b>
                                    {{ $admin->adminID }}
                                </span>
                            </div>
                            <form class="forms-sample" method="POST" action="{{ url('admin/admin-update') }}">
                                @csrf
                                <div class="row">
                                    <div class="form-group col-6">
                                        <label for="inputFirstName">First name</label>
                                        <input type="text" class="form-control" id="inputFirstName" name="firstName"
                                            placeholder="Enter first name" value="{{ $admin->firstName }}">
                                        @error('firstName')
                                            <div class="text-danger mt-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="inputLastName">Last name</label>
                                        <input type="text" class="form-control" id="inputLastName" name="lastName"
                                            placeholder="Enter last name" value="{{ $admin->lastName }}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputUsername">Username</label>
                                    <input type="text" class="form-control" id="inputUsername" name="username"
                                        placeholder="Enter username"value="{{ $admin->username }}">
                                    @error('username')
                                        <div class="text-danger mt-2">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="inputPassword">Password</label>
                                    <input type="password" class="form-control" id="inputPassword" name="password"
                                        placeholder="Enter password" min="8" value="{{ $admin->password }}">
                                    @error('password')
                                        <div class="text-danger mt-2">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail">Email</label>
                                    <input type="email" class="form-control" id="inputEmail" name="email"
                                        placeholder="Enter email" value="{{ $admin->email }}">
                                    @error('email')
                                        <div class="text-danger mt-2">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>File upload</label>
                                    <input type="file" name="image[]" class="file-upload-default">
                                    <div class="input-group col-xs-12">
                                        <input type="text" class="form-control file-upload-info" disabled name="photo"
                                            placeholder="Upload image">
                                        <span class="input-group-append">
                                            <button class="file-upload-browse btn btn-primary"
                                                type="button">Upload</button>
                                        </span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputAddress">Address</label>
                                    <input type="text" class="form-control" id="inputAddress" name="address"
                                        placeholder="Enter location" value="{{ $admin->address }}">
                                </div>
                                <button type="submit" class="btn btn-primary me-2">Submit</button>
                                <a href="{{ url('admin/admin-list') }}" class="btn btn-light">Cancel</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:admin.partials._footer.blade.php -->
        @include('admin.partials._footer')
        <!-- partial -->
    </div>
@endsection
