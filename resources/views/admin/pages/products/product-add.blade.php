<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>RoyalUI Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="../../vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="../../vendors/base/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- inject:css -->
    <link rel="stylesheet" href="../../css/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="../../images/favicon.png" />
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
                    <div class="row">
                        <div class="col-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Add new product</h4>
                                        @if (Session::has('success'))
                                        <div class="alert alert-success" role="alert">
                                            {{Session::get('success')}}
                                        </div>
                                        @endif
                                        <form action="{{url('product-save')}}" method="POST">
                                            @csrf
                                            <div class="mb-3 mt-3">
                                                <label for="id">Product ID:</label>
                                                <input type="text" class="form-control" id="id" 
                                                       placeholder="Enter product id" name="id">
                                            </div>
                                            <div class="mb-3 mt-3">
                                                <label for="id">Product Name:</label>
                                                <input type="text" class="form-control" id="name" 
                                                       placeholder="Enter product name" name="name">
                                            </div>
                                            <div class="mb-3 mt-3">
                                                <label for="id">Product ID:</label>
                                                <input type="text" class="form-control" id="id" 
                                                       placeholder="Enter product id" name="id">
                                            </div>
                                            <div class="mb-3 mt-3">
                                                <label for="id">Product Price:</label>
                                                <input type="text" class="form-control" id="price" 
                                                       placeholder="Enter product price" name="price">
                                            </div>
                                            <div class="mb-3 mt-3">
                                                <label for="id">Product ID:</label>
                                                <input type="text" class="form-control" id="id" 
                                                       placeholder="Enter product id" name="id">
                                            </div>
                                            <div class="mb-3">
                                                <label for="category">Category:</label>
                                                <select name="category" id="category" class="form-control">
                                                    @foreach ($category as $cat)
                                                    <option value="{{$cat->catID}}">{{$cat->catName}}</option>
                                                    @endforeach                    
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label for="image">Image:</label>
                                                <input type="file" class="form-control" id="image" 
                                                       placeholder="Enter product image" name="image">
                                            </div>
                                            <div class="mb-3 mt-3">
                                                <label for="details">Details:</label>
                                                <textarea class="form-control" rows="5" id="details" name="details"></textarea>
                                            </div>
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                            <a href="{{url('product-list')}}" class="btn btn-primary">Back</a>
                                        </form>
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
    <script src="../../vendors/base/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- inject:js -->
    <script src="../../js/off-canvas.js"></script>
    <script src="../../js/hoverable-collapse.js"></script>
    <script src="../../js/template.js"></script>
    <script src="../../js/todolist.js"></script>
    <!-- endinject -->
</body>

</html>
