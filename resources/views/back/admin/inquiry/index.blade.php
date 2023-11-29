@extends('layouts.back.master')
@section('title')
    Inquiry List
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
                                        <h3 class="card-title text-bold">Inquiry List</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-bordered" id="table_id" class="display">
                                                <thead>
                                                    <tr>
                                                        <th style="width: 10px">Sr.No</th>
                                                        <th>Name</th>
                                                        <th>Email</th>
                                                        <th>Phone</th>
                                                        <th>Subject</th>
                                                        <th>Message</th>
                                                        <th>Delete</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($inquiry as $key => $list)
                                                        <tr>
                                                            <td> {{ $key + 1 }} </td>
                                                            <td> {{ $list->inquiry_name }} </td>
                                                            <td> {{ $list->inquiry_email }} </td>
                                                            <td> {{ $list->inquiry_phone }} </td>
                                                            <td> {{ $list->inquiry_subject }} </td>
                                                            {{-- <td> {{ $list->inquiry_message }} </td> --}}
                                                            {{-- <td> {{ str_limit($list->inquiry_message, 100) }} </td> --}}
                                                            {{-- <td> {{ Str::limit($list->inquiry_message, 10) }} <a href="">read more</a> </td> --}}
                                                            <td>
                                                                @if (strlen($list->inquiry_message) > 50)
                                                                    <span
                                                                        class="truncated-text">{{ Str::limit($list->inquiry_message, 50) }}</span>
                                                                    <span class="full-text"
                                                                        style="display: none;">{{ $list->inquiry_message }}</span>
                                                                    <a href="#" class="read-more-link">Read more</a>
                                                                @else
                                                                    {{ $list->inquiry_message }}
                                                                @endif
                                                            </td>


                                                            <td><a href="/admin/inquiry/delete/{{ $list->inquiry_id }}"
                                                                    class="btn btn-danger btn-sm"> Delete </a></td>

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
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const truncatedText = document.querySelector(".truncated-text");
            const fullText = document.querySelector(".full-text");
            const readMoreLink = document.querySelector(".read-more-link");

            readMoreLink.addEventListener("click", function(event) {
                event.preventDefault();
                truncatedText.style.display = "none";
                fullText.style.display = "inline";
                readMoreLink.style.display = "none";
            });
        });
    </script>
@endsection
