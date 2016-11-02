@extends('masterPage')

@section('css_ref')
    @parent

    <link rel="stylesheet" href="{{asset('/plugins/datepicker/datepicker3.css')}}">
    <style>
        .error {
            color: red;
            font-family: verdana, Helvetica;
            border-color: red;
            border-width: 1px;
        }

    </style>
    <script>

    </script>
@stop

@section('content_header')
    <h1>Update Employee Details</h1>
@endsection

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                {{--<div class="box-header">--}}
                    {{--<h3 class="box-title">Hover Data Table</h3>--}}
                {{--</div>--}}
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped tr">
                        <thead>
                        <tr>
                            <th></th>
                            <th></th>
                            <th>NO</th>
                            <th>SurName</th>
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
                            <th>Age</th>

                        </tr>
                        </thead>
                        <tbody>


                        @foreach($employee as $emp)
                            <tr>
                                <td>

                                    <button id="btn-edit" title="Click! See Below fields & Edit ." class="btn btn-primary btn-xs">edit</button>

                                </td>
                                <td class="btn-delete-w">

                                </td>
                                <td class="emp_id">{{$emp->id}}</td>
                                <td>{{$emp->surname}}</td>
                                <td>{{$emp->fullname}}</td>
                                <td>{{$emp->id_num}}</td>
                                <td>{{$emp->address}}</td>
                                <td class="dob">{{$emp->dob}}</td>
                                <td>{{$emp->gender}}</td>
                                <td>{{$emp->marital_state}}</td>
                                <td>{{$emp->job_position}}</td>
                                <td>{{$emp->job_grade}}</td>
                                <td>{{$emp->date_of_appoint}}</td>
                                <td>{{$emp->appointment_no}}</td>
                                <td>{{$emp->widow_no}}</td>
                                <td>{{$emp->penssion_date}}</td>
                                <td class="age"></td>


                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>

                        </tfoot>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->

    </div><!-- /.row -->
    <!-- form start -->
    <form role="form" method="POST" id="update_info" action="{{action('HRController@UpdateEmployeeDetail')}}" >
        <input type="hidden" name="_token"  value="{{ csrf_token() }}">
        <div class="row">
            <div class="col-md-12">
                <!-- left column -->
                <div class="col-md-6">
                    <!-- general form elements -->
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Personal Details</h3>
                        </div>
                        <!-- /.box-header -->

                        <div class="box-body">
                            <div class="form-group">
                                <label for="surname">SurName</label>
                                <input class="form-control" name="surname" id="surname"
                                       placeholder="Enter surname" type="text">
                            </div>
                            <br>

                            <div class="form-group">
                                <label for="fullname">Full Name</label>
                                <input class="form-control" name="fullname" id="fullname"
                                       placeholder="Enter full name" type="text">
                            </div>
                            <br>

                            <div class="form-group">
                                <label for="exampleInputEmail1">NIC</label>
                                <input class="form-control" id="nic" name="nic"
                                       placeholder="Enter National Identitiy Card Number" type="nic">
                            </div>
                            <br>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Address</label>
                                <input class="form-control" id="address" name="address" placeholder="Enter Address"
                                       type="nic">
                            </div>
                            <br>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Date of Birth</label>
                                <!-- Date dd/mm/yyyy -->
                                <div class="form-group">
                                    <div class="input-group date">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                        <input type="text" class="form-control pull-right"
                                               id="datepicker_dob" name="datepicker_dob"
                                               placeholder="Select the date">
                                    </div>
                                    <!-- /.input group -->
                                </div>
                            </div>
                            <br>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Gender</label>
                                <select class="form-control" id="gender" name="gender">
                                    <option>Male</option>
                                    <option>Female</option>
                                    <option>Other</option>
                                </select>
                            </div>
                            <br>



                            <div class="form-group">
                                <label for="exampleInputEmail1">Marital status</label>

                                <select class="form-control" id="maritalState" name="maritalState">
                                    <option>Married</option>
                                    <option>Single</option>
                                </select>

                            </div>
                            <br>



                        </div>
                        <!-- /.box-body -->

                    </div>
                    <!-- /.box -->
                </div>
                <!-- /.col -->

                <div class="col-md-6">
                    <!-- general form elements -->
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Job Details</h3>
                        </div>
                        <br>
                        <!-- /.box-header -->
                        <!-- form start -->

                        <div class="box-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Date of
                                    Appointment</label>

                                <div class="form-group">
                                    <div class="input-group date">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                        <input type="text"
                                               class="form-control pull-right"
                                               id="datepicker_doa" name="datepicker_doa"
                                               placeholder="Select the date">
                                    </div>
                                    <!-- /.input group -->
                                </div>
                                <br>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Appointment
                                    Number</label>
                                <input class="form-control" id="appNo" name="appNo"
                                       placeholder="Enter Appointment number"
                                       type="nic">
                                <br>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Job Position</label>
                                <input class="form-control" id="jobp" name="jobp"
                                       placeholder="Write Here"
                                       type="nic">
                                <br>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Job Grade</label>
                                <input class="form-control" id="jobg" name="jobg"
                                       placeholder="Enter Grade if have" type="nic">
                                <br>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Widow Number</label>
                                <input class="form-control" id="widowNo" name="widowNo"
                                       placeholder="Enter if have"
                                       type="nic">
                                <br>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Pension Date</label>
                                <input type="hidden"  id="empid" name="empid" class="form-control" required placeholder="">
                            </div>
                            <br>
                            <br>
                        </div>
                        <!-- /.box-body -->


                    </div>
                    <!-- /.box -->
                </div>

                <div class="col-md-6">
                    <button type="submit"  id="submit" class="btn btn-primary col-md-5 pull-left btn-submit">Update Details</button>
                    <button type="reset" class="btn btn-warning col-md-5  pull-right  ">Reset</button>
                </div>

            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->


    </form>

