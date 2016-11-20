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
    <h1>Update Marternity Details</h1>
@endsection

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped tr">
                        <thead>
                        <tr>
                            <th></th>
                            <th></th>
                            <th>NO</th>
                            <th>FEMALE EMPLOYEE NIC</th>
                            <th>MEDICAL CERTIFICATE</th>
                            <th>CHILD BIRTH CERTIFICATE</th>
                            <th>START LEAVE DATE</th>
                            <th>END LEAVE DATE</th>
                            <th>Reasons and Comments</th>
                            <th>Number of Childs</th>
                            <th>Status</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($mleaves as $e)
                            <tr>
                                <td>
                                    <button id="btn-edit" class="btn btn-primary btn-xs">EDIT</button>
                                </td>
                                <td>
                                    <button id="btn-delete" class="btn btn-primary btn-xs">DELETE</button>
                                </td>
                                <td>{{$e->id}}</td>
                                <td>{{$e->Emp_Id}}</td>
                                <td>{{$e->chkMedicalCertificate}}</td>
                                <td>{{$e->chkChildBirthCertificate}}</td>
                                <td>{{$e->StartLeaveDate}}</td>
                                <td>{{$e->EndLeaveDate}}</td>
                                <td>{{$e->reason}}</td>
                                <td>{{$e->noOfChilds}}</td>
                                <td>{{$e->status}}</td>
                                {{--@if($e-> status = '1'){--}}
                                {{--{{$e->status = "Accept" }}--}}
                                {{--}--}}
                                {{--@else{--}}
                                {{--{{$e->status = "Declined" }}--}}
                                {{--}--}}

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


    <!-- Main row -->
    <div class="nav-tabs-custom">
        <div class="tab-content no-padding">
            <div align="center" style="background:#CED2CD">
                <div class="model-dialog">
                    <div class="small-box bg-yellow">
                        <div class="inner">
                            <h3> Update Maternity Leaves</h3>
                        </div>
                        {{--<div class="icon">--}}
                        {{--<i class="ion ion-person-add"></i>--}}
                        {{--</div>--}}
                    </div>
                </div>
            </div>
            <!-- form start -->
            <form role="form" method="POST" id="update_info" action="{{action('MleavesController@UpdateMleavesDetails')}}">
                <input type="hidden" name="_token" value="{{ csrf_token()}}">
                <div class="row">
                    <div class="col-md-12">
                        <!-- left column -->
                        <div class="row">
                            <div class="col-md-6 col-md-offset-3">
                                <!-- general form elements -->
                                <div class="box box-primary">

                                    <!-- /.box-header -->

                                    <div class="box-body">
                                        <input type="hidden" id="index" name="index">
                                        <div class="form-group">
                                            <div class="checkbox">
                                                <label>
                                                    <input name="chkMC" id="chkMC" type="checkbox"> Medical Certificate
                                                </label>
                                            </div>
                                        </div>
                                        <br>

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Start Leave Date</label>
                                            <!-- Date dd/mm/yyyy -->
                                            <div class="form-group">
                                                <div class="input-group date">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-calendar"></i>
                                                    </div>
                                                    <input type="text" class="form-control pull-right"
                                                           id="datepicker_SLeaveDate" name="datepicker_SLeaveDate"
                                                           placeholder="Select the date">
                                                </div>
                                                <!-- /.input group -->
                                            </div>
                                        </div>
                                        <br>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">End Leave Date</label>
                                            <!-- Date dd/mm/yyyy -->
                                            <div class="form-group">
                                                <div class="input-group date">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-calendar"></i>
                                                    </div>
                                                    <input type="text" class="form-control pull-right"
                                                           id="datepicker_LeaveDate" name="datepicker_LeaveDate"
                                                           placeholder="Select the date">
                                                </div>
                                                <!-- /.input group -->
                                            </div>
                                        </div>

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
                                                    <textarea id="Reasons" name="Reasons" class="form-control" rows="3"
                                                              placeholder="Enter ..."></textarea>
                                        </div>
                                        <br>
                                        <div class="form-group">
                                            <label>Leave Mode</label>
                                            <select class="form-control" name="Lstatus" id="Lstatus">
                                                <option value="1">Approve</option>
                                                <option value="2">Declined</option>
                                            </select>
                                        </div>

                                    </div>
                                    <!-- /.box-body -->
                                    <div class="box-footer with-border">
                                        <input type="submit" id="submit" class="btn btn-primary col-md-5 pull-left btn-submit"
                                               value="Update Details">
                                        <button type="reset" class="btn btn-warning col-md-5  pull-right  ">Reset</button>
                                    </div>

                                </div>
                                <!-- /.box -->

                            </div>
                            <!-- /.col -->
                        </div>

                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->


            </form>
            </div>
        </div>

            @endsection
            @section('js_ref')
                @parent
                <script src="{{asset('/plugins/datepicker/bootstrap-datepicker.js')}}"></script>
                <script src="{{asset('/plugins/jqueryValidater/jquery.validate.min.js')}}"></script>

                <script type="text/javascript">

                    $(document).ready(function () {

                        var form = $('#update_info');
                        form.validate({
                            rules: {

                                chkMC: {
                                    required: true,
                                },

                                datepicker_SLeaveDate: {
                                    required: true,

                                },

                                datepicker_LeaveDate: {
                                    required: false,

                                },

                                noOfChild: {
                                    required: true,

                                },

                            },

                            messages: {
                                chkMC: {
                                    required: "Select Your ID",
                                },

                                datepicker_SLeaveDate: {
                                    required: "Select Correct Starting Leave Date",
                                    pattern: "Selected Date Incorrect...Please Reselect"
                                },


                                noOfChild: {
                                    required: "Select Number Of Children",
                                },
                            }
                        });


                        $('#datepicker_SLeaveDate').datepicker({
                            format: 'yyyy-mm-dd',
                            autoclose: true,
                            startDate:new Date(),
                        });



                        var table = $('#example1').DataTable({
                            select: true,
                            "order": [[0, "asc"]],
                            "scrollY": "400px",
                            "scrollX": "400px",
                            "scrollCollapse": false,
                            "paging": true,
                            "bProcessing": true,
                            "scrollX": true,

                        });

                        //update_info
                        $('#update_info').on('click', '#submit', function () {

                            swal("Employee Record updated", "", "success");
                            //return redirect();

                        });

                        $('#example1 tbody').on('click', '#btn-edit', function () {

                            var data = table.row($(this).parents('tr')).data();
                            setData(data);

                        });

                        $('#example1 tbody').on('click', '#btn-delete', function () {
                            var data = table.row($(this).parents('tr')).data();
                            swal({
                                        title: "Are you sure?",
                                        text: "You will not be able to recover this Data gain",
                                        type: "warning",
                                        showCancelButton: true,
                                        confirmButtonColor: "#DD6B55",
                                        confirmButtonText: "Yes, delete it!",
                                        closeOnConfirm: false
                                    },
                                    function () {

                                        var path = 'DeleteM';
                                        $.get(path,{id: data[2]})
                                                .done(function( data ) {
                                                    if(data)
                                                    {
                                                        window.location.reload(true);
                                                    }


                                                });
                                        swal("Deleted!", "Your record has been deleted.", "success");
                                    });
                        });

//        });//readyEND

                        $('#datepicker_LeaveDate').datepicker({
                            format: 'yyyy-mm-dd',
                            autoclose: true
                        }).valid();


                        $('#datepicker_SLeaveDate').datepicker({
                            // minDate: new Date(currentYear, currentMonth, currentDate),
                            format: 'yyyy-mm-dd',
                            autoclose: true,

                        });


                        function setData(data) {
                            console.log(data[5]);

                            if (data[5] == 'on') {
                                $('#chkMC').prop('checked', true);
                            } else {
                                $('#chkMC').prop('checked', false);
                            }

                            $('#index').val(data[2]);
                            $('#datepicker_SLeaveDate').val(data[6]);
                            $('#datepicker_LeaveDate').val(data[7]);
                            $('#noOfChild').val(data[9]);
                            $('#Reasons').val(data[8]);
                            $('#Lstatus').val(data[10]);
                        }
                    });
                </script>
@stop