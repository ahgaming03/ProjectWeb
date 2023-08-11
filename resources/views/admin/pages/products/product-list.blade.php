@extends('admin.layout.frontend')
@section('content')
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Product list</h4>
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <a class="btn btn-inverse-success" href="{{ route('product-add') }}">
                                <i class="bi bi-plus-circle"></i> Add new product
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
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead class="thead-light">
                                <tr>
                                    <th>ID</th>
                                    <th>Category</th>
                                    <th>Manufacturer</th>
                                    <th>Name</th>
                                    <th>Price</th>
                                    <th>Stock</th>
                                    <th>Details</th>
                                    <th>Image</th>
                                    <th>Creation Time</th>
                                    <th>Last Update</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pro as $pros)
                                    <tr>
                                        <td>{{ $pros->productID }}</td>
                                        <th>{{ $pros->categoryID }}</th>
                                        <th>{{ $pros->manufacturerID }}</th>
                                        <td>{{ $pros->name}}</td>
                                        <td>{{ number_format($pros->price) }}</td>
                                        <th>{{ $pros->stock }}</th>
                                        <td>{{ $pros->details }}</td>
                                        <td>
                                            <img src="images\{{$pros->productImage}}" alt="" 
                                            height="120px" width="120px">
                                        </td>
                                        <td>{{ $pros->created_at }}</td>
                                        <td>{{ $pros->updated_at }}</td>
                                        <td>
                                            <a href="{{ url('admin/products/product-edit/') }}\{{ $pros->productID }}" title="Edit this product" 
                                                class="btn btn-outline-primary btn-sm"><i class="bi bi-pencil-square"></i></a> &nbsp;
                                            <a href="{{ url('admin/products/product-delete/') }}\{{ $pros->productID }}" title="Delete this product" 
                                            onclick="return confirm('Are you sure delete this product?');"class="btn btn-outline-danger btn-sm"><i class="bi bi-trash3-fill"></i></a> &nbsp;
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
