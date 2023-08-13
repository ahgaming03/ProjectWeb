@extends('admin.layout.frontend')

@section('content')
    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Edit Manufactrers</h4>
                    @if (Session::has('success'))
                        <div class="alert alert-success" role="alert">
                            {{ Session::get('success') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                        </div>
                    @endif
                    <form class="forms-sample" method="POST" action="{{ route('manufacturer-update') }}">
                        @csrf
                        <div class="row">
                            <div class="form-group col-md-4">
                                <label for="id">ID:</label>
                                <input type="text" class="form-control form-control-sm" id="id"
                                    value="{{ $manufacturers->manufacturerID }}"
                                    name="id"placeholder="Enter Category ID" name="id" readonly>
                            </div>
                            <div class="form-group col-md-8">
                                <label for="mame">Name:</label>
                                <input type="text" class="form-control form-control-sm" id="name"
                                    value="{{ $manufacturers->name }}" placeholder="Enter Category Name" name="name">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="descriptions">Descriptions:</label>
                            <textarea class="form-control" rows="5" id="descriptions" placeholder="Enter Category descriptions"
                                name="descriptions">{{ $manufacturers->descriptions }}</textarea>
                        </div>

                        <button type="submit" class="btn btn-outline-danger">Save</button>
                        <a href="{{ url('admin/manufacturers/manufacturer-list/') }}"
                            class="btn btn-outline-primary">Back</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
