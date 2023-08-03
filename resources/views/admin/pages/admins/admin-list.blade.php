@extends('admin.layout.frontend')
@section('content')
    <!-- partial:admin/partials/_navbar.blade.php -->
    @include('admin.partials._navbar')
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
        <!-- partial:admin/partials/_sidebar.blade.php -->
        @include('admin.partials._sidebar')
        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Admin account list</h4>
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
                                                <td><img src="{{ asset('admjn/images/uploads/' . $admin->photo) }}"
                                                        alt="photo"></td>
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
                                                                class="bi bi-pencil-fill"></i> Edit</a> &nbsp;
                                                        <a href="#" title="Delete this product"
                                                            class="btn btn-danger btn-rounded"><i
                                                                class="bi bi-trash-fill"></i> Delete</a> &nbsp;
                                                    </span>
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
            <!-- content-wrapper ends -->
            <!-- partial:admin.partials._footer.blade.php -->
            @include('admin.partials._footer')
            <!-- partial -->
        </div>
        <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
@endsection
