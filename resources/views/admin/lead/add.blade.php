@extends('layout.app')


@section('page_heading','Lead Database')
@section('content')

    <!-- Content Header (Page header) -->
    <!-- Main content -->
    <section class="content container-fluid">

        @include('admin.includes.notification')

        <div class="col-md-12">
            <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">General Elements</h3>
            </div>
            <!-- /.box-header -->
            <form role="form" action="{{ url('lead/add') }}" method="POST" >
                {{ csrf_field() }}
            <div class="box-body">

                    <!-- text input -->
                    <div class="col-md-6 left">

                        <div class="form-group">
                            <label>Name 1</label>
                            <input type="text" class="form-control" placeholder="Person Name" name="name1">
                        </div>

                        <div class="form-group">
                            <label>Name 2</label>
                            <input type="text" class="form-control" placeholder="Person Name" name="name2">
                        </div>


                        <div class="form-group">
                            <label>Company URL</label>
                            <input type="text" class="form-control" placeholder="Company Url" name="company_url" value="{{ old('company_url') }}" id="company_url">
                        </div>

                        <div class="form-group">
                            <label>Company Name</label>
                            <input type="text" class="form-control" placeholder="Company Name" name="company_name">
                        </div>

                        <div class="form-group">
                            <label>Country</label>
                            <input type="text" class="form-control" placeholder="Country" name="country">
                        </div>


                    </div>

                    <div class="col-md-6 right">

                        <div class="form-group">
                            <label>Contact No 1</label>
                            <input type="text" class="form-control" placeholder="Contact No 1" name="contact_no1">
                        </div>

                        <div class="form-group">
                            <label>Contact No 2</label>
                            <input type="text" class="form-control" placeholder="Contact No 2" name="contact_no2">
                        </div>

                        <div class="form-group">
                            <label>Email 1</label>
                            <input type="email" class="form-control" id="" placeholder="Enter Email 1" name="email1">
                        </div>

                        <div class="form-group">
                            <label>Email 2</label>
                            <input type="email" class="form-control" id="" placeholder="Enter Email 2" name="email2">
                        </div>

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

@section('script')
    $(document).on('blur','#company_url',function(){
            $.ajax({
                url:'checkurl',
                type:'GET',
                data:{'url':$(this).val()},
                success:function(e){
                    if(e>=1){
                        alert(e+" Record already exist");
                    }
                }
            });
    });
@endsection