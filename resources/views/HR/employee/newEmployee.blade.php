@extends('masterPage')
@section('css_ref')
    @parent

<link rel="stylesheet" href="{{asset('/plugins/datepicker/datepicker3.css')}}">
@stop

@section('content')
{{--AddNew Employee Page--}}





 <!-- Content Header (Page header) -->
<section class="content-header"><h1>Personal Details</h1></section>

<!-- Main content -->
<section class="content">
    <!-- Small boxes (Stat box) -->
    <div class="row">
        <div class="col-lg-3 col-xs-6">
        <div class="col-lg-3 col-xs-6">

        </div><!-- ./col -->
    </div><!-- /.row -->


    <!-- Main row -->
        <div class="nav-tabs-custom">
        <!-- Tabs within a box -->
        <ul class="nav nav-tabs pull-right">
            <li class="pull-left header"><i class="fa fa-inbox"></i>Add Users</li>
        </ul>
        <div class="tab-content no-padding">
            <div class="box box-primary">
                <div class="box-header with-border"></div><!-- /.box-header -->

                <!-- form start -->
                <form role="form">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">SurName</label>
                            <input class="form-control" id="#" placeholder="Enter surname" type="email">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Full Name</label>
                            <input class="form-control" id="#" placeholder="Enter full name" type="email">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">NIC</label>
                            <input class="form-control" id="#" placeholder="Enter National Identitiy Card Number" type="nic">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Address</label>
                            <input class="form-control" id="#" placeholder="Enter Address" type="nic">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Date of Birth</label>
                            <!-- Date dd/mm/yyyy -->
                            <div class="form-group">
                                <label>Date:</label>

                                <div class="input-group date">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input type="text" class="form-control pull-right" id="datepicker">
                                </div>
                                <!-- /.input group -->
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Gender</label>
                            <select class="form-control">
                                <option>Male</option>
                                <option>Female</option>
                                <option>Other</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Race</label>
                            <select class="form-control">
                                <option>Sinhalese</option>
                                <option>Sri Lankan Tamils</option>
                                <option>Sri Lankan Malays</option>
                                <option>Others</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Marital status</label>

                            <select class="form-control">
                                <option>Married</option>
                                <option>Single</option>
                            </select>

                            {{--<div class="input-group">--}}
                                {{--<label>Male :    </label>--}}
                                {{--<input name="optionsRadios" id="optionsRadios1" value="option1" checked="" type="radio">--}}
                                {{--&nbsp;--}}
                                {{--<label>Female :  </label>--}}
                                {{--<input name="optionsRadios" id="optionsRadios1" value="option1" checked="" type="radio">--}}
                            {{--</div>--}}
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">District</label>

                                <select class="form-control">
                                    <option>Ampara</option>
                                    <option>Anuradhapura</option>
                                    <option>Badulla</option>
                                    <option>Batticalo</option>
                                    <option>Colombo</option>
                                    <option>Galle</option>
                                    <option>Gampaha</option>
                                    <option>Hambantota</option>
                                    <option>Jaffna</option>
                                    <option>Kalutara</option>
                                    <option>Kandy</option>
                                    <option>Kegalle</option>
                                    <option>Kilinochchi</option>
                                    <option>Kurunegala</option>
                                    <option>Mannar</option>
                                    <option>Matale</option>
                                    <option>Matara</option>
                                    <option>Monaragala</option>
                                    <option>Mullaitivu</option>
                                    <option>Nuwara Eliya</option>
                                    <option>Polonnaruwa</option>
                                    <option>Puttalam</option>
                                    <option>Ratnapura</option>
                                    <option>Trincomalee</option>
                                    <option>Vavuniya</option>
                                </select>

                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Selected Position</label>
                            <input class="form-control" id="#" placeholder="Write Here" type="nic">
                        </div>

                        <label>Date of Birth:</label>
                        <!-- Date range -->
                        <div class="form-group">
                            <label>Date range:</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <input type="text" class="form-control pull-right" id="reservation">
                            </div><!-- /.input group -->
                        </div><!-- /.form group -->

                        <br>

                    </div><!-- /.box-body -->

                    <!-- Main row -->
                    <div class="nav-tabs-custom">
                        <!-- Tabs within a box -->
                        <ul class="nav nav-tabs pull-right">
                            <li class="pull-left header"><i class="fa fa-inbox"></i>Job Details</li>
                        </ul>
                        <div class="tab-content no-padding">
                            <div class="box box-primary">
                                <div class="box-header with-border">
                                    <form role="form">
                                        <div class="box-body">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Date of Appointment</label>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Appointment Number</label>
                                                <input class="form-control" id="#" placeholder="Enter Appointment number" type="nic">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Job Position</label>
                                                <input class="form-control" id="#" placeholder="Write Here" type="nic">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Job Grade</label>
                                                <input class="form-control" id="#" placeholder="Enter Grade if have" type="nic">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Widow Number</label>
                                                <input class="form-control" id="#" placeholder="Enter if have" type="nic">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Pension Date</label>
                                            </div>
                                        </div>
                                    </form>
                                </div><!-- /.box-header -->
                                </div>
                            </div>
                        </div>


                    <div class="box-footer insert">
                        <button type="submit" class="btn btn-primary">Insert New Employee</button>
                    </div>
                </form>
            </div>
        </div>
    </div><!-- /.row (main row) -->


    {{--<div class="box">--}}
        {{--<div class="box-header"><h3 class="box-title">Position Requirement Documents</h3></div>--}}

        {{--<!-- /.box-header -->--}}
        {{--<div class="box-body">--}}
            {{--<form role="form">--}}
                {{--<div class="box-body">--}}
                    {{--<label>Selected the subject</label>--}}
                    {{--<div class="form-group">--}}
                        {{--<select class="form-control">--}}
                            {{--<option> 1</option>--}}
                            {{--<option>option 2</option>--}}
                            {{--<option>option 3</option>--}}
                            {{--<option>option 4</option>--}}
                            {{--<option>option 5</option>--}}
                        {{--</select>--}}
                    {{--</div>--}}
                    {{--<div class="form-group">--}}
                        {{--<label for="exampleInputEmail1">Adavence Level</label>--}}
                        {{--<input class="form-control" id="#" placeholder="Write Here" type="nic">--}}
                    {{--</div>--}}
                    {{--<div class="form-group">--}}
                        {{--<label for="exampleInputEmail1">Aother course info</label>--}}
                        {{--<input class="form-control" id="#" placeholder="Write Here" type="nic">--}}
                    {{--</div>--}}
                    {{--<div class="form-group">--}}
                        {{--<label for="exampleInputEmail1">Aother course info</label>--}}
                        {{--<input class="form-control" id="#" placeholder="Write Here" type="nic">--}}
                    {{--</div>--}}
                {{--</div><!-- /.box-body -->--}}

                {{--<div class="box-footer">--}}
                    {{--<button type="submit" class="btn btn-primary">Update</button>--}}
                {{--</div>--}}
            {{--</form>--}}
        {{--</div><!-- /.box-body -->--}}

        {{--&nbsp;--}}


        {{--<div class="box">--}}
            {{--<div class="box-header"><h3 class="box-title">Must Have Documents fro Employrees</h3></div>--}}

            {{--<!-- /.box-header -->--}}
            {{--<div class="box-body">--}}
                {{--<form role="form">--}}
                    {{--<div class="box-body">--}}
                        {{--<div class="form-group">--}}
                            {{--<ul>--}}
                                {{--<li><label><input type="checkbox"> NO.278 FORM </label></li>--}}
                                {{--<li><label><input type="checkbox"> NO.160 FORM </label></li>--}}
                                {{--<li><label><input type="checkbox"> NO.169 FORM </label></li>--}}
                                {{--<li><label><input type="checkbox"> NO.261 FORM </label></li>--}}
                                {{--<li><label><input type="checkbox"> NO.157 FORM </label></li>--}}
                            {{--</ul>--}}
                        {{--</div>--}}

                    {{--</div><!-- /.box-body -->--}}

                    {{--<div class="box-footer">--}}
                        {{--<button type="submit" class="btn btn-primary">Update</button>--}}
                    {{--</div>--}}
                {{--</form>--}}
            {{--</div><!-- /.box-body -->--}}

    {{--</div>--}}


@stop
    @section('js_ref')
        @parent


        <script src="{{asset('/plugins/datepicker/bootstrap-datepicker.js')}}"></script>

        <script>
            $(function () {
                //Date picker
                $('#datepicker').datepicker({
                    autoclose: true
                });
            });
        </script>
@stop