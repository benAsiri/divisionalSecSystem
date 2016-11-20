@extends('masterPage')

@section('content')


    <div align="center" style="background:#CED2CD">
        <div class="model-dialog">
            <div class="small-box bg-blue">
                <div class="inner">
                    <h3>View Remaining Leave Status</h3>

                </div>
                <div class="icon">
                    <i  class=""></i>
                </div>
            </div>
        </div>
    </div>


    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="http://getbootstrap.com/dist/js/bootstrap.min.js"></script>




    {{--<div class="container">--}}
        <div class="row">
            <div class="col-xs-12 ">
                <div class="panel panel-default">



    <section class="panel panel-primary">
        <div class="panel-heading">
            <b>View Remaining Leaves of Each Employee</b>
        </div>
        <div class="panel-body">
            <table id="tab" class="table table-hover table-bordered">
                <thead>
                <th>Name</th>
                <th>NIC</th>
                <th>Casual Leaves</th>
                <th>Vacation leaves</th>
                <th>Other Leaves</th>
                <th>Remaining Casual Leaves</th>
                <th>Remaining Vacation Leaves</th>
                <th>Previous Year Extra Leaves</th>
                </thead>
                <tbody>


                @foreach($tempArray as $arr)
                    <tr class="row-of-data">
                        <td><?php echo $arr[0]; ?></td>
                        <td><?php echo $arr[1]; ?></td>
                        <td><?php echo $arr[2]; ?></td>
                        <td><?php echo $arr[3]; ?></td>
                        <td><?php echo $arr[4]; ?></td>
                        <td><?php echo 21-$arr[2]; ?></td>
                        <td><?php echo 24-$arr[3]; ?></td>
                        <td><?php echo $arr[5]; ?></td>



                        </td>
                    </tr>
                @endforeach



                </tbody>

            </table>
        </div>
    </section>



                    <div class="container">
                        <div class="row">
                            <div class="col-md-15 col-md-offset-0">
                                <div class="panel panel-default">

                                    <div class="panel-body">
                                        <div class="panel-heading">Generate Report</div>
                                        <form class="form-horizontal" role="form" method="POST" action="{{ url('/generatePDF_Leaves') }}">
                                            {!! csrf_field() !!}



                                            <div class="form-group{{ $errors->has('leave_year') ? ' has-error' : '' }}">
                                                <label class="col-md-4 control-label">Year </label>

                                                <div class="col-md-6">
                                                    <select class="form-control" name="leave_year" id="leave_year"  >
                                                        <option value="#"></option>

                                                    </select>
                                                    @if ($errors->has('leave_year'))
                                                        <span class="help-block">
                                        <strong>{{ $errors->first('leave_year') }}</strong>
                                    </span>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="form-group{{ $errors->has('leave_month') ? ' has-error' : '' }}">
                                                <label class="col-md-4 control-label">Month </label>

                                                <div class="col-md-6">
                                                    <select class="form-control" name="leave_month" id="leave_month" onchange="generate_leave_month()" >
                                                        <option value="#"></option>

                                                    </select>
                                                    @if ($errors->has('leave_month'))
                                                        <span class="help-block">
                                        <strong>{{ $errors->first('leave_month') }}</strong>
                                    </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <input class="form-control" id="name_month" name="name_month" type="hidden" >
                                            <div class="pull-right">

                                                <div class="col-lg-12"><button type="submit" class="btn btn-block btn-warning" ><i class="fa fa-file">

                                                            </i>Generate Leave Report</button></div>
                                            </div>



                                        </form>



                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>







                </div>
                </div>
            </div>
        {{--</div>--}}








                <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
                <script src="http://getbootstrap.com/dist/js/bootstrap.min.js"></script>

    <script type="text/javascript" src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
    <script type="text/javascript" charset="utf8" src="http://cdn.datatables.net/1.10.10/js/jquery.dataTables.js"></script>


    <script type="text/javascript">


    $('#tab').DataTable({
    select:true,
    "order": [[0,"asc"]],
    "scrollY": "300px",
    "scrollCollapse": false,
    "paging"  : true,
    "bProcessing" :true,

    });

    function removeOptions(selectbox)
    {
        var i;
        for(i=selectbox.options.length-1;i>=0;i--)
        {
            selectbox.remove(i);
        }
    }



    $(document).ready(function() {

        var months =["January","February","March","April","May","June","July","August","September","October","November","December"];

        var today = new Date();
        var month = today.getMonth()+1;
        var year = today.getFullYear();

        var initial_yr = 2015;

        for (var i = initial_yr; i <=year; i++) {
            var opt = i;
            var ek = document.createElement("option");
            ek.textContent = opt;
            ek.value = opt;
            document.getElementById("leave_year").appendChild(ek);

        }

        $('#leave_year').on('change', function (e) {
            var optionSelected = $("option:selected", this);
            var valueSelected = this.value;


            if(valueSelected == "#"){
                removeOptions(document.getElementById("leave_month"));
                var opt =" ";
                var ek = document.createElement("option");
                ek.textContent = opt;
                ek.value = opt;
                document.getElementById("leave_month").appendChild(ek);
            }

            else if(valueSelected == year){

                removeOptions(document.getElementById("leave_month"));

                for (var i = 0; i <month; i++) {
                    var opt = months[i];
                    var ek = document.createElement("option");
                    ek.textContent = opt;
                    ek.value = opt;
                    document.getElementById("leave_month").appendChild(ek);

                }


            }

            else{
                removeOptions(document.getElementById("leave_month"));

                for (var i = 0; i <12; i++) {
                    var opt = months[i];
                    var ek = document.createElement("option");
                    ek.textContent = opt;
                    ek.value = opt;
                    document.getElementById("leave_month").appendChild(ek);

                }



            }

    });

    });


    function generate_leave_month() {

            var month =document.getElementById("leave_month").value;

        var months =["January","February","March","April","May","June","July","August","September","October","November","December"];

        for(var i=0; i < months.length ; i++){
            if(month == months[i]){

                var month_no = i+1;
            }

        }

        document.getElementById("name_month").value=month_no;
        }



    </script>


@endsection
