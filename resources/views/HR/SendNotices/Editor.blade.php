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

    <div align="center" style="background:#CED2CD" >
        <h1>NOTICES BROADCAST</h1>
    </div>
           <!-- Main row -->
            <div class="nav-tabs-custom">
                <!-- Tabs within a box -->
                <ul class="nav nav-tabs pull-right">
                    <li class="pull-left header" ><i class="fa fa-inbox"></i>Personal Details</li>
                </ul>

                <div class="tab-content no-padding">

                        <!-- form start -->
                            <form class="" id="form-add-employee" role="form" method="POST" action="{{url('/addNote')}}">
                                <input type="hidden" name="_token"  value="{{ csrf_token() }}">
                                <div class="box-body">
                                    <div class="col-md-12">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Select Letter Template Type</label>
                                                <select class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true">
                                                    <option selected="selected">Select Here</option>
                                                    <option>Land Notices</option>
                                                    <option>Land Notices</option>
                                                </select>
                                            </div>
                                            <input type="button" class="btn btn-primary customTemp" value="Add Custom Content">
                                            <hr>
                                        <div class="form-group">
                                                <label>Recepient</label>
                                                <select class="form-control select2 select2-hidden-accessible" multiple="" data-placeholder="Select a State" style="width: 100%;" tabindex="-1" aria-hidden="true">
                                                    <option>Asiri</option>
                                                    <option>Banuka</option>
                                                    <option>Cari</option>
                                                    <option>Dayan</option>
                                                    <option>Edna</option>
                                                    <option>Fan</option>
                                                    <option>Gayan</option>
                                                </select>
                                        </div><hr>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Senders Name</label>
                                            <input class="form-control" name="sname" id="sname"
                                                   placeholder="Enter Your Name" type="text">
                                        </div>
                                    <br>
                                </div>
                                </div>
                                <!-- /.box-body -->
                            </div>
                            </form>
                    <div class="box box-info">
                        <div id="summernote">Hello Summernote</div>
                    </div>

                    <div class="box-body">
                        <div class="col-md-12">
                            <div class="col-md-6">
                                <div class="form-group">

                                      <input type="button" class="btn btn-primary customTemp" value="Send">
                                </div>
                                </div>
                            </div>


                </div>
            </div>
            <!-- /.row (main row) -->


            @stop
            @section('js_ref')
                @parent


                <!-- include libraries(jQuery, bootstrap) -->
                <link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.css" rel="stylesheet">
                <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.js"></script>
                <script src="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.js"></script>

                <!-- include summernote css/js-->
                <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.2/summernote.css" rel="stylesheet">
                <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.2/summernote.js"></script>

                <script src="{{asset('/plugins/datepicker/bootstrap-datepicker.js')}}"></script>
                <script src="{{asset('/plugins/jqueryValidater/jquery.validate.min.js')}}"></script>
                <script src="{{asset('/plugins/jqueryValidater/additional-methods.min.js')}}"></script>
                <script src="{{asset('/plugins/select2/select2.full.min.js')}}"></script>


                <script>
                    $(function () {


                    });

                    $(document).ready(function() {
                        $('#summernote').summernote();
                    });
                    /**
                     * This ajax code has written to the onclick event of the insert button
                     * This method will submit the details of the form to the database
                     */
                    $(document).ready(function () {
                        $(".select2").select2(); //Initialize Select2 Elements


                        var form = $('#form-add-employee');
                        form.validate({
                            rules: {
                                surname: {
                                    required: true,

                                },

                                fullname: {
                                    required: true,

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
                                datepicker_doa:{
                                    required:true,
                                },
                                appNo:{
                                  required:true,
                                },
                                jobp:{
                                    required:true,
                                }


                            },

                            messages: {
                                surname: {
                                    required: "This field cannot be empty",
//                                    pattern: "Please enter characters only "
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
                                datepicker_doa:{
                                    required:"This field cannot be empty"
                                },
                                appNo:{
                                    required:"This field cannot be empty"
                                },
                                jobp:{
                                    required:"This field cannot be empty"
                                },


                            }
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
//                                        return back();
                                       //window.location="http://localhost:8000/AddEmployees";
                                    },
                                    error: function (e) {

                                    }

                                })

                            }
                        });
                    });


//                    function Demo(){
//
//                        $("#surname").val("DemoSurname");
//                        $("#fullname").val("DemoFullname");
//                        $("#nic").val("987654321V");
//                        $("#address").val("DemoAddress");
//                        $("#datepicker_dob").val("2016-01-01");
//                        $("#datepicker_doa").val("2016-01-01");
//                        $("#appNo").val("20001");
//                        $("#jobp").val("DemoJopPosition");
//                        $("#jobg").val("DemoGrade");
//                        $("#widowNo").val("50001");
//
//                    }
                </script>
@stop