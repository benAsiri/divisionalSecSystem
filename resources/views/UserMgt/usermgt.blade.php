@extends('masterPage')


@section('content')

    <style type="text/css">
        .lop{
            float: right;
            width: 50%;
            height: 80%;
            background: #EEEEEE;
            margin: 0 auto;
            margin-top: 20px;
        }
        .lor{
            float: left;
            width: 50%;
            height: 90%;
            background: #00b3ee;
            margin: 0 auto;
            margin-top: 20px;

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

        <section class="panel panel-primary">
            <div class="panel-heading">
                <b>Add User</b>
            </div>
            <form role="form" id="form1">
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" id="num1" placeholder="Enter email">
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" id="num2" placeholder="Enter email">
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" id="num3" placeholder="Enter email">
                </div>
                <div class="form-group">
                    <label for="pwd">Password:</label>
                    <input type="password" class="form-control" id="pwd" placeholder="Enter password">
                </div>
                <div class="checkbox">
                    <label><input type="checkbox"> Remember me</label>
                </div>
                <button type="submit" class="btn btn-default">Submit</button>
            </form>




            </section>
    </div>

<script type="text/javascript" src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
<script type="text/javascript" charset="utf8" src="http://cdn.datatables.net/1.10.10/js/jquery.dataTables.js"></script>
<script type="text/javascript">


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

