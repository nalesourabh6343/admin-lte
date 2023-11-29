@extends('layouts.back.master')
@section('title')
    Admin Dashboard
@endsection
@section('content')
    <!-- Content Wrapper. Contains page content -->

    <div class="content-wrapper">
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid mb-3">

                @if (Session::has('msg'))
                    <div class="alert alert-success">
                        {{ Session::get('msg') }}
                    </div>
                @endif
                <!-- Main row -->
                <br>

                {{-- <div class="form-group col-sm-3">
                    <label for="exampleInputEmail1">Logged In</label>
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="nav-icon fas fa-user"></i>
                        </span>
                        <select name="training_name" class="form-control" id="exampleInputEmail1" required>
                            <option value="" selected disabled>Select User</option>
                            @foreach ($users as $user)
                            <option value="{{ $user->id }}" {{ $user->id == Auth::user()->id ? 'selected' : '' }}>
                                {{ $user->name }}
                            </option>
                            @endforeach
                            <!-- Add more options as needed -->
                        </select>
                    </div>
                </div> --}}
                
                <div class="col-lg-12 ">
                    <!-- small box -->
                    <div class="card-body">
                        <div class="small-box bg-primery ">
                            <div class="inner">
                                <h1>
                                    <center> Welcome To <strong>ADMIN LTE</strong> Admin Panel</center>
                                </h1>
                            </div>
                        </div>
                    </div>
                </div>
             
                
                <div class="container-fluid">
                    <!-- Small boxes (Stat box) -->
                    <div class="row">
                        <!-- ./col -->
                        <div class="col-lg-4 col-6">
                            <!-- small box -->
                            <div class="card-body">
                                <div class="small-box bg-info">
                                    <div class="inner">
                                        <h3>{{ $inquiry }}</h3>
                                        <p>Total Inquiry</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-bag"></i>
                                    </div>
                                    <a href="/admin/inquiey/index" class="small-box-footer">Read More <i
                                            class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                        </div>
                        <!-- ./col -->

                        <div class="col-lg-4 col-6">
                            <!-- small box -->
                            <div class="card-body">
                                <div class="small-box bg-success">
                                    <div class="inner">
                                        <h3>{{ $training }}</h3>
                                        <p>Total Training</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-bag"></i>
                                    </div>
                                    <a href="/admin/training/index" class="small-box-footer">Read More <i
                                            class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                        </div>


                        <div class="col-lg-4 col-6">
                            <!-- small box -->
                            <div class="card-body">
                                <div class="small-box bg-warning">
                                    <div class="inner">
                                        <h3>{{ $consultancy }}</h3>
                                        <p>Total Consultancy</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-bag"></i>
                                    </div>
                                    <a href="/admin/consultancy/index" class="small-box-footer">Read More <i
                                            class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-6">
                            <!-- small box -->
                            <div class="card-body">

                                <div class="small-box bg-primary">
                                    <div class="inner">
                                        <h3>{{ $workshop }}</h3>
                                        <p>Total Workshop</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-bag"></i>
                                    </div>
                                    <a href="/admin/workshop/index" class="small-box-footer">Read More <i
                                            class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-6">
                            <!-- small box -->
                            <div class="card-body">

                                <div class="small-box bg-success">
                                    <div class="inner">
                                        <h3>{{ $client }}</h3>
                                        <p>Total Client</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-bag"></i>
                                    </div>
                                    <a href="/admin/client/index" class="small-box-footer">Read More <i
                                            class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-6">
                            <!-- small box -->
                            <div class="card-body">

                                <div class="small-box bg-warning">
                                    <div class="inner">
                                        <h3>{{ $blog }}</h3>
                                        <p>Total Blog</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-bag"></i>
                                    </div>
                                    <a href="/admin/blog/index" class="small-box-footer">Read More <i
                                            class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                        </div>
                        <!-- ./col -->

                        <!-- ./col -->
                    </div>
                    <!-- /.row -->
                    <!-- Main row -->

                    <!-- /.row (main row) -->
                </div>

                <!-- /.row (main row) -->
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>

    <!-- /.content-wrapper -->
@endsection
