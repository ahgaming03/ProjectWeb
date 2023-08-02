<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>GamingGear Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('admjn/vendors/ti-icons/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('admjn/vendors/base/vendor.bundle.base.css') }}">
    <!-- endinject -->
    <!-- plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{ asset('admjn/css/style.css') }}">
    <!-- endinject -->
    <link rel="shortcut icon" href="{{ asset('admjn/images/favicon.png') }}" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>

<body>
    <div class="container-scroller">
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
                                            @foreach ($admin as $ad)
                                                <tr>
                                                    <td><img src="{{ $ad->photo == null ? asset('admjn/images/default-profile-photo.jpg') : asset('admjn/images/admin/' . $ad->photo) }}"
                                                            alt=""></td>
                                                    <td>{{ $ad->adminID }}</td>
                                                    <td>{{ $ad->firstName }}</td>
                                                    <td>{{ $ad->lastName }}</td>
                                                    <td>{{ $ad->email }}</td>
                                                    <td>{{ $ad->updated_at }}</td>
                                                    <td>{{ $ad->created_at }}</td>
                                                    <td>
                                                        <span>
                                                            <a href="#" title="Edit this product"><i
                                                                    class="bi bi-pencil-fill"></i></a> &nbsp;
                                                            <a href="#" title="Delete this product"><i
                                                                    class="bi bi-trash-fill"></i></a> &nbsp;
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
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="{{ asset('admjn/vendors/base/vendor.bundle.base.js') }}"></script>
    <!-- endinject -->
    <!-- Plugin js for this page-->
    <!-- End plugin js for this page-->
    <!-- inject:js -->
    <script src="{{ asset('admjn/js/off-canvas.js') }}"></script>
    <script src="{{ asset('admjn/js/hoverable-collapse.js') }}"></script>
    <script src="{{ asset('admjn/js/template.js') }}"></script>
    <script src="{{ asset('admjn/js/todolist.js') }}"></script>
    <!-- endinject -->
    <!-- Custom js for this page-->
    <!-- End custom js for this page-->
</body>

</html>
