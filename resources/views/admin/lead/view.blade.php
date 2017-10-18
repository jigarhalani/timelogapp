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
                                             <a href="{{ url('lead/delete/'.$lead->id) }}" title="Delete" onclick="return confirm('Want to delete?');"> <i class="fa fa-trash"></i></a>
                                             <a href="{{ url('lead/setmeeting/'.$lead->id) }}" title="Set meeting"> <i class="fa fa-clock-o "></i></a>
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

    </section>

@endsection

@section('script')
    $('#leadtable').DataTable();
@endsection