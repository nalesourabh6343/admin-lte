@extends('layouts.back.master')
@section('title')
    Testimonil Create
@endsection

@section('content')
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">

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
                    <form action="/admin/testimonil/create" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-12">
                                    {{-- @error('cat_name')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror --}}
                                    <div class="card">
                                        <div class="card-header text-right">
                                            <h3 class="card-title mt-1 text-bold"> Testimonil Create</h3>
                                            <a href="/admin/testimonil/index" class="btn btn-success">Testimonil List</a>
                                        </div>

                                        <!-- /.card-header -->


                                        <div class="card-body row">
                                            <div class="form-group col-sm-6">
                                                <label for="exampleInputEmail1">Testimonil Name</label>
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fab fa-blogger"></i></span>
                                                    <input type="text" name="testimonil_name" class="form-control"
                                                        id="exampleInputEmail1" value="{{ old('testimonil_name') }}"
                                                        placeholder="Testimonil Name" required>
                                                    @if ($errors->has('testimonil_name'))
                                                        <span
                                                            class="text-danger">{{ $errors->first('testimonil_name') }}</span>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="form-group col-sm-6">
                                                <label for="exampleInputFile">Testimonil image</label>
                                                <div class="input-group">
                                                    <div class="custom-file">
                                                        <div class="input-group-prepend">
                                                            <input type="file" name="testimonil_image"
                                                                class="custom-file-input" id="exampleInputFile" required>
                                                            <label class="custom-file-label" for="exampleInputFile">Choose
                                                                file</label>
                                                            @if ($errors->has('testimonil_image'))
                                                                <span
                                                                    class="text-danger">{{ $errors->first('testimonil_image') }}</span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group col-sm-12">
                                                <label for="exampleInputEmail1">Testimonil Description</label>
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-user-edit"></i></span>
                                                    <textarea name="testimonil_description" placeholder="Testimonil Description" class="form-control">{{ old('testimonil_description') }}</textarea>
                                                    @if ($errors->has('testimonil_description'))
                                                        <span
                                                            class="text-danger">{{ $errors->first('testimonil_description') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /.container-fluid -->
                                        <div class="text-center mb-3">
                                            <button type="submit" class="btn btn-success">Submit</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </section>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>

    </body>
@endsection
