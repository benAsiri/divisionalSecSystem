
@extends('masterPage')

@section('content')
    {{--View Leave Employees Page--}}
    <section class="content-header">
        <h1>Search Employee Details</h1>
    </section>
    <br>

    <div class="col-lg-pull-1">
        <div class="col-lg-12">
            <a href="{{ url('DownloadMateneryLeavesReport') }}">
                <button class="btn btn-block btn-warning"><i class="fa fa-file">
                    </i>Generate Report</button></a>
        </div>
    </div>

    <br>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-body" >
                        <table id="example1" class="table table-bordered table-striped tr" >
                            <thead>
                            <tr>
                                <th>NO</th>
                                <th>FEMALE EMPLOYEE NIC </th>
                                <th>MEDICAL CERTIFICATE</th>
                                <th>CHILD BIRTH CERTIFICATE</th>
                                <th>START LEAVE DATE</th>
                                <th>END LEAVE DATE</th>
                                <th>Reasons and Comments</th>
                                <th>Number of Childs</th>
                                <th>Status</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($mleaves as $e)
                                <tr>
                                    <td>{{$e->id}}</td>
                                    <td>{{$e->Emp_Id}}</td>
                                    <td>{{$e->chkMedicalCertificate}}</td>
                                    <td>{{$e->chkChildBirthCertificate}}</td>
                                    <td>{{$e->StartLeaveDate}}</td>
                                    <td>{{$e->EndLeaveDate}}</td>
                                    <td>{{$e->reason}}</td>
                                    <td>{{$e->noOfChilds}}</td>
                                    <td>{{$e->status}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>

                            </tfoot>
                        </table>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->

            </div>
        </div>
    </section>
@endsection
@section('js_ref')
    @parent

    <script type="text/javascript">

        //$("#example1").DataTable();

        $('#example1').DataTable({

            select:true,
            "order": [[0,"asc"]],
            "scrollY": "500px",
            "scrollX": "400px",
            "scrollCollapse": false,
            "paging"  : true,
            "bProcessing" :true,
            "scrollX":true,

        });

        $('#example1').on('click', function(){

            alert("BAM!");
        });

    </script>
@stop