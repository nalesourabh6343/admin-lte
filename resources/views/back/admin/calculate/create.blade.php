@extends('layouts.back.master')
@section('title')
    Calculate Create
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

                    <form action="/admin/calculate/create" method="post" enctype="multipart/form-data" id="calculateForm">
                        @csrf
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-header text-right">
                                            <h3 class="card-title mt-1 text-bold"> Calculate</h3>
                                        </div>
                                        <!-- /.card-header -->
                                        {{-- Litter --}}
                                        <div class="card-body row">
                                            <div class="form-group col-sm-2">
                                                <label for="exampleInputEmail1">KM</label>
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fab fa-blogger"></i></span>
                                                    <input type="text" class="form-control" placeholder="KM"
                                                        id="kmInput" required>
                                                </div>
                                            </div>
                                            <div class="form-group col-sm-2">
                                                <label for="exampleInputEmail1">Avg</label>
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fab fa-blogger"></i></span>
                                                    <input type="text" class="form-control" placeholder="Avg"
                                                        id="avgInput" required>
                                                </div>
                                            </div>
                                            <div class="form-group col-sm-2">
                                                <label for="exampleInputEmail1">Total (Liters)</label>
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fab fa-blogger"></i></span>
                                                    <input type="text" class="form-control" placeholder="Total"
                                                        id="totalOutput" readonly>
                                                </div>
                                            </div>
                                            <div class="form-group col-sm-2">
                                                {{-- <label for="exampleInputEmail1">Total</label> --}}
                                                <div class="input-group-prepend">
                                                    <div class="text-center" style="margin-top: 32px">
                                                        <button type="button" class="btn btn-success"
                                                            onclick="calculateTotal()">Calculate Total Litter</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        ================================================================================================
                                        {{-- Rate --}}

                                        <div class="card-body row">
                                            <div class="form-group col-sm-2">
                                                <label for="exampleInputEmail1">KM</label>
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fab fa-blogger"></i></span>
                                                    <input type="text" class="form-control" placeholder="KM"
                                                        id="kmInput1" required>
                                                </div>
                                            </div>
                                            <div class="form-group col-sm-2">
                                                <label for="exampleInputEmail1">Rate</label>
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fab fa-blogger"></i></span>
                                                    <input type="text" class="form-control" placeholder="Rate"
                                                        id="rateInput1" required>
                                                </div>
                                            </div>
                                            <div class="form-group col-sm-2">
                                                <label for="exampleInputEmail1">Total (RS)</label>
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fab fa-blogger"></i></span>
                                                    <input type="text" class="form-control" placeholder="Total"
                                                        id="totalOutput1" readonly>
                                                </div>
                                            </div>
                                            <div class="form-group col-sm-2">
                                                <div class="input-group-prepend">
                                                    <div class="text-center" style="margin-top: 32px">
                                                        <button type="button" class="btn btn-success"
                                                            onclick="calculateTotal1()">Calculate Total Rate</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        ================================================================================================
                                        {{-- 1 KM Par Rate in (RS) --}}

                                        <div class="card-body row">
                                            <div class="form-group col-sm-2">
                                                <label for="exampleInputEmail1">Total Rs</label>
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fab fa-blogger"></i></span>
                                                    <input type="text" class="form-control" placeholder="KM"
                                                        id="kmInput2" required>
                                                </div>
                                            </div>
                                            <div class="form-group col-sm-2">
                                                <label for="exampleInputEmail1">Total KM</label>
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fab fa-blogger"></i></span>
                                                    <input type="text" class="form-control" placeholder="Rate"
                                                        id="rateInput2" required>
                                                </div>
                                            </div>
                                            <div class="form-group col-sm-2">
                                                <label for="exampleInputEmail1">1 KM Par Rate in (RS)</label>
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fab fa-blogger"></i></span>
                                                    <input type="text" class="form-control" placeholder="Total"
                                                        id="totalOutput2" readonly>
                                                </div>
                                            </div>
                                            <div class="form-group col-sm-2">
                                                <div class="input-group-prepend">
                                                    <div class="text-center" style="margin-top: 32px">
                                                        <button type="button" class="btn btn-success"
                                                            onclick="calculateTotal2()">Calculate 1 KM Rate</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        ================================================================================================
                                        {{-- Average --}}

                                        <div class="card-body row">
                                            <div class="form-group col-sm-2">
                                                <label for="exampleInputEmail1">KM</label>
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fab fa-blogger"></i></span>
                                                    <input type="text" class="form-control" placeholder="KM"
                                                        id="kmInput3" required>
                                                </div>
                                            </div>
                                            <div class="form-group col-sm-2">
                                                <label for="exampleInputEmail1">Litter</label>
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fab fa-blogger"></i></span>
                                                    <input type="text" class="form-control" placeholder="Rate"
                                                        id="rateInput3" required>
                                                </div>
                                            </div>
                                            <div class="form-group col-sm-2">
                                                <label for="exampleInputEmail1">Average</label>
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fab fa-blogger"></i></span>
                                                    <input type="text" class="form-control" placeholder="Total"
                                                        id="totalOutput3" readonly>
                                                </div>
                                            </div>
                                            <div class="form-group col-sm-2">
                                                <div class="input-group-prepend">
                                                    <div class="text-center" style="margin-top: 32px">
                                                        <button type="button" class="btn btn-success"
                                                            onclick="calculateTotal3()">Calculate Total Average</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        ================================================================================================
                                        {{-- Total Kilometer --}}

                                        <div class="card-body row">
                                            <div class="form-group col-sm-2">
                                                <label for="exampleInputEmail1">Litter</label>
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fab fa-blogger"></i></span>
                                                    <input type="text" class="form-control" placeholder="KM"
                                                        id="kmInput4" required>
                                                </div>
                                            </div>
                                            <div class="form-group col-sm-2">
                                                <label for="exampleInputEmail1">Average</label>
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fab fa-blogger"></i></span>
                                                    <input type="text" class="form-control" placeholder="Rate"
                                                        id="rateInput4" required>
                                                </div>
                                            </div>
                                            <div class="form-group col-sm-2">
                                                <label for="exampleInputEmail1">KM</label>
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fab fa-blogger"></i></span>
                                                    <input type="text" class="form-control" placeholder="Total"
                                                        id="totalOutput4" readonly>
                                                </div>
                                            </div>
                                            <div class="form-group col-sm-2">
                                                <div class="input-group-prepend">
                                                    <div class="text-center" style="margin-top: 32px">
                                                        <button type="button" class="btn btn-success"
                                                            onclick="calculateTotal4()">Calculate Total KM</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>

                </section>
            </div>
        </div>
        {{-- Litter --}}
        <script>
            function calculateTotal() {
                // Get values from input fields
                var km = parseFloat(document.getElementById("kmInput").value);
                var avg = parseFloat(document.getElementById("avgInput").value);

                // Calculate total and display it
                var total = km / avg;
                document.getElementById("totalOutput").value = total.toFixed(2) + " Liters";
            }
        </script>
        {{-- Rate --}}
        <script>
            function calculateTotal1() {
                // Get the values of KM and Rate
                var km = parseFloat(document.getElementById('kmInput1').value);
                var rate = parseFloat(document.getElementById('rateInput1').value);

                // Calculate the Total RS (Rupees)
                var totalRs = km * rate;

                // Update the Total (RS) input field
                document.getElementById('totalOutput1').value = totalRs.toFixed(2);
            }
        </script>
        {{-- 1 KM Par Rate in (RS) --}}
        <script>
            function calculateTotal2() {
                // Get the values of KM and Rate
                var km = parseFloat(document.getElementById('kmInput2').value);
                var rate = parseFloat(document.getElementById('rateInput2').value);

                // Calculate the Total RS (Rupees)
                var totalRs = km / rate;

                // Update the Total (RS) input field
                document.getElementById('totalOutput2').value = totalRs.toFixed(2);
            }
        </script>
        {{-- Average --}}
        <script>
            function calculateTotal3() {
                // Get the values of KM and Rate
                var km = parseFloat(document.getElementById('kmInput3').value);
                var rate = parseFloat(document.getElementById('rateInput3').value);

                // Calculate the Total RS (Rupees)
                var totalRs = km / rate;

                // Update the Total (RS) input field
                document.getElementById('totalOutput3').value = totalRs.toFixed(2);
            }
        </script>
        {{-- Total Kilometer --}}
        <script>
            function calculateTotal4() {
                // Get the values of KM and Rate
                var km = parseFloat(document.getElementById('kmInput4').value);
                var rate = parseFloat(document.getElementById('rateInput4').value);

                // Calculate the Total RS (Rupees)
                var totalRs = km * rate;

                // Update the Total (RS) input field
                document.getElementById('totalOutput4').value = totalRs.toFixed(2);
            }
        </script>

    </body>
@endsection
