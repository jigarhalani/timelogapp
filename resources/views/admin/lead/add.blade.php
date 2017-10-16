@extends('layout.app')

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Lead Database
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Lead Database</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

        <div class="col-md-12">
            <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">General Elements</h3>
            </div>
            <!-- /.box-header -->
            <form role="form" action="{{ url('lead/add') }}" method="POST">

            <div class="box-body">

                    <!-- text input -->
                    <div class="form-group">
                        <label>Name 1</label>
                        <input type="text" class="form-control" placeholder="Person Name">
                    </div>

                    <div class="form-group">
                        <label>Name 2</label>
                        <input type="text" class="form-control" placeholder="Person Name">
                    </div>

                    <div class="form-group">
                        <label>Company URL</label>
                        <input type="text" class="form-control" placeholder="Company Url">
                    </div>

                    <div class="form-group">
                        <label>Company Name</label>
                        <input type="text" class="form-control" placeholder="Company Name">
                    </div>

                    <div class="form-group">
                        <label>Contact No 1</label>
                        <input type="text" class="form-control" placeholder="Contact No 1">
                    </div>

                    <div class="form-group">
                        <label>Contact No 2</label>
                        <input type="text" class="form-control" placeholder="Contact No 2">
                    </div>

                    <div class="form-group">
                        <label>Email 1</label>
                        <input type="email" class="form-control" id="" placeholder="Enter Email 1">
                    </div>

                    <div class="form-group">
                        <label>Email 2</label>
                        <input type="email" class="form-control" id="" placeholder="Enter Email 2">
                    </div>

            </div>

            <!-- /.box-body -->

             <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
             </div>
            </form>
        </div>
        </div>

    </section>

@endsection