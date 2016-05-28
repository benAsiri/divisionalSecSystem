@extends('masterPage')


@section('content')

    <style type="text/css">
        .lop{
            float: right;
            width: 50%;
            height: 50%;
            background: #EEEEEE;
            margin: 0 auto;
            margin-top: 20px;
        }
        .lor{
            float: left;
            width: 50%;
            height: 50%;
            background: #00b3ee;
            margin: 0 auto;
            margin-top: 20px;

        }
        .lok{
            float: left;
            width: 50%;
            height: 50%;
            background: #00b3ee;
            margin: 0 auto;
            margin-top: -450px;

        }
    </style>

<div class="lop">

    <section class="panel panel-primary">
        <div class="panel-heading">
            <b>Employee Info</b>
        </div>
        <div class="panel-body">
            <table id="tab" class="table table-hover table-bordered">
                <thead>
                <th>NIC</th>
                <th>Name</th>
                <th>Job</th>

                </thead>
            <tbody>
            @foreach($employees as $employee)
                <tr>
                    <td>{{$employee->id}}</td>
                    <td>{{$employee->name}}</td>
                    <td>{{$employee->email}}</td>
                </tr>
                @endforeach

            </tbody>
            </table>
        </div>
    </section>
    </div>

    <div class="lor">

        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-0">
                    <div class="panel panel-default">
                        <div class="panel-heading">Register</div>
                        <div class="panel-body">
                            <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
                                {!! csrf_field() !!}

                                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                    <label class="col-md-4 control-label">Name</label>

                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="name" value="{{ old('name') }}">

                                        @if ($errors->has('name'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
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
                                        <select name="status" class="form-control">
                                            <option value="Student">Admin</option>
                                            <option value="Lecturer">User</option>
                                            </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-4 control-label">Faculty</label>

                                    <div class="col-md-6">
                                        <select name="faculty" class="form-control">
                                            <option value="IT">Land Division Operator</option>
                                            <option value="Engineering">HR Operator</option>
                                            <option value="Business Management">Divisional Secretary</option>
                                            <option value="Business Management">Asst.Divisional Secretary</option>
                                            <option value="Business Management">IT Manager</option>

                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-4">
                                        <button type="submit" class="btn btn-primary">
                                            <i class="fa fa-btn fa-user"></i>Register
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="lop">

        <section class="panel panel-primary">
            <div class="panel-heading">
                <b>Employee Info</b>
            </div>
            <div class="panel-body">
                <table id="tab" class="table table-hover table-bordered">
                    <thead>
                    <th>NIC</th>
                    <th>Name</th>
                    <th>Job</th>

                    </thead>
                    <tbody>
                    @foreach($employees as $employee)
                        <tr>
                            <td>{{$employee->id}}</td>
                            <td>{{$employee->name}}</td>
                            <td>{{$employee->email}}</td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>
        </section>
    </div>


<script type="text/javascript" src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
<script type="text/javascript" charset="utf8" src="http://cdn.datatables.net/1.10.10/js/jquery.dataTables.js"></script>
<script type="text/javascript">


    function myFunction() {
        document.getElementById("#num1").readOnly = true;
    }

   $('#tab').DataTable({
       select:true,
       "order": [[0,"desc"]],
       "scrollY": "300px",
       "scrollCollapse": true,
       "paging"  : true,
       "bProcessing" :true,

   });

    $(document).ready(function(){
        $('#tab tbody tr').click(function(){
            var lo =$(this).text();
            console.log(lo);

            var mySplitResult;
            mySplitResult = lo.split("\n");

            $("#num1").val(mySplitResult[1]);
            $("#num2").val(mySplitResult[2]);
            $("#num3").val(mySplitResult[3]);







        })
    })

</script>



@endsection