@endsection
@section('js_ref')
    @parent
    <script src="{{asset('/plugins/datepicker/bootstrap-datepicker.js')}}"></script>
    <script src="{{asset('/plugins/jqueryValidater/jquery.validate.min.js')}}"></script>

    <script type="text/javascript">

        $(document).ready(function () {
           var table = $('#example1').DataTable({
                select: true,
                "order": [[0, "asc"]],
                "scrollY": "400px",
               "scrollX": "400px",
                "scrollCollapse": false,
                "paging": true,
                "bProcessing": true,
               "scrollX":true,

            });




//
//            $('.btn-submit').click(function(e){
//
//
//                //alert("ok");
//
//
//                swal("Employee Record updated", "", "success");
//            });

            //update_info
            $('#update_info').on('click', '#submit', function () {

//                var data = table.row($(this).parents('tr')).data();
//                setData(data);
                swal("Employee Record updated", "", "success");
                //return redirect();

            });



            $('#example1 tbody').on('click', '#btn-edit', function () {

                var data = table.row($(this).parents('tr')).data();
                setData(data);

            });




            $('#example1 tbody').on('click', '#btn-delete', function () {

                var data = table.row($(this).parents('tr')).data();
               // console.log(data[2]);


                swal({
                            title: "Are you sure?",
                            text: "You will not be able to recover this Data gain",
                            type: "warning",
                            showCancelButton: true,
                            confirmButtonColor: "#DD6B55",
                            confirmButtonText: "Yes, delete it!",
                            closeOnConfirm: false
                        },
                        function(){

                           var path = 'Delete/'+data[2];
                            console.log(path);
                            window.location.replace(path);
                            swal("Deleted!", "Your record has been deleted.", "success");

                        });

                setData(data);

            });


            table.rows().eq(0).each(function(i){
                 var d = $(table.row(i).node());
                 var today = (d.children('.dob').html().toString());
                 var age =  getAge(today);
                 d.children('.age').html(age);
                  if( age > 70 ){
                      d.children('.btn-delete-w').html(
                           '<button id="btn-delete"  class="btn btn-danger btn-xs">delete</button>'
                      );
                  }

            });

            $('#datepicker_doa').datepicker({
                format: 'yyyy-mm-dd',
                autoclose: true
            }).valid();


            $('#datepicker_dob').datepicker({
                // minDate: new Date(currentYear, currentMonth, currentDate),
                format: 'yyyy-mm-dd',
                autoclose: true,

            });


            function setData(data){
                $('#empid').val(data[2]);
                $('#surname').val(data[3]);
                $('#fullname').val(data[4]);
                $('#nic').val(data[5]);
                $('#address').val(data[6]);
                $('#datepicker_dob').val(data[7]);
                $('#gender').val(data[8]);
               // $('#race').val(data[9]);
                $('#maritalState').val(data[9]);
               // $('#district').val(data[11]);
                $('#datepicker_doa').val(data[12]);
                $('#appNo').val(data[13]);
                $('#jobp').val(data[10]);
                $('#jobg').val(data[11]);
                $('#widowNo').val(data[16]);
               // $('#fullname').val(data[3]);



            }





        });

        function getAge(date){

            var today = new Date();
            var dob = new Date(date);
            var age =((today - dob)/1000/60/60/24/365).toFixed(0);
            return age;

        }






    </script>
@stop