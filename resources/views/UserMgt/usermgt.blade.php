@extends('masterPage')


@section('content')


        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-0">
                    <div class="panel panel-default">
                        <div class="panel-heading">Register</div>
                        <div class="panel-body">
                            <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
                                {!! csrf_field() !!}

                                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                    <label class="col-md-4 control-label">Name</label>

                                    <div class="col-md-6">
                                            <select class="form-control" id="fname" onchange="loadfields()">
                                                <option value="#"></option>
                                                @foreach($employees as $employee)

                                                    <option value="{{$employee->NIC}}">{{$employee->name}}</option>

                                                @endforeach

                                            </select>
                                    </div>
                                </div>


                                <div class="form-group{{ $errors->has('NIC') ? ' has-error' : '' }}">
                                    <label class="col-md-4 control-label">NIC</label>

                                    <div class="col-md-6">
                                        <input type="text" class="form-control" id="natic" name="NIC" readonly >

                                    </div>
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
                                            <option value="#"></option>
                                            <option value=1>Admin</option>
                                            <option value=2>User</option>
                                            </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-4 control-label">Position</label>

                                    <div class="col-md-6">
                                        <select name="position" class="form-control" id="postid">


                                        </select>
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











    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="http://getbootstrap.com/dist/js/bootstrap.min.js"></script>
    <div class="container">
        <div class="row">
            <div class="col-md-14 col-md-offset-0">
                <div class="panel panel-default">
                    <div class="panel-heading">Register</div>
                    <div class="panel-body">
                            <div class="panel-heading">User Details</div>
                            <div class="panel-body">

                <div class="table-responsive">


                    <table id="mytable" class="table table-bordred table-striped">

                        <thead>

                        <th>ID</th>
                        <th>Name</th>
                        <th>NIC</th>
                        <th>Status</th>
                        <th>Position</th>
                        <th>Edit</th>
                        <th>Delete</th>
                        </thead>
                        <tbody>


                        @foreach($employees as $employee)
                            <tr>
                                <td>{{$employee->id}}</td>
                                <td>{{$employee->name}}</td>
                                <td>{{$employee->NIC}}</td>
                                <td>{{$employee->status}}</td>
                                <td>{{$employee->position}}</td>
                                <td><p data-placement="top" data-toggle="tooltip" title="Edit"><button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit" ><span class="glyphicon glyphicon-pencil"></span></button></p></td>
                                <td><p data-placement="top" data-toggle="tooltip" title="Delete"><button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete" ><span class="glyphicon glyphicon-trash"></span></button></p></td>

                            </tr>
                        @endforeach

                        </tbody>

                    </table>

                    <div class="clearfix"></div>
                    <ul class="pagination pull-right">
                        <li class="disabled"><a href="#"><span class="glyphicon glyphicon-chevron-left"></span></a></li>
                        <li class="active"><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">4</a></li>
                        <li><a href="#">5</a></li>
                        <li><a href="#"><span class="glyphicon glyphicon-chevron-right"></span></a></li>
                    </ul>

                </div>

            </div>
        </div>
    </div>


    <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                    <h4 class="modal-title custom_align" id="Heading">Edit User Details</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <input class="form-control " type="text" placeholder="Status">
                    </div>
                    <div class="form-group">

                        <input class="form-control " type="text" placeholder="Position">
                    </div>
                    <div class="form-group">
                        <textarea rows="2" class="form-control" placeholder="Password"></textarea>


                    </div>
                </div>
                <div class="modal-footer ">
                    <button type="button" class="btn btn-warning btn-lg" style="width: 100%;"><span class="glyphicon glyphicon-ok-sign"></span> Update</button>
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
                    <button type="button" class="btn btn-success" ><span class="glyphicon glyphicon-ok-sign"></span> Yes</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> No</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    </div>
        </div>
    </div>




<script type="text/javascript">

    function loadfields() {
        var prefer = document.getElementById("fname").value;
              $("#natic").val(prefer);
    }

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

        if (statid == 1) {
            removeOptions(document.getElementById("postid"));
            var options = ["Human Resources Operator", "Land Division Operator"];

            for (var i = 0; i < options.length; i++) {
                var opt = options[i];
                var ek = document.createElement("option");
                ek.textContent = opt;
                ek.value = opt;
                document.getElementById("postid").appendChild(ek);


            }
        }
        else if (statid == 2) {

            removeOptions(document.getElementById("postid"));
            var options1 = ["Divisional Secretary", "Asst.Divisional Secretary", "IT Manager"];

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




</script>



@endsection

