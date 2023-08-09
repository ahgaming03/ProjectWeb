@extends('admin.layout.frontend')
@section('content')
    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Category List</h4>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Descriptions</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cat as $ncat)
                                <tr>
                                    <td>{{ $ncat->categoryID }}</td>
                                    <th>{{ $ncat->name }}</th>
                                    <th>{{ $ncat->descriptions }}</th>
                                    <td>
                                        <a href="{{ url('admin/categories/category-edit/') }}\{{ $ncat->categoryID }}" title="Edit this product"><i class="bi bi-pencil-fill"></i></a> &nbsp;
                                        <a href="{{ url('admin/categories/category-delete') }}\{{ $ncat->categoryID }}" title="Delete this product" onclick="return confirm('Are you sure delete this product?');"><i class="bi bi-trash-fill"></i></a> &nbsp;
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