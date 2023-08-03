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
                            <h4 class="card-title">Product list</h4>
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Price</th>
                                        <th>Details</th>
                                        <th>Image</th>
                                        <th>Category</th>
                                        <th>Last Update</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pro as $prol)
                                        <tr>
                                            <td>{{ $prol->productID }}</td>
                                            <td>{{ $prol->Name }}</td>
                                            <td>{{ $prol->Price }}</td>
                                            <td>{{ $prol->Details }}</td>
                                            <td>{{ $prol->Image }}</td>
                                            <th>{{ $prol->Category }}</th>
                                            <td>{{ $prol->updated_at }}</td>
                                            <td>
                                                <a href="{{ url('productEdit') }}\{{ $prol->productID }}"
                                                    title="Edit this product"><i class="bi bi-pencil-fill"></i></a> &nbsp;
                                                <a href="{{ url('productDelete') }}\{{ $prol->productID }}"
                                                    title="Delete this product"
                                                    onclick="return confirm('Are you sure delete this product?');"><i
                                                        class="bi bi-trash-fill"></i></a> &nbsp;
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
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
