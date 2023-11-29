<!-- Input addon -->
@extends('layouts.back.master')
@section('title')
    Profile View
@endsection
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">

                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <form action="/admin/profile/updated" method="post">
            @csrf
         <div class="container ">
            <div class="col-md-12">
                <div class="card card-secondary">
                    <div class="card-header text-right">
                        <h3 class="card-title">Profile</h3>
                            <button class="btn btn-success"> Updated</button>
                    </div>
                    <div class="card-body">
                  <p>
                    Name:- <input type="text" name="name" value="{{Auth::user()->name; }}"> 
                  </p>
                  <input type="hidden" name="id" value="{{Auth::user()->id; }}">
                 
                    <p>Email ID :- <input type="text" name="email" value="{{Auth::user()->email;}}">
                        @error('email')
                        <strong class="text-danger">{{ $message }}</strong>
                        @enderror
                    </p>
                    <hr>
                    <p>Password :- <input type="text" name="password" ></p>
                    <hr>
                </div>
                </div>
            </div>
            </div>
        </form>
        </div>
        <!-- /.content -->
    </div>



    <!--/.col (left) -->
    </div>
    <!-- /.row -->
    </div>









    </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    </div>
@endsection
