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
                <div class="row">
                    <div class="col-md-12 grid-margin">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <h4 class="font-weight-bold mb-0">Hello, {{ session('adminName') }}</h4>
                                    </div>
                                    <div>
                                        <button type="button" class="btn btn-primary btn-icon-text btn-rounded">
                                            <i class="ti-clipboard btn-icon-prepend"></i>Report
                                        </button>
                                    </div>
                                </div>
                                <div>
                                    Your profile:
                                    <ul>
                                        <li>Username: {{ session('adminName') }}</li>
                                        <li>Email: {{ session('adminEmail') }}</li>
                                        <li>Phone: {{ session('adminPhone') }}</li>
                                        <li>Address: {{ session('adminAddress') }}</li>
                                    </ul>
                                </div>
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

@section('plugin-js')
    <script src="{{ asset('admjn/vendors/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('admjn/js/jquery.cookie.js') }}" type="text/javascript"></script>
@endsection

@section('custom-js')
    <script src="{{ asset('admjn/js/dashboard.js') }}"></script>
@endsection
