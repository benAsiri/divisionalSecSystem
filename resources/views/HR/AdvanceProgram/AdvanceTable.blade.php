@extends('masterPage')
@section('content')
    <section class="content-header"><h1>DIVISIONAL SECTRATARIANT SYSTEM </h1></section>

    <h3 style="text-align: center">ADVANCE PROGRAM DETAILS</h3>
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header" style="padding-top: 14px;padding-bottom: 0px">
                <div class="col-md-2"><h3 class="box-title" style="padding-top: 8px">Monthly Report</h3></div><div class="col-md-2"><a href="{{ url('generatePDF') }}"><button class="btn btn-block btn-warning"><i class="fa fa-file"></i>&nbsp;&nbsp;&nbsp;Generate Report</button></a></div>
            </div>
            <!-- /.box-header -->
            <div class="box-body" style="padding-top: 0px">
                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="box">
                                <div class="box-body">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                        <tr>
                                            <th>Employee ID</th>
                                            <th>Duty</th>
                                            <th>HandOver Date</th>
                                            <th>Approved Date</th>
                                            <th>Status</th>
                                            <th></th>
                                            <th></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($advance_pro as $ad_pro)
                                        <tr>
                                            <td>{{ $ad_pro->emp_id }}</td>
                                            <td>{{ $ad_pro->Duty }}</td>
                                            <td>{{ $ad_pro->handOverDate }}</td>
                                            <td>{{ $ad_pro->approvedDate }}</td>
                                            <td>{{ $ad_pro->Status }}</td>
                                            <td align="center"><a href={{url("ad_pro/". $ad_pro->id ."/edit") }}><button type="button" class="btn btn-warning">Edit</button></a></td>
                                            <td align="center"><a href={{url("ad_pro/". $ad_pro->id ."/delete") }}><button type="button" class="btn btn-danger">Delete</button></a></td>
                                        </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </section><!-- /.content -->
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
    </div>

@endsection