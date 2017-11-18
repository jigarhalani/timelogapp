@extends('layout.app')


@section('page_heading','Lead Database')
@section('content')

    <!-- Content Header (Page header) -->
    <!-- Main content -->
    <section class="content container-fluid">

        @include('admin.includes.notification')
        <div class="row">
            <div class="col-xs-12">

                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">All Follow Up Details</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body table-responsive no-padding">
                        <table id="leadtable" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Lead Id</th>
                                <th>CEO/Manager Name</th>
                                <th>Comapany URL</th>
                                <th>Email</th>
                                <th>Follow Up Time</th>
                                <th>Notes</th>
                                <th>Options</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($lead->followup as $followup)
                                <tr >
                                    <td><a href="{{ url('lead/edit'.$lead->id) }}">{{ $lead->id }}</a></td>
                                    <td class="name">{{ $lead->name1 }} <br> {{ $lead->name2 }}</td>
                                    <td>{{ $lead->company_url }}</td>
                                    <td>{{ $lead->email1 }} <br> {{ $lead->email2 }}</td>
                                    <td class="time">
                                        {{ $followup->followup_time }}
                                    </td>
                                    <td class="notes">
                                        {{ $followup->notes }}
                                    </td>
                                    <td>
                                        <a href="{{ url('lead/delete-followup/'.$followup->id) }}" title="Delete" onclick="return confirm('Want to delete?');"> <i class="fa fa-trash"></i></a> &nbsp
                                        <a href="#" title="Reschedule Followup" class="setfollowup" data-toggle="modal" data-target="#modal-default" data-followupid="{{ $followup->id }}"> <i class="fa fa-clock-o "></i></a>
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                            <tfoot>
                            <tr>
                                <th>Lead Id</th>
                                <th>CEO/Manager Name</th>
                                <th>Comapany URL</th>
                                <th>Email</th>
                                <th>Follow Up Time</th>
                                <th>Notes</th>
                                <th>Options</th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>

            </div>
        </div>

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
                                    <input type='text' class="form-control"  name="followup_time" />
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                </div>
                            </div>
                            <div class="form-group">
                                <span>Notes</span>
                                <textarea class="form-control" rows="3" placeholder="Notes" name="notes" id="notes"></textarea>
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
    </section>

@endsection

@section('script')
    $('#leadtable').DataTable();

    $('#datepicker').datetimepicker();

    $(document).on('click','.setfollowup',function(){
        $("#m_name").html($(this).parents("tr").children(".name").text());
        $("#m_lead_id").val($(this).data("followupid"));
        $("#notes").val($(this).parents("tr").children(".notes").text().trim());
        $('#datepicker').data("DateTimePicker").date(moment($(this).parents("tr").children(".time").text()));
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