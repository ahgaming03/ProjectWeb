@extends('admin.layout.frontend')
@section('content')
    <div class="row">
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
                                    <td>{{ $prol->name }}</td>
                                    <td>{{ $prol->price }}</td>
                                    <td>{{ $prol->details }}</td>
                                    <td>{{ $prol->image }}</td>
                                    <th>{{ $prol->categoryID }}</th>
                                    <td>{{ $prol->updated_at }}</td>
                                    <td>
                                        <a href="{{ url('productEdit') }}\{{ $prol->productID }}" title="Edit this product"><i
                                                class="bi bi-pencil-fill"></i></a> &nbsp;
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
@endsection
