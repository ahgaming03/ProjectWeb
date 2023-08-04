@extends('admin.layout.frontend')
@section('content')
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Admin account list</h4>
                    @if (Session::has('success'))
                        <div class="alert alert-success alert-dismissible" role="alert">
                            {{ Session::get('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    <div class="table-responsive">
                        <table class="table table-hover table-striped">
                            <thead>
                                <tr>
                                    <th>Photo</th>
                                    <th>ID</th>
                                    <th>First name</th>
                                    <th>Last name</th>
                                    <th>Email</th>
                                    <th>Last update</th>
                                    <th>Create at</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($admins as $admin)
                                    <tr>
                                        <td><img src="{{ asset('admjn/images/uploads/' . $admin->photo) }}" alt="photo">
                                        </td>
                                        <td>{{ $admin->adminID }}</td>
                                        <td>{{ $admin->firstName }}</td>
                                        <td>{{ $admin->lastName }}</td>
                                        <td>{{ $admin->email }}</td>
                                        <td>{{ $admin->updated_at }}</td>
                                        <td>{{ $admin->created_at }}</td>
                                        <td>
                                            <span>
                                                <a href="{{ url('admin/admin-edit/' . $admin->adminID) }}"
                                                    title="Edit this product" class="btn btn-primary btn-rounded"><i
                                                        class="bi bi-pencil-fill"></i>
                                                    <b>Edit</b></a> &nbsp;
                                                <!-- Button trigger modal -->
                                                <button type="button" title="Delete this product"
                                                    class="btn btn-danger btn-rounded" data-bs-toggle="modal"
                                                    data-bs-target="#deleteModal{{ $admin->adminID }}"><i
                                                        class="bi bi-trash-fill"></i>
                                                    <b>Delete</b></button> &nbsp;
                                            </span>
                                            <!-- Modal -->
                                            <div class="modal fade" id="deleteModal{{ $admin->adminID }}" tabindex="-1"
                                                aria-labelledby="delete" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5" id="delete">
                                                                <span>
                                                                    Delete account
                                                                </span>
                                                            </h1>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            Are you delete this account?
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary btn-rounded"
                                                                data-bs-dismiss="modal">Close</button>
                                                            <a href="{{ url('admin/admin-delete/' . $admin->adminID) }}"
                                                                class="btn btn-primary btn-rounded">Delete</a>
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
