@extends('layouts.back.master')
@section('title')
    Update Training
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
                    <form action="/admin/training/update" method="post" enctype="multipart/form-data">
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
                                            <h3 class="card-title mt-1">Edit Training </h3>
                                            <a href="/admin/training/index" class="btn btn-success">Training List</a>
                                        </div>

                                        <!-- /.card-header -->
                                        <div class="card-body row">
                                            <div class="form-group col-sm-6">
                                                <label for="exampleInputEmail1">Training Name</label>
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fab fa-blogger"></i></span>
                                                    <input type="text" name="training_name" class="form-control"
                                                        id="exampleInputEmail1" value="{{ $training->training_name }}"
                                                        placeholder="Training Name" required>
                                                    @if ($errors->has('training_name'))
                                                        <span
                                                            class="text-danger">{{ $errors->first('training_name') }}</span>
                                                    @endif
                                                    <input type="hidden" name="training_id"
                                                        value="{{ $training->training_id }}">
                                                </div>
                                            </div>

                                            <div class="form-group col-sm-6">
                                                <label for="exampleInputFile">Training image</label>
                                                <div class="input-group">
                                                    <img src="{{ asset('uploads/training/' . $training->training_image) }}"
                                                        height="38" class="" width="60" alt="">
                                                    {{-- <img width="50px" height="50px"
                                                        src="{{ asset('uploads/training/' . $list->training_image) }}"
                                                        alt="{{ $list->training_image }}"> --}}

                                                    <div class="custom-file">
                                                        <div class="input-group-prepend">
                                                            <input type="file" name="training_image"
                                                                class="custom-file-input" id="exampleInputFile">
                                                            <label class="custom-file-label" for="exampleInputFile">Choose
                                                                file</label>
                                                            @if ($errors->has('training_image'))
                                                                <span
                                                                    class="text-danger">{{ $errors->first('training_image') }}</span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>




                                            <div class="form-group col-sm-12">
                                                <label for="exampleInputEmail1">Training Description</label>
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-user-edit"></i></span>
                                                    <textarea name="training_description" class="form-control">{{ $training->training_description }}</textarea>
                                                    {{-- <textarea name="training_description" class="form-control" id="summernote">{{ $training->training_description }}</textarea> --}}
                                                    @if ($errors->has('training_description'))
                                                        <span
                                                            class="text-danger">{{ $errors->first('training_description') }}</span>
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
