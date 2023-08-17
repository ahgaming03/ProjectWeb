@extends('admin.layout.frontend')

@section('plugin-css')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
@endsection

@section('custom-js')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
    </script>
    <script src="{{ asset('admjn/js/show-preview.js') }}"></script>
@endsection

@section('content')
    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Edit product</h4>
                    @if (Session::has('success'))
                        <div class="alert alert-success" role="alert">
                            {{ Session::get('success') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                        </div>
                    @endif
                    <form class="forms-sample" method="POST" action="{{ route('product-update') }}"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="productID">Product ID:</label>
                                <input type="text" class="form-control" id="id" value="{{ $pro->productID }}"
                                    readonly name="id">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="name">Name:</label>
                                <input type="text" class="form-control" id="name" value="{{ $pro->name }}"
                                    name="name">

                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-4">
                                <label for="price">Price:</label>
                                <input type="number" step="0.01" class="form-control" id="price"
                                    value="{{ $pro->price }}" name="price">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="category">Category:</label>
                                <select name="category" id="category" class="form-control">
                                    @foreach ($cat as $ncat)
                                        <option value="{{ $ncat->categoryID }}"
                                            {{ $ncat->categoryID == $pro->categoryID ? 'selected' : '' }}>
                                            {{ $ncat->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="manufacturer">Manufacturer:</label>
                                <select name="manufacturer" id="manufacturer" class="form-control">
                                    @foreach ($manufacturers as $manufacturer)
                                        <option value="{{ $manufacturer->manufacturerID }}"
                                            {{ $manufacturer->manufacturerID == $pro->manufacturerID ? 'selected' : '' }}>
                                            {{ $manufacturer->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="details">Details:</label>
                                <textarea class="form-control" style="color:Tomato" rows="8 12" id="details" placeholder="Enter Product Details"
                                    name="details">{{ $pro->details }}</textarea>
                            </div>
                            <div class="form-group col-md-4">
                                <label>Cover:</label>
                                <input type="file" name="cover" data-image-preview="imagePreview1"
                                    onchange="showPreview(this);"
                                    class="form-control  @error('cover') is-invalid @enderror">
                                @error('cover')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group col-md-4">
                                <label>Images:</label>
                                <input type="file" name="images[]" data-image-preview="imagePreview2"
                                    onchange="showPreview(this);"
                                    class="form-control  @error('images.*') is-invalid @enderror" multiple>
                                @error('images.*')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <button type="submit" class="btn btn-outline-danger">Submit</button>
                        <a href="{{ url('admin/products/product-list/') }}" class="btn btn-outline-primary">Back</a>
                    </form>
                </div>
                <div class="card-footer mt-2">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="card card-body">
                                <h5 class="card-title">Cover preview:</h5>
                                @if ($pro->cover)
                                    <div id="imagePreview1" class="image-preview">
                                        <form action="{{ route('delete-cover', [$pro->productID]) }}" method="POST">
                                            <button type="submit" class="btn btn-outline-danger btn-sm">
                                                <i class="bi bi-trash3-fill"></i>
                                            </button>
                                            @csrf
                                            @method('delete')
                                        </form>
                                        <img src="{{ asset('admjn/images/uploads/products/' . $pro->cover) }}"
                                            style="max-width: 200px; margin: 10px">
                                    </div>
                                @else
                                    <div id="imagePreview1" class="image-preview">
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-9">
                            <div class="card card-body">
                                <h5 class="card-title">Images preview:</h5>
                                <div id="imagePreview2" class="image-preview row">
                                    @foreach ($images as $image)
                                        <div class="col-md-3">
                                            <form action="{{ route('delete-image', [$image->imageID]) }}" method="POST">
                                                <button type="submit" class="btn btn-outline-danger btn-sm">
                                                    <i class="bi bi-trash3-fill"></i>
                                                </button>
                                                @csrf
                                                @method('delete')
                                            </form>
                                            <img src="{{ asset('admjn/images/uploads/products/' . $image->imageName) }}"
                                                style="max-width: 200px; margin: 10px">
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
