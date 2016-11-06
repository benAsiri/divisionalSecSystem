@extends('masterPage')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-18 col-md-offset-0">
                <div class="panel panel-default">

                    <section class="panel panel-primary">
                        <div class="panel-heading">
                            <b>LDO Permits Information</b>
                        </div>
                        <div class="panel-body">
                            <table id="tab" class="table table-hover table-bordered">
                                <thead>
                                <th>Permit No</th>
                                <th>GS Division</th>
                                <th>Name of Village</th>
                                <th>Name of Land</th>
                                <th>Permit Holder's Name</th>
                                <th>Extent</th>
                                <th>Present Owner</th>
                                <th>Present Situation</th>
                                <th>Cancellation</th>
                                <th>Edit</th>
                                <th>Delete</th>
                                </thead>
                                <tbody>


                                @foreach($ldo_permits as $permit)
                                    <tr class="row-of-data">
                                        <td>{{$permit->permit_no}}</td>
                                        <td>{{$permit->GS_division}}</td>
                                        <td>{{$permit->name_of_village}}</td>
                                        <td>{{$permit->name_of_land}}</td>
                                        <td>{{$permit->permit_holder_name}}</td>
                                        <td>{{$permit->extent}}</td>
                                        <td>{{$permit->present_owner}}</td>
                                        <td>{{$permit->present_situation}}</td>
                                        <td>{{$permit->cancellation}}</td>
                                        <td><p data-placement="top" data-toggle="tooltip" title="Edit"><button  class="approve" data-title="Edit" data-toggle="modal"  data-target="#edit"><span class="glyphicon glyphicon-pencil"></span></button></p></td>
                                        <td><p data-placement="top" data-toggle="tooltip" title="Delete"><button class="reject" data-title="Delete" data-toggle="modal" data-target="#delete" ><span class="glyphicon glyphicon-trash"></span></button></p></td>

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
                        <div class="panel-heading">Add New LDO Permit Details</div>
                        <form class="form-horizontal" role="form" method="POST" action="{{ url('LDOPermit/add') }}">
                            {!! csrf_field() !!}

                            <div class="form-group{{ $errors->has('permit_no') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Permit No</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="permit_no" value="{{ old('permit_no') }}">

                                    @if ($errors->has('permit_no'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('permit_no') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('gs_division') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">GS Division</label>

                                <div class="col-md-6">
                                    <select class="form-control" name="gs_division" id="gs_division" onchange="loadcats()" >
                                        <option id="0" value=NULL></option>
                                        <option id="1" value="Mangalapura">Mangalapura</option>
                                        <option id="2" value="Banadaranayakepura">Banadaranayakepura</option>
                                        <option id="3" value="Wanathawilluwa-North" >Wanathawilluwa-North</option>

                                    </select>
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('name_of_village') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Name of Village</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="name_of_village" value="{{ old('name_of_village') }}">

                                    @if ($errors->has('name_of_village'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('name_of_village') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('name_of_land') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Name of Land</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="name_of_land" value="{{ old('name_of_land') }}">

                                    @if ($errors->has('name_of_land'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('name_of_land') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('permit_holder_name') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">LDO Permit Holder's Name</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="permit_holder_name" value="{{ old('permit_holder_name') }}">

                                    @if ($errors->has('permit_holder_name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('permit_holder_name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('extent') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Extent</label>

                                <div class="col-md-4">
                                    <input type="text" class="form-control" name="extent" value="{{ old('extent') }}">


                                    @if ($errors->has('extent'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('extent') }}</strong>
                                    </span>
                                    @endif

                                    </div>
                                <div class="col-md-2">
                                <select class="form-control" name="unit" id="unit"  >
                                    <option id="0" value=NULL></option>
                                    <option id="1" value="Rods">Rods</option>
                                    <option id="2" value="Acres">Acres</option>
                                    <option id="3" value="Hectares" >Hectares</option>


                                </select>
                                </div>


                                </div>



                            <div class="form-group{{ $errors->has('present_owner') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Present Owner</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="present_owner" value="{{ old('present_owner') }}">

                                    @if ($errors->has('present_owner'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('present_owner') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>


                            <div class="form-group{{ $errors->has('present_situation') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Present Situation</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="present_situation" value="{{ old('present_situation') }}">

                                    @if ($errors->has('present_situation'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('present_situation') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>









                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-4">

                                        <button type="submit" class="btn btn-primary" id="form_submit"  name="form_submit" >
                                            <i class="fa fa-btn fa-user"></i>Submit Data</button>
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
                    <h4 class="modal-title custom_align" id="Heading">Update LDO Permit Details</h4>
                </div>

                <div class="modal-body1">
                    </br></br>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Permit No</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="permit_no1" id="permit_no1" readonly >
                        </div>
                    </div>
                    </br></br>
                    <div class="form-group">
                        <label class="col-md-4 control-label">GS Division</label>
                        <div class="col-md-6">

                            <select class="form-control" name="gs_division1" id="gs_division1"  >
                                <option id="0" value=NULL></option>
                                <option id="1" value="Mangalapura">Mangalapura</option>
                                <option id="2" value="Banadaranayakepura">Banadaranayakepura</option>
                                <option id="3" value="Wanathawilluwa-North" >Wanathawilluwa-North</option>

                            </select>
                        </div>
                    </div>
                    </br></br>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Name of Village</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="name_of_village1" id="name_of_village1">
                        </div>
                    </div>
                    </br></br>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Name of Land</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="name_of_land1" id="name_of_land1" >
                        </div>
                    </div>
                    </br></br>
                    <div class="form-group">
                        <label class="col-md-4 control-label">LDO Permit Holder's Name</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="permit_holder_name1" id="permit_holder_name1" >
                        </div>
                    </div>
                    </br></br>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Extent</label>
                        <div class="col-md-4">
                            <input type="text" class="form-control" name="extent1" id="extent1" >
                        </div>
                        <div class="col-md-2">
                            <select class="form-control" name="unit1" id="unit1"  >
                                <option id="0" value=NULL></option>
                                <option id="1" value="Rods">Rods</option>
                                <option id="2" value="Acres">Acres</option>
                                <option id="3" value="Hectares" >Hectares</option>


                            </select>
                        </div>
                    </div>
                    </br></br>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Name of Land</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="present_owner1" id="present_owner1" >
                        </div>
                    </div>
                    </br></br>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Present Situation</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="present_situation1" id="present_situation1" >
                        </div>
                    </div>
                    </br></br>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Cancelled?</label>
                        <div class="col-md-6">
                            <select class="form-control" name="cancellation" id="cancellation"  >
                                <option id="0" value="No">No</option>
                                <option id="1" value="Yes">Yes</option>


                            </select>
                        </div>
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


        var mainTable = $('#tab').DataTable({
            select:true,
            "order": [[0,"asc"]],
            "scrollY": "300px",
            "scrollCollapse": false,
            "paging"  : true,
            "bProcessing" :true,




        });



        $(document).ready(function (){



        });




        $(".approve").click(function(){

                  var $row = $(this).closest("tr"),
                    $tds = $row.find("td:nth-child(1)");
                    $tds1 = $row.find("td:nth-child(2)");
                    $tds2 = $row.find("td:nth-child(3)");
                    $tds3 = $row.find("td:nth-child(4)");
                    $tds4 = $row.find("td:nth-child(5)");
                    $tds5 = $row.find("td:nth-child(6)");
                    $tds6 = $row.find("td:nth-child(7)");
                    $tds7 = $row.find("td:nth-child(8)");

                    var split = $tds5.text().split(" ");

                    document.getElementById("permit_no1").value=$tds.text();
                    document.getElementById("gs_division1").value=$tds1.text();
                    document.getElementById("name_of_village1").value=$tds2.text();
                    document.getElementById("name_of_land1").value=$tds3.text();
                    document.getElementById("permit_holder_name1").value=$tds4.text();
                    document.getElementById("extent1").value=split[0];
                    document.getElementById("unit1").value=split[1];
                    document.getElementById("present_owner1").value=$tds6.text();
                    document.getElementById("present_situation1").value=$tds7.text();

            });

        $(".updateform").click(function(){

            var no=document.getElementById("permit_no1").value;
            var gs=document.getElementById("gs_division1").value;
            var village=document.getElementById("name_of_village1").value;
            var land=document.getElementById("name_of_land1").value;
            var holder_name=document.getElementById("permit_holder_name1").value;
            var extent=document.getElementById("extent1").value;
            var extent_unit=document.getElementById("unit1").value;
            var powner=document.getElementById("present_owner1").value;
            var prsnt_situ=document.getElementById("present_situation1").value;
            var cancel =document.getElementById("cancellation").value;



            $.ajax({
                url: 'LDOPermit/update',
                type: 'GET',
                data: {no:no,gs:gs,village:village,land:land,holder_name:holder_name,extent:extent+" "+extent_unit,powner:powner,prsnt_situ:prsnt_situ,cancel:cancel},
                success: function(data) {
                        setTimeout(function(){
                            location.reload();
                        }, 500);
                    }

            });





        });


        $(".reject").click(function(){

            var $row = $(this).closest("tr");

            $tds = $row.find("td:nth-child(1)");

            var no=$tds.text();



            $(".yesdel").click(function(){

            $.ajax({
                url: 'LDOPermit/delete',
                type: 'GET',
                data: {no:no},
                success: function(data) {
                    setTimeout(function(){
                        location.reload();
                    }, 1);
                }

            });

            });

            });









    </script>



@endsection