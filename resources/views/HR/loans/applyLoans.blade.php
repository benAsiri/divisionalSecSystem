@extends('masterPage')

@section('content')

    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Loan Table</h3>
                    <div class="box-tools">
                        <div class="input-group" style="width: 150px;">
                            <input type="text" name="table_search" class="form-control input-sm pull-right" placeholder="Search">
                            <div class="input-group-btn">
                                <button class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                        <tr>
                            <th>ID</th>
                            <th>User</th>
                            <th>Date</th>
                            <th>Status</th>
                            <th>Reason</th>
                        </tr>
                        <tr>
                            <td>183</td>
                            <td>John Doe</td>
                            <td>11-7-2014</td>
                            <td><span class="label label-success">Approved</span></td>
                            <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                        </tr>
                        <tr>
                            <td>219</td>
                            <td>Alexander Pierce</td>
                            <td>11-7-2014</td>
                            <td><span class="label label-warning">Pending</span></td>
                            <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                        </tr>
                        <tr>
                            <td>657</td>
                            <td>Bob Doe</td>
                            <td>11-7-2014</td>
                            <td><span class="label label-primary">Approved</span></td>
                            <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                        </tr>
                        <tr>
                            <td>175</td>
                            <td>Mike Doe</td>
                            <td>11-7-2014</td>
                            <td><span class="label label-danger">Denied</span></td>
                            <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                        </tr>
                    </table>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div>
    </div>


    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header"><h3 class="box-title">Apply Leave</h3>
                </div>

                <!-- /.box-header -->
                <div class="box-body">
                    <form role="form" method="post" action="{{url('/ApplyLoans')}}">
                        {!! csrf_field() !!}
                        <div class="form-group">
                            <label for="exampleInputEmail1">Name</label>
                            <input class="form-control" id="#" placeholder="Write Here" type="name">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">NIC</label>
                            <input class="form-control" id="#" placeholder="Write Here" type="nic">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Leave Type</label>

                            <select class="form-control">
                                <option value="volvo">Vacation</option>
                                <option value="saab">Saab</option>
                                <option value="opel">Opel</option>
                                <option value="audi">Labs</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">No of Days</label>
                            <input class="form-control" id="#" placeholder="Write Here" type="nodays">
                        </div>
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary Add">Apply Leave</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>

@endsection

<script>

</script>