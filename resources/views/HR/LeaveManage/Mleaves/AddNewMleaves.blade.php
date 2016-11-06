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

    <div align="center" style="background:#CED2CD">
        <h1>MATERNITY LEAVES</h1>
    </div>
    <!-- Main row -->
    <div class="nav-tabs-custom">
        <!-- Tabs within a box -->
        <ul class="nav nav-tabs pull-center">
            <li class="pull-left header"><i class="fa fa-inbox"></i>Maternity Leaves for Employees</li>
        </ul>
        <div class="tab-content no-padding">

            <!-- form start -->
            <form class="" id="form-add-mleaves" role="form" method="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="box-body">
                    <div class="modal-dialog">
                        <div class="form-group">

                            <div class="checkbox">
                                <label>
                                    <input name="chkBC" id="chkBC" type="checkbox"> Submitted the Birth Certificate
                                </label>
                            </div>

                            <div class="checkbox">
                                <label>
                                    <input name="chkMC" id="chkMC" type="checkbox"> Submitted the Medical Certificate
                                </label>
                            </div>

                            <label for="#">Select Employee ID</label>
                            <select class="form-control" name="empIDload" id="empIDload">
                                {{--loads the Emp details here from the DB--}}
                                @foreach($Ids as $e)
                                    <option value="{{$e->id_num}}">
                                        {{$e->id_num}}
                                    </option>
                                @endforeach
                            </select>

                        </div>
                        <br>

                        <div class="form-group">
                            <label for="#">Number of Child</label>
                            <select class="form-control" name="noOfChild" id="noOfChild">
                                <option value="1">One Child Or No Child</option>
                                <option value="2">Two Children or More</option>
                            </select>
                        </div>
                        <br>

                        <div class="form-group">
                            <label>Reasons and Comments</label>
                            <textarea id="Reasons" name="Reasons" class="form-control" rows="3" placeholder="Enter ..."></textarea>
                        </div>

                        <div class="form-group">
                            <label>Leave Mode</label>
                            <input id="Lstatus" name="Lstatus" type="text" class="form-control" placeholder="ACTIVATED" disabled="">
                        </div>
                    </div>
                </div>

                <div class="modal-dialog">
                      <div class="box-footer">
                        <input type="button" class="btn btn-primary insert" value="Submit">
                        <input type="button" class="btn btn-primary" value="DEMO Fill" onclick="Demo()">
                    </div>
                </div>
                <hr>

                <div class="model-dialog">
                    <div class="small-box bg-yellow">
                        <div class="inner">
                            <h3>Learn More About Maternity Leaves</h3>
                            <br>
                            <p>The duration of maternity leave is 12 weeks (84 days) excluding weekly holidays,
                                Poya days and statutory holidays. Out of these 12 weeks, 02 weeks maternity
                                leave is before confinement (including the day of her confinement) and
                                10 weeks following the day of confinement.</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                        <a href="http://www.labourdept.gov.lk/index.php?option=com_content&view=article&id=69&Itemid=62&lang=en"
                           class="small-box-footer">
                            More info <i class="fa fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
            </form>

        </div>
        <!-- /.box-body -->
    </div>
    <!--</form>-->

    </div>
    </div>
    <!-- /.row (main row) -->


@stop
@section('js_ref')
    @parent


    <script src="{{asset('/plugins/datepicker/bootstrap-datepicker.js')}}"></script>
    <script src="{{asset('/plugins/jqueryValidater/jquery.validate.min.js')}}"></script>
    <script src="{{asset('/plugins/jqueryValidater/additional-methods.min.js')}}"></script>


    <script type="text/javascript" charset="utf8"
            src="http://cdn.datatables.net/1.10.10/js/jquery.dataTables.js"></script>

    <link rel="stylesheet" type="text/css"
          href="{{asset('plugins/jquery.datepick.package-5.0.1/jquery.datepick.css')}}">

    <script type="text/javascript" src="{{asset('plugins/jquery.datepick.package-5.0.1/jquery.plugin.js')}}"></script>

    <script type="text/javascript" src="{{asset('plugins/jquery.datepick.package-5.0.1/jquery.datepick.js')}}"></script>





    <script>

        /**
         * This ajax code has written to the onclick event of the insert button
         * This method will submit the details of the form to the database
         */
        $(document).ready(function () {

            var form = $('#form-add-mleaves');
            form.validate({
                rules: {
                    chkBC: {
                        required: true,

                    },

                    chkMC: {
                        required: true,

                    },
                    empIDload: {
                        required: true,
//                        pattern: /^[0-9]{9}[vV]$/
                    },
                    noOfChild: {
                        required: true,
                    },
                    Reasons: {
                        required: true,
                    }


                },

                messages: {
                    chkBC: {
                        required: "Check this Box",
//                      pattern : "If there is no Birth certificate cannot Proceed "
                    },
                    chkMC: {
                        required: "This field cannot be empty",
                    },
                    empIDload: {
                        required: "This field cannot be empty",
                        pattern: "NIC Number is not in correct Format...Please Correct"
                    },
                    noOfChild: {
                        required: "This field cannot be empty",
                    },
                    Reasons: {
                        required: "This field cannot be empty"
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
                        url: 'addMleavesDetails',
                        type: "post",
                        data: {

                            'Emp_Id': $("#empIDload").val(),
                            'chkMedicalCertificate': $('#chkBC').val(),
                            'chkChildBirthCertificate': $('#chkMC').val(),
                            'reason': $('#Reasons').val(),
                            'noOfChilds': $('#noOfChild').val(),
                            'status': 'Active',
                        },
                        success: function (e) {
                            swal("Matenery Leave Added", "", "success");
                            //return redirectback();

                        },
                        error: function (e) {
                            swal("Error!!!", "", "error");
                            console.log(e);
                        }

                    })

//                    console.log($("#empIDload").val())
//                    console.log($("#chkBC").val())
//                    console.log($("#chkMC").val())
//                    console.log($("#Reasons").val())
//                    console.log($("#noOfChild").val())
//                    console.log($("#Lstatus").val())
//

                }
            });
        })

        function Demo() {

            $("#empIDload").val("931452280v");
            $("#chkBC").val(true);
            $("#chkMC").val(true);
            $("#noOfChild").val("2");
            $("#Reasons").val("TEST");
            $("#Lstatus").val("Active");


        }

        function alert() {
            alert();
        }

    </script>
@stop