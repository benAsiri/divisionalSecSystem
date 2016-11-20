@extends('masterPage')


@section('content')


    <link rel="stylesheet" href="{{asset('/plugins/sweetAlert/sweetalert.css')}}">
    <script src="{{asset('/plugins/sweetAlert/sweetalert.min.js')}}"></script>

    @if (notify()->ready())
        <script>
            swal({
                title: "{!! notify()->message() !!}",
                type: "{{ notify()->type() }}"

            });
        </script>



    @endif



    <div align="center" style="background:#CED2CD">
        <div class="model-dialog">
            <div class="small-box bg-blue">
                <div class="inner">
                    <h3>User Management</h3>
                    <p>Add new users, update existing user details and delete users</p>
                </div>
                <div class="icon">
                    <i  class=""></i>
                </div>
            </div>
        </div>
    </div>

        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <script src="http://getbootstrap.com/dist/js/bootstrap.min.js"></script>
        <div class="container">
            <div class="row">
                <div class="col-md-18 col-md-offset-0">
                    <div class="panel panel-default">

        <section class="panel panel-primary">
            <div class="panel-heading">
                <b>User Info</b>
            </div>
            <div class="panel-body">
                <table id="tab" class="table table-hover table-bordered">
                    <thead>

                    <th>ID</th>
                    <th>Name</th>
                    <th>NIC</th>
                    <th>Status</th>
                    <th>Position</th>
                    <th>Edit</th>
                    <th>Delete</th>
                    <th>Reset Password</th>
                    </thead>
                    <tbody>


                    @foreach($users as $user)
                        <tr class="row-of-data">
                            <td>{{$user->id}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->NIC}}</td>
                            <td>{{$user->status}}</td>
                            <td>{{$user->position}}</td>
                            <td><p data-placement="top" data-toggle="tooltip" title="Edit"><button  class="editt" data-title="Edit" data-toggle="modal" data-target="#edit"><span class="glyphicon glyphicon-pencil"></span></button></p></td>
                            <td><p data-placement="top" data-toggle="tooltip" title="Delete"><button class="deletee" data-title="Delete" data-toggle="modal" data-target="#delete" ><span class="glyphicon glyphicon-trash"></span></button></p></td>
                            <td><p data-placement="top" data-toggle="tooltip" title="Reset"><button class="pwreset" data-title="Reset"  data-toggle="modal" data-target="#reset" ><span class="glyphicon glyphicon-repeat"></span></button></p></td>
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
                            <div class="panel-heading">Register</div>
                            <form class="form-horizontal" role="form" method="POST" action="{{ url('/regi') }}">
                                {!! csrf_field() !!}

                                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                    <label class="col-md-4 control-label">Name</label>

                                    <div class="col-md-6">
                                        <select class="form-control" name="faname" id="fname" onchange="loadfields()">
                                            <option value=0></option>
                                            @foreach($employees as $employee)

                                                <option id="optionavalue_1" value="{{$employee->fullname}}" data-parent="{{$employee->id_num}}" >{{$employee->fullname}}</option>

                                            @endforeach

                                        </select>
                                        @if ($errors->has('faname'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('faname') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>


                                <div class="form-group{{ $errors->has('NIC') ? ' has-error' : '' }}">
                                    <label class="col-md-4 control-label">NIC</label>

                                    <div class="col-md-6">
                                        <input type="text" class="form-control" id="natic" name="NIC" readonly >

                                    </div>
                                    @if ($errors->has('NIC'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('NIC') }}</strong>
                                    </span>
                                    @endif
                                </div>


                                <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                                    <label class="col-md-4 control-label">Username</label>

                                    <div class="col-md-6">
                                        <input type="username" class="form-control" name="username" value="{{ old('username') }}">

                                        @if ($errors->has('username'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>


                                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                    <label class="col-md-4 control-label">Password</label>

                                    <div class="col-md-6">
                                        <input type="password" class="form-control" name="password">

                                        @if ($errors->has('password'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                                    <label class="col-md-4 control-label">Confirm Password</label>

                                    <div class="col-md-6">
                                        <input type="password" class="form-control" name="password_confirmation">

                                        @if ($errors->has('password_confirmation'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-4 control-label">Status</label>

                                    <div class="col-md-6">
                                        <select name="status" class="form-control" id="statid" onchange="positionchange()">
                                            <option value=0></option>
                                            <option value="Admin">Admin</option>
                                            <option value="User">User</option>
                                        </select>
                                        @if ($errors->has('status'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('status') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-4 control-label">Position</label>

                                    <div class="col-md-6">
                                        <select name="position" class="form-control" id="postid">
                                            <option value=0></option>

                                        </select>
                                        @if ($errors->has('position'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('position') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-4">
                                        <button type="submit" class="btn btn-primary">
                                            <i class="fa fa-btn fa-user"></i>Register </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>








                <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                                <h4 class="modal-title custom_align" id="Heading">Update User Details</h4>
                            </div>
                            </br></br>
                            <div class="modal-body">

                                 <div class="form-group">
                                    <label class="col-md-4 control-label">Status</label>
                                    <div class="col-md-6">
                                        <select name="status" class="form-control" id="statid1" onchange="positionchange1()">
                                            <option value=0></option>
                                            <option value='Admin'>Admin</option>
                                            <option value='User'>User</option>
                                        </select>
                                        @if ($errors->has('statid1'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('statid1') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>
                                </br></br>
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Position</label>

                                    <div class="col-md-6">
                                        <select name="position" class="form-control" id="postid1">
                                            <option value=0></option>
                                        </select>
                                    </div>
                                    @if ($errors->has('postid1'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('postid1') }}</strong>
                                    </span>
                                    @endif
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



        <div class="modal fade" id="reset" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                        <h4 class="modal-title custom_align" id="Heading">Reset user Password</h4>
                    </div>


                    <div class="modal-body">
                            <div class="alert alert-danger"><span class="glyphicon glyphicon-warning-sign"></span> Are you sure you want to reset?</div>
                        <div class="alert alert-danger"><span class="glyphicon glyphicon-warning-sign"></span> Note : Password will be automatically change to NIC  when resetting passwords</div>

                    </div>
                    <div class="modal-footer ">
                        <button type="button" class="resetttt"  aria-hidden="true" data-dismiss="modal" ><span class="glyphicon glyphicon-ok-sign"></span> Yes</button>
                        <button type="button" class="nodel" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> No</button>
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




    $(".editt").click(function() {

        var $row = $(this).closest("tr"),
                $t = $row.find("td:nth-child(3)");
                $s = $row.find("td:nth-child(4)");
                $p = $row.find("td:nth-child(5)");

        var nic = $t.text();

       $(".updateform").click(function(){

           var valuestat = document.getElementById("statid1").value;
           var valuepos = document.getElementById("postid1").value;

           jQuery.ajax({

               dataType : "json",
               contentType : "application/json; charset=utf-8",
               type: 'get',
               url:'/Usr_register/updateUser',
               data: {stat:valuestat,post:valuepos,id:nic},
               success: function(max){

                       swal("User Updated", "", "success");

                   setTimeout(function(){
                       location.reload();
                   }, 500);

               }

           });
       });
    });

     $(".pwreset").click(function() { //resetting passwords

         var $row = $(this).closest("tr"),
         $t = $row.find("td:nth-child(3)");

         var nic = $t.text();

         $(".resetttt").click(function(){


             jQuery.ajax({

                 dataType : "json",
                 contentType : "application/json; charset=utf-8",
                 type: 'get',
                 url:'/Usr_register/resetPwd',
                 data: {id:nic},
                 success: function(max){

                         swal("Password reset", "", "success");



                 }

             });
         });
     });



    function loadfields(){


         var nic = document.getElementById("fname").value;



     var url = '{!! url('/nic') !!}';

     $.ajax({
         url: url,
         type: 'GET',
         data: {data: nic},
         success: function (data) {
             $('#natic').val(data);
         }
     });





     }




     $(".deletee").click(function() {

        var $row = $(this).closest("tr"),
                $tds = $row.find("td:nth-child(3)");

        var k= $tds.text();


        $(".yesdel").click(function(){

        jQuery.ajax({

            dataType: "json",
            contentType: "application/json; charset=utf-8",
            type: 'get',
            url: '/Usr_register/deleteUser',
            data: {id: k},
            success: function (max) {

                    swal("User Deleted", "", "success");

                setTimeout(function(){
                    location.reload();
                }, 500);



            }

        });

        });

    });




    function removeOptions(selectbox)
    {
        var i;
        for(i=selectbox.options.length-1;i>=0;i--)
        {
            selectbox.remove(i);
        }
    }

   function positionchange() {

         var statid = document.getElementById("statid").value;


         if("Admin"=== statid){

             removeOptions(document.getElementById("postid"));
             var options = ["Divisional Secretary", "Asst.Divisional Secretary", "IT Manager"];
             for (var i = 0; i < options.length; i++) {
                 var opt = options[i];
                 var ek = document.createElement("option");
                 ek.textContent = opt;
                 ek.value = opt;
                 document.getElementById("postid").appendChild(ek);

             }
         }
         else if ("User"===statid) {

             removeOptions(document.getElementById("postid"));
             var options1 = ["Human Resources Operator", "Land Division Operator"];


             for (var i = 0; i < options1.length; i++) {
                 var opt1 = options1[i];
                 var ek1 = document.createElement("option");
                 ek1.textContent = opt1;
                 ek1.value = opt1;
                 document.getElementById("postid").appendChild(ek1);

             }
         }
         else {

             removeOptions(document.getElementById("postid"));
         }
     }
     function positionchange1() {

         var statid = document.getElementById("statid1").value;


         if("Admin"=== statid){

             removeOptions(document.getElementById("postid1"));
             var options = ["Divisional Secretary", "Asst.Divisional Secretary", "IT Manager"];
             for (var i = 0; i < options.length; i++) {
                 var opt = options[i];
                 var ek = document.createElement("option");
                 ek.textContent = opt;
                 ek.value = opt;
                 document.getElementById("postid1").appendChild(ek);

             }
         }
         else if ("User"===statid) {

             removeOptions(document.getElementById("postid1"));
             var options1 = ["Human Resources Operator", "Land Division Operator"];


             for (var i = 0; i < options1.length; i++) {
                 var opt1 = options1[i];
                 var ek1 = document.createElement("option");
                 ek1.textContent = opt1;
                 ek1.value = opt1;
                 document.getElementById("postid1").appendChild(ek1);

             }
         }
         else {

             removeOptions(document.getElementById("postid1"));
         }
     }




 </script>





@endsection

