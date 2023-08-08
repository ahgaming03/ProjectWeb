@extends('admin.layout.frontend')
@section('content')
    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Add new product</h4>
                    <div class="container mt-3" style="margin-top:20px">
                        @if (Session::has('success'))
                            <div class="alert alert-success" role="alert">
                                {{ Session::get('success') }}
                            </div>
                        @endif
                        <form action="{{ url('productsave') }}" method="POST">
                            @csrf
                            <div class="aID">
                                <div class="mb-3">
                                    <label for="id">Product ID:</label>
                                    <input type="text" class="form-control" id="id" placeholder="Enter Product ID"
                                        name="id">
                                </div>
                            </div>
                            <div class="aName">
                                <div class="mb-3">
                                    <label for="name">Name:</label>
                                    <input type="text" class="form-control" id="name" placeholder="Enter Product Name"
                                        name="name">
                                </div>
                            </div>
                            <div class="aPrice">
                                <div class="mb-3">
                                    <label for="price">Price:</label>
                                    <input type="number" class="form-control" id="price" placeholder="Enter Product Price"
                                        name="price">
                                </div>
                            </div>
                            <div class="aCat">
                                <div class="mb-3">
                                    <label for="category">Category:</label>
                                    <select name="category" id="category" class="form-control">
                                        @foreach ($cat as $ncat)
                                            <option value="{{ $ncat->categoryID}}">{{ $ncat->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="aManu">
                                <div class="mb-3">
                                    <label for="Manufacturer">Manufacturer:</label>
                                    <input type="text" class="form-control" id="Manufacturer" placeholder="Enter Product Manufacturer"
                                        name="Manufacturer">
                                </div>
                            </div>
                            <div class="aImg">
                                <div class="mb-3">
                                    <label for="image">Image:</label>
                                    <input type="file" class="form-control" id="image" placeholder="Enter Product Image"
                                        name="image">
                                </div>
                            </div>
                            <div class="aDe">
                                <div class="aDetail">
                                    <div class="mb-3 mt-3">
                                        <label for="details">Details:</label>
                                        <textarea class="form-control" rows="5" id="details" placeholder="Enter Product Details" name="details"></textarea>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <a href="{{ url('admin/products/product-list/') }}" class="btn btn-primary">Back</a>
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
                            .aPrice{
                                width:35%;
                            }
                            .aPrice{
                                width:35%;
                            }
                            .aCat{
                                width:35%;
                            }
                            .aManu{
                                width:55%;
                                position: absolute;
                                margin: -369px 400px;
                            }
                            .aImg{
                                width:55%;
                                position: absolute;
                                margin: -276.5px 400px;
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
