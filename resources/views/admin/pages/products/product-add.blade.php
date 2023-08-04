@extends('admin.layout.frontend')
@section('content')
<<<<<<< HEAD
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
                                        <div class="container mt-3" style="margin-top:20px">
                                            @if (Session::has('success'))
                                                <div class="alert alert-success" role="alert">
                                                    {{Session::get('success')}}
                                                </div>
                                            @endif
                                            <form action="{{url('productsave')}}" method="POST">
                                                @csrf
                                                <div class="aID">
                                                    <div class="mb-3">
                                                        <label for="id">Product ID:</label>
                                                        <input type="text" class="form-control" id="id" placeholder="Enter Product ID" name="id">
                                                    </div>
                                                </div>
                                                <div class="aname">
                                                    <div class="mb-3">
                                                        <label for="name">Name:</label>
                                                        <input type="text" class="form-control" id="name" placeholder="Enter Product Name" name="name">
                                                    </div>
                                                </div>
                                                <div class="aprice">
                                                    <div class="mb-3">
                                                        <label for="price">Price:</label>
                                                        <input type="number" class="form-control" id="price" placeholder="Enter Product Price" name="price">
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="image">Image:</label>
                                                    <input style="color: DodgerBlue" type="file" class="form-control" id="image" placeholder="Enter Product Image" name="image">
                                                </div>
                                                <div class="mb-3 mt-3">
                                                    <label for="details">Details:</label>
                                                    <textarea style="color: Tomato" class="form-control" rows="5" id="details" placeholder="Enter Product Details" name="details"></textarea>
                                                </div>
                                                <div class="acat">
                                                    <div class="mb-3">
                                                        <label for="category">Category:</label>
                                                        <select name="category" id="category" class="form-control">
                                                            @foreach ($cat as $cat)
                                                            <option value="{{$cat->catID}}">{{$cat->catName}}</option>
                                                            @endforeach                    
                                                        </select>
                                                    </div>
                                                </div>
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                                <a href="{{url('produc-list')}}" class="btn btn-primary">Back</a>
                                            </form>
                                        </div>
                                        <style>
                                            .aID{
                                                width:40%;
                                            }
                                            .aname{
                                                width:40%;
                                                position: absolute;
                                                margin-top: -12%;
                                                margin-left: 40%;
                                            }
                                            .aprice{
                                                width:40%;
                                            }
                                            .acat{
                                                width:40%;
                                            }
                                        </style>
                                </div>
=======
    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Add new product</h4>
                    <div class="container mt-3" style="margin-top:20px">
                        @if (Session::has('success'))
                            <div class="alert alert-success" role="alert">
                                {{ Session::get('success') }}
>>>>>>> 62b6d88eca3268d6e9a1d633138110588108d1bb
                            </div>
                        @endif
                        <form action="{{ url('productsave') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="id">Product ID:</label>
                                <input type="text" class="form-control" id="id" placeholder="Enter Product ID"
                                    name="id">
                            </div>
                            <div class="mb-3">
                                <label for="name">Name:</label>
                                <input type="text" class="form-control" id="name" placeholder="Enter Product Name"
                                    name="name">
                            </div>
                            <div class="mb-3">
                                <label for="price">Price:</label>
                                <input type="number" class="form-control" id="price" placeholder="Enter Product Price"
                                    name="price">
                            </div>
                            <div class="mb-3">
                                <label for="image">Image:</label>
                                <input type="file" class="form-control" id="image" placeholder="Enter Product Image"
                                    name="image">
                            </div>
                            <div class="mb-3 mt-3">
                                <label for="details">Details:</label>
                                <textarea class="form-control" rows="5" id="details" placeholder="Enter Product Details" name="details"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="category">Category:</label>
                                <select name="category" id="category" class="form-control">
                                    @foreach ($cat as $cat)
                                        <option value="{{ $cat->catID }}">{{ $cat->catName }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <a href="{{ url('product-list') }}" class="btn btn-primary">Back</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
