@extends('admin.layout.frontend')
@section('content')
    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Category List</h4>
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <a class="btn btn-inverse-success" href="{{ route('category-add') }}">
                                <i class="bi bi-plus-circle"></i> Add new category
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
                    <table class="table table-hover">
                        <thead class="thead-light">
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
                                    <th>{{ Str::limit($ncat->descriptions, 50, '...') }}</th>
                                    <td>
                                        <a href="{{ url('admin/categories/category-edit/') }}\{{ $ncat->categoryID }}"
                                            title="Edit this product"><i class="bi bi-pencil-fill"></i></a> &nbsp;
                                        <a href="{{ url('admin/categories/category-delete') }}\{{ $ncat->categoryID }}"
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
