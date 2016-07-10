@extends('masterPage')

@section('content')
{{--AddNew Employee Page--}}





        <!-- Content Header (Page header) -->
<section class="content-header"><h1>DIVISIONAL SECRETARIANT SYSTEM</h1></section>

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
                            <li class="pull-left header"><i class="fa fa-inbox"></i>Insert Program Details</li>
                        </ul>
                        <div class="tab-content no-padding">
                            <div class="box box-primary">
                                <div class="box-header with-border">

                                    <form role="form" action="{{route('addPrograms') }}"  id="add_Programs_form" name="add_Programs_form">

                                        <div class="box-body">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Employee ID</label>
                                                <input class="form-control" name="eid" placeholder="Write Here" type="text">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Duty</label>
                                                <input class="form-control" name="name" placeholder="Write Here" type="text">
                                            </div>

                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Handover Date</label>
                                                <input class="form-control" name="handoverdate" placeholder="Write Here" type="date">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Approved Date</label>
                                                <input class="form-control" name="approveddate" placeholder="Write Here" type="date">
                                            </div>
                                            <div class="form-group">
                                                <label for="sel1">Current Status</label>
                                                <select class="form-control" name="current_status">
                                                    <option value="Complete">Yes</option>
                                                    <option value="Proceed">No</option>

                                                </select>
                                            </div>
                                        </div>
                                        <div class="box-footer">
                                            <button type="submit" class="btn btn-primary">Insert New User</button>
                                        </div>
                                    </form>
                                  </div><!-- /.box-header -->
                            </div>
                        </div>
                    </div>




            </div>
        </div>
    </div><!-- /.row (main row) -->




@endsection