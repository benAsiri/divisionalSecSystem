@extends('masterPage')
@section('css_ref')
    @parent
    <style>
        .error {
            color: red;
            font-family: serif;
            border-color: red;
            border-width: 1px;
        }

    </style>

@stop

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

    <div class="row content">

        <div class="col-md-1 "></div>
        <div class="col-md-10">

            <div class="box box-primary">
                <div class="box-header with-border">
                    {{--<h3 class="box-title">Add Berth Certificate--}}
                    {{--</h3>--}}
                </div>
                <!-- /.box-header -->
                <!-- form start -->

                <form role="form" id="BC_form" method="post" action="{{action('DetailController@add')}}" enctype="multipart/form-data" >
                    <input type="hidden" name="_token"  value="{{ csrf_token() }}">
                    <div class="box-body">
                        <div class="form-group fg-nic ">
                            <label>NIC Number</label>
                            <input type="text" class="form-control " id="nic" name="nic"
                                   placeholder=" Enter NIC ( Not necessary for children )">
                        </div>
                        <div class="form-group">
                            <label >Person Name</label>
                            <input type="text" class="form-control" id="pName" name="pName"  placeholder="Enter Person Name">
                        </div>
                        <div class="form-group">
                            <label >Residence</label>
                            <input type="text" class="form-control" id="address" name="address" placeholder="Enter Address">
                        </div>
                        <div class="form-group">
                            <label >Mother's Name</label>
                            <input type="text" class="form-control" id="mName" name="mName" placeholder="Enter Person Mother's Name">
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="image1">1st Side of Birth Certificate</label>
                            <br>
                            <input type="file" id="image1" name="image1">
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="image2">2nd Side of Birth Certificate</label>
                            <br>
                            <input type="file" id="image2"  name="image2">
                        </div>

                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>


            </div>
            <!-- /.box -->

        </div>
        {{--end-col-md-8--}}
        <div class="col-md-1"></div>

    </div>
    {{--endrow--}}

















@stop
@section('js_ref')
    @parent

    <script src="{{asset('/plugins/jqueryValidater/jquery.validate.min.js')}}"></script>
    <script src="{{asset('/plugins/jqueryValidater/additional-methods.min.js')}}"></script>

    <script>

        $(document).ready(function () {


            var form= $('#BC_form');
            form.validate({

                rules: {
                    nic: {

                        pattern: /^[0-9]{9}[vV]$/

                    },
                    pName:{
                        required: true
                    },
                    address:{
                        required: true
                    },
                    mName:{
                        required:true
                    }
                },
                messages: {
                    nic: {

                        pattern: "NIC Number is not in correct Format...Please Correct"
                    },
                    pName:{
                        required: "This field cannot be empty"
                    },
                    address:{
                        required: "This field cannot be empty"
                    },
                    mName:{
                        required: "This field cannot be empty"
                    }
                }

            });






            //This function fire when cursior leaving the text box
            //Check whether the NIC has already been inserted before
            var status = true;
            $('#nic').focusout(function (e) {
                $.get( "validateNicForBC",{NIC :$('#nic').val()}).done(function(data){
                    if(data.trim() == 'false'){
                        status = false;
                        swal("Error", "NIC has already inserted", "error");
                        $('.fg-nic').addClass('has-error');
                    } else {
                        status = true
                        $('.fg-nic').removeClass('has-error');
                    }
                    console.log(data);

                });
            });



        });




    </script>
@stop