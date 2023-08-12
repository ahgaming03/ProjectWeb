@extends('admin.layout.frontend')

@section('content')
    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Add new role</h4>
                    @if (Session::has('success'))
                        <div class="alert alert-success" role="alert">
                            {{ Session::get('success') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                        </div>
                    @endif
                    <form class="forms-sample" method="POST" action="{{ route('role-save') }}">
                        @csrf

                        <div class="form-group">
                            <label for="name">Name:</label>
                            <input type="text" class="form-control form-control-sm" id="name" name="name"
                                placeholder="name" value="{{ old('name') }}">
                            @error('name')
                                <div class="text-danger mt-1">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="description">description:</label>
                            <input type="text" class="form-control form-control-sm" id="description" name="description"
                                placeholder="Description" value="{{ old('description') }}">
                        </div>
                        <button type="submit" class="btn btn-inverse-success me-2">Add</button>
                        <a href="{{ route('role-list') }}" class="btn btn-inverse-danger">Cancel</a>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
