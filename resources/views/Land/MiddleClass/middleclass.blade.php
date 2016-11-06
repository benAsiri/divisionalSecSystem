@extends('masterPage')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-18 col-md-offset-0">
                <div class="panel panel-default">

                    <section class="panel panel-primary">
                        <div class="panel-heading">
                            <b>Middle Class Permit Information</b>
                        </div>
                        <div class="panel-body">
                            <table id="tab" class="table table-hover table-bordered">
                                <thead>
                                <th>Plan No</th>
                                <th>Lot No</th>
                                <th>File No</th>
                                <th>GS Division</th>
                                <th>Type</th>
                                <th>Issued Date</th>
                                <th>Extent</th>
                                <th>Owner Name</th>
                                <th>Present Owner</th>
                                <th>Present Situation</th>
                                <th>Nominee</th>
                                <th>Transfer</th>
                                <th>Edit</th>
                                <th>Delete</th>
                                </thead>
                                <tbody>

                                @foreach($mclass as $mclas)
                                    <tr class="row-of-data">
                                        <td>{{$mclas->plan_no}}</td>
                                        <td>{{$mclas->lot_no}}</td>
                                        <td>{{$mclas->file_no}}</td>
                                        <td>{{$mclas->gs}}</td>
                                        <td>{{$mclas->grant}}</td>
                                        <td>{{$mclas->issue_date}}</td>
                                        <td>{{$mclas->extent}}</td>
                                        <td>{{$mclas->owner}}</td>
                                        <td>{{$mclas->present_owner}}</td>
                                        <td>{{$mclas->present_situ}}</td>
                                        <td>{{$mclas->nominee}}</td>
                                        <td>{{$mclas->transfer}}</td>


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
                        <div class="panel-heading">Add New Deed Details</div>
                        <form class="form-horizontal" role="form" id="form_create" method="POST" action="{{ url('Middleclass/add') }}">
                            {!! csrf_field() !!}

                            <div class="form-group{{ $errors->has('plan_no') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Plan No</label>

                                <div class="col-md-6">

                                    <select class="form-control" name="plan_no" id="plan_no"  >
                                        <option id="0" value=0></option>
                                        <option id="1" value="PPA17100">PPA1710</option>
                                        <option id="2" value="TOPOPP22">TOPOPP22</option>

                                    </select>
                                    @if ($errors->has('plan_no'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('plan_no') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('lot_no') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Lot No</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="lot_no" value="{{ old('lot_no') }}">

                                    @if ($errors->has('lot_no'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('lot_no') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('type') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Type</label>

                                <div class="col-md-2">
                                    <select class="form-control" name="unit" id="unit"  >
                                        <option id="0" value=0></option>
                                        <option id="1" value="R-Grant">R-Grant</option>
                                        <option id="2" value="Grant">Grant</option>

                                    </select>
                                    @if ($errors->has('unit'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('unit') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="col-md-4">
                                    <input type="text" class="form-control" name="type" value="{{ old('type') }}">


                                    @if ($errors->has('type'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('type') }}</strong>
                                    </span>
                                    @endif

                                </div>



                            </div>



                            <div class="form-group{{ $errors->has('file_no') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">File No</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="file_no" value="{{ old('file_no') }}">

                                    @if ($errors->has('file_no'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('file_no') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>



                            <div class="form-group{{ $errors->has('gs_division') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">GS Division</label>

                                <div class="col-md-6">
                                    <select class="form-control" name="gs_division" id="gs_division"  >
                                        <option id="0" value=0></option>
                                        <option id="1" value="Mangalapura">Mangalapura</option>
                                        <option id="2" value="Banadaranayakepura">Banadaranayakepura</option>
                                        <option id="3" value="Wanathawilluwa-North" >Wanathawilluwa-North</option>
                                        <option id="4" value="Wanathawilluwa-South" >Wanathawilluwa-South</option>
                                        <option id="5" value="Wijayapura-East">Wijayapura-East</option>
                                        <option id="6" value="Banadaranayakepura">Karathiwu-South</option>
                                        <option id="7" value="Karathiwu-South" >Serakkuliya</option>

                                    </select>
                                    @if ($errors->has('gs_division'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('gs_division') }}</strong>
                                    </span>
                                    @endif

                                </div>
                            </div>



                            <div class="form-group{{ $errors->has('issue_date') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Issued Date</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control" id="issue_date" name="issue_date" value="{{ old('issue_date') }}" readonly >

                                    @if ($errors->has('issue_date'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('issue_date') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('extent') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Extent</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="extent" value="{{ old('extent') }}">

                                    @if ($errors->has('extent'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('extent') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('owner_name') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Owner Name</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="owner_name" value="{{ old('owner_name') }}">

                                    @if ($errors->has('owner_name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('owner_name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>


                            <div class="form-group{{ $errors->has('present_owner') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Present Owner</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="present_owner" value="{{ old('present_owner') }}" >

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
                                    <select class="form-control" name="present_situation" id="present_situation"  >
                                        <option id="0" value=0></option>
                                        <option id="1" value="Long-term Lease">Long-term Lease</option>
                                        <option id="2" value="Investigation">Investigation</option>
                                        <option id="3" value="Cancel" >Cancel</option>
                                        <option id="4" value="Other" >Other</option>

                                    </select>
                                    @if ($errors->has('present_situation'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('present_situation') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>



                            <div class="form-group{{ $errors->has('nominee') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Nominee</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="nominee" value="{{ old('nominee') }}">

                                    @if ($errors->has('nominee'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('nominee') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('transfer') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Tranfer</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="transfer" value="{{ old('transfer') }}">

                                    @if ($errors->has('transfer'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('transfer') }}</strong>
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

                    <div class="alert alert-danger"><span class="glyphicon glyphicon-warning-sign"></span> Are you sure want to delete this Record?</div>

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
                    <h4 class="modal-title custom_align" id="Heading">Update Middle-Class Permit Details</h4>
                </div>

                <div class="modal-body1">

                    </br></br>
                    <div class="form-group{{ $errors->has('plan_no1') ? ' has-error' : '' }}">
                        <label class="col-md-4 control-label">Plan No</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="plan_no1" id="plan_no1"  >
                            @if ($errors->has('plan_no1'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('plan_no1') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>


                    </br></br>
                    <div class="form-group{{ $errors->has('lot_no1') ? ' has-error' : '' }}">
                        <label class="col-md-4 control-label">Lot No</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="lot_no1" id="lot_no1" >
                            @if ($errors->has('lot_no1'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('lot_no1') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    </br></br>
                    <div class="form-group{{ $errors->has('unit1') ? ' has-error' : '' }}">
                        <label class="col-md-4 control-label">Type</label>

                        <div class="col-md-2">
                            <select class="form-control" name="unit1" id="unit1"  >
                                <option id="0" value=0></option>
                                <option id="1" value="R-Grant">R-Grant</option>
                                <option id="2" value="Grant">Grant</option>

                            </select>
                            @if ($errors->has('unit1'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('unit1') }}</strong>
                                    </span>
                            @endif
                        </div>
                        <div class="col-md-4">
                            <input type="text" class="form-control" name="type1" id="type1"  >
                            @if ($errors->has('type1'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('type1') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>



                    </br></br>
                    <div class="form-group{{ $errors->has('file_no1') ? ' has-error' : '' }}">
                        <label class="col-md-4 control-label">File No</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="file_no1" id="file_no1"  >
                            @if ($errors->has('file_no1'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('file_no1') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>
                    </br></br>

                    <div class="form-group{{ $errors->has('gs_division1') ? ' has-error' : '' }}">
                        <label class="col-md-4 control-label">GS Division</label>
                        <div class="col-md-6">
                            <select class="form-control" name="gs_division1" id="gs_division1"  >
                                <option id="0" value=0></option>
                                <option id="1" value="Mangalapura">Mangalapura</option>
                                <option id="2" value="Banadaranayakepura">Banadaranayakepura</option>
                                <option id="3" value="Wanathawilluwa-North" >Wanathawilluwa-North</option>
                                <option id="4" value="Wanathawilluwa-South" >Wanathawilluwa-South</option>
                                <option id="5" value="Wijayapura-East">Wijayapura-East</option>
                                <option id="6" value="Banadaranayakepura">Karathiwu-South</option>
                                <option id="7" value="Karathiwu-South" >Serakkuliya</option>



                            </select>
                            @if ($errors->has('gs_division1'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('gs_division1') }}</strong>
                                    </span>
                            @endif
                    </div>
                        </div>
                    </br></br>
                    <div class="form-group{{ $errors->has('issue_date1') ? ' has-error' : '' }}">
                        <label class="col-md-4 control-label">Issued Date</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="issue_date1" name="issue_date1" id="issue_date1" readonly>
                            @if ($errors->has('transfer'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('issue_date1') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>
                    </br></br>
                    <div class="form-group{{ $errors->has('extent1') ? ' has-error' : '' }}">
                        <label class="col-md-4 control-label">Extent</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="extent1" id="extent1" >
                            @if ($errors->has('extent1'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('extent1') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>
                    </br></br>
                    <div class="form-group{{ $errors->has('owner_name1') ? ' has-error' : '' }}">
                        <label class="col-md-4 control-label">Owner Name</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="owner_name1" id="owner_name1" >
                            @if ($errors->has('owner_name1'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('owner_name1') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>
                    </br></br>
                    <div class="form-group{{ $errors->has('present_owner1') ? ' has-error' : '' }}">
                        <label class="col-md-4 control-label">Present Owner</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="present_owner1" id="present_owner1" >
                            @if ($errors->has('present_owner1'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('present_owner1') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>
                    </br></br>
                    <div class="form-group{{ $errors->has('present_situation1') ? ' has-error' : '' }}">
                        <label class="col-md-4 control-label">Present Situation</label>
                        <div class="col-md-6">
                            <select class="form-control" name="present_situation1" id="present_situation1"  >
                                <option id="0" value=0></option>
                                <option id="1" value="Long-term Lease">Long-term Lease</option>
                                <option id="2" value="Investigation">Investigation</option>
                                <option id="3" value="Cancel" >Cancel</option>
                                <option id="4" value="Other" >Other</option>

                            </select>
                            @if ($errors->has('present_situation1'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('present_situation1') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>
                    </br></br>

                    <div class="form-group{{ $errors->has('nominee1') ? ' has-error' : '' }}">
                        <label class="col-md-4 control-label">Nominee</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="nominee1" id="nominee1" >
                            @if ($errors->has('nominee1'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('nominee1') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>
                    </br></br>
                    <div class="form-group{{ $errors->has('transfer1') ? ' has-error' : '' }}">
                        <label class="col-md-4 control-label">Transfer</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="transfer1" id="transfer1" >



                            </select>
                            @if ($errors->has('transfer1'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('transfer1') }}</strong>
                                    </span>
                            @endif


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



        $('#issue_date').datepick({
            autoclose:true,
            dateFormat: 'yyyy-mm-dd',
            rangeSelect: false,
            onDate: $.datepick.noWeekends,
            startDate:new Date(),
            todayHighlight:'true',
            multiSelect: 1, monthsToShow: 1,



        });
        $('#issue_date1').datepick({
            autoclose:true,
            dateFormat: 'yyyy-mm-dd',
            rangeSelect: false,
            onDate: $.datepick.noWeekends,
            startDate:new Date(),
            todayHighlight:'true',
            multiSelect: 1, monthsToShow: 1,



        });





        var mainTable = $('#tab').DataTable({
            select:true,
            "order": [[0,"asc"]],
            "scrollY": "300px",
            "scrollCollapse": false,
            "paging"  : true,
            "bProcessing" :true,

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
            $tds8 = $row.find("td:nth-child(9)");
            $tds9 = $row.find("td:nth-child(10)");
            $tds10 = $row.find("td:nth-child(11)");
            $tds11 = $row.find("td:nth-child(12)");



                    var typee=$tds4.text().split(" ");

            document.getElementById("plan_no1").value=$tds.text();
            document.getElementById("lot_no1").value=$tds1.text();
            document.getElementById("file_no1").value=$tds2.text();
            document.getElementById("type1").value=typee[1];
            document.getElementById("unit1").value=typee[0];
            document.getElementById("gs_division1").value=$tds3.text();
            document.getElementById("issue_date1").value=$tds5.text();
            document.getElementById("extent1").value=$tds6.text();
            document.getElementById("owner_name1").value=$tds7.text();
            document.getElementById("present_owner1").value=$tds8.text();
            document.getElementById("present_situation1").value=$tds9.text();
            document.getElementById("nominee1").value=$tds10.text();
            document.getElementById("transfer1").value=$tds11.text();


        });

        $(".updateform").click(function(){

            var no=document.getElementById("plan_no1").value;
            var lot=document.getElementById("lot_no1").value;
            var file=document.getElementById("file_no1").value;
            var gs=document.getElementById("gs_division1").value;
            var type_grant= document.getElementById("unit1").value+" "+document.getElementById("type1").value;
            var date=document.getElementById("issue_date1").value;
            var extent=document.getElementById("extent1").value;
            var oname=document.getElementById("owner_name1").value;
            var powner=document.getElementById("present_owner1").value;
            var situ=document.getElementById("present_situation1").value;
            var nominee=document.getElementById("nominee1").value;
            var transfer =document.getElementById("transfer1").value;


            $.ajax({
                url: 'Middleclass/update',
                type: 'GET',
                data: {no:no,lot:lot,file:file,gs:gs,type_grant:type_grant,date:date,extent:extent,oname:oname,powner:powner,situ:situ,nominee:nominee,transfer:transfer},
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
            $tds1 = $row.find("td:nth-child(2)");
            $tds2 = $row.find("td:nth-child(3)");
            $tds3 = $row.find("td:nth-child(5)");

            var no=$tds.text();
            var lot_no=$tds1.text();
            var file_no=$tds2.text();
            var typee= $tds3.text();


            $(".yesdel").click(function(){

                $.ajax({
                    url: 'Middleclass/delete',
                    type: 'GET',
                    data: {no:no,lot_no:lot_no,file_no:file_no,typee:typee},
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