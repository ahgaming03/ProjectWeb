@extends('admin.layout.frontend')

@section('content')
    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Edit new product</h4>
                        @if (Session::has('success'))
                            <div class="alert alert-success" role="alert">
                                {{ Session::get('success') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                            </div>
                        @endif
                        <form class="forms-sample" action="{{ url('productSave') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="firstName">Product ID:</label>
                                    <input type="text" class="form-control" id="id" 
                                   value="{{$pro->productID}}" readonly name="id">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="firstName">Name:</label>
                                    <input type="text" class="form-control" id="name" 
                                   value="{{$pro->productName}}" name="name">
                                </div>
                            </div> 
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label for="price">Price:</label>
                                    <input type="number" class="form-control" id="price" 
                                    value="{{$pro->productPrice}}" name="price">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="category">Category:</label>
                                    <select name="category" id="category" class="form-control">
                                        @foreach ($cat as $ncat)
                                            <option value="{{ $ncat->categoryID}}">{{ $ncat->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="manufacturer">Manufacturer:</label>
                                    <select name="manufacturer" id="manufacturer" class="form-control">
                                        @foreach ($manufacturers as $manufacturer)
                                            <option value="{{ $manufacturer->manufacturerID}}">{{ $manufacturer->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="last_update">Last Update:</label>
                                    <input type="date" class="form-control" id="last_update" name="last_update">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="stock">Stock:</label>
                                    <input type="text" class="form-control form-control-sm" id="stock" placeholder="Enter Product stock" 
                                        name="stock">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="image">Image:</label>
                                    <input type="file" class="form-control" id="image" placeholder="Enter Product Image"
                                        name="image">
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="details">Details:</label>
                                    <textarea class="form-control" style="color:Tomato" rows="8 12" id="details" placeholder="Enter Product Details" name="details"></textarea>
                                </div>
                            </div>
                                    <button type="submit" class="btn btn-outline-danger">Submit</button>
                                    <a href="{{ url('admin/products/product-list/') }}" class="btn btn-outline-primary">Back</a>
                            <style>
                                .form-control{
                                    font-size:20px;
                                }
                            </style>
                        </form> 
                </div>
            </div>
        </div>
    </div>
@endsection
