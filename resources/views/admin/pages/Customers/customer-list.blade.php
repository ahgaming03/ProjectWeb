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
                            <h4 class="card-title">Customer List</h4>
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>CustomerID</th>
                                            <th>User name</th>
                                            <th>Email</th>
                                            <th>Address</th>
                                            <th>Updated at</th>
                                            <th>Created at</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($customers as $customer)
                                            <tr>
                                                <td>{{ $customer->customerID }}</td>
                                                <td>{{ $customer->username }}</td>
                                                <td>{{ $customer->email }}</td>
                                                <td>{{ $customer->adress }}</td>                                     
                                                <td>{{ $customer->updated_at }}</td>
                                                <td>{{ $customer->created_at }}</td>
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
