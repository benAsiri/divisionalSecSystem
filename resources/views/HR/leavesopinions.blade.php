@extends('masterPage')

@section('content')


    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="http://getbootstrap.com/dist/js/bootstrap.min.js"></script>
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
                                <th>Resuming Duties</th>
                                <th>Reason</th>
                                <th>Status</th>
                                <th>Approve</th>
                                <th>Reject</th>
                                </thead>
                                <tbody>


                                @foreach($leaves as $leave)
                                    <tr class="row-of-data">
                                        <td>{{$leave->Emp_Id}}</td>
                                        <td>{{$leave->position}}</td>
                                        <td>{{$leave->leavetype}}</td>
                                        <td>{{$leave->dept}}</td>
                                        <td>{{$leave->commencingleave}}</td>
                                        <td>{{$leave->resumingduties}}</td>
                                        <td>{{$leave->reason}}</td>
                                        <td>{{$leave->status}}</td>
                                        <td><p data-placement="top" data-toggle="tooltip" title="Edit"><button  class="approve" data-title="Edit" data-toggle="modal" data-target="#approve"><span class="glyphicon glyphicon-pencil"></span></button></p></td>
                                        <td><p data-placement="top" data-toggle="tooltip" title="Delete"><button class="reject" data-title="Delete" data-toggle="modal" data-target="#reject" ><span class="glyphicon glyphicon-trash"></span></button></p></td>
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



    <script type="text/javascript" src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
    <script type="text/javascript" charset="utf8" src="http://cdn.datatables.net/1.10.10/js/jquery.dataTables.js"></script>


    <script type="text/javascript">


        $('#tab').DataTable({
            select:true,
            "order": [[0,"asc"]],
            "scrollY": "300px",
            "scrollCollapse": false,
            "paging"  : false,
            "bProcessing" :true,

        });

        $(".approve").click(function() {

            var $row = $(this).closest("tr"),
            $t = $row.find("td:nth-child(1)");

            var nic = $t.text();


                jQuery.ajax({

                    dataType : "json",
                    contentType : "application/json; charset=utf-8",
                    type: 'get',
                    url:'/LeaveStatus/Approve',
                    data: {id:nic},
                    success: function(max){
                    }

                });

        });

        $(".reject").click(function() {

            var $row = $(this).closest("tr"),
             $t = $row.find("td:nth-child(1)");


            var nic = $t.text();


            jQuery.ajax({

                dataType : "json",
                contentType : "application/json; charset=utf-8",
                type: 'get',
                url:'/LeaveStatus/Reject',
                data: {id:nic},
                success: function(max){
                }

            });

        });


    </script>



@endsection