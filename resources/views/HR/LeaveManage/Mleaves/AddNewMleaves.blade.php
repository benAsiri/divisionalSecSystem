@extends('masterPage')
@section('css_ref')
    @parent
@stop

@section('content')

    <div align="center" style="background:#CED2CD">
        <div class="model-dialog">
            <div class="small-box bg-yellow">
                <div class="inner">
                    <h3>Maternity Leaves</h3>
                    <p>Proceed with the Employees who submitted the Birth Certificate of the child</p>
                </div>
                <div class="icon">
                    <i class="ion ion-person-add"></i>
                </div>
            </div>
        </div>
    </div>
    <!-- Main row -->
    <div class="nav-tabs-custom">
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

                            <div id="showDiv">
                                <div class="checkbox">
                                    <label>
                                        <input name="chkMC" id="chkMC" type="checkbox"> Submitted the Medical Certificate
                                    </label>
                                </div>

                                <label for="#">Select Employee ID</label>
                                <select class="form-control" name="empIDload" id="empIDload">
                                    {{--loads the Emp details here from the DB--}}
                                    <option value="" disabled selected style="display: none;">Please Choose</option>
                                    @foreach($Ids as $e)
                                        <option value="{{$e->id_num}}">
                                            {{$e->id_num}}
                                        </option>
                                    @endforeach
                                </select>


                                <br>

                                <div class="form-group">
                                    <label for="#">Number of Child</label>
                                    <select class="form-control" name="noOfChild" id="noOfChild">
                                        <option value="" disabled selected style="display: none;">Please Choose</option>
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
                            </div>{{--End of Show Div--}}
                        </div>

                    </div>
                </div>

                <div class="modal-dialog" id="formButtons">
                    <div class="box-footer">
                        <input type="button" class="btn btn-primary insert" value="Submit">
                        <input type="button" class="btn btn-primary" value="DEMO Fill" onclick="Demo()">
                    </div>
                </div>
                <hr>

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
        $(document).ready(function () {

            $('#showDiv').hide();
            $('#formButtons').attr('disabled','true');

            $('#chkBC').click(function () {
                $('#showDiv').fadeToggle();
                $('#formButtons').attr('disabled','false');
            });

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
                        //pattern : "If there is no Birth certificate cannot Proceed "
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

                            console.log(e);
                            if(e.trim() =='true'){
                                swal("Matenery Leave Added", "", "success");
                            }
                            else
                            {
                                swal("Error!!!", "This persion already have leave ", "error");

                            }


                        },
                        error: function (e) {

                            swal("Error!!!", "Something horribly fucked up! please contact developers  ", "error");
                        }

                    })
                }
            });
        });

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