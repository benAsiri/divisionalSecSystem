
@extends('masterPage')

@section('content')
    {{--View Leave Employees Page--}}
    <section class="content-header">
        <h1>Search Loan Records</h1>
    </section>
    <br>

  <div class="col-lg-pull-1">
        <div class="col-lg-12">
            <a href="{{ url('DownloadLoanReport') }}">
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
                                <th>EMPLOYEE NIC </th>
                                <th>NAME</th>
                                <th>POSITION</th>
                                <th>GRADE</th>
                                <th>LOAN REQUESTED DATE</th>
                                <th>Request Letter</th>
                                <th>Special Notes</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($loans as $e)
                                <tr>
                                    <td>{{$e->id}}</td>
                                    <td>{{$e->Emp_Id}}</td>
                                    <td>{{$e->Emp_Name}}</td>
                                    <td>{{$e->Emp_Pos}}</td>
                                    <td>{{$e->Emp_Grade}}</td>
                                    <td>{{$e->Loan_request_date}}</td>
                                    <td>{{$e->Ldoc}}</td>
                                    <td>{{$e->Special_notes}}</td>
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