@extends('masterPage)

@section('content')


    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="http://getbootstrap.com/dist/js/bootstrap.min.js"></script>
    <div class="container">
        <div class="row">
            <div class="col-md-18 col-md-offset-0">
                <div class="panel panel-default">

                    <section class="panel panel-primary">
                        <div class="panel-heading">
                            <b>Employee Info</b>
                        </div>
                        <div class="panel-body">
                            <table id="tab" class="table table-hover table-bordered">
                                <thead>
                                <th>NIC</th>
                                 <th>Casual Leaves</th>
                                <th>Vacation leaves</th>
                                <th>Commencing Leaves</th>
                                <th>Remaining Casual Leaves</th>
                                <th>Remaining Vacation Leaves</th>
                                 <th>Previous Year Extra Leaves</th>
                                </thead>
                                <tbody>




                                </tbody>

                            </table>
                        </div>
                    </section>
                </div>

            </div>
        </div>
    </div>




@endsection