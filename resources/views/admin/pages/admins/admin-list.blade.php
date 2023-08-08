@extends('admin.layout.frontend')
@section('content')
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Admin account list</h4>
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <a class="btn btn-inverse-success" href="{{ route('admin-add') }}">
                                <i class="bi bi-plus-circle"></i> Add new account
                            </a>
                        </div>
                    </div>
                    @if (Session::has('success'))
                        <div class="alert alert-success alert-dismissible" role="alert">
                            {{ Session::get('success') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                        </div>
                    @endif
                    <div class="table-responsive">
                        <table class="table table-hover table-striped">
                            <thead class="thead-light">
                                <tr>
                                    <th>Photo</th>
                                    <th>ID</th>
                                    <th>Full name</th>
                                    <th>Address</th>
                                    <th>Day of birth</th>
                                    <th>Gender</th>
                                    <th>Phone</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Last update</th>
                                    <th>Create at</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($admins as $admin)
                                    <tr>
                                        <td><img src="{{ asset('admjn/images/uploads/faces/' . $admin->photo) }}"
                                                alt="photo">
                                        </td>
                                        <td>{{ $admin->adminID }}</td>
                                        <td title="{{ $admin->firstName . ' ' . $admin->lastName }}">
                                            {{ Str::limit($admin->firstName . ' ' . $admin->lastName, 15, '...') }}</td>
                                        <td title="{{ $admin->address }}">{{ Str::limit($admin->address, 15, '...') }}</td>
                                        <td>{{ $admin->birthday }}</td>
                                        <td>{{ $admin->gender == 1 ? 'Male' : 'Female' }}</td>
                                        <td>{{ $admin->phoneNumber }}</td>
                                        <td>{{ Str::limit($admin->email, 10, '...') }}</td>
                                        <td>{{ $admin->roleName }}</td>
                                        <td>{{ $admin->updated_at }}</td>
                                        <td>{{ $admin->created_at }}</td>
                                        <td>
                                            <span>
                                                <a href="{{ url('admin/admin-edit/' . $admin->adminID) }}"
                                                    title="Edit this account" class="btn btn-inverse-primary btn-sm"><i
                                                        class="bi bi-pencil-fill"></i></a> &nbsp;
                                                <!-- Button trigger modal delete -->
                                                <button type="button" title="Delete this account"
                                                    class="btn btn-inverse-danger btn-sm" data-toggle="modal"
                                                    data-target="#deleteModal{{ $admin->adminID }}"><i
                                                        class="bi bi-trash-fill"></i></button> &nbsp;
                                            </span>
                                            <!-- Modal delete -->
                                            <div class="modal fade" id="deleteModal{{ $admin->adminID }}" tabindex="-1"
                                                aria-labelledby="deleteLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title" id="delete">Delete account</h4>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close"><span
                                                                    aria-hidden="true">&times;</span></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            Are you delete this account?
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button"
                                                                class="btn btn-inverse-danger btn-rounded"
                                                                data-dismiss="modal">Cancel</button>
                                                            <a href="{{ url('admin/admin-delete/' . $admin->adminID) }}"
                                                                class="btn btn-inverse-success btn-rounded ">Delete</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
