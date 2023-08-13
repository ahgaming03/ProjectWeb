@extends('admin.layout.frontend')
@section('content')
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Mamufucturer list</h4>
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <a class="btn btn-inverse-success" href="{{ route('manufacturer-add') }}">
                                <i class="bi bi-plus-circle"></i> Add new manufacturer
                            </a>
                        </div>
                    </div>
                    <table class="table table-hover">
                        <thead class="thead-light">
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($manufacturer as $manufacturers)
                                <tr>
                                    <td>{{ $manufacturers->manufacturerID }}</td>
                                    <th>{{ $manufacturers->name }}</th>
                                    <th>{{ Str::limit($manufacturers->descriptions,  100, '...') }}</th>
                                    <td>
                                        <a href="{{ url('admin/manufacturers/manufacturer-edit/') }}\{{ $manufacturers->manufacturerID }}"
                                            title="Edit this manufacturer"><i class="bi bi-pencil-fill"></i></a> &nbsp;
                                        <a href="{{ url('admin/manufacturers/manufacturer-delete/') }}\{{ $manufacturers->manufacturerID }}"
                                            title="Delete this manufacturer"
                                            onclick="return confirm('Are you sure delete this manufacturer?');"><i
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
