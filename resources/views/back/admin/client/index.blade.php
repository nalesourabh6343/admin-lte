@extends('layouts.back.master')
@section('title')
    Client List
@endsection
@section('content')

    <body class="hold-transition sidebar-mini layout-fixed">
        <div class="wrapper">
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <div class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">

                        </div><!-- /.row -->
                    </div><!-- /.container-fluid -->
                </div>
                <!-- /.content-header -->
                <!-- Main content -->
                <section class="content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12">
                                @if (session('msg'))
                                    <div class="alert alert-success">
                                        {{ session('msg') }}
                                    </div>
                                @endif
                                <div class="card">
                                    <div class="card-header text-right">
                                        <h3 class="card-title text-bold">Client List</h3>
                                        <a href="/admin/client/create" class="btn mt-2 btn-primary btn-sm">Create
                                            Client</a>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-bordered" id="table_id" class="display">
                                                <thead>
                                                    <tr>
                                                        <th style="width: 10px">Sr.No</th>
                                                        <th>Client Image</th>
                                                        <th>Client Name</th>
                                                        <th>Edit</th>
                                                        <th>Status</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($client as $key => $list)
                                                        <tr>
                                                            <td> {{ $key + 1 }} </td>
                                                            <td>
                                                                <img width="50px" height="50px"
                                                                    src="{{ asset('uploads/client/' . $list->client_image) }}"
                                                                    alt="{{ $list->client_image }}">
                                                            </td>
                                                            <td> {{ $list->client_name }} </td>
                                                            <td><a href="edit/{{ $list->client_id }}"
                                                                    class="btn btn-success btn-sm">Edit</a></td>
                                                            @if ($list->client_status == 1)
                                                                <td><a href="/admin/client/status/0/{{ $list->client_id }}"
                                                                        class="badge bg-primary"> Active </a></td>
                                                            @else
                                                                <td><a href="/admin/client/status/1/{{ $list->client_id }}"
                                                                        class="badge bg-danger"> Inactive </a></td>
                                                            @endif
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <!-- /.card-body -->
                                    <!-- /.card -->
                                </div>
                            </div>
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.container-fluid -->
                </section>
            </div>
        </div>
    </body>
@endsection
