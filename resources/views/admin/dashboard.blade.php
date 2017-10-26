


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

                        @foreach($today as $task)
                            <h5>
                                <b>Notes :</b>{{ $task->notes }}<br>
                                <b>Lead Name :</b> <a href="{{ url('lead/edit/'.$task->lead->id) }}" title="Click to know more">{{ $task->lead->name1 }}</a><br>
                                <b>Time :</b> {{ \Carbon\Carbon::parse($task->followup_time)->toTimeString() }}<br>
                                <a href="{{ url('lead/followup/'.$task->lead->id) }}">see followups</a>
                            </h5>
                            <div class="progress progress-xxs">
                                <div class="progress-bar progress-bar-primary" style="width: 95%"></div>
                            </div>
                        @endforeach

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
                        @foreach($nextweek as $task)
                            <h5>
                                <b>Notes :</b>{{ $task->notes }}<br>
                                <b>Lead Name :</b> <a href="{{ url('lead/edit/'.$task->lead->id) }}" title="Click to know more">{{ $task->lead->name1 }}</a><br>
                                <b>Time :</b> {{ \Carbon\Carbon::parse($task->followup_time)->toTimeString() }}<br>
                                <a href="{{ url('lead/followup/'.$task->lead->id) }}">see followups</a>
                            </h5>
                            <div class="progress progress-xxs">
                                <div class="progress-bar progress-bar-primary" style="width: 95%"></div>
                            </div>
                        @endforeach
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div><!-- /.col -->

        </div><!-- /.row -->

    </section>

@endsection