@extends('masterPage')
@section('css_ref')
    @parent


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

                <form role="form" method="post" action="{{action('DetailController@add')}}" enctype="multipart/form-data" >
                    <input type="hidden" name="_token"  value="{{ csrf_token() }}">
                    <div class="box-body">
                        <div class="form-group ">
                            <label>NIC Number</label>
                            <input type="text" class="form-control " id="nic" name="nic" placeholder="Enter NIC">
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
                            <input type="file" id="image2">
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







    <script>






    </script>
@stop