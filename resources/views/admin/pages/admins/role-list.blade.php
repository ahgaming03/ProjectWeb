@extends('admin.layout.frontend')
@section('content')
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Role List</h4>
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <a class="btn btn-inverse-success" href="{{ route('role-add') }}">
                                <i class="bi bi-plus-circle"></i> Add new role
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
                    @if (Session::has('error'))
                        <div class="alert alert-danger alert-dismissible" role="alert">
                            {{ Session::get('error') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                        </div>
                    @endif
                    <div class="table-responsive text-center">
                        <table class="table table-hover table-striped table-bordered ">
                            <thead>
                                <tr class="table-info">
                                    <th>Role ID</th>
                                    <th>Name</th>
                                    <th>description</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($roles as $role)
                                    <tr>
                                        <td>{{ $role->roleID }}</td>
                                        <td>{{ $role->name }}</td>
                                        <td>{{ $role->description }}</td>
                                        <td>
                                            <a href="{{ url('admin/roles/role-edit/' . $role->roleID) }}"
                                                title="Edit this account" class="btn btn-inverse-primary btn-sm"><i
                                                    class="bi bi-pencil-fill"></i></a> &nbsp;
                                            <!-- Button trigger modal delete -->
                                            <button type="button" title="Delete this account"
                                                class="btn btn-inverse-danger btn-sm" data-toggle="modal"
                                                data-target="#deleteModal{{ $role->roleID }}"><i
                                                    class="bi bi-trash-fill"></i></button> &nbsp;
                                            <!-- Modal delete -->
                                            <div class="modal fade" id="deleteModal{{ $role->roleID }}" tabindex="-1"
                                                aria-labelledby="deleteLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title" id="delete">Delete role</h4>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close"><span
                                                                    aria-hidden="true">&times;</span></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            Are you delete this Role?
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button"
                                                                class="btn btn-inverse-danger btn-rounded"
                                                                data-dismiss="modal">Cancel</button>
                                                            <a href="{{ url('admin/roles/role-delete/' . $role->roleID) }}"
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
