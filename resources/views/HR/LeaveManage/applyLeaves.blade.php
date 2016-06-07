@extends('masterPage')
@section('css_ref')
   @parent
   {{--Data tables bootstrap CSS--}}
   <link rel="stylesheet" href="{{asset('/plugins/datatables/dataTables.bootstrap.css')}}">
   <link rel="stylesheet" href="{{asset('/plugins/datepicker/datepicker3.css')}}">

@stop


@section('content')
<script type="text/javascript">

    function submit(){
        alert("d");

        var firstName = $("#fname").val();


        var sendData = JSON.stringify({ firstName});

        $.ajax({
            url: "LeavePagesController.php/ApplyMyLeave",
            dataType: "json",
            data: sendData,
            contentType: "application/json; charset=utf-8",
            type: "POST",
            success: function (result) {

                console.log(result);

            }, error: function (request, status, error) {
                alert(request.responseJSON.Message);
            }
        });




    }



</script>
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Data Table With Full Features</h3>
        </div><!-- /.box-header -->
        <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>NIC</th>
                    <th>Date</th>
                    <th>Status</th>
                    <th>Reason</th>
                </thead>
                <tbody>
                <tr>
                    <td>ID</td>
                    <td>First Name</td>
                    <td>Last Name</td>
                    <td>NIC</td>
                    <td>Date</td>
                    <td>Status</td>
                    <td>Reason</td>
                </tr>

                <tr>
                </tbody>
                <tfoot>
                <tr>
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>NIC</th>
                    <th>Date</th>
                    <th>Status</th>
                    <th>Reason</th>
                </tr>
                </tfoot>
            </table>
        </div><!-- /.box-body -->
    </div><!-- /.box -->


    <!-- general form elements -->
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Quick Example</h3>
        </div><!-- /.box-header -->
        <!-- form start -->
            <div class="box-body">

                <div class="form-group">
                    <label for="fname">First Name</label>
                    <input type="text" class="form-control" id="fname" name="fname" placeholder="First name">
                </div>

                <div class="form-group">
                    <label for="lname">Last Name</label>
                    <input type="text" class="form-control" id="lname" name="lname" placeholder="Last name">
                </div>

                <div class="form-group">
                    <label for="nic">NIC</label>
                    <input type="text" class="form-control" id="nic" name="nic" placeholder="NIC">
                </div>

                <!-- radio -->
                <div class="form-group">
                    <label for="fname">Gender </label>
                    <div class="radio">
                        <label>
                            <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
                            Male
                        </label>
                    </div>
                    <div class="radio">
                        <label>
                            <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
                            Female
                        </label>
                    </div>
                  </div>



                <div class="form-group">
                    <label for="reason">Reason</label>
                    <input type="text" class="form-control" id="reason" placeholder="Reason">
                </div>

                <!-- checkbox -->
                <div class="form-group">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox">
                            Birth Certificate Submited
                        </label>
                    </div>
                </div>

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

                    <hr>

                    {{--this should be load after operator selects the male option box--}}

                    <label> Male</label>

                    <div class="form-group">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox">
                               Requesting Letter
                            </label>
                        </div>
                    </div>

                    <hr>

                    <label>Female</label>
                    <br>

                    <div class="form-group">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox">
                                Medical Certificate
                            </label>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox">
                                Requesting Letter
                            </label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Date range:</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <input type="text" class="form-control pull-right active" id="reservation">
                        </div><!-- /.input group -->
                    </div>
                </div>

                <hr>

                <div class="form-group">
                    <label>Payment Type</label>
                    <select class="form-control">
                        <option>Full Payment</option>
                        <option>Half Payment</option>
                        <option>No Pay</option>
                    </select>
                </div>

            </div><!-- /.box-body -->

            <div class="box-footer">
                {{--<button type="button"  class="btn btn-primary" onclick="submit();">Submit</button>--}}
                <button name="data" type="button" onclick="return submit();" value="ddd">Click</button>
            </div>
    </div><!-- /.box -->




@stop

@section('js_ref')
    @parent
    <script src="{{asset('/plugins/datepicker/bootstrap-datepicker.js')}}"></script>

    {{--Data tables jq js--}}
    <script src="{{asset('/plugins/datatables/jquery.dataTables.min.js')}}"></script>
    {{--Data tables bootstrap js--}}
    <script src="{{asset('/plugins/datatables/dataTables.bootstrap.min.js')}}"></script>


    <script>
        $(function () {
            $("#datepicker").datepicker({
                autoclose: true
            });

            $("#example1").DataTable();

        })






    </script>

@stop