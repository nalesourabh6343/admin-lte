@extends('layouts.back.master')
@section('title')
    Consultancy List
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
                                        <h3 class="card-title text-bold">Consultancy List</h3>
                                        <a href="/admin/consultancy/create" class="btn mt-2 btn-primary btn-sm">Create
                                            Consultancy</a>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-bordered" id="table_id" class="display">
                                                <thead>
                                                    <tr>
                                                        <th style="width: 10px">Sr.No</th>
                                                        <th>Consultancy Image</th>
                                                        <th>Consultancy Name</th>
                                                        <th>Discription</th>
                                                        <th>Edit</th>
                                                        <th>Status</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($consultancy as $key => $list)
                                                        <tr>
                                                            <td> {{ $key + 1 }} </td>
                                                            <td>
                                                                <img width="50px" height="50px"
                                                                    src="{{ asset('uploads/consultancy/' . $list->consultancy_image) }}"
                                                                    alt="{{ $list->consultancy_image }}">
                                                            </td>
                                                            <td> {{ $list->consultancy_name }} </td>
                                                            {{-- <td> {{ $list->consultancy_description }} </td> --}}
                                                            <td>
                                                                @if (strlen($list->consultancy_description) > 50)
                                                                    <div class="content">
                                                                        <span
                                                                            class="truncated-text">{{ Str::limit($list->consultancy_description, 50) }}</span>
                                                                        <span class="full-text"
                                                                            style="display: none;">{{ $list->consultancy_description }}</span>
                                                                    </div>
                                                                    <a href="#" class="read-more-link">Read more</a>
                                                                @else
                                                                    {{ $list->consultancy_description }}
                                                                @endif
                                                            </td>
                                                            <td><a href="edit/{{ $list->consultancy_id }}"
                                                                    class="btn btn-success btn-sm">Edit</a></td>
                                                            @if ($list->consultancy_status == 1)
                                                                <td><a href="/admin/consultancy/status/0/{{ $list->consultancy_id }}"
                                                                        class="badge bg-primary"> Active </a></td>
                                                            @else
                                                                <td><a href="/admin/consultancy/status/1/{{ $list->consultancy_id }}"
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $(".read-more-link").click(function(event) {
                event.preventDefault();
                var content = $(this).prev(".content");
                var truncatedText = content.find(".truncated-text");
                var fullText = content.find(".full-text");

                if (truncatedText.is(":visible")) {
                    truncatedText.hide();
                    fullText.show();
                    $(this).text("Read less");
                } else {
                    truncatedText.show();
                    fullText.hide();
                    $(this).text("Read more");
                }
            });
        });
    </script>
@endsection
