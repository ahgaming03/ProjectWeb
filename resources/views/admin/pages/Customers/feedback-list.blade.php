@extends('admin.layout.frontend')
@section('content')
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Feedback List</h4>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Feedback ID</th>
                                    <th>CustomerID</th>
                                    <th>ProductID</th>
                                    <th>Rating</th>
                                    <th>Comment</th>
                                    <th>Status</th>
                                    <th>Update at</th>
                                    <th>Create at</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($feedbacks as $fb)
                                    <tr>
                                        <td>{{ $fb->feedbackID }}</td>
                                        <td>{{ $fb->customerID }}</td>
                                        <td>{{ $fb->productID }}</td>
                                        <td>{{ $fb->rating }}</td>
                                        <td>{{ $fb->comment }}</td>
                                        <td>{{ $fb->is_status }}</td>
                                        <td>{{ $fb->update_at }}</td>
                                        <td>{{ $fb->create_at }}</td>
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
