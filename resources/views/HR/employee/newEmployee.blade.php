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
@stop

@section('content')
    {{--AddNew Employee Page--}}


    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Add Employee </h1>
    </section>

    <!-- Main content -->
    {{--<section class="content">--}}
        <!-- Small boxes (Stat box) -->
        {{--<div class="row">--}}
            {{--<div class="col-lg-3 col-xs-6">--}}
                {{--<div class="col-lg-3 col-xs-6">--}}

                {{--</div>--}}
                {{--<!-- ./col -->--}}
            {{--</div>--}}
            <!-- /.row -->


            <!-- Main row -->
            <div class="nav-tabs-custom">
                <!-- Tabs within a box -->
                <ul class="nav nav-tabs pull-right">
                    <li class="pull-left header"><i class="fa fa-inbox"></i>Personal Details</li>
                </ul>

                <div class="tab-content no-padding">

                        {{--<div class="box-header with-border"></div>--}}
                        <!-- /.box-header -->

                        <!-- form start -->
                            <form class="" id="form-add-employee" role="form" method="POST"
                                action="{{url('/AddEmployeeDetails')}}">

                                <div class="box-body">

                                    <div class="col-md-12">
                                        <div class="col-md-6">


                                        <div class="form-group">
                                            <label for="exampleInputEmail1">SurName</label>
                                            <input class="form-control" name="surname" value="" id="surname" placeholder="Enter surname"
                                                type="text">
                                        </div>
                                        <br>

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Full Name</label>
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
                                        <input class="form-control" name="address" id="address" placeholder="Enter Address"
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
                                                    <input type="text" class="form-control pull-right" name="datepicker_dob"
                                                           id="datepicker_dob"
                                                           placeholder="Select the date">
                                                </div>
                                                <!-- /.input group -->
                                            </div>
                                    </div>
                                    <br>

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Gender</label>
                                        <select class="form-control" id="gender">
                                            <option>Male</option>
                                            <option>Female</option>
                                            <option>Other</option>
                                        </select>
                                    </div>
                                    <br>

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Race</label>
                                        <select class="form-control" id="race">
                                            <option>Sinhalese</option>
                                            <option>Sri Lankan Tamils</option>
                                            <option>Sri Lankan Malays</option>
                                            <option>Others</option>
                                        </select>
                                    </div>
                                    <br>

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Marital status</label>

                                        <select class="form-control" id="maritalState">
                                            <option>Married</option>
                                            <option>Single</option>
                                        </select>

                                    </div>
                                    <br>

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">District</label>

                                        <select class="form-control" id="district">
                                            <option>Ampara</option>
                                            <option>Anuradhapura</option>
                                            <option>Badulla</option>
                                            <option>Batticalo</option>
                                            <option>Colombo</option>
                                            <option>Galle</option>
                                            <option>Gampaha</option>
                                            <option>Hambantota</option>
                                            <option>Jaffna</option>
                                            <option>Kalutara</option>
                                            <option>Kandy</option>
                                            <option>Kegalle</option>
                                            <option>Kilinochchi</option>
                                            <option>Kurunegala</option>
                                            <option>Mannar</option>
                                            <option>Matale</option>
                                            <option>Matara</option>
                                            <option>Monaragala</option>
                                            <option>Mullaitivu</option>
                                            <option>Nuwara Eliya</option>
                                            <option>Polonnaruwa</option>
                                            <option>Puttalam</option>
                                            <option>Ratnapura</option>
                                            <option>Trincomalee</option>
                                            <option>Vavuniya</option>
                                        </select>

                                    </div>
                                    <br>
                                     </div>

                                        <div class="col-md-6">
                                            <div class="nav-tabs-custom">
                                                <!-- Tabs within a box -->
                                                <ul class="nav nav-tabs pull-right">
                                                    <li class="pull-left header"><i class="fa fa-inbox"></i>Job Details</li>
                                                </ul>
                                            </div>



                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Date of Appointment</label>

                                        <div class="form-group">
                                            <div class="input-group date">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-calendar"></i>
                                                </div>
                                                <input type="text" class="form-control pull-right"
                                                       id="datepicker_doa" name="datepicker_doa"
                                                       placeholder="Select the date">
                                            </div>
                                            <!-- /.input group -->
                                        </div>
                                    </div>
                                    <br>

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Appointment Number</label>
                                        <input class="form-control" id="appNo"
                                               placeholder="Enter Appointment number" type="nic">
                                    </div>
                                    <br>

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Job Position</label>
                                        <input class="form-control" id="jobp" placeholder="Write Here"
                                               type="nic">
                                    </div>
                                    <br>

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Job Grade</label>
                                        <input class="form-control" id="jobg" value=""
                                               placeholder="Enter Grade if have" type="nic">
                                    </div>
                                    <br>

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Widow Number</label>
                                        <input class="form-control" id="widowNo"
                                               placeholder="Enter if have"
                                               type="nic">
                                    </div>
                                    <br>

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Pension Date</label>
                                        <lable id="p_date"></lable>
                                    </div>


                                    <div class="box-footer ">
                                        <input type="submit" class="btn btn-primary insert" value="Submit">
                                    </div>
                                            <div class="box-footer ">
                                                <input type="button" class="btn btn-primary Demo" value="Demo" id="DemoFill">
                                            </div>

                                            </div>

                                </div>
                            </div>
                            <!-- /.box-body -->


                        </form>

                </div>
            </div>
            <!-- /.row (main row) -->


            @stop
            @section('js_ref')
                @parent


                <script src="{{asset('/plugins/datepicker/bootstrap-datepicker.js')}}"></script>
                <script src="{{asset('/plugins/jqueryValidater/jquery.validate.min.js')}}"></script>
                <script src="{{asset('/plugins/jqueryValidater/additional-methods.min.js')}}"></script>





                <script>
                    /**
                     * This ajax code has written to the onclick event of the insert button
                     * This method will submit the details of the form to the database
                     */
                    $(document).ready(function () {

                        var form = $('#form-add-employee');
                        form.validate({
                            rules: {
                                surname: {
                                    required: true,
                                    pattern: /^[A-z]+$/
                                },

                                fullname: {
                                    required: true,
                                    pattern: /^[A-z]+$/
                                },

                                nic: {
                                    required: true,
                                    pattern: /^[0-9]{9}[vV]$/
                                },
                                address: {
                                    required: true,
                                },
                                datepicker_dob: {
                                    required: true,
                                },


                            },

                            messages: {
                                surname: {
                                    required: "This field cannot be empty",
                                    pattern: "Please enter characters only "
                                },
                                fullname: {
                                    required: "This field cannot be empty",
                                    // minlength:"bith need min 10 chars"
                                },
                                nic: {
                                    required: "This field cannot be empty",
                                    pattern: "NIC Number is not in correct Format...Please Correct"
                                },
                                address: {
                                    required: "This field cannot be empty",
                                },
                                datepicker_dob: {
                                    required: "This field cannot be empty",
                                },


                            }
                        });


                        $('#datepicker_doa').datepicker({
                            format: 'yyyy-mm-dd',
                            autoclose: true,





                        }).valid();



                        $('#datepicker_dob').datepicker({
                            // minDate: new Date(currentYear, currentMonth, currentDate),
                            format: 'yyyy-mm-dd',
                            autoclose: true,




                        });



                        $('.insert').click(function (e) {


                            if (form.valid()) {

                                $.ajaxSetup({
                                    headers: {
                                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                    }
                                });


                                $.ajax({
                                    url: '/AddEmployeeDetails',
                                    type: "post",
                                    data: {
                                        'surname': $("#surname").val(),
                                        'fullname': $('#fullname').val(),
                                        'nic': $('#nic').val(),
                                        'address': $('#address').val(),
                                        'dob': $('#datepicker_dob').datepicker().val(),
                                        'gender': $('#gender').val(),
                                        'race': $('#race').val(),
                                        'maritals': $('#maritalState').val(),
                                        'district': $('#district').val(),
                                        'doa': $('#datepicker_doa').datepicker().val(),
                                        'appNo': $('#appNo').val(),
                                        'jobPos': $('#jobp').val(),
                                        'jobGrade': $('#jobg').val(),
                                        'widowNo': $('#widowNo').val(),
                                    },
                                    success: function (e) {
                                        swal("New Employee Added", "", "success");
                                    },
                                    error: function (e) {

                                    }

                                })

                            }
                        });
                    })




                </script>
@stop