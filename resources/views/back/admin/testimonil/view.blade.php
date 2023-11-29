@extends('layouts.back.master')
@section('title')
    View Testimonil
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
                                            <h3 class="card-title mt-1">View Testimonil </h3>
                                            <a href="/admin/testimonil/index" class="btn btn-success">Testimonil List</a>
                                        </div>

                                        <!-- /.card-header -->
                                        <div class="card-body row">
                                            <div class="form-group col-sm-6">
                                                <label for="exampleInputEmail1">Testimonil Name</label>
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fab fa-blogger"></i></span>
                                                    <input type="text" name="testimonil_name" class="form-control"
                                                        id="exampleInputEmail1" value="{{ $testimonil->testimonil_name }}"
                                                        placeholder="Testimonil Name" required>
                                                    @if ($errors->has('testimonil_name'))
                                                        <span
                                                            class="text-danger">{{ $errors->first('testimonil_name') }}</span>
                                                    @endif
                                                    <input type="hidden" name="testimonil_id"
                                                        value="{{ $testimonil->testimonil_id }}">
                                                </div>
                                            </div>

                                            <div class="form-group col-sm-6">
                                                <label for="exampleInputFile">Testimonil image</label>
                                                <div class="input-group">
                                                    <img src="{{ asset('uploads/testimonil/' . $testimonil->testimonil_image) }}"
                                                        height="38" class="" width="60" alt="">

                                                    <div class="custom-file">
                                                        <div class="input-group-prepend">
                                                            <input type="file" name="testimonil_image"
                                                                class="custom-file-input" id="exampleInputFile">
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
                                                    <textarea name="testimonil_description" id="summernote" class="form-control">{{ $testimonil->testimonil_description }}</textarea>
                                                    {{-- <textarea name="testimonil_description" class="form-control" id="summernote">{{ $testimonil->testimonil_description }}</textarea> --}}
                                                    @if ($errors->has('testimonil_description'))
                                                        <span
                                                            class="text-danger">{{ $errors->first('testimonil_description') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /.container-fluid -->
                                    </div>
                                </div>
                            </div>
                        </div>
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
