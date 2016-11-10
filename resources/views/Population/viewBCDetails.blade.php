@extends('masterPage')

@section('css_ref')
    @parent

    <link rel="stylesheet" href="{{asset('/plugins/datepicker/datepicker3.css')}}">
    <style>
        .error {
            color: red;
            font-family: serif;
            border-color: red;
            border-width: 1px;
        }

    </style>

@stop

@section('content_header')

@endsection

@section('content')

    <div align="center" style="background:#CED2CD">
        <div class="model-dialog">
            <div class="small-box bg-yellow">
                <div class="inner">
                    <h3>Add Birth Certificate</h3>
                    <p>Add new Birth Certificate Details with Image</p>
                </div>
                <div class="icon">
                    <i  class="glyphicon glyphicon-plus"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="box">
        {{--<div class="box-header">--}}
            {{--<h3 class="box-title">Data Table With Full Features</h3>--}}
        {{--</div>--}}
        <!-- /.box-header -->
        <div class="box-body">
            <table id="example1" class="table table-bordered table-striped" >
                <thead>
                <tr>
                    <th>Remove Record</th>
                    <th>ID</th>
                    <th>NIC</th>
                    <th>Person Name</th>
                    <th>Address</th>
                    <th>Mother's Name</th>
                    <th>1st side of BC</th>
                    <th>2nd Side of BC</th>

                </tr>
                </thead>
                <tbody>

                @foreach($bcDetails as $bc)
                <tr>
                    <td><button id="btn-delete" class="btn btn-danger"> <span class="glyphicon glyphicon-trash" aria-hidden="true"></span></button> </td>
                    <td>{{$bc->id}}</td>
                    <td>{{$bc->nic}}</td>
                    <td>{{$bc->name}}</td>
                    <td>{{$bc->address}}</td>
                    <td>{{$bc->mName}}</td>
                    <td><button name="img1" value="img1"class="btn btn-info" data-toggle="modal" data-target="#modal{{$bc->id}}">See 1st Side</button> </td>
                    <td><button name="img2" value="img2"class="btn btn-info" data-toggle="modal" data-target="#modal2{{$bc->id}}">See 2nd Side</button> </td>

                </tr>
                <!-- Modal -->
                <div id="modal{{$bc->id}}" class="modal fade" role="dialog">
                    <div class="modal-dialog">

                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">1st Side Of Birth Certificate</h4>
                            </div>
                            <div class="modal-body">
                                <p><img src='{{"C:/xampp/htdocs/divisionalSecSystem/public/BCImages/".$bc->imgSide1}}'></p>
                                <p><img class="img img-responsive" src='{{asset("/BCImages/".$bc->imgSide1)}}'></p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                        </div>

                    </div>
                </div>

                <div id="modal2{{$bc->id}}" class="modal fade" role="dialog">
                    <div class="modal-dialog">

                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">2nd Side Of Birth Certificate</h4>
                            </div>
                            <div class="modal-body">
                                <p><img src='{{"C:/xampp/htdocs/divisionalSecSystem/public/BCImages/".$bc->imgSide2}}'></p>
                                <p><img class="img img-responsive" src='{{asset("/BCImages/".$bc->imgSide2)}}'></p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                        </div>

                    </div>
                </div>

                @endforeach

                </tbody>
                <tfoot>

                </tfoot>
            </table>
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->











@endsection
@section('js_ref')
    @parent

    <script type="text/javascript">


        //$("#example1").DataTable();
        $(document).ready(function () {

            var table=  $('#example1').DataTable({

                select: true,
                "order": [[0, "asc"]],
                "scrollY": "400px",
                "scrollX": "400px",
                "scrollCollapse": false,
                "paging": true,
                "bProcessing": true,
                "scrollX":true,


            });





            $('#example1').on('click', '#btn-delete', function () {

                var data = table.row($(this).parents('tr')).data();
                // console.log(data[2]);


                swal({
                            title: "Are you sure?",
                            text: "You will not be able to recover this Data again",
                            type: "warning",
                            showCancelButton: true,
                            confirmButtonColor: "#DD6B55",
                            confirmButtonText: "Yes, delete it!",
                            closeOnConfirm: false
                        },
                        function () {

                            var path = 'DeleteBC/' + data[1];
                            console.log(path);
                            window.location.replace(path);
                            swal("Deleted!", "Your record has been deleted.", "success");

                        });

                setData(data);

            });




        });





    </script>




@stop