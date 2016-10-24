

@extends('masterPage')



@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading "><h2><b><i><?php echo Date("Y-m-d")?></i></b></h2></div>

                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                <div class="panel-body">
                    <img src="{{asset('dist/img/Header.png')}}" class="user-image" alt="HeaderImage">
                    <pre>
                    {{var_dump(Auth::user())}}
                    </pre>
                </div>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>




                <div class="panel-body">

                </div>

            </div>
        </div>
    </div>
</div>
@endsection
