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
                        <div class="form-group">
                            <label for="mame">Name:</label>
                            <input type="text" class="form-control form-control-sm" id="name"
                                placeholder="Enter Category Name" name="name">
                        </div>
                        <div class="form-group">
                            <label for="details">Descriptions:</label>
                            <textarea class="form-control" rows="5" id="descriptions" placeholder="Enter Category descriptions"
                                name="descriptions"></textarea>
                        </div>
                        <button type="submit" class="btn btn-outline-danger">Submit</button>
                        <a href="{{ url('admin/categories/category-list/') }}" class="btn btn-outline-primary">Back</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
