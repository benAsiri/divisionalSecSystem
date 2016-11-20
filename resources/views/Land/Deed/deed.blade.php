@extends('masterPage')

@section('content')


    <div align="center" style="background:#CED2CD">
        <div class="model-dialog">
            <div class="small-box bg-blue">
                <div class="inner">
                    <h3>Deed Information</h3>
                    <p>Add Deed details,update existing Deed details and delete Deed details</p>
                </div>
                <div class="icon">
                    <i  class=""></i>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-18 col-md-offset-0">
                <div class="panel panel-default">

                    <section class="panel panel-primary">
                        <div class="panel-heading">
                            <b>Deed Information</b>
                        </div>
                        <div class="panel-body">
                            <table id="tab" class="table table-hover table-bordered">
                                <thead>
                                <th>Deed No</th>
                                <th>Deed type</th>
                                <th>Extent</th>
                                <th>Deed Owner</th>
                                <th>Present Owner</th>
                                <th>Nominee</th>
                                <th>Reference LDO Permit-No</th>
                                <th>Edit</th>
                                <th>Delete</th>
                                </thead>
                                <tbody>



                                @foreach($deeds as $deed)
                                    <tr class="row-of-data">
                                        <td>{{$deed->deed_no}}</td>
                                        <td>{{$deed->deed_type}}</td>
                                        <td>{{$deed->extent}}</td>
                                        <td>{{$deed->deed_owner}}</td>
                                        <td>{{$deed->present_owner}}</td>
                                        <td>{{$deed->nominee}}</td>
                                        <td>{{$deed->reference_no}}</td>
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
                        <form class="form-horizontal" role="form" method="POST" action="{{ url('Deed/add') }}">
                            {!! csrf_field() !!}

                            <div class="form-group{{ $errors->has('deed_type') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Reference Permit No</label>

                                <div class="col-md-6">
                                    <select class="form-control" name="refe" id="refe" readonly>
                                        <option id="0" value=0></option>


                                    </select>
                                    @if ($errors->has('refe'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('refe') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>


                            <div class="form-group{{ $errors->has('present_owner') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Present Owner</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control" id="present_owner" name="present_owner" value="{{ old('present_owner') }}" readonly>

                                    @if ($errors->has('present_owner'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('present_owner') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('extent') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Extent</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control" id="extent" name="extent" value="{{ old('extent') }}" readonly>

                                    @if ($errors->has('extent'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('extent') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>


                            <div class="form-group{{ $errors->has('deed_no') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Deed No</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="deed_no" value="{{ old('deed_no') }}">

                                    @if ($errors->has('deed_no'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('deed_no') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>



                            <div class="form-group{{ $errors->has('deed_type') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Deed type</label>

                                <div class="col-md-6">
                                    <select class="form-control" name="deed_type" id="deed_type"  >
                                        <option id="0" value=0></option>
                                        <option id="1" value="Swarnabhumi">Swarnabhumi</option>
                                        <option id="2" value="Jayabhumi">Jayabhumi</option>
                                        <option id="3" value="Ranbhumi-North" >Ranbhumi</option>

                                    </select>
                                    @if ($errors->has('deed_type'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('deed_type') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>



                            <div class="form-group{{ $errors->has('deed_owner') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Deed Owner</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="deed_owner" value="{{ old('deed_owner') }}">

                                    @if ($errors->has('deed_owner'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('deed_owner') }}</strong>
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
                    <h4 class="modal-title custom_align" id="Heading">Update Deed Details</h4>
                </div>

                <div class="modal-body1">
                    </br></br>
                    <div class="form-group{{ $errors->has('reference1') ? ' has-error' : '' }}">
                        <label class="col-md-4 control-label">Reference No</label>
                        <div class="col-md-6">
                            <select class="form-control" name="reference1" id="reference1"  readonly>
                                <option value=0></option>



                            </select>
                            @if ($errors->has('reference1'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('reference1') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>


                    </br></br>
                    <div class="form-group{{ $errors->has('present_owner1') ? ' has-error' : '' }}">
                        <label class="col-md-4 control-label">Present Owner</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="present_owner1" name="present_owner1" id="present_owner1" readonly >

                        </div>
                        @if ($errors->has('present_owner1'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('present_owner1') }}</strong>
                                    </span>
                        @endif
                    </div>

                    </br></br>
                    <div class="form-group{{ $errors->has('extent1') ? ' has-error' : '' }}">
                        <label class="col-md-4 control-label">Extent</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="extent1" name="extent1" id="extent1" readonly>
                        </div>@if ($errors->has('extent1'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('extent1') }}</strong>
                                    </span>
                        @endif

                    </div>
                    </br></br>

                    <div class="form-group{{ $errors->has('deed_no1') ? ' has-error' : '' }}">
                        <label class="col-md-4 control-label">Deed No</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="deed_no1" id="deed_no1" readonly >
                        </div>
                        @if ($errors->has('deed_no1'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('deed_no1') }}</strong>
                                    </span>
                        @endif
                    </div>
                    </br></br>
                    <div class="form-group{{ $errors->has('deed_type1') ? ' has-error' : '' }}">
                        <label class="col-md-4 control-label">Deed type</label>
                        <div class="col-md-6">

                            <select class="form-control" name="deed_type1" id="deed_type1"  >
                                <option id="0" value=0></option>
                                <option id="1" value="Swarnabhumi">Swarnabhumi</option>
                                <option id="2" value="Jayabhumi">Jayabhumi</option>
                                <option id="3" value="Ranbhumi-North" >Ranbhumi</option>

                            </select>
                            @if ($errors->has('deed_type1'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('deed_type1') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>
                    </br></br>
                    <div class="form-group{{ $errors->has('deed_owner1') ? ' has-error' : '' }}">
                        <label class="col-md-4 control-label">Deed Owner</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="deed_owner1" id="deed_owner1" >
                        </div>
                        @if ($errors->has('deed_owner1'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('deed_owner1') }}</strong>
                                    </span>
                        @endif
                    </div>


                    </br></br>
                    <div class="form-group{{ $errors->has('nominee1') ? ' has-error' : '' }}">
                        <label class="col-md-4 control-label">Nominee</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="nominee1" id="nominee1" >
                        </div>
                        @if ($errors->has('nominee1'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('nominee1') }}</strong>
                                    </span>
                        @endif
                    </div>
                    </br></br>



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


            $.ajax({
                url: 'Deed/get_ldo_permit',
                type: 'GET',
                success: function (data) {
                  for (var i = 0; i <data.length; i++) {


                        var opt = data[i];
                        var ek = document.createElement("option");
                        ek.textContent = opt;
                        ek.value = opt;
                        document.getElementById("refe").appendChild(ek);
                       // document.getElementById("reference1").appendChild(ek);

                    }
                }
            });


            function removeOptions(selectbox)
            {
                var i;
                for(i=selectbox.options.length-1;i>=0;i--)
                {
                    selectbox.remove(i);
                }
            }


            $(".approve").click(function(){

                $.ajax({
                    url: 'Deed/get_ldo_permit',
                    type: 'GET',
                    success: function (data) {

                        removeOptions(document.getElementById("reference1"));
                        for (var i = 0; i <data.length; i++) {
                            var opt = data[i];
                            var ek = document.createElement("option");
                            ek.textContent = opt;
                            ek.value = opt;
                            document.getElementById("reference1").appendChild(ek);
                        }
                    }
                });


                $('#reference1').on('change', function (e) {
                    var optionSelected = $("option:selected", this);
                    var valueSelected = this.value;


                    $.ajax({
                        url: 'Deed/get_ldo_permit_details',
                        type: 'GET',
                        data:{id:valueSelected},
                        success: function (data) {

                            $('#extent1').val(data[0]);

                            $('#present_owner1').val(data[1]);



                        }
                    });




                });







            });



            $('#refe').on('change', function (e) {
                var optionSelected = $("option:selected", this);
                var valueSelected = this.value;


                $.ajax({
                    url: 'Deed/get_ldo_permit_details',
                    type: 'GET',
                    data:{id:valueSelected},
                    success: function (data) {

                        $('#extent').val(data[0]);

                        $('#present_owner').val(data[1]);



                    }
                });




            });









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

            document.getElementById("deed_no1").value=$tds.text();
            document.getElementById("deed_type1").value=$tds1.text();
            document.getElementById("extent1").value=$tds2.text();
            document.getElementById("deed_owner1").value=$tds3.text();
            document.getElementById("present_owner1").value=$tds4.text();
            document.getElementById("nominee1").value=$tds5.text();
            document.getElementById("reference1").value=$tds6.text();


        });

        $(".updateform").click(function(){

            var no=document.getElementById("deed_no1").value;
            var dt=document.getElementById("deed_type1").value;
            var extent=document.getElementById("extent1").value;
            var down=document.getElementById("deed_owner1").value;
            var pown=document.getElementById("present_owner1").value;
            var nominee=document.getElementById("nominee1").value;
            var refe=document.getElementById("reference1").value;



            $.ajax({
                url: 'Deed/update',
                type: 'GET',
                data: {no:no,dt:dt,extent:extent,down:down,pown:pown,nominee:nominee,refe:refe},
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
                    url: 'Deed/delete',
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