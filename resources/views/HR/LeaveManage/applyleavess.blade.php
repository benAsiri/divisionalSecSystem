@extends('masterPage')

@section('content')



    <div class="container">
        <div class="row">
            <div class="col-md-18 col-md-offset-0">
                <div class="panel panel-default">

                    <section class="panel panel-primary">
                        <div class="panel-heading">
                            <b>Employee Info</b>
                        </div>
                        <div class="panel-body">
                            <table id="tab" class="table table-hover table-bordered">
                                <thead>
                                <th>NIC</th>
                                <th>Position</th>
                                <th>Leave Type</th>
                                <th>Department</th>
                                <th>Commencing Leave</th>
                                 <th>Reason</th>
                                <th>Status</th>
                                <th>Edit</th>
                                <th>Delete</th>
                                </thead>
                                <tbody>


                                @foreach($leaves as $leave)
                                    <tr class="row-of-data">
                                        <td>{{$leave->Emp_Id}}</td>
                                        <td>{{$leave->position}}</td>
                                        <td>{{$leave->leavetype}}</td>
                                        <td>{{$leave->dept}}</td>
                                       <td>{{$leave->commencingleave}}</td>
                                      <td>{{$leave->reason}}</td>
                                        <td>{{$leave->status}}</td>
                                        <td><p data-placement="top" data-toggle="tooltip" title="Edit"><button  class="editt" data-title="Edit" data-toggle="modal" data-target="#edit"><span class="glyphicon glyphicon-pencil"></span></button></p></td>
                                        <td><p data-placement="top" data-toggle="tooltip" title="Delete"><button class="deletee" data-title="Delete" data-toggle="modal" data-target="#delete" ><span class="glyphicon glyphicon-trash"></span></button></p></td>
                                       </td>
                                    </tr>
                                @endforeach

                                </tbody>

                            </table>
                        </div>
                    </section>
                </div>

            </div>
        </div>
    </div>






    <div class="container">
        <div class="row">
            <div class="col-md-15 col-md-offset-0">
                <div class="panel panel-default">

                    <div class="panel-body">
                        <div class="panel-heading">Apply Leave</div>
                        <form class="form-horizontal" role="form" method="POST" action="{{ url('LeaveMgt/addleave') }}">
                            {!! csrf_field() !!}

                            <div class="form-group{{ $errors->has('Emp_Id') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Employee Name</label>

                                <div class="col-md-6">

                                    <select class="form-control" name="Emp_Id" id="Emp_Id" onchange="loadfields()">

                                            <option id="lol" value="#"></option>
                                        @foreach($employees as $employee)

                                            <option id="optiona_value_1" value="{{$employee->id_num}}" data-parent="{{$employee->job_position}}">{{$employee->fullname}}</option>

                                        @endforeach
                                    </select>
                                </div>
                            </div>


                            <div class="form-group{{ $errors->has('position') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Position</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control" id="natic" name="position" readonly >

                                </div>
                            </div>


                            <div class="form-group{{ $errors->has('leave_type') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Leave Type</label>

                                <div class="col-md-6">
                                    <select class="form-control" name="leave_type" id="leave_type" onchange="loadcats()" >
                                        <option id="0" value=NULL></option>
                                        <option id="1" value="Casual">Casual</option>
                                        <option id="2" value="Vacation">Vacation</option>
                                        <option id="3" value="Others" >Others</option>

                                    </select>
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('dept') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Department</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="dept" value="{{ old('dept') }}">

                                    @if ($errors->has('dept'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('dept') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('cleave') ? ' has-error' : '' }}">

                                <label class="col-md-4 control-label">Dates Taken for Leaves</label>

                                <div class="col-md-6">



                                            <div class="input-group date">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-calendar"></i>
                                                </div>
                                                <input type="text" class="form-control" name="cleave" id="cleave"  placeholder="Select Dates" readonly>
                                            </div>
                                    </br>


                                    @if ($errors->has('cleave'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('cleave') }}</strong>
                                    </span>
                                    @endif

                            </div>

                            <div class="form-group{{ $errors->has('reason') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Reason</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="reason" value="{{ old('reason') }}">

                                    @if ($errors->has('reason'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('reason') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                                <input id="nofdayss" name="nofdayss" type="hidden" >


                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">

                                    <button type="submit" class="btn btn-primary" id="form_submit" onclick="processdata()" name="form_submit" >
                                        <i class="fa fa-btn fa-user"></i>Apply Leave</button>
                                </div>
                            </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>






    <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                    <h4 class="modal-title custom_align" id="Heading">Delete this entry</h4>
                </div>
                <div class="modal-body">

                    <div class="alert alert-danger"><span class="glyphicon glyphicon-warning-sign"></span> Are you sure you want to delete this Record?</div>

                </div>
                <div class="modal-footer ">
                    <button type="button" class="yesdel"  aria-hidden="true" data-dismiss="modal" ><span class="glyphicon glyphicon-ok-sign"></span> Yes</button>
                    <button type="button" class="nodel" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> No</button>
                </div>
            </div>
        </div>
    </div>




    <style>
        .datepick{z-index:10000 !important;}
    </style>


    <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                    <h4 class="modal-title custom_align" id="Heading">Update Leave Details</h4>
                </div>
                <div class="modal-body1">
                    <div class="form-group">
                        <label class="col-md-4 control-label">Commencing Date</label>
                        <div class="col-md-6">
                                <input type="text" class="form-control" name="cleave1" id="cleave1" placeholder="Select Commencing date">
                            </div>
                        </div>


                    </div>

                    </br>
                    </br>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Reason</label>
                        <div class="col-md-6">
                        <input type="reason" class="form-control" id="reason1" name="reason1" >

                    </div>

                </div>
             </br></br>
                <div class="modal-footer ">
                    <button  type="button" class="updateform" style="width: 100%;" aria-hidden="true" data-dismiss="modal"><span class="glyphicon glyphicon-ok-sign" aria-hidden="true"></span> Update</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>




    <script type="text/javascript">



            $('#cleave1').datepick({
                 autoclose:true,
                dateFormat: 'yyyy-mm-dd',
                rangeSelect: false,
                onDate: $.datepick.noWeekends,
                startDate:new Date(),
                todayHighlight:'true',
                minDate: new Date(),
                multiSelect: 24, monthsToShow: 1,



            });



        $('#cleave').datepick({
            autoclose:true,
            dateFormat: 'yyyy-mm-dd',
            rangeSelect: false,
            onDate: $.datepick.noWeekends,
            startDate:new Date(),
            todayHighlight:'true',
            minDate: new Date(),
            multiSelect: 24, monthsToShow: 1,



           });



        function processdata(){
            var k = document.getElementById("cleave").value;
             var noOfDaysss = (k.split(",")).length;

            document.getElementById("nofdayss").value=noOfDaysss;

           }



        $(".editt").click(function() {

            var $row = $(this).closest("tr"),
                    $t = $row.find("td:nth-child(1)");


            var nic = $t.text();

            $(".updateform").click(function(){

                var valuestat = document.getElementById("cleave").value;


                var rsn  = document.getElementById("reason1").value;
                jQuery.ajax({

                    dataType : "json",
                    contentType : "application/json; charset=utf-8",
                    type: 'get',
                    url:'/LeaveMgt/updateleave',

                    data: {commence:valuestat,reason:rsn,id:nic},
                   success: function(max){
                    }

                });
            });
        });





        function loadfields() {


            var nic = document.getElementById("Emp_Id").value;

            var url = '{!! url('/postion') !!}';

            $.ajax({
                url: url,
                type: 'GET',
                data: {data: nic},
                success: function (data) {
                    $('#natic').val(data);
                }
            });
        }


        function loadcats() {

            var prefer = document.getElementById("leavestype").value;

        }


        $('#tab').DataTable({
            select:true,
            "order": [[0,"asc"]],
            "scrollY": "300px",
            "scrollCollapse": false,
            "paging"  : false,
            "bProcessing" :true,

        });


        $(".deletee").click(function() {

            var $row = $(this).closest("tr"),
            $tds = $row.find("td:nth-child(1)");
            $tds1 = $row.find("td:nth-child(5)");
            $tds2 = $row.find("td:nth-child(3)");

            var k= $tds.text();
            var datee = $tds1.text();
            var ltype = $tds2.text();


            $(".yesdel").click(function(){

                jQuery.ajax({

                    dataType: "json",
                    contentType: "application/json; charset=utf-8",
                    type: 'get',
                    url: '/LeaveMgt/deleteleave',
                    data: {id: k,date:datee,leave_t:ltype},
                    success: function (max) {
                    }

                });

            });

        });




</script>



@endsection