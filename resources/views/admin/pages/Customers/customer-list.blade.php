@extends('admin.layout.frontend')
@section('content')
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Customer List</h4>
                <div class="table-responsive">
                    <table class="table table-hover table-striped table-bordered table-info">
                        <thead>
                            <tr>
                                <th>Photo</th>
                                <th>CustomerID</th>
                                <th>Username</th>
                                <th>Address</th>
                                <th>Day of birth</th>
                                <th>Gender</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>Updated at</th>
                                <th>Created at</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($customers as $customer)
                            <tr>
                                <td><img src="{{ asset('customer/images/uploads/faces/' . $customer->photo) }}"
                                        alt="photo">
                                </td>
                                <td>{{ $customer->customerID }}</td>
                                <td title="{{ $customer->firstName . ' ' . $customer->lastName }}">
                                    {{ Str::limit($customer->firstName . ' ' . $customer->lastName, 15, '...') }}</td>
                                <td title="{{ $customer->address }}">{{ Str::limit($customer->address, 15, '...') }}</td>
                                <td>{{ $customer->birthday }}</td>
                                <td>{{ $customer->gender == 1 ? 'Male' : 'Female' }}</td>
                                <td>{{ $customer->phoneNumber }}</td>
                                <td>{{ Str::limit($customer->email, 10, '...') }}</td>                                
                                <td>{{ $customer->updated_at }}</td>
                                <td>{{ $customer->created_at }}</td>
                                <td>
                                    <span>
                                  
                                        <!-- Button trigger modal delete -->
                                        <button type="button" title="Delete this account"
                                            class="btn btn-inverse-danger btn-sm" data-toggle="modal"
                                            data-target="#deleteModal{{ $customer->customerID }}"><i
                                                class="bi bi-trash-fill"></i></button> &nbsp;
                                    </span>
                                    <!-- Modal delete -->
                                    <div class="modal fade" id="deleteModal{{ $customer->customerID }}" tabindex="-1"
                                        aria-labelledby="deleteLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title" id="delete">Delete account</h4>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close"><span
                                                            aria-hidden="true">&times;</span></button>
                                                </div>
                                                <div class="modal-body">
                                                    Are you delete this account?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button"
                                                        class="btn btn-inverse-danger btn-rounded"
                                                        data-dismiss="modal">Cancel</button>
                                                    <a href="{{ url('admin/customer-delete/' . $customer->customerID) }}"
                                                        class="btn btn-inverse-success btn-rounded ">Delete</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>
@endsection