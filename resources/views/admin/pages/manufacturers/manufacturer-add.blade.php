@extends('admin.layout.frontend')
@section('content')
    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Add New Manufacturer</h4>
                    @if (Session::has('success'))
                        <div class="alert alert-success" role="alert">
                            {{ Session::get('success') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                        </div>
                    @endif
                    <form action="{{ route('manufacturer-save') }}" method="POST">
                        @csrf
                        <div class="form-group ">
                            <label for="mame">Name:</label>
                            <input type="text" class="form-control form-control-sm" id="name"
                                placeholder="Enter Manufacturer Name" name="name">
                        </div>
                        <div class="form-group">
                            <label for="descriptions">Descriptions:</label>
                            <textarea class="form-control" rows="5" id="descriptions" placeholder="Enter Category descriptions"
                                name="descriptions">{{ old('descriptions') }}</textarea>
                        </div>

                        <button type="submit" class="btn btn-outline-danger">Submit</button>
                        <a href="{{ url('admin/manufacturers/manufacturer-list/') }}"
                            class="btn btn-outline-primary">Back</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
