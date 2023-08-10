@extends('admin.layout.frontend')
@section('content')
    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Add New Manufacturer</h4>
                    <div class="container mt-3" style="margin-top:20px">
                        @if (Session::has('success'))
                            <div class="alert alert-success" role="alert">
                                {{ Session::get('success') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                            </div>
                        @endif
                        <form action="{{ url('admin/manufacturer/manufacturer-save') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="id">Manufacturer ID:</label>
                                    <input type="text" class="form-control form-control-sm" id="id" name="id"placeholder="Enter Manufacturer ID"
                                        name="id">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="mame">Name:</label>
                                    <input type="text" class="form-control form-control-sm" id="name" placeholder="Enter Manufacturer Name" 
                                        name="name">
                                </div>
                            </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="Logo">Logo:</label>
                                    <input type="file" class="form-control form-control-sm" id="logo" placeholder="Enter Manufacturer Logo" 
                                        name="logo">
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
    </div>
@endsection
