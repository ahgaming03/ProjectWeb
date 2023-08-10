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
                            </div>
                        @endif
                        <form action="{{ url('categorysave') }}" method="POST">
                            @csrf
                            <div class="aID">
                                <div class="mb-3">
                                    <label for="id">Category ID:</label>
                                    <input type="text" class="form-control" id="id" placeholder="Enter Category ID"
                                        name="id">
                                </div>
                            </div>
                            <div class="aName">
                                <div class="mb-3">
                                    <label for="name">Name:</label>
                                    <input type="text" class="form-control" id="name" placeholder="Enter Category Name"
                                        name="name">
                                </div>
                            </div>
                            <div class="aDe">
                                <div class="aDetail">
                                    <div class="mb-3 mt-3">
                                        <label for="details">Logo:</label>
                                        <input type="file" class="form-control" id="logo" placeholder="Enter Manufacturer Logo"
                                        name="logo">
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <a href="{{ url('admin/categories/category-list/') }}" class="btn btn-primary">Back</a>
                        </form>
                        <style>
                            .form-control{
                                    color: #4169E1;
                                    font-size: 20px;
                            }
                            .aID{
                                width:35%;
                            }
                            .aName{
                                width:35%;
                            }
                            .aDe{
                                width:55%;
                                height:50%;
                                position: absolute;
                                margin: -200.5px 400px;
                                .form-control{
                                    color: tomato;
                                    font-size: 20px;
                                }
                            }
                        </style>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
