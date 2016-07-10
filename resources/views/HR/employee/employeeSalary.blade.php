@extends('masterPage')


@section('content_header')
    <h1>Add Salary Details</h1>
@endsection

@section('content')

    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Employee Details</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="employee-details" class="table table-bordered table-striped tr">
                        <thead>
                        <tr>
                            <th>NO</th>
                            <th>Full Name</th>
                            <th>NIC</th>
                            <th>Address</th>
                            <th>gender</th>
                            <th>Job Position</th>
                            <th>Job Grade</th>
                            <th>Date of Appointment</th>
                            <th>Appointment Number</th>
                            <th>Widow Number</th>

                        </tr>
                        </thead>
                        <tbody>
                        @foreach($employee as $emp)
                            <tr>
                                <td>{{$emp->id}}</td>
                                <td>{{$emp->fullname}}</td>
                                <td>{{$emp->id_num}}</td>
                                <td>{{$emp->address}}</td>
                                <td>{{$emp->gender}}</td>
                                <td>{{$emp->job_position}}</td>
                                <td>{{$emp->job_grade}}</td>
                                <td>{{$emp->date_of_appoint}}</td>
                                <td>{{$emp->appointment_no}}</td>
                                <td>{{$emp->widow_no}}</td>
                            </tr>
                        @endforeach
                        </tbody>

                    </table>


                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->

    </div><!-- /.row -->

    <div class="row">
        <!-- left column -->
        <div class="col-md-6">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Salary Information</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form role="form" method="POST" id="salary_form" action="#">
                    <input type="hidden" name="_token" required value="{{ csrf_token() }}">

                    <div class="box-body">
                        <div class="form-group">
                            <label for="name">Employee Name</label>
                            <input type="text" class="form-control" required readonly id="name"
                                   placeholder="Select Employee from table">
                        </div>
                        <div class="form-group">
                            <label for="nic">NIC Number</label>
                            <input type="text" class="form-control" required readonly id="nic"
                                   placeholder="Select Employee from table">
                        </div>
                        <div class="form-group">
                            <label for="nic">Basic Salary</label>
                            <input type="hidden" id="empid" class="form-control" required placeholder="">
                            <input type="text" id="salary" class="form-control" required placeholder="Enter the salary in LKR">
                        </div>
                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary insert">Enter Salary Details</button>
                    </div>
                </form>
            </div>
            <!-- /.box -->
        </div>
    </div>

@endsection
@section('js_ref')
    @parent

    <script type="text/javascript">

        $(document).ready(function () {
            var table = $("#employee-details").DataTable();

            $('#employee-details tbody').on('click', 'tr', function () {

                var data = table.row(this).data();
                $('#empid').val(data[0]);
                $('#name').val(data[1]);
                $('#nic').val(data[2]);

            });


            $('#salary_form').submit(function (e) {


//                if (form.valid()) {

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
//                    console.log( $("#empid").val());
//                    console.log( $('#salary').val());

                $.ajax({
                    url: '/AddSalary',
                    type: "post",
                    data: {

                        'empid':  $("#empid").val(),
                        'salary': $('#salary').val(),


                    },
                    success: function (data) {
                        // console.log(data);
                        //alert("Employee details Added");
                        //alert(data);
                        swal("Salary Details Added", "", "success");
                        $('#salary_form').trigger("reset");
                        //0alert()->success('tuiii','errr')->persistent("ok");

                    }
                });


//                }

                e.preventDefault();
            });


        });


    </script>
@stop