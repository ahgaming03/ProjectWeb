@extends('admin.layout.frontend')
@section('content')
    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Edit New Category</h4>
                        @if (Session::has('success'))
                            <div class="alert alert-success" role="alert">
                                {{ Session::get('success') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                            </div>
                        @endif
                        <form action="{{ url('categorysave') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label for="id">category ID:</label>
                                    <input type="text" class="form-control" id="id" 
                                   value="{{$cat->categoryID}}" readonly name="id">
                                </div>
                                <div class="form-group col-md-8">
                                    <label for="name">Name:</label>
                                    <input type="text" class="form-control" id="name" 
                                   value="{{$cat->categoryName}}" name="name">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="details">Descriptions:</label>
                                    <textarea class="form-control" rows="5" id="descriptions" placeholder="Enter Category descriptions" name="descriptions"></textarea>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-outline-danger">Submit</button>
                            <a href="{{ url('admin/products/product-list/') }}" class="btn btn-outline-primary">Back</a>
                            <style>
                                .form-control{
                                    font-size: 20px;
                                }
                            </style>
                        </form>
                </div>
            </div>
        </div>
    </div>
@endsection
