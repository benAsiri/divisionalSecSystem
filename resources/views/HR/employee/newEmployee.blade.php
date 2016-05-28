@extends('masterPage')

@section('content')
{{--AddNew Employee Page--}}





 <!-- Content Header (Page header) -->
<section class="content-header"><h1>Personal Details</h1></section>

<!-- Main content -->
<section class="content">
    <!-- Small boxes (Stat box) -->
    <div class="row">
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
                            <label for="exampleInputEmail1">Name</label>
                            <input class="form-control" id="#" placeholder="Write Here" type="email">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">NIC</label>
                            <input class="form-control" id="#" placeholder="Write Here" type="nic">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Selected Position</label>
                            <input class="form-control" id="#" placeholder="Write Here" type="nic">
                        </div>

                        <label>Date of Birth:</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <input class="form-control" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask="" type="text">
                        </div><!-- /.input group -->

                        <br>
                        <div class="input-group">
                                <label>Male :    </label>
                                <input name="optionsRadios" id="optionsRadios1" value="option1" checked="" type="radio">
                                &nbsp;
                                <label>Female :  </label>
                                <input name="optionsRadios" id="optionsRadios1" value="option1" checked="" type="radio">
                        </div>
                    </div><!-- /.box-body -->

                    <!-- Main row -->
                    <div class="nav-tabs-custom">
                        <!-- Tabs within a box -->
                        <ul class="nav nav-tabs pull-right">
                            <li class="pull-left header"><i class="fa fa-inbox"></i>Birth Certificate Details</li>
                        </ul>
                        <div class="tab-content no-padding">
                            <div class="box box-primary">
                                <div class="box-header with-border">
                                    <form role="form">
                                        <div class="box-body">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Name</label>
                                                <input class="form-control" id="#" placeholder="Write Here" type="email">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">NIC</label>
                                                <input class="form-control" id="#" placeholder="Write Here" type="nic">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Selected Position</label>
                                                <input class="form-control" id="#" placeholder="Write Here" type="nic">
                                            </div>
                                        </div>
                                    </form>
                                </div><!-- /.box-header -->
                                </div>
                            </div>
                        </div>


                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Insert New User</button>
                    </div>
                </form>
            </div>
        </div>
    </div><!-- /.row (main row) -->


    <div class="box">
        <div class="box-header"><h3 class="box-title">Position Requirement Documents</h3></div>

        <!-- /.box-header -->
        <div class="box-body">
            <form role="form">
                <div class="box-body">
                    <label>Selected the subject</label>
                    <div class="form-group">
                        <select class="form-control">
                            <option> 1</option>
                            <option>option 2</option>
                            <option>option 3</option>
                            <option>option 4</option>
                            <option>option 5</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Adavence Level</label>
                        <input class="form-control" id="#" placeholder="Write Here" type="nic">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Aother course info</label>
                        <input class="form-control" id="#" placeholder="Write Here" type="nic">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Aother course info</label>
                        <input class="form-control" id="#" placeholder="Write Here" type="nic">
                    </div>
                </div><!-- /.box-body -->

                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div><!-- /.box-body -->

        &nbsp;


        <div class="box">
            <div class="box-header"><h3 class="box-title">Must Have Documents fro Employrees</h3></div>

            <!-- /.box-header -->
            <div class="box-body">
                <form role="form">
                    <div class="box-body">
                        <div class="form-group">
                            <ul>
                                <li><label><input type="checkbox"> NO.278 FORM </label></li>
                                <li><label><input type="checkbox"> NO.160 FORM </label></li>
                                <li><label><input type="checkbox"> NO.169 FORM </label></li>
                                <li><label><input type="checkbox"> NO.261 FORM </label></li>
                                <li><label><input type="checkbox"> NO.157 FORM </label></li>
                            </ul>
                        </div>

                    </div><!-- /.box-body -->

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div><!-- /.box-body -->

    </div>


@endsection