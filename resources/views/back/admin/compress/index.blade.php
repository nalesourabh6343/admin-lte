@extends('layouts.back.master')
@section('title')
    Compress List
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
                                        <h3 class="card-title text-bold">Compress List</h3>
                                        <a href="/admin/compress/create" class="btn mt-2 btn-primary btn-sm">Create
                                            Compress</a>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-bordered" id="table_id" class="display">
                                                <thead>
                                                    <tr>
                                                        <th style="width: 10px">Sr.No</th>
                                                        <th>Compress Image</th>
                                                        <th>Compress Name</th>
                                                        <th>View</th>
                                                        <th>Edit</th>
                                                        <th>Status</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($compress as $key => $list)
                                                        <tr>
                                                            <td> {{ $key + 1 }} </td>
                                                            <td>
                                                                <a href="{{ asset($list->compress_image) }}"
                                                                    target="_blank">
                                                                    <img width="50px" height="50px"
                                                                        src="{{ asset($list->compress_image) }}"
                                                                        alt="{{ $list->compress_image }}">
                                                                </a>

                                                            </td>
                                                            <td> {{ $list->compress_name }} </td>
                                                            <td><a href="view/{{ $list->compress_id }}"
                                                                    class="btn btn-success btn-sm">View</a></td>
                                                            <td><a href="edit/{{ $list->compress_id }}"
                                                                    class="btn btn-success btn-sm">Edit</a></td>
                                                            @if ($list->compress_status == 1)
                                                                <td><a href="/admin/compress/status/0/{{ $list->compress_id }}"
                                                                        class="badge bg-primary"> Active </a></td>
                                                            @else
                                                                <td><a href="/admin/compress/status/1/{{ $list->compress_id }}"
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
