@extends('masterPage')
@section('css_ref')
    @parent
@stop

@section('content')
    <style>
        .error {
            color: red;
            font-family: serif;
            border-color: red;
            border-width: 1px;
        }

    </style>

    <div align="center" style="background:#CED2CD">
        <div class="model-dialog">
            <div class="small-box bg-yellow">
                <div class="inner">
                    <h3>ADD LOAN REQUEST </h3>
                    <p>Proceed with the Loan Requesting Letter.</p>
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
            <form class="" id="form-add-loan" role="form" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="box-body">
                    <div class="modal-dialog">
                        <div class="form-group">

                            <label for="#">Select Employee ID</label>
                            <select class="form-control" name="empIDload" onchange="fillEmpDetails()" id="empIDload">
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
                                <label>Name </label>
                                <input id="Lname" name="Lname" type="text" class="form-control" placeholder="Employee Name" >
                            </div>

                            <div class="form-group">
                                <label>Job Position </label>
                                <input id="Lposition" name="Lposition" type="text" class="form-control" placeholder="Employee Job Position" >
                            </div>

                            <div class="form-group">
                                <label>Job Grade </label>
                                <input id="Ljgrade" name="Ljgrade" type="text" class="form-control" placeholder="Employee Job Grade" >
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Loan Request Date</label>
                                <!-- Date dd/mm/yyyy -->
                                <div class="form-group">
                                    <div class="input-group date">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                        <input type="text" class="form-control pull-right"
                                               id="datepicker_LoanReqDate" name="datepicker_LoanReqDate"
                                               placeholder="Select the date">
                                    </div>
                                    <!-- /.input group -->
                                </div>
                            </div>
                            <br>

                            <div class="form-group">
                                <label>Add Letter Of Request</label>
                                <input id="Lfile" name="Lfile" type="file" class="form-control">
                            </div>

                            <div class="form-group">
                                <label>Add Special Notes</label>
                                <textarea id="Lnotes" name="Lnotes" class="form-control" rows="2" placeholder="Add Notes here (optional) "></textarea>
                            </div>

                            <div class="form-group">
                                <label>Loan Request Status</label>
                                <input id="Lstatus" name="Lstatus" type="text" class="form-control" placeholder="Ready" disabled="">
                            </div>

                        </div>

                    </div>
                </div>

                <div class="modal-dialog" id="formButtons">
                    <div class="box-footer">
                        <input type="submit" class="btn btn-primary insert" value="Submit">
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


            var form = $('#form-add-loan');
            form.validate({
                rules: {

                    empIDload: {
                        required: true,
                    },

                    datepicker_LoanReqDate: {
                        required: true,

                    },

                    Lfile: {
                        required: true,
                        extension: "docx"
//

                    },
                },

                messages: {
                    empIDload: {
                        required: "Select Your ID",
                    },
                    datepicker_LoanReqDate: {
                        required: "Select Correct Date",
                        pattern: "Selected Date Incorrect...Please Reselect"
                    },

                    Lfile: {
                        required: "Add A File",
                        extension: "Please Select Correct File Type Ex: *.doc/ *.docx"

                    },
                }
            });


            $('#datepicker_LoanReqDate').datepicker({
                format: 'yyyy-mm-dd',
                autoclose: true,
                startDate:new Date(),
            });


            $('#form-add-loan').submit(function (e) {
                e.preventDefault();

                var loanRequestForm = new FormData(this);
                //console.log(loanRequestForm.getAll());
                // Display the key/value pairs
                for(var pair of loanRequestForm.entries()) {
                    console.log(pair[0]+ ', '+ pair[1]);
                }

                if (form.valid()) {

                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });


                    $.ajax({
                        url: 'AddLoanDetails',
                        type: "post",
                        processData: false,
                        contentType: false,
                        data:loanRequestForm,

                        success: function (e) {
                            swal("Loan Details Added", "", "success");
                            //return redirectback();
                        },
                        error: function (e) {
                            swal("Error!!!", "", "error");
                            console.log(e);
                        }
                    })
                }
            });
        });



        function fillEmpDetails(){
            console.log($('#empIDload'));
            $.ajax({
                url: 'loadLoadDetails',
                type: "get",
                data: {
                    id_num : $('#empIDload').val()
                },
                success: function (e) {
                    console.log(e);
                    var data = e[0];
                    $("#Lname").val(data.fullname);
                    $("#Lposition").val(data.job_position);
                    $("#Ljgrade").val(data.job_grade);
                },
                error: function (e) {
                    swal("Error!!!", "", "error");
                    console.log(e);
                }
            })
        }




        function Demo() {

            $("#empIDload").val("931452280v");
            $("#Lname").val("Saman Kumara");
            $("#Lposition").val("Cleark");
            $("#Ljgrade").val("D");
            $("#datepicker_LoanReqDate").val("01/05/2016");
            $("#Lfile").val(true);
            $("#Lnotes").val("Please Consider this Before PoyaDay");
        }

        function alert() {
            alert();
        }
    </script>
@stop