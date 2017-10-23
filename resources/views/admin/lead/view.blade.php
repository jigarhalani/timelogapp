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
                    <h3 class="box-title">Data Table With Full Features</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="leadtable" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>CEO/Manager Name</th>
                            <th>Comapany Name</th>
                            <th>Comapany URL</th>
                            <th>Country</th>
                            <th>Emails</th>
                            <th>Contact No</th>
                            <th>Options</th>
                        </tr>
                        </thead>
                        <tbody>

                            @foreach($leads as $lead)
                                    <tr>
                                        <td>{{ $lead->name1 }} <br> {{ $lead->name2 }}</td>
                                        <td>{{ $lead->company_name }}</td>
                                        <td>{{ $lead->company_url }}</td>
                                        <td>{{ $lead->country }}</td>
                                        <td>{{ $lead->email1 }} <br> {{ $lead->email2 }}</td>
                                        <td>{{ $lead->contact_no1 }} <br> {{ $lead->contact_no2 }}</td>
                                        <td>
                                             <a href="{{ url('lead/edit/'.$lead->id) }}" title="Edit"> <i class="fa fa-edit"></i></a>
                                            @if(Request::is('lead/blocked'))
                                                <a href="{{ url('lead/activate/'.$lead->id) }}" title="Activate" onclick="return confirm('Want to activate?');"> <i class="fa fa-star"></i></a>
                                            @else
                                                <a href="{{ url('lead/delete/'.$lead->id) }}" title="Delete" onclick="return confirm('Want to delete?');"> <i class="fa fa-trash"></i></a>
                                                <a href="{{ url('lead/setmeeting/'.$lead->id) }}" title="Set meeting" data-toggle="modal" data-target="#modal-default"> <i class="fa fa-clock-o "></i></a>
                                            @endif
                                        </td>
                                    </tr>
                            @endforeach

                        </tbody>
                        <tfoot>
                        <tr>
                            <th>CEO/Manager Name</th>
                            <th>Comapany Name</th>
                            <th>Comapany URL</th>
                            <th>Country</th>
                            <th>Emails</th>
                            <th>Contact No</th>
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
                <form action="{{ url('lead/meeting') }}" method="POST">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">Set Meeting</h4>
                        </div>
                        <div class="modal-body">
                            <span>Meeting With : <span id="m_name"></span></span>
                            <input type="hidden" name="lead_id" value="" id="m_lead_id">
                            <div class="form-group">
                                <div class='input-group date' id='datetimepicker1'>
                                    <input type='text' class="form-control" />
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save changes</button>
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
    $('#datetimepicker1').datetimepicker();
@endsection