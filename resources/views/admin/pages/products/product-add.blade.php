@extends('admin.layout.frontend')

@section('content')
    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Add new product</h4>
                    @if (Session::has('success'))
                        <div class="alert alert-success" role="alert">
                            {{ Session::get('success') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                        </div>
                    @endif
                    <form class="forms-sample" method="POST" action={{ route('product-save') }}>
                        @csrf
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="id">Product ID:</label>
                                <input type="text" class="form-control form-control-sm" id="id"
                                    name="id"placeholder="Enter Product ID" name="id">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="mame">Name:</label>
                                <input type="text" class="form-control form-control-sm" id="name"
                                    placeholder="Enter Product Name" name="name">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-4">
                                <label for="price">Price:</label>
                                <input type="number" class="form-control" id="price" placeholder="Enter Product Price"
                                    name="price">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="category">Category:</label>
                                <select name="category" id="category" class="form-control">
                                    @foreach ($cat as $cats)
                                        <option value="{{ $cats->categoryID }}">{{ $cats->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="manufacturer">Manufacturer:</label>
                                <select name="manufacturer" id="manufacturer" class="form-control">
                                    @foreach ($manufacturers as $manufacturer)
                                        <option value="{{ $manufacturer->manufacturerID }}">{{ $manufacturer->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="stock">Stock:</label>
                                <input type="text" class="form-control form-control-sm" id="stock"
                                    placeholder="Enter Product stock" name="stock">
                            </div>
                            <div class="form-group col-md-12">
                                <label for="details">Details:</label>
                                <textarea class="form-control" style="color:Tomato" rows="8 12" id="details" placeholder="Enter Product Details"
                                    name="details"></textarea>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="image">Image:</label>
                                <input type="file" class="form-control" id="image" placeholder="Enter Product Image"
                                    name="image">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-outline-danger">Submit</button>
                        <a href="{{ url('admin/products/product-list/') }}" class="btn btn-outline-primary">Back</a>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
