@extends('admin.layout.frontend')

@section('content')
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
                        <span>
                            <b>ID: </b>
                            {{ $admin->adminID }}
                        </span>
                    </div>
                    <div class="row">
                        <div class="col-12 d-flex justify-content-center align-items-center">
                            <img src="{{ asset('admjn/images/uploads/faces/' . $admin->photo) }}" alt="avatar"
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
                                <input type="text" class="form-control form-control-sm" id="adminID" name="adminID"
                                    placeholder="ID" value="{{ $admin->adminID }}" readonly hidden>
                                <div class="form-group" hidden>

                                    <input type="file" name="photo" class="file-upload-default">
                                    <div class="input-group col-xs-12">
                                        <input type="text" name="image" class="form-control file-upload-info"
                                            placeholder="Upload photo" value="{{ $admin->photo }}">
                                        <span class="input-group-append">
                                        </span>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <form class="forms-sample" method="POST" action="{{ route('admin-update') }}">
                        @csrf
                        <div class="form-group" hidden>
                            <label for="adminID">ID</label>
                            <input type="text" class="form-control form-control-sm" id="adminID" name="adminID"
                                placeholder="ID" value="{{ $admin->adminID }}" readonly>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="firstName">First name<span class="text-danger">*</span></label>
                                <input type="text" class="form-control form-control-sm" id="firstName" name="firstName"
                                    placeholder="First name" value="{{ $admin->firstName }}">
                                @error('firstName')
                                    <div class="text-danger mt-1">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="lastName">Last name</label>
                                <input type="text" class="form-control form-control-sm" id="lastName" name="lastName"
                                    placeholder="Last name" value="{{ $admin->lastName }}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-4">
                                <label for="username">Username</label>
                                <input type="text" class="form-control form-control-sm" id="username" name="username"
                                    placeholder="Username"value="{{ $admin->username }}" disabled>
                                @error('username')
                                    <div class="text-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group col-md-4">
                                <label for="email">Email<span class="text-danger">*</span></label>
                                <input type="text" class="form-control form-control-sm" id="email" name="email"
                                    placeholder="example@gmail.com" value="{{ $admin->email }}">
                                @error('email')
                                    <div class="text-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group col-md-4">
                                <label for="phoneNumber">Phone number<span class="text-danger">*</span></label>
                                <input type="tel" class="form-control form-control-sm" id="phoneNumber"
                                    name="phoneNumber" placeholder="Phone number" value="{{ $admin->phoneNumber }}">
                                @error('phoneNumber')
                                    <div class="text-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group col-md-4">
                                <label for="birthday">Birthday<span class="text-danger">*</span></label>
                                <input type="date" class="form-control form-control-sm" id="birthday"
                                    name="birthday" value="{{ $admin->birthday }}">
                                @error('birthday')
                                    <div class="text-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group col-md-4">
                                <label for="gender">Gender</label>
                                <select class="form-control form-control-sm" id="gender" name="gender">
                                    <option value="1" {{ $admin->gender == 1 ? 'selected' : '' }}>Male</option>
                                    <option value="0" {{ $admin->gender == 0 ? 'selected' : '' }}>Female</option>
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="role">Role<span class="text-danger">*</span></label>
                                <select class="form-control form-control-sm" id="role" name="role">
                                    @foreach ($roles as $role)
                                        <option value="{{ $role->roleID }}"
                                            {{ $role->roleID == $admin->roleID ? 'selected' : '' }}>{{ $role->name }}
                                        </option>
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
                                placeholder="Enter location" value="{{ $admin->address }}">
                        </div>
                        <button type="submit" class="btn btn-inverse-success">Save</button>
                        <a href="{{ route('admin-list') }}" class="btn btn-inverse-danger">Cancel</a>
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
                            <label for="old-passord">Old password</label>
                            <input type="password" class="form-control form-control-sm" id="old_password"
                                name="old_password" placeholder="Old password" value="{{ old('old_password') }}">
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
                            <input type="password" class="form-control form-control-sm" id="new_password_confirmation"
                                name="new_password_confirmation" placeholder="Confirm password">
                        </div>
                        <button type="submit" class="btn btn-inverse-success">Update</button>
                        <a href="{{ route('admin-list') }}" class="btn btn-inverse-danger">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('custom-js')
    <script src="{{ asset('admjn/js/file-upload.js') }}"></script>
@endsection
