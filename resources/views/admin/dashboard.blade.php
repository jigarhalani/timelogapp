


@extends('layout.app')


@section('page_heading','Dashboard')
@section('content')

    <!-- Content Header (Page header) -->
    <!-- Main content -->
    <section class="content container-fluid">

        @include('admin.includes.notification')

        <div class='row'>
            <div class='col-md-6'>
                <!-- Box -->
                <div class="box box-success">
                    <div class="box-header with-border">
                        <h3 class="box-title">Today Followups</h3>
                        <div class="box-tools pull-right">
                            <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                            <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped no-margin" id="todayfollowup">
                                <thead>
                                <tr>
                                    <th>Lead Name</th>
                                    <th>Time</th>
                                    <th>Notes</th>
                                    <th>Options</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($today as $task)
                                            <tr>
                                                <td><a href="{{ url('lead/edit/'.$task->lead->id) }}" title="Click to know more">{{ $task->lead->name1 }}</a></td>
                                                <td>{{ \Carbon\Carbon::parse($task->followup_time) }}</td>
                                                <td>
                                                    {{ $task->notes }}
                                                </td>
                                                <td>
                                                    <a href="{{ url('lead/followup/'.$task->lead->id) }}" title="See Followups"><i class="fa fa-line-chart"></i></a> &nbsp
                                                    <a href="#" title="Reschedule Followup" class="setfollowup" data-toggle="modal" data-target="#modal-default" data-followupid="{{ $task->id }}"> <i class="fa fa-clock-o "></i></a>
                                                </td>
                                            </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div><!-- /.box-body -->
                    <div class="box-footer">
                        {{--<form action='#'>
                            <input type='text' placeholder='New task' class='form-control input-sm' />
                        </form>--}}
                    </div><!-- /.box-footer-->
                </div><!-- /.box -->
            </div><!-- /.col -->
            <div class='col-md-6'>
                <!-- Box -->
                <div class="box box-warning">
                    <div class="box-header with-border">
                        <h3 class="box-title">Next Week Followups</h3>
                        <div class="box-tools pull-right">
                            <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                            <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped no-margin" id="nextweekfollowup">
                                <thead>
                                <tr>
                                    <th>Lead Name</th>
                                    <th>Time</th>
                                    <th>Notes</th>
                                    <th>Options</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($nextweek as $task)
                                    <tr>
                                        <td><a href="{{ url('lead/edit/'.$task->lead->id) }}" title="Click to know more">{{ $task->lead->name1 }}</a></td>
                                        <td>{{ \Carbon\Carbon::parse($task->followup_time) }}</td>
                                        <td>
                                            {{ $task->notes }}
                                        </td>
                                        <td>
                                            <a href="{{ url('lead/followup/'.$task->lead->id) }}" title="See Followups"><i class="fa fa-line-chart"></i></a> &nbsp
                                            <a href="#" title="Reschedule Followup" class="setfollowup" data-toggle="modal" data-target="#modal-default" data-followupid="{{ $task->id }}"> <i class="fa fa-clock-o "></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div><!-- /.col -->

        </div><!-- /.row -->

    </section>

    <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
            <form action="#" method="POST" id="followup_form">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Set follow up</h4>
                    </div>
                    <div class="modal-body">


                        <div class="form-group">

                            <span>Follow up with : <span id="m_name"></span></span>

                        </div>

                        <div class="form-group">
                            {{ csrf_field() }}
                            <input type="hidden" name="id" value="" id="m_lead_id">
                            <span>Date:</span>
                            <div class='input-group date' id='datepicker'>
                                <input type='text' class="form-control"  name="followup_time"/>
                                <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                            </div>
                        </div>
                        <div class="form-group">
                            <span>Notes</span>
                            <textarea class="form-control" rows="3" placeholder="Notes" name="notes"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal" id="close_model">Close</button>
                        <button type="button" class="btn btn-primary" id="model_save_changes">Save changes</button>
                    </div>
                </div>
            </form>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

@endsection

@section('script')
    $('#todayfollowup').DataTable();
    $('#nextweekfollowup').DataTable();
    $('#datepicker').datetimepicker();

    $(document).on('click','.setfollowup',function(){
            $("#m_name").html($(this).parents("tr").children("td:first").text());
            $("#m_lead_id").val($(this).data("followupid"));
    });

    $('#model_save_changes').click(function(){
    $.ajax({
        url: base_url+"/lead/reschedulefollowup/"+$("#m_lead_id").val(),
        data:$('#followup_form').serialize(),
        type:"POST",
        success: function(html){
                document.getElementById("followup_form").reset();
                $('#modal-default').modal('hide');
                location.reload();
        }
        });
    });

    $('#close_model').on('click',function(){
            document.getElementById("followup_form").reset();
            $('#modal-default').modal('hide');
    });


@endsection