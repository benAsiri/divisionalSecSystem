@extends('masterPage')

@section('content')
{{--AddNew Employee Page--}}






<section class="content-header">
<h1>Search Employee Details</h1>
</section>
        <!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">

            <div class="box">
                {{--<div class="box-header">--}}
                    {{--<h3 class="box-title">Data Table With Full Features</h3>--}}
                {{--</div><!-- /.box-header -->--}}
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped tr">
                        <thead>
                        <tr>
                            <th>Full Name</th>
                            <th>NIC</th>
                            <th>Job Position</th>
                            <th>Date of Appointment</th>
                            <th>Appointment Number</th>

                        </tr>
                        </thead>
                        <tbody>
                        @foreach($employee as $emp)
                            <tr>
                                <td>{{$emp->fullname}}</td>
                                <td>{{$emp->id_num}}</td>
                                <td>{{$emp->job_position}}</td>
                                <td>{{$emp->date_of_appoint}}</td>
                                <td>{{$emp->appointment_no}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>

                        </tfoot>
                    </table>
                </div><!-- /.box-body -->
            </div><!-- /.box -->



         </div>
    </div>
</section>
@endsection
@section('js_ref')
    @parent

    <script>

       // $("#example1").DataTable();


    $().DataTable







    </script>
    @stop