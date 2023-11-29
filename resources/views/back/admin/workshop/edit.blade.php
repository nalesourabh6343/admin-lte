@extends('layouts.back.master')
@section('title')
    Update Workshop
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
                    <form action="/admin/workshop/update" method="post" enctype="multipart/form-data">
                        @csrf
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
                                            <h3 class="card-title mt-1">Edit Workshop </h3>
                                            <a href="/admin/workshop/index" class="btn btn-success">Workshop List</a>
                                        </div>

                                        <!-- /.card-header -->
                                        <div class="card-body row">
                                            <div class="form-group col-sm-6">
                                                <label for="exampleInputEmail1">Workshop Name</label>
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fab fa-blogger"></i></span>
                                                    <input type="text" name="workshop_name" class="form-control"
                                                        id="exampleInputEmail1" value="{{ $workshop->workshop_name }}"
                                                        placeholder="Workshop Name" required>
                                                    @if ($errors->has('workshop_name'))
                                                        <span
                                                            class="text-danger">{{ $errors->first('workshop_name') }}</span>
                                                    @endif
                                                    <input type="hidden" name="workshop_id"
                                                        value="{{ $workshop->workshop_id }}">
                                                </div>
                                            </div>
                                            <div class="form-group col-sm-6">
                                                <label for="exampleInputFile">Workshop image</label>
                                                <div class="input-group">
                                                    <img src="{{ asset('uploads/workshop/' . $workshop->workshop_image) }}"
                                                        height="38" class="" width="60" alt="">
                                                    <div class="custom-file">
                                                        <div class="input-group-prepend">
                                                            <input type="file" name="workshop_image"
                                                                class="custom-file-input" id="exampleInputFile">
                                                            <label class="custom-file-label" for="exampleInputFile">Choose
                                                                file</label>
                                                            @if ($errors->has('workshop_image'))
                                                                <span
                                                                    class="text-danger">{{ $errors->first('workshop_image') }}</span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group col-sm-12">
                                                <label for="exampleInputEmail1">Workshop Description</label>
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-user-edit"></i></span>
                                                    <textarea name="workshop_description" class="form-control">{{ $workshop->workshop_description }}</textarea>
                                                    @if ($errors->has('workshop_description'))
                                                        <span
                                                            class="text-danger">{{ $errors->first('workshop_description') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /.container-fluid -->
                                        <div class="text-center mb-3">
                                            <button type="submit" class="btn btn-success">Update </button>
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

        <script>
            async function addData(key, value, route, idName) {
                try {
                    const name = document.getElementById(idName).value
                    if (!value || value == "" || value == null) {
                        return alert("This field is ")
                    }
                    const response = await axios.post(route, {
                        key: value
                    });
                    document.getElementById(idName).value = "";
                    console.log(response.data);
                    alert(response.data.message)
                } catch (error) {
                    console.log(error.response);
                }
            }
        </script>
    </body>
@endsection
