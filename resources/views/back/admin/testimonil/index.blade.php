@extends('layouts.back.master')
@section('title')
    Testimonil List
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
                                        <h3 class="card-title text-bold">Testimonil List</h3>
                                        <a href="/admin/testimonil/create" class="btn mt-2 btn-primary btn-sm">Create
                                            Testimonil</a>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-bordered" id="table_id" class="display">
                                                <thead>
                                                    <tr>
                                                        <th style="width: 10px">Sr.No</th>
                                                        <th>Testimonil Image</th>
                                                        <th>Testimonil Name</th>
                                                        {{-- <th>Discription</th> --}}
                                                        <th>View</th>
                                                        <th>Edit</th>
                                                        <th>Status</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($testimonil as $key => $list)
                                                        <tr>
                                                            <td> {{ $key + 1 }} </td>
                                                            <td>
                                                                <img width="50px" height="50px"
                                                                    src="{{ asset('uploads/testimonil/' . $list->testimonil_image) }}"
                                                                    alt="{{ $list->testimonil_image }}">
                                                            </td>
                                                            <td> {{ $list->testimonil_name }} </td>
                                                            {{-- <td> {!! $list->testimonil_description !!} </td> --}}
                                                            {{-- <td>
                                                                @if (strlen($list->testimonil_description) > 50)
                                                                    <div class="content">
                                                                        <span
                                                                            class="truncated-text">{{ Str::limit($list->testimonil_description, 50) }}</span>
                                                                        <span class="full-text"
                                                                            style="display: none;">{{ $list->testimonil_description }}</span>
                                                                    </div>
                                                                    <a href="#" class="read-more-link">Read more</a>
                                                                @else
                                                                    {{ $list->testimonil_description }}
                                                                @endif
                                                            </td> --}}
                                                            <td><a href="view/{{ $list->testimonil_id }}"
                                                                    class="btn btn-secondary btn-sm">View</a></td>
                                                            <td><a href="edit/{{ $list->testimonil_id }}"
                                                                    class="btn btn-success btn-sm">Edit</a></td>
                                                            @if ($list->testimonil_status == 1)
                                                                <td><a href="/admin/testimonil/status/0/{{ $list->testimonil_id }}"
                                                                        class="badge bg-primary"> Active </a></td>
                                                            @else
                                                                <td><a href="/admin/testimonil/status/1/{{ $list->testimonil_id }}"
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
    {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
    </script> --}}
@endsection
