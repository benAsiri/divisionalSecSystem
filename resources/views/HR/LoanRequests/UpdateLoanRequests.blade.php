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
    <h1>Update Employee Details</h1>
@endsection

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped tr">
                        <thead>
                        <tr>
                            <th>NO</th>
                            <th>EMPLOYEE NIC </th>
                            <th>NAME</th>
                            <th>POSITION</th>
                            <th>GRADE</th>
                            <th>LOAN REQUESTED DATE</th>
                            <th>Request Letter</th>
                            <th>Special Notes</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($loans as $e)
                            <tr>
                                <td>
                                    <button id="btn-edit" class="btn btn-primary btn-xs">EDIT</button>
                                </td>
                                <td>
                                    <button id="btn-delete" class="btn btn-primary btn-xs">DELETE</button>
                                </td>
                                <td>{{$e->id}}</td>
                                <td>{{$e->Emp_Id}}</td>
                                <td>{{$e->Emp_Name}}</td>
                                <td>{{$e->Emp_Pos}}</td>
                                <td>{{$e->Emp_Grade}}</td>
                                <td>{{$e->Loan_request_date}}</td>
                                <td>{{$e->Ldoc}}</td>
                                <td>{{$e->Special_notes}}</td>
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
                    <form role="form" method="POST" id="update_info" action="{{action('LoanPagesController@UpdateLoanDetails')}}">
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
                                                   <div class="form-group">
                                                    <label for="exampleInputEmail1">Change Request Date</label>
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
                                                    <label>Update Of Request</label>
                                                    <input id="Lfile" name="Lfile" type="file" class="form-control">
                                                </div>
                                                <br>
                                                <div class="form-group">
                                                    <label>Add Special Notes</label>
                                                    <textarea id="Lnotes" name="Lnotes" class="form-control" rows="2" placeholder="Add Notes here (optional) "></textarea>
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

@endsection
@section('js_ref')
    @parent
    <script src="{{asset('/plugins/datepicker/bootstrap-datepicker.js')}}"></script>
    <script src="{{asset('/plugins/jqueryValidater/jquery.validate.min.js')}}"></script>

    <script type="text/javascript">

        $(document).ready(function () {

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

                            var path = 'Delete';
                            $.get(path,{id: data[2]})
                                    .done(function( data ) {
                                     //   alert( "Data Loaded: " + data );
                                    });
                            swal("Deleted!", "Your record has been deleted.", "success");
                        });
            });

//        });//readyEND

            $('#datepicker_LoanReqDate').datepicker({
                format: 'yyyy-mm-dd',
                autoclose: true
            }).valid();

            function setData(data) {
                console.log(data[5]);

                $('#index').val(data[2]);
                $('#datepicker_LoanReqDate').val(data[8]);
                $('#Lfile').val(data[9]);
                $('#Lnotes').val(data[10]);
            }
        });
    </script>
@stop