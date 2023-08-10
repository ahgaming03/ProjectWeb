@extends('admin.layout.frontend')
@section('content')
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Edit New Category</h4>
                    @if (Session::has('success'))
                    <div class="alert alert-success" role="alert">
                        {{Session::get('success')}}
                    </div>
                @endif
                <form action="{{ url('categorySave') }}" method="POST">
                    @csrf
                    <div class="aID">
                        <div class="mb-3 mt-3">
                            <label for="id">Manufacturer ID:</label>
                            <input type="text" class="form-control" id="id" 
                                   value="{{$manu->manufacturerID}}" readonly name="id">
                        </div>
                    </div>
                    <div class="aName">
                        <div class="mb-3">
                            <label for="name">Name:</label>
                            <input type="text" class="form-control" id="name" 
                                   value="{{$manu->manufacturerName}}" name="name">
                        </div>
                    </div>
                    <div class="logo">
                        <div class="aDetail">
                            <div class="mb-3 mt-3">
                                <label for="image">Logo:</label>
                            <input type="file" class="form-control" id="image" placeholder="Enter manufacturer logo"
                                name="logo">
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a href="{{ url('admin/manufacturers/manufacturer-list/') }}" class="btn btn-primary">Back</a>
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
                    .logo{
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
@endsection