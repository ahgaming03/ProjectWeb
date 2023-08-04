@extends('admin.layout.frontend')

@section('plugin-css')
    <link rel="stylesheet" href="{{ asset('admjn/vendors/datatables.net-bs4/dataTables.bootstrap4.css') }}">
    <link rel="stylesheet" href="{{ asset('admjn/vendors/ti-icons/css/themify-icons.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admjn/js/select.dataTables.min.css') }}">
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h4 class="font-weight-bold mb-0">Hello, {{ session('adminName') }}</h4>
                        </div>
                        <div>
                            <button type="button" class="btn btn-primary btn-icon-text btn-rounded">
                                <i class="ti-clipboard btn-icon-prepend"></i>Report
                            </button>
                        </div>
                    </div>
                    <div>
                        Your profile:
                        <ul>
                            <li>
                                <span>
                                    <b>
                                        ID:
                                    </b>
                                    {{ $data->adminID }}
                                </span>
                            </li>
                            <li>
                                <span>
                                    <b>
                                        Email:
                                    </b>
                                    {{ $data->email }}
                                </span>
                            </li>
                            <li>
                                <span>
                                    <b>
                                        Address:
                                    </b>
                                    {{ $data->address }}
                                </span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('plugin-js')
    <script src="{{ asset('admjn/vendors/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('admjn/vendors/datatables.net/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('admjn/vendors/datatables.net-bs4/dataTables.bootstrap4.js') }}"></script>
    <script src="{{ asset('admjn/js/dataTables.select.min.js') }}"></script>
@endsection

@section('custom-js')
    <script src="{{ asset('admjn/js/dashboard.js') }}"></script>
    <script src="{{ asset('admjn/js/Chart.roundedBarCharts.js') }}"></script>
@endsection
