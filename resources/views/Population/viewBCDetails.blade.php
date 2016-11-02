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

@stop

@section('content_header')
    <h1>View Birth Certificates</h1>
@endsection

@section('content')

    <div class="box">
        {{--<div class="box-header">--}}
            {{--<h3 class="box-title">Data Table With Full Features</h3>--}}
        {{--</div>--}}
        <!-- /.box-header -->
        <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
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
                    <td>{{$bc->id}}</td>
                    <td>{{$bc->nic}}</td>
                    <td>{{$bc->name}}</td>
                    <td>{{$bc->address}}</td>
                    <td>{{$bc->mName}}</td>
                    <td><button name="img1" value="img1"class="btn btn-default" data-toggle="modal" data-target="#modal{{$bc->id}}"></button>  {{$bc->imgSide1}}</td>
                    <td>{{$bc->imgSide2}}</td>
                </tr>
                <!-- Modal -->
                <div id="modal{{$bc->id}}" class="modal fade" role="dialog">
                    <div class="modal-dialog">

                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Modal Header</h4>
                            </div>
                            <div class="modal-body">
                                {{--<p><img src='{{"C:/xampp/htdocs/divisionalSecSystem/public/BCImages/".$bc->imgSide1}}'></p>--}}
                                <p><img src='{{asset("/BCImages/".$bc->imgSide1)}}'></p>
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



        $('#example1').DataTable({

            select: true,
            "order": [[0, "asc"]],
            "scrollY": "400px",
            "scrollX": "400px",
            "scrollCollapse": false,
            "paging": true,
            "bProcessing": true,
            "scrollX":true,





        });

        $('#example1').on('click', function(){

            //alert("BAM!");
        });









    </script>




@stop