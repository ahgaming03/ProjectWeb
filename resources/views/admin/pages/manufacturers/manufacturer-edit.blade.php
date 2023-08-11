@extends('admin.layout.frontend')
@section('content')
    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Add New Category</h4>
                        @if (Session::has('success'))
                            <div class="alert alert-success" role="alert">
                                {{ Session::get('success') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                            </div>
                        @endif
                        <form action="{{ route('category-save') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label for="id">Category ID:</label>
                                    <input type="text" class="form-control form-control-sm" id="id" 
                                    value="{{$manu->manufacturerID}}" name="id"placeholder="Enter Category ID"
                                        name="id">
                                </div>
                                <div class="form-group col-md-8">
                                    <label for="mame">Name:</label>
                                    <input type="text" class="form-control form-control-sm" id="name" 
                                    value="{{$manu->manufacturerName}}" placeholder="Enter Category Name" name="name">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="Logo">Logo:</label>
                                    <input type="file" class="form-control form-control-sm" id="logo" name="logo">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-outline-danger">Submit</button>
                            <a href="{{ url('admin/manufacturers/manufacturer-list/') }}" class="btn btn-outline-primary">Back</a>
                        </form>
                        <style>
                            .form-control{
                                font-size: 20px;
                            }
                        </style>
                </div>
            </div>
        </div>
    </div>
@endsection
