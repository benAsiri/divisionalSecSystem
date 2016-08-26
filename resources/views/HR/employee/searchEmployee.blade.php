@extends('masterPage')

@section('content')
{{--AddNew Employee Page--}}







        <section class="content-header">
            <h1>Search Employee Details</h1>
        </section>



<div class="pull-right">

    <div class="col-lg-12"><a href="{{ url('generatePDF_Emp') }}"><button class="btn btn-block btn-warning"><i class="fa fa-file">

            </i>Generate Report</button></a></div>
</div>

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
                            <th>Full Name</th>
                            <th>NIC</th>
                            <th>Address</th>
                            <th>DOB</th>
                            <th>gender</th>
                            <th>Marital State</th>
                            <th>Job Position</th>
                            <th>Job Grade</th>
                            <th>Date of Appointment</th>
                            <th>Appointment Number</th>
                            <th>Widow Number</th>
                            <th>Pension Date</th>

                        </tr>
                        </thead>
                        <tbody>
                        @foreach($employee as $emp)
                            <tr>
                                <td>{{$emp->id}}</td>
                                <td>{{$emp->fullname}}</td>
                                <td>{{$emp->id_num}}</td>
                                <td>{{$emp->address}}</td>
                                <td>{{$emp->dob}}</td>
                                <td>{{$emp->gender}}</td>
                                <td>{{$emp->marital_state}}</td>
                                <td>{{$emp->job_position}}</td>
                                <td>{{$emp->job_grade}}</td>
                                <td>{{$emp->date_of_appoint}}</td>
                                <td>{{$emp->appointment_no}}</td>
                                <td>{{$emp->widow_no}}</td>
                                <td>{{$emp->penssion_date}}</td>
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




        });

        $('#example1').on('click', function(){

            alert("BAM!");
        });









    </script>
    @stop