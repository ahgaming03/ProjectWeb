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
                    @if (Session::has('error'))
                        <div class="alert alert-danger alert-dismissible" role="alert">
                            {{ Session::get('error') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                        </div>
                    @endif
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead class="thead-light">
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Category</th>
                                    <th>Manufacturer</th>
                                    <th>Price</th>
                                    <th>Creation Time</th>
                                    <th>Last Update</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pro as $pros)
                                    <tr>
                                        <td>{{ $pros->productID }}</td>
                                        <td>{{ Str::limit($pros->name, 50, '...') }}</td>
                                        <th>{{ $pros->categoryName }}</th>
                                        <th>{{ $pros->manufacturerName }}</th>
                                        <td>{{ number_format($pros->price, 2) }}</td>
                                        <td>{{ $pros->created_at }}</td>
                                        <td>{{ $pros->updated_at }}</td>
                                        <td>
                                            <a href="{{ url('admin/products/product-edit/') }}\{{ $pros->productID }}"
                                                title="Edit this product" class="btn btn-outline-primary btn-sm"><i
                                                    class="bi bi-pencil-square"></i></a> &nbsp;


                                            <!-- Button trigger modal delete -->
                                            <button type="button" title="Delete this product"
                                                class="btn btn-outline-danger btn-sm" data-toggle="modal"
                                                data-target="#deleteModal{{ $pros->productID }}"><i
                                                    class="bi bi-trash3-fill"></i></button> &nbsp;
                                            <!-- Modal delete -->
                                            <div class="modal fade" id="deleteModal{{ $pros->productID }}" tabindex="-1"
                                                aria-labelledby="deleteLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title" id="delete">Delete product</h4>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close"><span
                                                                    aria-hidden="true">&times;</span></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            Are you delete this product?
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button"
                                                                class="btn btn-inverse-danger btn-rounded"
                                                                data-dismiss="modal">Cancel</button>
                                                            <a href="{{ url('admin/products/product-delete/') }}\{{ $pros->productID }}"
                                                                class="btn btn-inverse-success btn-rounded ">Delete</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
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
