@extends('masterPage')

@section('content')
    <div class="box">
        <div class="box-header"><h3 class="box-title"> Page3</h3></div>

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