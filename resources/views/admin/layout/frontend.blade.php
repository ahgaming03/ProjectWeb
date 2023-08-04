<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>GamingGear Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('admjn/vendors/feather/feather.css') }}">
    <link rel="stylesheet" href="{{ asset('admjn/vendors/ti-icons/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('admjn/vendors/css/vendor.bundle.base.css') }}">
    <!-- endinject -->
    <!-- plugin css for this page -->
    @yield('plugin-css')
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{ asset('admjn/css/vertical-layout-light/style.css') }}">
    <!-- endinject -->
    <link rel="shortcut icon" href="{{ asset('admjn/images/favicon.png') }}" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>

<body>
    <div class="container-scroller">
        {{-- partial: navbar --}}
        @include('admin.partials._navbar')
        {{-- partial end --}}
        <div class="container-fluid page-body-wrapper">
            {{-- partial: settings-panel --}}
            @include('admin.partials._settings-panel')
            {{-- partial end --}}
            {{-- partial: sidebar --}}
            @include('admin.partials._sidebar')
            {{-- partial end --}}
            {{-- main-panel --}}
            <div class="main-panel">
                {{-- content-wrapper --}}
                <div class="content-wrapper">
                    @yield('content')
                </div>
                {{-- content-wrapper ends --}}
                {{-- partial:admin.partials._footer.blade.php --}}
                @include('admin.partials._footer')
                {{-- partial end --}}
            </div>
            {{-- main-panel ends --}}
        </div>
        <!-- container-scroller -->

        <!-- plugins:js -->
        <script src="{{ asset('admjn/vendors/js/vendor.bundle.base.js') }}"></script>
        <!-- endinject -->
        <!-- Plugin js for this page-->
        @yield('plugin-js')
        <!-- End plugin js for this page-->
        <!-- inject:js -->
        <script src="{{ asset('admjn/js/off-canvas.js') }}"></script>
        <script src="{{ asset('admjn/js/hoverable-collapse.js') }}"></script>
        <script src="{{ asset('admjn/js/template.js') }}"></script>
        <script src="{{ asset('admjn/js/settings.js') }}"></script>
        <script src="{{ asset('admjn/js/todolist.js') }}"></script>
        <!-- endinject -->
        <!-- Custom js for this page-->
        @yield('custom-js')
        <!-- End custom js for this page-->
</body>

</html>
