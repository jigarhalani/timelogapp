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
                    <div class="box-body">
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
                                    <td>{{ $lead->name1 }} <br> {{ $lead->name2 }}</td>
                                    <td>{{ $lead->company_url }}</td>
                                    <td>{{ $lead->email1 }} <br> {{ $lead->email2 }}</td>
                                    <td>
                                        {{ $followup->followup_time }}
                                    </td>
                                    <td>
                                        {{ $followup->notes }}
                                    </td>
                                    <td>
                                        <a href="{{ url('lead/delete-followup/'.$followup->id) }}" title="Delete" onclick="return confirm('Want to delete?');"> <i class="fa fa-trash"></i></a>
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

    </section>

@endsection

@section('script')
    $('#leadtable').DataTable();
@endsection