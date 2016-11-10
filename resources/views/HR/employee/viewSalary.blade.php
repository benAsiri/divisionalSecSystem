@extends('masterPage')

@section('content')
    {{--AddNew Employee Page--}}

    <style>
        .pdf-btn-wrapper{
            display: flex;
            justify-content: center;
        }
    </style>


    <div align="center" style="background:#CED2CD">
        <div class="model-dialog">
            <div class="small-box bg-yellow">
                <div class="inner">
                    <h3>View Salary Details</h3>
                    <p>You can search for salary details and get report
                </div>
                <div class="icon">
                    <i class="glyphicon glyphicon-download-alt"></i>
                </div>
            </div>
        </div>
    </div>



    <!-- Main content -->
    <section class="content">

        <div class="row pdf-btn-wrapper">
            <div class="col-sm-2 ">
                <a href="{{ url('generateSalaryPDF') }}">
                    <button class="btn btn-block btn-success">
                        <i class="fa fa-file"></i>&nbsp;&nbsp;&nbsp;&nbsp;Generate Report
                    </button>
                </a>
            </div>

        </div>

        <br>
        <div class="row">
            <div class="col-xs-12">

                <div class="box">

                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped tr">
                            <thead>
                            <tr>
                                <th>NO</th>
                                <th>Employee ID</th>
                                <th>Employee Name</th>
                                <th>NIC Number</th>
                                <th>Basic Salary(LKR)</th>


                            </tr>
                            </thead>
                            <tbody>
                            @foreach($salary as $sal)
                                <tr>
                                    <td>{{$sal->id}}</td>
                                    <td>{{$sal->emp_id}}</td>
                                    <td>{{$sal->fullname}}</td>
                                    <td>{{$sal->id_num}}</td>
                                    <td>{{$sal->basic_salary}}.00</td>


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


            select: true,
            "order": [[0, "asc"]],
            "scrollY": "500px",
            "scrollX": "400px",
            "scrollCollapse": false,
            "paging": true,
            "bProcessing": true,
            "scrollX": true,
            "columns": [
                { "width": "0.1%" },
                { "width": "0.1%" },
                { "width": "0.1%" },
                { "width": "0.1%" },
                { "width": "0.1%" }
            ]

        });

        $('#example1').on('click', function () {

            //alert("BAM!");
        });


    </script>
@stop