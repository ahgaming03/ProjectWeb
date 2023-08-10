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
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Logo</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($manu as $nmanu)
                                <tr>
                                    <td>{{ $nmanu->mamufucturerID }}</td>
                                    <th>{{ $nmanu->mamufucturerName }}</th>
                                    <th>{{ $nmanu->manufacturerlogo }}</th>
                                    <td>
                                        <a href="{{ url('admin/mamufucturers/mamufucturer-edit/') }}\{{ $nmanu->mamufucturerID }}" title="Edit this mamufucturer"><i class="bi bi-pencil-fill"></i></a> &nbsp;
                                        <a href="{{ url('admin/mamufucturers/mamufucturer-delete/') }}\{{ $nmanu->mamufucturerID }}" title="Delete this mamufucturer" onclick="return confirm('Are you sure delete this mamufucturer?');"><i class="bi bi-trash-fill"></i></a> &nbsp;
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
