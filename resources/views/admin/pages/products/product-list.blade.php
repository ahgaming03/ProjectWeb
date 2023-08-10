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
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Category</th>
                                <th>Manufacturer</th>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Stock</th>
                                <th>Details</th>
                                <th>Image</th>
                                <th>Last Update</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pro as $npro)
                                <tr>
                                    <td>{{ $npro->productID }}</td>
                                    <th>{{ $npro->categoryID }}</th>
                                    <th>{{ $npro->manufacturerID }}</th>
                                    <td>{{ $npro->name}}</td>
                                    <td>{{ $npro->price }}</td>
                                    <th>{{ $npro->stock }}</th>
                                    <td>{{ $npro->details }}</td>
                                    <td>{{ $npro->image }}</td>
                                    <td>{{ $npro->updated_at }}</td>
                                    <td>
                                        <a href="{{ url('admin/products/product-edit/') }}\{{ $npro->productID }}" title="Edit this product"><i class="bi bi-pencil-fill"></i></a> &nbsp;
                                        <a href="{{ url('admin/products/product-delete/') }}\{{ $npro->productID }}" title="Delete this product" onclick="return confirm('Are you sure delete this product?');"><i class="bi bi-trash-fill"></i></a> &nbsp;
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
